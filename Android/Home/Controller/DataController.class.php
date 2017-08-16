<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller {
    public function data(){
        $instrumentid=$_POST['instrumentid'];

        $data=M('data')->where("instrumentid='".$instrumentid."'")->field('datatime,data')->limit(20)->select();

        echo json_encode($data);

    }
}