<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/13
 * Time: 14:51
 * Email: <huangwalker@qq.com>
 */
//寻找求2数之和为0的元素
$arr = [13,2,-2,-13,8,2,0];

$result = [];
$hash = [];

foreach ($arr as $item) {
    if (isset($hash[$item])) {
        //找到了匹配的值
        $result[] = [$hash[$item], $item];
    } else {
        //记录下要匹配的值
        $index = 0-$item;
        $hash[$index] = $item;
    }
}

print_r($result);//t=O(n),s=O(n)