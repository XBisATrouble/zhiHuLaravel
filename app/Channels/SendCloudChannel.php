<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/2
 * Time: 12:47
 */

namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendCloudChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSendcloud($notifiable);
    }
}