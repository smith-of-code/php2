<?php

namespace app\models;

class Users extends DbModel {
    protected $id;
    protected $login;
    protected $hash;

    protected $props = [
        'login' => false,
    ];
       public function __construct($login = null, $hash = null)
    {

        $this->login = $login;
        $this->hash = $hash;
    }

    public static function getTableName()
    {
        return 'users';
    }
}