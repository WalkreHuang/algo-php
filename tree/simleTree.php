<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/11
 * Time: 15:36
 * Email: <huangwalker@qq.com>
 */

class TreeNode
{
    /**
     * @var TreeNode
     */
    public $left;
    /**
     * @var TreeNode
     */
    public $right;
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class Tree
{
    /**
     * @var TreeNode
     */
    public $root;

    public function __construct(TreeNode $node = null)
    {
        $this->root = $node;
    }

    public function invertTree($node)
    {
        $queue = [];
        if (!is_null($node)) {
            array_push($queue, $node);
        }

        while (!empty($queue)) {
            $current_node = array_pop($queue);
            $temp = $current_node->left;
            $current_node->left = $current_node->right;
            $current_node->right = $temp;

            if ($current_node->left) {
                array_push($queue, $current_node->left);
            }

            if ($current_node->right) {
                array_push($queue, $current_node->right);
            }
        }

        return $node;
    }
    
}

$root = new TreeNode(4);
$node2 = new TreeNode(2);
$node3 = new TreeNode(7);
$node4 = new TreeNode(1);
$node5 = new TreeNode(3);
$node6 = new TreeNode(6);
$node7 = new TreeNode(9);

$node2->left = $node4;
$node2->right = $node5;

$node3->left = $node6;
$node3->right = $node7;

$root->left = $node2;
$root->right = $node3;

$tree = new Tree();
$invert = $tree->invertTree($root);

var_dump($invert);