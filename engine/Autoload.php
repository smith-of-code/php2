<?php


class Autoload
{

    public function loadClass($className) {

        $filename = str_replace(['app\\','\\'], ['','/'] , "{$className}.php");
        $filename = dirname(__DIR__) . "/$filename";

            if (file_exists($filename)){
                include $filename;
            }
    }

}