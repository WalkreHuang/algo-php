<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/12
 * Time: 17:29
 * Email: <huangwalker@qq.com>
 */

class LinkedListNode
{
    //数据域
    public $data;

    //指针域，指向下个节点
    public $next;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}