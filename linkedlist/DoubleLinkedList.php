<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/15
 * Time: 9:48
 * Email: <huangwalker@qq.com>
 */

require_once __DIR__.'/./DoubleLinkedNode.php';
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

    public function insertDataBeforeNode(DoubleLinkedNode $node, $data)
    {
        $new_node = new DoubleLinkedNode($data);
        $pre_node = $node->prev;

        $new_node->next = $node;
        $node->prev = $new_node;

        $pre_node->next = $new_node;
        $new_node->prev = $pre_node;

        return true;
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
        if ($this->length <= 0 || $index >= $this->length) {
            return null;
        }

        $del_node = $this->getNodeByIndex($index);
        if (is_null($del_node)) {
            return null;
        }

        $pre_node = $del_node->prev;
        $aft_node = $del_node->next;

        $pre_node->next = $del_node->next;
        //如果删除的不是尾节点
        if (!is_null($aft_node)) {
            $aft_node->prev = $del_node->prev;
        }

        $this->length--;

        return $del_node;
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

    public function isEmpty()
    {
        return ($this->length == 0);
    }

    public function size()
    {
        return $this->length;
    }
}

