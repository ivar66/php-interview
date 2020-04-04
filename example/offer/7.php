<?php
/**
 * DESC:大家都知道斐波那契数列，现在要求输入一个整数n，请你输出斐波那契数列的第n项（从0开始，第0项为0）。
n<=39
 *
 * Fibonacci(4) = Fibonacci(3) + Fibonacci(2);
 *              = Fibonacci(2) + Fibonacci(1) + Fibonacci(1) + Fibonacci(0);
 *              = Fibonacci(1) + Fibonacci(0) + Fibonacci(1) + Fibonacci(1) + Fibonacci(0);
 *              = 3 * Fibonacci(1) + 2 * Fibonacci(0)
 *
 * User: dukang
 * Date: 2020/4/4
 * Time: 下午2:23
 */
function Fibonacci($n)
{
//    if($n <= 0){
//        return 0;
//    }
//    if($n == 1 || $n == 2){
//        return 1;
//    }
//    return Fibonacci($n-1) + Fibonacci($n-2);

    if($n == 0){
        return 0;
    }

    if($n == 1 || $n == 2){
        return 1;
    }
    if($n == 3){
        return 2;
    }
    return 3 * Fibonacci($n-3) + 2 * Fibonacci($n-4);
}

$n = 39;
print_r(Fibonacci($n));