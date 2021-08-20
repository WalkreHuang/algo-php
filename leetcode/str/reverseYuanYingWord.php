<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/reverse-vowels-of-a-string/

// 给你一个字符串 s ，仅反转字符串中的所有元音字母，并返回结果字符串。
// 元音字母包括 'a'、'e'、'i'、'o'、'u'，且可能以大小写两种形式出现。

class reverseYuanYingWord
{
    /**
     * @param String $str
     * @return String
     */
    public static function run($str)
    {
        $yuanying_chars = ['a', 'e', 'i', 'o', 'u','A', 'E', 'I', 'O', 'U'];
        $set = [];
        foreach ($yuanying_chars as $char) {
            $set[$char] = 1;
        }

        $i = 0;
        $len = strlen($str);
        $j = $len - 1;
        while ($i < $j) {
            if (!isset($set[$str[$i]])) {
                $i++;
            }

            if (!isset($set[$str[$j]])) {
                $j--;
            }

            if (isset($set[$str[$i]]) && isset($set[$str[$j]])) {
                self::swap($str, $i, $j);
                $i++;
                $j--;
            }
        }

        return $str;
    }

    private static function swap(&$str, $i, $j)
    {
        $tmp = $str[$i];
        $str[$i] = $str[$j];
        $str[$j] = $tmp;
    }
}

$str = 'aA';
echo reverseYuanYingWord::run($str).PHP_EOL;