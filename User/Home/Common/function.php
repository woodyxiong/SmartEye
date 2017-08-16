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
		$user=M('user')->where("userid='".$cookieUserid."'")->find();
		session('username',$user['username']);
		session('userid',$user['userid']);
	}
}


/**
 * 判断是否属于用户的camera
 * @param  int 	$cameraid	从网页get到的cameraid值
 * @return int  $cameraid       
 */
function checkCamera($cameraid){
	// 判断cameraid是否属于用户
	$user=M('camera')->where("cameraid='".$cameraid."'")->find();
	if($user['userid']==session('userid')){
		//权限正确
	}else{
		// 若get到的参数错误
		$error=M('camera')->where("userid='".session('userid')."'")->find();
		$cameraid=$error['cameraid'];
	}
	return $cameraid;
}

/**
 * 判断instrument是否属于用户
 * @param  int  $instrument
 * @return int  $instrument
 */
function checkInstrument($instrumentid){
	$camera=M('instrument')->where("instrumentid='".$instrumentid."'")->find();
	$cameraid=$camera['cameraid'];
	$newCameraid=checkCamera($cameraid);
	if(!$newCameraid==$cameraid){
		$error=M('instrument')->where("cameraid='".$newCameraid."'")->select();
		$instrumentid=$error[0]['instrumentid'];
	}
	return $instrumentid;
}



