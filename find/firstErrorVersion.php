<?php
/**
 *
 * User: huangwalker
 * Date: 2021/8/24
 * Time: 12:02
 * Email: <huangwalker@qq.com>
 */

class firstErrorVersion
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $low = 1;
        $high = $n;
        while ($low <= $high) {
            $mid = floor($low + ($high - $low) /2);
            if (!$this->isBadVersion($mid)) {
                $low = $mid + 1;
            } else {
                if ($mid === 0 || !$this->isBadVersion($mid-1)) {
                    return $mid;
                } else {
                    $high = $mid -1;
                }
            }
        }

        return -1;
    }

    function isBadVersion($version_no)
    {
        return ($version_no > 0);
    }
}

$obj = new firstErrorVersion();
$ret = $obj->firstBadVersion(2);
var_dump($ret);