<?php
/**
 *
 * User: huangwalker
 * Date: 2020/6/17
 * Time: 10:08
 * Email: <huangwalker@qq.com>
 */
function removeSame1($arr)
{
    $unique = [];

    foreach ($arr as $item) {
        if (!in_array($item, $unique)) {
            $unique[] = $item;
        }
    }

    return $unique;
}

function removeSame2($arr)
{
    sort($arr);

    $result = [];
    for ($i = 0;$i<count($arr);$i++) {
        //判断是否与前一个元素相等
        if ($i > 0 && $arr[$i] == $arr[$i-1]) {
            continue;
        }

        $result[] = $arr[$i];
    }

    return $result;
}

$arr = [1,2,4,2,89,234,23,11,22,89];
print_r(removeSame2($arr));