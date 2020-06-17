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
        return $this->solutionByTwoPointer($nums);
        return $this->solutionByHash($nums);
    }


    //思路:
    //a.将数组从小到大排序;
    //b.从0下标开始遍历数组，每次取一个元素，将这个元素的相反数设为target;
    //c.每次遍历，使用双指针对当前元素后面的进行遍历，找到两个元素之和为target的，这样就满足了三数之和为0;
    //d.双指针处理细节：头尾各一个指针，每次判断两个指针所指的元素之和与target的大小关系，小了就移动左指针，大了就移动右指针，直到两指针相遇。
    //代码细节：第一个元素，只需要遍历到倒数第三个位置即可；遍历过程需要相邻两元素相同的需要跳过。
    private function solutionByTwoPointer($nums)
    {
        $res = [];
        $arr_len = count($nums);
        if ($arr_len < 3) {
            return $res;
        }

        sort($nums);

        for ($i=0;$i<$arr_len-2;$i++) {
            if ($i >0 && $nums[$i] == $nums[$i-1]) {
                continue;//skip same result
            }
            $j = $i+1;
            $k = $arr_len-1;
            $target = -$nums[$i];

            while ($j < $k) {
                if ($nums[$j] + $nums[$k] == $target) {
                    $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    $j++;
                    $k--;

                    //与前一个遍历的元素相等，直接跳过
                    while ($j < $k && $nums[$j] == $nums[$j-1]) {
                        $j++;
                    }

                    //与前一个遍历的元素相等，直接跳过
                    while ($j < $k && $nums[$k] == $nums[$k+1]) {
                        $k--;
                    }
                } else if ($nums[$j] + $nums[$k] > $target) {
                    $k--;
                } else {
                    $j++;
                }
            }
        }

        return $res;
    }

}
//leetcode submit region end(Prohibit modification and deletion)
$obj = new Solution();
$nums = [-1, 0, 1, 2, -1, -4];
print_r($obj->threeSum($nums));