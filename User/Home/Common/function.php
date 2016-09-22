<?php
function needNotlogin()
{
	$sessionUsername=session('username');
	$cookieUsername=cookie('username');
	if(empty($cookieUsername)){
		if(empty($sessionUsername)){
			// 都空
			redirect(U('login/login'));
		}
		// cookie空,session有
	}else{
		// cookie不为空
		session('username',$cookieUsername);
	}

}
