<?php
/**
 * 二叉树的最大/小深度的PHP实现
 * User: jack-dukang
 * Date: 2020/3/28
 * Time: 上午10:43
 */
class TreeNode{
    public $left = null;
    public $right = null;
    public $val = null;

    public function __construct($val){
        $this->val = $val;
    }
}

// 方案一、递归求最小深度
function TreeMinDepth($pRoot){
    if (null == $pRoot){
        return 0;
    }
    $minDepth = 1;
    if (null == $pRoot->left || null == $pRoot->right){
        return $minDepth;
    }
    $leftMinDepth = TreeMinDepth($pRoot->left);
    $rightMinDepth = TreeMinDepth($pRoot->right);
    $minDepth = ($leftMinDepth < $rightMinDepth) ? $leftMinDepth + $minDepth : $rightMinDepth + $minDepth;
    return $minDepth;
}
//方案一、递归求最大深度
function TreeMaxDepth($pRoot){
    if (null == $pRoot){
        return 0;
    }
    $maxDepth = 1;
    if (null == $pRoot->left && null == $pRoot->right){
        return $maxDepth;
    }
    $leftMaxDepth = TreeMaxDepth($pRoot->left);
    $rightMaxDepth = TreeMaxDepth($pRoot->right);
    $maxDepth = ($leftMaxDepth > $rightMaxDepth) ? $leftMaxDepth + $maxDepth : $rightMaxDepth + $maxDepth;
    return $maxDepth;
}

// 方案二、非递归
//todo

// 构建一棵树
$node1=new TreeNode(1);
$node2=new TreeNode(2);
$node3=new TreeNode(3);
$node4=new TreeNode(4);
$node5=new TreeNode(5);
$node6=new TreeNode(6);
$node7=new TreeNode(7);

$tree=$node1;
$node1->left=$node2;
$node1->right=$node3;

$node2->left=$node4;
$node2->right=$node5;

$node4->right=$node6;
$node6->left=$node7;
// 获取树的最小深度
$dep= TreeMinDepth($tree);
var_export($dep);
echo "\n";
// 获取树的最大深度
$maxDepth = TreeMaxDepth($tree);
var_export($maxDepth);