<?php
/**
 * DESC:我们可以用2x1的小矩形横着或者竖着去覆盖更大的矩形。请问用n个2x1的小矩形无重叠地覆盖一个2xn的大矩形，总共有多少种方法？
 * 思路：
 *  当n<=0时，f(n)=0;
 *  当n<=2时，f(n)=n;
 *  当n>2时，f(n)=f(n-1)+f(n-2);
 * User: dukang
 * Date: 2020/4/4
 * Time: 下午6:51
 */

function recover($target){
    if($target < 0 ){
        return 0;
    }
    if($target == 1 || $target == 2){
        return $target;
    }
    return recover($target-1) + recover($target-2);
}