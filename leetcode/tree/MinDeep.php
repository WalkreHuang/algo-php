<?php
//给定一个二叉树，找出其最小深度。
//
// 最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
//
// 说明: 叶子节点是指没有子节点的节点。
//
// 示例:
//
// 给定二叉树 [3,9,20,null,null,15,7],
//
//     3
//   / \
//  9  20
//    /  \
//   15   7
//
// 返回它的最小深度 2.
// Related Topics 树 深度优先搜索 广度优先搜索
//递归结束条件:
/*叶子节点的定义是左孩子和右孩子都为 null 时叫做叶子节点
1.当 root 节点左右孩子都为空时，返回 1
2.当 root 节点左右孩子有一个为空时，返回不为空的孩子节点的深度
3.当 root 节点左右孩子都不为空时，返回左右孩子较小深度的节点值*/

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
     * @return Integer
     */
    function minDepth($root) {
        if ($root == null) {
            return 0;
        }

        //case 1:
        if ($root->left == null && $root->right == null) {
            return 1;
        }

        //get left right deep
        $left_deep = $this->minDepth($root->left);
        $right_deep = $this->minDepth($root->right);

        //case 2:
        if ($root->left == null || $root->right == null) {
            return $left_deep + $right_deep + 1;
        }

        //case 3:
        return min($left_deep, $right_deep) + 1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
