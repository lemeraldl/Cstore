<?php
class adminIndex2 extends Controller_Admin
{
    protected function run($args)
    {
        $this->assign('HelloUUU','Hello Worldzzz1111');

        $bView = $this->View();
	
	$this->importJS('default');
	$this->importCSS('default');
	
	if ($bView!==false) {
	    $this->setStatusCode('200');
	}
    }
}
