<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>userindex</title>
    <!-- import css -->
    <link type="text/css" rel="stylesheet" href="/Public/css/materialize.min.css"  media="screen,projection"/>
    <!-- 全局css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/all.css">
    <!-- index css文件 -->
    <link rel="stylesheet" type="text/css" href="/Public/css/userindex.css">
    
    <!-- import js -->
    <script type="text/javascript" src="/Public/js/jquery.3.1.0.min.js"></script>
    <script type="text/javascript" src="/Public/js/materialize.min.js"></script>

    <!-- inport echarts.js -->
    <script type="text/javascript" src="/Public/js/charts/echarts.min.js"></script>
    <script src="/Public/js/charts/macarons.js"></script>
    <script src="/Public/js/charts/infographic.js"></script>
    <script src="/Public/js/charts/shine.js"></script>

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
<section class="content">
    <div class="tittle">我的仪表盘</div>
    <div class="chartcontainer">
        <div class="waves-effect waves-light waves-white chartbox">
            <div class="charttittle">
                <h5>多地甲醛浓度</h5>
                <h6>厦门大学嘉庚学院中南北区</h6>
            </div>
        <div class="chart" id="data1"></div>
        </div>
    </div>
    <div class="camerabox">
        <?php if(is_array($camera)): $i = 0; $__LIST__ = $camera;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cameralist): $mod = ($i % 4 );++$i; if(($mod) == "0"): ?><div class="camera dashboard1 waves-effect waves-light">
                    <div class="cameratittle" onclick="window.location='<?php echo U('camera/camera',array('cameraid'=>$cameralist['cameraid0']));?>'"><?php echo ($cameralist["cameraname0"]); ?></div>
                    <div class="dashboard" id="camera1"></div>
                    <div class="cameratime" time="2014-07-10 10:21:12"></div>
                </div>
                <div class="camera dashboard2 waves-effect waves-light">
                    <div class="cameratittle" onclick="window.location='<?php echo U('camera/camera',array('cameraid'=>$cameralist['cameraid1']));?>'"><?php echo ($cameralist["cameraname1"]); ?></div>
                    <div class="dashboard" id="camera2"></div>
                    <div class="cameratime" time="2014-07-13 10:21:12"></div>
                </div>
                <div class="camera dashboard3 waves-effect waves-light">
                    <div class="cameratittle" onclick="window.location='<?php echo U('camera/camera',array('cameraid'=>$cameralist['cameraid2']));?>'"><?php echo ($cameralist["cameraname2"]); ?></div>
                    <div class="dashboard" id="camera3"></div>
                    <div class="cameratime" time="2014-07-18 10:21:12"></div>
                </div>
                <div class="camera dashboard4 waves-effect waves-light">
                    <div class="cameratittle" onclick="window.location='<?php echo U('camera/camera',array('cameraid'=>$cameralist['cameraid3']));?>'"><?php echo ($cameralist["cameraname3"]); ?></div>
                    <div class="dashboard" id="camera4"></div>
                    <div class="cameratime" time="2014-07-19 10:21:12"></div>
                </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div class="mapbox" id="mapbox"></div>
    <div class="operationlog">
        <div class="logtittle">用户操作日志</div>
        <div class="logcontent">
            <table class="bordered striped">
                <thead>
                    <tr>
                        <th>时间</th>
                        <th>ip</th>
                        <th>内容</th>
                        <th>级别</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>修改密码</td>
                        <td class="state">极高</td>
                    </tr>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>修改摄像机核心参数</td>
                        <td class="state">高</td>
                    </tr>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>登陆</td>
                        <td class="state">低</td>
                    </tr>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>修改摄像头详情</td>
                        <td class="state">低</td>
                    </tr>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>修改密码</td>
                        <td class="state">极高</td>
                    </tr>
                    <tr>
                        <td>16-2-5 16:54:85</td>
                        <td>192.168.125.525</td>
                        <td>登陆</td>
                        <td class="state">低</td>
                    </tr>
                </tbody>
            </table>
            <div class="paginationbox">
                <ul class="pagination">
                    <li class="disabled"><a href="#!"><i class="material-icons">keyboard_arrow_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">keyboard_arrow_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

    





<!-- map begin -->
<script type="text/javascript">
    // 百度地图API功能
    var map = new BMap.Map("mapbox");    // 创建Map实例
    map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  // 初始化地图,设置中心点坐标和地图级别
    map.addControl(new BMap.MapTypeControl());   //添加地图类型控件
    map.setCurrentCity("北京");          // 设置地图显示的城市 此项是必须设置的
    map.enableScrollWheelZoom(true);     //开启鼠标滚轮缩放
</script>

<!-- map over -->








<!-- chart1 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('data1'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis',
        axisPointer:{'type':'none'}
    },
    calculable : true,
    grid:{
            x:0,
            x2:0,
            y:0,
            y2:0,
            borderWidth:0,
    },
    xAxis : [
        {
            show: false,
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            show:false,
            type : 'value'
        }
    ],
    series : [
        {
            name:'甲地浓度',
            type:'line',
            smooth:true,
            symbol:'none',
            itemStyle: {
                normal: {
                    areaStyle: {type: 'default',color:'#f0dd2f'},color: '#f0dd2f'
                }
            },
            data:[120, 132, 78, 145, 42, 71, 52]
        },
        {
            name:'乙地浓度',
            type:'line',
            symbol:'none',
            smooth:true,
            itemStyle: {normal: {
                    areaStyle: {type: 'default',color:'#e4e4e4'},color: '#e4e4e4'
                }
            },
            data:[220, 182, 72, 424, 290, 330, 41]
        },
        {
            name:'丙地浓度',
            type:'line',
            symbol:'none',
            smooth:true,
            itemStyle: {normal: {areaStyle: {type: 'default',color:'#9CB5EC'},color:'#9CB5EC'}},
            data:[350, 232, 201, 404, 390, 330, 410]
        }
    ]
};                   
myChart.setOption(option);
</script>
<!-- chart1 over -->
<!-- camera1 begin -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('camera1'),'shine');
option = {
    tooltip : {
        formatter: "{a} <br/>{c}%"
    },
    axis:{
        show:false
    },
    series : [
        {
            name:'识别比例',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 96, name: ''}],
            axisTick:{show:false},
            axisLabel:{show:false},
            splitLine:{show:false},
            pointer:{
                length : '50%',
                width : 7,
                color : 'auto'
            },
            axisLine:{
                lineStyle: {
                        color: [
                        [0.5, '#FF2F00'],
                        [0.8, '#F55A5F'],
                        [1, '#48b']
                    ],
                    width: 20
                }
            },
        },
    ]
};
myChart.setOption(option);
</script>
<!-- camera1 over -->
<!-- camera2 begin -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('camera2'),'shine');
option = {
    tooltip : {
        formatter: "{a} <br/>{c}%"
    },
    axis:{
        show:false
    },
    series : [
        {
            name:'识别比例',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 96, name: ''}],
            axisTick:{show:false},
            axisLabel:{show:false},
            splitLine:{show:false},
            pointer:{
                length : '50%',
                width : 7,
                color : 'auto'
            },
            axisLine:{
                lineStyle: {
                        color: [
                        [0.5, '#FF2F00'],
                        [0.8, '#F55A5F'],
                        [1, '#48b']
                    ],
                    width: 20
                }
            },
        },
    ]
};
myChart.setOption(option);
</script>
<!-- camera2 over -->
<!-- camera3 begin -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('camera3'),'shine');
option = {
    tooltip : {
        formatter: "{a} <br/>{c}%"
    },
    axis:{
        show:false
    },
    series : [
        {
            name:'识别比例',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 96, name: ''}],
            axisTick:{show:false},
            axisLabel:{show:false},
            splitLine:{show:false},
            pointer:{
                length : '50%',
                width : 7,
                color : 'auto'
            },
            axisLine:{
                lineStyle: {
                        color: [
                        [0.5, '#FF2F00'],
                        [0.8, '#F55A5F'],
                        [1, '#48b']
                    ],
                    width: 20
                }
            },
        },
    ]
};
myChart.setOption(option);
</script>
<!-- camera3 over -->
<!-- camera4 begin -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('camera4'),'shine');
option = {
    tooltip : {
        formatter: "{a} <br/>{c}%"
    },
    axis:{
        show:false
    },
    series : [
        {
            name:'识别比例',
            type:'gauge',
            detail : {formatter:'{value}%'},
            data:[{value: 96, name: ''}],
            axisTick:{show:false},
            axisLabel:{show:false},
            splitLine:{show:false},
            pointer:{
                length : '50%',
                width : 7,
                color : 'auto'
            },
            axisLine:{
                lineStyle: {
                        color: [
                        [0.5, '#FF2F00'],
                        [0.8, '#F55A5F'],
                        [1, '#48b']
                    ],
                    width: 20
                }
            },
        },
    ]
};
myChart.setOption(option);
</script>
<!-- camera4 over -->

<script type="text/javascript" src="/Public/js/userindex.js"></script>
</body>
</html>