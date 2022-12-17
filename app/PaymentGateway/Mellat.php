<?php

namespace App\PaymentGateway;

use nusoap_client;

class Mellat extends Payment
{
    /**
     * ترمینال درگاه بانک ملت.
     * @var intiger
     */
    private $terminal = '6814608' ;

    /**
     * نام کاربری درگاه بانک ملت.
     * @var string
     */
    private $username = 'lik404' ;

    /**
     * رمز عبور درگاه بانک ملت.
     * @var string
     */
    private $password = '31776521' ;

    public function send($amounts, $addressId, $description, $ip)
    {
        $createOrder = parent::createOrder($addressId, $amounts, '0', 'mellat', $description, $ip);
        if (array_key_exists('error', $createOrder)) {
            alert()->error('', $createOrder['error'])->showConfirmButton('تایید');
            return redirect()->route('home');
        } else {
            $orderId = $createOrder['orderId'];
            //-- شناسه فاکتور
            //$amount = $amounts['paying_amount'];
            $amount = '20000';                            //-- مبلغ به ریال
            $localDate = date('Ymd');
            $localTime = date('Gis');
            $additionalData = $description;
            $callBackUrl = route('home.payment_verifyMallat');    //-- لینک کال بک
            $payerId = 0;

            //-- تبدیل اطلاعات به آرایه برای ارسال به بانک
            $parameters = array(
                'terminalId' => $this->terminal,
                'userName' => $this->username,
                'userPassword' => $this->password,
                'orderId' => $orderId,
                'amount' => $amount,
                'localDate' => $localDate,
                'localTime' => $localTime,
                'additionalData' => $additionalData,
                'callBackUrl' => $callBackUrl,
                'payerId' => $payerId
            );

            $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
            $namespace = 'http://interfaces.core.sw.bps.com/';
            $result = $client->call('bpPayRequest', $parameters, $namespace);
            // بررسی وجود خطا
            if ($client->fault) {
                return ['error' => 'خطا در اتصال به وب سرویس بانک'];
            } else {
                $err = $client->getError();

                if ($err) {
                    return ['error' => $err];

                } else {
                    $res = explode(',', $result);
                    $ResCode = $res[0];

                    if ($ResCode == "0") {
                        return ['success' => $res[1], 'orderId' => $orderId];
                        //-- انتقال به درگاه پرداخت

                    } else {
                        //-- نمایش خطا
                        die($result);
                    }
                }
            }
        }
    }

    public function verify($token, $status, $orderid, $SaleReferenceId)
    {

        $terminalId = "6814608";                            //-- شناسه ترمینال
        $userName = "lik404";                            //-- نام کاربری
        $userPassword = "31776521";                            //-- کلمه عبور
        $orderId = $orderid;
        $parameters = array(
            'terminalId' => $this->terminal,
            'userName' => $this->username,
            'userPassword' => $this->username,
            'orderId' => $orderId,
            'saleOrderId' => $orderId,
            'saleReferenceId' => $SaleReferenceId);

        // Call the SOAP method
        $namespace = 'http://interfaces.core.sw.bps.com/';
        $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $result = $client->call('bpVerifyRequest', $parameters, $namespace);

        // Check for a fault
        if ($client->fault) {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
            die();
        } else {

            $resultStr = $result;

            $err = $client->getError();
            if ($err) {
                // Display the error
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
                die();
            } else {
                return true;
            }// end Display the result
        }// end Check for errors

    }

    protected function settlePayment($RefId, $ResCode, $SaleOrderId, $SaleReferenceId)
    {
        $client = new nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $orderId = $SaleOrderId;
        $settleSaleOrderId = $SaleOrderId;
        $settleSaleReferenceId = $SaleReferenceId;
        $err = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
            die();
        }
        $parameters = array(
            'terminalId' => $this->terminal,
            'userName' => $this->username,
            'userPassword' => $this->password,
            'orderId' => $orderId,
            'saleOrderId' => $settleSaleOrderId,
            'saleReferenceId' => $settleSaleReferenceId);
        $result = $client->call('bpSettleRequest', $parameters, 'http://interfaces.core.sw.bps.com/');
        if ($client->fault) {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
            die();
        } else {
            $resultStr = $result;
            $err = $client->getError();
            if ($err) {
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
                die();
            } else {
                if ($resultStr == '0') {
                    return true;
                }
                return $resultStr;
            }
        }
        return false;
    }


    public function checkPayment($RefId, $ResCode, $SaleOrderId, $SaleReferenceId)
    {
        $params["RefId"] = $RefId;
        $params["ResCode"] = $ResCode;
        $params["SaleOrderId"] = $SaleOrderId;
        $params["SaleReferenceId"] = $SaleReferenceId;

        if ($params["ResCode"] == 0) {
            if ($this->verify($RefId, $ResCode, $SaleOrderId, $SaleReferenceId) == true) {
                if ($this->settlePayment($RefId, $ResCode, $SaleOrderId, $SaleReferenceId) == true) {
                    parent::updateOrder($RefId,$ResCode);
                    return array(
                        "status" => "success",
                        "trans" => $params["SaleReferenceId"]
                    );
                }
            }
        }
        parent::updateOrderErorr($RefId,$ResCode);
        return false;
    }


}


