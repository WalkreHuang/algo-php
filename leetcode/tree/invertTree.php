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


        self::run($root->left);
        self::run($root->right);

        $temp = $root->left;
        $root->left = $root->right;
        $root->right = $temp;

        return $root;
    }
}

class TreeNode {
 public $val = null;
 public $left = null;
 public $right = null;
 function __construct($value) { $this->val = $value; }
}

$root = new TreeNode(1);
$node1 = new TreeNode(2);
$node2 = new TreeNode(3);
$node3 = new TreeNode(4);
$node4 = new TreeNode(5);

$root->left = $node1;
$root->right = $node2;
$node1->right = $node3;
$node2->left = $node4;

var_dump($root);

$invert_tree = invertTree::run($root);
var_dump($invert_tree);