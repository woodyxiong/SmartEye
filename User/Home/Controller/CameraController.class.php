<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller{
	public function camera(){
		$this->display();
	}

	public function toggle(){
		$nowstatus=$_POST['nowstatus'];
		$operate=$_POST['operate'];
		//echo $operate;
		//echo $operate;
		if($operate=='on'){
			echo "on";
		}elseif ($operate=='off') {
			echo "off";
		}
		
	}
}