<?php
use Workerman\Worker;
require_once 'Autoloader.php';

// 创建一个Worker监听2347端口，不使用任何应用层协议
$tcp_worker = new Worker("tcp://0.0.0.0:2347");
// 启动4个进程对外提供服务
$tcp_worker->count = 1;


$tcp_worker->onConnect = function($connection)
{
	$connection->mytime=time();
};

// 当客户端发来数据时
$tcp_worker->onMessage = 'message';

function message($connection, $data)
{
	// 获取时间戳
	$filetime=$connection->mytime;

    // 文件路径
    $filepath="../Public/camera1/";

	// 文件名
	$filename=$filetime.".bmp";

    // $bmp = fopen($filename, "a") or die("Unable to open file!");
	$bmp = fopen($filepath.$filename, "a") or die("Unable to open file!");
    fwrite($bmp, $data);


    // 向客户端发送hello $data
    fclose($bmp);
};


// 运行worker
Worker::runAll();
