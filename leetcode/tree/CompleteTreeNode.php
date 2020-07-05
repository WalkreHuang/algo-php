<?php
//给出一个完全二叉树，求出该树的节点个数。
//
// 说明：
//
// 完全二叉树的定义如下：在完全二叉树中，除了最底层节点可能没填满外，其余每层节点数都达到最大值，并且最下面一层的节点都集中在该层最左边的若干位置。若最底层为
//第 h 层，则该层包含 1~ 2h 个节点。
//
// 示例:
//
// 输入:
//    1
//   / \
//  2   3
// / \  /
//4  5 6
//
//输出: 6
// Related Topics 树 二分查找


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
    function countNodes($root) {
        //return $this->solve1($root);
        return $this->solve2($root);
    }

    public function solve1($node)
    {
        if ($node == null) {
            return 0;
        }

        return $this->solve1($node->left) + $this->solve1($node->right) + 1;
    }

    public function solve2($node)
    {
        if ($node == null) {
            return 0;
        }

        $left_node = $node;
        $left_high = 0;
        while ($left_node != null) {
            $left_high++;
            $left_node = $left_node->left;
        }

        $right_node = $node;
        $right_high = 0;
        while ($right_node != null) {
            $right_high++;
            $right_node = $right_node->right;
        }

        //如果是满二叉树，直接套用公式求解
        if ($left_high == $right_high) {
            return (1 << $left_high) - 1;//相当于2的left_high 次方 - 1
        } else {
            return $this->solve2($node->left) + $this->solve2($node->right) + 1;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
