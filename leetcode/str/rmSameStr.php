<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/find-the-difference/

class rmSameStr
{
    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s)
    {
        $s_len = strlen($s);
        $stack = new SplStack();
        for ($i = 0;$i<$s_len;$i++) {
            if (!$stack->isEmpty() && $stack->top() === $s[$i]) {
                $stack->pop();
            } else {
                $stack->push($s[$i]);
            }
        }

        $ret = '';
        while (!$stack->isEmpty()) {
            $ret .= $stack->pop();
        }

        return strrev($ret);
    }
}

$obj = new rmSameStr();
$s = 'abbaca';
$ret = $obj->removeDuplicates($s);
var_dump($ret);