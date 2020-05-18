<?php
//leetcode:https://leetcode-cn.com/problems/majority-element/submissions/

function majorNum($nums) {
    //初始化第一个元素的计数值
    $count = 1;
    $ret = $nums[0];

    foreach ($nums as $num) {
        if ($num == $ret) {
            $count++;
        } else {
            $count--;
            if ($count == 0) {
                //对新元素重新开始计数
                $count = 1;
                $ret = $num;
            }
        }
    }
    return $ret;
}

$nums = [1,2,3,3,2,3,3,2,1,1,1];
echo majorNum($nums);
