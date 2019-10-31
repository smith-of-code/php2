<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
echo '<hr>';
//1234//Потому что $x привязывается к классу а не к экзэмпляру.



class C {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends C {
}
$a1 = new C();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
echo '<hr>';
//1122//Происходит тоже самое, только теперь у экземпляров разные классы и поэтому такой вывод

class D {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class E extends D {
}
$a1 = new D;
$b1 = new E;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();

//1122//Этот пример ничем не отличается от предыдущего, если при создании экзэмпляра не передаются аргументы то скобки
// можно не ставить.
