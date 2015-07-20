<?php
/*
 * 슬라이드 등록 페이지
 * 앱아이디.app-sdk-003.cafe24.com/admin/sliderRegist 로 호출
 */
class adminSliderRegist extends adminBase
{
    public function initTemplate()
    {
    	$this->writeJS('alert("여기오는가2")');
        parent::initTemplate();
        $this->importJS('admin/productcategory', array());
        $this->importJS('admin/productsliders', array());
    }

    /**
     * assign 데이터 설정
     *
     * @param $args
     * @return array
     */
    public function getAssignData($args)
    {
        $oLibSlider = libSlider::getInstance();
        $aCategory  = $oLibSlider->getCategory($this->Openapi);
        
        $aAssignData = array(
            'aCategory' => $aCategory
        );
        
        $this->writeJS('alert("assigndata보내기전")');
        return $aAssignData;
    }
}
