<?php
//序列化是将一个数据结构或者对象转换为连续的比特位的操作，进而可以将转换后的数据存储在一个文件或者内存中，同时也可以通过网络传输到另一个计算机环境，采取相反方
//式重构得到原数据。
//
// 请设计一个算法来实现二叉树的序列化与反序列化。这里不限定你的序列 / 反序列化算法执行逻辑，你只需要保证一个二叉树可以被序列化为一个字符串并且将这个字符串
//反序列化为原始的树结构。
//
// 示例:
//
// 你可以将以下二叉树：
//
//    1
//   / \
//  2   3
//     / \
//    4   5
//
//序列化为 "[1,2,3,null,null,4,5]"
//
// 提示: 这与 LeetCode 目前使用的方式一致，详情请参阅 LeetCode 序列化二叉树的格式。你并非必须采取这种方式，你也可以采用其他的方法解决这
//个问题。
//
// 说明: 不要使用类的成员 / 全局 / 静态变量来存储状态，你的序列化和反序列化算法应该是无状态的。
// Related Topics 树 设计


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

class Codec {
    function __construct() {

    }

    /**
     * @param TreeNode $root
     * @return String
     */
    function serialize($root) {
        if ($root == null) {
            return 'X,';
        }

        $leftSerialize = $this->serialize($root->left);
        $rightSerialize = $this->serialize($root->right);

        return $root->val . ',' . $leftSerialize . $rightSerialize;
    }

    /**
     * @param String $data
     * @return TreeNode
     */
    function deserialize($data) {
        $tree = explode(',', trim($data, ','));

        return $this->buildTree($tree);
    }

    private function buildTree(&$tree_arr)
    {
        $top = array_shift($tree_arr);
        if ($top == 'X') {
            return null;
        }

        $node = new TreeNode($top);
        $node->left = $this->buildTree($tree_arr);
        $node->right = $this->buildTree($tree_arr);

        return $node;
    }
}

/**
 * Your Codec object will be instantiated and called as such:
 * $obj = Codec();
 * $data = $obj->serialize($root);
 * $ans = $obj->deserialize($data);
 */
//leetcode submit region end(Prohibit modification and deletion)

class TreeNode {
     public $val = null;
     public $left = null;
     public $right = null;
     function __construct($value) { $this->val = $value; }
}

$root = new TreeNode(1);
$node1 = new TreeNode(2);
$node2 = new TreeNode(3);
$node3 = new TreeNode(4);
$node4 = new TreeNode(5);
$root->left = $node1;
$root->right = $node2;
$node2->left = $node3;
$node2->right = $node4;

$obj = new Codec();
$data = $obj->serialize($root);
echo $data.PHP_EOL;
$ans = $obj->deserialize($data);
var_dump($ans);