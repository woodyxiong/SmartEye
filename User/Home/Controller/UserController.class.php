<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function user()
	{
		$this->display();
	}

	public function quit(){
		session('username','');
		// $this->success('您已经成功退出','Camera/camera',2);
		redirect(U('login/login'));
	}
}
