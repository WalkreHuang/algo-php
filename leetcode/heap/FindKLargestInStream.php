<?php
//设计一个找到数据流中第K大元素的类（class）。注意是排序后的第K大元素，不是第K个不同的元素。
//
// 你的 KthLargest 类需要一个同时接收整数 k 和整数数组nums 的构造器，它包含数据流中的初始元素。每次调用 KthLargest.add，返
//回当前数据流中第K大的元素。
//
// 示例:
//
//
//int k = 3;
//int[] arr = [4,5,8,2];
//KthLargest kthLargest = new KthLargest(3, arr);
//kthLargest.add(3);   // returns 4
//kthLargest.add(5);   // returns 5
//kthLargest.add(10);  // returns 5
//kthLargest.add(9);   // returns 8
//kthLargest.add(4);   // returns 8
//
//
// 说明:
//你可以假设 nums 的长度≥ k-1 且k ≥ 1。
// Related Topics 堆
//思路：对数组构造一个数量为k的最小堆，堆顶元素即为数组中的第k大元素

//leetcode submit region begin(Prohibit modification and deletion)
class KthLargest {
    private $heap;
    private $k;
    /**
     * @param Integer $k
     * @param Integer[] $nums
     */
    function __construct($k, $nums) {
        $this->heap = new SplMinHeap();
        $this->k = $k;

        foreach ($nums as $num) {
            $this->add($num);
        }
    }

    /**
     * @param Integer $val
     * @return Integer
     */
    function add($val) {
        if ($this->heap->count() < $this->k) {
            $this->heap->insert($val);
        } else {
            $top = $this->heap->top();
            if ($top < $val) {
                //移除堆顶元素
                $this->heap->extract();
                //将新的值插入到堆中
                $this->heap->insert($val);
            }
        }

        return $this->heap->top();
    }
}

/**
 * Your KthLargest object will be instantiated and called as such:
 * $obj = KthLargest($k, $nums);
 * $ret_1 = $obj->add($val);
 */
//leetcode submit region end(Prohibit modification and deletion)
