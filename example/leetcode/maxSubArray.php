<?php
/**
 * link：https://leetcode-cn.com/problems/maximum-subarray/
 * 53. 最大子序和
 * 给定一个整数数组 nums ，找到一个具有最大和的连续子数组（子数组最少包含一个元素），返回其最大和。
 * User: dukang
 * Date: 2020/4/18
 * Time: 下午4:56
 */

/**
 * 动态规划的思路
 * @param Integer[] $nums
 * @return Integer
 */
function maxSubArray($nums) {
    $len = count($nums);
    $max = $nums[0];
    for ($i = 1;$i< $len;$i++){
        if ($nums[$i-1] > 0 ){
            $nums[$i] = $nums[$i] + $nums[$i-1];
        }
        $max = max($max,$nums[$i]);
    }
    return $max;
}

$ar = [-2,1,-3,4,-1,2,1,-5,8];
print_r(maxSubArray($ar));