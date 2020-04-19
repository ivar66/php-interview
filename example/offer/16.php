<?php
/**
 * https://leetcode-cn.com/problems/merge-two-sorted-lists
 * 21. 合并两个有序链表 EASY
 * 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。
 *
 * User: jack-dukang
 * Date: 2020/4/5
 * Time: 下午9:09
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $head = new ListNode(0);
        $cur = $head;
        while($l1 !=null && $l2 !=null){
            if($l1->val < $l2->val){
                $cur->next = $l1;
                $cur = $cur->next;
                $l1 = $l1->next;
            }else{
                $cur->next = $l2;
                $cur = $cur->next;
                $l2 = $l2->next;
            }
        }
        if($l1 == null){
            $cur->next = $l2;
        }else{
            $cur->next = $l1;
        }
        return $head->next;
    }
}