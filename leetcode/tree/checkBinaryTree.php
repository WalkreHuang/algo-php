<?php
//给定一个二叉树，判断其是否是一个有效的二叉搜索树。
//
// 假设一个二叉搜索树具有如下特征：
//
//
// 节点的左子树只包含小于当前节点的数。
// 节点的右子树只包含大于当前节点的数。
// 所有左子树和右子树自身必须也是二叉搜索树。
//
//
// 示例 1:
//
// 输入:
//    2
//   / \
//  1   3
//输出: true
//
//
// 示例 2:
//
// 输入:
//    5
//   / \
//  1   4
//     / \
//    3   6
//输出: false
//解释: 输入为: [5,1,4,null,null,3,6]。
//     根节点的值为 5 ，但是其右子节点值为 4 。
//
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
    private $pre_val = PHP_INT_MIN;
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root) {
        if ($root == null) {
            return true;
        }

        //访问左子树
        $left = $this->isValidBST($root->left);

        //访问当前节点,如果当前结点小于等于中序遍历的前一个结点，返回false
        if ($root->val <= $this->pre_val) {
            return false;
        }

        $this->pre_val = $root->val;

        //访问右子树
        $right = $this->isValidBST($root->right);

        return $left && $right;
    }
}
class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($value) { $this->val = $value; }
 }
//leetcode submit region end(Prohibit modification and deletion)
$root = new TreeNode(5);
$node1 = new TreeNode(1);
$node2 = new TreeNode(4);
$node3 = new TreeNode(3);
$node4 = new TreeNode(6);

$root->left = $node1;
$root->right = $node2;
$node2->left = $node3;
$node2->right = $node4;

$root = new TreeNode(0);
$obj = new Solution();
var_dump($obj->isValidBST($root));
