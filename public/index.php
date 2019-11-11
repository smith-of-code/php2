<?php

use app\models\{Product, Users, Cart, ConfirmCarts};
use app\engine\{Db,Autoload};

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$url = explode('/', $_SERVER['REQUEST_URI']);

$controllerName = empty($url[1])? 'product': $url[1];
$actionName = empty($url[2])? 'index': $url[2];

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";


if (class_exists($controllerClass)){
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}else{
    echo "404(нет такого класса)";
}














//$prod = new Product('боты', 'lorem lorem','loremloremloremloremloremloremlorem','boots','одежда',100);
//var_dump($prod);
//$prod->save();
//var_dump($prod);
//$prod->delete();
