<?php

namespace app\models;

class ConfirmCarts extends DbModel {
    protected $id;
    protected $session_id;
    protected $name;
    protected $status;
    protected $phone;

    protected $props = [
        'namev'=> false,
        'statusv'=> false,
        'phonev'=> false,
    ];

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
