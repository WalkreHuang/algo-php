<?php
/**
 *
 * User: huangwalker
 * Date: 2020/5/25
 * Time: 9:20
 * Email: <huangwalker@qq.com>
 */

//使用数组完成lru算法，在本例中最近访问的元素位于数组末尾
//核心思想：
//访问一个元素时，先判断是否存在于缓存中，如果存在则将其移动至缓存 yong 区，如果不存在，又分为两种情况处理，如果缓存未满则直接加到 yong 区
//如果缓存已满，则淘汰掉 old 区的一个元素，并将访问的元素添加至 yong 区。
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
