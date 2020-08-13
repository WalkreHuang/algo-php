<?php
class BaseBinarySearch
{
    public static function findTargetIndex($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + ceil(($right-$left)/2);

            if ($arr[$mid] > $target) {
                $right = $mid - 1;
            } else if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                return $mid;
            }
        }

        return -1;
    }

    public static function findFirstTargetIndex($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + ceil(($right-$left)/2);

            if ($arr[$mid] > $target) {
                $right = $mid - 1;
            } else if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                //判断当前元素是否为第一个元素，若是第一个元素，返回
                //或者当前元素的前一个元素不等于目标值时，这时也可以直接返回
                if ($mid == 0 || $arr[$mid - 1] !== $target) {
                    return $mid;
                }

                //否则，就需要继续缩小右区间来查找
                $right = $mid - 1;
            }
        }

        return -1;
    }

    public static function findLastTargetIndex($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + ceil(($right-$left)/2);

            if ($arr[$mid] > $target) {
                $right = $mid - 1;
            } else if ($arr[$mid] < $target) {
                $left = $mid + 1;
            } else {
                //判断当前元素是否为最后一个元素，若是则直接返回
                //或者当前元素的后一个元素不等于目标值时，这时也可以直接返回
                if ($mid == count($arr) -1 || $arr[$mid + 1] !== $target) {
                    return $mid;
                }

                //否则，就需要继续缩小左区间来查找
                $left = $mid + 1;
            }
        }

        return -1;
    }

    public static function findFirstGteIndex($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + ceil(($right-$left)/2);

            if ($arr[$mid] >= $target) {
                //判断当前元素是否为第一个元素，若是则直接返回
                //或者当前元素的前一个元素小于目标值时，这时也可以直接返回
                if ($mid == 0 || $arr[$mid - 1] < $target) {
                    return $mid;
                }

                //否则，就需要继续缩小右区间来查找
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return -1;
    }

    public static function findLastLteIndex($arr, $target)
    {
        $left = 0;
        $right = count($arr) - 1;
        while ($left <= $right) {
            $mid = $left + ceil(($right-$left)/2);

            if ($arr[$mid] <= $target) {
                //判断当前元素是否为最后一个元素，若是则直接返回
                //或者当前元素的前后一个元素大于目标值时，这时也可以直接返回
                if ($mid == count($arr) - 1 || $arr[$mid + 1] > $target) {
                    return $mid;
                }

                //否则，就需要继续缩小左区间来查找
                $left = $mid + 1;
            } else {
                $right = $mid - 1;
            }
        }

        return -1;
    }
}

//注：数组都是从小到大的顺序排列

$arr = [1,5,7,9,11,23,43,66];
$target = 66;
$index = BaseBinarySearch::findTargetIndex($arr, $target);

echo sprintf("在有序数组中查找值为：%d的下标：%d", $target, $index).PHP_EOL;
echo '====================='.PHP_EOL;

$arr = [1,5,7,9,9,9,11,23,23,43,66];
$target = 23;
$index = BaseBinarySearch::findFirstTargetIndex($arr, $target);
echo sprintf("在有序数组中查找第一个给定值为：%d的下标：%d", $target, $index).PHP_EOL;
echo '====================='.PHP_EOL;

$arr = [1,5,7,9,9,9,11,23,23,43,66];
$target = 9;
$index = BaseBinarySearch::findLastTargetIndex($arr, $target);
echo sprintf("在有序数组中查找最后一个给定值为：%d的下标：%d", $target, $index).PHP_EOL;
echo '====================='.PHP_EOL;

$arr = [1,5,7,9,9,9,11,23,23,43,66];
$target = 6;
$index = BaseBinarySearch::findFirstGteIndex($arr, $target);
echo sprintf("在有序数组中查找第一个大于等于目标值为：%d的元素下标：%d", $target, $index).PHP_EOL;
echo '====================='.PHP_EOL;

$arr = [1,5,7,9,9,9,11,23,23,43,66];
$target = 18;
$index = BaseBinarySearch::findLastLteIndex($arr, $target);
echo sprintf("在有序数组中查找最后一个小于等于目标值为：%d的元素下标：%d", $target, $index).PHP_EOL;
echo '====================='.PHP_EOL;