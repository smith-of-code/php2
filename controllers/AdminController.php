<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Orders;
use app\models\repositories\OrdersRepository;
use app\models\repositories\UsersRepository;

class AdminController extends Controller
{
    public function actionIndex() {
        if ((new UsersRepository())->getName() === 'admin'){
            $orders= (new OrdersRepository())->getAll();
            echo $this->render('admin',['orders' => $orders]);
        }else{
            echo 'Вы не админ!!!!!!!!!';
        }

    }

    public function actionChangeStatus() {
        $id = (new Request())->getParams()['id'];
        $status = (new Request())->getParams()['status'];

        $order = (new OrdersRepository())->getOne($id);
        $order->status = $status;
        (new OrdersRepository())->save($order);

        header('Content-Type: application/json');
        echo json_encode(['response' => 'ok']);
        die();
    }

}