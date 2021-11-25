<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/27
 * Time: 14:59
 * Email: <huangwalker@qq.com>
 */
// https://leetcode-cn.com/problems/island-perimeter/
class landPerimeter
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function calLandPerimeter($grid) {
        $total_perimeter = 0;

        foreach ($grid as $i => $grid_item) {
            foreach ($grid_item as $j => $item) {
                if ($item === 1) {
                    $rm_num = $this->getItemRmNum($grid, $i, $j);
                    $total_perimeter += 4-$rm_num;
                }
            }
        }

        return $total_perimeter;
    }

    private function getItemRmNum($grid, $i, $j)
    {
        $rm_num = 0;
        if (isset($grid[$i-1][$j]) && $grid[$i-1][$j] === 1) {
            $rm_num++;
        }
        if (isset($grid[$i+1][$j]) && $grid[$i+1][$j] === 1) {
            $rm_num++;
        }
        if (isset($grid[$i][$j-1]) && $grid[$i][$j-1] === 1) {
            $rm_num++;
        }
        if (isset($grid[$i][$j+1]) && $grid[$i][$j+1] === 1) {
            $rm_num++;
        }
        return $rm_num;
    }
}

$obj = new landPerimeter();
$grid = [[1,0]];
$ret = $obj->calLandPerimeter($grid);

echo $ret;