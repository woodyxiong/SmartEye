<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller{
	public function data(){
		needNotlogin();
		
		$data=M("data")->where("instrumentid=1")->select();
		$this->assign('data',$data);
		$this->display();
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