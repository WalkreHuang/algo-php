<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    // 节点的深度
    private $nodes_deep = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->orderTree($root);

        return !empty($this->arr) ? max($this->arr) : 0;
    }

    private function orderTree($node)
    {
        if (is_null($node)) {
            return;
        }

        $node_left_deep = $this->getDeep($node->left);
        $node_right_deep = $this->getDeep($node->right);

        $this->arr[] = $node_left_deep + $node_right_deep;

        $this->orderTree($node->left);
        $this->orderTree($node->right);
    }

    private function getDeep($node, $deep = 0)
    {
        if (is_null($node)) {
            return $deep;
        }

        $left_deep = $this->getDeep($node->left, $deep +1);
        $right_deep = $this->getDeep($node->right, $deep + 1);

        return max($left_deep, $right_deep);
    }
}