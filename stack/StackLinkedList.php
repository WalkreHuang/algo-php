<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/15
 * Time: 12:07
 * Email: <huangwalker@qq.com>
 */

require_once __DIR__.'/../linkedlist/DoubleLinkedList.php';

class StackLinkedList
{
    /**
     * @var DoubleLinkedList
     */
    private $linkedList;

    private $length;

    public function __construct()
    {
        $this->linkedList = new DoubleLinkedList();
        $this->length = 0;
    }

    public function push($data)
    {
        if ($this->linkedList->isEmpty()) {
            $this->linkedList->insert($data);
        } else {
            $end_node = $this->linkedList->getNodeByIndex($this->linkedList->size()-1);

            $this->linkedList->insertDataAfterNode($end_node, $data);
        }
        $this->length++;
    }

    public function pop()
    {
        $del_node = $this->linkedList->delete($this->linkedList->size()-1);
        $this->length--;
        return $del_node;
    }

    public function top()
    {
        if ($this->linkedList->isEmpty()) {
            return null;
        } else {
            return $this->linkedList->getNodeByIndex(0);
        }
    }

    public function isEmpty()
    {
        return ($this->length > 0);
    }

    public function size()
    {
        return $this->length;
    }

    public function getStackList()
    {
        $stack = $this->linkedList->getLists();

        return $stack;
    }
}

$doubleStack = new StackLinkedList();

$doubleStack->push(100);
$doubleStack->push(200);
$doubleStack->push(300);
$doubleStack->push(500);
$doubleStack->push(800);
$doubleStack->push(600);

echo join('->', $doubleStack->getStackList()).PHP_EOL;

$node2 = $doubleStack->pop();
//var_dump($node2);

echo join('->', $doubleStack->getStackList()).PHP_EOL;

$node = $doubleStack->top();
//var_dump($node);