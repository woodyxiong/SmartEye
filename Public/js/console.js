$(document).ready(function(){
	$('.preloader').fadeOut(800);	
	$('select').material_select();

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




























