<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/15
 * Time: 15:47
 * Email: <huangwalker@qq.com>
 */
require_once __DIR__.'/./DoubleLinkedList.php';
//初始链表：100->600->400->200->10
$double_linked_list = new DoubleLinkedList();
$double_linked_list->insert(10);
$double_linked_list->insert(200);
$double_linked_list->insert(400);
$double_linked_list->insert(600);
$double_linked_list->insert(100);


$lists = $double_linked_list->getLists();
echo join('->', $lists).PHP_EOL;

$double_linked_list->delete(3);

$lists = $double_linked_list->getLists();
echo join('->', $lists).PHP_EOL;