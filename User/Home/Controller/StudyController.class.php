<?php
namespace Home\Controller;
use Think\Controller;
class StudyController extends Controller {
    public function study(){
        $username=session('username');

        $study=M('study')->where("instrumentid=3")->field('readed')->find();

        // var_dump($study);
        $this->assign('study',$study);
		$this->assign('username',$username);
    	$this->display();
    }

    public function studyform(){
        $update['readed']=true;
        $instrumentid=3;
        M('study')->where("instrumentid='".$instrumentid."'")->data($update)->save();


        redirect(U('study/study'));

    }

}
