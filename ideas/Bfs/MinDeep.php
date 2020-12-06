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
// 👍 354 👎 0


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
        //bfs

        $queue = [];

        array_push($queue, $root);
        $deep = 1;

        while (!empty($queue)) {
            $cur_size = count($queue);
            for ($i=0;$i< $cur_size;$i++) {
                $cur_node = array_shift($queue);
                //is leaf node ??
                if ($cur_node->left == null && $cur_node->right == null) {
                    return $deep;
                }

                //push into queue when node is not null
                if ($cur_node->left != null) {
                    array_push($queue, $cur_node->left);
                }

                if ($cur_node->right != null) {
                    array_push($queue, $cur_node->right);
                }
            }

            //inc deep
            $deep++;
        }

        return $deep;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
