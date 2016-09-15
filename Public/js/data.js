$(document).ready(function(){
	/*各项配置初始化*/
	$('.preloader').fadeOut(800);
	$('.datepicker').pickadate({
	    selectMonths: true,
	    selectYears: 15
	});

	$('.chips-placeholder').material_chip({
	    placeholder: 'Enter a tag',
	    secondaryPlaceholder: '+Tag',
	  });

	/*各项配置初始化*/
	flashDatacheck();
});

/*右上角多选框*/
	//提交按钮
	$('#picksubmit').click(function() {
		$('#dataform').submit();
	});
	$('.pickdatacheck').click(function() {
		flashDatacheck();
	});

	// 多选框的处理
	function flashDatacheck(){
		$('.dataspan').stop(true);
		$('#mydata2').stop(true);
		if($("#taifeng").is(':checked')){
			$('#mydata1').attr('placeholder','选择日期');
			$('.dataspan').fadeOut('200');
			$('#mydata2').fadeOut('200');
		}else{
			$('#mydata1').attr('placeholder','选择开始日期');
			$('.dataspan').fadeIn('200');
			$('#mydata2').fadeIn('200');
		}
	}



/*右上角多选框*/












