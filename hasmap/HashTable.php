<?php

class HashNode
{
    public $key;
    public $value;
    /**
     * @var HashNode
     */
    public $next;

    public function __construct($key, $value, $nextNode = null)
    {
        $this->key = $key;
        $this->value = $value;
        $this->next = $nextNode;
    }
}

class HashTable
{
    /**
     * @var HashNode[]
     */
    private $arr = [];
    private $size = 10;

    /**
     * 获取键值对应的hashCode
     * @param $key
     * @return int
     */
    private function getHashCode($key)
    {
        $len = strlen($key);

        $ascii = 0;
        for ($i=0;$i<$len;$i++) {
            $ascii += ord($key[$i]);
        }

        return $ascii % $this->size;
    }

    /**
     * 借助链表解决hash冲突
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $hash_code = $this->getHashCode($key);
        if (isset($this->arr[$hash_code])) {
            $old_node = $this->arr[$hash_code];
            //在原有的节点后添加新的节点
            $new_node = new HashNode($key, $value, $old_node);
        } else {
            $new_node = new HashNode($key, $value);
        }

        $this->arr[$hash_code] = $new_node;
    }

    public function get($key)
    {
        $hash_code = $this->getHashCode($key);
        $result = null;

        //遍历链表中的元素
        if (isset($this->arr[$hash_code])) {
            $node = $this->arr[$hash_code];
            while ($node != null) {
                if ($node->key === $key) {
                    $result = $node->value;
                    break;
                }

                $node = $node->next;
            }
        }

        return $result;
    }

    public function getList()
    {
        return $this->arr;
    }

}

$hash_table = new HashTable();

$hash_table->set('343', 22);
$hash_table->set('3432', 33);
$hash_table->set('ffds', 55);

echo $hash_table->get('343').PHP_EOL;
echo $hash_table->get('3432').PHP_EOL;
echo $hash_table->get('ffds').PHP_EOL;

//print_r($hash_table->getList());