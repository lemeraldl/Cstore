<body class="gMargin">

<div class="section">
    <div class="mTitle">
        <h2>상품 슬라이드 목록</h2>
        <a>ss</a>
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
        <form name="frmSliderList" method="post" action="[LINK=admin/SliderDeleteExec]">
        <input type="hidden" name="mode" value="<?php echo $aData['sMode'];?>" />
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
        <?php
       
        $aList = $aDataTpl['aList'];
        //var_dump($aList);
        if (count($aList) > 0 && is_array($aList)) {
            foreach ($aList as $iSeq => $Slider) {
                ?>
                <tr class="">
                <td class="chk"><input type="checkbox" id="sliderSeq" name="sliderSeq[]" class="rowCk" value="<?php echo $iSeq;?>" /></td>
                <td class="no"><?php echo $iSeq;?></td>
                <td class="left">productsliders_display<?php echo '_'.$iSeq;?></td>
                <td class="subject"><a href="[LINK=admin/SliderModify]?Seq=<?php echo $iSeq;?>"><?php echo $Slider['Name'];?></a></td>
                <td><?php echo ($aData['sMode'] !== 'p') ? '자동' : $Slider['Width'].'px * '.$Slider['Height'].'px';?></td>
                <td><?php echo number_format(sizeof($Slider['Data']));?></td>
                <td class="date"><?php echo date("Y-m-d", $Slider['RegTime']);?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7" class="noData">등록 내역이 없습니다.</td>
            </tr>
            <?php
        }
        ?>
       
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
