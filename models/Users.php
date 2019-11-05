<?php

namespace app\models;

class Users extends Model {
    public $id = null;
    public $login = null;
    public $hash = null;

    public function getTableName()
    {
        return 'users';
    }
}