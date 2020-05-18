<?php

//循环队列
//由于队列有元素出列，head指针就向后移动，所以队列前面的空间就空了出来(只是空出来，并未删除)。
//为了更合理的利用空间，人们想了一个办法：将队列的首尾相连接。这样当tail移动到capacity时，会再从0开始循环。
//那当什么时候队列满呢？当head等于tail的时候。可是队列为空的时候也是同样的条件，那不就没法判断了吗？
//又有人提出了这样的想法：牺牲一个存储空间，head前面不存数据，当tail在head前面的时候就是满了,判断条件为：(tail + 1) % capacity = head
//图解见: https://blog.csdn.net/fansongy/article/details/6784954
class MyCircularQueue {
    private $queue = [];//队列数组

    private $capacity;//队列容量
    private $head;//队首元素指针
    private $tail;//队尾元素指针

    public function __construct($capacity)
    {
        $this->capacity = $capacity + 1;//多一个空余的位置，方便区分队满和对空的判断
        $this->head = 0;
        $this->tail = 0;
    }

    public function enQueue($value)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->queue[$this->tail] = $value;

        //与普通队列的区别，可以循环使用下标
        $this->tail = ($this->tail + 1) % $this->capacity;

        return true;
    }

    public function deQueue()
    {
        if ($this->isEmpty()) {
            return false;
        }
        //与普通队列的区别，可以循环使用下标
        $this->head = ($this->head + 1) % $this->capacity;
        return true;
    }

    public function Front()
    {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->head];
    }

    public function Rear()
    {
        if ($this->isEmpty()) {
            return -1;
        }
        $index = ($this->tail - 1 + $this->capacity) % $this->capacity;
        return $this->queue[$index];
    }

    public function isEmpty()
    {
        return $this->head == $this->tail;
    }

    public function isFull()
    {
        return ($this->tail+1) % $this->capacity == $this->head;
    }

    public function getQueueList()
    {
        return $this->queue;
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 */
$obj = new MyCircularQueue(3);
$obj->enQueue(2);
$last_item = $obj->Rear();
echo 'last_item:'.$last_item.PHP_EOL;
$obj->enQueue(3);
$obj->enQueue(5);
$obj->deQueue();
$obj->deQueue();
$obj->deQueue();
$obj->enQueue(6);
$obj->enQueue(7);
$obj->enQueue(9);
$obj->deQueue();
$obj->deQueue();
$obj->deQueue();
$obj->enQueue(11);
$obj->enQueue(22);
$obj->enQueue(33);
$obj->enQueue(44);
$obj->enQueue(55);
$obj->enQueue(66);
$last_item = $obj->Rear();
echo 'last_item:'.$last_item.PHP_EOL;

$queues = $obj->getQueueList();
print_r($queues);
