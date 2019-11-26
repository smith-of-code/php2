<?php


namespace app\controllers;


use app\interfaces\IRenderer;
use app\models\entities\Product;
use app\models\entities\Users;
use app\models\entities\Cart;
use app\models\repositories\CartRepository;
use app\models\repositories\UsersRepository;

class Controller implements IRenderer
{
    private $action;
    private $defaultAction = 'index';
    private $layout = 'main';
    private $useLayout = true;
    private $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function runAction($action = null){
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this,$method)){
            $this->$method();
        }else{
            echo '404 (нет action)';
        }
    }



    public function render($template, $params = []){
        if ($this->useLayout){
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate("menu",[
                'count' => (new CartRepository())->getCountWhere('session_id', session_id())
                ]),
                'content' => $this->renderTemplate($template,$params),
                'auth' => (new UsersRepository())->isAuth(),
                'username' => (new UsersRepository())->getName(),
            ]);
        }else{
            return $this->renderTemplate($template, $params = []);
        }

    }

    public function renderTemplate($template, $params = []){
        return $this->renderer->renderTemplate($template, $params);
    }
}