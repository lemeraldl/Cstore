<?php
class  adminGet extends Controller_Admin{
	
	protected function run($args){
		$this->writeJS('alert("여기오는가")');
		$sDate=$this->Redis->get('sample1111');
		$this->assign('s',$sDate);
		$bView=$this->view('get');
		
		if($bView !== false){
			$this->setStatusCode('200');
		}
		
		$this->writeJS('alert("여기오는가2")');
	}
}