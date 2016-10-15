<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller {
    public function camera(){
        // echo "camera";
        $cameraid=$_POST['cameraid'];

        $camera=M('camera')->field('cameraname,status,time')->where("cameraid='".$cameraid."'")->find();

        // var_dump($cemera);

        echo json_encode($camera);

    }
}