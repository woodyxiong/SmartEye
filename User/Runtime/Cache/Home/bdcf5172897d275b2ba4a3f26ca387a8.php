<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>数据详情页面</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- data.css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/data.css">
    <!-- index.css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/user.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>
    <!-- 引入 user.js -->
    <script type="text/javascript" src="/Public/js/user.js"></script>

    <!-- inport echarts.js -->
    <script type="text/javascript" src="/Public/js/charts/echarts.min.js"></script>
    <script src="/Public/js/charts/macarons.js"></script>
    <script src="/Public/js/charts/infographic.js"></script>
    <script src="/Public/js/charts/shine.js"></script>

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

<section class="data">
    <div class="data-camera"><?php echo ($instrument['camera']); ?></div>
    <div class="data-tittle" instrumentid="<?php echo ($instrument['instrumentid']); ?>"><?php echo ($instrument['instrumentinfo']); ?></div>
    <div class="pickdata">
        <form id="dataform" name="dataform">
            <div class="pickdatacheck">
                <input name="checkday" type="checkbox" id="taifeng"/>
                <label for="taifeng">只查看某天</label>
            </div>
            <input name="date1" type="date" placeholder="选择开始日期" class="datepicker" id="mydata1">
            <div class="dataspan">-</div>
            <input name="date2" type="date" placeholder="选择结束日期" class="datepicker" id="mydata2">
            <a href="javascript:void(0)" class="waves-effect waves-light btn picksubmit" id="picksubmit">查询</a>
        </form>
    </div>
    <div class="data-box">
        <div class="data-content" id="data1"></div>
        <div class="data-bar">
            <div class="chipsbox chips-initial" id="chips"></div>
            <div class="toExcel">
                <div class="alldata">
                    <p>
                        <input checked name="group1" type="radio" id="alldata" />
                        <label for="alldata">生成整套数据</label>
                    </p>
                    <p>
                        <input name="group1" type="radio" id="singledata" />
                        <label for="singledata">只生成原始单个数据</label>
                    </p>
                </div>
                <div class="toline">
                    <p>
                        <input checked name="group2" type="radio" id="toline"/>
                        <label for="toline">生成折线图</label>
                    </p>
                    <p>
                        <input name="group2" type="radio" id="nottoline"/>
                        <label for="nottoline">不生成折线图</label>
                    </p>
                </div>
                <a class="btn waves-effect blue lighten-2" id="toExcelsubmit" href="javascript:void(0)">生成Excel表</a>
                <!-- <a class="btn waves-effect blue lighten-2" id="toExcelsubmit" href="<?php echo U('data/excel');?>">生成Excel表</a> -->
            </div>
            <div class="toUserindex">
                <div class="alldata">
                    <p>
                        <input checked name="group3" type="radio" id="alldata2" />
                        <label for="alldata2">生成整套数据</label>
                    </p>
                    <p>
                        <input name="group3" type="radio" id="singledata2" />
                        <label for="singledata2">只生成原始单个数据</label>
                    </p>
                    <div class="helpiconbox">
                        <i class="tooltipped material-icons helpicon prefix" data-position="bottom" data-delay="50" data-tooltip="生成图表到管理中心">help</i>
                    </div>
                </div>
                <a class="btn waves-effect blue darken-1" id="toUserindexsubmit" href="#">生成图表</a>
            </div>
        </div>
    </div>
</section>


<div id="selectDatamodal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4>添加数据</h4>
        <div class="input-field" id="selectCamera">
            <select class="selectcamera" name="selectcamera">
                <option value="" disabled selected>选择摄像头</option>
                <?php if(is_array($camera)): $i = 0; $__LIST__ = $camera;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$camera): $mod = ($i % 2 );++$i;?><option value="<?php echo ($camera["cameraid"]); ?>"><?php echo ($camera["cameraname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>];
            </select>
        </div>
        <div class="input-field" id="selectData">
            <select id="selectinstrument" name="selectinstrument">
                <option value="" disabled selected>选择数据</option>
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-light  blue lighten-2 btn" id="instrumentok">确定</a>
    </div>
</div>

<script>
    var datax=[<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'<?php echo ($vo["datatime"]); ?>',<?php endforeach; endif; else: echo "" ;endif; ?>];
    var datay=[<?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'<?php echo ($vo["data"]); ?>',<?php endforeach; endif; else: echo "" ;endif; ?>];
</script>


<!-- chart1 -->
<script type="text/javascript">

// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('data1'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['<?php echo ($instrument['instrumentinfo']); ?>'],
        textStyle:{
            fontFamily:'Open Sans,微軟正黑體,Microsoft Yahei,sans-serif',
            fontSize:17
        }
    },
    toolbox: {
        show : true,
        feature : {
            mark : {show: true},
            dataView : {show: true, readOnly: false},
            dataZoom : {show: true},
            dataView : {show: true},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
            restore : {show: true},
            saveAsImage : {show: true}
        }
    },
    dataZoom : {
        show : true,
        realtime : true,
        start : 20,
        end : 80
    },
    grid : {
        x:'5%',
        x2:'5%'
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data:datax
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            smooth:true,
            name:'<?php echo ($instrument['instrumentinfo']); ?>',
            type:'line',
            stack: '总量',
            itemStyle: {normal: {areaStyle: {type: 'default'},color:'#8190E6'}},
            data:datay
        },
        // {
        //     smooth:true,
        //     name:'asdfasdfasf',
        //     type:'line',
        //     stack: '总量',
        //     itemStyle: {normal: {areaStyle: {type: 'default'},color:'#8190E6'}},
        //     data:datay
        // }
    ]
};
myChart.setOption(option);
</script>
<!-- chart1 over -->

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

<script type="text/javascript" src="/Public/js/data.js"></script>
</body>
</html>