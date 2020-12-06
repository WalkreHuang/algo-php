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
        $head_node = new ListNode(array_shift($linklist_value));
        $cur_node = $head_node;
        foreach ($linklist_value as $value) {
            $cur_node->next = new ListNode($value);
            $cur_node = $cur_node->next;
        }

        //$this->printList($head_node);
        return $head_node;
    }

    function getListValues($list, &$linklist_value) {
        while ($list != null) {
            $linklist_value[] = $list->val;
            $list = $list->next;
        }
    }

    public function printList($list)
    {
        while (!is_null($list)) {
            echo $list->val.'->';
            $list = $list->next;
        }
    }
}

$list1 = new ListNode(1);
$list2 = new ListNode(7);
$list3 = new ListNode(5);
$list4 = new ListNode(3);
$list1->next = $list2;
$list2->next = $list3;
$list3->next = $list4;

$list6 = new ListNode(3);
$list7 = new ListNode(1);
$list8 = new ListNode(32);
$list9 = new ListNode(66);
$list6->next = $list7;
$list7->next = $list8;
$list8->next = $list9;


var_dump((new Solution())->mergeKLists([$list1, $list6]));