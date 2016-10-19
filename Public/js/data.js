$(document).ready(function(){
/*各项配置初始化*/
	// 初始化一个对象，用来保存新加进来的data数据
	newData=new Object();
	newDataarray=new Array();
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

	/*添加数据内的显示instrument*/
	showinstrument();

	/*添加instrument的按钮*/
	addInstrument();
	
/*各项配置初始化*/
});

/*右上角多选框*/
	//提交按钮
	/**
	 * 日期按钮按下之后用ajax提交
	 * @param  checkday 单选框
	 * @param  date1 			第一个日期
	 * @param  date2 			第二个日期
	 * @param  instrumentid 	数据的id
	 */
	var receive=new Array();
	$('#picksubmit').click(function() {
		var checkday=$('#taifeng').val();
		var date1=$("input[name='date1']").val();
		var date2=$("input[name='date2']").val();
		var instrumentid=$('.data-tittle').attr('instrumentid');
		$('#picksubmit').html("查询中");
		$.post(
			"/user.php/data/date", 
			{
				checkday:checkday,
				date1:date1,
				date2:date2,
				instrumentid
			},
			/**
			 * 服务器接收并返回json
			 * @param  data    服务器返回的json格式
			 * @param  receive 解析完成的数组
			 * @return  
			 */
			function(data, textStatus, xhr) {
				if(!data==''){
					receive=eval("("+data+")");
					for (x in receive)
					{
						datax[x]=receive[x]['datatime'];
						datay[x]=receive[x]['data'];
					}
					console.log(datay);
					option.xAxis[0].data=datax;
					option.series[0].data=datay;
					myChart.setOption(option);
				}
			});
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

/*显示instrument*/
function showinstrument(){
	$("[name=selectcamera]").change(function(event) {
		var cameraid;
		var data;
		var instrumentselect;
		cameraid=$("[name=selectcamera]").val();
		$.post("/user.php/data/showinstrument", 
			{
				cameraid: cameraid
			}, 
			function(data, textStatus, xhr) {
			if(!data==''){
				data = eval ("(" + data + ")");
				$('#selectinstrument').html('<option value="" disabled selected>选择数据</option>');
				$.each(data, function(index, val) {
					instrumentselect='<option value="'+this.instrumentid+'">'+this.instrumentinfo+'</option>';
					$('#selectinstrument').append(instrumentselect);
					$('select').material_select();
				});
			}
		});
	});
}
/*显示instrument*/

/*添加instrument的按钮*/
var addInstrumentid;
var receivedata;
function addInstrument(){
	$('#instrumentok').click(function(event) {
		addInstrumentid=$("[name='selectinstrument']").val();
		$.post("/user.php/data/adddata", 
			{
				instrumentid:addInstrumentid
			}, 
			function(data, textStatus, xhr) {
			if(!data==''){
				receivedata=data;
				receivedata = eval ("(" + receivedata + ")");
				newData.smooth='true';
				newData.name=receivedata.instrumentinfo.instrumentinfo;
				newData.type='line';
				newData.stack='总量';
				newData.itemStyle={normal: {areaStyle: {type: 'default'}}};
				// 清空数组
				newDataarray=[];
				$('.input').before('<div class="chip">'+receivedata.instrumentinfo.instrumentinfo+'</div>');
				$.each(receivedata, function(index, val) {
					if(index!='instrumentinfo'){
						newDataarray.push(val.data);
					}
				});
				newData.data=newDataarray;
				option["series"].push(newData);
				myChart.setOption(option);
			}
		});
		
	})
}
/*添加instrument的按钮*/

/*生成excel按钮*/
$('#toExcelsubmit').click(function(event) {
    var form = $('<form></form>');
    // 设置属性
    form.attr('action', '/user.php/data/excel');
    form.attr('method', 'post');
    form.attr('target', '_self');
    // 创建Input
    var my_input = $('<input type="text" name="instrumentid" />');
    my_input.attr('value', $('.data-tittle').attr('instrumentid'));
    // 附加到Form
    form.append(my_input);
    // 提交表单
    form.submit();
    // 注意return false取消链接的默认动作
    return false;
});









/*生成excel按钮*/
