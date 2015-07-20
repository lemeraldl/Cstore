<?php

class adminSet extends Controller_Admin{
	
	
		protected function run ($args){
			
			$this->writeJS('alert("여기오는가")');
			$aaa = $this->Redis->set('sample1111','redis 데이터 저장테스트입니다111');
			//var_dump($aaa);
			$this->writeJS('alert("저장이 완료 되었습니다")');
		}
}