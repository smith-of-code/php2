<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Users;
use app\models\repositories\UsersRepository;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        if (!(new UsersRepository())->auth($login,$pass)){
            die("Неверный пароль");
        }else
            header("Location: /");
        exit();
    }

    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}