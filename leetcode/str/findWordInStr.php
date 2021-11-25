<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/25
 * Time: 17:21
 * Email: <huangwalker@qq.com>
 */

// https://leetcode-cn.com/problems/find-words-that-can-be-formed-by-characters/
/*输入：words = ["cat","bt","hat","tree"], chars = "atach"
输出：6
解释：
可以形成字符串 "cat" 和 "hat"，所以答案是 3 + 3 = 6。

输入：words = ["hello","world","leetcode"], chars = "welldonehoneyr"
输出：10
解释：
可以形成字符串 "hello" 和 "world"，所以答案是 5 + 5 = 10。*/

class findWordInStr
{
    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars) {
        $chars_map = $this->getStrMaps($chars);

        $match_word_len = 0;
        foreach ($words as $word) {
            $match = $this->isMatchWord($word, $chars_map);
            if ($match) {
                $match_word_len += strlen($word);
            }
        }

        return $match_word_len;
    }

    private function getStrMaps($chars)
    {
        $chars_map = [];
        $chars_arr = str_split($chars);
        foreach ($chars_arr as $char) {
            if (!isset($chars_map[$char])) {
                $chars_map[$char] = 1;
            } else {
                $chars_map[$char]++;
            }
        }

        return $chars_map;
    }

    private function isMatchWord($word, $chars_map)
    {
        $word_map = $this->getStrMaps($word);
        foreach ($word_map as $word_item => $word_count) {
            if (!isset($chars_map[$word_item]) || $chars_map[$word_item] < $word_count) {
                return false;
            }
        }
        return true;
    }
}

$obj = new findWordInStr();
$words = ["hello","world","leetcode"];
$chars = "welldonehoneyr";
$match_word_len = $obj->countCharacters($words, $chars);
var_dump($match_word_len);