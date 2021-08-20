<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 20:04
 * Email: <huangwalker@qq.com>
 */
//https://leetcode-cn.com/problems/reverse-words-in-a-string/

class compressStr
{
    /**
     * @param String $S
     * @return String
     */
    public static function run($S)
    {
        if (empty($S)) {
            return '';
        }
        $compress_str = self::tranStr($S);
        var_dump($compress_str);exit();
        return strlen($S) > strlen($compress_str) ? $compress_str : $S;
    }

    private static function tranStr($S)
    {
        $ret = '';
        $len = strlen($S);
        $cur_str = $S[0];
        $cur_str_num = 1;
        for ($i=1;$i<$len;$i++) {
            if ($S[$i] === $cur_str) {
                $cur_str_num++;
            } else {
                $ret .= $cur_str.$cur_str_num;

                $cur_str = $S[$i];
                $cur_str_num = 1;
            }
        }
        $ret .= $cur_str.$cur_str_num;
        return $ret;
    }

}

$str = "bbbac";
echo compressStr::run($str).PHP_EOL;