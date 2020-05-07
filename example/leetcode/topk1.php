<?php
/**
 * https://leetcode-cn.com/problems/kth-largest-element-in-an-array
 * @param $nums
 * @param $k
 * @return mixed
 */
/**
 * 小顶堆
 * @param $nums
 * @param $k
 * @return mixed
 */
function topk($nums,$k){
    $h = new SplMinHeap();
    foreach ($nums as $num){
        $h->insert($num);
        if ($h->count() > $k){
            $h->extract();
        }
    }
    // 1、topk的值 $h->top();
//    $te = [];
//    while ($h->valid()) {
//        $cur = $h->current();
//        $te[] = $cur;
//        $h->next();
//    }
    // 2、$te 小顶堆里面的数据数据打印出来即可 $te
    return $h->top();
}

$nums = [2,31,3,4,5];
$k = 3;

//print_r(topk($nums,$k));


function topk2($nums,$k){
    $heap = new SplMaxHeap();
    foreach ($nums as $num){
        $heap->insert($num);
        if ($heap->count() > $k){
            $heap->extract();
        }

    }
        $te = [];
    while ($heap->valid()) {
        $cur = $heap->current();
        $te[] = $cur;
        $heap->next();
    }
    print_r($te);die();
    return $heap->top();
}
//function max($numbers,$k){
//    $c = new SplMaxHeap();
//    foreach($numbers as $number){
//        $c->insert($number);
//        if($c->count() > $k){
//            $c->extract();
//        }
//    }
//    $res = [];
//    if ($c->valid()){
//        $res[] = $c->current();
//        $c->next();
//    }
//    return $c->top;
//}
print_r(topk2($nums,$k));