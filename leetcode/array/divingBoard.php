<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/11
 * Time: 10:23
 * Email: <huangwalker@qq.com>
 */

class divingBoard
{
    /**
     * @param Integer $shorter
     * @param Integer $longer
     * @param Integer $k
     * @return Integer[]
     */
    function demo($shorter, $longer, $k) {
        $ans = [];
        if ($k == 0) {
            return $ans;
        }

        for ($i = $k;$i>=0;$i--) {
            $ans[] = ($i * $shorter) + ($k-$i) * $longer;
        }

        return $ans;
    }
}

$obj = new divingBoard();
$ret = $obj->demo(1, 1, 100000);
var_dump($ret);