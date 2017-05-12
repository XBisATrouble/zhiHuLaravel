<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/12
 * Time: 10:31
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create(array $attributes)
    {
        return Comment::create($attributes);
    }
}