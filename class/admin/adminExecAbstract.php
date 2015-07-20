<?php
/*
 * 관리자페이지 exec 템플릿 (Controller_AdminExec 상속)
*/
abstract class adminExecAbstract extends Controller_AdminExec
{
    protected function getResultType($mResult, $isZero=true)
    {
        $bResult = true;
        foreach ($mResult as $mResult) {
            if ($mResult === false || ($isZero && $mResult === 0)) {
                $bResult = false;
                break;
            }
        }
        return $bResult;
    }
}
