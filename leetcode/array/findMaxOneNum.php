<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/18
 * Time: 16:21
 * Email: <huangwalker@qq.com>
 */

class findMaxOneNum
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMaxConsecutiveOnes($nums) {
        $cur_max_num = $max_num = 0;
        foreach($nums as $num) {
            if ($num === 1) {
                $max_num = max($max_num, ++$cur_max_num);
            } else {
                $cur_max_num = 0;
            }
        }
        return $max_num;
    }
}

$obj = new findMaxOneNum();
$nums = [1,0,1,1,0,1];
$ret = $obj->findMaxConsecutiveOnes($nums);
var_dump($ret);