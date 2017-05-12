<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/12
 * Time: 8:35
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
    public function create(array $attributes)
    {
        return Message::create($attributes);
    }
}