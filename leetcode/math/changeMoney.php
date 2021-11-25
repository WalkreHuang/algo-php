<?php
/**
 *
 * User: huangwalker
 * Date: 2021/9/1
 * Time: 20:24
 * Email: <huangwalker@qq.com>
 */

class changeMoney
{
    /**
     * @param Integer[] $bills
     * @return Boolean
     */
    function lemonadeChange($bills) {
        $remain_money = $change_money = 0;
        foreach ($bills as $bill) {
            $remain_money += $bill;
            $change_money = $bill - 5;
            if ($change_money > 0) {
                $remain_money -= $change_money;
            }

            if ($remain_money < $change_money) {
                return false;
            }

            echo 'remain_money:'.$remain_money.'change_money:'.$change_money.PHP_EOL;
        }

        return true;
    }
}

$arr = [5,5,10,10,20];
$obj = new changeMoney();
$ret = $obj->lemonadeChange($arr);
var_dump($ret);