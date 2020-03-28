# MySQL各个存储引擎及区别

常见三种：Myisam,InnoDB,Memory

区别：
- 1、InnoDB跟Myisam的默认索引是B+tree，Memory的默认索引是hash
- 2、InnoDB支持事务，支持外键，支持行锁，写入数据时操作快，MySQL5.6版本以上才支持全文索引
- 3、Myisam不支持事务。不支持外键，支持表锁，支持全文索引，读取数据快
- 4、Memory所有的数据都保留在内存中,不需要进行磁盘的IO所以读取的速度很快, 但是一旦关机的话表的结构会保留但是数据就会丢失,表支持Hash索引，因此查找速度很快


参考资料：
- https://www.cnblogs.com/huangting/p/10883754.html
- https://www.cnblogs.com/rgever/p/9736374.html