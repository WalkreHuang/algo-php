<?php
//给你一个字符串 S、一个字符串 T 。请你设计一种算法，可以在 O(n) 的时间复杂度内，从字符串 S 里面找出：包含 T 所有字符的最小子串。
//
//
//
// 示例：
//
// 输入：S = "ADOBECODEBANC", T = "ABC"
//输出："BANC"
//
//
//
// 提示：
//
//
// 如果 S 中不存这样的子串，则返回空字符串 ""。
// 如果 S 中存在这样的子串，我们保证它是唯一的答案。
//
// Related Topics 哈希表 双指针 字符串 Sliding Window
// 👍 697 👎 0
//解题思路：
//1.使用双指针来维护一个可变的窗口，一开始增加 right 扩大窗口，直至窗口中包含全部的目标字符（寻找可行解）
//2.增加 left 减小窗口，直至窗口中缺少目标字符为止（寻找最优解）
//3. 重复1，2两过程，直至 right 指针到达字符串末尾

//具体的编码技巧：使用2个 map 来保存目标字符和滑动窗口出现字符的数据；借助valid变量判断滑动窗口内的元素是否满足条件；
//初始化结果的开始下标及长度，滑动过程中不断更新下标及长度，最后通过 substr 方法返回结果
//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    function minWindow($s, $t) {
        //初始化目标map
        $need = [];
        for ($i =0 ;$i<strlen($t);$i++) {
            $count = $need[$t[$i]] ?? 0;
            $need[$t[$i]] = ++$count;
        }
        //初始化窗口
        $windows = [];

        //双指针，用于维护滑动窗口
        $left = $right = 0;

        //目标所在的起始下标及长度
        $start = 0;
        $len = PHP_INT_MAX;

        //滑动窗口中满足字符的数量，当等于need的长度时，窗口及终止移动
        $valid_num = 0;

        while ($right < strlen($s)) {
            //将移入窗口的字符
            $in_char = $s[$right];
            //扩大窗口
            $right++;

            //当前字符是否为需要的字符
            if (array_key_exists($in_char, $need)) {
                $windows[$in_char] = $windows[$in_char] ?? 0;
                //将目标字符的数量添加至滑动窗口
                $windows[$in_char]++;

                //判断当前字符是否已到达目标数
                if ($need[$in_char] === $windows[$in_char]) {
                    $valid_num++;
                }
            }

            //判断窗口是否要收缩
            while ($valid_num === count($need)) {
                //更新覆盖子串
                if ($right - $left < $len) {
                    $start = $left;
                    $len = $right - $left;
                }
                //将移出的字符
                $out_char = $s[$left];
                //减小窗口
                $left++;
                //printf("window: [%d, %d), out_char: %s, start= %d,len = %d\n", $left, $right, $out_char, $start, $len);
                //完成窗口内的一系列更新操作
                //当前字符是否为需要的字符
                if (array_key_exists($out_char, $need)) {
                    //判断当前字符是否已到达目标数
                    if ($need[$out_char] === $windows[$out_char]) {
                        $valid_num--;
                    }

                    //减少目标字符的数量
                    $windows[$out_char]--;
                }
            }
        }

        //返回最小覆盖子串
        return $len === PHP_INT_MAX ? '' : substr($s, $start, $len);
    }
}
//leetcode submit region end(Prohibit modification and deletion)
$obj = new Solution();

$s = 'a';
$t = 'a';
echo $obj->minWindow($s, $t);