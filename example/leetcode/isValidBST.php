<?php
/**
 * isValidBST
 * 98. 验证二叉搜索树
 * https://leetcode-cn.com/problems/validate-binary-search-tree/
 * User: dukang03
 * Date: 2020/4/19
 * Time: 上午11:02
 */

 class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($value) { $this->val = $value; }
 }


/**
 *
 * @param $root
 */
function isValidBST($root){
    return $this->task($root,null,null);
}

function task($node,$lower,$upper){
    if ($node == null){
        return true;
    }

    if ($lower !== null && $lower >= $node->val){
        return false;
    }
    if ($upper !== null && $upper <= $node->val){
        return false;
    }
    // 左子树就检查上界, 都小于当前节点，右子树检查下界，都大于当前节点
    if (!$this->task($node->left,$node->val,$upper)){
        return false;
    }
    if (!$this->task($node->right,$lower,$node->val)){
        return false;
    }
    return true;
}



/**
 * 注意:
 * 1、注意左子树就检查上界, 都小于当前节点，右子树检查下界，都大于当前节点
 * 2、也可以考虑中序遍历
 */
