<?php
/**
 * 判断链表是否有环
 * User: jack-dukang
 * Date: 2020/3/29
 * Time: 上午10:23
 */
class ListNode{
    public $next = null;
    public $val;
    public function __construct($val){
        $this->val = $val;
    }
}

/**
 *
 * @param $headNode
 * @return bool
 */
function detectCycle($headNode){
    $node1 = $headNode->next->next;
    $node2 = $headNode->next;
    while ($node1 !== null && $node2 !==null){
        if ($node1 === $node2){
            return true;
        }
        $node1 = $node1->next->next;
        $node2 = $node2->next;
    }
    return false;
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
$node6->next = $node2;

$res = detectCycle($node1);
var_export($res);die();


