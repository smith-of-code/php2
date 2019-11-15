<?php

namespace app\models;

use app\engine\Db;

class Product extends DbModel {
    protected $id;
    protected $name;
    protected $short_desc;
    protected $full_desc;
    protected $image;
    protected $category;
    protected $price;

    protected $props = [
        'name'=> false,
        'short_desc'=> false,
        'full_desc'=> false,
        'image'=> false,
        'category'=> false,
        'price'=> false,
    ];

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