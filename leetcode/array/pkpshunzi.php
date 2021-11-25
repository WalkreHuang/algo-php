<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/25
 * Time: 18:02
 * Email: <huangwalker@qq.com>
 */
//从扑克牌中随机抽5张牌，判断是不是一个顺子，即这5张牌是不是连续的。2～10为数字本身，A为1，J为11，Q为12，K为13，而大、小王为 0 ，可以看成任意数字。A 不能视为 14。

class pkpshunzi
{
    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight($nums) {
        $max_num = max($nums);
        $cur_num = $max_num - 1;
        $zero_num = $this->getZeroNum($nums);
        for ($i=0;$i<4;$i++) {
            if (!in_array($cur_num, $nums)) {
                if ($zero_num <= 0) {
                    return false;
                } else {
                    $zero_num--;
                }
            }
            $cur_num--;
        }

        return true;
    }

    private function getZeroNum($nums)
    {
        $count = 0;
        foreach ($nums as $num) {
            if ($num === 0) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function isStraight2($nums) {
        $min = 14;
        $max = 0;
        $set = [];
        foreach ($nums as $num) {
            if ($num === 0) {continue;}
            $min = $num < $min ? $num : $min;
            $max = $num > $max ? $num : $max;
            if (isset($set[$num])) {return false;}
            $set[$num] = 1;
        }

        return $max - $min < 5;
    }
}

$arr = [1,2,3,4,5];
$arr = [2,3,5,4,7];
$obj = new pkpshunzi();
$ret = $obj->isStraight2($arr);
var_dump($ret);