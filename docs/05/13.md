### 用过ping吗？是什么协议？
ping 是icmp协议（是“Internet Control Message Protocol”(Internet控制消息协议)的缩写），是tcp/ip协议族的子协议，用于在IP主机、路由器之间传递控制消息。

原理：利用ip地址的唯一性，给一个ip地址发送请求包，要求对方返回一个同样大小的数据包，从而来确定是否相通，时延多久。
