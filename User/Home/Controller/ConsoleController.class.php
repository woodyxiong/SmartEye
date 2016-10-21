<?php
namespace Home\Controller;
use Think\Controller;
class ConsoleController extends Controller{
	public function console(){
		needNotlogin();

		// 获取参数
		$cameraid=I('get.cameraid/d');

		// 检察权限
		$cameraid=checkCamera($cameraid);
		// $camera=M('camera')->field('cameraname,gps')->where("cameraid='".$cameraid."'")->find();
		$camera=M('camera')->field('cameraname')->where("cameraid='".$cameraid."'")->find();
		$camera['cameraid']=$cameraid;

		// 输出所有摄像头
		$cameras=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();

		// dump($camera);
		$this->assign('camera',$camera);
		$this->assign('cameras',$cameras);
		$this->display();
	}
}