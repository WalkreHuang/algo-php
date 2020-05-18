<?php

function checkStr($str) {
    $stack = [];

    //字符匹配规则
    $character_map = [
        '{' => '}',
        '[' => ']',
        '(' => ')',
    ];

    for ($i=0;$i<strlen($str);$i++) {
        //开区间，入栈;闭区间，出栈
        if (in_array($str[$i], array_keys($character_map)) ) {
            $stack[] = $str[$i];
        } else if (empty($stack) || $character_map[array_pop($stack)] != $str[$i]) {
            //检查栈顶元素是否为对应的符号
            return false;
        }
    }
    return empty($stack);
}

$str = '{()}[]';

var_dump(checkStr($str));