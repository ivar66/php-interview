<?php
/**
 * EASY
 *
假设你正在爬楼梯。需要 n 阶你才能到达楼顶。

每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？

注意：给定 n 是一个正整数。

示例 1：

输入： 2
输出： 2
解释： 有两种方法可以爬到楼顶。
1.  1 阶 + 1 阶
2.  2 阶
示例 2：

输入： 3
输出： 3
解释： 有三种方法可以爬到楼顶。
1.  1 阶 + 1 阶 + 1 阶
2.  1 阶 + 2 阶
3.  2 阶 + 1 阶
来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/climbing-stairs
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 * User: dukang03
 * Date: 2020/4/18
 * Time: 上午2:07
 */

/**
 * @param Integer $n
 * @return Integer
 */
function climbStairs($n) {
    if($n == 1){
        return 1;
    }
    if($n == 2){
        return 2;
    }
    $a[1] = 1;
    $a[2] = 2;
    for($i = 3;$i<=$n; $i++){
        $a[$i] = $a[$i-1] + $a[$i-2];
    }
    return $a[$n];
}


function climbStairs1($n) {
    $dp = [];
    for($i = 1;$i<=$n ;$i++){
        if($i == 1){
            $dp[$i] = 1 ;
            continue;
        }
        if($i == 2){
            $dp[$i] = 2 ;
            continue;
        }
        $dp[$i] = $dp[$i-1] + $dp[$i-2];
    }
    return $dp[$n];
}

$n = 3;
print_r(climbStairs1($n));die();
