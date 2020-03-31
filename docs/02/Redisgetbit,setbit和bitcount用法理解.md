# redis getbit,setbit和bitcount的用法理解

## 定义

先了解一下官方的简介

```bash
GETBIT key offset
#对key所储存的字符串值，获取指定偏移量上的位(bit)。
SETBIT key offset value
#对key所储存的字符串值，设置或清除指定偏移量上的位(bit)。
BITCOUNT key [start] [end]
#计算给定key的字符串值中，被设置为 1 的比特位的数量
```

我们了解到计算器保存数据，都是以二进制的形式存储的，每一个非中文字符占一个字节（Byte），中文字符占两个字节，而一个字节又是占8bit。

例子：
```redis
127.0.0.1:6379> get test
"c"
127.0.0.1:6379> getbit test 0
(integer) 0
127.0.0.1:6379> getbit test 1
(integer) 1
127.0.0.1:6379> getbit test 2
(integer) 1
127.0.0.1:6379> getbit test 3
(integer) 0
127.0.0.1:6379> getbit test 4
(integer) 0
127.0.0.1:6379> getbit test 5
(integer) 0
127.0.0.1:6379> getbit test 6
(integer) 1
127.0.0.1:6379> getbit test 7
(integer) 1
127.0.0.1:6379> getbit test 8
(integer) 0
127.0.0.1:6379> BITCOUNT test   #被设置为 1 的比特位的数量
(integer) 4
127.0.0.1:6379> setbit test 0 1 #将第0位设置为1
(integer) 0
127.0.0.1:6379> BITCOUNT test
(integer) 5
```
## 优缺点
1、优点
- 极其省空间：通过一个bit位来表示某个元素对应的值或者状态,其中的key就是对应元素本身。我们知道8个bit可以组成一个Byte，所以bitmap本身会极大的节省储存空间。
- 极其效率高：setbit和getbit的时间复杂度就是O(1)，其他位运算也是效率极高的

2、缺点
- 缺点也在于位计算和位表示数值的局限。故如要用位来做业务数据记录，那么就不要在意value的值了
  
## 应用场景
- 可作为简单的布尔过滤器来判断用户是否执行过某些操作
- 用户日活，月活,留存率的统计,
- 实现用户上线次数统计,如：用户A，第二天开始上线，则`setbit 2 1`，计算用户A总共上线次数，使用 BITCOUNT 命令：执行 `BITCOUNT A` ，得出的结果就是 A 上线的总天数
- 用户在线状态及人数统计记录

参考资料：https://blog.csdn.net/maoyuanming0806/article/details/81813776