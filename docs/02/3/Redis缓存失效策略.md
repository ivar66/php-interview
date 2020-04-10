#Redis缓存失效策略

## 一、Redis淘汰策略
redis淘汰策略为以下六种，
```text
volatile-lru：从已设置过期时间的数据中挑选最近最少使用的数据淘汰；
volatile-ttl：从已设置过期时间的数据中挑选将要过期的数据淘汰；
volatile-random：从已设置过期时间的数据中任意选择数据淘汰；
allkeys-lru：从数据集中挑选最近最少使用的数据淘汰；
allkeys-random：从数据集中任意选择数据淘汰；
no-enviction（驱逐）：禁止驱逐数据
```

注意:
- volatile和allkeys规定了是对已设置过期时间的数据集淘汰数据还是从全部数据集淘汰数据，
- 后面的lru、ttl以及random是三种不同的淘汰策略，再加上一种no-enviction永不回收的策略。

## 二、Redis三种数据淘汰策略机制
区分不同的淘汰策略选择不同的key，Redis淘汰策略主要分为**LRU淘汰**、**TTL淘汰**、**随机淘汰**三种机制

### 2.1 LRU淘汰
LRU（Least recently used，最近最少使用）算法根据数据的历史访问记录来进行淘汰数据，其核心思想是“如果数据最近被访问过，那么将来被访问的几率也更高”。

在服务器配置中保存了 lru 计数器 server.lrulock，会定时（redis 定时程序 serverCorn()）更新，server.lrulock 的值是根据 server.unixtime 计算出来进行排序的，然后选择最近使用时间最久的数据进行删除。另外，从 struct redisObject 中可以发现，每一个 redis 对象都会设置相应的 lru。每一次访问数据，会更新对应redisObject.lru

在Redis中，LRU算法是一个近似算法，默认情况下，Redis会随机挑选5个键，并从中选择一个最久未使用的key进行淘汰。在配置文件中，按maxmemory-samples选项进行配置，选项配置越大，消耗时间就越长，但结构也就越精准

### 2.2 TTL淘汰
Redis 数据集数据结构中保存了键值对过期时间的表，即 redisDb.expires。与 LRU 数据淘汰机制类似，TTL 数据淘汰机制中会先从过期时间的表中随机挑选几个键值对，取出其中 ttl 最大的键值对淘汰。同样，TTL淘汰策略并不是面向所有过期时间的表中最快过期的键值对，而只是随机挑选的几个键值对。

### 2.3 随机淘汰：
在随机淘汰的场景下获取待删除的键值对，随机找hash桶再次hash指定位置的dictEntry即可。
Redis中的淘汰机制都是几近于算法实现的，主要从性能和可靠性上做平衡，所以并不是完全可靠，所以开发者们在充分了解Redis淘汰策略之后还应在平时多主动设置或更新key的expire时间，主动删除没有价值的数据，提升Redis整体性能和空间。

## 三、应用
- 1、如果数据呈现幂律分布，也就是一部分数据访问频率高，一部分数据访问频率低，则使用allkeys-lru
- 2、如果数据呈现平等分布，也就是所有的数据访问频率都相同，则使用allkeys-random


参考资料：https://www.jianshu.com/p/b1b4eeccc140