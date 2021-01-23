<?php

/*请实现一个函数按照之字形顺序打印二叉树。
即第一行按照从左到右的顺序打印，
第二层按照从右到左的顺序打印，
第三行再按照从左到右的顺序打印，其他行以此类推。*/
class levelOrder2
{
    public function main($root)
    {
        if (is_null($root)) {
            return [];
        }
        $queue = [];
        $queue[] = $root;
        $result = [];
        $j = 0;

        while (!empty($queue)) {
            $level_num = count($queue);//获取当前层的节点个数
            //在循环体中处理完该层的所有节点
            for ($i =0;$i<$level_num;$i++) {
                $node = array_shift($queue);
                if ($j % 2 === 0) {
                    $cur_level_vals[] = $node->val;
                } else {
                    array_unshift($cur_level_vals, $node->val);
                }

                if ($node->left != null) {
                    $queue[] = $node->left;
                }

                if ($node->right != null) {
                    $queue[] = $node->right;
                }
            }

            if (!empty($cur_level_vals)) {
                $result[] = $cur_level_vals;
            }
            $cur_level_vals = [];
            $j++;
        }

        return $result;
    }

    public function main2($root)
    {
        if (is_null($root)) {
            return [];
        }
        $deque = [];
        $deque[] = $root;
        $result = [];

        while (!empty($deque)) {
            //先打印奇数层
            $tmp = [];
            $len = count($deque);
            for ($i = 0;$i < $len;$i++) {
                //从左向右打印
                $cur_node = array_shift($deque);
                array_push($tmp, $cur_node->val);
                // 先左后右加入下层节点
                if ($cur_node->left != null) {
                    $deque[] = $cur_node->left;
                }

                if ($cur_node->right != null) {
                    $deque[] = $cur_node->right;
                }
            }

            $result[] = $tmp;
            if (empty($deque)) {
                break;
            }

            //打印偶数层
            $tmp = [];
            $len = count($deque);
            for ($i = 0;$i < $len;$i++) {
                //从右向左打印
                $cur_node = array_pop($deque);
                array_push($tmp, $cur_node->val);
                // 先右后左加入下层节点
                if ($cur_node->right != null) {
                    array_unshift($deque, $cur_node->right);
                }

                if ($cur_node->left != null) {
                    array_unshift($deque, $cur_node->left);
                }
            }

            $result[] = $tmp;
        }
        return $result;
    }

    function main3($root)
    {
        if (is_null($root)) {
            return [];
        }
        $queue = [];
        $queue[] = $root;
        $result = [];

        $j = 0;
        while (!empty($queue)) {
            $cur_level_vals = [];
            $level_num = count($queue);//获取当前层的节点个数
            //在循环体中处理完该层的所有节点
            for ($i =0;$i<$level_num;$i++) {
                $node = array_shift($queue);
                $cur_level_vals[] = $node->val;

                if ($node->left != null) {
                    $queue[] = $node->left;
                }

                if ($node->right != null) {
                    $queue[] = $node->right;
                }
            }

            if (!empty($cur_level_vals)) {
                if ($j % 2 === 0) {
                    $result[$j] = $cur_level_vals;
                } else {
                    $result[$j] = array_reverse($cur_level_vals);
                }
                $j++;
            }
        }

        return $result;
    }
}