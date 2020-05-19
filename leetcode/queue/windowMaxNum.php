<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/19
 * Time: 9:38
 * Email: <huangwalker@qq.com>
 */
//没搞懂~=~
//https://leetcode-cn.com/problems/sliding-window-maximum/solution/shuang-xiang-dui-lie-jie-jue-hua-dong-chuang-kou-2/
class windowMaxNum
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    public function maxSlidingWindow($nums, $k)
    {
        $window = [];
        $res = [];

        for ($i=0;$i<count($nums);$i++) {
            if (!empty($window)) {
                if ($i - $window[0] >= $k) {
                    array_shift($window);
                }
            }

            while (!empty($window) && $nums[end($window)] <= $nums[$i]) {
                array_pop($window);
            }

            $window[] = $i;

            if ($i >= $k-1) {
                $res[] = $nums[$window[0]];
            }
        }

        return $res;
    }
}

$obj = new windowMaxNum();
$nums = [1,3,-1,-3,5,3,6,7];
$k = 3;
$result = $obj->maxSlidingWindow($nums, $k);

print_r($result);