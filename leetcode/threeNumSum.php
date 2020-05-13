<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/13
 * Time: 14:46
 * Email: <huangwalker@qq.com>
 */
//题目地址：https://leetcode-cn.com/problems/3sum/

$arr = [82,8,20,-70,-10,10,-90,50];

$length = count($arr);

//缓存匹配项
$hash = [];
$result = [];

for ($i=0;$i< $length-1;$i++) {
    for ($j=$i+1;$j< $length;$j++) {
        if (isset($hash[$arr[$j]])) {
            array_push($hash[$arr[$j]], $arr[$j]);
            $result[] = $hash[$arr[$j]];
            $hash[$arr[$j]] = null;
        } else {
            $index = 0-$arr[$i]-$arr[$j];
            $hash[$index] = [$arr[$i], $arr[$j]];
        }
    }
}

print_r($result);


