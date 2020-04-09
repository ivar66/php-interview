<?php

/**
 * https://leetcode-cn.com/problems/lru-cache/
 *
 * 146. LRU缓存机制
 * 思路：哈希表 + 双向链表
 *
 * Class ListNode
 */
class ListNodeNew{
    public $data = null;
    public $key = null;
    public $prev = null;
    public $next = null;
    public function __construct($key,$data)
    {
        $this->data = $data;
        $this->key = $key;
    }
}

class LRUCacheNew {
    private $head       = null;
    private $tail       = null;
    private $capacity   = null;
    private $hashmap   = null;
    /**
     * @param Integer $capacity
     */
    function __construct($capacity) {
        // hash map结果
        $this->hashmap  = array();
        $this->capacity = $capacity;

        // 构建虚拟的双向链表
        $this->head     = new ListNodeNew(null,null);
        $this->tail     = new ListNodeNew(null,null);
        $this->head->next = $this->tail;
        $this->tail->next = $this->head;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key) {
        if (!$this->hashmap[$key]){
            return -1;
        }
        $node = $this->hashmap[$key];
        if (count($this->hashmap) == 1) {
            return $node->data;
        }
        $this->delete($node);
        $this->attach($this->head,$node);
        return $node->data;
    }

    /**
     * 插入数据
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value) {
        if ($this->capacity <= 0){
            return false;
        }

        if (empty($this->hashmap[$key])){
            // 刚好到了容量
            if (count($this->hashmap) == $this->capacity) {
                // 删除尾部元素
                $nodeToRemove = $this->tail->prev;
                $this->delete($nodeToRemove);
                unset($this->hashmap[$nodeToRemove->key]);
            }
            // 插入新元素
            $newNode = new ListNodeNew($key,$value);
            $this->attach($this->head,$newNode);
            $this->hashmap[$key] = $newNode;
        }else{
            $newNode = $this->hashmap[$key];
            // 删除后面的节点，插入到前面
            $this->delete($newNode);
            $this->attach($this->head,$newNode);
            $newNode->data = $value;
        }
    }

    /**
     * 将节点前面的next指向节点后面节点
     * 将节点后面的prev指向节点前面的节点
     * @param $node
     */
    public function delete($node){
        $node->prev->next = $node->next;
        $node->next->prev = $node->prev;
    }

    /**
     * 头部增加节点
     * @param $head
     * @param $node
     */
    public function attach($head,$node){
        $node->prev = $head;
        $node->next = $head->next;
        $node->prev->next = $node;
        $node->next->prev = $node;
    }
}

$cache =  new LRUCacheNew(1);
$cache->put(2,1);
print_r($cache->get(2));
die();

//---------output---------------------------------
//LRUCache cache = new LRUCache( 2 /* 缓存容量 */ );
//
//cache.put(1, 1);
//cache.put(2, 2);
//cache.get(1);       // 返回  1
//cache.put(3, 3);    // 该操作会使得密钥 2 作废
//cache.get(2);       // 返回 -1 (未找到)
//cache.put(4, 4);    // 该操作会使得密钥 1 作废
//cache.get(1);       // 返回 -1 (未找到)
//cache.get(3);       // 返回  3
//cache.get(4);       // 返回  4