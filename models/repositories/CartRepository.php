<?php


namespace app\models\repositories;

use app\models\entities\Cart;
use app\models\Repository;
use app\engine\Db;

class CartRepository extends Repository
{
    public function getCart($session) {
        $sql = "SELECT p.id id_prod, c.id id_cart, p.name, p.short_desc, p.price, p.image 
                FROM cart c,products p 
                WHERE c.product_id=p.id 
                AND session_id = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
    public function getTableName()
    {
        return 'cart';
    }

    public function getEntityClass()
    {
    return Cart::class;
    }

}