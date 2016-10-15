<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	echo "login";
        $username=$_POST['username'];
        $password=$_POST['password'];
        var_dump($username);
        var_dump($password);

        $user=M('user')->where("username='".$username."'")->find();
    	if(md5($password)==$user['password']){
    		echo "1登陆成功";
    	}else{
    		echo "0登录失败";
    	}
    }
}