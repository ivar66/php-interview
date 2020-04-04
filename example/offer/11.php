<?php
/**
 * 输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。
 *
 * User: dukang03
 * Date: 2020/4/4
 * Time: 下午6:51
 */

function NumberOf1($number){
    if ($number == 0){
        return 0;
    }
    $count = 0;
    if($number < 0){
        $number = $number & 0x7FFFFFFF;
        $count++;
    }
    while ($number !=0){
        $count ++;
        $number = $number & ($number-1);
    }
    return $count;
}

$number = 1;
print_r(NumberOf1($number));