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
            //当前窗口元素的个数是否达到k个
            if (!empty($window) && $k <= $i - $window[0]) {
                array_shift($window);
            }

            //保持数组最左边的元素始终是最大值
            while (!empty($window) && $nums[end($window)] <= $nums[$i]) {
                array_shift($window);
            }

            //将当前遍历的元素下标放入窗口
            array_push($window, $i);

            //判断循环是否达到了k次
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