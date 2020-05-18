<?php

require_once __DIR__.'/../../linkedlist/DoubleLinkedList.php';
class DoubleLinkedQueue
{
    private $doubleLinkedList;
    private $capacity;
    private $length;

    public function __construct($capacity)
    {
        $this->doubleLinkedList = new DoubleLinkedList();
        $this->capacity = $capacity;
        $this->length = 0;
    }

    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    public function insertFront($value)
    {
        if ($this->isFull()) {
            return false;
        }
        $this->doubleLinkedList->insert($value);
    }

    public function insertLast($value)
    {
        // TODO: Implement insertLast() method.
    }

    public function deleteFront()
    {
        // TODO: Implement deleteFront() method.
    }

    public function deleteLast()
    {
        // TODO: Implement deleteLast() method.
    }

    public function getFront()
    {
        // TODO: Implement getFront() method.
    }

    public function getRear()
    {
        // TODO: Implement getRear() method.
    }

    public function isEmpty()
    {
        return ($this->length = 0);
    }

    public function isFull()
    {
        return ($this->length == $this->capacity);
    }
}