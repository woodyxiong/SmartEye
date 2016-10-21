<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>study</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- index css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/study.css">
    
    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>


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
                            <span class="chspan opened">instumentinfo<span class="mynew">12&nbsp;new</span></span>
                        </div>
                        <div class="collapsible-body">
                            <div class="cbcontent">
                                <div class="cbdiv">20133-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">20133-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">23-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">201-23 23:54:56</div>
                                <div class="cbdiv">20s3-23 23:54:56</div>
                                <a class="waves-effect waves-light blue lighten-2 btn disabled">填写</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header"><i class="material-icons didntopened">mail</i><span class="chspan didntopened">instumentinfo<span class="mynew didntmynew">12&nbsp;new</span></span></div>
                        <div class="collapsible-body">
                            <div class="cbcontent">
                                <div class="cbdiv">20133-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">20133-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">23-23 23:54:56</div>
                                <div class="cbdiv">2013-a3-23 23:54:56</div>
                                <div class="cbdiv">201-23 23:54:56</div>
                                <div class="cbdiv">20s3-23 23:54:56</div>
                                <a href="#modal1" class="waves-effect waves-light blue lighten-2 modal-trigger btn">填写</a>
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
        <div class="studydiv">数据</div>
        <div class="input-field myinput">
            <input id="studyinput" type="text" class="validate">
            <label for="studyinput">请输入数值</label>
        </div>
        <a href="#!" class="modal-action modal-close waves-effect blue lighten-2 btn modalok">确定</a>
    </div>
</div>


<script type="text/javascript" src="/Public/js/study.js"></script>
</body>
</html>