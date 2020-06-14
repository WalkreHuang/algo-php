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
        //异常值判断
        if(count($nums)<1) return $nums;

        //队列存储对应数的下标index
        $dequeue = [];

        //结果输出
        $result = [];

        //queue 只存数组下标

        for($i=0;$i<count($nums);$i++){
            //如果队列有值(值都是下标)，并且队尾的元素小于等于当前遍历到的元素，就把队尾元素出队，直至队尾元素大于当前元素停止
            while (!empty($dequeue) && $nums[end($dequeue)]<=$nums[$i]){
                array_pop($dequeue);
            }

            //向队尾添加元素(值下标)
            $dequeue[] = $i;

            //print_r($dequeue);

            //如果队首(队列最大的元素)的下标小于当前窗口的左边界，说明队首元素是无效的，需要把队首元素出队
            //简单的数组，下标永远是0开始，这里不是键值对，注意
            if($dequeue[0] < $i+1-$k){
                array_shift($dequeue);
            }

            //如果窗口已经形成，就把窗口最大的元素(队首)放入结果集
            if($i+1>=$k){
                $result[] = $nums[$dequeue[0]];
            }
        }

        return $result;
    }
}

$obj = new windowMaxNum();
$nums = [1,3,-1,-3,5,3,6,7];
$k = 3;
$result = $obj->maxSlidingWindow($nums, $k);

print_r($result);