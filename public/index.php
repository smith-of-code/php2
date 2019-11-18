<?php
session_start();
use app\models\{Product, Users, Cart, ConfirmCarts};
use app\engine\{Db,Autoload,Render,TwigRender,Request};

include realpath("../config/config.php") ;
include realpath("../engine/Autoload.php") ;
include realpath("../vendor/autoload.php");

spl_autoload_register([new Autoload(), 'loadClass']);


$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";


if (class_exists($controllerClass)){
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
}else{
    echo "404(нет такого класса)";
}














//$prod = new Product('боты', 'lorem lorem','loremloremloremloremloremloremlorem','boots','одежда',100);
//$prod->save();
//var_dump($prod);

//$prod3 = Product::getOne(113);
//
//$prod3->name = 'кепка';
//var_dump($prod3);
//$prod3->price = 300;
//
//$prod3->save();
//var_dump($prod3);
//var_dump($prod);
//$prod->delete();

