<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 19:20
 * Email: <huangwalker@qq.com>
 */

class reverseStr
{
    public static function run(&$strs)
    {
        $low = 0;
        $len = count($strs);
        $high = $len-1;

        while ($low < $high) {
            $temp = $strs[$low];
            $strs[$low] = $strs[$high];
            $strs[$high] = $temp;

            $low++;
            $high--;
        }

    }
}

$str = ["h","e","l","l","o"];

reverseStr::run($str);
print_r($str);