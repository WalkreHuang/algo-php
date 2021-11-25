<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/30
 * Time: 11:20
 * Email: <huangwalker@qq.com>
 */

//输入：n = 4
//输出：4
//解释：
//T_3 = 0 + 1 + 1 = 2
//T_4 = 1 + 1 + 2 = 4
class nThTribonacciNumber
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function tribonacci($n) {
        if ($n === 0) {
            return 0;
        }
        if ($n === 1) {
            return 1;
        }
        if ($n === 2) {
            return 1;
        }
        $n1 = 0;
        $n2 = 1;
        $n3 = 1;

        $ans = 0;
        for ($i = 3;$i<= $n;$i++) {
            $ans = $n1 + $n2 + $n3;
            $n1 = $n2;
            $n2 = $n3;
            $n3 = $ans;
        }

        return $ans;
    }
}

$obj = new nThTribonacciNumber();
$ret = $obj->tribonacci(5);