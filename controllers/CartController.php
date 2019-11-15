<?php


namespace app\controllers;

use app\models\Cart;

class CartController extends Controller
{

    public function actionIndex(){
        $catalog = Cart::getAll();
        echo $this->render('cart', ['carts'=>$catalog]);
    }
}