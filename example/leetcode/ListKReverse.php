<?php

/**
 * 从第m个结点开始到第n那个结点结束对链表进行就地反转 例如：输入链表： 1-2->3->4->5->6->null m = 2, n =4 输出： 1->4->3->2->5->6->null 要求时间复杂度o(n) 空间复杂度o(1)
 * Class node
 */
class node {
    public $val = null;
    public $next = null;
    public function __construct($val)
    {
        $this->val = $val;
    }
}



function reverse($node,$m,$n){
    $du = new node(0);
    $du->next = $node;
    $start = $node;
    $prev = null;
    for ($i = 1;$i< $m;$i++){
        $prev = $start;
        $start = $start->next;
    }
    for ($i = $m;$i< $n;$i++){
        $temp = $start->next;

        $start->next = $temp->next;

        $temp->next = $prev->next;

        $prev->next = $temp;
    }
    return $du->next;
}

$node1 = new node(1);
$node2 = new node(2);
$node3 = new node(3);
$node4 = new node(4);
$node5 = new node(5);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
print_r(reverse($node1,2,4));