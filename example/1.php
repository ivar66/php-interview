<?php

class Car{
    // 下面是车的属性
    private $color;
    private $name;

    public function __construct($color,$name) {
        $this->color = $color;
        $this->name = $name;
    }

    public function printCar(){
        echo '汽车颜色是'.$this->color."\n";
    }

    public function __destruct(){
        echo"这是一个析构方法";
    }

    function tes(string $name):array {

    }
}

$obj = new Car('red','bmw mini');
$obj->printCar();