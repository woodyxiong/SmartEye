<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        // echo "index";
        $username=$_POST['username'];
        // $username=$_GET['username'];

        echo $username;

        $index=M('camera')->field('cameraid,cameraname,gps')->where("userid='".$username."'")->select();
        $index['num']=count($index);
        echo json_encode($index);
        

    }
}