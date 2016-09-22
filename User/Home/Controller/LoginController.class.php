<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	$this->display();
    }
    public function checklogin(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
    	$setcookie=$_POST['setcookie'];
        sleep(3);
    	$user=M('user')->where("username='".$username."'")->find();
    	if(md5($password)==$user['password']){
    		if($setcookie=="on"){
    			cookie('username',$username,302400);
    		}
    		session('username',$username);
    		redirect(U('user/user'));
    	}else{
    		$this->error('密码输入错误','login/login',2);
    	}
    }

    public function excel(){
        // vendor("phpexcel.PHPExcel");
        $model = D('Common/UserInfo');
                $data = $model -> searchExport();
                $date = date("Y-m-d",time());
                $filename="用户信息表".$date;
                if($data){
                    $phpexcel = new \PHPExcel();
                    $phpexcel->getActiveSheet()->setTitle($filename);
                    $phpexcel->getActiveSheet()
                          ->setCellValue('A1','序号')
                          ->setCellValue('B1','手机号')
                          ->setCellValue('C1','昵称')
                          ->setCellValue('D1','来源')
                          ->setCellValue('E1','UID')
                          ->setCellValue('F1','微博昵称')
                          ->setCellValue('G1','微博UID')
                          ->setCellValue('H1','积分总数')
                          ->setCellValue('I1','用户等级');
                    $i =   2;
                    foreach ( $data as $k => $val ) {
                        $phpexcel->getActiveSheet() 
                                 ->setCellValue('A'.$i, $k+1)
                                 ->setCellValue('B'.$i, $val['tel'])
                                 ->setCellValue('C'.$i, $val['Nick'])
                                 ->setCellValue('D'.$i, $val['from'])
                                 ->setCellValue('E'.$i, $val['uid'])
                                 ->setCellValue('F'.$i, $val['blog'])  
                                 ->setCellValue('G'.$i, $val['blog_uid'])  
                                 ->setCellValue('H'.$i, $val['integral'])     
                                 ->setCellValue('I'.$i, $val['level']);
                        $i++;                
            
                    }
            
                    $obj      = new \PHPExcel_IOFactory();
                    $obj_Writer = $obj->createWriter($phpexcel,'Excel5');
                    //设置header
                    header("Content-Type: application/force-download"); 
                    header("Content-Type: application/octet-stream"); 
                    header("Content-Type: application/download"); 
                    header('Content-Disposition:inline;filename="'.$filename.'.xls"'); 
                    header("Content-Transfer-Encoding: binary"); 
                    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
                    header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
                    header("Pragma: no-cache"); 
                    $obj_Writer->save('php://output');//输出
                }else{
                    $this -> error('系统错误，请稍后重试~');
                }


    }

}