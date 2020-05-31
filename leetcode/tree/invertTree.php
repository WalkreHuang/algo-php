<?php

//https://leetcode-cn.com/problems/invert-binary-tree/
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */

class invertTree
{
    public static function run($root)
    {
        if (is_null($root)) {
            return null;
        }

        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;

        self::run($root->left);
        self::run($root->right);

        return $root;
    }
}