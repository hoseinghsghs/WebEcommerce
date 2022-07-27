<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use SoapClient;

class SmsChannel
{

    public function send($notifiable, Notification $notification)
    {
        return 'done!';
        if ($notifiable->routes) {
            $toNum = $notifiable->routes['cellphone'];
        } else {
            $toNum = $notifiable->cellphone;
        }
        $client = new SoapClient("http://ippanel.com/class/sms/wsdlservice/server.php?wsdl");
        $user = "09133184182";
        $pass = "faraz1285854233";
        $fromNum = "+983000505";
        $toNum = array($toNum);
        $pattern_code = "ey185742by";
        $input_data = array("code" => $notification->toSms($notifiable));
        $bulkId = $client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}