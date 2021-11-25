<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/24
 * Time: 16:04
 * Email: <huangwalker@qq.com>
 */

class sortByBits
{
    public function main($arr)
    {
        $binary_nums = [];
        foreach ($arr as $item) {
            $item_one_num = array_count_values(str_split(decbin($item)));
            $binary_nums[] = $item_one_num[1] ?? 0;
        }

        array_multisort($binary_nums, SORT_ASC, $arr, SORT_ASC, $arr);
        return $arr;
    }

    public function main2($arr)
    {
        $data[] = array('volume' => 67, 'edition' => 2, 'price' => 100);
        $data[] = array('volume' => 86, 'edition' => 1, 'price' => 700);
        $data[] = array('volume' => 85, 'edition' => 6, 'price' => 800);
        $data[] = array('volume' => 98, 'edition' => 2, 'price' => 600);
        $data[] = array('volume' => 86, 'edition' => 6, 'price' => 500);
        $data[] = array('volume' => 67, 'edition' => 7, 'price' => 200);
        foreach ($data as $key => $row) {
            $volume[$key]  = $row['volume'];
            $edition[$key] = $row['edition'];
            $price[$key] = $row['price'];
        }

        // 将数据根据 volume 降序排列，根据 edition 升序排列
        // 把 $data 作为最后一个参数，以通用键排序
        array_multisort($volume, SORT_DESC, $edition, SORT_ASC, $price, SORT_DESC, $data);
        return $data;
    }
}


$obj = new sortByBits();
$arr= [0,1,2,3,4,5,6,7,8];
$ret = $obj->main2($arr);

var_dump($ret);