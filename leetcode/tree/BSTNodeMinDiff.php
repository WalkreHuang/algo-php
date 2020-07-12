<?php
// 输入: root = [4,2,6,1,3,null,null]
//输出: 1
//解释:
//注意，root是树节点对象(TreeNode object)，而不是数组。
//
//给定的树 [4,2,6,1,3,null,null] 可表示为下图:
//
//          4
//        /   \
//      2      6
//     / \
//    1   3
//
//最小的差值是 1, 它是节点1和节点2的差值, 也是节点3和节点2的差值。
//
//
//
// 注意：
//
//
// 二叉树的大小范围在 2 到 100。
// 二叉树总是有效的，每个节点的值都是整数，且不重复。
// 本题与 530：https://leetcode-cn.com/problems/minimum-absolute-difference-in-bst/
//相同
//
// Related Topics 树 递归


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
    private $arr;
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function minDiffInBST($root) {
        $this->midOrder($root);

        $arr = $this->arr;
        $size = count($arr);
        if ($size < 2) return null;

        $min = $arr[1] - $arr[0];
        for ($i=1;$i<$size-1;$i++) {
            $min = min($min, $arr[$i+1] - $arr[$i]);
        }

        return $min;
    }

    private function midOrder($root)
    {
        if ($root == null) {
            return;
        }

        $this->midOrder($root->left);
        $this->arr[] = $root->val;
        $this->midOrder($root->right);
    }

}
//leetcode submit region end(Prohibit modification and deletion)
