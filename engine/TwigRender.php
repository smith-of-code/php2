<?php


namespace app\engine;


use app\interfaces\IRenderer;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TwigRender implements IRenderer
{
    public $twig = null;

    public function __construct()
    {
        $loader = new FilesystemLoader(TWIG_TEMPLATES_DIR);
        $this->twig = new Environment($loader,[]);
    }


    public function renderTemplate($template, $params = []) {

        return $this->twig->render($template . '.twig', $params);

    }

}