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
        
        //过滤字符串
        $reg='/[\da-zA-Z]{0,}/';
        preg_match($reg,$username,$temp);
        if (!($username==$temp[0])) {
            $this->error('含有非法字符','login/login',2);
        }

        //开始验证
    	$user=M('user')->where("username='".$username."'")->find();
    	if(md5($password)==$user['password']){
    		if($setcookie=="on"){
    			cookie('username',$username,302400);
    		}
    		session('username',$username);
    		redirect(U('user/user'));
    	}else{
    		$this->error('密码输入错误','login/login',2);
    	}
    }
}