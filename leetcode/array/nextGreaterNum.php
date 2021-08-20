<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/16
 * Time: 9:44
 * Email: <huangwalker@qq.com>
 */

// https://leetcode-cn.com/problems/next-greater-element-i/
// 1.先基于 nums2 构造一个 hash，hash 的 key 是元素数值，value 比元素要大的后一个元素
// 2.遍历 nums1，从 hash 中找到对应的元素并存入数组 ans 中
class nextGreaterNum
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function nextGreaterElement($nums1, $nums2) {
        $hash = [];
        $stack = new SplStack();
        foreach ($nums2 as $num) {
            while (!$stack->isEmpty() && $stack->top() < $num) {
                $tmp = $stack->pop();
                $hash[$tmp] = $num;
            }
            $stack->push($num);
        }

        $ans = [];
        foreach ($nums1 as $num) {
            $ans[] = $hash[$num] ?? -1;
        }

        return $ans;
    }

    /**
     * @param Integer[] $temperatures
     * @return Integer[]
     */
    function nextHigherTemperatureDistance($temperatures) {
        $ans = [];
        $stack = new SplStack();
        foreach ($temperatures as $index => $temperature) {
            while (!$stack->isEmpty() && $temperatures[$stack->top()] < $temperature) {
                $tmp = $stack->pop();

                echo 'temp:'.$tmp.PHP_EOL;
            }
            $ans[$index] = $stack->isEmpty() ? 0 : $index - $stack->top();
            echo 'index:'.$index.PHP_EOL;
            $stack->push($index);
        }

        return $ans;
    }

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function findTheDifference($s, $t) {
        $s_map = $t_map = [];
        $s_len = strlen($s);
        $t_len = strlen($t);
        for ($i=0;$i<$s_len;$i++) {
            if (isset($s_map[$s[$i]])) {
                ++$s_map[$s[$i]];
            } else {
                $s_map[$s[$i]] = 1;
            }

        }
        for ($i=0;$i<$t_len;$i++) {
            if (isset($t_map[$t[$i]])) {
                ++$t_map[$t[$i]];
            } else {
                $t_map[$t[$i]] = 1;
            }
        }

        for ($i=0;$i<$s_len;$i++) {
            if ($s_map[$s[$i]] !== $t_map[$t[$i]]) {
                return $t[$i];
            }
        }

        for ($i=0;$i<$t_len;$i++) {
            if (!isset($s_map[$t[$i]])) {
                return $t[$i];
            }
        }
    }
}

$nums1 = [4,1,2];
$nums2 = [1,3,4,2,8];

$obj = new nextGreaterNum();
$ret = $obj->nextGreaterElement($nums1, $nums2);
//var_dump($ret);

$T = [73, 74, 75, 71, 69, 72, 76, 73];
//$ret = $obj->nextHigherTemperatureDistance($T);
//var_dump($ret);

$ret = $obj->findTheDifference('aa', 'aaa');
var_dump($ret);