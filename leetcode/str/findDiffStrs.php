<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/find-the-difference/

class findDiffStrs
{
    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t)
    {
        $s_sum = $t_sum = 0;
        $s_len = strlen($s);
        $t_len = strlen($t);
        for ($i=0;$i<$s_len;$i++) {
            $s_sum += ord($s[$i]);
        }

        for ($i=0;$i<$t_len;$i++) {
            $t_sum += ord($t[$i]);
        }

        return chr($t_sum - $s_sum);
    }
}

$obj = new findDiffStrs();
$s = 'aaebca';
$t = 'aaecbga';
$ret = $obj->findTheDifference($s, $t);
var_dump($ret);