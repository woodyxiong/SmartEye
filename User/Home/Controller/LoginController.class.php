<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$this->display();
    }
    public function checklogin(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	$setcookie=$_POST['setcookie'];
    	$user=M('user')->where("username='".$username."'")->find();
    	if(md5($password)==$user['password']){
    		if($setcookie=="on"){
    			cookie('username',$username,302400);
    		}
    		session('username',$username);
    		redirect(U('userindex/user'));
    	}else{
    		$this->error('密码输入错误','Login/login',2);
    	}
    }
}