<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/reverse-vowels-of-a-string/

//给定 S 和 T 两个字符串，当它们分别被输入到空白的文本编辑器后，判断二者是否相等，并返回结果。 # 代表退格字符。
//
// 注意：如果对空文本输入退格字符，文本继续为空。

class backspaceStringCompare
{
    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    public static function run($s, $t)
    {
        $s_re_build = self::buildStr($s);
        $t_re_build = self::buildStr($t);

        return $s_re_build === $t_re_build;
    }

    private static function buildStr($s)
    {
        $stack = new SplStack();
        $len = strlen($s);

        for ($i=0;$i<$len;$i++) {
            if (!$stack->isEmpty() && $s[$i] === '#') {
                $stack->pop();
            }

            if ($s[$i] !== '#') {
                $stack->push($s[$i]);
            }
        }

        $new_s = '';
        while (!$stack->isEmpty()) {
            $new_s .= $stack->pop();
        }
        return $new_s;
    }

}

$S = "a#c";
$T = "d";
$ret = backspaceStringCompare::run($S, $T);