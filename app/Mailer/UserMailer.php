<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/11
 * Time: 18:00
 */

namespace App\Mailer;


use Auth;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email)
    {
        $data = [
            'url' => 'http://zhihu-app.dev:8080/home',
            'name'=>Auth::guard('api')->user()->name,
        ];

        $this->sendTo('zhihu_password_reset',$email,$data);
    }

    public function passwordReset($email,$token)
    {
        $data = [
            'url' => url('password/reset',$token)
        ];

        $this->sendTo('zhihu_password_reset',$email,$data);
    }

    public function welcome(User $user)
    {
        $data = [
            'url' => route('email.verify',['token'=>$user->confirmation_token]),
            'name'=>$user->name
        ];

        $this->sendTo('jobs_register',$user->email,$data);
    }
}