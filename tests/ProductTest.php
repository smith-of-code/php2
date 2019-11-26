<?php
use \app\models\entities\Product;


class ProductTest extends \PHPUnit\Framework\TestCase
{
public function testProduct()
{
    $name = 'чай';
    $product = new Product($name);
    $this->assertEquals($name, $product->name);
}
}