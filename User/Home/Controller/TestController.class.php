<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	public function test(){
		//current time
		$time=date('y-m-d h:m:s',time());
		$number=mt_rand(30,100);
		// $sql = "INSERT INTO data(instrumentid, datatime, data) VALUES ('1', '".$time."', '".$number."')";
		// $sql="INSERT INTO data(instrumentid, datatime, data) VALUES ('1', '16-09-04 10:09:00', '85')";
		// mysql_query($sql);
		$Model = new \Think\Model(); // 实例化一个model对象 没有对应任何数据表
		$Model->query("INSERT INTO data(`instrumentid`, `datatime`, `data`) VALUES ('1', '".$time."', '".$number."')");

		//echo $sql;
		// echo "成功执行";

	}
}