<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/20
 * Time: 16:03
 * Email: <huangwalker@qq.com>
 */

class quickSort
{
    public function sort(&$arr)
    {
        $this->help($arr, 0, count($arr) - 1);
    }

    public function help(&$arr, $low, $high)
    {
        if ($high > $low) {
            //一次快排，返回排序后的基数下标
            $pivot = $this->patition($arr, $low, $high);

            //递归排序左边的数组
            $this->help($arr, $low, $pivot-1);
            //递归排序右边的数组
            $this->help($arr, $pivot+1, $high);
        }
    }

    public function patition(&$arr, $low, $high)
    {
        //选择第一个元素作为基准值
        $pivot = $arr[$low];

        $i = $low;
        $j = $high;

        while ($i < $j) {
            // 从右往左找第一个小于基数的数
            while($arr[$j] >= $pivot && $i< $j) {
                $j--;
            }

            //从左往右找第一个大于基数的数
            while($arr[$i] <= $pivot && $i < $j) {
                $i++;
            }

            //找到后，交换两数
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

    public function sort2(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return;
        }

        $mid = $start;
        //一次遍历找出中值
        for ($i= $start+1;$i<=$end;$i++) {
            if ($arr[$i] <= $arr[$mid]) {
                $mid++;
                $tmp = $arr[$i];
                $arr[$i] = $arr[$mid];
                $arr[$mid] = $tmp;
            }
        }
        $tmp = $arr[$start];
        $arr[$start] = $arr[$mid];
        $arr[$mid] = $tmp;

        $this->sort2($arr, $start, $mid-1);
        $this->sort2($arr, $mid+1, $end);
    }

    public function sort3(&$arr, $start, $end)
    {
        if ($start >= $end) {
            return;
        }


    }
}

$obj = new quickSort();

$arr = [2,6,23,21,33,53,21];
$obj->sort2($arr,0, count($arr)-1);
//print_r($arr);
