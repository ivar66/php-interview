<?php
/**
 * https://leetcode-cn.com/problems/combination-sum/
 * DESC: 给定一个无重复元素的数组 candidates 和一个目标数 target ，找出 candidates 中所有可以使数字和为 target 的组合。candidates 中的数字可以无限制重复被选取。
 * User: dukang03
 * Date: 2020/4/27
 * Time: 下午10:48
 */

class Solution
{
    protected $result = [];

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target)
    {
        if ($target <= 0) return [];
        sort($candidates);
        $this->combine($candidates, $target, [], 0);
        return $this->result;
    }

    private function combine($nums, $target, $list, $start)
    {
        // terminator
        if ($target < 0) return;
        if ($target == 0) {
            $this->result[] = $list;
            return;
        }

        for ($i = $start; $i < count($nums); ++$i) {
            // 由于数字是排好序的，所以可以进行剪枝
            if ($target - $nums[$i] < 0) break;
            $list[] = $nums[$i];
//            print_r($list);
//            echo "\n";
            // 数字可重复使用
            $this->combine($nums, $target - $nums[$i], $list, $i);
            // 回溯
            array_pop($list);
        }
    }

}

$candidates = [2,3,6,7];
$target = 7;
$obj = new Solution();
$result = $obj->combinationSum($candidates,$target);
//print_r($result);die();