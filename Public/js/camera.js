$(document).ready(function(){
	$('.preloader').fadeOut(800);
	$('.modal-trigger').leanModal();
	
	
});

var diaStatus=false;
$('.status').hover(function() {
		$('.camera-on').fadeOut(100);
		setTimeout("$('.camera-hover').fadeIn(100);",100);
	}, function() {
		if(diaStatus==false){
			$('.camera-hover').fadeOut(100);
			setTimeout("$('.camera-on').fadeIn(100);",100);
		}
		
	}
);


/**********摄像机运行时长**********/
runTime();
function runTime(){
		var time = $('#time').attr('time');
		var oldTime=Date.parse(new Date(time));
		var newTime=Date.parse(new Date());
		var shijianchuo=(newTime-oldTime)/1000;
		var day=parseInt(shijianchuo/(86400));
		var hour=parseInt((shijianchuo%86400)/3600);
		var minute=parseInt(((shijianchuo%86400)%3600)/60);
		var second=(shijianchuo)-(day*3600*24+hour*3600+minute*60)
		var timeString="运行时长 :    "+day+"天"+hour+":"+minute+":"+second;
		//alert(timeString);
		$('#time').text(timeString);
	setTimeout("runTime()",1000);	
}
/**********摄像机运行时长**********/


$('.camera-hover').click(function() {
	diaStatus=true;
	//$('.camera-on').hide();
	$('#dialog').openModal();
});








