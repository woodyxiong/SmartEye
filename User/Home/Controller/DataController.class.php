<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller{
	public function data(){
		needNotlogin();

		// 判断instrumentid
		$instrumentid=I('get.instrumentid/d');
		// $instrumentid=checkInstrument($instrumentid);

		// 如果没有get到instrumentid
		if($instrumentid==null){
			$camera=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();
			$cameraid=$camera[0]["cameraid"];
			$instrument=M('instrument')->where("cameraid='".$cameraid."'")->field('instrumentid')->select();
			$instrumentid=$instrument[0]["instrumentid"];
		}

		// 加载data
		$data=M('data')->where("instrumentid='".$instrumentid."'")->field('datatime,data')->order('datatime desc')->limit(30)->select();

		// 显示数据信息
		$instrument=M('instrument')->where("instrumentid='".$instrumentid."'")->field('instrumentinfo,cameraid,instrumentid')->find();
		$camera=M('camera')->where("cameraid='".$instrument['cameraid']."'")->field('cameraname')->find();
		$instrument['camera']=$camera['cameraname'];
		$camera=M('camera')->where("userid='".session('userid')."'")->field('cameraname,cameraid')->select();

		$username=session('username');
		$this->assign('username',$username);

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

	public function adddata(){
		needNotlogin();
		/**
		 * @param $instrumentid
		 */
		$instrumentid=$_POST['instrumentid'];
		$data=M('data')->field('data')->limit(30)->where("instrumentid='".$instrumentid."'")->select();
		$instrumentinfo=M('instrument')->field('instrumentinfo')->where("instrumentid='".$instrumentid."'")->find();
		$data['instrumentinfo']=$instrumentinfo;
		echo json_encode($data);
	}

	public function excel(){
		header('Content-type: text/html; charset=utf-8');
		vendor('phpexcel.PHPExcel');
		$instrumentid=$_POST['instrumentid'];
		$instrumentinfo=M('instrument')->field('instrumentinfo')->where("instrumentid='".$instrumentid."'")->find();;
		$instrumentinfo=$instrumentinfo['instrumentinfo'];
		$data=M('data')->field('datatime,data')->where("instrumentid='".$instrumentid."'")->select();
		$Excel = new \PHPExcel();
		    /**
		     * 		A    		B    			C
			 *	1 	数据名		数据产生时间    数据
			 *	2
		     */
			$excel=array(
					1=>array('A'=>'数据名','B'=>'数据产生时间','C'=>'数据')
				);
			$temp=array();
			// dump($data);
			foreach ($data as $a => $b) {
				$temp['A']=$instrumentinfo;
				foreach ($b as $c => $d) {
					if($c=='datatime'){
						$temp['B']=$d;
					}
					elseif ($c=='data') {
						$temp['C']=$d;
					}
				}
				array_push($excel, $temp);
			}

		    // 设置
		    $Excel
		        ->getProperties()
		        ->setCreator("WoodyXiong")
		        ->setLastModifiedBy("WoodyXiong")
		        ->setTitle("数据EXCEL导出")
		        ->setSubject("数据EXCEL导出")
		        ->setDescription("慧眼识别-EXCEL导出")
		        ->setKeywords("excel")
		        ->setCategory("2014sist");

		    foreach($excel as $key => $val) { // 注意 key 是从 0 还是 1 开始，此处是 0
		        // $num = $key + 1;
		        $Excel ->setActiveSheetIndex(0)
		             //Excel的第A列，uid是你查出数组的键值，下面以此类推
		              ->setCellValue('A'.$key, $val['A'])
		              ->setCellValue('B'.$key, $val['B'])
		              ->setCellValue('C'.$key, $val['C']);
		    }

		    $Excel->getActiveSheet()->setTitle('export');
		    $Excel->setActiveSheetIndex(0);
		    $name='慧眼识别-EXCEL导出.xlsx';

		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment; filename='.$name);
		    header('Cache-Control: max-age=0');

		    $ExcelWriter = \PHPExcel_IOFactory::createWriter($Excel, 'Excel2007');
		    $ExcelWriter->save('php://output');
		    exit;
	}
}
