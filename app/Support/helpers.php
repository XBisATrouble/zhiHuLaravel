<?php

if (!function_exists('user'))
{
    /**
     * @param null $dirver
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    function user($dirver=null)
    {
        if ($dirver)
        {
            return app('auth')->guard($dirver)->user(); //user('api');
        }

        return app('auth')->user(); //user('api');
    }
}