<?php


namespace app\controllers;

use app\models\Cart;

class CartController
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this,$method)){
            $this->$method();
        }else{
            echo '404 (нет action)';
        }
    }

    public function actionIndex(){
        $catalog = Cart::getAll();
        echo $this->render('cart', ['carts'=>$catalog]);
    }

    public function render($template, $params = []){
        if ($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate("menu"),
                'content' => $this->renderTemplate($template,$params),
            ]);
        }else{
            return $this->renderTemplate($template, $params = []);
        }

    }

    public function renderTemplate($template, $params = []){
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . '.php';
        if (file_exists($templatePath)){
            include $templatePath;
        }
        return ob_get_clean();
    }
}