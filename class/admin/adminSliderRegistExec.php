<?php
/*
 * 슬라이드 수정 exec
 * 앱아이디.app-sdk-003.cafe24.com/admin/sliderRegist 에서 넘어온 값을 저장
 * 앱아이디.app-sdk-003.cafe24.com/admin/sliderRegistExec 로 호출
 * 
 * 앱이 설치됐을 경우 설치된 쇼핑몰의 ID를 반환 : $this->Request->getDomain()
 * REDIS 사용 : $this->Redis
 * 
 */
class adminSliderRegistExec extends adminExecAbstract
{
    /*
     * default run method (자동호출)
    */
    protected function run($aArgs)
    {
        
         /* $aa=$Request['sliderName'];
         var_dump($aa); */
        
        $aa=$_REQUEST['sliderName'];
        $sMallUrl    = '//'.$this->Request->getDomain().'.cafe24.com';
        $sSliderListKey = 'list';

        $oLibSlider  = libSlider::getInstance();
        $aRedisData  = $oLibSlider->getRedisData($this->Openapi, $aArgs, $sMallUrl);
         
        
          
        
        
//var_dump($aRedisData);exit;
        $iIncrement  = $this->Redis->get($sSliderListKey.'.increment');

        $iSeq = ($iIncrement > 0) ? $iIncrement + 1 : 1;

        $mResult = $this->Redis->multi()
        ->hset($sSliderListKey, $iSeq, $aRedisData)
        ->set($sSliderListKey.'.increment', $iSeq)
        ->exec();
        
        
        //var_dump($this->Redis->hget($sSliderListKey,$iSeq));exit;
        
        
        $bResult = $this->getResultType($mResult);

        if ($bResult!==false) {
            $this->writeJS("location.href='[LINK=admin/Index]'");
        } else {
            $this->writeJS("alert('처리 중 오류가 발생하였습니다.'); location.back();");




        }
    }
}


/*   $mResult = $this->Redis->multi()
 ->hset($sSliderListKey, '111122', '34542362364')
->exec();

$aaa = $this->Redis->hget($sSliderListKey,'1111');
var_dump($aaa);exit;
*/