<?php


namespace app\models\repositories;

use app\models\entities\Users;
use app\models\Repository;;


class UsersRepository extends Repository
{
    public function isAuth()
    {
        return isset($_SESSION['login']) ? true: false;
    }
    public function getName()
    {
        return $_SESSION['login'];
    }

    public function auth($login,$pass,$save)

    {

        $user = static::getWhere('login',$login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;

            $hash = uniqid(rand(), true);
            $user->hash = $hash;
            static::save($user);

            if ($save){
                setcookie("hash", $hash, time() + 3600, "/");
            }

            return true;
        }
    }

    public function getTableName()
    {
        return 'users';
    }
    public function getEntityClass()
    {
        return Users::class;
    }
}