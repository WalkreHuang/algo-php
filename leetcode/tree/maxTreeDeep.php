<?php

//https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/
class maxTreeDeep
{
    public static function run($root)
    {
        if (is_null($root)) {
            return 0;
        }

        $left_deep = self::run($root->left) + 1;
        $right_deep = self::run($root->right) + 1;

        return max($left_deep, $right_deep);
    }
}