<?php

namespace app\models;

class Cart extends DbModel {
    protected $id;
    protected $session_id;
    protected $product_id;
    protected $count;

    protected $props = [
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
