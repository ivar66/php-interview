<?php
/**
 * 输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有的奇数位于数组的前半部分，所有的偶数位于位于数组的后半部分，并保证奇数和奇数，偶数和偶数之间的相对位置不变。
 *
 * User: dukang
 * Date: 2020/4/26
 * Time: 下午8:22
 */
//todo 暂未测试
function reOrderArray($array){
    $arr1 = [];
    $arr2 = [];
    foreach($array as $item){
        if($item % 2 == 0){
            $arr1[] = $item;
        }else{
            $arr2[] = $item;
        }
    }

    foreach($arr1 as $item){
        $arr2[] = $item;
    }
    return $arr1;
}