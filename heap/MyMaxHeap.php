<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/29
 * Time: 18:08
 * Email: <huangwalker@qq.com>
 */

//使用数组存储堆（前提从下标为1开始存放），各节点之间有下列关系：
//数组中下标为 i 的节点的左子节点，就是下标为 i∗2 的节点，右子节点就是下标为 i∗2+1 的节点，父节点就是下标为 i/2​ 的节点。
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

        //自底向上堆化，数组元素从前往后处理，默认第一个元素为根节点
        $parent_index = floor($index / 2);
        while ($parent_index > 0 && $this->arr[$index] > $this->arr[$parent_index]) {
            $this->swapArrElement($index, $parent_index);
            $index = $parent_index;

            $parent_index = floor($index/2);
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
        for ($i = 1;$i <= $this->capacity;$i++) {
            echo $this->arr[$i].'->';
        }
    }

    //移除堆中最大元素的思路：
    //思路1：当我们删除堆顶元素之后，就需要把第二大的元素放到堆顶，那第二大元素肯定会出现在左右子节点中，
    //然后我们再迭代地删除第二大节点，以此类推，直到叶子节点被删除。（这种方式可能会产生数组空洞）
    //思路2：把最后一个节点放到堆顶，然后利用同样的父子节点对比方法，
    //对于不满足父子节点大小关系的，互换两个节点，并且重复进行这个过程，直到父子节点之间满足大小关系为止。
    public function removeTop()
    {
        if ($this->num == 0) {
            return false;
        }

        $this->arr[1] = $this->arr[$this->num];

        $count = --$this->num;
        $index = 1;
        //自顶向下堆化
        while (true) {
            $parent_index = $index;
            $left_index = $index*2;
            $right_index = $index*2+1;
            //比较左右节点和根节点的大小，并交换，未发生交换说明堆化完成
            if ($left_index <= $count && $this->arr[$index] < $this->arr[$left_index]) {
                $parent_index = $left_index;
            }
            if ($right_index <= $count && $this->arr[$parent_index] < $this->arr[$right_index]) {
                $parent_index = $right_index;
            }
            if ($parent_index == $index) {
                break;
            }

            $this->swapArrElement($parent_index, $index);

            $index = $parent_index;
        }
        return true;
    }

    //使用自顶向下堆化数组
    //对数组元素从后往前处理，且只处理非叶子节点。
    //关键知识点：对于完全二叉树来说，下标从 n/2​+1 到 n 的节点都是叶子节点。
    public function buildHeap($arr)
    {
        $heap_size = count($arr);
        for ($i = floor($heap_size/2); $i>= 1; --$i) {
            $this->heapify($arr, $i, $heap_size);
        }

        return $arr;
    }

    private function heapify(&$arr, $index, $heap_size)
    {
        while (true) {
            $parent_index = $index;
            $left_index = $index*2;
            $right_index = $index*2+1;
            if ($left_index <= $heap_size && $arr[$index] < $arr[$left_index]) {
                $parent_index = $left_index;
            }

            if ($right_index <= $heap_size && $arr[$parent_index] < $arr[$right_index]) {
                $parent_index = $right_index;
            }

            if ($parent_index == $index) {
                break;
            }

            $this->swapArr($arr, $parent_index, $index);

            $index = $parent_index;
        }
    }

    private function swapArr(&$arr, int $i, int $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    /**
     * 堆排序
     * 将堆顶的元素放到堆的末尾，并将堆的大小减一，再通过堆化的方法，将剩余的元素重新构建堆，
     * 重复这个过程，直至最后堆中只剩下一个元素
     * @param $arr
     * @return array
     */
    public function sort($arr)
    {
        $heap_arr = $this->buildHeap($arr);
        $size = count($arr);

        while ($size > 1) {
            $this->swapArr($heap_arr, 1, $size);
            --$size;
            $this->heapify($heap_arr, 1, $size);
        }

        return $heap_arr;
    }
}

$max_heap = new MyMaxHeap(8);
var_dump($max_heap->insert(7));
var_dump($max_heap->insert(5));
var_dump($max_heap->insert(2));
var_dump($max_heap->insert(4));
var_dump($max_heap->insert(22));
var_dump($max_heap->insert(23));
var_dump($max_heap->insert(33));
var_dump($max_heap->insert(76));
var_dump($max_heap->insert(45));

$max_heap->printHeapArr();
echo PHP_EOL;
$max_heap->removeTop();

$max_heap->printHeapArr();

echo PHP_EOL;
$test_arr = [null,2,3,9,34,22,3,6];
//echo join('->', $max_heap->buildHeap($test_arr));
echo join('->', $max_heap->sort($test_arr));