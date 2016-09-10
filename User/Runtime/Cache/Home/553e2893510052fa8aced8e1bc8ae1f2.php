<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>console</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- index css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/console.css">
    
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
<section id="camerabar">
    <div id="camerabarcontainer">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s3" id="cameratab"><a href="#camera1-status">摄像机1</a></li>
                    <li class="tab col s3" id="cameratab"><a href="#camera2">摄像机2</a></li>
                    <li class="tab col s3 disabled"><a href="#camera3">摄像机3</a></li>
                    <li class="tab col s3 disabled"><a href="#camera4">摄像机4</a></li>
                    <li class="tab col s3 disabled"><a href="#camera3">摄像机5</a></li>
                    <li class="tab col s3 disabled"><a href="#camera4">摄像机6</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="form1">
    <div class="content">
        <div class="tittle">设置参数</div>
        <div class="camera-tittle">摄像机1</div>
        <div class="clear"></div>
        <form class="simpletext" action="<?php echo U('data/data');?>" method="post">
            <div class="row">
            <div class="form1tittle">摄像机简单信息描述</div>
                <div class="inputbox">
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">person</i>
                        <input name="cameraname" id="cameraname" type="text" value="摄像机1" class="validate active">
                        <label for="cameraname">摄像机名字</label>
                    </div>
                    <div class="clear"></div>
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">info</i>
                        <input name="camerainfo" id="camerainfo" type="text" class="validate active">
                        <label for="camerainfo">摄像头描述信息</label>
                    </div>
                    <div class="clear"></div>
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">build</i>
                        <input id="icon_telephone" type="tel" class="validate active">
                        <label for="icon_telephone">Telephone</label>
                    </div>
                </div>
                
                <div class="baidumap"></div>
            </div>

        


        </form>
    </div>



</section>                               



<!-- 打开关闭对话框 -->
<div id="dialog" class="modal">
    <div class="modal-content">
        <h5>是否确定<span class="modal-content-span"></span>摄像头1</h5>
    </div>
    <div class="modal-footer">
        <div class="modal-footer-box">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
            <a href="#!" id="toggleSubmit" class=" waves-effect waves-green btn-flat">确定</a>
        </div>
    </div>
</div>







<script type="text/javascript" src="/Public/js/console.js"></script>
</body>
</html>