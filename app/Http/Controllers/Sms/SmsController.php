<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function sendSMS($recipient, $message){
       
        $key = "w8DtjtYIswDOqHbXlcN0DgKDy";
        
         $msg = $message;
      
        $sender_id = "GNFS";
        
        $msg = urlencode($msg);
        
        $url = "https://apps.mnotify.net/smsapi?"
                    . "key=$key"
                    . "&to=$recipient"
                    . "&msg=$msg"
                    . "&sender_id=$sender_id";
                    
        $response = file_get_contents($url);

        return $response;
       
     }
}
