<?php
/**
 * 二叉树子节点个数
 * 递归方法
 * User: jack-dukang
 * Date: 2020/3/29
 * Time: 上午10:23
 */
class TreeNode{
    public $left;
    public $right;
    public $val;
    public function __construct($val){
        $this->val = $val;
    }
}

/**
 *
 * @param $node
 * @return int
 */
function totalLeaf($node){
    if (null == $node){
        return 0;
    }
    if ($node->left == null && $node->right == null){
        // 可以打印出所有叶子节点
        // print_r("leaf nodes:".($node->val)."\n");
        return 1;
    }
    return totalLeaf($node->left) + totalLeaf($node->right);
}

$node1=new TreeNode(1);
$node2=new TreeNode(2);
$node3=new TreeNode(3);
$node4=new TreeNode(4);
$node5=new TreeNode(5);
$node6=new TreeNode(6);
$node7=new TreeNode(7);

$tree= $node1;
$node1->left=$node2;
$node1->right=$node3;

$node2->left=$node4;
$node2->right=$node5;

$node4->right=$node6;
$node6->left=$node7;

$total = totalLeaf($tree);
var_export($total);die();


