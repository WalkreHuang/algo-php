<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/27
 * Time: 15:27
 * Email: <huangwalker@qq.com>
 */
// https://leetcode-cn.com/problems/excel-sheet-column-number/

class excelSheetToNum
{
    /**
     * @param String $columnTitle
     * @return Integer
     */
    function titleToNumber($columnTitle) {
        $ans = 0;
        $title_len = strlen($columnTitle);
        for ($i = 0;$i<$title_len;$i++) {
            $column_no = ord($columnTitle[$i]) - 64;
            $ans += 26 ** ( $title_len - $i - 1) * $column_no;
        }

        return $ans;
    }
}

$obj = new excelSheetToNum();
$ret = $obj->titleToNumber('ZY');
var_dump($ret);