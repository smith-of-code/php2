<?php


namespace app\models;

use app\interfaces\IModels;

abstract class Model implements IModels
{
    public function __set($name, $value)
    {
        if (!isset($this->props[$name])){
            exit();
        }

        $this->props[$name] = true;
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
    public function __isset($name)
    {
        return isset($this->$name);
    }
}