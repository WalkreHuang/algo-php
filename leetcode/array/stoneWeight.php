<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/26
 * Time: 14:19
 * Email: <huangwalker@qq.com>
 */
// https://leetcode-cn.com/problems/last-stone-weight/

//输入：[2,7,4,1,8,1]
//输出：1
//解释：
//先选出 7 和 8，得到 1，所以数组转换为 [2,4,1,1,1]，
//再选出 2 和 4，得到 2，所以数组转换为 [2,1,1,1]，
//接着是 2 和 1，得到 1，所以数组转换为 [1,1,1]，
//最后选出 1 和 1，得到 0，最终数组转换为 [1]，这就是最后剩下那块石头的重量。


class stoneWeight
{
    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        $heap = new SplMaxHeap();
        foreach ($stones as $stone) {
            $heap->insert($stone);
        }
        while ($heap->count() > 1) {
            $max_element = $heap->extract();
            if ($heap->isEmpty()) {
                break;
            }
            $second_element = $heap->extract();
            $diff = $max_element - $second_element;
            if ($diff > 0) {
                $heap->insert($diff);
            }
        }
        return !$heap->isEmpty() ? $heap->top() : 0;
    }
}

$obj = new stoneWeight();
$stones = [2,2];
$ret = $obj->lastStoneWeight($stones);
var_dump($ret);