$(document).ready(function() {
	//响应式导航栏设置
	var navigation = responsiveNav("#nav", { // Selector: The ID of the wrapper
	  animate: true, // Boolean: 是否启动CSS过渡效果（transitions）， true 或 false
	  transition: 400, // Integer: 过渡效果的执行速度，以毫秒（millisecond）为单位
	  label: "Menu", // String: Label for the navigation toggle
	  insert: "after", // String: Insert the toggle before or after the navigation
	  customToggle: "", // Selector: Specify the ID of a custom toggle
	  openPos: "relative", // String: Position of the opened nav, relative or static
	  jsClass: "js", // String: 'JS enabled' class which is added to <html> el
	  debug: false, // Boolean: Log debug messages to console, true 或 false
	  init: function(){}, // Function: Init callback
	  open: function(){}, // Function: Open callback
	  close: function(){} // Function: Close callback
	});
	//响应式轮播设置
	function imgReload()
	{
		var imgHeight = 0;
		var wtmp = $("body").width();
		$("#b06 ul li").each(function(){
	        $(this).css({width:wtmp + "px"});
	    });
		$(".sliderimg").each(function(){
			$(this).css({width:wtmp + "px"});
			imgHeight = $(this).height();
		});
	}

	$(window).resize(function(){imgReload();});

	$(document).ready(function(e) {
		imgReload();
	    var unslider06 = $('#b06').unslider({
			dots: true,
			fluid: true
		}),
		data06 = unslider06.data('unslider');
		
		$('.unslider-arrow06').click(function() {
	        var fn = this.className.split(' ')[1];
	        data06[fn]();
	    });
	});
});
// 响应式导航栏初始化
var navigation = responsiveNav("#nav");
