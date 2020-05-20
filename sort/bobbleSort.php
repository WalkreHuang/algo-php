<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/20
 * Time: 15:30
 * Email: <huangwalker@qq.com>
 */

class bobbleSort
{
    public function sort($arr)
    {
        for ($i=0;$i< count($arr)-1;$i++) {//i代表比较次数
            $flag = true;//提前终止标志
            for ($j=0;$j<count($arr)-$i-1;$j++) {//j代表每次比较时的元素指针
                if ($arr[$j] > $arr[$j+1]) {
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                    $flag = false;
                }
            }
            if ($flag) {
                break;
            }
        }

        return $arr;
    }
}

$arr = [123,33,22,11,22,85,21,-2];

$obj = new bobbleSort();

print_r($obj->sort($arr));