<?php
/**
 * DESC：输入一个链表，输出该链表中倒数第k个结点。
 * User: dukang
 * Date: 2020/4/5
 * Time: 下午8:24
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
 * 思路:双指针，两指针相差k-1的距离即可
 * @param $head
 * @param $k
 * @return null
 */
function FindKthToTail($head, $k){
    if (empty($head) || $k <=0 ){
        return null;
    }
    $q = $head;
    $p = null;
    $i = 1;
    while ($q->next != null){
        if ($i == $k){
            $p = $head;
        }
        if ($i > $k){
            $p = $p->next;
        }
        if ($i != 1){
            $q = $q->next;
        }
        $i++;
    }
    return $p;
}

function FindKthToTail2($head,$k){
    $i = 1;
    $p = $head;
    $q = null;
    while($p != null){
        if($i == $k){
            $q = $head;
        }
        if($i > $k){
            $q = $q->next;
        }
        $p = $p->next;
        $i ++ ;

    }
    return $q;
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

print_r(FindKthToTail($node1,6));
