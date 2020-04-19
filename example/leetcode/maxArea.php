<?php
/**
 * https://leetcode-cn.com/problems/container-with-most-water/
 * 思路：参考：https://leetcode-cn.com/problems/container-with-most-water/solution/sheng-zui-duo-shui-de-rong-qi-by-leetcode-solution/
 * 双指针
 * 复杂度分析:
 * 时间复杂度：O(N)O(N)，双指针总计最多遍历整个数组一次。
 * 空间复杂度：O(1)O(1)，只需要额外的常数级别的空间。
 * User: dukang03
 * Date: 2020/4/18
 * Time: 上午1:23
 */

/**
 * @param Integer[] $height
 * @return Integer
 */
function maxArea($height) {
    $max = 0;
    for($i= 0,$j = count($height)-1;$i < $j;){
        $current = min($height[$i],$height[$j]) * ($j - $i);
        $max = $current > $max ? $current : $max;
        if ($height[$i] <= $height[$j]){
            $i++;
        }else{
            $j--;
        }
    }
    return $max;
}
$arr = [1,8,6,2,5,4,8,3,7];
$result = maxArea($arr);
print_r($result);
die();