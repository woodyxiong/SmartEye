$(document).ready(function() {
	$('#username').bind('input propertychange', function() {
		var username=$(this).val();
	    var reg=/[\da-zA-Z]{3,}/;
	    var output=username.match(reg);
	    if(username==output){
	    	$(this).removeClass('invalid');
	    }else{
	    	$(this).addClass('invalid');
	    }
	});
});
function check(){
	if ($('#username').attr('class')=='invalid') {
		return false;
	}
	return true;
}