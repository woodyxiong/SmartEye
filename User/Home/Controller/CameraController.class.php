<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller{
	public function camera(){
		//$data=M('data')->where("username='".$username."'")->find();
		$this->display();
	}
}