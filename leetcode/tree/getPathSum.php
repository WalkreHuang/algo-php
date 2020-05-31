<?php

//https://leetcode-cn.com/problems/path-sum/
class getPathSum
{

    /**
     * @param $root TreeNode
     * @param $sum
     * @return bool
     */
    public function hasPathSum($root, $sum)
    {
        return $this->help($root, 0, $sum);
    }

    private function help($node, $cur_sum, $sum)
    {
        if ($node == null) {
            return false;
        }
        $cur_sum += $node->val;

        if ($node->left == null && $node->right == null) {
            return $cur_sum == $sum;
        } else {
            return ($this->help($node->left, $cur_sum, $sum) || $this->help($node->right, $cur_sum, $sum));
        }
    }
}

class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($value) { $this->val = $value; }
}

$node1 = new TreeNode(2);
$node2 = new TreeNode(7);
$node3 = new TreeNode(11);
$node3->left = $node1;
$node3->right = $node2;

$node4 = new TreeNode(1);
$node5 = new TreeNode(4);
$node5_son = new TreeNode(3);
$node5->right = $node5_son;
$node6 = new TreeNode(9);

$node6->left = $node4;
$node6->right = $node5;

$node7 = new TreeNode(5);
$node7->left = $node3;
$node7->right = $node6;

$obj = new getPathSum();

$ret = $obj->hasPathSum($node7, 15);

var_dump($ret);