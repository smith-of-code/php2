<?php

namespace app\models;

class ConfirmCarts extends Model {
    public $id = null;
    public $session_id = null;
    public  $name = null;
    public $status = null;
    public $phone = null;

    public function getTableName()
    {
     return 'confirm_carts';
    }
}
