<?php
/**
 * DESC:输入一个链表，按链表从尾到头的顺序返回一个ArrayList。
 * 解决思路:将链表的数据给放到数组，反转再打印出来
 * User: jack-dukang
 * Date: 2020/4/4
 * Time: 上午9:40
 */

class ListNode{
    public $next = null;
    public $val;
    function __construct($val)
    {
        $this->val = $val;
    }
}

function printListFromTailToHead($node){
    $nodeList = [];
    while ($node != null){
        $nodeList[] = $node->val;
        $node = $node->next;
    }
    $arrReverseNodeList = array_reverse($nodeList);
    return $arrReverseNodeList;
}


$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);
$node6 = new ListNode(6);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;

print_r(printListFromTailToHead($node1));