<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        // dump($data);
        // dump($data->options);
        // dump($data);
        // dump($data->select());

        // $user->add();
        // dump($data);
        // dump($user);
        // dump(M('user')->where("username='clever'"));
        $this->display();
        // echo "index";
    }
}
