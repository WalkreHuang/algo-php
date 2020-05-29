<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/29
 * Time: 18:08
 * Email: <huangwalker@qq.com>
 */

class MyMaxHeap
{
    private $arr;//数组，从下标1开始存储数据
    private $capacity;//堆容量
    private $num;//已存放的数据个数

    public function __construct($capacity)
    {
        $this->arr = [];
        $this->arr[0] = null;
        $this->capacity = $capacity;
        $this->num = 0;
    }

    public function insert($data)
    {
        if ($this->isFull()) {
            return false;
        }

        $this->num++;
        $this->arr[$this->num] = $data;

        $index = $this->num;

        while ($index/2 > 0 && $this->arr[$index] > $this->arr[$index/2]) {
            $this->swapArrElement($index, $index/2);
            $index = $index/2;
        }

        return true;
    }

    private function isFull()
    {
        return ($this->num >= $this->capacity);
    }

    private function swapArrElement(int $i, int $j)
    {
        $temp = $this->arr[$i];
        $this->arr[$i] = $this->arr[$j];
        $this->arr[$j] = $temp;
    }

    public function printHeapArr()
    {
        for ($i = 1;$i < $this->capacity;$i++) {
            echo $this->arr[$i].'->';
        }
    }

}

$max_heap = new MyMaxHeap(8);
$max_heap->insert(7);
$max_heap->insert(5);
$max_heap->insert(2);
$max_heap->insert(4);
$max_heap->insert(22);
$max_heap->insert(23);
$max_heap->insert(2);
$max_heap->insert(33);

$max_heap->printHeapArr();