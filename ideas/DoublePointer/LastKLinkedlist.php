<?php
//输入一个链表，输出该链表中倒数第k个节点。为了符合大多数人的习惯，本题从1开始计数，即链表的尾节点是倒数第1个节点。例如，一个链表有6个节点，从头节点开始，
//它们的值依次是1、2、3、4、5、6。这个链表的倒数第3个节点是值为4的节点。
//
//
//
// 示例：
//
// 给定一个链表: 1->2->3->4->5, 和 k = 2.
//
//返回链表 4->5.
// Related Topics 链表 双指针
// 👍 73 👎 0


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

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function getKthFromEnd($head, $k) {
        $slow = $fast = $head;
        //快指针先走 k 步
        $i = 0;
        while ($i < $k) {
            $fast = $fast->next;
            $i++;
        }

        //快慢指针一起移动，直至快指针到达末尾，返回慢指针即得结果
        while ($fast != null) {
            $fast = $fast->next;
            $slow = $slow->next;
        }

        return $slow;
    }

}
//leetcode submit region end(Prohibit modification and deletion)
