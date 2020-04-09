<?php
/**
 * longest-palindromic-substring
 * 最长回文子串
 * User: jack-dukang
 * 参考资料：https://leetcode-cn.com/problems/longest-palindromic-substring/solution/zhong-xin-kuo-san-dong-tai-gui-hua-by-liweiwei1419/
 * Date: 2020/4/9
 * Time: 下午7:17
 * @param string $str
 * @return bool|string
 */

function longestPalindrome($str = ''){
    $len = strlen($str);
    if ($len < 2){
        return $str;
    }
    $dp = [];
    for ($i = 0; $i<$len; $i++){
        $dp[$i][$i] = true;
    }
    $maxLen = 1;
    $start = 0;
    for ($j = 1;$j < $len ; $j++){
        for ($i = 0 ; $i < $j ; $i++){

            $left   = substr($str,$i,1);
            $right  = substr($str,$j,1);

            $dp[$i][$j] = ($left == $right) && (($j - $i) < 3 || $dp[$i + 1][$j - 1]);

            if (!empty($dp[$i][$j])){
                $currentMaxLen = $j-$i+1;
                if ($currentMaxLen > $maxLen){
                    $maxLen = $currentMaxLen;
                    $start = $i;
                }
            }
        }
    }
    return substr($str,$start,$maxLen);
}

print_r(longestPalindrome('abc435cba'));
