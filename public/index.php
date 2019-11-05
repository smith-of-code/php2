<?php

use app\models\{Product, Users, Cart, ConfirmCarts};
use app\engine\Db;


include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);


$prod = new Product(new Db());

var_dump($prod->getAll());






include '../task3/Product.php';
use \app\task3\{DigProduct,OneProduct,WtProduct};

echo (new DigProduct('nike','x600',1));


echo (new OneProduct('adik','g4444'));


echo (new WtProduct('uran','235',0.6));
