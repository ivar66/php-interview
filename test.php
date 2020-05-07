<?php
/**
 * Created by PhpStorm.
 * User: dukang03
 * Date: 2020/4/10
 * Time: 上午10:51
 */
class Test{
    public function test1(){
        echo 1;
    }
}

$obj = new  Test();
$obj->test1();

//class A{
//    public static function who(){
//        echo __CLASS__;
//    }
//
//    public static function test(){
//        self::who();
//    }
//}
//
//class B extends A{
//    public static function who(){
//        echo __CLASS__;
//    }
//}
class A {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who();
    }
}
class B extends A {
    public static function who() {
        echo __CLASS__;
    }
}
//B::who();



//class A {
//public static function who() {
//echo __CLASS__;
//}
//public static function test() {
//self::who();
//}
//}

//class B extends A {
//public static function who() {
//echo __CLASS__;
//}
//}

B::test();


for($i= 1,$j = 1;$i> 10 & $j>0;){

}