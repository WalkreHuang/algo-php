<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/10
 * Time: 11:41
 * Email: <huangwalker@qq.com>
 */

class findCommonStrs
{
    /**
     * @param String[] $words
     * @return String[]
     */
    function commonChars($words) {
        if (empty($words)) {
            return [];
        }
        $char_count_map = $this->countCharNum(current($words));

        $size = count($words);
        for ($i = 1; $i<$size; $i++) {
            $compare_char_count_map = $this->countCharNum($words[$i]);
            $temp_char_map = [];
            foreach ($compare_char_count_map as $char => $count) {
                if (isset($char_count_map[$char])) {
                    $temp_char_map[$char] = min($char_count_map[$char], $count);
                }
            }
            $char_count_map = $temp_char_map;
        }
        $ans = [];
        foreach ($char_count_map as $char => $count) {
            $i = 0;
            while ($i < $count) {
                $ans[] = $char;
                $i++;
            }
        }
        return $ans;
    }

    private function countCharNum($word)
    {
        return array_count_values(str_split($word));
    }

    function addToArrayForm($num, $k)
    {
        $int_num = $this->arr2Num($num);
        return $this->num2Arr($int_num + $k);
    }

    private function arr2Num($arr)
    {
        $num = 0;
        $n = count($arr);
        $power = $n - 1;
        for ($i = 0;$i<$n;$i++) {
            $num += $arr[$i] * 10 ** $power;
            $power--;
        }
        return $num;
    }

    private function num2Arr($num)
    {
        $arr = [];
        while ($num >= 0) {
            $tmp = $num % 10;
            $num = floor($num/10);
            array_unshift($arr, $tmp);
            if ($num == 0) {
                break;
            }
        }

        return $arr;
    }
}

$obj = new findCommonStrs();
$words = ["bella", "label", "roller"];
//$words = ["bella","label"];
//$ret = $obj->commonChars($words);
//var_dump($ret);

$ret = $obj->addToArrayForm([1,2,3,4], 33);
var_dump($ret);
