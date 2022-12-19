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
        $result=$notification->toSms($notifiable);

        if (empty($result['numbers'])){
             if ($notifiable->routes) {
                 $toNum = $notifiable->routes['cellphone'];
             } else {
                 $toNum = $notifiable->cellphone;
             }
             $toNum = array($toNum);
         }else{
             $toNum=$result['numbers'];
         }

        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $user = "09162418808";
        $pass = "Faraz@5650064490";
        $fromNum = "+983000505";
//        $toNum = array($toNum);
        $pattern_code = $result['pattern_code'];
        $input_data = $result['pattern_variables'];
        $bulkId = $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}
