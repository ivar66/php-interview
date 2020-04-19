<?php
/**
 * 给出两个 非空 的链表用来表示两个非负的整数。其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 *
 * 如果，我们将这两个数相加起来，则会返回一个新的链表来表示它们的和。
 * 您可以假设除了数字 0 之外，这两个数都不会以 0 开头。
 * 示例：
 * 输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 * 输出：7 -> 0 -> 8
 * 原因：342 + 465 = 807
 * 链接：https://leetcode-cn.com/problems/add-two-numbers
 * 思路：利用一个多余的$carry，表示游标进位
 * User: dukang03
 * Date: 2020/4/13
 * Time: 下午2:24
 */
class Node{
    public $next = null;
    public $val;
    public function __construct($val)
    {
           $this->val = $val;
    }
}

class SolutionAddTwoNumbers{

    function addTwoNumbers($n1,$n2){
        $pre = new Node(0);
        $current = $pre;
        $carry = 0;
        while ($n1 !=null || $n2 !=null){

            $sum  = ($n1->val ?? 0) + ($n2->val ?? 0) + $carry;
            $carry = intval($sum / 10);
            //计算当前链表插入值,求模取余
            $sum = $sum % 10;
            $current->next = new Node($sum);
            $current = $current->next;
            if (!empty($n1)) {
                $n1 = $n1->next;
            }
            if ($n2!=null) {
                $n2 = $n2->next;
            }
        }
        if ($carry == 1){
            $current->next = new Node($carry);
        }
        return $pre->next;
    }
}

$obj = new Node(5);
//$obj2 = new Node(4);
//$obj3 = new Node(3);
//$obj->next = $obj2;
//$obj2->next = $obj3;


$ob1 = new Node(5);
//$ob2 = new Node(6);
//$ob3 = new Node(4);
//$ob1->next = $ob2;
//$ob2->next = $ob3;

$o = new SolutionAddTwoNumbers();
print_r($o->addTwoNumbers($obj,$ob1));die();