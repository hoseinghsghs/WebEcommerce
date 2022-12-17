<?php

namespace App\PaymentGateway;
//require_once("mellat/nusoap.php");

use nusoap_client;

use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
//use App\PaymentGateway\mellat\nusoap;
use Verta;

class Mellat extends Payment
{
    public $orderID;

    public function send($amounts, $addressId, $description, $ip)
    {

		$createOrder = parent::createOrder($addressId, $amounts, '0', 'mellat', $description, $ip);
        $terminalId = "6814608";                            //-- شناسه ترمینال
        $userName = "lik404";                            //-- نام کاربری
        $userPassword = "31776521";                            //-- کلمه عبور
        $orderId = rand(10 , 100 );                                //-- شناسه فاکتور
        $amount = $amounts['paying_amount'];                            //-- مبلغ به ریال
        $localDate = date('Ymd');
        $localTime = date('Gis');
        $additionalData = $description;
        $callBackUrl = route('home.payment_verifyMallat');    //-- لینک کال بک
        $payerId = 0;

//-- تبدیل اطلاعات به آرایه برای ارسال به بانک
        $parameters = array(
            'terminalId' => $terminalId,
            'userName' => $userName,
            'userPassword' => $userPassword,
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
            die("خطا در اتصال به وب سرویس بانک");
        } else {
            $err = $client->getError();

            if ($err) {
                //-- نمایش خطا
                die($err);
            } else {
                $res = explode(',', $result);
                $ResCode = $res[0];

                if ($ResCode == "0") {
                    //-- انتقال به درگاه پرداخت
                    echo "<form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'><input type='hidden' id='RefId' name='RefId' value='{$res[1]}'></form><script type='text/javascript'>window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>";
                } else {
                    //-- نمایش خطا
                    die($result);
                }
            }
        }
    }

    public function verify($token, $status)
    {
        $terminalId = $_POST['TerminalId'];
        $userName = $_POST['UserName'];
        $userPassword = $_POST['UserPassword'];
        $orderId = $_POST['VerifyOrderId'];
        $verifySaleOrderId = $_POST['VerifySaleOrderId'];
        $verifySaleReferenceId = $_POST['VerifySaleReferenceId'];

        // Check for an error
        $err = $client->getError();
        if ($err) {
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
            die();
        }

        $parameters = array(
            'terminalId' => $terminalId,
            'userName' => $userName,
            'userPassword' => $userPassword,
            'orderId' => $orderId,
            'saleOrderId' => $verifySaleOrderId,
            'saleReferenceId' => $verifySaleReferenceId);

        // Call the SOAP method
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
                // Display the result
                // Update Table, Save Verify Status
                // Note: Successful Verify means complete successful sale was done.
                echo "<script>alert('Verify Response is : " . $resultStr . "');</script>";
                echo "Verify Response is : " . $resultStr;
            }// end Display the result
        }// end Check for errors

    }


}


