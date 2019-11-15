<?php


namespace app\controllers;


use app\interfaces\IRenderer;
use app\models\Product;

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
                'menu' => $this->renderTemplate("menu"),
                'content' => $this->renderTemplate($template,$params),
            ]);
        }else{
            return $this->renderTemplate($template, $params = []);
        }

    }

    public function renderTemplate($template, $params = []){
        return $this->renderer->renderTemplate($template, $params);
    }
}