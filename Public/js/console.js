var cameraid=$('.camera-tittle').attr('cameraid');

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




























