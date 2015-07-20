<?php
class adminIndex extends adminBase
{


    public function initTemplate()
    {
        parent::initTemplate();
        $this->importJS('admin/index', array());
    }


    public function  getAssignData($args)
    {
        $aAssignData=array(
                'aList' => $this->Redis->hgetall('list')
        );
                //$this->writeJS('alert("들어오나?")');
        return $aAssignData;
    }

    /*  protected function run($args)
     {
    $this->assign('Hello','Hello World22333');

    $bView = $this->View();

    $this->importJS('default');
    $this->importCSS('default');

    if ($bView!==false) {
    $this->setStatusCode('200');
    }
    }  */
}
