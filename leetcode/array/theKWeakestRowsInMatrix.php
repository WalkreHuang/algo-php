<?php
/**
 *
 * User: huangwalker
 * Date: 2021/11/9
 * Time: 10:36
 * Email: <huangwalker@qq.com>
 */

class theKWeakestRowsInMatrix
{
    /**
     * @param Integer[][] $mat
     * @param Integer $k
     * @return Integer[]
     */
    function kWeakestRows($mat, $k) {
        $mat_1_counts = $this->countMatOne($mat);
        return $this->weakestKRows($mat_1_counts, $k);
    }

    private function countMatOne($mat)
    {
        $mat_counts = [];
        foreach ($mat as $index => $mat_item) {
            $mat_counts[$index] = $this->countMat($mat_item);
        }

        return $mat_counts;
    }

    private function countMat($arr)
    {
        $low = 0;
        $size = count($arr);
        $high = $size - 1;

        while ($low <= $high) {
            $mid = floor($low + ($high-$low) /2);
            if ($arr[$mid] === 1) {
                if ($mid == $size-1 || (isset($arr[$mid+1]) && $arr[$mid + 1] === 0)) {
                    return $mid + 1;
                } else {
                    $low = $mid + 1;
                }
            } else {
                $high = $mid - 1;
            }
        }

        return 0;
    }

    private function weakestKRows($mat_1_counts, $k)
    {
        $heap = new SplMinHeap();
        $i =  0;
        foreach ($mat_1_counts as $count) {
            while ($i < $k) {
                $heap->insert($count);
                $i++;
            }
            if ($heap->top() > $count) {
                $heap->extract();
                $heap->insert($count);
            }
        }

        $ret = [];
        foreach ($heap as $item) {
            $ret[] = $item;
        }

        return $ret;
    }

    public function funcSolve($mat, $k)
    {
        $arr = [];
        foreach($mat as $key => $value) {
            $arr[0][] = array_count_values($value)[1];
            $arr[1][] = $key;
        }
        //根据值升序，再根据键升序
//        array_multisort($arr[0],SORT_ASC, $arr[1],SORT_ASC);
        array_multisort($arr[0],SORT_ASC);
        var_dump($arr);exit;
        //数组切割
        return array_slice($arr[1], 0, $k);
    }
}

$mat = [[1,1,0,0,0],
    [1,1,1,1,0],
    [1,0,0,0,0],
    [1,1,0,0,0],
    [1,1,1,1,1],
    [1,1,1,0,0]];

//$mat = [[1,1,1,1,1],
//    [1,1,1,1,0],
//    [1,0,0,0,0],
//    [1,1,0,0,0],];

$k = 3;
$obj = new theKWeakestRowsInMatrix();
/*$ret = $obj->kWeakestRows($mat, $k);
var_dump($ret);*/

$ret = $obj->funcSolve($mat, $k);
var_dump($ret);