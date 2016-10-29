$(document).ready(function() {
	$('.preloader').fadeOut(800);
	$('.modal-trigger').leanModal();

	var readed=$('#study').attr("readed")
	if(readed=='1'){
		$('#study').html('<i class="material-icons opened">drafts</i><span class="chspan opened">Winner<span class="mynew">10&nbsp;new</span></span>');
		$('#haha').html('<div class="cbdiv">2016-23-27 23:54:56</div><a class="waves-effect waves-light blue lighten-2 btn disabled">填写</a>');
	}
});
