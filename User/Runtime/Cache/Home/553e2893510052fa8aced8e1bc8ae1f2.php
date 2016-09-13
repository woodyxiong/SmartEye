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
    <!-- import baidumap.js -->
    <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=4BGoLtyp0GjSeSLuCuMIHiLb8uusudm7"></script>

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
        <form class="simpletext" action="<?php echo U('console/data');?>" method="post">
            <div class="row">
            <div class="formtittle">摄像机简单信息描述</div>
                <div class="inputbox">
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">person</i>
                        <input name="cameraname" id="cameraname" type="text" value="摄像机1" class="simpleinput validate active">
                        <label for="cameraname">摄像机名字</label>
                    </div>
                    <div class="clear"></div>
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">info</i>
                        <input name="camerainfo" id="camerainfo" class="simpleinput" type="text" class="validate active">
                        <label for="camerainfo">摄像头描述信息</label>
                    </div>
                    <div class="clear"></div>

                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">alarm</i>
                        <input name="freq" id="freq" type="text" class="simpleinput freqinput" class="validate active">
                        <label for="freq">一次运行等待时长</label>
                        <div class="selectbox">
                            <select>
                                <option value="1">秒</option>
                                <option value="2">分钟</option>
                                <option value="3">小时</option>
                            </select>
                        </div>
                        <i class="tooltipped material-icons helpicon prefix" data-position="right" data-delay="50" data-tooltip="设置每隔多长时间取图像点">help</i>
                    </div>
                    <div class="clear"></div>
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">location_on</i>
                        <input value="请在右侧地图选择地点" disabled id="location" type="text" class="simpleinput" class="validate active">
                        <label for="icon_telephone">GPS位置</label>
                        <i class="tooltipped material-icons helpicon prefix" data-position="right" data-delay="50" data-tooltip="设置摄像机GPS位置">help</i>
                    </div>
                </div>
                <div id="baidumap"></div>
            </div>
            <div class="buttonbox">
                <button class="btn waves-effect waves-light blue lighten-2 submit" type="submit" name="action">提交</button>
                <button id="form1reset" class="btn waves-effect waves-teal" type="reset" name="action">重置</button>
            </div>
        </form>
    </div>
</section>
<section class="showcamerabox">
    <div class="content2">
        <div class="showcamera">
            <div class="form2tittle">设置需要分析的数据</div>
            <div class="cameradata c1">
                <div class="cdtittle">甲醛含量</div>
                <div class="cdinfo">
                    位于厦门大学嘉庚学院北区测试甲醇的含量阿斯蒂芬
                </div>
                <div class="operate">
                    <div class="set"><i class="material-icons hovericon">settings</i></div>
                    <div class="delete"><i class="material-icons hovericon">delete</i></div>
                </div>
            </div>
            <div class="cameradata c2">
                <div class="cdtittle">二氧化氮含量</div>
                <div class="cdinfo">
                    位于厦门大学嘉庚学院北区测试甲醇的含量阿斯蒂芬
                </div>
                <div class="operate">
                    <div class="set"><i class="material-icons hovericon">settings</i></div>
                    <div class="delete"><i class="material-icons hovericon">delete</i></div>
                </div>
            </div>
            <div class="cameradata c3">
                <div class="cdtittle">二氧化碳含量</div>
                <div class="cdinfo">
                    位于厦门大学嘉庚学院北区测试甲醇的含量爱上
                </div>
                <div class="operate">
                    <div class="set"><i class="material-icons hovericon">settings</i></div>
                    <div class="delete"><i class="material-icons hovericon">delete</i></div>
                </div>
            </div>
            <div class="line"></div>
            <div class="cameradata c1">
                <div class="cdtittle">二氧化硫含量</div>
                <div class="cdinfo">
                    位于厦门大学嘉庚学院北区测试甲醇的含量算法
                </div>
                <div class="operate">
                    <div class="set"><i class="material-icons hovericon">settings</i></div>
                    <div class="delete"><i class="material-icons hovericon">delete</i></div>
                </div>
            </div>
            <div class="addcd c2">
                <i class="material-icons addicon" >add_circle_outline</i>
            </div>
        </div>
        <div class="line"></div>
    </div>
    










</section>






<!-- 打开关闭对话框 -->
<div id="deletedialog" class="modal">
    <div class="modal-content">
        <h5>是否确定删除数据</h5>
    </div>
    <div class="modal-footer">
        <div class="modal-footer-box">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">取消</a>
            <a href="#!" id="deleteSubmit" class=" waves-effect waves-green btn-flat">确定</a>
        </div>
    </div>
</div>







<script type="text/javascript" src="/Public/js/console.js"></script>
</body>
</html>