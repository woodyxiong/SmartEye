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
		$instrument=M('instrument')->where("cameraid='".$cameraid."'")->field('instrumentid,instrumentinfo')->select();
		foreach ($instrument as $a => $b) {
			// 整理数据表
			if($a%2==0){
				$instrument[$a]['instrumentinfo0']=$instrument[$a]['instrumentinfo'];
				$instrument[$a]['instrumentid0']=$instrument[$a]['instrumentid'];
				// 输出表 内容
				$instrument[$a]['data0']=M('data')->where("instrumentid='".$instrument[$a]['instrumentid']."'")->field('data,datatime')->order('datatime desc')->limit(15)->select();
				// 倒序输出
				$instrument[$a]['data0']=array_reverse($instrument[$a]['data0']);
			}elseif($a%2==1){
				$instrument[$a-1]['instrumentinfo1']=$instrument[$a]['instrumentinfo'];
				$instrument[$a-1]['instrumentid1']=$instrument[$a]['instrumentid'];
				// 输出表 内容
				$instrument[$a-1]['data1']=M('data')->where("instrumentid='".$instrument[$a]['instrumentid']."'")->field('data,datatime')->order('datatime desc')->limit(15)->select();
				// 倒序输出
				$instrument[$a-1]['data1']=array_reverse($instrument[$a-1]['data1']);
			}
		}
		var_dump($instrument[0][data0]);

		







		$this->assign('user',$user);
		$this->assign('instrument',$instrument);



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