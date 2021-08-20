<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/reverse-vowels-of-a-string/

//给定一个字符串 s 和一个整数 k，从字符串开头算起，每 2k 个字符反转前 k 个字符。
// 如果剩余字符少于 k 个，则将剩余字符全部反转。
// 如果剩余字符小于 2k 但大于或等于 k 个，则反转前 k 个字符，其余字符保持原样。

class reverseWordInStr
{
    /**
     * @param String $s
     * @param integer $k
     * @return String
     */
    public static function run($s, $k)
    {
        $len = strlen($s);
        for ($i = 0;$i < $len; $i += 2*$k) {
            $l = $i;
            $r = $l + $k - 1;
            //剩余字符少于 k 个的情况
            if (!isset($s[$r])) {
                $r = $len - 1;
            }

            //反转字符串
            while ($l < $r) {
                $tmp = $s[$l];
                $s[$l] = $s[$r];
                $s[$r] = $tmp;
                $l++;
                $r--;
            }
        }

        return $s;
    }

}

$str = 'abcdefg';
echo reverseWordInStr::run($str, 2).PHP_EOL;