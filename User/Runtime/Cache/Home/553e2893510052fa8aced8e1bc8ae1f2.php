<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
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
    <link rel="stylesheet" type="text/css" href="/Public/css/nouislider.css">
    <!-- index.css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/user.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>

    <!-- 引入 user.js -->
    <script type="text/javascript" src="/Public/js/user.js"></script>

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
<!-- topbar begin -->
<nav class="bar">
    <span id="bartoggle">
        <i class="material-icons" id="barmenu" data-activates="slide-out">menu</i>
        <a id="none" href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </span>
    <div id="barinfo">
        SmartEye
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

<section id="camerabar">
    <div id="camerabarcontainer">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <?php if(is_array($cameras)): $i = 0; $__LIST__ = $cameras;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cs): $mod = ($i % 2 );++$i;?><li class="tab col s3 cameratab ci<?php echo ($cs["cameraid"]); ?>" id="cameratab" link="<?php echo U('console/console',array('cameraid'=>$cs['cameraid']));?>"><a href="<?php echo U('console/console',array('cameraid'=>$cs['cameraid']));?>"><?php echo ($cs["cameraname"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="form1">
    <div class="content">
        <div class="tittle">设置参数</div>
        <div class="camera-tittle" pathname="<?php echo ($camera["filename"]); ?>" cameraid="<?php echo ($camera["cameraid"]); ?>"><?php echo ($camera["cameraname"]); ?></div>
        <div class="clear"></div>
        <form class="simpletext" action="<?php echo U('console/cameraform');?>" method="post">
            <div class="row">
            <div class="formtittle">摄像机简单信息描述</div>
                <div class="inputbox">
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">person</i>
                        <input name="cameraname" id="cameraname" type="text" value="<?php echo ($camera["cameraname"]); ?>" class="simpleinput validate active">
                        <label for="cameraname">摄像机名字</label>
                    </div>
                    <div class="clear"></div>
                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">info</i>
                        <input name="camerainfo" id="camerainfo" value="<?php echo ($camera["camerainfo"]); ?>" class="simpleinput" type="text" class="validate active">
                        <label for="camerainfo">摄像头描述信息</label>
                    </div>
                    <div class="clear"></div>

                    <div class="input-field col">
                        <i class="material-icons prefix inputicon">alarm</i>
                        <input name="freq" id="freq" type="text" value="<?php echo ($camera["freq"]); ?>" class="simpleinput freqinput" class="validate active">
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
                        <input disabled id="location" type="text" class="simpleinput" class="validate active">
                        <label for="icon_telephone">GPS位置</label>
                        <i class="tooltipped material-icons helpicon prefix" data-position="right" data-delay="50" data-tooltip="显示摄像机GPS位置">help</i>
                    </div>
                    <!-- 隐藏的cameraid -->
                    <input style="display:none" type="text" name="cameraid" value="<?php echo ($camera["cameraid"]); ?>">
                </div>
                <div id="baidumap"></div>
            </div>
            <div class="buttonbox">
                <button id="form1submit" class="btn waves-effect waves-light blue lighten-2 submit" type="submit">提交</button>
                <button id="form1reset" class="btn waves-effect waves-teal" type="reset" name="action">重置</button>
            </div>
        </form>
    </div>
</section>
<section class="showcamerabox">
    <div class="content2">
        <div class="showcamera">
            <div class="form2tittle">设置需要分析的数据</div>
            <?php if(is_array($instruments)): $i = 0; $__LIST__ = $instruments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ins): $mod = ($i % 3 );++$i; if(($mod) == "0"): ?><div class="cameradata c1">
                    <div class="cdtittle"><?php echo ($ins["instrumentinfo0"]); ?></div>
                    <div class="cdinfo">
                        <?php echo ($ins["instrumentlonginfo0"]); ?>
                    </div>
                    <div class="operate">
                        <div class="set" instrumentid="<?php echo ($ins["instrumentid0"]); ?>"><i class="material-icons hovericon">settings</i></div>
                        <div class="delete"><i class="material-icons hovericon">delete</i></div>
                    </div>
                </div>
                <div class="cameradata c2">
                    <div class="cdtittle"><?php echo ($ins["instrumentinfo1"]); ?></div>
                    <div class="cdinfo">
                        <?php echo ($ins["instrumentlonginfo1"]); ?>
                    </div>
                    <div class="operate">
                        <div class="set" instrumentid="<?php echo ($ins["instrumentid1"]); ?>"><i class="material-icons hovericon">settings</i></div>
                        <div class="delete"><i class="material-icons hovericon">delete</i></div>
                    </div>
                </div>
                <div class="cameradata c3">
                    <div class="cdtittle"><?php echo ($ins["instrumentinfo2"]); ?></div>
                    <div class="cdinfo">
                        <?php echo ($ins["instrumentlonginfo2"]); ?>
                    </div>
                    <div class="operate">
                        <div class="set" instrumentid="<?php echo ($ins["instrumentid2"]); ?>"><i class="material-icons hovericon">settings</i></div>
                        <div class="delete"><i class="material-icons hovericon">delete</i></div>
                    </div>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <!-- <div class="line"$></div> -->
            <div class="addcd c2">
                <i class="material-icons addicon" >add_circle_outline</i>
            </div>
        </div>
        <div class="line"></div>
    </div>
</section>






<!-- 数据删除对话框 -->
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

<!-- 更改/添加数据对话框 -->
<div class="modal" id="set">
    <div class="modalbody">
        <div class="mdtitle">截图</div>
        <div class="imagebox">
            <img class="myimg" draggable="false" class="z-depth-1 realimg" src="/Public/camera1/<?php echo ($camera["filename"]); ?>.bmp">
            <div class="cutborder"></div>
        </div>
        <div class="mdnav">
            <div class="step nowstep">数据名称</div>
            <div class="step">截图</div>
            <div class="step">灰度</div>
            <div class="step">二值</div>
            <div class="pre">
                <div class="preloader-wrapper small mysmall active">
                    <div class="spinner-layer spinner-green-only">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="gap-patch">
                            <div class="circle">
                            </div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="realset">
            <div class="stepbox">
                <div class="step1">
                    <!-- 设置名称什么的 -->
                    <div class="step1box">
                        <div class="row">
                            <div class="input-field col s10">
                                <input id="last_name" type="text">
                                <label for="last_name">数据名称</label>
                            </div>
                        </div>
                        <div class="numberradio">
                            <input name="typeface" type="radio" value="0" checked="checked" id="normalnum" />
                            <label for="normalnum">普通数字</label>
                            <input name="typeface" type="radio" value="1" id="sevennum" />
                            <label for="sevennum">七段式数字</label>
                        </div>
                        <div class="numimgbox">
                            <img class="normalimg" src="/Public/img/num/normalnumchecked.png">
                            <img class="sevenimg" src="/Public/img/num/sevennum.png">
                        </div>
                    </div>
                </div>
                <div class="step2">
                    <div class="cutbox z-depth-1 waves-effect waves-light">
                        <i class="material-icons">content_cut</i>
                    </div>
                    <div class="cutboxinfo bluez-depth-1">
                        <br><br>
                        点击上方截图按钮之后请在左侧截取需要解析的数字
                    </div>
                </div>
                <div class="step3">
                    <div class="step3box">
                        <p class="rgbradio">
                            <input name="rgb" class="rgb" value="0" type="radio" id="rgb1" />
                            <label for="rgb1">平均值</label>
                        </p>
                        <p class="rgbradio">
                            <input name="rgb" class="rgb" value="1" type="radio" id="rgb2" />
                            <label for="rgb2">国际标准</label>
                        </p>
                        <p class="rgbradio">
                            <input name="rgb" class="rgb" value="2" type="radio" id="rgb3" />
                            <label for="rgb3">自定义</label>
                        </p>
                        <!-- 滑块 -->
                        <div class="rgbbox">
                            <label for="rgbr">红色比例</label>
                            <p class="range-field myrgb" id="rgbr"></p>
                        </div>
                        <div class="rgbbox">
                            <label for="rgbr">绿色比例</label>
                            <p class="range-field myrgb" id="rgbg"></p>
                        </div>
                        <div class="rgbbox">
                            <label for="rgbb">蓝色比例</label>
                            <p class="range-field myrgb" id="rgbb"></p>
                        </div>
                    </div>
                </div>
                <div class="step4">
                    <div class="step4box">
                        <p class="rgbradio">
                            <input name="totwo" type="radio" value="0" id="totwo1" checked="checked" />
                            <label for="totwo1">迭代</label>
                        </p>
                        <p class="rgbradio oneparam">
                            <input name="totwo" type="radio" value="1" id="totwo2"/>
                            <label for="totwo2">自定义(1参数)</label>
                        </p>
                        <p class="rgbradio">
                            <input name="totwo" type="radio" value="2" id="totwo3" />
                            <label for="totwo3">自定义</label>
                        </p>
                        <!-- 去噪滑块 -->
                        <div class="denoisingbox">
                            <label for="denoising">去噪程度</label>
                            <p class="range-field myrgb"></p>
                            <p class="range-field" id="denoisingslider"></p>
                        </div>
                        <!-- 滑块1 -->
                        <div class="totwobox totwobox1">
                            <label for="totwoslider1">自定义(1参数)</label>
                            <p class="range-field myrgb"></p>
                            <p class="range-field" id="totwoslider1"></p>
                        </div>
                        <!-- 滑块2 -->
                        <div class="totwobox totwobox2">
                            <label for="totwoslider2">自定义(2参数)</label>
                            <p class="range-field myrgb"></p>
                            <p class="range-field" id="totwoslider2"></p>
                        </div>
                        <div class="realresult">
                            <span>识别结果为&nbsp;&nbsp;</span>
                            <span class="result"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="stepcarousel">
            <a class="waves-effect waves-light btn grey lighten-3 cancel">取消</a>
            <a class="disabled waves-effect waves-light btn blue lighten-2" id="last">上一步</a>
            <a class="waves-effect waves-light btn blue darken-2" id="next">下一步</a>
        </div>
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

</html>
<script type="text/javascript">
	// 百度地图API功能
	var map = new BMap.Map("baidumap");    // 创建Map实例
	map.centerAndZoom(new BMap.Point(<?php echo ($camera["latitude"]); ?>,<?php echo ($camera["longitude"]); ?>), 11);  // 初始化地图,设置中心点坐标和地图级别
	map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
	map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放

    // 加入中心点
    var point = new BMap.Point(<?php echo ($camera["latitude"]); ?>,<?php echo ($camera["longitude"]); ?>);
    var marker = new BMap.Marker(point);
	 map.addOverlay(marker);
</script>


<script src="/Public/js/nouislider.js"></script>
<script type="text/javascript" src="/Public/js/console.js"></script>
</body>
</html>