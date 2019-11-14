<?php


namespace app\engine;


use app\interfaces\IRenderer;
use \Twig\Loader\FilesystemLoader;
use \Twig\Environment;

class TwigRender implements IRenderer
{
    public static $twig = null;

    private function getTwig(){
        if (is_null(static::$twig)){
            $loader = new FilesystemLoader(TWIG_TEMPLATES_DIR);
           static::$twig = new Environment($loader,[]);

        }
        return static::$twig;

}

    public function renderTemplate($template, $params = []) {

        return $this->getTwig()->render($template . '.twig', $params);

    }

}