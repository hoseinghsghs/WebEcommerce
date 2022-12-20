<?php

namespace App\PaymentGateway;

use App\Models\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class Pay extends Payment
{
    public $orderID;
    public function send($amounts, $addressId, $description, $ip)
    {
        $api = '92b62008e431ebb20b46ab7b7147bc7b';
        $amount = $amounts['paying_amount'] . '0';
        $redirect = route('home.payment_verify', ['gatewayName' => 'pay']);
        $phone = auth()->user()->cellphone;
        $result = $this->sendRequest($api, $amount, $redirect, $description, $phone);
        $result = json_decode($result);
        if ($result) {
            if ($result->status) {

                $createOrder = parent::createOrder($addressId, $amounts, $result->token, 'pay', $description,  $ip);

                if (array_key_exists('error', $createOrder)) {
                    return $createOrder;
                }
                $go = "https://pay.ir/pg/$result->token";
                return ['success' => $go, 'orderId' => $createOrder['orderId']];
            } else {
                try {
                    Log::info("مشکل در ورودی اطلاعات", [
                        'user_id' => auth()->id(),
                        'موبایل' => auth()->user()->cellphone,
                        'کد ارور' => $result["Status"]
                    ]);
                } catch (\Throwable $th) {
                }
                try {
                    $event = Event::create([
                        'title' => "مشکل در ورودی اطلاعات" . " " . "آدرس ip" . " " . $ip . " " . "درگاه پرداخت : " . " " . "پی پل",
                        'body' => 'شماره تلفن' . " " . auth()->user()->cellphone . " " . 'آیدی کاربر' . " " . auth()->id() . " " . "کد خطا" . $result->errorMessage . $result->errorCode,
                        'user_id' => auth()->id(),
                        'eventable_id' => auth()->id(),
                        'eventable_type' => User::class,
                    ]);
                } catch (\Throwable $th) {
                }
                return ['error' => $result->errorMessage];
            }
        } else {
            return ['error' => 'مشکل ارتباط با درگاه پرداخت'];
        }
    }

    public function verify($token, $status)
    {
        $api = '92b62008e431ebb20b46ab7b7147bc7b';
        $token = $token;
        $result = json_decode($this->verifyRequest($api, $token));
        if ($result) {
            if (isset($result->status)) {
                if ($result->status == 1) {
                    $updateOrder = parent::updateOrder($token, $result->transId);

                    if (array_key_exists('error', $updateOrder)) {
                        return $updateOrder;
                    }
                    \Cart::clear();
                    return ['success' => ' پرداخت با موفقیت انجام شد.شماره تراکنش' . $result->transId];
                } else {
                    dd($result->errorCode);
                    $updateOrder = parent::updateOrderErorr($token, $result['errorCode']);
                    return ['error' => 'پرداخت با خطا مواجه شد'];
                }
            } else {
                if ($status == 0) {
                    $updateOrder = parent::updateOrderErorr($token, $result['Status']);
                    return ['error' => 'پرداخت با خطا مواجه شد'];
                }
            }
            return ['error' => 'درگاه پرداخت مشکل دارد'];
        }
    }

    public function sendRequest($api, $amount, $redirect, $description = null, $mobile = null, $factorNumber = null,)
    {
        return $this->curl_post('https://pay.ir/pg/send', [
            'api'          => $api,
            'amount'       => $amount,
            'redirect'     => $redirect,
            'mobile'       => $mobile,
            'factorNumber' => $factorNumber,
            'description'  => $description,
        ]);
    }

    public function verifyRequest($api, $token)
    {
        return $this->curl_post('https://pay.ir/pg/verify', [
            'api'     => $api,
            'token' => $token,
        ]);
    }

    public function curl_post($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
}
