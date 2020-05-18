<?php


class MyCircularQueue {
    private $queue = [];

    private $capacity;

    private $length = 0;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    public function insertFront($value)
    {
        if ($this->length == $this->capacity) {
            return false;
        }
        array_unshift($this->queue, $value);
        $this->length++;
        return true;
    }

    public function insertLast($value)
    {
        if ($this->length == $this->capacity) {
            return false;
        }
        array_push($this->queue, $value);
        $this->length++;
        return true;
    }

    public function deleteFront()
    {
        array_pop($this->queue);
        $this->length--;
        return true;
    }

    public function deleteLast()
    {
        array_unshift($this->queue);
        $this->length--;
        return true;
    }

    public function getFront()
    {
        $front = current($this->queue);
        return $front;
    }

    public function getRear()
    {
        $front = end($this->queue);
        return $front;
    }

    public function isEmpty()
    {
        return ($this->length ==0);
    }

    public function isFull()
    {
        return ($this->capacity == $this->length);
    }
}

/**
 * Your MyCircularQueue object will be instantiated and called as such:
 */
$obj = new MyCircularQueue(3);
$ret_1 = $obj->enQueue($value);
$ret_2 = $obj->deQueue();
$ret_3 = $obj->Front();
$ret_4 = $obj->Rear();
$ret_5 = $obj->isEmpty();
$ret_6 = $obj->isFull();
