<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller{
	public function camera(){
		needNotlogin();

		// 获取参数
		$cameraid=I('get.cameraid/d');

		// 检察权限
		$cameraid=checkCamera($cameraid);
		$user=M('camera')->where("cameraid='".$cameraid."'")->find();


		// 输出所有摄像头
		$cameras=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();


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

		$this->assign('cameras',$cameras);
		$this->assign('user',$user);
		$this->assign('instrument',$instrument);



		$this->display();

	}

	public function toggle(){
		needNotlogin();
		$nowstatus=$_POST['nowstatus'];
		$operate=$_POST['operate'];
		$cameraid=I('post.cameraid/d');

		// 判断cameraid是否属于用户
		$newcameraid=checkCamera($cameraid);
		if(!$newcameraid==$cameraid)
			exit(0);
		$camera=M('camera')->where("cameraid='".$cameraid."'")->find();
		

		// 查看状态
		$data['time']=date("Y-m-d H:i:s");
		$data['ip']=get_client_ip();
		$data['userid']=session('userid');

		$realstatus=$camera['status'];
		if($realstatus==$operate){}
		elseif($realstatus=='on'&&$operate=='off'){
			// 关闭摄像头
			$update['status']="off";
			$update['time']=$data['time'];
			M('camera')->where("cameraid='".$cameraid."'")->data($update)->save();
			$data['operation']="关闭了摄像头(".$camera['cameraname'].")";
			M('log')->data($data)->add();
			$output = array(
				'nowstatus'=>'off',
				'datetime'=>$data['time']
			 );
			echo json_encode($output);
		}
		elseif($realstatus=='off'&&$operate=='on'){
			// 打开摄像头
			$update['status']="on";
			$update['time']=$data['time'];
			M('camera')->where("cameraid='".$cameraid."'")->data($update)->save();
			$data['operation']="打开了摄像头(".$camera['cameraname'].")";
			M('log')->data($data)->add();
			$output = array(
				'nowstatus'=>'on',
				'datetime'=>$data['time']
			 );
			echo json_encode($output);
		}



	}
}
