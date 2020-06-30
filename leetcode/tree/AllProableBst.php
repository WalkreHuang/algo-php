<?php
//给定一个整数 n，生成所有由 1 ... n 为节点所组成的 二叉搜索树 。
//
//
//
// 示例：
//
// 输入：3
//输出：
//[
//  [1,null,3,2],
//  [3,2,null,1],
//  [3,1,null,null,2],
//  [2,1,3],
//  [1,null,2,null,3]
//]
//解释：
//以上的输出对应以下 5 种不同结构的二叉搜索树：
//
//   1         3     3      2      1
//    \       /     /      / \      \
//     3     2     1      1   3      2
//    /     /       \                 \
//   2     1         2                 3
//
//
//
//
// 提示：
//
//
// 0 <= n <= 8
//
// Related Topics 树 动态规划


//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    /**
     * @param Integer $n
     * @return TreeNode[]
     */
    function generateTrees($n) {
        if ($n == 0) {
            return [];
        }

        return $this->help(1, $n);
    }

    private function help($start, $end)
    {
        $result = [];
        if ($start > $end) {
            $result[] = null;
            return $result;
        }

        if ($start == $end) {
            $result[] = new TreeNode($start);
            return $result;
        }

        //将每个数字都作为根节点
        for ($i=$start;$i<=$end;$i++) {
            //得到所有可能的左子树
            $leftTrees = $this->help($start, $i-1);
            //得到所有可能的右子树
            $rightTrees = $this->help($i+1, $end);

            //左右子树两两组合
            foreach ($leftTrees as $leftTree) {
                foreach ($rightTrees as $rightTree) {
                    //生成树结果
                    $root = new TreeNode($i);
                    $root->left = $leftTree;
                    $root->right = $rightTree;

                    $result[] = $root;
                }
            }
        }

        return $result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($val = 0, $left = null, $right = null) {
         $this->val = $val;
         $this->left = $left;
         $this->right = $right;
     }
}