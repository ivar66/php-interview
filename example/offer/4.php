<?php
/**
 * DESC:输入某二叉树的前序遍历和中序遍历的结果，请重建出该二叉树。假设输入的前序遍历和中序遍历的结果中都不含重复的数字。例如输入前序遍历序列{1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}，则重建二叉树并返回。
 * 解决思路:
 * User: jack-dukang
 * Date: 2020/4/4
 * Time: 上午9:40
 */

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function reConstructBinaryTree($pre, $vin)
{
    if ($pre && $vin){
        $Head = new TreeNode($pre[0]);
        //获取根节点在中序遍历中的位置
        $index = array_search($pre[0],$vin);
        $Head->left = reConstructBinaryTree(array_slice($pre,1,$index),array_slice($vin,0,$index));
        $Head->right = reConstructBinaryTree(array_slice($pre,$index+1),array_slice($vin,$index+1));
        return $Head;
    }
}


$pre = [1,2,4,7,3,5,6,8];
$vi = [4,7,2,1,5,3,8,6];

print_r(reConstructBinaryTree($pre,$vi));