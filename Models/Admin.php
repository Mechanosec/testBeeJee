<?php


namespace Models;


class Admin extends Model
{
    public static $tableName = 'admins';

    public static function login($request)
    {
        return self::query()->select()
            ->where('login', $request['login'])
            ->where('password', md5($request['password']))
            ->one();
    }
}