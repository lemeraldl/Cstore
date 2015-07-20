<div class="section">
    <form name="frmSliderRegist" method="post" action="[LINK=admin/SliderRegistExec]">
    <input type="hidden" name="mode" value="<?php echo $aData['sMode'];?>">
    <div class="mTitle">
        <h2>슬라이드 등록</h2>
        <?php
            if ($aData['sMode'] === 'm') {
                echo '<p>슬라이드 영역의 사이즈는 모바일 기기 화면 해상도에 따라 자동으로 지정됩니다.</p>';
            }
        ?>
    </div>

    <h3>정보 입력</h3>
    <p class="mRequired"><strong class="txtMust">*</strong> 필수 입력사항</p>
    <div class="mBoard type2 gSmall">
        <table border="1" summary="">
        <caption>슬라이드 등록</caption>
        <tbody>
        <tr>
            <th scope="row">슬라이드 명 <strong class="txtMust">*</strong></th>
            <td><input type="text" id="sliderName" name="sliderName" class="fText" style="width:50%;" /></td>
        </tr>
        <tr>
            <th scope="row">상품이미지 크기 <strong class="txtMust">*</strong></th>
            <td>
                <label class="fChk bullet">가로 <input type="text" id="sliderWidth" name="sliderWidth" class="fText right" style="width:50px;" /> px</label>
                <label class="fChk bullet">세로 <input type="text" id="sliderHeight" name="sliderHeight" class="fText right" style="width:50px;" /> px</label>
            </td>
        </tr>
      
        </tbody>
        </table>
    </div>
    </form>
</div>

<div class="mButton">
    <p>
        <a href="javascript:;" class="btnSubmit"><span>저장</span></a>
        <a href="javascript:;" class="btnCancel"><span>취소</span></a>
    </p>
</div>
