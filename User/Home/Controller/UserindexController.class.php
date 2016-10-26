<?php
namespace Home\Controller;
use Think\Controller;
class UserindexController extends Controller{
	public function userindex(){
		needNotlogin();
		$userid=session('userid');
		$username=session('username');

		// 导出数据
		$camera=M('camera')->field('cameraid,cameraname,longitude,latitude')->where("userid='".$userid."'")->select();
		foreach ($camera as $a => $b) {
			if ($a%4==0){
				$camera[$a]['cameraid0']=$camera[$a]['cameraid'];
				$camera[$a]['cameraname0']=$camera[$a]['cameraname'];
				$camera[$a]['longitude0']=$camera[$a]['longitude'];
				$camera[$a]['latitude0']=$camera[$a]['latitude'];
				unset($camera[$a]['cameraid']);
				unset($camera[$a]['cameraname']);
				unset($camera[$a]['longitude']);
				unset($camera[$a]['latitude']);
			}elseif ($a%4==1) {
				$camera[$a-1]['cameraid1']=$camera[$a]['cameraid'];
				$camera[$a-1]['cameraname1']=$camera[$a]['cameraname'];
				$camera[$a-1]['longitude1']=$camera[$a]['longitude'];
				$camera[$a-1]['latitude1']=$camera[$a]['latitude'];
				unset($camera[$a]);
			}elseif ($a%4==2) {
				$camera[$a-2]['cameraid2']=$camera[$a]['cameraid'];
				$camera[$a-2]['cameraname2']=$camera[$a]['cameraname'];
				$camera[$a-2]['longitude2']=$camera[$a]['longitude'];
				$camera[$a-2]['latitude2']=$camera[$a]['latitude'];
				unset($camera[$a]);
			}elseif ($a%4==3) {
				$camera[$a-3]['cameraid3']=$camera[$a]['cameraid'];
				$camera[$a-3]['cameraname3']=$camera[$a]['cameraname'];
				$camera[$a-3]['longitude3']=$camera[$a]['longitude'];
				$camera[$a-3]['latitude3']=$camera[$a]['latitude'];
				unset($camera[$a]);
			}
		}

		// dump($camera);

		// 渲染camera
		$this->assign('camera',$camera);
		$this->assign('username',$username);

		$this->display();
	}
}
