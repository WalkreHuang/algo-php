<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/11
 * Time: 9:24
 * Email: <huangwalker@qq.com>
 */

class binaryTree
{
    /**
     * @var TreeNode
     */
    public $root;

    public function insert($value)
    {
        if (is_null($this->root)) {
            $this->root = new TreeNode($value);
            return true;
        }

        $node = $this->root;

        while (!is_null($node)) {
            if ($node->value > $value) {
                if (is_null($node->left)) {
                    $node->left = new TreeNode($value);
                    return true;
                }
                $node = $node->left;
            } else if ($node->value < $value) {
                if (is_null($node->right)) {
                    $node->right = new TreeNode($value);
                    return true;
                }
                $node = $node->right;
            } else {
                throw new InvalidArgumentException('节点值已存在');
            }
        }
    }

    public function preOrder(TreeNode $node = null)
    {
        $result = [];
        //$this->recursiveOrder1($result, $node);
        $this->iteratorOrder1($result, $node);

        return $result;
    }

    public function recursiveOrder1(&$result, $node)
    {
        if (is_null($node)) {
            return;
        }

        array_push($result, $node->value);

        $this->recursiveOrder1($result, $node->left);
        $this->recursiveOrder1($result, $node->right);
    }

    public function iteratorOrder1(&$result, $node)
    {
        $stack = [];

        if (!is_null($node)) {
            array_unshift($stack, $node);
        }

        //层次遍历,队列实现
        /*while (!empty($stack)) {
            $current_node = array_shift($stack);
            if (is_null($current_node)) {
                continue;
            }
            array_push($result, $current_node->value);

            array_push($stack, $current_node->left);
            array_push($stack, $current_node->right);
        }*/
        //栈实现
        while (!empty($stack)) {
            $current_node = array_shift($stack);
            if (is_null($current_node)) {
                continue;
            }
            $result[] = $current_node->value;

            array_unshift($stack, $current_node->right);
            array_unshift($stack, $current_node->left);
        }
    }

    public function midOrder(TreeNode $node = null)
    {
        $result = [];
        //$this->recursiveOrder2($result, $node);
        $this->iteratorOrder2($result, $node);

        return $result;
    }

    public function recursiveOrder2(&$result, $node)
    {
        if (is_null($node)) {
            return;
        }

        $this->recursiveOrder2($result, $node->left);
        $result[] = $node->value;
        $this->recursiveOrder2($result, $node->right);
    }

    public function iteratorOrder2(&$result, $node)
    {
        $stack = [];

        while (!is_null($node) || !empty($stack)) {
            while (!is_null($node)) {
                array_unshift($stack, $node);

                $node = $node->left;
            }

            $current_node = array_shift($stack);
            $result[] = $current_node->value;

            $node = $current_node->right;
        }

    }

    public function frontOrder(TreeNode $node = null)
    {
        $result = [];
        //$this->recursiveOrder3($result, $node);
        $this->iteratorOrder3($result, $node);

        return $result;
    }

    public function recursiveOrder3(&$result, $node)
    {
        if (is_null($node)) {
            return;
        }

        $this->recursiveOrder3($result, $node->left);
        $this->recursiveOrder3($result, $node->right);
        $result[] = $node->value;
    }

    public function iteratorOrder3(&$result, $node)
    {
        $stack = [];

        if (!is_null($node)) {
            array_unshift($stack, $node);
        }

        while (!empty($stack)) {
            $current_node = array_shift($stack);
            if (is_null($current_node)) {
                continue;
            }

            array_unshift($result, $current_node->value);

            array_unshift($stack, $current_node->left);
            array_unshift($stack, $current_node->right);
        }
    }

    public function levelOrder($node)
    {
        $result = [];
        //$this->recursiveOrder3($result, $node);
        $this->iteratorOrder4($result, $node);

        return $result;
    }

    public function iteratorOrder4(&$result, $node)
    {
        $queue = [];
        if (!is_null($node)) {
            array_unshift($queue, $node);
        }

        while (!empty($queue)) {
            $current_node = array_shift($queue);
            if (is_null($current_node)) {
                continue;
            }

            $result[] = $current_node->value;

            array_push($queue, $current_node->left);
            array_push($queue, $current_node->right);
        }
    }

    public function find($value)
    {
        $node = $this->root;

        $result = null;
        while (!is_null($node)) {
            if ($node->value == $value) {
                $result = $node;
                break;
            } else if ($node->value > $value) {
                $node = $node->left;
            } else {
                $node = $node->right;
            }
        }
        return $result;
    }

}

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

$tree = new binaryTree();

$tree->insert(32);
$tree->insert(4);
$tree->insert(54);
$tree->insert(11);
$tree->insert(53);
$tree->insert(62);
$tree->insert(8);
$tree->insert(60);
$tree->insert(68);
$tree->insert(9);

$trees = $tree->preOrder($tree->root);
echo join('->', $trees).PHP_EOL;

$trees = $tree->midOrder($tree->root);
echo join('->', $trees).PHP_EOL;

$trees = $tree->frontOrder($tree->root);
echo join('->', $trees).PHP_EOL;

$trees = $tree->levelOrder($tree->root);
echo join('->', $trees).PHP_EOL;

$node = $tree->find(11);
var_dump($node);