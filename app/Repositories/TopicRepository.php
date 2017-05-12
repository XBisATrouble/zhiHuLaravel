<?php
/**
 * Created by PhpStorm.
 * User: 10656
 * Date: 2017/5/12
 * Time: 10:44
 */

namespace App\Repositories;


use App\Topic;
use Request;

class TopicRepository
{
    public function getTopicsForTagging(Request $request)
    {
        $topics=Topic::select(['id','name'])
            ->where('name','like','%'.$request->query('q').'%')
            ->get();
        return $topics;
    }
}