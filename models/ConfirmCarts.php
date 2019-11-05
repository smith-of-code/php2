<?php

namespace app\models;

class ConfirmCarts extends Model {
    public $id;
    public $session_id;
    public  $name;
    public $status;
    public $phone;


    public function __construct($id = null, $session_id = null, $name = null, $status = null, $phone = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->session_id = $session_id;
        $this->name = $name;
        $this->status = $status;
        $this->phone = $phone;
    }


    public function getTableName()
    {
     return 'confirm_carts';
    }
}
