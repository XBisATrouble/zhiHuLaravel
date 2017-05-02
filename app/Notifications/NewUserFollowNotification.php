<?php

namespace App\Notifications;

use App\Channels\SendCloudChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Naux\Mail\SendCloudTemplate;
use Mail;

class NewUserFollowNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',SendCloudChannel::class];
    }

    public function toDatabase($notifiable)
    {
        return [
            'name'=> Auth::guard('api')->user()->name,
        ];
    }

    public function toSendcloud($notifiable)
    {
        $data = [
            'url' => 'http://zhihu-app.dev:8080/home',
            'name'=>Auth::guard('api')->user()->name,
        ];
        $template = new SendCloudTemplate('zhihu_password_reset', $data);

        Mail::raw($template, function ($message) use ($notifiable){
            $message->from('XBisATrouble@gmail.com', 'Zhihu');
            $message->to($notifiable->email);
        });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
