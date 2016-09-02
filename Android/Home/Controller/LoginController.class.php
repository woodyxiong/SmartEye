<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$jsoncode=$_GET['json'];
    	// $jsoncode='{"username":"clever","password":"clever"}';
    	// 开始解析json
		$jsonobj=json_decode($jsoncode,true);
		$user=M('user')->where("username='".$jsonobj['username']."'")->find();
		//验证密码
		$password=md5($jsonobj['password']);
		if($user['password']==$password){
			echo "登陆成功";
		}else{
			echo "登录失败";
		}
    }
}