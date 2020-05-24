<?php


class LruCache
{
    private $capacity;
    private $list;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->list = new HashList();
    }

    public function get($key)
    {
        return $this->list->get($key);
    }

    public function put($key, $value)
    {
        $size = $this->list->size;

        $exist = $this->list->checkExist($key);
        //已存在的节点或者是缓存空间不足，需要删除该节点
        if ($exist || $size >= $this->capacity) {
            $this->list->removeNode($key);
        }
        //将节点添加至头部
        $this->list->addAsHead($key, $value);
    }
}

class HashList
{
    public $head;
    public $tail;
    public $size;
    /**
     * @var Node[]
     */
    public $buckets=[];

    public function __construct(Node $head = null, Node $tail = null)
    {
        $this->head = $head;
        $this->tail = $tail;
        $this->size = 0;
    }

    public function get($key)
    {
        $res = $this->buckets[$key];
        if (!$res) {
            return -1;
        }

        //访问缓存中的节点时，要将其移到头部
        $this->moveToHead($res);

        return $res->value;
    }

    public function checkExist($key)
    {
        return isset($this->buckets[$key]);
    }

    //移除节点
    public function removeNode($key)
    {

    }

    //将新的节点添加到缓存的头部
    /*public function addAsHead($key, $value)
    {
        $node = new Node($value);
        if($this->tail==null && $this->head !=null){
            $this->tail=$this->head;
            $this->tail->next=null;
            $this->tail->pre=$node;
        }
        $node->pre=null;
        $node->next=$this->head;
        $this->head->pre=$node;
        $this->head=$node;
        $node->key=$key;
        $this->buckets[$key]=$node;
        $this->size++;
    }*/


    private function moveToHead(Node $res)
    {

    }
}

class Node
{
    public $key;
    public $value;
    /**
     * @var Node
     */
    public $next;
    /**
     * @var Node
     */
    public $pre;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

$obj = new LrUCache(5);
$obj->put('aab', 2333);
$res = $obj->get('aab');