<?php

namespace app\models;

class Product extends Model {
    public $id = null;
    public $name = null;
    public $short_desc = null;
    public $full_desc = null;
    public $image = null;
    public $category = null;
    public $price = null;

    public function getTableName()
    {
        return 'products';
    }

}