<?php
/**
 * DESC: 替换空格
 * User: dukang03
 * Date: 2020/4/4
 * Time: 上午9:33
 */

function replaceBlank($str){
    $str = str_replace(' ','%20',$str);
    return $str;
}

$tes = 'We Are Happy';
print_r(replaceBlank($tes));