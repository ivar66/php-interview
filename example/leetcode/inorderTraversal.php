<?php
/**
 * https://leetcode-cn.com/problems/binary-tree-inorder-traversal/
 * 94. 二叉树的中序遍历
 * 相思题：https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
 * User: dukang03
 * Date: 2020/4/18
 * Time: 上午11:26
 */

function inorderTraversal($root){
    $result = [];
    $this->getVal($root,$result);
    return $result;
}

function getVal($node,&$result){
    if ($node == null){
        return null;
    }

    $this->getVal($node->left,$result);
    $result[] = $node->val;
    $this->getVal($node->right,$result);
}