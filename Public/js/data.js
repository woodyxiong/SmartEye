$(document).ready(function(){
/*各项配置初始化*/
	$('.preloader').fadeOut(800);
	// 日期初始化
	$('.datepicker').pickadate({
	    selectMonths: true,
	    selectYears: 15
	});

	// 下拉选择框初始化
	$('select').material_select();

	// 右上角多选按钮初始化
	flashDatacheck();

	// chips初始化
	flashChips();
	$('.chipscover').click(function() {
		$('#selectDatamodal').openModal();
	});
/*各项配置初始化*/
	
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

/*点击chips input事件*/
	// chips初始化
	function flashChips(){
		var dataName=$('.data-tittle').text();
		$('.chips-initial').material_chip({
			placeholder: '添加数据',
			secondaryPlaceholder: '添加数据'
		  });
		$('#chips').append('<div class="chipscover"></div>');
		$('#chips').find('input').attr('disabled','');
		$('#chips').find('input').attr('id','chipsinput');
		$('.input').before('<div class="chip">'+dataName
		+'</div>')
	}
	










/*点击chipbox事件*/