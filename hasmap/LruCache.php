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

    public function getCache()
    {
        $result = [];

        $node = $this->list->head;

        while ($node != null) {
            $result[] = $node->value;

            $node = $node->next;
        }

        return $result;
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
        $current=$this->head;
        for($i=1;$i<$this->size;$i++){
            if($current->key==$key) break;
            $current=$current->next;
        }
        unset($this->buckets[$current->key]);
        //调整指针
        if($current->pre==null){
            $current->next->pre=null;
            $this->head=$current->next;
        }else if($current->next ==null){
            $current->pre->next=null;
            $current=$current->pre;
            $this->tail=$current;
        }else{
            $current->pre->next=$current->next;
            $current->next->pre=$current->pre;
            $current=null;
        }
        $this->size--;
    }

    //将新的节点添加到缓存的头部
    public function addAsHead($key, $value)
    {
        $node=new Node($value);
        if($this->tail==null && $this->head !=null){
            $this->tail=$this->head;
            $this->tail->next=null;
            $this->tail->pre=$node;
        }
        $node->pre=null;
        $node->next=$this->head;
        if ($this->head != null) {
            $this->head->pre=$node;
        }
        $this->head=$node;
        $node->key=$key;
        $this->buckets[$key]=$node;
        $this->size++;
    }


    private function moveToHead(Node $node)
    {
        if($node === $this->head) return ;
        //调整前后指针指向
        $node->pre->next=$node->next;
        if ($node->next != null) {
            $node->next->pre=$node->pre;
        }
        $node->next=$this->head;
        $this->head->pre=$node;
        $this->head=$node;
        $node->pre=null;
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
$obj->put('aaa', 11);
$obj->put('aab', 22);
$obj->put('aac', 33);
$obj->put('aaa', 44);

$cache = $obj->getCache();
var_dump($cache);
echo PHP_EOL;
$obj->get('aab');
$obj->get('aac');
$cache = $obj->getCache();
var_dump($cache);