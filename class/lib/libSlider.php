<?php
/**
 * 라이브러리 클래스
 * 
 * 호출방식   >>   libSlider::매소드 
 *
 */
class libSlider
{ 

    /**
     * instance
     * @var object
     * @static
     */
    protected static $instance = false;


    /**
     * 싱글톤 instance 화
     *
     * @return libSlider|object
     * @static
     */
    public static function getInstance()
    {
        if (self::$instance === false) self::$instance = new self();
        return self::$instance;
    }

    public function getCategory($oOpenapi)
    {
        $aCatData = array();
        $aCatList = $oOpenapi->call('category','detail');
        if (count($aCatList) > 0 && $aCatList['meta']['code'] === 200) {
            $this->_getChild($aCatData, $aCatList['response']['result']);
        }
        return $aCatData;
    }

    private function _getChild(&$Data, $aCategory)
    {
        foreach($aCategory as $iKey => $aVal) {
            $childData = array();
            if (count($aVal['cat_childs']) > 0 && is_array($aVal['cat_childs'])) {
                $this->_getChild($childData, $aVal['cat_childs']);
            }
            $Data[$iKey] = array
            (
                'categoryNo'   => $aVal['cat_no'],
                'categoryName' => $aVal['cat_name'],
                'childData'    => $childData
            );
        }
    }

    public function getRedisData($oOpenapi, $aData, $sMallUrl='')
    {
        $aProductList  = array();
        $sSliderName   = $aData['sliderName'];
        $sSliderWidth  = $aData['sliderWidth'];
        $sSliderHeight = $aData['sliderHeight'];
        //$aOrderSlider  = $aData['orderSlider'];

        /* foreach($aOrderSlider as $iProductNo) {
            $aResult = $oOpenapi->call('product','detail',array('product_no'=>$iProductNo));
            $aProduct = $aResult['response']['result'];
            //prd_price
            if (count($aProduct) > 0 && is_array($aProduct)) {
                $aSetProduct['product_no']    = $aProduct[0]['prd_no'];
                $aSetProduct['product_name']  = $aProduct[0]['prd_name'];
                $aSetProduct['product_price'] = $aProduct[0]['prd_price'];
                if (preg_match("/\.gif|\.png|\.jpg|\.jpeg/i", $aProduct[0]['prd_img_tiny']) === 0) {
                    $aSetProduct['image_big']   = '//img.echosting.cafe24.com/thumb/img_product_big.gif';
                    $aSetProduct['image_small'] = '//img.echosting.cafe24.com/thumb/img_product_small.gif';
                    $aSetProduct['image_tiny']  = '//img.echosting.cafe24.com/thumb/44x44.gif';
                } else {
                    $aSetProduct['image_big']   = $sMallUrl.$aProduct[0]['prd_img_big'];
                    $aSetProduct['image_small'] = $sMallUrl.$aProduct[0]['prd_img_small'];
                    $aSetProduct['image_tiny']  = $sMallUrl.$aProduct[0]['prd_img_tiny'];
                }
                $aProductList[] = $aSetProduct;
            }
        } */

        $RedisData = array(
            'Name'   =>$sSliderName,
            //'Data'   =>$aProductList,
            'RegTime'=>time()
        );
        
        $RedisData['Width']  = $sSliderWidth;
        $RedisData['Height'] = $sSliderHeight;

        return $RedisData;
    }
}
