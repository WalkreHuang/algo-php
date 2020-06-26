<?php
//给定一个二叉树，它的每个结点都存放着一个整数值。
//
// 找出路径和等于给定数值的路径总数。
//
// 路径不需要从根节点开始，也不需要在叶子节点结束，但是路径方向必须是向下的（只能从父节点到子节点）。
//
// 二叉树不超过1000个节点，且节点数值范围是 [-1000000,1000000] 的整数。
//
// 示例：
//
// root = [10,5,-3,3,2,null,11,3,-2,null,1], sum = 8
//
//      10
//     /  \
//    5   -3
//   / \    \
//  3   2   11
// / \   \
//3  -2   1
//
//返回 3。和等于 8 的路径有:
//
//1.  5 -> 3
//2.  5 -> 2 -> 1
//3.  -3 -> 11
//
// Related Topics 树
//递归的重要思想：
//1.找到最简单的重复子问题 2.只考虑整体逻辑
//于是易想到只需要求：以当前节点为头结点的路径数+以当前节点的左孩子为头结点的路径数+以当前节点的右孩子为头结点的路径数
//进一步只需要求：以当前节点为头结点的路径数即可。采用的方法是sum-root.val，若等于0则代表找到了。

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
     * @param Integer $sum
     * @return Integer
     */
    function pathSum($root, $sum) {
        if ($root == null) {
            return 0;
        }

        $node_path_sum = $this->getNodePathNum($root, $sum);

        $left_path_sum = $this->pathSum($root->left, $sum);
        $right_path_sum = $this->pathSum($root->right, $sum);

        return $node_path_sum + $left_path_sum + $right_path_sum;
    }

    public function getNodePathNum($node, $sum)
    {
        if ($node == null) {
            return 0;
        }

        $sum -= $node->val;
        $result = ($sum == 0) ? 1 :0;
        $left_result = $this->getNodePathNum($node->left, $sum);
        $right_result = $this->getNodePathNum($node->right, $sum);

        return $result + $left_result + $right_result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
