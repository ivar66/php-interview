<?php
/**
 * DESC:一只青蛙一次可以跳上1级台阶，也可以跳上2级。求该青蛙跳上一个n级的台阶总共有多少种跳法（先后次序不同算不同的结果）。
 * User: jack-dukang
 * Date: 2020/4/4
 * Time: 下午2:50
 */

function jumpFloor($number){
    if ($number == 1){
        return 1;
    }
    if ($number == 2){
        return 2;
    }
    $first = 1;
    $second = 2;
    $third = 0;
    for ($i = 3;$i <= $number;$i ++ ){
        $third = $first + $second;
        $first = $second;
        $second = $third;
    }
    return $third;
}

$number = 3;
print_r(jumpFloor($number));