// ready function
$(document).ready(function(){
	$('.preloader').fadeOut(800);
	toggle();
	
});
// status(on,off) 摄像头的工作状态
var status=$('#camera1-status').attr('status');
var cameraid=$('#camera1-status').attr('cameraid');
var specialStr=$('h5').html();
/**********刷新页面整体摄像头开关**********/

function toggle(){
	status=$('#camera1-status').attr('status');
	$('.camera-hover').fadeOut(200);
	if(status=='on'){
		$('.camera-on').show();
		$('.uptime-on').show();
		$('.camera-off').hide();
		$('.uptime-off').hide();
	}else if(status=='off'){
		$('.camera-on').hide();
		$('.uptime-on').hide();
		$('.camera-off').show();
		$('.uptime-off').show();
	}else{
		// alert('获取参数错误');
	}
	runTime();
}
/**********刷新页面整体摄像头开关**********/



/**********控制开关按钮**********/
var diaStatus=false;
$('.status').hover(function() {
		$('.camera-on').fadeOut(100);
		$('.camera-off').fadeOut(100);
		setTimeout("$('.camera-hover').fadeIn(100);",100);
	}, function() {
		if(diaStatus==false){
			$('.camera-hover').fadeOut(100);
			if(status=='on'){
				setTimeout("$('.camera-on').fadeIn(100);",100);
			}else if(status='off'){
				setTimeout("$('.camera-off').fadeIn(100);",100);
			}else{
				alert('参数错误');
			}
		}
	}
);
/**********控制开关按钮**********/
/**********摄像机运行时长**********/
function runTime(){
	var str;
	if(status=='on'){
		str="运行时长:   ";
	}else if(status=='off'){
		str="等待运行时长:   ";
	}else{
		// alert('参数错误');
	}
	var time = $('#camera1-status').attr('time');
	var oldTime=Date.parse(new Date(time));
	var newTime=Date.parse(new Date());
	var shijianchuo=(newTime-oldTime)/1000;
	var day=parseInt(shijianchuo/(86400));
	var hour=parseInt((shijianchuo%86400)/3600);
	var minute=parseInt(((shijianchuo%86400)%3600)/60);
	var second=(shijianchuo)-(day*3600*24+hour*3600+minute*60)
	var timeString=str+day+"天"+hour+":"+minute+":"+second;
	// alert(timeString);
	// $('.showtime').text(timeString);
	$('.showtime').each(function() {
		$(this).text(timeString);
	});
	setTimeout("runTime()",1000);	
}
/**********摄像机运行时长**********/

/**********控制打开关闭对话框**********/
$('.camera-hover').click(function() {
	diaStatus=true;
	$('h5').html(specialStr);
	if(status=='on'){
		$('.modal-content-span').text('关闭');
	}else if(status=='off'){
		$('.modal-content-span').text('打开');
	}
	$('#dialog').openModal(
		{
		    dismissible: true, // 点击模态框外部则关闭模态框
		    opacity: .5, // 背景透明度
		    in_duration: 300, // 切入时间
		    out_duration: 200, // 切出时间
		    //ready: function() { }, // 当模态框打开时执行的函数
		    complete: function() { toggle();diaStatus=false; } // 当模态框关闭时执行的函数
		}
	);
});
/**********控制打开关闭对话框**********/
/**********控制对话框的确定开关按钮**********/
$('#toggleSubmit').click(function() {
	var operate;
	if(status=='on'){
		operate='off';
	}else{
		operate='on';
	}
	$('h5').text('让数据飞一会儿');
	$.post(
		"/user.php/camera/toggle", 
		{
			cameraid:cameraid,
			nowstatus:status,
			operate:operate
		}, 
		function(data, textStatus, xhr) {
			if(!data==''){
				// 解析收到的json
				var Input = eval ("(" + data + ")");
				$('#camera1-status').attr('status', Input.nowstatus);
				$('#camera1-status').attr('time', Input.datetime);
				$('h5').text('操作成功');
				setTimeout("$('#dialog').closeModal();",200);
				toggle();
				// setTimeout("$('h5').html(specialStr)",300);
				
			}

	});
});





/**********控制对话框的确定开关按钮**********/