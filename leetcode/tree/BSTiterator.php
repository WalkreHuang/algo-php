<?php
//实现一个二叉搜索树迭代器。你将使用二叉搜索树的根节点初始化迭代器。
//
// 调用 next() 将返回二叉搜索树中的下一个最小的数。
//
//
//
// 示例：
//
//
//
// BSTIterator iterator = new BSTIterator(root);
//iterator.next();    // 返回 3
//iterator.next();    // 返回 7
//iterator.hasNext(); // 返回 true
//iterator.next();    // 返回 9
//iterator.hasNext(); // 返回 true
//iterator.next();    // 返回 15
//iterator.hasNext(); // 返回 true
//iterator.next();    // 返回 20
//iterator.hasNext(); // 返回 false
//
//
//
// 提示：
//
//
// next() 和 hasNext() 操作的时间复杂度是 O(1)，并使用 O(h) 内存，其中 h 是树的高度。
// 你可以假设 next() 调用总是有效的，也就是说，当调用 next() 时，BST 中至少存在一个下一个最小的数。
//
// Related Topics 栈 树 设计


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
class BSTIterator {
    public $stack = [];
    /**
     * @param TreeNode $root
     */
    function __construct($root) {
        $this->midOrderLeftNode($root);
    }

    //先保存左下子树的节点
    public function midOrderLeftNode($node)
    {
        if ($node == null) {
            return;
        }
        while (!is_null($node)) {
            $this->stack[] = $node;
            $node = $node->left;
        }
    }

    /**
     * @return the next smallest number
     * @return Integer
     */
    function next() {
        $cur_node = array_pop($this->stack);

        $tmp = $cur_node->right;
        while ($tmp != null) {
            $this->stack[] = $tmp;
            $tmp = $tmp->left;
        }

        return $cur_node->val;
    }

    /**
     * @return Boolean
     */
    function hasNext() {
        return !empty($this->stack);
    }
}

/**
 * Your BSTIterator object will be instantiated and called as such:
 * $obj = BSTIterator($root);
 * $ret_1 = $obj->next();
 * $ret_2 = $obj->hasNext();
 */
//leetcode submit region end(Prohibit modification and deletion)

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
$node1 = new TreeNode(7);
$node2 = new TreeNode(3);
$node3 = new TreeNode(15);
$node4 = new TreeNode(9);
$node5 = new TreeNode(20);

$node1->left = $node2;
$node1->right = $node3;
$node3->left = $node4;
$node3->right = $node5;

$obj = new BSTIterator($node1);
$ret_1 = $obj->next();
$ret_2 = $obj->hasNext();

$ret_3 = $obj->next();
$ret_4 = $obj->next();
$ret_5 = $obj->hasNext();
$ret_6 = $obj->next();
$ret_7 = $obj->next();
$ret_8 = $obj->next();
$ret_9 = $obj->next();

var_dump($ret_1, $ret_2, $ret_3, $ret_4, $ret_5);