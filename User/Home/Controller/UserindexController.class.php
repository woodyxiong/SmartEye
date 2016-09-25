<?php
namespace Home\Controller;
use Think\Controller;
class UserindexController extends Controller{
	public function userindex(){
		needNotlogin();
		$userid=session('userid');
		// 渲染camera
		$camera=M('camera')->where("userid='".$userid."'")->select();
		$this->assign('camera',$camera);


		// $this->display();
	}
}