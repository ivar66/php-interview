<?php
/**
 * 输入一个链表，反转链表后，输出新链表的表头。
 * User: dukang
 * Date: 2020/4/5
 * Time: 下午8:57
 */

class ListNode{
    public $next = null;
    private $val;
    public function __construct($val)
    {
        $this->val = $val;
    }
}

/**
 * 1=>2=>3=>4=>5
 * @param $pHead
 * @return null
 */
function ReverseList($pHead){
    if ($pHead == null || $pHead->next == null){
        return $pHead;
    }
    $pre = null;
    while ($pHead){
        $temp = $pHead->next;
        $pHead->next = $pre;
        $pre = $pHead;
        $pHead = $temp;
    }
    return $pre;
}

$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;

print_r(ReverseList($node1));