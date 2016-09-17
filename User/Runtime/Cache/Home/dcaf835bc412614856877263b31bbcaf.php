<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>登录页面</title>
	<!-- import css -->
	<link rel="stylesheet" type="text/css" href="/Public/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/materialall.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/login.css">
	<!-- import js -->
	<script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
	<script type="text/javascript" src="/Public/js/materialize.min.js"></script>
</head>
<body>
<div id="top">
	<div id="form">
		<div class="row">
		    <form action="<?php echo U('login/checklogin');?>" method="post" class="col s12">
		        <div class="row">
			        <div class="input-field col s6" id="logininput">
						<i class="material-icons" id="loginicons">person</i>
						<input id="icon_prefix" type="text" class="validate" name="username">
						<label for="icon_prefix">用户名</label>
			        </div>
			        <div class="input-field col s6" id="logininput">
						<i class="material-icons" id="loginicons">lock</i>
						<input name="password" id="password" type="password" class="validate">
						<label for="icon_telephone">密码</label>
			        </div>
			        <div id="inputcheckbox">
			        	<p>
						    <input name="setcookie" type="checkbox" id="test5" />
						    <label for="test5">一周内自动登录</label>
						</p>
			        </div>
			        <div class="waves-effect waves-circle" id="submit">
			        	<span id="submitspan">登录</span>
			        	<i class="material-icons" id="submiticon">send</i>
			        	<input type="submit" value=" " id="inputsubmit">
			        </div>
		     	</div>
		    </form>
		 </div>
	</div>
</div>

</body>
</html>