<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/3
 * Time: 19:45
 * Email: <huangwalker@qq.com>
 */

class arrIntersect
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        $map = [];
        $res = [];
        foreach ($nums1 as $index => $value) {
            if (isset($map[$nums1[$index]])) {
                $map[$nums1[$index]]++;
            } else {
                $map[$nums1[$index]] = 1;
            }
        }

        foreach ($nums2 as $index => $value) {
            if (isset($map[$nums2[$index]]) && $map[$nums2[$index]] > 0) {
                $res[] = $nums2[$index];
                $map[$nums2[$index]]--;
            }
        }

        return $res;
    }
}

$obj = new arrIntersect();

$arr1 = [2,2,2];
$arr2 = [9,4,9,8,2];

print_r($obj->intersect($arr1, $arr2));