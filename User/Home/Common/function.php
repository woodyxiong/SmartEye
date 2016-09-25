<?php
function needNotlogin()
{
	$sessionUsername=session('userid');
	$cookieUserid=cookie('userid');
	if(empty($cookieUsername)){
		if(empty($sessionUsername)){
			// 都空
			redirect(U('login/login'));
		}
		// cookie空,session有
	}else{// cookie不为空
		
		//过滤字符串
        $reg='/[\da-zA-Z]{0,}/';
        preg_match($reg,$cookieUserid,$temp);
        if (!($cookieUserid==$temp[0])) {
            $this->error('你竟然背着我偷偷做坏事','login/login',2);
        }

        // 确认登陆
        $user=M('user')->where("userid='".$cookieUsername."'")->find();
        var_dump($user);
        session('username',$user['username']);
        session('userid',$user['userid']);
	}

}
