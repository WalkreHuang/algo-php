<?php
//给定一个非空二叉树，返回其最大路径和。
//
// 本题中，路径被定义为一条从树中任意节点出发，达到任意节点的序列。该路径至少包含一个节点，且不一定经过根节点。
//
// 示例 1:
//
// 输入: [1,2,3]
//
//       1
//      / \
//     2   3
//
//输出: 6
//
//
// 示例 2:
//
// 输入: [-10,9,20,null,null,15,7]
//
//   -10
//   / \
//  9  20
//    /  \
//   15   7
//
//输出: 42
// Related Topics 树 深度优先搜索


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
    private $max_sum = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxPathSum($root) {
        $this->getPathSum($root);

        return $this->max_sum;
    }

    private function getPathSum($root)
    {
        if ($root == null) {
            return 0;
        }

        $left = $this->getPathSum($root->left);
        $right = $this->getPathSum($root->right);

        $this->max_sum = max($this->max_sum, $root->val + $left + $right);

        return $root->val + max($left, $right);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
