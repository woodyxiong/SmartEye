$(document).ready(function() {
/*******************bar**********************/
	$('.button-collapse').sideNav({
		menuWidth: 240, // Default is 240
		edge: 'left', // Choose the horizontal origin
	});
	// Hide sideNav
	//$('.button-collapse').sideNav('hide');
	$('#bartoggle').click(function() {
		$('.button-collapse').sideNav('show');
	});

	$('.slideb').click(function(){
		$('.button-collapse').sideNav('hide');
		setTimeout("$('#sidenav-overlay').fadeOut(500)",100);
		// $('#sidenav-overlay').hide();
	});

/*******************bar**********************/

	
});
/*******************iframe******************/
function changeheight(){
	var height=$('#iframe').contents().find("html").height();
	$('#iframe').height(height+20);
}
/*******************iframe******************/



    





