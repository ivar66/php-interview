<?php
/**
 * DESC：208. 实现 Trie (前缀树)
 * link：https://leetcode-cn.com/problems/implement-trie-prefix-tree/
 * User: dukang03
 * Date: 2020/4/18
 * Time: 上午10:48
 */
class TrieNode{
    public $isEnd = false ;
    public $letter;
    public $children = [];
    public function __construct($letter = '')
    {
        $this->letter = $letter;
    }
}

class Trie {
    public $root;
    /**
     * Initialize your data structure here.
     */
    function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        //1、判断长度
        $len = strlen($word);
        $cur = $this->root;
        //2、切割长度
        for ($i=0;$i<$len;$i++){
            $letter = $word[$i];
            if (empty($cur->children[$letter])){
                $cur->children[$letter] = new TrieNode($letter);
            }
            $cur = $cur->children[$letter];
        }
        // 3、末尾节点设置参数
        $cur->isEnd = true;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $len = strlen($word);
        $cur = $this->root;
        for ($i = 0;$i< $len;$i++){
            $letter = $word[$i];
            if (empty($cur->children[$letter])){
                return false;
            }
            $cur = $cur->children[$letter];
        }
        return $cur->isEnd;
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $len = strlen($prefix);
        $cur = $this->root;
        for ($i = 0;$i< $len;$i++){
            $letter = $prefix[$i];
            if (empty($cur->children[$letter])){
                return false;
            }
            $cur = $cur->children[$letter];
        }
        return true;
    }
}

$ob = new Trie();
$ob->insert('hwa');
$ob->insert('h2a');
print_r($ob->root);die();
$ser = $ob->startsWith('h2');
var_export($ser);die();