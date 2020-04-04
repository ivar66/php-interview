<?php
/**
 * DESC:一只青蛙一次可以跳上1级台阶，也可以跳上2级……它也可以跳上n级。求该青蛙跳上一个n级的台阶总共有多少种跳法。
 * 解析: f(n) = f(n-1) + f(n-2)+....f(1)
 *      f(n) = 2 * f(n-1)
 * User: dukang03
 * Date: 2020/4/4
 * Time: 下午4:50
 */

function jumpFloorII($number){
    if ($number == 1){
        return 1;
    }
    $first = 1;
    $second = 0;
    for ($i = 2;$i <= $number;$i++){
        $second = 2 *  $first;
        $first = $second;
    }
    return $second;
}