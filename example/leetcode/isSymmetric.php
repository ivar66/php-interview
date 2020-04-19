<?php
/**
 * 来源：力扣（LeetCode） EASY
 * 链接：https://leetcode-cn.com/problems/symmetric-tree
 * 101. 对称二叉树
 * 给定一个二叉树，检查它是否是镜像对称的。
 * 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
 *       1
 *     /   \
 *    2     2
 *   / \   / \
 *  3   4 4   3
 * 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:
 *        1
 *       / \
 *      2   2
 *       \   \
 *       3    3
 * User: dukang03
 * Date: 2020/4/18
 * Time: 上午8:57
 */
 class TreeNodeTwo {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($value) {
         $this->val = $value;
     }
 }


/**
 * @param TreeNodeTwo $l
 * @param TreeNodeTwo $r
 * @return Boolean
 */
function t($l,$r){
    if ($l == null && $r == null){
        return true;
    }
    if ($l == null || $r ==null){
        return false;
    }
    return ($l->val == $r->val) && $this->t($l->left,$r->right) && $this->t($l->right,$r->left);
}
/**
 * @param TreeNodeTwo $root
 * @return Boolean
 */
function isSymmetric($root) {
    return $this->t($root->left,$root->right);
}


