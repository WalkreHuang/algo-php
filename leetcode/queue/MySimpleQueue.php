<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/18
 * Time: 10:42
 * Email: <huangwalker@qq.com>
 */
//队列是一种特殊的线性表，它只允许在表的前端（head）进行删除操作，而在表的后端（tail）进行插入操作。进行插入操作的端称为队尾，进行删除操作的端称为队头。
//队列中没有元素时，称为空队列。在队列这种数据结构中，最先插入的元素将是最先被删除的元素；反之最后插入的元素将最后被删除的元素，因此队列又称为“先进先出”（FIFO—first in first out）的线性表。  

//队列既然是线性表，那么可以使用顺序存储和链式存储来实现，如果是链式存储的话，那么增删的复杂度都是O(1)，这一点很好理解，应该只要修改一下指针就好了。
//如果是顺序存储的话，在队尾增加的时间复杂度是O(1)，但是在队头进行删除的时候，会涉及到迁移操作(如果不迁移数组，则通过移动前后指针实现)，这时候的时候复杂度就是O(n)，所以一般来讲不会直接使用顺序存储的方式来实现普通队列。

class MySimpleQueue
{
    private $queue = [];

    private $head;//指向头结点的指针
    private $tail;//指向下一个要插入结点的指针

    private $capacity;//队列容量

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->head = 0;
        $this->tail = 0;
    }

    public function isEmpty()
    {
        return ($this->head == $this->tail);
    }

    public function isFull()
    {
        return ($this->tail == $this->capacity);
    }

    public function enQueue($data)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->queue[$this->tail++] = $data;

        return true;
    }

    public function deQueue()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $this->head++;
        return true;
    }

    public function getFront()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return $this->queue[$this->head];
    }

    public function getRear()
    {
        if ($this->isEmpty()) {
            return null;
        }
        $index = --$this->tail;
        return $this->queue[$index];
    }

    public function getQueueList()
    {
        $queues = [];
        for($i=$this->head;$i<$this->tail;$i++) {
             $queues[] = $this->queue[$i];
        }
        return $queues;
    }
}

/**
 * use demo
 */

$queue = new MySimpleQueue(5);

$queue->enQueue(1);
$queue->enQueue(2);
$queue->enQueue(3);
$queue->enQueue(4);
$queue->enQueue(5);
$queue->enQueue(6);

$queue_list = $queue->getQueueList();
print_r($queue_list);

$queue->deQueue();
$queue->deQueue();

$queue_list = $queue->getQueueList();
print_r($queue_list);

$front = $queue->getFront();
echo $front.PHP_EOL;

$rear = $queue->getRear();
echo $rear.PHP_EOL;