<?php
/**
 *
 * User: huangwalker
 * Date: 2021/9/28
 * Time: 16:47
 * Email: <huangwalker@qq.com>
 */

class rectangleOverlap
{
    /**
     * @param Integer[] $rec1
     * @param Integer[] $rec2
     * @return Boolean
     */
    function isRectangleOverlap($rec1, $rec2) {
        $right_top_over = $rec1[2] > $rec2[0] && $rec1[3] > $rec2[1];
        $right_bottom_over = $rec1[2] > $rec2[0] && $rec1[1] < $rec2[3];
        $left_top_over = $rec1[0] < $rec2[2] && $rec1[3] > $rec2[1];
        $left_bottom_over = $rec1[0] < $rec2[2] && $rec1[1] < $rec2[3];
        var_dump($right_bottom_over, $right_top_over,$left_bottom_over, $left_top_over);
        return $right_top_over || $right_bottom_over || $left_top_over || $left_bottom_over;
    }
}

$obj = new rectangleOverlap();
$arr1 = [0,0,1,1];
$arr2 = [2,2,3,3];
$ret = $obj->isRectangleOverlap($arr1, $arr2);

var_dump($ret);