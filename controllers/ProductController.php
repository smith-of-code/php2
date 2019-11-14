<?php


namespace app\controllers;


use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex(){
        echo $this->render('index');
    }
    public function actionCatalog(){
        $catalog = Product::getLimit();
        echo $this->render('catalog', ['catalog'=>$catalog]);
    }
    public function actionCard(){
        $id =$_GET['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
    public function actionApiCatalog() {
        $catalog = Product::getAll();
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function actionApiLimit() {
        $from = $_GET['from'];
        $to = $_GET['to'];
        $catalog = Product::getLimit($from,$to);
        echo json_encode($catalog, JSON_UNESCAPED_UNICODE);
        die();
    }
}