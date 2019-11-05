<?php

namespace app\models;

class Cart extends Model {
    public $id = null;
    public $session_id = null;
    public $product_id = null;
    public $count = null;

    public function getTableName()
    {
     return 'cart';
    }

}
