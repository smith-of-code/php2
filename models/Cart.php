<?php

namespace app\models;

class Cart extends DbModel {
    public $id;
    public $session_id;
    public $product_id;
    public $count;

    public function __construct($session_id = null, $product_id = null, $count = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }


    public static function getTableName()
    {
     return 'cart';
    }

}
