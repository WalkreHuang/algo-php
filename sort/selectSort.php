<?php


class selectSort
{
    public function sort(&$arr)
    {
        $len = count($arr);
        //要比较的次数
        for ($i = 0;$i<$len-1;$i++) {
            $min = $i;

            //寻找最小值元素的下标
            for ($j=$i+1;$j<$len;$j++) {
                if ($arr[$j] < $arr[$min]) {
                    $min = $j;
                }
            }

            //找到了比当前元素小的值，交换当前元素和最小元素
            if ($min != $i) {
                $temp = $arr[$min];
                $arr[$min] = $arr[$i];
                $arr[$i] = $temp;
            }
        }
        return $arr;
    }
}


$arr = [1,2,46,22,28,33,1,0];
$obj = new selectSort();
$sort = $obj->sort($arr);

print_r($sort);