<?php

namespace app\models;

class Users extends DbModel {
    protected $id;
    protected $login;
    protected $pass;
    protected $hash;

    protected $props = [
        'login' => false,
    ];
       public function __construct($login = null, $pass = null, $hash = null)
    {

        $this->login = $login;
        $this->pass = $pass;
        $this->hash = $pass;
    }
    public static function isAuth()
    {
           return isset($_SESSION['login']) ? true: false;
    }
    public static function getName()
    {
            return $_SESSION['login'];
    }
    public static function auth($login,$pass)
    {

               $user = static::getWhere('login',$login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            return true;
        }
    }

    public static function getTableName()
    {
        return 'users';
    }
}