<?php

function reverse($arr)
{
    $i = 0;
    $j = count($arr) - 1;

    while ($i < $j) {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;

        $i++;
        $j--;
    }

    return $arr;
}

$arr = [11, 12, 6, 66, 88];
print_r(reverse($arr));