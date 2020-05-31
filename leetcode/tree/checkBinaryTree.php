<?php

//https://leetcode-cn.com/problems/validate-binary-search-tree
class checkBinaryTree
{
    public static function run($node)
    {
        if (is_null($node)) {
            return true;
        }

        //访问左子树
        if (!self::run($node->left)) {
            return false;
        }
        // 访问当前节点：如果当前节点小于等于中序遍历的前一个节点，说明不满足BST，返回 false；否则继续遍历。
        if ($node->val <= PHP_INT_MIN) {
            return false;
        }

        $pre_val = $node->right->val;
    }
}