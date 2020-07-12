<?php
//给定一个二叉树，返回所有从根节点到叶子节点的路径。
//
// 说明: 叶子节点是指没有子节点的节点。
//
// 示例:
//
// 输入:
//
//   1
// /   \
//2     3
// \
//  5
//
//输出: ["1->2->5", "1->3"]
//
//解释: 所有根节点到叶子节点的路径为: 1->2->5, 1->3
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

    /**
     * @param TreeNode $root
     * @return String[]
     */
    function binaryTreePaths($root) {
        $res = [];
        
        $this->getPaths($root, '', $res);
        return $res;
    }

    public function getPaths($root, $path, &$res)
    {
        if ($root == null) return null;

        $path .= $root->val;
        if ($root->left == null && $root->right == null) {
            $res[] = $path;
        }

        $path .= '->';
        $this->getPaths($root->left, $path, $res);
        $this->getPaths($root->right, $path, $res);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
