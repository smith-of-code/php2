<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Users;
use app\models\repositories\OrdersRepository;
use app\models\repositories\ProductRepositiry;
use app\models\repositories\UsersRepository;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];

        $save = ((new Request())->getParams()['save']);

        if (!(new UsersRepository())->auth($login,$pass,$save)){

            die("Неверный пароль");
        }else
            header("Location: /");
        exit();
    }

    public function actionLogout() {
        setcookie("hash", "", time() - 3600, "/");
        session_destroy();
        header("Location: /");
        exit();
    }


}