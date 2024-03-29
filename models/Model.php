<?php


namespace app\models;


abstract class Model
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