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
	$('#set').openModal({dismissible: false});

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
	console.log(event);
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
	if(index==1){
		$('.mdtitle').text('截图');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(0).addClass('nowstep');
	}
	else if(index==2){
		$('.mdtitle').text('灰度');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(1).addClass('nowstep');
	}
	else if(index==3){
		$('.mdtitle').text('二值');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(2).addClass('nowstep');
	}
	else if(index==4){
		$('.mdtitle').text('数据名称');
		$('.mdnav').children().removeClass('nowstep');
		$('.step').eq(3).addClass('nowstep');
	}
}

/**************截图**************/

$('.cutbox').click(function(event) {
	if(cut==false){
		$('.imagebox').css('cursor', 'crosshair');
		$('.cutboxinfo').html('<br><i class="material-icons mypen">border_color</i>');
	}
});



// 初始化image内的数据
	var img=new Array();
	var x1,x2,y1,y2;
$('.imagebox').mousedown(function(event) {
	img['border']=($('.imagebox').width()-$('.realimg').width())/2;
	img['x']=event.
});


/**************截图**************/





















