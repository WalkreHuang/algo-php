<?php

//实现一种算法，找出单向链表中倒数第 k 个节点。返回该节点的值。

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
     * @return Integer
     */
    function kthToLast($head, $k) {
        if(is_null($head)) {
            return null;
        }

        $fast = $slow = $head;

        $i = 0;
        while($i < $k) {
            $fast = $fast->next;
            $i++;
        }

        while(!is_null($fast)) {
            $fast = $fast->next;
            $slow = $slow->next;
        }

        return $slow->val;
    }
}