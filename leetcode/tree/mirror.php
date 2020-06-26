<?php
//给定一个二叉树，检查它是否是镜像对称的。
//
//
//
// 例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
//
//     1
//   / \
//  2   2
// / \ / \
//3  4 4  3
//
//
//
//
// 但是下面这个 [1,2,2,null,3,null,3] 则不是镜像对称的:
//
//     1
//   / \
//  2   2
//   \   \
//   3    3
//
//
//
//
// 进阶：
//
// 你可以运用递归和迭代两种方法解决这个问题吗？
// Related Topics 树 深度优先搜索 广度优先搜索


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
    function isSymmetric($root) {
        $this->isMirror($root, $root);
    }

    public function isMirror($node1, $node2)
    {
        if ($node1 == null &&  $node2 == null) {
            return true;
        }

        if ($node1 == null ||  $node2 == null) {
            return false;
        }

        $cur_mirror = $node1->val == $node2->val;

        $left_mirror = $this->isMirror($node1->left, $node2->right);
        $right_mirror = $this->isMirror($node1->right, $node2->left);

        return $cur_mirror && $left_mirror && $right_mirror;

    }
}
//leetcode submit region end(Prohibit modification and deletion)
