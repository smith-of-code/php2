<?php

namespace app\models;

class Cart extends DbModel {
    public $id;
    public $session_id;
    public $product_id;
    public $count;

    public $props = [
        'session_id'=> false,
        'product_id'=> false,
        'count'=> false
    ];

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
