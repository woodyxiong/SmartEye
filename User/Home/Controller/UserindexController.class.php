<?php
namespace Home\Controller;
use Think\Controller;
class UserindexController extends Controller{
	public function userindex(){
		needNotlogin();

		$userid=session('userid');
		
		$camera=M('camera')->where("userid='".$userid."'")->select();
		// var_dump($camera);

		foreach ($camera as $a => $b) {
			if ($a%4==0){
				$camera[$a]['cameraid0']=$camera[$a]['cameraid'];
				$camera[$a]['cameraname0']=$camera[$a]['cameraname'];
			}elseif ($a%4==1) {
				$camera[$a-1]['cameraid1']=$camera[$a]['cameraid'];
				$camera[$a-1]['cameraname1']=$camera[$a]['cameraname'];
			}elseif ($a%4==2) {
				$camera[$a-2]['cameraid2']=$camera[$a]['cameraid'];
				$camera[$a-2]['cameraname2']=$camera[$a]['cameraname'];
			}elseif ($a%4==3) {
				$camera[$a-3]['cameraid3']=$camera[$a]['cameraid'];
				$camera[$a-3]['cameraname3']=$camera[$a]['cameraname'];
			}
		}

		$this->assign('camera',$camera);

		

		// var_dump($camera);
		$this->display();
	}
}