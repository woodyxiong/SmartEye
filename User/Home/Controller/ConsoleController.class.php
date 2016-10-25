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
		$camera=M('camera')->field('cameraname,filename')->where("cameraid='".$cameraid."'")->find();
		$camera['cameraid']=$cameraid;

		// 输出所有摄像头
		$cameras=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();

		// 输出摄像头内的数据
		$instruments=M('instrument')->where("cameraid='".$cameraid."'")->field('instrumentid,instrumentinfo,instrumentlonginfo')->select();
		foreach ($instruments as $a => $b) {
			// 整理数据表
			if($a%3==0){
				$instruments[$a]['instrumentinfo0']=$instruments[$a]['instrumentinfo'];
				$instruments[$a]['instrumentid0']=$instruments[$a]['instrumentid'];
				$instruments[$a]['instrumentlonginfo0']=$instruments[$a]['instrumentlonginfo'];
			}elseif($a%3==1){
				$instruments[$a-1]['instrumentinfo1']=$instruments[$a]['instrumentinfo'];
				$instruments[$a-1]['instrumentid1']=$instruments[$a]['instrumentid'];
				$instruments[$a-1]['instrumentlonginfo1']=$instruments[$a]['instrumentlonginfo'];
				unset($instruments[$a]);
			}elseif($a%3==2){
				$instruments[$a-2]['instrumentinfo2']=$instruments[$a]['instrumentinfo'];
				$instruments[$a-2]['instrumentid2']=$instruments[$a]['instrumentid'];
				$instruments[$a-2]['instrumentlonginfo2']=$instruments[$a]['instrumentlonginfo'];
				unset($instruments[$a]);
			}
		}
		// dump($instruments);

		// dump($camera);
		$this->assign('camera',$camera);
		$this->assign('cameras',$cameras);
		$this->assign('instruments',$instruments);

		$this->display();
	}
	/**
	 * 截图函数
	 */
	public function cut(){
		needNotlogin();
		$x1=I('post.x1');
		$x2=I('post.x2');
		$y1=I('post.y1');
		$y2=I('post.y2');
		$pathname=I('post.pathname');


		$opendir="cd Public/camera1/exe;";
		$operate="./cut.out ../".$pathname.".bmp ".$x1." ".$y2." ".$x2." ".$y1;

		$commond=$opendir.$operate;

		passthru($commond);
	}
	/**
	 * 灰度函数
	 */
	public function gray(){
		needNotlogin();
		$rgb =I('post.rgb');
		$rgbr=I('post.rgbr');
		$rgbg=I('post.rgbg');
		$rgbb=I('post.rgbb');
		$pathname=I('post.pathname');

		$opendir="cd Public/camera1/exe/;";
		$operate="./gray.out ../".$pathname."_1.bmp ".$rgb." ".$rgbr." ".$rgbg." ".$rgbb;

		$commond=$opendir.$operate;

		// echo $commond;
		passthru($commond);


	}
}
