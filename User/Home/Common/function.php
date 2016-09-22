<?php
function needNotlogin()
{
	$sessionUsername=session('username');
	$cookieUsername=cookie('username');
		echo $cookieUsername;
	if(empty($cookieUsername)){
		if(empty($sessionUsername)){
			// 都空
			redirect(U('user/user'));
		}
		// cookie空,session有
	}else{
		// cookie不为空
		session('username',$cookieUsername);
	}

}
