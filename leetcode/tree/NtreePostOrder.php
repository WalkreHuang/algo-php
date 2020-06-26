<?php
//给定一个 N 叉树，返回其节点值的后序遍历。
//
// 例如，给定一个 3叉树 :
//
//
//
//
//
//
//
// 返回其后序遍历: [5,6,3,2,4,1].
//
//
//
// 说明: 递归法很简单，你可以使用迭代法完成此题吗? Related Topics 树


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Solution {
    /**
     * 迭代使用 根 左 右的方式进行遍历
     * 输出即为 左 右 根
     * @param Node $root
     * @return integer[]
     */
    function postorder($root) {
        $stack = [];
        $result = [];

        if ($root == null) {
            return [];
        }

        $stack[] = $root;
        while (!empty($stack)) {
            //获取右节点
            $top = array_pop($stack);

            $size = count($top->children);

            //每次向结果数组的头部插入值
            array_unshift($result, $top->val);
            for ($i=0;$i< $size;$i++) {
                $stack[] = $top->children[$i];
            }
        }

        return $result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

