<?php
//在一个 n * m 的二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
/*示例:

现有矩阵 matrix 如下：

[
[1,   4,  7, 11, 15],
  [2,   5,  8, 12, 19],
  [3,   6,  9, 16, 22],
  [10, 13, 14, 17, 24],
  [18, 21, 23, 26, 30]
]
给定 target = 5，返回 true。

给定 target = 20，返回 false。*/

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray($matrix, $target) {
        $i = count($matrix) - 1;
        $j = 0;

        while ($i >=0 && $j < count($matrix[0])) {//左边界或右边界有一个越界都不用再执行了，因此是 &&,否则使用 || 会死循环
            if ($matrix[$i][$j] == $target) {
                return true;
            } else if ($matrix[$i][$j] > $target) {
                $i--;
            } else {
                $j++;
            }
        }

        return false;
    }

    public function solve2($matrix, $target)
    {
        //改变参考点坐标
        $i = 0;
        $j = count($matrix[0])-1;

        while ($i< count($matrix) && $j >= 0) {
            if ($matrix[$i][$j] == $target) {
                return true;
            } else if ($matrix[$i][$j] > $target) {
                $j--;
            } else {
                $i++;
            }
        }

        return false;
    }
}

$arr = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21,23,26,30]];
$target = 20;
$flag = (new Solution())->findNumberIn2DArray($arr, $target);
var_dump($flag);

$flag = (new Solution())->solve2($arr, $target);
var_dump($flag);