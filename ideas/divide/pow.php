<?php
//实现 pow(x, n) ，即计算 x 的 n 次幂函数。
//
// 示例 1:
//
// 输入: 2.00000, 10
//输出: 1024.00000
//
//
// 示例 2:
//
// 输入: 2.10000, 3
//输出: 9.26100
//
//
// 示例 3:
//
// 输入: 2.00000, -2
//输出: 0.25000
//解释: 2-2 = 1/22 = 1/4 = 0.25
//
// 说明:
//
//
// -100.0 < x < 100.0
// n 是 32 位有符号整数，其数值范围是 [−231, 231 − 1] 。
//
// Related Topics 数学 二分查找
// 👍 451 👎 0
//解放1：暴力法,对循环n次相乘得到结果O(n)
//解放2：分治法,对n个数一分为二，将每次的结果返回到上层。时间复杂度O(logn)

//leetcode submit region begin(Prohibit modification and deletion)
class Solution {
    private $ret;
    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        //处理异常情况
        if ($x == 0) {
            return 0;
        }
        if ($n < 0) {
            $x = 1/$x;
            $n = -$n;
        }

        //return $this->solve1($x, $n);
        return $this->solve2($x, $n);
    }

    private function solve1($x, $n)
    {
        if ($n < 0) {
            $x = 1/$x;
            $n = -$n;
        }
        $ret = 1;
        for ($i = 0;$i<$n;$i++) {
            $ret *= $x;
        }

        return $ret;
    }

    private function solve2($x, $n)
    {
        if ($n == 0) {
            return 1;
        }
        if ($n == 1) {
            return $x;
        }

        $subRet = $this->solve2($x,$n/2);

        if ($n % 2 == 1) {
            //奇数
            return $subRet * $subRet * $x;
        } else {
            //偶数
            return $subRet * $subRet;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
