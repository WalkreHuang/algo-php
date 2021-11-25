<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/11
 * Time: 11:02
 * Email: <huangwalker@qq.com>
 */

class guessNum
{
    /**
     * @param  Integer  $n
     * @return Integer
     */
    function guessNumber($n) {
        $low = 1;
        $high = $n;
        while ($low <= $high) {
            $num = $low + floor(($high-$low)/2);
            $hit_ret = $this->guess($num);
            if ($hit_ret == 0) {
                return $num;
            } else if ($hit_ret == 1) {
                $low = $num + 1;
            } else {
                $high = $num - 1;
            }
        }
    }

    private function guess($num)
    {
        if ($num == 6) {
            return 0;
        }
        if ($num > 6) {
            return -1;
        }
        if ($num < 6) {
            return 1;
        }
    }
}

$obj = new guessNum();
$ret = $obj->guessNumber(10);
var_dump($ret);