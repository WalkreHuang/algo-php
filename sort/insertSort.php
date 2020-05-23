<?php


class insertSort
{
    public function sort(&$arr)
    {
        //从下标为1的位置开始，选择合适的位置插入，默认第0号位置是有序的
        for ($i=1;$i< count($arr);$i++) {
            //要插入的元素
            $insert_element = $arr[$i];
            //查找的起始位置
            $j = $i;

            //左移的过程中，如果有比要插入元素大的元素，就将该元素复制给后一位
            while ($j >0 && $insert_element < $arr[$j-1]) {
                $arr[$j] = $arr[$j-1];
                $j--;
            }

            //找到要插入的位置了
            if ($i != $j) {
                $arr[$j] = $insert_element;
            }
        }

        return $arr;
    }
}

$arr = [1,2,46,22,28,33,1,0];
$obj = new insertSort();
$sort = $obj->sort($arr);

print_r($sort);