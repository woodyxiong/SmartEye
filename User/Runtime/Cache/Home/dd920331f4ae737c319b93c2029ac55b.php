<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>个人管理页面</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- index css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/user.css">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>
    <!-- 引入 all.js -->
    <script type="text/javascript" src="/Public/js/user.js"></script>
</head>
<body>
<!-- topbar begin -->
<nav class="bar">
    <span id="bartoggle">
        <i class="material-icons" id="barmenu">menu</i>
    </span>
    <div id="barinfo">
        Skyeye
    </div>
    <div id="topbar">
        <a href="<?php echo U('userindex/userindex');?>" target="iframe" class="waves-effect waves-light btn-large"><img src="/Public/img/manstudent.png" alt="">个人主页</a>
        <a href="#"><i class="material-icons" id="topbarmail">build</i></a>
        <a href="#"><i class="material-icons" id="topbarmail">mail_outline</i></a>
        <a href="#"><i class="material-icons" id="topbarmail">fullscreen</i></a>
        <a href="#"><i class="material-icons" id="topbarmail">more_vert</i></a>
    </div>
</nav>
<!-- topbar over -->
<!-- sledebar begin -->
<nav class="slidebar">
    <ul id="slide-out" class="side-nav">
        <div id="slidebartittle">
            <span><img src="/Public/img/manstudent.png" alt=""></span>
            <span id="name">林启同学</span>
        </div>
        <li><a target="iframe" href="<?php echo U('userindex/userindex');?>" class="icona"><i class="material-icons" id="icon">account_circle</i>个人主页</a></li>
        <li><a target="iframe" href="<?php echo U('data/data');?>" class="icona"><i class="material-icons" id="icon">apps</i>我的数据</a></li>
        <li><a target="iframe" href="<?php echo U('console/console');?>" class="icona"><i class="material-icons" id="icon">build</i>设置参数</a></li>
        <li><a target="iframe" href="<?php echo U('camera/camera');?>" class="icona" href="camera.html" target="iframe"><i class="material-icons" id="icon">camera_alt</i>查看摄像头</a></li>
        <li><a class="icona" href="<?php echo U('user/quit');?>"><i class="material-icons" id="icon">exit_to_app</i>退出</a></li>

    </ul>
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
<!-- 右下角的button begin -->
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn-floating indigo lighten-1btn tooltipped"  data-position="left" data-delay="50" data-tooltip="帮助" href="help.html" target="iframe"><i class="material-icons">help</i></a></li>
        <li><a class="btn-floating red lighten-3 tooltipped" data-position="left" data-delay="50" data-tooltip="查看摄像头" href="camera.html" target="iframe"><i class="material-icons">camera_alt</i></a></li>
        <li><a class="btn-floating deep-orange lighten-1 tooltipped" data-position="left" data-delay="50" data-tooltip="查看数据" href="data.html" target="iframe"><i class="material-icons">insert_chart</i></a></li>
        <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="返回顶部" href="javascript:window.scrollTo(0,0);"><i class="material-icons">publish</i></a></li>
    </ul>
</div>
<!-- 右下角的button over -->

<!-- sledebar over -->
<iframe name="iframe" src="<?php echo U('userindex/userindex');?>"></iframe>

</body>
</html>