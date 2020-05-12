<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/12
 * Time: 17:30
 * Email: <huangwalker@qq.com>
 */

require_once './LinkedListNode.php';
class LinkedList
{
    /**
     *
     * @var LinkedListNode
     */
    public $head;//哨兵节点

    public $length;//链表长度

    public function __construct($head = null)
    {
        if ($head == null) {
            $this->head = new LinkedListNode();
        } else {
            $this->head = $head;
        }

        $this->length = 0;
    }

    public function insert($data)
    {
        return $this->insertDataAfter($this->head, $data);
    }

    /**
     * 在某个节点后插入新的节点
     * @param $originNode
     * @param $data
     * @return LinkedListNode|null
     * @author clh
     * @time 2020/5/12
     */
    public function insertDataAfter($originNode, $data)
    {
        if (is_null($originNode)) {
            return null;
        }

        $newNode = new LinkedListNode($data);

        //新节点的下个节点为源节点的下个节点
        $newNode->next = $originNode->next;
        $originNode->next = $newNode;

        $this->length++;

        return $newNode;
    }

    //在某个节点前插入新的节点
    public function insertDataBefore($originNode, $data)
    {
        $preNode = $this->gerPreNode($originNode);
        if (!$preNode) {
            return false;
        }
        $newNode = new LinkedListNode($data);

        //将插入节点指向当前节点
        $newNode->next = $originNode;
        //将当前节点的前驱节点指向新节点
        $preNode->next = $newNode;

        $this->length++;
        return true;
    }
    

    public function delete(LinkedListNode $node)
    {
        $preNode = $this->gerPreNode($node);

        //将节点的前驱节点指向节点的后继节点
        $preNode->next = $node->next;
        //删除当前节点
        unset($node);

        $this->length--;
        return true;
    }

    public function getNodeByIndex($index)
    {

    }

    public function gerPreNode(linkedlistNode $node)
    {
        $preNode = null;

        $curNode = $this->head;
        while ($curNode) {
            if ($curNode->next === $node) {
                $preNode = $curNode;
            }

            $curNode = $curNode->next;
        }

        return $preNode;
    }

    public function getLinkedList()
    {
        $node = $this->head;
        $length = $this->length;
        $result = [];

        while($node && $length >=0) {
            $result[] = $node->data;

            $node = $node->next;
            $length--;
        }

        array_shift($result);
        return $result;
    }

    public function buildCircleList()
    {
        
    }
}

$list = new LinkedList();
$node1 = $list->insert('a');
$node2 = $list->insert('b');
$node3 = $list->insert('c');
$node4 = $list->insert('d');
$node5 = $list->insert('e');
$node6 = $list->insert('f');

$linkedLists = $list->getLinkedList();
echo join(',', $linkedLists).PHP_EOL;

$linkedLists = $list->getLinkedList();
echo join(',', $linkedLists).PHP_EOL;

$list->delete($node5);

$linkedLists = $list->getLinkedList();
echo join(',', $linkedLists).PHP_EOL;