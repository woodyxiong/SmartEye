$(document).ready(function() {
/*******************bar**********************/
	// Initialize collapse button
	$(".button-collapse").sideNav();
	// Initialize collapsible (uncomment the line below if you use the dropdown variation)
	//$('.collapsible').collapsible();
	$('.button-collapse').sideNav({
		menuWidth: 280, // Default is 240
		edge: 'left', // Choose the horizontal origin
	}
	);
	// Hide sideNav
	//$('.button-collapse').sideNav('hide');
	$('#bartoggle').click(function() {
		$('.button-collapse').sideNav('show');
	});










/*******************bar**********************/
});