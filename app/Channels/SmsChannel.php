<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use SoapClient;

class SmsChannel
{

    public function send($notifiable, Notification $notification)
    {
         if(!env('SEND_SMS')){
            return 'done!';
        }
        if ($notifiable->routes) {
            $toNum = $notifiable->routes['cellphone'];
        } else {
            $toNum = $notifiable->cellphone;
        }
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $user = "09162418808";
        $pass = "Faraz@5650064490";
        $fromNum = "+983000505";
        $toNum = array($toNum);
        $pattern_code = "w7crq4x8hwp667i";
        $input_data = array("code" => $notification->toSms($notifiable));
        $bulkId = $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}
