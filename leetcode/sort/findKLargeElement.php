<?php

//https://leetcode-cn.com/problems/kth-largest-element-in-an-array/

class findKLargeElement
{
    public function findKthLargest($nums, $k)
    {
        $target = $this->solution2($nums, $k);

        return $target;
    }

    private function solution1($nums, $k)
    {
        sort($nums);

        return $nums[count($nums) - $k];
    }

    //快速选择,基于快排分区思想实现
    private function solution2($nums, $k)
    {
        $low = 0;
        $len = count($nums);
        $high = $len -1;

        $kLargeIndex = $len - $k;
        while (true) {
            $pivotIndex = $this->partition($nums, $low, $high);

            if ($pivotIndex == $kLargeIndex) {
                return $nums[$pivotIndex];
            } else if ($pivotIndex > $kLargeIndex) {
                $high = $pivotIndex - 1;
            } else {
                $low = $pivotIndex + 1;
            }
        }
    }

    private function partition(&$arr, $low, $high)
    {
        //将第一个元素选为基准比较值
        $pivot = $arr[$low];

        $i = $low;
        $j = $high;

        while ($i < $j) {
            //寻找右边小于基准值的元素
            while ($j>$i && $arr[$j] >= $pivot) {
                $j--;
            }

            //寻找左边大于基准值的元素
            while ($j>$i && $arr[$i] <= $pivot) {
                $i++;
            }

            $this->swap($arr, $i, $j);
        }
        // 使划分好的数分布在基数两侧
        $this->swap($arr, $low, $i);

        return $i;
    }

    private function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

}

$obj = new findKLargeElement();
$nums = [1,54,212,333,23,45];
$k = 2;
$target = $obj->findKthLargest($nums, $k);
echo $target;