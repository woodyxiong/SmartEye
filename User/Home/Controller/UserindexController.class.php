<?php
namespace Home\Controller;
use Think\Controller;
class UserindexController extends Controller{
	public function userindex(){
		needNotlogin();

		$userid=session('userid');
		// M('data')->
		// echo $userid;

		


		$this->display();
	}
}