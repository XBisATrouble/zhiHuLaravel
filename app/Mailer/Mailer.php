<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/11
 * Time: 17:58
 */

namespace App\Mailer;


use Mail;
use Naux\Mail\SendCloudTemplate;

class Mailer
{
    public function sendTo($template,$email,array $data)
    {
        $content = new SendCloudTemplate($template, $data);

        Mail::raw($content, function ($message) use ($email){
            $message->from('XBisATrouble@gmail.com', 'Zhihu');
            $message->to($email);
        });
    }
}