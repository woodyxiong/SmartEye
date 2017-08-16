/**
 *  @param instrumentid 		数据id
 *  @param cameraid				摄像头id
 *  @param index 				设置页面显示的页数
 *  @param pathname				图片路径的名称
 *
 *  @param typeface				字体样式
 *
 *  @param x1 					坐标
 *  @param x2					坐标
 *  @param y1					坐标
 *  @param y2					坐标
 *  @param cut					是否正在截图状态
 *
 *  @param rgb					灰度的方法
 *  @param rgbrnum				红色比例
 *  @param rgbgnum				绿色比例
 *  @param rgbbnum				蓝色比例
 *
 *  @param totwo				二值化参数
 *  @param totwo1				阈值
 *  @param totwo2	array		两个阈值为数组
 *  @param totwo21				阈值1
 *  @param totwo22				阈值2
 *  @param denoising			去噪程度
 *
 */
var instrumentid;
var cameraid=$('.camera-tittle').attr('cameraid');
var index=1;

var typeface=$("input[name='typeface']:checked").val();

var cut=false;
var pathname=$('.camera-tittle').attr('pathname');
var rgb= $("input[name='rgb']:checked").val();

var totwo,totwo1,totwo2,totwo21,totwo22;

$(document).ready(function(){
	$('.preloader').fadeOut(800);
	$('select').material_select();

	var classCi='ci'+cameraid;
	$('.tab').children('a').removeClass('active');
	$('.'+classCi).children('a').addClass('active');
	$('ul.tabs').tabs();

});



/*各个数据是否需要修改或者删除*/
$('.cameradata').hover(function() {
	$(this).find('.operate').fadeIn('200');
}, function() {
	$(this).find('.operate').fadeOut('200');
});

$('.delete').click(function() {
	$('#deletedialog').openModal();
});
/*各个数据是否需要修改或者删除*/

/**********materiali tab控制演示跳转**********/
$('.cameratab').click(function(event) {
	var link=$(this).attr('link');
	setTimeout(function(){window.location=link},200)
});
/**********materiali tab控制演示跳转**********/


///////////////////////////
// 重头戏                //
// instument的可视化界面 //
///////////////////////////
$('.set').click(function() {
	instrumentid=$(this).attr('instrumentid');
	$('#set').openModal({
		dismissible: false
	});
	flashStep();
	$('.myimg').attr({src: '/Public/camera1/'+pathname+'.bmp'+'?a='+Math.random()});
	$('.stepbox').animate({'margin-left':'0px'});
});

$('.cancel').click(function() {
	myCloseModal();
});

function myCloseModal(){
	x1=null;
	x2=null;
	y1=null;
	y2=null;
	index=1;
	typeface="0";
	// radio全部不选中
	$("input[name='rgb']").attr("checked",true);
	instrument=null;
	$('#next').text("完成");
	$('#set').closeModal();																																																																																																																																																																																		$('input:radio[name="rgb"]').attr("checked",false);
}

// 下一页
$('#next').click(function() {
	$('.stepbox').stop(true,true);
	if(index==1){
		$('.stepbox').animate({'margin-left':'-260px'});
		index++;
		flashStep();
		$('#last').removeClass('disabled');
	}
	else if (index==2) {
		if(x1==null||x2==null||y1==null||y2==null){
			return false;
		}
		// 当按下截图的下一步之后
		$('.pre').css({visibility: 'visible'});
		$.post('/user.php/console/cut',
			{
				x1: x1,
				x2: x2,
				y1: y1,
				y2: y2,
				pathname: pathname
			},
			function(data,textStatus, xhr) {
				if(data!=null){
					$('.stepbox').animate({'margin-left':'-520px'});
					index++;
					$('.pre').css({visibility: 'hidden'});
					flashStep();

				}else{
					// 刷新
					alert(data);
					history.go(0);
				}
			});
	}
	else if(index==3){
		$('.stepbox').animate({'margin-left':'-780px'});
		index++;
		flashStep();
		postTotwo();
		// console.log("now")
	}
	else if(index==4){
		// 提交数据库
		$.post('/user.php/console/updateinstrument',
			{
				cameraid	:	cameraid,
				instrumentid:	instrumentid,
				typeface	:	typeface,
				x1			:	x1,
				x2			:	x2,
				y1			:	y1,
				y2			:	y2,
				rgb			:	rgb,
				rgbrnum		:	rgbrnum,
				rgbgnum		:	rgbgnum,
				rgbbnum		:	rgbbnum,
				denoising	:	denoising,
				totwo		:	totwo,
				totwo1		:	totwo1,
				totwo21		:	totwo21,
				totwo22		:	totwo22
			},
			function(data, textStatus, xhr) {
				myCloseModal();
				console.log("提交成功");
		});
	}
});

$('#last').click(function() {
	$('.stepbox').stop(true,true);
	if(index==1){
	}
	else if (index==2) {
		$('.stepbox').animate({'margin-left':'0'});
		index--;
		flashStep();
		$('#last').addClass('disabled');
	}
	else if(index==3){
		$('.stepbox').animate({'margin-left':'-260px'});
		index--;
		flashStep();
	}
	else if(index==4){
		$('.stepbox').animate({'margin-left':'-520px'});
		index--;
		flashStep();
	}
});



function flashStep() {
	notcut();
	$('#next').text("下一步");
	if(index==1){
		$('.mdtitle').text('数据名称');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(0).addClass('nowstep');
	}
	else if(index==2){
		$('.mdtitle').text('截图');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(1).addClass('nowstep');
		$('.myimg').attr({src: '/Public/camera1/'+pathname+'.bmp'+'?a='+Math.random()});
	}
	else if(index==3){
		$('.mdtitle').text('灰度');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(2).addClass('nowstep');
		$('.myimg').attr({src: '/Public/camera1/'+pathname+'_1.bmp'+'?a='+Math.random()});
	}
	else if(index==4){
		$('.mdtitle').text('二值');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(3).addClass('nowstep');
		$('.myimg').attr({src: '/Public/camera1/'+pathname+'_1_1_1.bmp'+'?a='+Math.random()});
		$('#next').text("完成");
	}
}

/**************设置数据名称**************/
function flashNumimg(){
	typeface=$("input[name='typeface']:checked").val();
	if(typeface=='0'){
		$('.numimgbox').html('<img class="normalimg" src="/Public/img/num/normalnumchecked.png"><img class="sevenimg" src="/Public/img/num/sevennum.png">');
	}else{
		$('.numimgbox').html('<img class="normalimg" src="/Public/img/num/normalnum.png"><img class="sevenimg" src="/Public/img/num/sevennumchecked.png">');
	}
}

$("input[name='typeface']").change(function(event) {
	flashNumimg();
});


/**************设置数据名称**************/


/**************截图**************/

$('.cutbox').click(function(event) {
	if(cut==false){
		$('.imagebox').css('cursor', 'crosshair');
		$('.cutboxinfo').html('<br><i class="material-icons mypen">border_color</i>');
		cut=true;
	}
});

// 初始化image内的数据
	var img=new Array();
	var x1,x2,y1,y2;
	var down=false;
$('.imagebox').mousedown(function(event) {
	if(cut==false)return false;
	down=true;
	img['border']=($('.imagebox').width()-$('.myimg').width())/2;
	console.log(img['border'])
	x1=event.offsetX;
	y1=event.offsetY;
	$('.cutborder').show();
});

$('.imagebox').mousemove(function(event) {
	if(down==false)return false;
	$('.cutboxinfo').html('<br><i class="material-icons mypen">open_with</i>');
	x2=event.offsetX;
	y2=event.offsetY;
	img['width']=x2-x1;
	img['height']=y2-y1;

	if(img['width']<0){
		img['width']=img['width']*(-1);
	}
	if(img['height']<0){
		img['height']=img['height']*(-1);
	}
	var tempx=x1;
	var tempy=y1;
	// tempx=Math.min(x1,x2);
	// tempy=Math.min(y1,y2);
	// console.log(x1,x2,y1,y2,tempx)
	console.log(tempx);
	$('.cutborder').css({
		width: img['width'],
		height: img['height'],
		left: tempx+img['border'],
		top:tempy
	});
});

$('.imagebox').mouseup(function(event) {
	if(down==false)return false;
	$('.cutboxinfo').html('<br><i class="material-icons mypen">done</i>');
	console.log(x1,x2,y1,y2);
	down=false;
});

function notcut(){
	$('.imagebox').css('cursor', 'default');
	$('.cutboxinfo').html('<br><br>点击上方截图按钮之后请在左侧截取需要解析的数字');
	$('.cutborder').css('display', 'none');
	cut=false;
}

/**************截图**************/
/**************设置rgb**************/
var rgbr = document.getElementById('rgbr');
	noUiSlider.create(rgbr, {
		start: .5,
		range: {
			'min': 0,
			'max': 1
		},
		format: wNumb({
			decimals: 0
		})
	});
	rgbr.setAttribute('disabled', true);
var rgbrnum=rgbr.noUiSlider.get();

var rgbg = document.getElementById('rgbg');
	noUiSlider.create(rgbg, {
		start: .5,
		range: {
			'min': 0,
			'max': 1
		},
		format: wNumb({
			decimals: 0
		})
	});
	rgbg.setAttribute('disabled', true);
var rgbgnum=rgbg.noUiSlider.get();

var rgbb = document.getElementById('rgbb');
	noUiSlider.create(rgbb, {
		start: .5,
		range: {
			'min': 0,
			'max': 1
		},
		format: wNumb({
			decimals: 0
		})
	});
	rgbb.setAttribute('disabled', true);
var rgbbnum=rgbb.noUiSlider.get();

// 只要数值变化则发送数据至服务器
function postRgb(){
	$('.pre').css({visibility: 'visible'});
	$.post('/user.php/console/gray',
		{
			 rgb:rgb,
			 rgbr:rgbrnum,
			 rgbg:rgbgnum,
			 rgbb:rgbbnum,
			 pathname: pathname
		},
		function(data, textStatus, xhr) {
			if(data!=null){
				console.log(data);
				$('.myimg').attr({src: '/Public/camera1/'+pathname+'_1_1.bmp'+'?a='+Math.random()});
				$('.pre').css({visibility: 'hidden'});
			}
		});
}
// 监听数值变化
// 监听radio
$("input[name='rgb']").change(function(event) {
	rgb=$(this).val();
	if(rgb=='2'){
		rgbr.removeAttribute('disabled');
		rgbg.removeAttribute('disabled');
		rgbb.removeAttribute('disabled');
	}
	else{
		rgbr.setAttribute('disabled', true);
		rgbg.setAttribute('disabled', true);
		rgbb.setAttribute('disabled', true);
	}
	postRgb();
});

// 监听滑块
rgbr.noUiSlider.on('update', function( values, handle ){
	rgbrnum=values[handle];
	postRgb();
});

rgbg.noUiSlider.on('update', function( values, handle ){
	rgbgnum=values[handle];
	postRgb();
});

rgbb.noUiSlider.on('update', function( values, handle ){
	rgbbnum=values[handle];
	postRgb();
});



/**************设置rgb**************/

/**************设置二值**************/
// 去噪
var denoisingslider= document.getElementById('denoisingslider');
	noUiSlider.create(denoisingslider, {
		start: 1,
		step:1,
		range: {
			'min': 1,
			'max': 5
		},
		format: wNumb({
			decimals: 0
		})
	});
	denoising=denoisingslider.noUiSlider.get();

// 1个参数
var totwoslider1 = document.getElementById('totwoslider1');
	noUiSlider.create(totwoslider1, {
		start: 175,
		step:1,
		range: {
			'min': 0,
			'max': 255
		},
		format: wNumb({
			decimals: 0
		})
	});
	totwoslider1.setAttribute('disabled', true);
	totwo1=totwoslider1.noUiSlider.get();
// 2个参数
var totwoslider2 = document.getElementById('totwoslider2');
	noUiSlider.create(totwoslider2, {
		start: [20, 80],
   		connect: true,
		step: 1,
		range: {
			'min': 0,
			'max': 255
		},
		format: wNumb({
			decimals: 1
   		})
  	});
	totwoslider2.setAttribute('disabled', true);
	totwo2=totwoslider2.noUiSlider.get();
	totwo21=totwo2[0];
	totwo22=totwo2[1];

function postTotwo(){
	$('.pre').css({visibility: 'visible'});
	$.post('/user.php/console/totwo',
	{
		typeface	:	typeface,
		totwo		:	totwo,
		totwo1		:	totwo1,
		totwo21		:	totwo21,
		totwo22		:	totwo22,
		denoising	:	denoising,
		pathname	: 	pathname
	},
	function(data, textStatus, xhr) {
		if(data!=null){
			$('.result').text(data);
			$('.myimg').attr({src: '/Public/camera1/'+pathname+'_1_1_1.bmp'+'?a='+Math.random()});
			$('.pre').css({visibility: 'hidden'});
		}
	});
}

totwo=$("input[name='totwo']").val();
$("input[name='totwo']").change(function(event) {
	totwo=$(this).val();
	postTotwo();
	console.log("changed")
	if(totwo=="0"){
		$('.totwobox2').hide();
		$('.totwobox1').hide();
	}
	else if (totwo=="1") {
		totwoslider2.setAttribute('disabled', true);
		totwoslider1.removeAttribute('disabled');
		$('.totwobox2').hide();
		$('.totwobox1').show();
	}
	else if (totwo=="2") {
		totwoslider1.setAttribute('disabled', true);
		totwoslider2.removeAttribute('disabled');
		$('.totwobox1').hide();
		$('.totwobox2').show();
	}
});

// 若滑块移动
denoisingslider.noUiSlider.on('update', function( values, handle ){
	denoising=values[handle];
	postTotwo();
});

totwoslider1.noUiSlider.on('update', function( values, handle ){
	totwo1=values[handle];
	postTotwo();
});

totwoslider2.noUiSlider.on('update', function( values, handle ){
	totwo21=values[0]
	totwo22=values[1]
	postTotwo();
});

/**************设置二值**************/
