<?php


class optimizeQuickSort
{
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
        //获取基准值的位置
        $pivot = self::median3($arr, $low, $high);
        if ($high - $low + 1 > 3) {//对于长度小于三的情况median函数足以处理
            $i = $low;
            $j = $high - 1;
            while (true) {
                while ($arr[++$i] < $pivot) {}//从第二位开始向后查询
                while ($arr[--$j] > $pivot) {}//从中值之前，即倒数第二位开始向前查询

                if ($i < $j) {
                    self::swap($arr, $i, $j);
                } else {
                    break;
                }
            }

            self::swap($arr, $i, $high - 1);//当i>j时将其中一个大于中值的值与中值交换位置
            //调用递归函数
            self::help($arr, $low, $i-1);
            self::help($arr, $i + 1, $high);
        }

        return $arr;
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

    /**
     * 先利用三值取中法，找到基准值，再将基准值置于数组末尾
     * @param $arr
     * @param $low
     * @param $high
     * @return mixed
     */
    public static function median3(&$arr, $low, $high)
    {
        if ($high - $low + 1 >= 3) {
            $mid = ($low + $high) >> 1;
            if ($arr[$low] > $arr[$mid]) self::swap($arr, $arr[$low], $arr[$mid]);

            if ($arr[$low] > $arr[$high]) self::swap($arr, $arr[$low], $arr[$high]);

            if ($arr[$high] > $arr[$mid]) self::swap($arr, $arr[$high], $arr[$mid]);

            self::swap($arr, $high - 1, $mid);
            return $arr[$high -1];
        } else {
            if($arr[$low] > $arr[$high]) {
                self::swap($arr, $low, $high);
                return 0;
            }
        }
    }

}

$arr = [8,4,10,9,2,1,5];
$sort_arr = optimizeQuickSort::main($arr);

print_r($sort_arr);

//echo optimizeQuickSort::getReference(133,83,31);