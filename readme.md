# PHP常见面试问答

通过平时的积累，汇总大家的面试遇到的问题，尝试提供常见问题的解答

包含PHP，数据库，网络，Linux，数据结构等部分

----

## 常见知识点

### 一、PHP篇
- [01.echo、print、print_r、var_dump 区别](./docs/01/1.md)
- [02.php array_merge和array+array的区别](./docs/01/2.md);
- [03.PHP数组函数](./docs/01/3.md)
- [04.php5/php7数组底层如何实现？](./docs/01/4.md)
- [05.单引号和双引号的区别](./docs/01/5.md)
- [06.isset和empty的区别](./docs/01/6.md)
- [07.static、self、$this的区别](./docs/01/7.md)
- [08.include、require、include_once、require_once的区别](./docs/01/8.md)
- [09.Cookie和Session区别,Session存储位置，共享、存活时间](./docs/01/9.md)
- [10.魔术方法](./docs/01/10.md)
- [11.public、protected、private、final区别](./docs/01/11.md)
- [12.客户端/服务端IP获取,了解代理透传,实际IP的概念](./docs/01/12.md)
- [13.类的静态调用和实例化调用](./docs/01/13.md)
- [14.==与===区别](./docs/01/14.md)
- [15.define()与const区别](./docs/01/15.md)
- [16.php|传值与传引用的区别](./docs/01/16.md)
- [17.PHP7与PHP5有什么区别](./docs/01/17.md)
- [18.如何异步执行命令?fastcgi_finish_request方法](./docs/01/18.md)
- [19.*yield是什么，核心原理是什么，说个使用场景 yield](./docs/01/19.md)
- 20.Swoole 适用场景，协程实现方式
- [21.人人都要知道的PHP底层运行机制与工作原理？](./docs/01/21.md)
- [22.php垃圾回收](./docs/01/22.md)
- [23.php.ini/php-fpm.conf配置选项](./docs/01/23.md)
- [24.BOM 头是什么，怎么除去](./docs/01/24.md)
- [25.PHP 进程模型，进程通讯方式，进程线程区别](./docs/01/25.md)
- [26.php | abstract与interface之间的区别](./docs/01/26.md)
- 27.traits 与 interfaces 区别 及 traits 解决了什么痛点？
- [28.依赖注入(ioc)实现原理](https://segmentfault.com/a/1190000015173300,https://segmentfault.com/a/1190000002424023)
- 29.Xhprof 、Xdebug 性能调试工具使用
- 30.Copy on write 原理，何时 GC？
- 31.如何给 PHP 增加一个扩展
- [32.php中的后期静态绑定](./docs/01/32.md)
- [33.php反射](https://www.kancloud.cn/a173512/php_note/1344389)

### 二、数据库篇
- 1.MySQL
    - 1.mysqli,mysql,PDO的区别，以及pdo的prepare原理
    - [2.MySQL各个存储引擎、及区别](./docs/02/1/MySQL各个存储引擎、及区别.md)
    - [3.什么是事务？事务的四个特性以及事务的隔离级别](./docs/02/1/什么是事务？事务的四个特性以及事务的隔离级别.md)
    - [4.分布式事务解决方案](https://www.jianshu.com/p/ee4071d0c951)
    - [5.怎样避免慢查询](./docs/02/1/怎样避免慢查询.md)
    - [6.索引类型](./docs/02/1/索引类型.md)
    - [7.数据库主从复制M-S是怎么同步的？是推还是拉？会不会不同步？怎么办](./docs/02/1/7.md)
    - 8.数据库常见语句(UNION,CRUD,JOIN、LEFT JOIN 、RIGHT JOIN、INNER JOIN,GROUP BY + COUNT + WHERE 组合案例)
    - [9常用 MySQL 函数，如：now()、md5()、concat()、uuid()等](https://www.w3schools.com/sql/sql_ref_mysql.asp)
    - 10.`1:1`、`1:n`、`n:n` 各自适用场景
    - 11.了解触发器是什么，说个使用场景
    - 12.数据库优化手段
        - 12.1 索引、联合索引（命中条件）
        - 12.2 分库分表（`水平分表`、`垂直分表`）
        - 12.3 分区
        - 12.4 会使用 `explain` 分析 SQL 性能问题，了解各参数含义
            * 重点理解 `type`、`rows`、`key`
        - 12.5 Slow Log（有什么用，什么时候需要）
     - 13.为啥采用B+树，不采用红黑树等
     - 14.什么是sql注入，怎么防止sql注入，xss和csrf
     - 15、[mysql执行过程](https://www.cnblogs.com/fanguangdexiaoyuer/p/10268570.html)
     
- 2.MSSQL(了解)
    - 1 查询最新5条数据
    
- 3.NOSQL
    - [0.redis常见面试问答***](https://zhuanlan.zhihu.com/p/118561398)
    - [1.Redis缓存失效策略](./docs/02/3/Redis缓存失效策略.md)
    - [2.Redis getbit,setbit和BITCOUNT用法理解](./docs/02/3/Redisgetbit,setbit和bitcount用法理解.md)
    - [3.Redis为什么这么快](./docs/02/3/Redis为什么这么快.md)
    - [4.Redis Cluster](./docs/02/3/RedisCluster.md)
    - [5.zset的实现](https://blog.csdn.net/weixin_38008100/article/details/94629753)
    - [5.redis源码解读](https://zcheng.ren/sourcecodeanalysis/,https://github.com/huangz1990/redis-3.0-annotated,https://zhuanlan.zhihu.com/p/133514706)
    - [6.68道Redis面试题](https://zhuanlan.zhihu.com/p/112944545)
    - [7.redis主从同步原理](./docs/02/3/7.md)
    - [8.Redisson基本原理](./docs/02/3/8.md)
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
- [4.ES](https://github.com/jacksu/awesome-es/blob/master/README.md，https://blog.csdn.net/wojiushiwo987/article/details/86558214)
    - 1.refresh_interval用法
    - 主节点挂了怎么办？怎么再选
    - ES的倒排
    - 详细描述一下Elasticsearch索引文档的过程？

### 三、数据结构/算法篇
数据结构
- 堆、栈特性
- 队列
- 哈希表
- 链表

算法部分
- [剑指OFFER](./example/offer/readme.md)
- [动态规划解法的套路](https://mp.weixin.qq.com/s/pg-IJ8rA1duIzt5hW1Cycw)
- [二叉树深度算法](./docs/03/leetcode/二叉树深度的算法.php)
- [二叉树子节点个数](./docs/03/leetcode/二叉树子节点个数.php)
- [回文串](./docs/03/leetcode/回文串.php)
- [链表是否有环](./docs/03/leetcode/链表是否有环.php)
- [topK](./docs/03/algorithm/topK.md)
- 快速排序（手写）
- 冒泡排序（手写）
- 二分查找（了解）
- 查找算法 KMP（了解）
- 深度、广度优先搜索（了解）
- LRU 缓存淘汰算法（了解，Memcached 采用该算法）

### 四、网络篇
- [输入一个url之后发生了什么](https://zhuanlan.zhihu.com/p/43369093,https://segmentfault.com/a/1190000016239579，)
- [一文搞懂TCP与UDP的区别](https://www.cnblogs.com/fundebug/p/differences-of-tcp-and-udp.html)
- [tcp三次握手四次挥手，为啥多一次](./docs/04/3.md)
- HTTP keep-alive
- HTTP1.0,HTTP1.1和HTTP2.0区别
- [HTTP 与 HTTPS 区别](https://blog.csdn.net/sinyu890807/article/details/104546558) 
- [tcp滑动窗口协议](https://www.cnblogs.com/coder-programming/p/10627746.html)
- [浅谈IO模型](./docs/04/浅谈IO模型.md)

## 五、服务器篇
- 1.查看 CPU、内存、时间、系统版本等信息
- 2.find 、grep 查找文件
- 3.awk 处理文本
- 4.查看命令所在目录
- 5.自己编译过 PHP 吗？如何打开 readline 功能
- 6.如何查看 PHP 进程的内存、CPU 占用
- 7.负载均衡有哪几种，挑一种你熟悉的说明其原理
- 8.如何保障数据的可用性，即使被删库了也能恢复到分钟级别。你会怎么做。
- 9.数据库连接过多，超过最大值，如何优化架构。从哪些方便处理？
- 10.502 大概什么什么原因？ 如何排查  504呢？
- 11.如何排查网站比较慢？
- [12.supervisor用法详解？](https://segmentfault.com/a/1190000022121578)
- [13.用过ping吗？是什么协议？](docs/05/13.md#用过ping吗？是什么协议？)


## 六、架构篇
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
    - [缓存雪崩、缓存穿透、缓存预热、缓存更新、缓存降级等问题](./docs/06/缓存雪崩、缓存穿透、缓存预热、缓存更新、缓存降级等问题.md)
    - [布隆过滤器](./docs/06/什么是布隆过滤器.md)   
- 搜索解决方案
- 性能调优
- 各维度监控方案
- 日志收集集中处理方案
- 国际化
- 数据库设计
- 静态化方案
- 画出常见 PHP 应用架构图
- [分布式架构总结](https://www.cnblogs.com/zhy-1992/p/9233789.html)
- [一致性hash算法](./docs/06/什么是一致性Hash算法.md)
- [Zookeeper 原理与优化]()
- [分布式一致性最佳实践-raft](./docs/06/分布式一致性最佳实践-raft.md)
- [RabbitMQ核心概念以及工作原理](https://www.jianshu.com/p/256c502d09cd,https://blog.csdn.net/lettyisme/article/details/85233008)
- [单点登陆](https://www.jianshu.com/p/75edcc05acfd)

## 七、设计模式
- [*单例模式](./docs/07/单例模式.md)
- [*工厂模式](./docs/07/工厂模式.md)
- 观察者模式（重点）
- 依赖注入（重点）
- 装饰器模式
- 代理模式
- 组合模式

## 八、安全篇
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

