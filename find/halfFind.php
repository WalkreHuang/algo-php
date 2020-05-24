<?php


class halfFind
{
    public function findEqual($arr, $value)
    {
        $low = 0;
        $high = count($arr);
        while ($low <= $high) {
            $mid = floor($low + ($high-$low)/2);

            if ($value > $arr[$mid]) {
                $low = $mid + 1;
            } else if ($value < $arr[$mid]) {
                $high = $mid - 1;
            } else {
                return $mid;
            }
        }

        return -1;
    }

    public function findFirstEqElement($arr, $value)
    {
        $low = 0;
        $high = count($arr);
        while ($low <= $high) {
            $mid = floor($low + ($high-$low)/2);
            if ($arr[$mid] == $value) {
                //找第一个匹配的元素时，需要加一层判断
                if ($mid == 0 || $arr[$mid-1] != $value) {
                    return $mid;
                } else {
                    $high = $mid - 1;
                }
            } else if ($arr[$mid] > $value) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }

    public function findLastEqElement($arr, $value)
    {
        $low = 0;
        $high = count($arr);
        $len = count($arr);
        while ($low <= $high) {
            $mid = floor($low + ($high-$low)/2);
            if ($arr[$mid] == $value) {
                //找第一个匹配的元素时，需要加一层判断
                if ($mid == $len-1 || $arr[$mid+1] != $value) {
                    return $mid;
                } else {
                    $low = $mid + 1;
                }
            } else if ($arr[$mid] > $value) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }

    public function findFirstGteElement($arr, $value)
    {
        $low = 0;
        $high = count($arr);
        while ($low <= $high) {
            $mid = floor($low + ($high-$low)/2);
            if ($arr[$mid] >= $value) {
                //找第一个匹配的元素时，需要加一层判断
                if ($mid == 0 || $arr[$mid-1] < $value) {
                    return $mid;
                } else {
                    $high = $mid - 1;
                }
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

$obj = new halfFind();

$arr = [1,2,3,6,7,8,9,10,10,11,12];

echo $obj->findEqual($arr, 10).PHP_EOL;
echo $obj->findFirstEqElement($arr, 10).PHP_EOL;
echo $obj->findLastEqElement($arr, 10).PHP_EOL;
echo $obj->findFirstGteElement($arr, 5).PHP_EOL;