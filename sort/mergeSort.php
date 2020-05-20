<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/20
 * Time: 11:37
 * Email: <huangwalker@qq.com>
 */

class mergeSort
{
    /**
     * 将数组分割成子数组
     * @param $arr
     * @return array
     * @author clh
     * @time 2020/5/20
     */
    public function sort($arr)
    {
        if (count($arr) < 2) {
            return $arr;
        }
        $size = count($arr);
        $mid = floor($size/2);

        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid, $size-$mid);

        return $this->merge($this->sort($left), $this->sort($right));
    }

    /**
     * 对分区后的子数组排序后进行合并
     * @param $left
     * @param $right
     * @return array
     * @author clh
     * @time 2020/5/20
     */
    public function merge($left, $right)
    {
        $merge_result = [];
        $i = 0;

        //左右两边的数组都不为空时，将两者中最小的元素放在结果中，并减少左/右数组的大小
        while (!empty($left) && !empty($right)) {
            if ($left[0] <= $right[0]) {
                $merge_result[$i++] = $left[0];

                $left = array_slice($left, 1, count($left)-1);
            } else {
                $merge_result[$i++] = $right[0];

                $right = array_slice($right, 1, count($right)-1);
            }
        }

        //因为数组已经是有序的，于是可以直接将剩下的元素移到结果数组中
        while(!empty($left)) {
            $merge_result[$i++] = $left[0];
            $left = array_slice($left, 1, count($left)-1);
        }

        while(!empty($right)) {
            $merge_result[$i++] = $right[0];
            $right = array_slice($right, 1, count($right)-1);
        }

        return $merge_result;
    }
}

$obj = new mergeSort();

$arr = [23,34,76,92,32];
$sort_arr = $obj->sort($arr);
print_r($sort_arr);