<?php
//给定二叉搜索树（BST）的根节点和一个值。 你需要在BST中找到节点值等于给定值的节点。 返回以该节点为根的子树。 如果节点不存在，则返回 NULL。
//
// 例如，
//
//
//给定二叉搜索树:
//
//        4
//       / \
//      2   7
//     / \
//    1   3
//
//和值: 2
//
//
// 你应该返回如下子树:
//
//
//      2
//     / \
//    1   3
//
//
// 在上述示例中，如果要找的值是 5，但因为没有节点值为 5，我们应该返回 NULL。
// Related Topics 树


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
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val) {
        while ($root != null) {
            if ($val > $root->val) {
                $root = $root->right;
            } else if ($val < $root->val) {
                $root = $root->left;
            } else {
                return $root;
            }
        }

        return null;
        /*if ($root == null) {
            return null;
        }

        if ($root->val == $val) {
            return $root;
        }

        return ($root->val > $val) ? $this->searchBST($root->right, $val) : $this->searchBST($root->left, $val);*/
    }
}
//leetcode submit region end(Prohibit modification and deletion)
