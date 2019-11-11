<?php

namespace app\models;

class ConfirmCarts extends DbModel {
    public $id;
    public $session_id;
    public  $name;
    public $status;
    public $phone;


    public function __construct($session_id = null, $name = null, $status = null, $phone = null)
    {

        $this->session_id = $session_id;
        $this->name = $name;
        $this->status = $status;
        $this->phone = $phone;
    }


    public static function getTableName()
    {
     return 'confirm_carts';
    }
}
