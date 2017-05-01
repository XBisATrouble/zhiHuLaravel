<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/1
 * Time: 23:22
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function byId($id)
    {
        return User::find($id);
    }
}