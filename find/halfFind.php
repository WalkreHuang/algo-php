<?php


class halfFind
{
    public function run($arr, $value)
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
}

$obj = new halfFind();

$arr = [1,2,3,6,7,10,11,12];

echo $obj->run($arr, 12);