<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
        <i class="material-icons" id="barmenu" data-activates="slide-out">menu</i>
        <a id="none" href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </span>
    <div id="barinfo">
        SkyEye
    </div>
    <div id="topbar">
        <a href="<?php echo U('userindex/userindex');?>" target="iframe" class="waves-effect waves-light btn-large"><img src="/Public/img/manstudent.png" alt="">管理中心</a>
        <a href="<?php echo U('console/console');?>" target="iframe" class="waves-effect baricon"><i class="material-icons" id="topbarbuild">build</i></a>
        <a href="#" class="waves-effect baricon"><i class="material-icons" id="topbarmail">mail_outline</i></a>
        <a href="#" class="waves-effect baricon"><i class="material-icons" id="topbarmail">notifications</i></a>
        <a href="#" class="waves-effect baricon"><i class="material-icons" id="topbarmail">fullscreen</i></a>
        <a href="#" class="waves-effect baricon"><i class="material-icons" id="topbarmail">more_vert</i></a>
    </div>
</nav>
<!-- topbar over -->
<!-- sledebar begin -->
<nav class="slidebar">
    <ul id="slide-out" class="side-nav">
        <li>
            <div class="userView">
                <a href="#!user"><img class="circle" src="/Public/img/manstudent.png" alt=""></a>
                <a href="#!name"><span class="white-text name">林启同学</span></a>
            </div>
        </li>
        <li>
            <a target="iframe" href="<?php echo U('userindex/userindex');?>" class="waves-effect slideb"><i class="material-icons">account_circle</i>管理中心</a>
        </li>
        <li>
            <a target="iframe" href="<?php echo U('data/data');?>" class="waves-effect slideb"><i class="material-icons">apps</i>我的数据</a>
        </li>
        <li>
            <a target="iframe" href="<?php echo U('console/console');?>" class="waves-effect slideb"><i class="material-icons">build</i>设置参数</a>
        </li>
        <li>
            <a target="iframe" href="<?php echo U('camera/camera');?>" class="waves-effect slideb"><i class="material-icons">camera_alt</i>查看摄像头</a>
        </li>
        <li>
            <div class="divider"></div>
        </li>
        <li>
            <a class="subheader">用户操作</a>
        </li>
        <li>
            <a class="waves-effect" href="<?php echo U('user/quit');?>"><i class="material-icons">exit_to_app</i>退出</a>
        </li>
      </ul>
</nav>
<!-- 右下角的button begin -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="large material-icons">add</i>
    </a>
    <ul>
        <li><a class="btn-floating indigo lighten-1btn tooltipped"  data-position="left" data-delay="50" data-tooltip="帮助" href="<?php echo U('help/help');?>" target="iframe"><i class="material-icons">help</i></a></li>
        <li><a class="btn-floating red lighten-3 tooltipped" data-position="left" data-delay="50" data-tooltip="查看摄像头" href="<?php echo U('camera/camera');?>" target="iframe"><i class="material-icons">camera_alt</i></a></li>
        <li><a class="btn-floating deep-orange lighten-1 tooltipped" data-position="left" data-delay="50" data-tooltip="查看数据" href="<?php echo U('data/data');?>" target="iframe"><i class="material-icons">insert_chart</i></a></li>
        <li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="返回顶部" href="javascript:window.scrollTo(0,0);"><i class="material-icons">publish</i></a></li>
    </ul>
</div>
<!-- 右下角的button over -->

<!-- sledebar over -->
<iframe name="iframe"   target="_self" id="iframe" scrolling="no" onload="changeheight()" src="<?php echo U('userindex/userindex');?>"></iframe>

<section class="footer">
    <div class="footerbox">
        <div class="footer-left">Copyright © 2016 <a href="/index.php" target="_blank"> 智能天眼 </a><span> All rights reserved</span></div>
        <div class="footer-right">
            <a href="/index.php" target="_blank">网站主页</a>
            <a href="mailto:a810354504@qq.com">联系我们</a>
            <a href="mailto:a810354504@qq.com">技术支持</a>
        </div>
    </div>
</section>


</body>
</html>