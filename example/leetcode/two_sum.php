<?php
/**
 * 链接：https://leetcode-cn.com/problems/two-sum
 * 给定一个整数数组 nums 和一个目标值 target，请你在该数组中找出和为目标值的那 两个 整数，并返回他们的数组下标。
 * 你可以假设每种输入只会对应一个答案。但是，你不能重复利用这个数组中同样的元素。
 * 示例:
 * 给定 nums = [2, 7, 11, 15], target = 9
 * 因为 nums[0] + nums[1] = 2 + 7 = 9
 * 所以返回 [0, 1]
 * 来源：力扣（LeetCode）
 * 著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 *
 * 思路：php的array_key_exist
 * User: jack
 * Date: 2020/4/13
 * Time: 上午11:56
 */

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $arr = [];
        for ($i = 0; $i< count($nums); $i++){
            $current = $target - $nums[$i];
            if (array_key_exists($current,$arr)){
                return [$arr[$current],$i];
            }
            // 排除自己的因素
            $arr[$nums[$i]] = $i;
        }
        return [];
    }
}

$nums = [3,2,4];
$target = 6;
$obj = new Solution();
$res = $obj->twoSum($nums,$target);
print_r($res);die();