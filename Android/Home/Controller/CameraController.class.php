<?php
namespace Home\Controller;
use Think\Controller;
class CameraController extends Controller {
    public function camera(){
        $cameraid=$_POST['cameraid'];

        $camera=M('camera')->field('cameraname,status,time,camerainfo')->where("cameraid='".$cameraid."'")->find();

        $instrument=M('instrument')->field('instrumentid,instrumentinfo,unit')->where("cameraid='".$cameraid."'")->select();

        foreach ($instrument as $temp => $instrumentdata) {
        	$camera['instrument'][$temp]=$instrumentdata;
        	foreach ($instrumentdata as $instrumentdataname => $instrumentdatanamedata) {
        		if($instrumentdataname=='instrumentid'){
        			$data=M('data')->where("instrumentid='".$instrumentdatanamedata."'")->field('datatime,data')->limit(15)->select();
        			$camera['instrument'][$temp]['data']=$data;
        		}
        	}
        }
        echo json_encode($camera);

    }
}
