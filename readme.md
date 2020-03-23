# PHP常见面试问答

通过平时的积累，汇总大家的面试遇到的问题，尝试提供常见问题的解答

包含PHP，数据库，网络，Linux，数据结构等部分

----

## 常见知识点

### 一、PHP篇
- [人人都要知道的PHP底层运行机制与工作原理？](https://segmentfault.com/a/1190000015700130)
- [echo、print、print_r、var_dump 区别](./docs/01.PHP/simple.md#echoprintprint_rvar_dump-区别)
- [了解大部分数组处理函数](https://www.php.net/manual/zh/ref.array.php)
- [php5/php7 数组底层如何实现？](./docs/01.PHP/php_array.md)
- [单引号和双引号的区别](./docs/01.PHP/simple.md#单引号和双引号的区别)
- [isset和empty的区别](./docs/01.PHP/simple.md#isset和empty的区别)
- [static、self、$this的区别](./docs/01.PHP/simple.md#static、self、$this的区别)
- [include、require、include_once、require_once的区别](./docs/01.PHP/simple.md#include、require、include_once、require_once的区别)
- [Cookie和Session](./docs/01.PHP/simple.md#Cookie和Session)
- [魔术方法](./docs/01.PHP/simple.md#魔术方法)
- [public、protected、private、final区别](./docs/01.PHP/simple.md#public、protected、private、final区别)
- [客户端/服务端IP获取,了解代理透传,实际IP的概念](./docs/01.PHP/simple.md#客户端/服务端IP获取,了解代理透传,实际IP的概念)
- [类的静态调用和实例化调用](./docs/01.PHP/simple.md#类的静态调用和实例化调用)
- [php.ini 配置选项](./docs/01.PHP/simple.md#php.ini配置选项)
- [php-fpm.conf配置](./docs/01.PHP/simple.md#php-fpm.conf配置)
- define() 与 const 区别
- traits 与 interfaces 区别 及 traits 解决了什么痛点？
- __construct 与 __destruct 区别
- == 与 === 区别
- [__toString() 作用](https://www.php.net/manual/en/language.oop5.magic.php#object.tostring)
- BOM 头是什么，怎么除去
- 依赖注入实现原理
- 如何异步执行命令
- Xhprof 、Xdebug 性能调试工具使用
- [yield是什么，核心原理是什么，说个使用场景 yield](https://www.oschina.net/translate/cooperative-multitasking-using-coroutines-in-php)
- Cookie 与 Session 区别,Session 共享、存活时间
- Copy on write 原理，何时 GC？
- PHP 进程模型，进程通讯方式，进程线程区别
- mysqli,mysql,PDO的区别，以及pdo的prepare原理
- PHP 7 与 PHP 5 有什么区别
- Swoole 适用场景，协程实现方式


### 二、数据库篇
- MySQL 各个存储引擎、及区别（一定会问 MyISAM 与 Innodb 区别）
- MySQL
    - CRUD
    - JOIN、LEFT JOIN 、RIGHT JOIN、INNER JOIN
    - UNION
    - GROUP BY + COUNT + WHERE 组合案例
    - [常用 MySQL 函数，如：now()、md5()、concat()、uuid()等](https://www.w3schools.com/sql/sql_ref_mysql.asp)
    - `1:1`、`1:n`、`n:n` 各自适用场景
    - 了解触发器是什么，说个使用场景
    - 数据库优化手段
        - 索引、联合索引（命中条件）
        - 分库分表（`水平分表`、`垂直分表`）
        - 分区
        - 会使用 `explain` 分析 SQL 性能问题，了解各参数含义
            * 重点理解 `type`、`rows`、`key`
        - Slow Log（有什么用，什么时候需要）
- MSSQL(了解)
    - 查询最新5条数据
- NOSQL
    - Redis、Memcached、MongoDB的对比
    - 对比、适用场景（可从以下维度进行对比）
        - 持久化
        - 支持多钟数据类型
        - 可利用 CPU 多核心
        - 内存淘汰机制
        - 集群 Cluster
        - 支持 SQL
        - 性能对比
        - 支持事务
        - 应用场景

### 三、数据结构/算法篇
数据结构
- 堆、栈特性
- 队列
- 哈希表
- 链表

算法部分
- 快速排序（手写）
- 冒泡排序（手写）
- 二分查找（了解）
- 查找算法 KMP（了解）
- 深度、广度优先搜索（了解）
- LRU 缓存淘汰算法（了解，Memcached 采用该算法）
### 四、网络篇
- HTTP 与 HTTPS 区别
- 输入一个url之后发生了什么

## 五、服务器篇
- 查看 CPU、内存、时间、系统版本等信息
- find 、grep 查找文件
- awk 处理文本
- 查看命令所在目录
- 自己编译过 PHP 吗？如何打开 readline 功能
- 如何查看 PHP 进程的内存、CPU 占用
- 如何给 PHP 增加一个扩展
- 修改 PHP Session 存储位置、修改 INI 配置参数
- 负载均衡有哪几种，挑一种你熟悉的说明其原理
- 数据库主从复制 M-S 是怎么同步的？是推还是拉？会不会不同步？怎么办
- 如何保障数据的可用性，即使被删库了也能恢复到分钟级别。你会怎么做。
- 数据库连接过多，超过最大值，如何优化架构。从哪些方便处理？
- 502 大概什么什么原因？ 如何排查  504呢？
- 如何排查网站比较慢？
- [supervisor用法详解？](https://www.jianshu.com/p/0b9054b33db3)

## 六架构篇
- 偏运维（了解）：
    - 负载均衡（Nginx、HAProxy、DNS）
    - 主从复制（MySQL、Redis）
    - 数据冗余、备份（MySQL增量、全量 原理）
    - 监控检查（分存活、服务可用两个维度）
    - MySQL、Redis、Memcached Proxy 、Cluster 目的、原理
    - 分片
    - 高可用集群
    - RAID
    - 源代码编译、内存调优
- 缓存
    - 工作中遇到哪里需要缓存，分别简述为什么
- 搜索解决方案
- 性能调优
- 各维度监控方案
- 日志收集集中处理方案
- 国际化
- 数据库设计
- 静态化方案
- 画出常见 PHP 应用架构图

## 设计模式
- 单例模式（重点）
- 工厂模式（重点）
- 观察者模式（重点）
- 依赖注入（重点）
- 装饰器模式
- 代理模式
- 组合模式

## 安全篇
- SQL 注入
- XSS 与 CSRF
- 输入过滤
- Cookie 安全
- 禁用 `mysql_` 系函数
- 数据库存储用户密码时，应该是怎么做才安全
- 验证码 Session 问题
- 安全的 Session ID （让即使拦截后，也无法模拟使用）
- 目录权限安全
- 包含本地与远程文件
- 文件上传 PHP 脚本
- `eval` 函数执行脚本
- `disable_functions` 关闭高危函数
- FPM 独立用户与组，给每个目录特定权限
- 了解 Hash 与 Encrypt 区别


## 其它
- 如何在不支持 `DELETE` 请求的浏览器上兼容 `DELETE` 请求
- API 请求如何保证数据不被篡改？
- JSON 和 JSONP 的区别
- 数据加密和验签的区别
- RSA 是什么
- API 版本兼容怎么处理
- 限流（木桶、令牌桶）
- OAuth 2 主要用在哪些场景下
- JWT
- PHP 中 `json_encode(['key'=>123]);` 与 `return json_encode([]);` 区别，会产生什么问题？如何解决
- 写一个正则如何去匹配纯数字
