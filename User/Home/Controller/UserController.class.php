<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller{
	public function user()
	{
		needNotlogin();
		$this->display();
	}

	public function quit(){
		session('username',null);
		cookie('username',null);
		redirect(U('login/login'));
	}
}
