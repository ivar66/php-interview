<?php
/**
 * 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。
 * User: jack-dukang
 * Date: 2020/4/5
 * Time: 下午9:09
 */

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}

function Merge($pHead1, $pHead2)
{
    // write code here
    $newHead = null;
    if ($pHead1->val > $pHead2->val){
        $temp = $pHead2->next;
        $newHead = $pHead2;
        $pHead2 = $temp;
    }
    while ($pHead1 || $pHead2){
        if ($pHead2 == null){
            $newHead->next = $pHead1;
            $pHead1 = null;
        }

        if ($pHead1 == null){
            $newHead->next = $pHead2;
            $pHead2 = null;
        }

        $pre = null;
        if ($pHead1->val > $pHead2->val){
            $temp = $pHead2->next;
            $newHead->next = $pre;
            $newHead = $temp;
        }

    }
}