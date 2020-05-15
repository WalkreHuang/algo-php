<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/15
 * Time: 9:48
 * Email: <huangwalker@qq.com>
 */

require_once './DoubleLinkedNode.php';
class DoubleLinkedList
{
    /**
     * @var DoubleLinkedNode
     */
    public $head;
    public $length;

    public function __construct()
    {
        $this->head = new DoubleLinkedNode();
        $this->length = 0;
    }

    public function insert($data)
    {
        return $this->insertDataAfterNode($this->head, $data);
    }

    public function insertDataAfterNode(DoubleLinkedNode $node, $data)
    {
        $new_node = new DoubleLinkedNode($data);
        $after_node = $node->next;

        $new_node->next = $after_node;
        //如果待插入的节点不是头结点
        if (!is_null($after_node)) {
            $after_node->prev = $new_node;
        }

        $node->next = $new_node;
        $new_node->prev = $node;

        $this->length++;

        return $new_node;
    }

    public function getNodeByIndex(int $index)
    {
        if ($this->length <= 0 || $index >= $this->length) {
            return null;
        }

        $node = $this->head->next;
        for ($i=0;$i<$index;$i++) {
            $node = $node->next;
        }

        return $node;
    }

    public function delete(int $index)
    {
        $del_node = $this->getNodeByIndex($index);
        if (is_null($del_node)) {
            return false;
        }

        $pre_node = $del_node->prev;
        $aft_node = $del_node->next;

        $pre_node->next = $del_node->next;
        //如果删除的不是尾节点
        if (!is_null($aft_node)) {
            $aft_node->prev = $del_node->prev;
        }

        unset($del_node);
        $this->length--;

        return true;
    }

    public function getLists()
    {
        $result = [];

        $node = $this->head->next;
        for ($i=0;$i<$this->length;$i++) {
            $result[] = $node->data;
            $node = $node->next;
        }

        return $result;
    }
}

//初始链表：100->600->400->200->10
$double_linked_list = new DoubleLinkedList();
$double_linked_list->insert(10);
$double_linked_list->insert(200);
$double_linked_list->insert(400);
$double_linked_list->insert(600);
$double_linked_list->insert(100);


$lists = $double_linked_list->getLists();
echo join('->', $lists).PHP_EOL;

$double_linked_list->delete(3);

$lists = $double_linked_list->getLists();
echo join('->', $lists).PHP_EOL;
