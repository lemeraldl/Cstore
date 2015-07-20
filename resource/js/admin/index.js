$(document).ready(function() {
	/*alert(1);*/
    $('a.eSliderRegist').click(function() {
    	alert('버튼이 눌러졌습니다.');
        location.href = "[LINK=admin/SliderRegist]";
        
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
