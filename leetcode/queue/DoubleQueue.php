<?php


interface DoubleQueue
{
    /**
     * Adds an item at the front of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    public function insertFront($value);

    /**
     * Adds an item at the rear of Deque. Return true if the operation is successful.
     * @param Integer $value
     * @return Boolean
     */
    public function insertLast($value);

    /**
     * Deletes an item from the front of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    public function deleteFront();

    /**
     * Deletes an item from the rear of Deque. Return true if the operation is successful.
     * @return Boolean
     */
    public function deleteLast();

    /**
     * Get the front item from the deque.
     * @return Integer
     */
    public function getFront();

    /**
     * Get the last item from the deque.
     * @return Integer
     */
    public function getRear();

    /**
     * Checks whether the circular deque is empty or not.
     * @return Boolean
     */
    public function isEmpty();

    /**
     * Checks whether the circular deque is full or not.
     * @return Boolean
     */
    public function isFull();
}