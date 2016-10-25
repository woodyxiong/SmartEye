<?php
namespace Home\Controller;
use Think\Controller;
class StudyController extends Controller {
    public function study(){

        $username=session('username');
		$this->assign('username',$username);
        
    	$this->display();
    }

}
