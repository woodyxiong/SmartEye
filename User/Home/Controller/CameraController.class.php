<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller{
	public function camera(){
		needNotlogin();

		// 获取参数
		$cameraid=I('get.cameraid/d');


		// 判断cameraid是否属于用户
		$user=M('camera')->where("cameraid='".$cameraid."'")->find();
		if($user['userid']==session('userid')){
			//权限正确
		}else{
			$this->error('权限错误');
		}

		// 输出数据表 名
		$instrument=M('instrument')->where("cameraid='".$cameraid."'")->select();
		foreach ($instrument as $a => $b) {
			if($a%2==0){
				$instrument[$a]['instrumentinfo0']=$instrument[$a]['instrumentinfo'];
				$instrument[$a]['instumentid0']=$instrument[$a]['instrumentid'];
			}elseif($a%2==1){
				$instrument[$a-1]['instrumentinfo1']=$instrument[$a]['instrumentinfo'];
				$instrument[$a-1]['instumentid1']=$instrument[$a]['instrumentid'];
			}
		}

		// 输出表 内容
		







		$this->assign('user',$user);
		$this->assign('instrument',$instrument);

		// var_dump($instrument);








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