<?php
/**
 * desc:125 判断是否是一个回文串，只考虑其中的数字和字母，且忽略大小写。
 * User: jack-dukang
 * Date: 2020/3/29
 * Time: 上午11:27
 */

function boolPalindRome($str){
      $len = strlen($str);
    $newStr = strtolower($str);
    $strJustNumAndLetter = '';
    for ($i = 0;$i < $len;$i++){
        if (preg_match("/^[a-zA-Z0-9]$/",$newStr[$i])){
            $strJustNumAndLetter .=$newStr[$i];
        }
    }
    $reverseStr = strrev($strJustNumAndLetter);
    if ($reverseStr === $strJustNumAndLetter){
        return true;
    }
    return false;
}
$a = "A man, a plan, a canal: Panama";
$b = "race a car";
$ret1 = boolPalindRome($a);
var_export($ret1);
echo "\n";
$ret2 = boolPalindRome($b);
var_export($ret2);


