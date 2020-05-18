<?php
//https://leetcode-cn.com/problems/merge-k-sorted-lists/

/**
 * Definition for a singly-linked list
 */
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        //将链表的所有元素取出来
        $linklist_value = [];
        foreach ($lists as $list) {
            $this->getListValues($list, $linklist_value);
        }
        //排序
        sort($linklist_value);
        //重新构建链表
        $tail_node = null;
        for($i=count($linklist_value)-1;$i>=0;$i--) {
            $cur_node = new ListNode($linklist_value[$i]);
            $cur_node->next = $tail_node;
            $tail_node = $cur_node;
        }
        return $tail_node;
    }

    function getListValues($list, &$linklist_value) {
        while ($list != null) {
            $linklist_value[] = $list->val;
            $list = $list->next;
        }
    }
}

