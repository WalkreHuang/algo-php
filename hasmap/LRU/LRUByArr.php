<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 9:20
 * Email: <huangwalker@qq.com>
 */

//使用数组完成lru算法
//核心思想：1. 如果此数据之前已经被缓存在链表中了，我们遍历得到这个数据对应的结点，并将其从原来的位置删除，然后再插入到链表的头部。
//2. 如果此数据没有在缓存链表中，又可以分为两种情况：如果此时缓存未满，则将此结点直接插入到链表的头部；如果此时缓存已满，则链表尾结点删除，将新的数据结点插入链表的头部。
class LRUByArr
{
    private $capacity;
    private $arr;
    private $length;

    public function __construct($capacity)
    {
        $this->capacity = $capacity;
        $this->arr = [];
        $this->length = 0;
    }

    /**
     * Put something in the cache
     * @param $key
     * @param $value
     * @author clh
     * @time 2020/5/25
     */
    public function put($key, $value)
    {
        if ($this->containsKey($key)) {
            $this->recordAccess($key);
        } else {
            if ($this->isFull()) {
                $this->removeElementByLRU();
            }
        }

        $this->arr[$key] = $value;
        $this->length++;
    }

    /**
     * Get the value cached with this key
     * @param $key
     * @return mixed|null
     * @author clh
     * @time 2020/5/25
     */
    public function get($key)
    {
        if ($this->containsKey($key)) {
            $this->recordAccess($key);

            return $this->arr[$key];
        } else {
            return null;
        }
    }

    /**
     *  Does the cache contain an element with this key
     * @param $key
     * @return bool
     * @author clh
     * @time 2020/5/25
     */
    public function containsKey($key)
    {
        return isset($this->arr[$key]);
    }

    /**
     *  Check cache is full
     * @return bool
     * @author clh
     * @time 2020/5/25
     */
    public function isFull()
    {
        return ($this->length == $this->capacity);
    }


    /**
     * Moves the element from current position to end of array
     *
     * @param int|string $key The key
     */
    private function recordAccess($key)
    {
        $value = $this->arr[$key];

        //这里删除元素的时间复杂度为O(n)，可以通过链表降低为O(1)
        unset($this->arr[$key]);

        $this->arr[$key] = $value;
    }

    public function getCache()
    {
        return $this->arr;
    }

    /**
     * remove least recently used element (front of array)
     * @author clh
     * @time 2020/5/25
     */
    public function removeElementByLRU()
    {
        reset($this->arr);
        //这里删除元素的时间复杂度为O(n)，可以通过链表降低为O(1)
        unset($this->arr[key($this->arr)]);

        $this->length--;
    }

}

$obj = new LRUByArr(3);

$obj->put('a', 11);
$obj->put('b', 22);
$obj->put('c', 33);
$obj->put('d', 44);

print_r($obj->getCache());
echo PHP_EOL;


$obj->get('b');
$obj->put('e', 55);
print_r($obj->getCache());

echo PHP_EOL;
