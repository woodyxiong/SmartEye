<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function user()
	{
		needNotlogin();

		$username=session('username');
		$this->assign('username',$username);

		$this->display();
	}

	public function quit(){
		session('username',null);
		cookie('username',null);
		redirect(U('login/login'));
	}
}
