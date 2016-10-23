var cameraid=$('.camera-tittle').attr('cameraid');
var index=1;
var cut=false;
$(document).ready(function(){
	$('.preloader').fadeOut(800);	
	$('select').material_select();

	var classCi='ci'+cameraid;
	$('.tab').children('a').removeClass('active');
	$('.'+classCi).children('a').addClass('active');
	$('ul.tabs').tabs();

	// 打开页面的时候直接打开modal
	// 调试阶段
	$('#set').openModal({dismissible: false});
	// index=1;
	// $('.stepbox').css('margin-left', '-780px');
	flashStep();

	
	// 调试阶段

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
	$('#set').openModal({
		dismissible: false
	});
});

$('.cancel').click(function() {
	$('#set').closeModal();
});

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
		$('.stepbox').animate({'margin-left':'-520px'});
		index++;
		flashStep();
	}
	else if(index==3){
		$('.stepbox').animate({'margin-left':'-780px'});
		index++;
		flashStep();
	}
	else if(index==4){
		// 提交数据库
		flashStep();
		// index=1;
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
	if(index==1){
		$('.mdtitle').text('数据名称');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(0).addClass('nowstep');
	}
	else if(index==2){
		$('.mdtitle').text('截图');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(1).addClass('nowstep');
	}
	else if(index==3){
		$('.mdtitle').text('灰度');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(2).addClass('nowstep');
	}
	else if(index==4){
		$('.mdtitle').text('二值');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(3).addClass('nowstep');
	}
}

/**************设置数据名称**************/
function flashNumimg(){
	var typeface;
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
	img['border']=($('.imagebox').width()-$('.realimg').width())/2;
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


/**************设置rgb**************/

/**************设置二值**************/
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
/**************设置二值**************/

