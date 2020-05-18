<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/18
 * Time: 15:03
 * Email: <huangwalker@qq.com>
 */
//双向循环队列，所谓双向：即队列两端都可以进行出队和入队的操作，注意事项：

/*
 head 指针：指向队列头部第 1 个有效数据的位置；
 tail 指针：指向队列尾部（即最后 1 个有效数据）的下一个位置，即下一个从队尾入队元素的位置。

 (1) 指针后移的时候，索引 + 1，要取模；
 (2) 指针前移的时候，为了循环到数组的末尾，需要先加上数组的长度，然后再对数组长度取模。*/
class MyCircularDeque
{
    private $capacity;
    private $head;
    private $tail;

    private $queue = [];
    /**
     * Initialize your data structure here. Set the size of the deque to be k.
     * @param Integer $k
     */
    function __construct($k) {
        $this->capacity = $k + 1;

        $this->head = 0;
        $this->tail = 0;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertFront($value) {
        if ($this->isFull()) {
            return false;
        }

        //先改变指针再赋值，和尾部插入不同
        $this->head = ($this->head - 1 + $this->capacity) % $this->capacity;

        $this->queue[$this->head] = $value;
        return true;
    }

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    function insertLast($value) {
        if ($this->isFull()) {
            return false;
        }
        //先赋值，后改变指针
        $this->queue[$this->tail] = $value;

        $this->tail = ($this->tail + 1) % $this->capacity;
        return true;
    }

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteFront() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->head = ($this->head + 1) % $this->capacity;
        return true;
    }

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    function deleteLast() {
        if ($this->isEmpty()) {
            return false;
        }
        $this->tail = ($this->tail - 1 + $this->capacity) % $this->capacity;
        return true;
    }

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    function getFront() {
        if ($this->isEmpty()) {
            return -1;
        }

        return $this->queue[$this->head];
    }

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    function getRear() {
        if ($this->isEmpty()) {
            return -1;
        }
        $index = ($this->tail - 1 + $this->capacity) % $this->capacity;
        return $this->queue[$index];
    }

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    function isEmpty() {
        return ($this->head == $this->tail);
    }

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    function isFull() {
        return ($this->tail + 1) % $this->capacity == $this->head;
    }
}