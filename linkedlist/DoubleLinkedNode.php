<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/15
 * Time: 9:57
 * Email: <huangwalker@qq.com>
 */

class DoubleLinkedNode
{
    public $data;

    /**
     * @var DoubleLinkedNode
     */
    public $next;

    /**
     * @var DoubleLinkedNode
     */
    public $prev;

    public function __construct($data = null)
    {
        $this->data = $data;
    }
}