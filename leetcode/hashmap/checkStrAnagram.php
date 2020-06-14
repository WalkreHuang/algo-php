<?php
//给定两个字符串 s 和 t ，编写一个函数来判断 t 是否是 s 的字母异位词。
//
// 示例 1:
//
// 输入: s = "anagram", t = "nagaram"
//输出: true
//
//
// 示例 2:
//
// 输入: s = "rat", t = "car"
//输出: false
//
// 说明:
//你可以假设字符串只包含小写字母。
//
// 进阶:
//如果输入字符串包含 unicode 字符怎么办？你能否调整你的解法来应对这种情况？
// Related Topics 排序 哈希表


//leetcode submit region begin(Prohibit modification and deletion)
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isAnagram($s, $t) {
        if (strlen($s) != strlen($t)) {
            return false;
        }

        $s_map = $this->getStrMap($s);
        $t_map = $this->getStrMap($t);

        return $s_map == $t_map;
    }

    private function getStrMap($str)
    {
        $map = [];

        for ($i=0;$i<strlen($str);$i++) {
            $key = ord($str[$i]);
            if (isset($map[$key])) {
                $map[$key]++;
            } else {
                $map[$key] = 1;
            }
        }

        return $map;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
$obj = new Solution();
$flag = $obj->isAnagram('ffabcdii' ,'iibedffa');
var_dump($flag);
