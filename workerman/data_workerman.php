<?php
use Workerman\Worker;
require_once 'Autoloader.php';

// 创建一个Worker监听2347端口，不使用任何应用层协议
$tcp_worker = new Worker("tcp://0.0.0.0:2347");
// 启动4个进程对外提供服务
$tcp_worker->count = 1;

// 当客户端发来数据时
$tcp_worker->onMessage = 'message';

function message($connection, $data)
{
    $time=time();
	$myfile = fopen($time.".txt", "a") or die("Unable to open file!");

    fwrite($myfile, $data);

    // 向客户端发送
    $connection->send($i);
    fclose($myfile);
};


// 运行worker
Worker::runAll();
