<?php
//计算给定二叉树的所有左叶子之和。
//
// 示例：
//
//
//    3
//   / \
//  9  20
//    /  \
//   15   7
//
//在这个二叉树中，有两个左叶子，分别是 9 和 15，所以返回 24
//
//
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
    private $sum = 0;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumOfLeftLeaves($root) {
        if ($root == null) {
            return 0;
        }

        //寻找当前节点的左叶子节点
        if ($root->left != null && $root->left->left == null && $root->left->right == null) {
            $this->sum += $root->left->val;
        }
        $this->sumOfLeftLeaves($root->left);
        $this->sumOfLeftLeaves($root->right);
        //return $this->help($root, false);

        return $this->sum;
    }

    private function help($root, $flag)
    {
        if ($root == null) {
            return 0;
        }

        //只取左叶子节点的值
        $leave_val = 0;
        if ($flag && $root->left == null && $root->right == null) {
            $leave_val = $root->val;
        }

        $left_val = $this->help($root->left, true);
        $right_val = $this->help($root->right, false);

        return $leave_val + $left_val + $right_val;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}

$root = new TreeNode(3);
$node1 = new TreeNode(9);
$node2 = new TreeNode(20);
$node3 = new TreeNode(15);
$node4 = new TreeNode(7);
$root->left = $node1;
$root->right = $node2;
$node2->left = $node3;
$node2->right = $node4;

$obj = new Solution();
echo $obj->sumOfLeftLeaves($root);