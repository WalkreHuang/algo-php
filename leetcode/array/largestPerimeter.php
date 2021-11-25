<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/24
 * Time: 17:12
 * Email: <huangwalker@qq.com>
 */

//https://leetcode-cn.com/problems/largest-perimeter-triangle/
class largestPerimeter
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function main($nums) {
        sort($nums);
        $size = count($nums);
        for ($i = $size-1;$i>=2;$i--) {
            if ($nums[$i] < $nums[$i-1] + $nums[$i-2]) {
                return $nums[$i] + $nums[$i-1] + $nums[$i-2];
            }
        }

        return 0;
    }
}

$obj = new largestPerimeter();
$nums = [3,6,2,3];
$ret = $obj->main($nums);
var_dump($ret);