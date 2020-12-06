<?php


class quickSort
{
    //从大到小排序
    public static function main($arr)
    {
        if (empty($arr)) {
            return [];
        }

        self::help($arr, 0 ,count($arr) - 1);

        return $arr;
    }

    private static function help(&$arr, $low, $high)
    {
        if ($low >= $high) {
            return $arr;
        }

        $pivot_index = self::partition($arr, $low, $high);
        self::help($arr, $low, $pivot_index -1);
        self::help($arr, $pivot_index + 1, $high);

        return $arr;
    }

    private static function partition(&$arr, $low, $high)
    {
        $reference = $arr[$low];
        $i = $low;
        $j = $high;

        while($i < $j) {
            //必须从右指针开始扫描的，原因参见:https://blog.csdn.net/lkp1603645756/article/details/85008715
            //https://laixiaoxing.blog.csdn.net/article/details/89289504
            //从尾开始，找到第一个大于基准值的元素下标
            while($arr[$j] <= $reference && $i < $j) {
                $j--;
            }

            //从头开始，找到第一个小于基准值的元素下标
            while($arr[$i] >= $reference && $i < $j) {
                $i++;
            }

            self::swap($arr, $i, $j);
        }

        //交换下标，使得基准值两则元素大小按顺序排列
        self::swap($arr, $low, $i);

        return $i;
    }

    private static function swap(&$arr, $i, $j)
    {
        if ($i == $j) {
            return;
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}

$arr = [8,4,10,9,2,1,5];
$sort_arr = quickSort::main($arr);

print_r($sort_arr);