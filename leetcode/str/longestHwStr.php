<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/3
 * Time: 16:59
 * Email: <huangwalker@qq.com>
 */

// https://leetcode-cn.com/problems/longest-palindrome/


class longestHwStr
{
    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $s_len_map = [];
        $s_len = strlen($s);
        $ret = 0;
        for ($i = 0;$i<$s_len;$i++) {
            if (isset($s_len_map[$s[$i]])) {
                $s_len_map[$s[$i]]++;
            } else {
                $s_len_map[$s[$i]] = 1;
            }
        }

        $flag = false;
        foreach ($s_len_map as $char => $num) {
            if ($num % 2 === 0) {
                $ret += $num;
            } else {
                $ret += $num - 1;
                $flag = true;
            }
        }

        //是否出现了奇数，如果出现了则需要将结果加1
        return $flag ? $ret +1 :$ret;
    }
}