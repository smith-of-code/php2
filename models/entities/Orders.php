<?php

namespace app\models\entities;

use app\models\Model;

class Orders extends Model {
    protected $id;
    protected $session_id;
    protected $name;
    protected $status;
    protected $phone;

    protected $props = [
        'session_id' => false,
        'name' => false,
        'status' => false,
        'phone' => false,
    ];

    public function __construct($session_id = null, $name = null, $status = null, $phone = null)
    {

        $this->session_id = $session_id;
        $this->name = $name;
        $this->status = $status;
        $this->phone = $phone;
    }


}