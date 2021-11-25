<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/27
 * Time: 16:11
 * Email: <huangwalker@qq.com>
 */

class balanceTree
{
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isBalanced($root) {
        if (is_null($root)) {
            return true;
        }
        $left_deep = $this->getDeep($root->left);
        $right_deep = $this->getDeep($root->right);

        if (abs($left_deep - $right_deep) <= 1) {
            return true;
        }

        return $this->isBalanced($root->left) && $this->isBalanced($root->right);
    }

    private function getDeep($node)
    {
        if (is_null($node)) {
            return 0;
        }

        $left_deep = $this->getDeep($node->left);
        $right_deep = $this->getDeep($node->right);

        return max($left_deep, $right_deep) + 1;
    }
}