<?php
namespace Home\Controller;
use Think\Controller;
class UserindexController extends Controller{
	public function userindex(){
		needNotlogin();
		$this->display();
	}
}