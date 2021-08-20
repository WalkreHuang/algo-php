<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/4
 * Time: 18:25
 * Email: <huangwalker@qq.com>
 */
class Solution {

    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $max_flower_num = 0;
        $flowered_num = count($flowerbed);
        for ($i = 0;$i<$flowered_num;$i++) {
            if ($i == 0 && $flowerbed[$i] == 0 && $flowerbed[$i+1] == 0) {
                $flowerbed[$i] = 1;
                $max_flower_num++;
            } else if ($i == $flowered_num-1 && $flowerbed[$i] == 0 && $flowerbed[$i-1] == 0) {
                $flowerbed[$i] = 1;
                $max_flower_num++;
            } else {
                if ($flowerbed[$i] == 0 && $flowerbed[$i+1] == 0 && $flowerbed[$i-1] == 0) {
                    $flowerbed[$i] = 1;
                    $max_flower_num++;
                }
            }
        }
        return $max_flower_num >= $n;
    }
}

$obj = new Solution();

$arr = [1,0,0,1,0,1,0,1,0,0,0,0];
$max = 2;
$ret = $obj->canPlaceFlowers($arr, $max);
var_dump($ret);