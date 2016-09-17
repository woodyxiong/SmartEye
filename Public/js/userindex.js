$(document).ready(function(){
	$('.preloader').fadeOut(800);
});
/**********ready function**********/
/**********设置安全级别的颜色**********/
	function stateColor(){
		$('.state').each(function() {
			var string=$(this).text();
			if(string=="高"||string=="极高"){
				$(this).parent().css('color', '#f00');
			}
		});
	}
	stateColor();
/**********设置安全级别的颜色**********/
/**********摄像机运行时长**********/
runTime();
function runTime(){
	$('.cameratime').each(function() {
		var time = $(this).attr('time');
		var oldTime=Date.parse(new Date(time));
		var newTime=Date.parse(new Date());
		var shijianchuo=(newTime-oldTime)/1000;
		var day=parseInt(shijianchuo/(86400));
		var hour=parseInt((shijianchuo%86400)/3600);
		var minute=parseInt(((shijianchuo%86400)%3600)/60);
		var second=(shijianchuo)-(day*3600*24+hour*3600+minute*60)
		var timeString="运行时长:  "+day+"天"+hour+":"+minute+":"+second;
		//alert(timeString);
		$(this).text(timeString);
	});
	setTimeout("runTime()",1000);	
}
/**********摄像机运行时长**********/

	