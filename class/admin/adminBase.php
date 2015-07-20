<?php
/*
 * 관리자페이지 기본 템플릿 (Controller_Admin 상속)
 */
abstract class adminBase extends Controller_Admin
{
    /*
     * default run method (자동호출)
     */
    protected function run($aArgs)
    { 
        $this->setData($aArgs);
        $this->initTemplate();
        $this->setView();
    }

    public function initTemplate()
    {
    	
        $this->externalCSS('http://img.echosting.cafe24.com/smartAdmin/css/module.css');
        $this->importCSS('default');
    }

    public function setData($aArgs)
    {
        
        $this->writeJS('alert("base가 먼저?")');
        $aData = $this->getAssignData($aArgs);
        $this->assign('aDataTpl', $aData);
    }

    public function setView()
    {
        $bView = $this->View();

        if ($bView!==false) {
            $this->setStatusCode('200');
        }
    }

}
