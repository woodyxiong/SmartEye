<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller{
	public function data(){
		$data=M("data")->where("instrumentid=1")->select();
		$this->assign('data',$data);
		// var_dump($data);
		$this->display();
	}

	public function excel(){
		echo "string";
	}
}