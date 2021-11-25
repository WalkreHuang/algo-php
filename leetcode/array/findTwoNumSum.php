<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/31
 * Time: 14:48
 * Email: <huangwalker@qq.com>
 */

class findTwoNumSum
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $flip_nums = array_flip($nums);
        $ans = [];
        foreach ($nums as $num) {
            if (isset($flip_nums[$target-$num])) {
                $ans = [$num, $target-$num];
                break;
            }
        }

        return $ans;
    }

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        $i = 0;
        $j = count($nums) - 1;
        $ans = [];
        while ($i < $j) {
            $sum = $nums[$i] + $nums[$j];
            if ($sum > $target) {
                $j--;
            } elseif ($sum < $target) {
                $i++;
            } else {
                $ans = [$nums[$i], $nums[$j]];
                break;
            }
        }

        return $ans;
    }
}

$arr = [2,7,11,15];
$target = 9;
$obj = new findTwoNumSum();
$ret = $obj->twoSum($arr, $target);
var_dump($ret);