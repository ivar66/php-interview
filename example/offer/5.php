<?php
/**
 * DESC:用两个栈来实现一个队列，完成队列的Push和Pop操作。 队列中的元素为int类型。
 * User: dukang
 * Date: 2020/4/4
 * Time: 下午1:45
 */


$queue = [];
function mypush($node)
{
    global $queue;
    return array_push($queue,$node);
    // write code here
}
function mypop()
{
    global $queue;
    return array_shift($queue);
    // write code here
}

mypush(1);
mypush(2);
mypush(3);
mypush(4);

print_r(mypop());
print_r(mypop());
print_r(mypop());
print_r(mypop());