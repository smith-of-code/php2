<?php

namespace app\models;

class Cart extends Model {
    public $id;
    public $session_id;
    public $product_id;
    public $count;

    public function __construct($id = null, $session_id = null, $product_id = null, $count = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->count = $count;
    }


    public function getTableName()
    {
     return 'cart';
    }

}
