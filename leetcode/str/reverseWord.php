<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/reverse-words-in-a-string/

class reverseWord
{
    /**
     * @param String $str
     * @return String
     */
    public static function run($str)
    {
        $str_arr = explode(' ', $str);
        $res = '';

        $str_len = count($str_arr);
        for ($i = $str_len-1;$i>=0;$i--) {
            if (!empty($str_arr[$i])) {
                $res .= ' '.$str_arr[$i];
            }
        }

        return trim($res, ' ');
    }

}

$str = 'a good   example';
echo reverseWord::run($str).PHP_EOL;