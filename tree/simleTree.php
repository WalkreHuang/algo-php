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

    public function levelOrderWithDFS($root)
    {
        if (empty($root)) {
            return [];
        }
        $result = [];
        $this->iteratorLevel($result, $root, 0);

        return $result;
    }

    public function iteratorLevel(&$result, $node, $level)
    {
        if (empty($node)) {
            return;
        }
        if(count($result) < $level+1){
            array_push($result,[]); //说明当前行没有结果，需要初始化
        }

        array_push($result[$level], $node->value);

        $this->iteratorLevel($result, $node->left, $level+1);
        $this->iteratorLevel($result, $node->right, $level+1);
    }

    public function levelOrderWithBFS($root)
    {
        if (empty($root)) {
            return [];
        }
        $result = [];
        $queue = [];
        array_unshift($queue, $root);

        while (!empty($queue)) {
            $current_node = array_pop($queue);
            if (is_null($current_node)) {
                continue;
            }

            array_push($result, $current_node->value);

            array_unshift($queue, $current_node->left);
            array_unshift($queue, $current_node->right);
        }


        return $result;
    }

    public function getTreeDeep($node)
    {
/*        if (is_null($node)) {
            return 0;
        }

        $left = $this->getTreeDeep($node->left);
        $right = $this->getTreeDeep($node->right);

        return max($left, $right)+1;*/

        if (empty($node)) {
            return 0;
        }
        $deep = 0;
        $queue = [];
        array_push($queue, $node);
        while (!empty($queue)) {
            $width = count($queue);//每层的结点数
            $deep++;//每遍历一层，深度+1
            for ($i=0;$i<$width;$i++) {
                $current_node = array_shift($queue);

                if (!is_null($current_node->left)) {
                    array_push($queue, $current_node->left);
                }
                if (!is_null($current_node->right)) {
                    array_push($queue, $current_node->right);
                }
            }
        }

        return $deep;
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
/*$invert = $tree->invertTree($root);
var_dump($invert);*/

$level_tree = $tree->levelOrderWithDFS($root);
//print_r($level_tree);

$level_tree = $tree->levelOrderWithBFS($root);
echo join('->', $level_tree).PHP_EOL;

$tree_deep = $tree->getTreeDeep($root);
echo '树的深度为:'.$tree_deep.PHP_EOL;
