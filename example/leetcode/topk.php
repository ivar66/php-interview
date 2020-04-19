<?php
/**
 * topk 解法：https://blog.kejijie.vip/php/php_topK.html
 */

/**
 * https://diffnest.github.io/2019/07/01/PHP%E5%B0%8F%E9%A1%B6%E5%A0%86%E5%AE%9E%E7%8E%B0TopK/
 * Class Topk
 */
class Topk
{
    public $top;
    public $topkArr = array();
    public $topkList = array();

    public function __construct($topk) {
        $this->top = $topk;
    }

    public function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
    //n：节点
    //i: 从哪个节点heapify
    private function heapify(&$tree, $n, $i)
    {
        if ($i >= $n) {
            return;
        }

        $c1 = (2 * $i) + 1;//左节点
        $c2 = (2 * $i) + 2;//右节点
        $max = $i;

        //左右节点内容跟父节点比较，确保父节点是最大值
        if ($c1 < $n && $tree[$c1] > $tree[$max]) {
            $max = $c1;
        }
        if ($c2 < $n && $tree[$c2] > $tree[$max]) {
            $max = $c2;
        }
        //当i是最大值时，不用交换
        if ($max != $i) {
            $this->swap($tree, $max, $i);
            //交换之后对下一层继续heapify
            $this->heapify($tree, $n, $max);
        }
    }

    //从下往上构建堆：节点3->节点2->节点1
    public function buildHeap(&$tree, $n)
    {
        $lastNode = $n - 1;
        $parent = ($lastNode - 1) / 2;
        for ($i = $parent; $i >= 0; $i--) {
            $this->heapify($tree, $n, $i);
        }
    }

    public function heapSort(&$tree, $n)
    {
        $this->buildHeap($tree, $n);
        for($i = $n-1; $i >= 0; $i--) {
            $this->swap($tree, $i, 0);
            //剩下的i个元素重新构建成堆
            $this->heapify($tree, $i, 0);
        }
    }

    //调整
    public function adjust($value)
    {
        if (in_array($value, $this->topkArr)) {
            return;
        }

        //记录原始数据
        $this->init($value);
        $len = count($this->topkList);

        if ($len < $this->top) {
            array_push($this->topkList, $value);
            $this->heapSort($this->topkList, $len);
        } else {
            //堆顶值与新值比较
            if ($this->topkList[0] < $value) {
                if (count($this->topkList) >= $this->top) {
                    $this->topkList[0] = $value;
                } else {
                    array_unshift($this->topkList, $value);
                }
                $this->heapSort($this->topkList, $len);
            }
        }
    }

    public function getTopK()
    {
        return $this->topkList;
    }

    public function init($value)
    {
        array_push($this->topkArr, $value);
    }

    public function getInitData()
    {
        return $this->topkArr;
    }

    public function calc()
    {
        for ($i = 0; $i < 10; $i++) {
            $this->adjust(mt_rand(1, 100));
        }
    }
}
$heapTree = new Topk(5);
$heapTree->calc();
var_dump($heapTree->getInitData(), $heapTree->getTopK());

////生成小顶堆函数
//function Heap(&$arr,$idx){
//    $left = ($idx << 1) + 1;
//    $right = ($idx << 1) + 2;
//
//    if (!$arr[$left]){
//        return;
//    }
//
//    if($arr[$right] && $arr[$right] < $arr[$left]){
//        $l = $right;
//    }else{
//        $l = $left;
//    }
//
//    if ($arr[$idx] > $arr[$l]){
//        $tmp = $arr[$idx];
//        $arr[$idx] = $arr[$l];
//        $arr[$l] = $tmp;
//        Heap($arr,$l);
//    }
//}
//
////这里为了保证跟上面一致，也构造500w不重复数
///*
// 当然这个数据集并不一定全放在内存，也可以在
// 文件里面，因为我们并不是全部加载到内存去进
// 行排序
//*/
//for($i=0;$i<500;$i++){
//    $numArr[] = $i;
//}
////打乱它们
//shuffle($numArr);
//
////先取出10个到数组
//$topArr = array_slice($numArr,0,10);
//
////获取最后一个有子节点的索引位置
////因为在构造小顶堆的时候是从最后一个有左或右节点的位置
////开始从下往上不断的进行移动构造（具体可看上面的图去理解）
//$idx = floor(count($topArr) / 2) - 1;
//
////生成小顶堆
//for($i=$idx;$i>=0;$i--){
//    Heap($topArr,$i);
//}
//
//var_dump(time());
////这里可以看到，就是开始遍历剩下的所有元素
//for($i = count($topArr); $i < count($numArr); $i++){
//    //每遍历一个则跟堆顶元素进行比较大小
//    if ($numArr[$i] > $topArr[0]){
//        //如果大于堆顶元素则替换
//        $topArr[0] = $numArr[$i];
//        /*
//         重新调用生成小顶堆函数进行维护，只不过这次是从堆顶
//         的索引位置开始自上往下进行维护，因为我们只是把堆顶
//         的元素给替换掉了而其余的还是按照根节点小于左右节点
//         的顺序摆放这也就是我们上面说的，只是相对调整下，并
//         不是全部调整一遍
//        */
//        Heap($topArr,0);
//    }
//}
//var_dump(time());


function te(){
    $heap = new SplMinHeap();

}