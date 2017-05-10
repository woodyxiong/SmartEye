<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user=M('user')->where("username='clever'")->select();
        // dump(M('user')->where("username='clever'"));
        // $this->display();
        // echo "index";
    }
}
