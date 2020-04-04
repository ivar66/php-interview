<?php

interface mysql{
    public function connect();
}

class pdo1 implements mysql{
    public function connect(){
        echo 'pdo';
    }
}

class mysqli1 implements mysql{
    public function connect(){
        echo 'mysqli';
    }
}

class myFactory{
    public static function factory($class_name){
        return new $class_name;
    }
}

$obj = myFactory::factory('pdo');
$obj->connect();

//<?php


//class DB{
//
//    private static $_obj = null;
//
//    private function __construct() {}
//
//    private function __clone(){
//        // TODO: Implement __clone() method.
//    }
//
//    public static function getInstance(){
//
//        if (!(self::$_obj instanceof self)){
//            self::$_obj = new self();
//        }
//        return self::$_obj;
//    }
//    public function test(){
//        echo '这是一个测试';
//        die();
//    }
//}
//
//$objDb = DB::getInstance();
//$objDb->test();