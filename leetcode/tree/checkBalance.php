<?php
//实现一个函数，检查二叉树是否平衡。在这个问题中，平衡树的定义如下：任意一个节点，其两棵子树的高度差不超过 1。 示例 1: 给定二叉树 [3,9,20,nu
//ll,null,15,7]     3    / \   9  20     /  \    15   7 返回 true 。示例 2: 给定二叉树 [1,2,
//2,3,3,null,null,4,4]       1      / \     2   2    / \   3   3  / \ 4   4 返回 fal
//se 。 Related Topics 树 深度优先搜索


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        if ($root == null) {
            return true;
        }

        if (abs($this->getDeep($root->left) - $this->getDeep($root->right)) > 1) {
            return false;
        }

        return $this->isBalanced($root->left) && $this->isBalanced($root->right);
    }

    public function getDeep($node)
    {
        if ($node == null) {
            return 0;
        }

        $left = $this->getDeep($node->left) + 1;
        $right = $this->getDeep($node->right) + 1;

        return max($left, $right);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
