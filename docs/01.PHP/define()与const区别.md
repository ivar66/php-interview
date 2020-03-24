# define()与const区别
在了解二者区别之前，我们简单了解一下常量和变量。

常量是一个简单的标识符，在执行过程中该值不能改变，默认大小写敏感，通常常量标识符总是大写的。常量只能包含标量数据（boolean、integer、float和string）

常量和变量的区别：
```text
1、常量前面没有美元符号($)
2、常量只能通过define()函数定义，而不能通过赋值语句
3、常量可以不用理会变量的作用域在任何地方定义和访问
4、常量一旦定义就不能重新定义或取消定义
5、常量的值只能是标量

```
## 问：在php中定义常量时，const和define的区别？
答：使用const使得代码简单易读，const本身就是一个语言结构，而define是一个函数。另外const在编译时要比define快很多，区别分为以下四点：
- 1、const可在类中使用，用于类成员变量的定义，一经定义，不可修改。define不可以用于类成员变量的定义，可用于全局常量。

```php
<?php 
class Test{
    const CONS = '我是常量';
    public function testEcho(){
        echo self::CONS; //如果从类的内部访问const或者static变量或者方法,那么就必须使用自引用的self，否则用$this
    }
}
```
 - 2、const在编译时定义，故必须处于最顶端的作用区域，不能在函数，循环及if条件中使用；
 而define是函数，也就是能调用函数的地方都可以使用
```php
<?php

if(true){
    const CONS = '我是常量';  //错误 const由于用在if条件中
}
if(true){
    define('CONS','我是常量');  //正确
}
```
- 3、const是一个语言结构；而define是一个函数，可以通过第三个参数来指定是否区分大小写,默认为false，表示区分大小写敏感，true表示大小写不敏感，

如：`define('PI',3.14,true);`

- 4、const只能采用普通的常量名称，define可以采用表达式作为名称
```php
<?php
const CONS = 'TEST';
for($i=0;$i<10;$i++){
    define('TEST_'.$i,1<<$i);
}
```

- 5、const只能接受静态的标量，而define可以采用任何表达式
```php
<?php
const CONS = 1<<5;  //无效的常量
define('CONS',1<<5); //有效的常量
```
