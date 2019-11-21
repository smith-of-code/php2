<?php


namespace app\controllers;

use app\engine\Request;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;

class CartController extends Controller
{

    public function actionIndex(){
        $cart = (new CartRepository())->getCart(session_id());
        echo $this->render('cart', ['cart'=>$cart]);
    }

    public function actionAddToCart()
    {
        $id = (new Request())->getParams()['id'];
        (new CartRepository())->save(new Cart(session_id(), $id));
        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new CartRepository())->getCountWhere('session_id', session_id())]);
        die();
    }
    public function actionDelFromCart(){

        $id = (new Request())->getParams()['id'];
        (new CartRepository())->deleteWhere($id,'session_id',session_id());
         header('Content-Type: application/json');
        echo json_encode(['response' => 'ok', 'count' => (new CartRepository())->getCountWhere('session_id', session_id())]);
        die();
    }
    public function actionCreateOrders(){


    }
}