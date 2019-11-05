<?php

namespace app\models;

class Users extends Model {
    public $id;
    public $login;
    public $hash;

       public function __construct($id = null, $login = null, $hash = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->login = $login;
        $this->hash = $hash;
    }

    public function getTableName()
    {
        return 'users';
    }
}