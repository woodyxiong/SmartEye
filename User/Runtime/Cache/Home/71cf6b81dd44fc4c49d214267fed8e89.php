<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
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
        <div class="camera dashboard1 waves-effect waves-light">
            <div class="cameratittle">嘉庚学院北区</div>
            <div class="dashboard" id="camera1"></div>
        </div>
        <div class="camera dashboard2 waves-effect waves-light">
            <div class="dashboard"></div>
        </div>
        <div class="camera dashboard3 waves-effect waves-light">
            <div class="dashboard"></div>
        </div>
        <div class="camera dashboard4 waves-effect waves-light">
            <div class="dashboard"></div>
        </div>
    </div>
    <div class="mapbox"></div>
</section>                         

    














<!-- chart1 -->
<script type="text/javascript">
// 基于准备好的dom，初始化echarts实例
var myChart = echarts.init(document.getElementById('data1'),'shine');
// 指定图表的配置项和数据
option = {
    tooltip : {
        trigger: 'axis'
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
            data:[120, 132, 101, 134, 90, 230, 210]
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
            data:[220, 182, 72, 424, 290, 330, 310]
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

<script type="text/javascript" src="/Public/js/userindex.js"></script>
</body>
</html>