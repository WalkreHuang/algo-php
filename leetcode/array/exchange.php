<?php

//调整数组顺序使奇数位于偶数前面
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function exchange($nums) {
        $i= 0;
        $j = count($nums) -1;

        while ($i < $j) {
            if ($nums[$i] % 2 !== 0) {
                $i++;
                continue;
            }
            if ($nums[$j] % 2 === 0) {
                $j--;
                continue;
            }

            //swap
            $temp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $temp;

            $i++;
            $j--;
        }

        return $nums;
    }
}
$arr = [2,16,3,5,13,1,16,1,12,18,11,8,11,11,5,1];

$res = (new Solution())->exchange($arr);
print_r($res);