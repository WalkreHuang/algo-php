<?php

//对于一组不同重量、不可分割的物品，我们需要选择一些装入背包，在满足背包最大重量限制的前提下，背包中物品总重量的最大值是多少呢？

class package
{
    //期望结果
    public $expectWeight = PHP_INT_MIN;

    //物品重量
    private $goodsWeights = [2,2,4,6,3];

    //物品个数
    private $goodsNums = 5;

    //最大承载重量
    private $maxWeight = 9;

    public function solution1($good, $cur_weight)
    {
        if ($cur_weight == $this->maxWeight || $good == $this->goodsNums) {
            if ($cur_weight > $this->expectWeight) {
                $this->expectWeight = $cur_weight;
                return;
            }
        }

        $index = $good+1;
        $this->solution1($index, $cur_weight);

        if ($cur_weight+$this->goodsWeights[$good] <= $this->maxWeight) {
            $this->solution1($index, $cur_weight+$this->goodsWeights[$good]);
        }
    }

    public function iterator()
    {
        
    }
    
}

$obj = new package();
$obj->solution1(0, 0);
echo '背包能容纳的最大重量为：'.$obj->expectWeight;