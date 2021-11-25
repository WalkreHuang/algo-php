<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/31
 * Time: 11:45
 * Email: <huangwalker@qq.com>
 */

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

class isCousinsInTree
{
    private $x_deep = 0;
    private $y_deep = 0;
    private $x_parent;
    private $y_parent;

    /**
     * @param TreeNode $root
     * @param Integer $x
     * @param Integer $y
     * @return Boolean
     */
    function isCousins($root, $x, $y) {
        $this->getNodeDeepAndRoot($root, $x, $y);
        return ($this->x_deep === $this->y_deep) && ($this->x_parent !== $this->y_parent);
    }

    private function getNodeDeepAndRoot($node, $x, $y, $parent_node = null, $deep = 0)
    {
        if (is_null($node) || (!is_null($this->x_parent) && !is_null($this->y_parent))) {
            return;
        }

        if ($node->val === $x) {
            $this->x_parent = $parent_node;
            $this->x_deep = $deep;
        }
        if ($node->val === $y) {
            $this->y_parent = $parent_node;
            $this->y_deep = $deep;
        }

        $this->getNodeDeepAndRoot($node->left, $x, $y, $node, $deep + 1);
        $this->getNodeDeepAndRoot($node->right, $x, $y, $node, $deep + 1);
    }
}

$obj = new isCousinsInTree();
$tree = new TreeNode(1);
$node1 = new TreeNode(2);
$node2 = new TreeNode(3);
$node3 = new TreeNode(4);
$node4 = new TreeNode(5);
$tree->left = $node1;
$tree->right = $node2;
$node1->right = $node3;
$node2->right = $node4;

$x = 5;
$y = 4;
$ret = $obj->isCousins($tree, $x, $y);
var_dump($ret);