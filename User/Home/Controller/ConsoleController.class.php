<?php
namespace Home\Controller;
use Think\Controller;
class ConsoleController extends Controller{
	public function console(){
		needNotlogin();
		$this->display();
	}
}