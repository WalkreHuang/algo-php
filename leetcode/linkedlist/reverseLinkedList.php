<?php
//反转一个单链表。
//
// 示例:
//
// 输入: 1->2->3->4->5->NULL
//输出: 5->4->3->2->1->NULL
//
// 进阶:
//你可以迭代或递归地反转链表。你能否用两种方法解决这道题？
// Related Topics 链表
//思路：
//双指针迭代
//我们可以申请两个指针，第一个指针叫 pre，最初是指向 null 的。
//第二个指针 cur 指向 head，然后不断遍历 cur。
//每次迭代到 cur，都将 cur 的 next 指向 pre，然后 pre 和 cur 前进一位。
//都迭代完了(cur 变成 null 了)，pre 就是最后一个节点了。



//leetcode submit region begin(Prohibit modification and deletion)
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {
    private $stack;

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public static function reverseList($head) {
        $pre = null;
        $curr = $head;

        while ($curr != null) {
            //记录当前节点的下一个节点
            $tmp = $curr->next;
            //然后将当前节点指向pre
            $curr->next = $pre;
            //pre和cur节点都前进一位
            $pre = $curr;
            $curr = $tmp;
        }

        return $pre;
    }

    public function reverseList2($head) {
        $this->stack = new SplStack();

        $node = $head;
        while ($node != null) {
            $this->stack->push($node->val);
            $node = $node->next;
        }

        $ret = null;
        $tmp_node = null;
        while (!$this->stack->isEmpty()) {
            if ($ret == null) {
                $ret = new ListNode($this->stack->pop());
                $tmp_node = $ret;
            } else {
                $tmp_node->next = new ListNode($this->stack->pop());
                $tmp_node = $tmp_node->next;
            }
        }

        return $ret;
    }


}
//leetcode submit region end(Prohibit modification and deletion)
