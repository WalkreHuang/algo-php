<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/27
 * Time: 17:24
 * Email: <huangwalker@qq.com>
 */

class relSortArray
{
    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray($arr1, $arr2) {
        $ret = [];
        foreach ($arr2 as $item) {
            $ret[] = $this->fetchItemInArr2($arr1, $item);
        }

        $extra_items = array_diff($arr1, $arr2);
        sort($extra_items);
        if (!empty($extra_items)) {
            $ret[] = $extra_items;
        }

        return array_merge(...$ret);
    }

    private function fetchItemInArr2($arr1, $target_val)
    {
        $ret = [];
        foreach ($arr1 as $arr_val) {
            if ($arr_val === $target_val) {
                $ret[] = $arr_val;
            }
        }

        return $ret;
    }

    private $hash = [];

    /**
     * @param Integer[] $arr1
     * @param Integer[] $arr2
     * @return Integer[]
     */
    function relativeSortArray2($arr1, $arr2)
    {
        $this->hash = array_flip($arr2);
        usort($arr1, [$this, 'compare']);
        return $arr1;
    }

    function compare($x, $y) {
        if(isset($this->hash[$x]) && isset($this->hash[$y])){
            return $this->hash[$x] <=> $this->hash[$y];
        }

        if(!isset($this->hash[$x]) && !isset($this->hash[$y])){
            return $x <=> $y;
        }

        return isset($this->hash[$x])?-1:1;
    }
}

$obj = new relSortArray();
$arr1 = [2,3,1,3,2,4,6,7,9,2,19];
$arr2 = [2,1,4,3,9,6];

$arr1 = [28,6,22,8,44,17];
$arr2 = [22,28,8,6];
$ret = $obj->relativeSortArray($arr1, $arr2);

var_dump($ret);exit();

//$ret = $obj->getDiffItems($arr2, $arr1);
//var_dump($ret);exit();