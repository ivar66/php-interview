<?php

/**
 * @param Integer $m
 * @param Integer $n
 * @return Integer
 */
function uniquePaths($m, $n) {
    $dp = [];
    for($i = 1;$i<=$m;$i++){
        $dp[$i][1] = 1;
    }
    for($j = 1;$j<=$n;$j++){
        $dp[1][$j] = 1;
    }
    for($i = 2;$i<=$m;$i++){
        for($j =2 ;$j<=$n;$j++){
            $dp[$i][$j] = $dp[$i-1][$j] + $dp[$i][$j-1];
        }
    }

    return $dp[$m][$n];
}

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