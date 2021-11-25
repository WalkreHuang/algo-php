<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/23
 * Time: 9:58
 * Email: <huangwalker@qq.com>
 */

//https://leetcode-cn.com/problems/partition-array-into-three-parts-with-equal-sum/submissions/
class splitArraySum
{
    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function canThreePartsEqualSum($arr) {
        $num = count($arr);
        if ($num < 3) {
            return false;
        }
        $sum = array_sum($arr);
        if ($sum % 3 !== 0) {
            return false;
        }
        $part_sum = $sum/3;

        $cur_part_sum = 0;
        $part_found = false;
        for ($i = 0;$i< $num-2;$i++) {
            $cur_part_sum += $arr[$i];
            if ($cur_part_sum === $part_sum) {
                $part_found = true;
                break;
            }
        }
        var_dump($part_found);exit();
        if (!$part_found) {
            return false;
        }

        $cur_part_sum = 0;
        $part_found = false;
        for ($j = $i+1;$j< $num-1;$j++) {
            $cur_part_sum += $arr[$j];
            if ($cur_part_sum === $part_sum) {
                $part_found = true;
                break;
            }
        }
        if (!$part_found) {
            return false;
        }

        $cur_part_sum = 0;
        $part_found = false;
        for ($k = $j+1;$k< $num;$k++) {
            $cur_part_sum += $arr[$k];
            if ($cur_part_sum === $part_sum) {
                $part_found = true;
                break;
            }
        }

        var_dump($part_found);exit();
        if (!$part_found) {
            return false;
        }

        return true;
    }
}

$obj = new splitArraySum();
$arr = [0,0,0,0];
$obj->canThreePartsEqualSum($arr);