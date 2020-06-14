<?php
//给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
//
// k 是一个正整数，它的值小于或等于链表的长度。
//
// 如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
//
//
//
// 示例：
//
// 给你这个链表：1->2->3->4->5
//
// 当 k = 2 时，应当返回: 2->1->4->3->5
//
// 当 k = 3 时，应当返回: 3->2->1->4->5
//
//
//
// 说明：
//
//
// 你的算法只能使用常数的额外空间。
// 你不能只是单纯的改变节点内部的值，而是需要实际进行节点交换。
//
// Related Topics 链表
//思路：
//https://leetcode-cn.com/problems/reverse-nodes-in-k-group/solution/kge-yi-zu-fan-zhuan-lian-biao-by-powcai/

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
    function reverseKGroup($head, $k) {
        //return $this->solution1($head, $k);
        return $this->solution2($head, $k);
    }

    //左闭右开区间
    private function solution1($head, $k)
    {
        $stack = new \SplStack();
        $dummy = new ListNode(0);
        $node = $dummy;

        while (true) {
            $stack_count = 0;
            $tmp = $head;

            while ($tmp != null && $stack_count < $k) {
                $stack->push($tmp);
                $tmp = $tmp->next;
                $stack_count++;
            }

            if ($stack_count != $k) {
                $node->next = $head;
                break;
            }

            while (!$stack->isEmpty()) {
                $node->next = $stack->pop();
                $node = $node->next;
            }

            $head = $node->next = $tmp;
        }

        return $dummy->next;
    }

    private function solution2($head, $k) {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $tail = $head;
        //剩余数量小于k，则不需要翻转
        for ($i=0;$i<$k;$i++) {
            if ($tail == null) {
                return $head;
            }

            $tail = $tail->next;
        }

        //翻转前k个元素
        $newNode = $this->reverse($head, $tail);

        //下一轮开始的地方就是tail
        $head->next = $this->reverseKGroup($tail, $k);

        return $newNode;
    }

    private function reverse($head, $tail)
    {
        $pre = null;
        $curr = $head;

        while ($curr !== $tail) {
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
}
//leetcode submit region end(Prohibit modification and deletion)

class ListNode {
     public $val = 0;
     public $next = null;
     function __construct($val) { $this->val = $val; }

    public function printVal()
    {
        $values[] = $this->val;
        $node = $this->next;
        while ($node != null) {
            $values[] = $node->val;

            $node = $node->next;
        }

        echo join('->', $values).PHP_EOL;
     }
}

$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;

$node1->printVal();

$sol = new Solution();
$reverse_node = $sol->reverseKGroup($node1, 2);
$reverse_node->printVal();