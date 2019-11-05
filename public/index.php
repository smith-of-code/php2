<?php

use app\models\{Product, Users, Cart, ConfirmCarts};
use app\engine\{Db,Autoload};

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$prod = new Product(null,'боты', 'lorem lorem','loremloremloremloremloremloremlorem','boots','одежда',100);

//$prod->insert();
//var_dump($prod);
//$prod->delete();

$prod2 = new Product();
$prod2->getOne(1);
var_dump($prod2);

$user2 = new Users();
$user2->getOne(1);
var_dump($user2);

$cart2 = new Cart();
$cart2->getOne(1);
var_dump($cart2);

$confirmCart2 = new ConfirmCarts();
$confirmCart2->getOne(1);
var_dump($confirmCart2);
