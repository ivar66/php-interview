### echo、print、print_r、var_dump 区别

> `echo`和`print`是语言结构、`print_r`和`var_dump`是普通函数

- echo：输出一个或多个字符串

- print：输出字符串

- print_r：打印关于变量的易于理解的信息

- var_dump：打印关于变量的易于理解的信息(带类型)

### 单引号和双引号的区别
双引号可以被分析器解析，单引号则不行

### php中===与==区别
===比较两个变量的值和类型；==比较两个变量的值，不比较数据类型。

### php中传值与传引用的区别
- 值传递：  函数范围内对值的任何改变在函数外部都会被忽略;
- 引用传递：函数范围内对值的任何改变在函数外部也能反映出这些修改；

优缺点：按值传递时，php必须复制值。特别是对于大型的字符串和对象来说，这将会是一个代价很大的操作。按引用传递则不需要复制值，对于性能提高很有好处。

### isset和empty的区别
isset：检测变量是否已设置并且非 NULL
empty：判断变量是否为空，变量为 0/false 也会被认为是空；变量不存在，不会产生警告

### static、self、$this的区别
- static：static 可以用于静态或非静态方法中，也可以访问类的静态属性、静态方法、常量和非静态方法，但不能访问非静态属性
- self：可以用于访问类的静态属性、静态方法和常量，但 self 指向的是当前定义所在的类，这是 self 的限制
- $this：指向的是实际调用时的对象，也就是说，实际运行过程中，谁调用了类的属性或方法，$this 指向的就是哪个对象。但 $this 不能访问类的静态属性和常量，且 $this 不能存在于静态方法中

### include、require、include_once、require_once的区别
require 和 include 几乎完全一样，除了处理失败的方式不同之外。require 在出错时产生 E_COMPILE_ERROR 级别的错误。换句话说将导致脚本中止而 include 只产生警告（E_WARNING），脚本会继续运行

include_once 语句在脚本执行期间包含并运行指定文件。此行为和 include 语句类似，唯一区别是如果该文件中已经被包含过，则不会再次包含。如同此语句名字暗示的那样，只会包含一次

### Cookie和Session
Cookie：PHP 透明的支持 HTTP cookie 。cookie 是一种远程浏览器端存储数据并以此来跟踪和识别用户的机制
Session：会话机制(Session)在 PHP 中用于保持用户连续访问Web应用时的相关数据

### 魔术方法
__construct()， __destruct()， __call()， __callStatic()， __get()， __set()， __isset()， __unset()， __sleep()， __wakeup()， __toString()， __invoke() 等方法在 PHP 中被称为"魔术方法"（Magic methods）

### public、protected、private、final区别
对属性或方法的访问控制，是通过在前面添加关键字 public（公有），protected（受保护）或 private（私有）来实现的。被定义为公有的类成员可以在任何地方被访问

PHP 5 新增了一个 final 关键字。如果父类中的方法被声明为 final，则子类无法覆盖该方法。如果一个类被声明为 final，则不能被继承

### 客户端/服务端IP获取,了解代理透传,实际IP的概念
客户端IP: $_SERVER['REMOTE_ADDR']
服务端IP: $_SERVER['SERVER_ADDR']
客户端IP(代理透传): $_SERVER['HTTP_X_FORWARDED_FOR']

### 类的静态调用和实例化调用
- 占用内存
    - 静态方法在内存中只有一份，无论调用多少次，都是共用的
    - 实例化不一样，每一个实例化是一个对象，在内存中是多个的
- 不同点
    - 静态调用不需要实例化即可调用
    - 静态方法不能调用非静态属性，因为非静态属性需要实例化后，存放在对象里
    - 静态方法可以调用非静态方法，使用 self 关键字。php 里，一个方法被 self:: 后，自动转变为静态方法
    - 调用类的静态函数时不会自动调用类的构造函数
    
### php.ini配置选项
- 配置选项

|名字|默认|备注|
|-|-|-|
|short_open_tag|"1"|是否开启缩写形式(`<? ?>`)|
|precision|"14"|浮点数中显示有效数字的位数|
|disable_functions|""|禁止某些函数|
|disable_classes|""|禁用某些类|
|expose_php|""|是否暴露 PHP 被安装在服务器上|
|max_execution_time|30|最大执行时间|
|memory_limit|128M|每个脚本执行的内存限制|
|error_reporting|NULL|设置错误报告的级别 `E_ALL` & ~`E_NOTICE` & ~`E_STRICT` & ~`E_DEPRECATED`|
|display_errors|"1"|显示错误|
|log_errors|"0"|设置是否将错误日志记录到 error_log 中|
|error_log|NULL|设置脚本错误将被记录到的文件|
|upload_max_filesize|"2M"|最大上传文件大小|
|post_max_size|"8M"|设置POST最大数据限制|


```shell
php -ini | grep short_open_tag //查看 php.ini 配置
```

- 动态设置

```php
ini_set(string $varname , string $newvalue);

ini_set('date.timezone', 'Asia/Shanghai'); //设置时区
ini_set('display_errors', '1'); //设置显示错误
ini_set('memory_limit', '256M'); //设置最大内存限制
```

### php-fpm.conf配置

|名称|默认|备注|
|-|-|-|
|pid||PID文件的位置|
|error_log||错误日志的位置|
|log_level|notice|错误级别 alert:必须立即处理、error:错误情况、warning:警告情况、notice:一般重要信息、debug:调试信息|
|daemonize|yes|设置 FPM 在后台运行|
|listen|ip:port、port、/path/to/unix/socket|设置接受 FastCGI 请求的地址|
|pm|static、ondemand、dynamic|设置进程管理器如何管理子进程|
|request_slowlog_timeout|'0'|慢日志记录阀值|
|slowlog||慢请求的记录日志|
