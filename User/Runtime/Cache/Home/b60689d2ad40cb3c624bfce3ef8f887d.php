<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>camera</title>
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
                    <li class="tab col s3" id="cameratab"><a href="#camera1">摄像机1</a></li>
                    <li class="tab col s3" id="cameratab"><a href="#camera2">摄像机2</a></li>
                    <li class="tab col s3 disabled"><a href="#camera3">摄像机3</a></li>
                    <li class="tab col s3 disabled"><a href="#camera4">摄像机4</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="camera-container">
    <div id="camera1">
        <div class="status waves-effect waves-light btn-large">
            <div class="infotittle">运行状态</div>
            <div class="info">正在运行中</div>
        </div>
        <div class="uptime waves-effect waves-light btn-large">
            <div class="infotittle">运行时间</div>
            <div class="info">352天&nbsp;&nbsp;&nbsp;&nbsp;15:15:15</div>
        </div>
        <div class="infomation waves-effect waves-light btn-large">
            <div class="infotittle">摄像机基本信息</div>
            <div class="info">位于克莱维家中</div>
        </div>
        <!-- 图表结构 -->
        <div class="chartbox">
            <div class="charttittle">甲醛含量</div>
            <div class="charts" id="chart1"></div>
        </div>
        <div class="chartbox chartbox2">
            <div class="charttittle">哈哈哈</div>
            <div class="charts" id="chart2"></div>
        </div>
        <div class="chartbox">
            <div class="charttittle">阿斯顿发</div>
            <div class="charts" id="chart3"></div>
        </div>
        <div class="chartbox chartbox2">
            <div class="charttittle">哈哈哈</div>
            <div class="charts" id="chart4"></div>
        </div>
        <!-- 图表结构 -->



    </div>
    <div id="camera2"></div>
    <div id="camera3"></div>
    <div id="camera4"></div>
</section>
<!-- chart1 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('chart1'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['甲醛含量']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'甲醛含量',
            type:'line',
            stack: '总量',
            itemStyle: {normal: {areaStyle: {type: 'default'},color:'#8190E6'}},
            data:[120, 132, 101, 134, 90, 230, 210]
        }
    ]
};
myChart.setOption(option);
</script>
<!-- chart1 over -->

<!-- chart2 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('chart2'));
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['甲醛含量']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'甲醛含量',
            type:'line',
            stack: '总量',
            itemStyle: {
                normal: {
                    areaStyle: {type: 'default'},
                    color:'#26c7db',
                }
            },
            data:[120, 132, 101, 134, 90, 230, 210]
        }
    ]
};
myChart.setOption(option);
</script>
<!-- chart2 over -->

<!-- chart3 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('chart3'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['甲醛含量']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'甲醛含量',
            type:'line',
            stack: '总量',
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:[120, 132, 101, 134, 90, 230, 210]
        }
    ]
};
myChart.setOption(option);
</script>
<!-- chart3 over -->

<!-- chart4 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('chart4'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
    },
    legend: {
        data:['甲醛含量']
    },
    calculable : true,
    xAxis : [
        {
            type : 'category',
            boundaryGap : false,
            data : ['周一','周二','周三','周四','周五','周六','周日']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
    series : [
        {
            name:'甲醛含量',
            type:'line',
            stack: '总量',
            itemStyle: {normal: {areaStyle: {type: 'default'}}},
            data:[120, 132, 101, 134, 90, 230, 210]
        }
    ]
};
myChart.setOption(option);
</script>
<!-- chart4 over -->

<script type="text/javascript" src="/Public/js/userindex.js"></script>
</body>
</html>