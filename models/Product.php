<?php

namespace app\models;

use app\engine\Db;

class Product extends Model {
    public $id;
    public $name;
    public $short_desc;
    public $full_desc;
    public $image;
    public $category;
    public $price;

    public function __construct($id = null,
                                $name = null,
                                $short_desc = null,
                                $full_desc = null,
                                $image = null,
                                $category = null,
                                $price = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->short_desc = $short_desc;
        $this->full_desc = $full_desc;
        $this->image = $image;
        $this->category = $category;
        $this->price = $price;
    }


    public function getTableName()
    {
        return 'products';
    }

}