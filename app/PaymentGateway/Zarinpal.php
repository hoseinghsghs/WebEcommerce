<?php

namespace App\PaymentGateway;

class Zarinpal extends Payment
{
    public function send($amounts, $description, $addressId ,$ip)
    {
        $data = array(
            'MerchantID' => 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            'Amount' => $amounts['paying_amount'],
            'CallbackURL' => route('home.payment_verify' , ['gatewayName' => 'zarinpal']),
            'Description' => $description
        );

        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentRequest.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));

        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true);
        curl_close($ch);
        if ($err) {
            return ['error' => "خطای اتصال به درگاه بانکی"];
            // return ['error' => "cURL Error #:" . $err];
        } else {
            if ($result["Status"] == 100) {

                $createOrder = parent::createOrder($addressId, $amounts, $result["Authority"], 'zarinpal',$description , $ip);
                if (array_key_exists('error', $createOrder)) {
                    return $createOrder;
                }

                return ['success' => 'https://sandbox.zarinpal.com/pg/StartPay/' . $result["Authority"] , 'orderId' => $createOrder['orderId']];
            } else {

                return ['error' => 'ERR: ' . $result["Status"] , ];
            }
        }
    }

    public function verify($authority, $amount)
    {
        $MerchantID = 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx';

        $data = array('MerchantID' => $MerchantID, 'Authority' => $authority, 'Amount' => $amount);
        $jsonData = json_encode($data);
        $ch = curl_init('https://sandbox.zarinpal.com/pg/rest/WebGate/PaymentVerification.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        $result = json_decode($result, true);
        if ($err) {
            $updateOrder = parent::updateOrderErorr($authority,$err);
            return ['error' => "درگاه بانکی قطع است"];
        } else {
            if ($result['Status'] == 100) {
                $updateOrder = parent::updateOrder($authority, $result['RefID']);
                if (array_key_exists('error', $updateOrder)) {
                    return $updateOrder;
                }
                \Cart::clear();
                return ['success' => 'Transation success. RefID:' . $result['RefID']];
            } else {
                $updateOrder = parent::updateOrderErorr($authority,$result['Status']);
                return ['error' => 'پرداخت با خطا مواجه شد'];
            }
        }
    }
}