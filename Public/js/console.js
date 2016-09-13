$(document).ready(function(){
	$('.preloader').fadeOut(800);	
	$('select').material_select();

});




$('.cameradata').hover(function() {
	$(this).find('.operate').fadeIn('200');
}, function() {
	$(this).find('.operate').fadeOut('200');
});

$('.delete').click(function() {
	$('#deletedialog').openModal();
});






























