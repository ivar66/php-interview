<?php
/**
 * DESC：在一个二维数组中（每个一维数组的长度相同），每一行都按照从左到右递增的顺序排序，
 * 每一列都按照从上到下递增的顺序排序。请完成一个函数，输入这样的一个二维数组和一个整数，
 * 判断数组中是否含有该整数。
 *
 * 解决办法：从左下角x开始寻找，x为此列最大数字，此行最小数字。如果目标数小于x，
 * 则这一行消除。如果目标数大于x，此列消除。循环当找到或者不存在停止
 * User: jack-dukang
 * Date: 2020/4/3
 * Time: 下午10:52
 */

/**
 * @param $target
 * @param $array
 * @return bool
 */
function Find($target, $array)
{
    $widthLen = count($array);
    $highLen = count($array[0]);
    for($i = $widthLen-1,$j = 0; $i >=0 && $j< $highLen;){
        if($target == $array[$i][$j]){
            return true;
        }
        if($target < $array[$i][$j]){
            $i--;
            continue;
        }
        if($target > $array[$i][$j]){
            $j++;
            continue;
        }
    }
    return false;
}