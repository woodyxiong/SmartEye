<?php
namespace Home\Controller;
use Think\Controller;
class PiController extends Controller {
    public function adddata(){
        $data=$_GET['data'];
        if(is_null($data)){
            exit("data is null");
        }
        $message = array('instrumentid' => '1', );
        $message['data']=$data;
        $message['datatime']=date("Y-m-d H:m:s");
        M('data')->add($message);
        echo "success";
    }
}
