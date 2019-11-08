<?php

namespace app\models;

use app\engine\Db;

class Product extends DbModel {
    public $id;
    public $name;
    public $short_desc;
    public $full_desc;
    public $image;
    public $category;
    public $price;



    public function __construct(
                                $name = null,
                                $short_desc = null,
                                $full_desc = null,
                                $image = null,
                                $category = null,
                                $price = null)
    {
        $this->name = $name;
        $this->short_desc = $short_desc;
        $this->full_desc = $full_desc;
        $this->image = $image;
        $this->category = $category;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }

}