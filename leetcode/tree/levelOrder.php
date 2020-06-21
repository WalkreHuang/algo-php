<?php
//给你一个二叉树，请你返回其按 层序遍历 得到的节点值。 （即逐层地，从左到右访问所有节点）。
//
//
//
// 示例：
//二叉树：[3,9,20,null,null,15,7],
//
//     3
//   / \
//  9  20
//    /  \
//   15   7
//
//
// 返回其层次遍历结果：
//
// [
//  [3],
//  [9,20],
//  [15,7]
//]
//
// Related Topics 树 广度优先搜索


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
     * @return Integer[][]
     */
    function levelOrder($root) {
        $queue = [];
        $queue[] = $root;
        $result = [];

        while (!empty($queue)) {
            $level_num = count($queue);//获取当前层的节点个数
            //在循环体中处理完该层的所有节点
            for ($i =0;$i<$level_num;$i++) {
                $node = array_shift($queue);
                $cur_level_vals[] = $node->val;

                if ($node->left != null) {
                    $queue[] = $node->left;
                }

                if ($node->right != null) {
                    $queue[] = $node->right;
                }
            }

            if (!empty($cur_level_vals)) {
                $result[] = $cur_level_vals;
            }
            $cur_level_vals = [];
        }

        return $result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
$node1 = new TreeNode(3);
$node2 = new TreeNode(9);
$node3 = new TreeNode(20);
$node4 = new TreeNode(15);
$node5 = new TreeNode(7);
$node6 = new TreeNode(82);

$node1->left = $node2;
$node1->right = $node3;
$node3->left = $node4;
$node3->right = $node5;
$node2->right = $node6;

$obj = new Solution();

$ret = $obj->levelOrder($node1);

print_r($ret);