<?php
namespace app\task3;

abstract class Product
{
    public $brand = null;
    public $title = null;
    public $price = null;

    private static $percentGain = 20;

    public function __construct($brand = null, $title = null)
    {
        $this->brand = $brand;
        $this->title = $title;
    }

    abstract protected function allPrice();

    public function getGain(){
        return $this->allPrice() / 100 * self::$percentGain;
    }

    public function getFullPrice(){
        return  $this->allPrice() + $this->getGain();
    }

    public function __toString()
    {
       return "
        <hr>
           <p>Брэнд: {$this->brand}</p>
        <p>Модель: {$this->title}</p>
       <p>Стоимость с учетом наценки: {$this->getFullPrice()}</p>
       <p>Прибыль {$this->getGain()}</p>
       <hr>
       ";
    }

}


class DigProduct extends Product
{

    public $price = 100;
    public $count = null;


    public function __construct($brand = null, $title = null, $count =  0)
    {
        $count = (int) $count;
        parent::__construct($brand,$title);
        $this->count = $count;
    }


    protected function allPrice()
    {
        return $this->price * $this->count;
    }

}

class OneProduct extends Product
{

    public function __construct($brand = null, $title = null)
    {
        parent::__construct($brand,$title);
    }

    protected function allPrice()
    {
        return $this->price = (new DigProduct())->price * 2;

    }

}

class WtProduct extends Product
{
    public $price = 500;
    public $weight = null;


    public function __construct($brand = null, $title = null, $weight = 0)
    {
        $weight = (float)$weight;
        parent::__construct($brand,$title);
        $this->weight = $weight;
    }


    protected function allPrice()
    {
        return $this->price * $this->weight;
    }
}



