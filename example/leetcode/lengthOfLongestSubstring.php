<?php
/**
 * https://leetcode-cn.com/problems/longest-substring-without-repeating-characters
 * 3. 无重复字符的最长子串
 * User: dukang
 * Date: 2020/4/18
 * Time: 上午1:41
 */

/**
 * strpos 获取字符串中是否存在该数据
 * @param String $s
 * @return Integer
 */
function lengthOfLongestSubstring($s) {
    $tmp  = '';
    $len = 0;
    for ($i = 0 ; $i< strlen($s) ; $i++){
        $st = substr($s,$i,1);
        $start = strpos($tmp,$st);
        if ($start !== false){
            $tmp .= $st;
            $tmp = substr($tmp,$start+1);
        }else{
            $tmp .= $st;
        }
        $len = max(strlen($tmp),$len);
    }
    return $len;
}

$st  = 'wws2sw';

print_r(lengthOfLongestSubstring($st));die();