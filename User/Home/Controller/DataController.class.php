<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller{
	public function data(){
		needNotlogin();
		
		// 判断instrumentid
		$instrumentid=I('get.instrumentid/d');
		$instrumentid=checkInstrument($instrumentid);

		// 加载data
		$data=M('data')->where($condition)->field('datatime,data')->limit(30)->select();

		// 显示数据信息
		$instrument=M('instrument')->where("instrumentid='".$instrumentid."'")->field('instrumentinfo,cameraid,instrumentid')->find();
		$camera=M('camera')->where("cameraid='".$instrument['cameraid']."'")->field('cameraname')->find();
		$instrument['camera']=$camera['cameraname'];
		$camera=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();

		$this->assign('camera',$camera);
		$this->assign('instrument',$instrument);
		$this->assign('data',$data);
		// dump($camera);
		$this->display();
	}

	public function date(){
		// 接收day
		$receive['checkday']=I('post.checkday','');
		$receive['date1']=I('post.date1','');
		$receive['date2']=I('post.date2','');
		$receive['instrumentid']=I('post.instrumentid','');

		$condition['instrumentid']=$receive['instrumentid'];

		// 单日查询
		if($receive['checkday']=='on'){
			$splitdate=split('-',$receive['date1']);
			$mergedate=$splitdate[0].'-%'.$splitdate[1].'-%'.$splitdate[2];
			$condition['datatime']=array('LIKE',$mergedate);
		}
		// 多日查询
		if((!$receive['date1']==null)&&(!$receive['date2']==null)){
			$splitdate=split('-',$receive['date2']);
			$receive['date2']=$splitdate[0].'-'.$splitdate[1].'-'.($splitdate[2]+1);
			$condition['datatime']=array(array('EGT',$receive['date1']),array(array('ELT',$receive['date2'])));
		}
		$data=M('data')->where($condition)->field('datatime,data')->limit(30)->select();
		echo json_encode($data);
	}

	public function showinstrument(){
		needNotlogin();
		/**
		 * @param $cameraid
		 */
		$cameraid=$_POST['cameraid'];
		$instrument=M('instrument')->field('instrumentid,instrumentinfo')->where("cameraid='".$cameraid."'")->select();
		echo json_encode($instrument);
	}


	public function excel(){
		header('Content-type: text/html; charset=utf-8');
		vendor('phpexcel.PHPExcel');
		$Excel = new \PHPExcel();
		 
		    $arr = array ( 1 => array ( 'A' => '分公司名称', 'B' => '姓名', 'C' => '金额', ), 2 => array ( 'A' => 'A分公司', 'B' => '赵娟', 'C' => 1100, ), 3 => array ( 'A' => 'B分公司', 'B' => '孔坚', 'C' => 1100, ), 4 => array ( 'A' => 'C分公司', 'B' => '王华发', 'C' => 1300, ), 5 => array ( 'A' => 'C分公司', 'B' => '赵辉', 'C' => 700, ), 6 => array ( 'A' => 'B分公司', 'B' => '华发', 'C' => 1400, ), 7 => array ( 'A' => 'A分公司', 'B' => '赵德国', 'C' => 700, ), 8 => array ( 'A' => 'B分公司', 'B' => '沈芳虹', 'C' => 500, ), 9 => array ( 'A' => 'C分公司', 'B' => '周红玉', 'C' => 1100, ), 10 => array ( 'A' => 'A分公司', 'B' => '施芬芳', 'C' => 800, ), 11 => array ( 'A' => 'A分公司', 'B' => '蒋国建', 'C' => 1100, ), 12 => array ( 'A' => 'B分公司', 'B' => '钱毅', 'C' => 1400, ), 13 => array ( 'A' => 'B分公司', 'B' => '陈华惠', 'C' => 1200, ), 14 => array ( 'A' => 'C分公司', 'B' => '曹香', 'C' => 1400, ), 15 => array ( 'A' => 'A分公司', 'B' => '郑红妙', 'C' => 600, ), 16 => array ( 'A' => 'A分公司', 'B' => '王宏仁', 'C' => 800, ), 17 => array ( 'A' => 'C分公司', 'B' => '何丹美', 'C' => 1300, ), );
		 
		    // 设置
		    $Excel
		        ->getProperties()
		        ->setCreator("dee")
		        ->setLastModifiedBy("dee")
		        ->setTitle("数据EXCEL导出")
		        ->setSubject("数据EXCEL导出")
		        ->setDescription("数据EXCEL导出")
		        ->setKeywords("excel")
		        ->setCategory("result file");
		 
		    foreach($arr as $key => $val) { // 注意 key 是从 0 还是 1 开始，此处是 0
		        // $num = $key + 1;
		        $Excel ->setActiveSheetIndex(0)
		             //Excel的第A列，uid是你查出数组的键值，下面以此类推
		              ->setCellValue('A'.$key, $val['A'])    
		              ->setCellValue('B'.$key, $val['B'])
		              ->setCellValue('C'.$key, $val['C']);
		    }
		 
		    $Excel->getActiveSheet()->setTitle('export');
		    $Excel->setActiveSheetIndex(0);
		    $name='example_export.xlsx';
		 
		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment; filename='.$name);
		    header('Cache-Control: max-age=0');
		 
		    $ExcelWriter = \PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
		    $ExcelWriter->save('php://output');
		    exit;       
	}
}