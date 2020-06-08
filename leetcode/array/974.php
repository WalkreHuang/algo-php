<?php
//给定一个整数数组 A，返回其中元素之和可被 K 整除的（连续、非空）子数组的数目。
//
//
//
// 示例：
//
// 输入：A = [4,5,0,-2,-3,1], K = 5
//输出：7
//解释：
//有 7 个子数组满足其元素之和可被 K = 5 整除：
//[4, 5, 0, -2, -3, 1], [5], [5, 0], [5, 0, -2, -3], [0], [0, -2, -3], [-2, -3]
//
//
//
//
// 提示：
//
//
// 1 <= A.length <= 30000
// -10000 <= A[i] <= 10000
// 2 <= K <= 10000
//
// Related Topics 数组 哈希表


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
    * @param Integer[] $A
    * @param Integer $K
    * @return Integer
    */
    public static function subarraysDivByK($A, $K) {
        $arr_length = count($A);
        $ret_count = 0;
        $sum = [];

        //构建前缀和数组
        for ($i = 0;$i<$arr_length;$i++) {
            $sum[$i+1] = $sum[$i] + $A[$i];
        }

        //$ret_arr = [];
        for ($i=0;$i<$arr_length;$i++) {
            for ($j=$i+1;$j<=$arr_length;$j++) {
                //看各个前缀和的差是否能被k整除
                $sum_sub = $sum[$j] - $sum[$i];
                if ($sum_sub % $K == 0) {
                    //$ret_arr[] = array_slice($A, $i, $j-$i);
                    $ret_count++;
                }
            }
        }
        //print_r($ret_arr);

        return $ret_count;
    }

    /**
     * 同余定理：在原数组上面任何位置任何数加上n*K(n是整数)，对结果不会产生影响;
     * 若有某2个位置i、j的前缀和对K取余是相同的，那么就表示A数组在范围[i-1,j]上的数字相加必定是K的倍数。
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer
     */
    public static function subarraysDivByK2($A, $K) {
        $map[0] = 1;//hash存储取余结果
        $preSum = 0;//前缀和结果
        $count = 0;

        for ($i=0;$i<count($A);$i++) {
            //负数单独处理
            if ($A[$i] < 0) {
                $A[$i] = ($A[$i] % $K)+$K;
            }
            $preSum += $A[$i];

            $map_key = $preSum % $K;

            if ($map[$map_key]) {
                $count += $map[$map_key];
            }

            if ($map[$map_key]) {
                $map[$map_key] ++;
            } else {
                $map[$map_key] = 1;
            }
        }

        return $count;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
$arr = [3,2,5,4,6];
$K = 5;
echo Solution::subarraysDivByK2($arr, $K);