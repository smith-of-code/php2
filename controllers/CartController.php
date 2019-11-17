<?php


namespace app\controllers;

use app\engine\Request;
use app\models\Cart;

class CartController extends Controller
{

    public function actionIndex(){
        $cart = Cart::getCart(session_id());
        echo $this->render('cart', ['cart'=>$cart]);
    }

    public function actionAddToCart(){
        $id = (new Request())->getParams()['id'];
        (new Cart(session_id(), $id))->save();
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => Cart::getCountWhere('session_id', session_id())]);
        die();
    }
    public function actionDelFromCart(){

        $id = (new Request())->getParams()['id'];
        $cart = new Cart();
        $cart->id = $id;
        $cart->delete();
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => Cart::getCountWhere('session_id', session_id())]);
        die();


        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => Cart::getCountWhere('session_id', session_id())]);
        die();
    }
}