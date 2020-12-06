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

    //双指针完成分区，好理解
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
        if ($start < $end) {
            $pivot = $this->partition($arr, $start, $end);
            $this->sort2($arr, $start, $pivot-1);
            $this->sort2($arr, $pivot+1, $end);
        }

        return $arr;
    }

    public function partition(&$arr, $start, $end)
    {
        //设立基准值
        $pivot = $start;
        $index = $pivot+1;

        for ($i = $index;$i<= $end;$i++) {
            if ($arr[$i] < $arr[$pivot]) {
                if ($i != $index) {
                    $this->swap($arr, $i, $index);
                }
                $index++;
            }
            //echo 'arr:'.join('->', $arr).PHP_EOL;
        }

        $this->swap($arr, $pivot, $index-1);
        return $index-1;
    }
}

$obj = new quickSort();

$arr = [35,6,45,21,33,53,21];
$obj->sort($arr);
print_r($arr);
