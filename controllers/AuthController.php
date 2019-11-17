<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Users;

class AuthController extends Controller
{
    public function actionLogin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['pass'];
        if (!Users::auth($login,$pass)){
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