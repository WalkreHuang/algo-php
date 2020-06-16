<?php
//给你一个包含 n 个整数的数组 nums，判断 nums 中是否存在三个元素 a，b，c ，使得 a + b + c = 0 ？请你找出所有满足条件且不重复
//的三元组。
//
// 注意：答案中不可以包含重复的三元组。
//
//
//
// 示例：
//
// 给定数组 nums = [-1, 0, 1, 2, -1, -4]，
//
//满足要求的三元组集合为：
//[
//  [-1, 0, 1],
//  [-1, -1, 2]
//]
//
// Related Topics 数组 双指针


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $map = [];
        $result = [];

        for ($i=0;$i<count($nums)-2;$i++) {
            for ($j=$i+1;$j<count($nums)-1;$j++) {
                if (!is_null($map[$nums[$j]])) {
                    $result[] = array_merge($map[$nums[$j]], [$nums[$j]]);
                    $map[$nums[$j]] = null;
                } else {
                    $mark = 0 - ($nums[$i] + $nums[$j]);
                    $map[$mark] = [$nums[$i], $nums[$j]];
                }
            }
        }

        return $result;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
$obj = new Solution();
$nums = [-1, 0, 1, 2, -1, -4];
print_r($obj->threeSum($nums));