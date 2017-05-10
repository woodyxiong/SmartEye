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
	$connection->bmpdata=null;
};

// 当客户端发来数据时
$tcp_worker->onMessage = 'message';

function message($connection, $data)
{
	$connection->bmpdata=($connection->bmpdata).$data;
};

// 关闭连接
$tcp_worker->onClose = function($connection)
{
	// 获取时间戳
	$filetime=$connection->mytime;

	// 文件路径
    $filepath="../Public/camera1/";

	// 文件名
	$filename="newest".".bmp";

	$bmpdata=$connection->bmpdata;

	$bmp = fopen($filepath.$filename, "w") or die("Unable to open file!");
    fwrite($bmp, $bmpdata);

    // 向客户端发送hello $data
    fclose($bmp);

	echo $bmp;
};


// 运行worker
Worker::runAll();
