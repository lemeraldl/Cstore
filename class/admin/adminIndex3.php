<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Simplex Web Platform</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="http://img.echosting.cafe24.com/smartAdmin/css/module.css" charset="euc-kr"/>
<link rel="stylesheet" type="text/css" href="http://img.echosting.cafe24.com/smartAdmin/css/myapps.css" charset="euc-kr"/>


</head>
<body>

<body class="gMargin">

<div class="section">
    <div class="mTitle">
        <h2>상품 슬라이드 목록</h2>
    </div>

    <div class="mTab typeTab">
        <ul>
            <li  class="selected"><a href="/admin/index?mode=p"><span>PC쇼핑몰</span></a></li>
            <li ><a href="/admin/index?mode=m"><span>모바일쇼핑몰</span></a></li>
        </ul>
    </div>

    <div class="mCtrl typeBoard">
        <p class="gCtrlLeft">
            <strong class="ctrlTxt">선택한 항목을</strong>
            <a class="btnCtrl eSliderDel" href="javascript:;"><span><em class="icoDel"></em> 삭제</span></a>
        </p>
        <p class="gCtrlRight">
            <a class="btnCtrlEm eSliderRegist" href="javascript:;"><span>슬라이드 등록</span></a>
        </p>
    </div>

    <div class="mBoard type1">
        <form name="frmSliderList" method="post" action="/admin/SliderDeleteExec">
        <input type="hidden" name="mode" value="p" />
        <table border="1" summary="" class="eTr">
        <caption>상품 슬라이드 목록</caption>
        <colgroup>
            <col class="chk" />
            <col class="no" />
            <col style="width:10%;" />
            <col class="subject" />
            <col style="width:12%;" />
            <col style="width:8%;" />
            <col class="date" />
        </colgroup>
        <thead>
        <tr>
            <th scope="col" class="chk"><input type="checkbox" class="allCk" /></th>
            <th scope="col">번호</th>
            <th scope="col">코드</th>
            <th scope="col">슬라이드명</th>
            <th scope="col">크기 (가로*세로)</th>
            <th scope="col">상품 개수</th>
            <th scope="col">등록일</th>
        </tr>
        </thead>
        <tbody class="center">
                        <tr class="">
                <td class="chk"><input type="checkbox" id="sliderSeq" name="sliderSeq[]" class="rowCk" value="5" /></td>
                <td class="no">5</td>
                <td class="left">productsliders_slider_5</td>
                <td class="subject"><a href="/admin/SliderModify?Seq=5&mode=p">PC버전 슬라이드1</a></td>
                <td>500px * 400px</td>
                <td>8</td>
                <td class="date">2015-01-27</td>
                </tr>
                                <tr class="">
                <td class="chk"><input type="checkbox" id="sliderSeq" name="sliderSeq[]" class="rowCk" value="6" /></td>
                <td class="no">6</td>
                <td class="left">productsliders_slider_6</td>
                <td class="subject"><a href="/admin/SliderModify?Seq=6&mode=p">zzzz</a></td>
                <td>111px * 222px</td>
                <td>2</td>
                <td class="date">2015-03-26</td>
                </tr>
                        </tbody>
        </table>
        </form>
    </div>

    <div class="mCtrl typeBoard">
        <p class="gCtrlLeft">
            <strong class="ctrlTxt">선택한 항목을</strong>
            <a class="btnCtrl eSliderDel" href="javascript:;"><span><em class="icoDel"></em> 삭제</span></a>
        </p>
        <p class="gCtrlRight">
            <a class="btnCtrlEm eSliderRegist" href="javascript:;"><span>슬라이드 등록</span></a>
        </p>
    </div>
    <div class="mHelp typeInfo">
        <h2>도움말</h2>
        <div class="content">
            <ul>
                <li>사용할 위치에 따라 PC쇼핑몰과 모바일쇼핑몰 중 선택하여 등록할 수 있고, 각 쇼핑몰에 최적화된 인터페이스로 앱 스킨이 제공됩니다.</li>
                <li>상품슬라이드는 최대 20개까지 등록 가능합니다.</li>
            </ul>
        </div>
    </div>

</div>
</body>

<script type="text/javascript" src="http://productsliders.hosting.app-sdk-002.cafe24.com:8000/?TYPE=JS&DATA=76114035258f969e05093f0ee0640e6c" charset="utf-8"></script>

<script type="text/javascript" src="/optimizer.php?filename=b861be0b677d9a4967ef8dfa312fe8a69c1835be_1401769839&type=js&"></script>
<script type="text/javascript">
if (typeof Cafe24_SDK_Config_Url == 'function') { Cafe24_SDK_Config_Url('http://productsliders.hosting.app-sdk-002.cafe24.com:8000/'); }
$(document).ready(function() {
$('a.eSliderRegist').click(function() {
location.href = "/admin/SliderRegist?mode=p";
});
$('a.eSliderDel').click(function() {
if ($('form[name=frmSliderList] input:checked.rowCk').length) {
if (confirm('선택된 슬라이드를 삭제하시겠습니까?')) {
$('form[name=frmSliderList]').submit();
}
} else {
alert('선택된 항목이 없습니다.');
}
return false;
});
$('form[name=frmSliderList] .allCk').click(function() {
var bChecked = $(this).attr('checked')? true : false;
$('form[name=frmSliderList] input.rowCk').attr('checked', bChecked);
});
});

</script></body>
</html>