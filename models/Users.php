<?php

namespace app\models;

class Users extends DbModel {
    public $id;
    public $login;
    public $hash;

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