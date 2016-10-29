<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>智能学习</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- index.css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/user.css">
    <!-- study.css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/study.css">


    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>
    <!-- 引入 user.js -->
    <script type="text/javascript" src="/Public/js/user.js"></script>

</head>
<body>
<section class="preloader">
    <div class="preloaderbox">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                    <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- topbar begin -->
<nav class="bar">
    <span id="bartoggle">
        <i class="material-icons" id="barmenu" data-activates="slide-out">menu</i>
        <a id="none" href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </span>
    <div id="barinfo">
        <img class="mylogo" src="/Public/img/index/logo.png" alt="logo" />&nbsp;&nbsp;SmartEye
    </div>
    <div id="topbar">
        <a href="<?php echo U('userindex/userindex');?>" class="waves-effect waves-light btn-large"><img src="/Public/img/manstudent.png" alt="">管理中心</a>
        <a href="<?php echo U('console/console');?>" class="waves-effect baricon"><i class="material-icons" id="topbarbuild">build</i></a>
        <a href="<?php echo U('study/study');?>" class="waves-effect baricon"><i class="material-icons" id="topbarmail">mail_outline</i></a>
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
                <a href="#!name"><span class="white-text name"><?php echo ($username); ?>同学</span></a>
            </div>
        </li>
        <li>
            <a href="<?php echo U('userindex/userindex');?>" class="waves-effect slideb"><i class="material-icons">account_circle</i>管理中心</a>
        </li>
        <li>
            <a href="<?php echo U('data/data');?>" class="waves-effect slideb"><i class="material-icons">apps</i>我的数据</a>
        </li>
        <li>
            <a href="<?php echo U('console/console');?>" class="waves-effect slideb"><i class="material-icons">build</i>设置参数</a>
        </li>
        <li>
            <a href="<?php echo U('camera/camera');?>" class="waves-effect slideb"><i class="material-icons">camera_alt</i>查看摄像头</a>
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

<section class="mainbody">
    <div class="content">
        <div class="tittle">智能学习</div>
        <div class="studybox">
            <div class="study">
                <div class="cameraname">TKK-N</div>
                <ul class="collapsible popout mycollapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header mych">
                            <i class="material-icons opened">drafts</i>
                            <span class="chspan opened">Winner<span class="mynew">14&nbsp;new</span></span>
                        </div>
                        <div class="collapsible-body">
                            <div class="cbcontent">
                                <div class="cbdiv">2016-23-27 23:54:56</div>
                                <a class="waves-effect waves-light blue lighten-2 btn disabled">填写</a>
                            </div>
                        </div>
                    </li>
                    <li id="new">
                        <div id="study" readed="<?php echo ($study["readed"]); ?>" class="collapsible-header">
                            <i class="material-icons didntopened">mail</i>
                            <span class="chspan didntopened">Winner<span class="mynew didntmynew">10&nbsp;new</span></span>
                        </div>
                        <div class="collapsible-body">
                            <div class="cbcontent" id="haha">
                                <div class="cbdiv">2013-23-25 23:54:56</div>
                                <button href="#modal1" class="waves-effect waves-light blue lighten-2 modal-trigger btn">填写</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Modal Structure -->
<div id="modal1" class="modal mymodal">
    <div class="modal-content">
        <h4 class="myh4">智能学习</h4>
        <p class="myp">请输入你看到的图像</p>
        <div class="studydiv"><img src="/Public/img/study.bmp" alt="" /></div>
        <div class="input-field myinput">
            <input id="studyinput" type="text" class="validate">
            <label for="studyinput">请输入数值</label>
        </div>
        <form action="/user.php/study/studyform" method="post">
            <input type="submit" class="" value="确定">
        </form>

        <!-- <input type="submit" class="modal-action modal-close waves-effect blue lighten-2 btn modalok" value="确定"> -->
    </div>
</div>

<section class="footer">
    <div class="footerbox">
        <div class="footer-left">Copyright © 2016 <a href="/index.php" target="_blank"> 慧眼 </a><span> All rights reserved</span></div>
        <div class="footer-right">
            <a href="/index.php" target="_blank">网站主页</a>
            <a href="mailto:a810354504@qq.com">联系我们</a>
            <a href="mailto:a810354504@qq.com">技术支持</a>
        </div>
    </div>
</section>

<script type="text/javascript" src="/Public/js/study.js"></script>
</body>
</html>