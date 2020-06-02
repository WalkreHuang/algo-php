<?php
//实现连通图的深度、广度优先搜索，其实与二叉树的深度、广度优先遍历一致，深度借助栈完成，广度借助队列完成

class Node {
    public $val = null;
    /**
     * @var Node[]
     */
    public $arrNext = [];//存储下个节点位置的数组

    public function __construct($val = null)
    {
        $this->val = $val;
    }
}

class Graph
{
    //建立连通图，nodes = ['val1'=>['val2','val3'], 'val2'=>[...]];
    //返回第一个节点，由于是连通图，可以根据第一个节点遍历整个图
    public function generate($nodes)
    {
        $arrNodes = array_keys($nodes);

        $resNodes = [];

        foreach ($arrNodes as $nodeVal) {
            $resNodes[$nodeVal] = new Node($nodeVal);
        }

        foreach ($nodes as $key => $value) {
            foreach ($value as $node) {
                if (isset($resNodes[$node]) && is_object($resNodes[$node])) {
                    $resNodes[$key]->arrNext[] = $resNodes[$node];
                }
            }
        }

        return current($resNodes);
    }

    //深度优先遍历（栈实现）
    public function searchByDfs($node)
    {
        $result = [];//存放遍历的结果
        $nodeStack = [];//存放遍历过程中的中间结果
        $comeInStack = [];//存放当前已经进栈的节点值，防止重复进栈

        array_push($nodeStack, $node);
        array_push($comeInStack, $node->val);

        while (!empty($nodeStack)) {
            $curNode = array_pop($nodeStack);
            $result[] = $curNode->val;//节点入栈
            $arrNext = $curNode->arrNext;

            //遍历节点的next数组，找出所有的子节点(注意：这里是逆序遍历)
            for ($i=count($arrNext)-1; $i >= 0 ;$i--) {
                $curChildNode = $arrNext[$i];

                //如果当前子节点不在结果集和栈中，则进栈，避免重复
                if (!in_array($curChildNode->val, $result) && !in_array($curChildNode->val, $comeInStack)) {
                    $nodeStack[] = $curChildNode;
                    $comeInStack[] = $curChildNode->val;//标记该节点已经进栈
                }
            }
        }

        return $result;
    }

    //广度优先遍历（队列实现）
    public function searchByBfs($node)
    {
        $result = [];//存放遍历的结果
        $nodeQueue = [];//存放遍历过程中的中间结果
        $comeInStack = [];//存放当前已经进栈的节点值，防止重复进栈

        array_push($nodeQueue, $node);

        while (!empty($nodeQueue)) {
            $curNode = array_shift($nodeQueue);
            $result[] = $curNode->val;//节点入栈
            $comeInStack[] = $curNode->val;//开始遍历其子节点
            $arrNext = $curNode->arrNext;

            //遍历节点的next数组，找出所有的子节点
            for ($i=0; $i < count($arrNext);$i++) {
                $curChildNode = $arrNext[$i];

                //如果当前子节点不在结果集和栈中，则进栈，避免重复
                if (!in_array($curChildNode->val, $result) && !in_array($curChildNode->val, $comeInStack)) {
                    $nodeQueue[] = $curChildNode;
                    $comeInStack[] = $curChildNode->val;//标记该节点已经进栈
                }
            }
        }

        return $result;
    }
}
$graph_arr = [
    'a' => ['b', 'f'],
    'b' => ['a', 'c', 'd'],
    'c' => ['b', 'd', 'e'],
    'd' => ['b', 'c'],
    'e' => ['c'],
    'f' => ['a', 'g', 'h'],
    'g' => ['f', 'h'],
    'h' => ['f', 'g'],
];

$graph = new Graph();
$root_node = $graph->generate($graph_arr);
//var_dump($root_node);

$dfs_ret = $graph->searchByDfs($root_node);
echo '深度优先遍历：'.join(',', $dfs_ret).PHP_EOL;

$bfs_ret = $graph->searchByBfs($root_node);
echo '广度优先遍历：'.join(',', $bfs_ret);