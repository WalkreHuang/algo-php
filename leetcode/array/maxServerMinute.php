<?php
// https://leetcode-cn.com/problems/the-masseuse-lcci/
//$dp[$i] = $dp[$i-2] + $dp[$i-1]
/**
 *
 * User: huangwalker
 * Date: 2020/5/13
 * Time: 14:46
 * Email: <huangwalker@qq.com>
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function massage($nums) {
        $max_minute = 0;
        $nums_len = count($nums);
        for ($i = 0;$i<$nums_len;$i++) {
            $server_minute = 0;
            for ($j = $i;$j<$nums_len;$j+=2) {
                $server_minute += $nums[$j];
            }

            if ($max_minute < $server_minute) {
                $max_minute = $server_minute;
            }
        }

        return $max_minute;
    }
}

$arr = [1,2,3,1,100,3453];
$obj = new Solution();
$ret = $obj->massage($arr);
print_r($ret);