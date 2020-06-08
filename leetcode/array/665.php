<?php

//给你一个长度为 n 的整数数组，请你判断在 最多 改变 1 个元素的情况下，该数组能否变成一个非递减数列。
//
// 我们是这样定义一个非递减数列的： 对于数组中所有的 i (0 <= i <= n-2)，总满足 nums[i] <= nums[i + 1]。
//
//
//
// 示例 1:
//
// 输入: nums = [4,2,3]
//输出: true
//解释: 你可以通过把第一个4变成1来使得它成为一个非递减数列。
//
//
// 示例 2:
//
// 输入: nums = [4,2,1]
//输出: false
//解释: 你不能在只改变一个元素的情况下将其变为非递减数列。
//
//
//
//
// 说明：
//
//
// 1 <= n <= 10 ^ 4
// - 10 ^ 5 <= nums[i] <= 10 ^ 5
//
// Related Topics 数组

//分析：
//一，当数组长度小于3时，最多需要调整一次就能满足条件
//二，当数组长度大于等于3时，出现前一个元素y大于后一个元素z时，如果y的前元素x不存在，让y=z即可；
//若x存在，要满足条件，需要如下调整：
//1，当x<z,让y=z
//2，当x>z,让z=y
//3, 当x=z,让y=z
//综合以上可以得到：当x存在且x>z，就让z=y，否则让y=z
//当变更超过2次就不再满足条件

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    public static function checkPossibility($nums) {
        if (count($nums) < 3) {
            return true;
        }

        $change = 0;

        for ($i=0;$i<count($nums)-1;$i++) {
            //当变更超过2次就不再满足条件
            if ($change > 1) {
                break;
            }

            //出现前一个元素y大于后一个元素z时
            if ($nums[$i] > $nums[$i+1]) {
                $change++;//记录交换次数
                //当x存在且x>z
                if ($i-1 >= 0 && $nums[$i-1] > $nums[$i+1]) {
                    $nums[$i+1] = $nums[$i];
                } else {
                    $nums[$i] = $nums[$i+1];
                }
            }
        }

        return $change <= 1;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
