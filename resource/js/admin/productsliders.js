$(document).ready(function() {
	alert('productslider.js');
    if (!Array.prototype.indexOf) {
        Array.prototype.indexOf = function(obj, start) {
            for (var i = (start || 0), j = this.length; i < j; i++) {
                if (this[i] === obj) { return i; }
            }

            return -1;
        }
    }

    var gProductList = $('.gDisplay.typeSearch .gProduct .gProductList');
    var gSelectedProductList = $('.gDisplay.typeResult .gProduct .gSelectedProductList');
    var iSelectedProductCnt = 0;

    function reCountSelectedProduct()
    {
        iSelectedProductCnt = 0;

        $.each(gSelectedProductList.find('tr'), function(index, element) {
            iSelectedProductCnt++;
            $(this).find('input.orderSlider').val(iSelectedProductCnt);
        });

        $('.gDisplay.typeResult .gResult .gTotal em').html(iSelectedProductCnt);
    }

    function checkSelectedProduct(productNo)
    {
        var isNoDup = true;

        $.each($(gSelectedProductList).find('tr .rowCk'), function(key, element) {
            if (isNoDup && productNo==$(element).val()) {
                isNoDup = false;
            }
        });

        return isNoDup;
    }

    function ProductRequest(productNo)
    {
        var mProductResult = $.ajax({
            url:'[LINK=api/Product]',
            type: "get",
            data:{'productNo':productNo},
            dataType: "json",
            async:false
        }).responseText;

        if (mProductResult) {
            var ProductResult = $.parseJSON(mProductResult);

            if (ProductResult.StatusCode==200) {
                if (checkSelectedProduct(ProductResult.Data.product_no)) {
                    $('<tr class="eachProduct" style="display:none;">' +
                    '<td class="chk"><input type="checkbox" name="orderSlider[]" class="rowCk" value="'+ProductResult.Data.product_no+'"></td>' +
                    '<td class="array"><input type="text" class="fText orderSlider" readonly="readonly" style="border:0;" /></td>' +
                    '<td>' +
                        '<div class="goods type1">' +
                            '<span class="frame"><img style="width:38px;height:38px;" alt="" src="'+ProductResult.Data.image_tiny+'"></span>' +
                            '<p><a href="#none">'+ProductResult.Data.product_name+'</a></p>' +
                            '<span class="preview"><a title="미리보기" href="#none" target="_blank" class="icoPreview">미리보기</a></span>' +
                        '</div>' +
                    '</td>' +
                    '</tr>').appendTo(gSelectedProductList);

                    gSelectedProductList.find('a.icoPreview').bind('click', function() {
                        var sHref = '/surl/P/' +  $(this).parent().parent().parent().parent().parent().find('.rowCk').val();

                        $(this).attr('href', sHref);

                        return true;
                    });
                }
            }
        }
    }

    function categoryProductRequest(selectList)
    {
        var categoryNo = 0;
        var threeCategoryNo = $('.gSelect .prdCategory4').val();

        if (threeCategoryNo>0) {
            categoryNo = threeCategoryNo;
        }

        if (categoryNo==0) {
            var subCategoryNo = $('.gSelect .prdCategory3').val();
            if (subCategoryNo>0) {
                categoryNo = subCategoryNo;
            }
        }

        if (categoryNo==0) {
            var multipleCategoryNo = $('.gSelect .prdCategory2').val();
            if (multipleCategoryNo>0) {
                categoryNo = multipleCategoryNo;
            }
        }

        if (categoryNo==0) {
            var mainCategoryNo = $('.gSelect .prdCategory1').val();
            if (mainCategoryNo>0) {
                categoryNo = mainCategoryNo;
            }
        }
        
        var mCategoryProductResult = $.ajax({
            url:'[LINK=api/CategoryProduct]',
            type: "get",
            data:{'categoryNo':categoryNo},
            dataType: "json",
            async:false
        }).responseText;

        if (mCategoryProductResult) {
            var CategoryProductResult = $.parseJSON(mCategoryProductResult);

            if (CategoryProductResult.StatusCode==200) {
                $.each(CategoryProductResult.Data.data, function(key, value) {
                    if (selectList.indexOf(value.product_no)>-1 && checkSelectedProduct(value.product_no)) {

                        $('<tr class="">' +
                        '<td class="chk"><input type="checkbox" name="orderSlider[]" class="rowCk" value="'+value.product_no+'"></td>' +
                        '<td class="array"><input type="text" class="fText orderSlider" readonly="readonly" style="border:0;"></td>' +
                        '<td>' +
                            '<div class="goods type1">' +
                                '<span class="frame"><img style="width:38px;height:38px;" alt="" src="'+value.image_tiny+'"></span>' +
                                '<p><a href="#none">'+value.product_name+'</a></p>' +
                                '<span class="preview"><a title="미리보기" href="#none" target="_blank" class="icoPreview">미리보기</a></span>' +
                            '</div>' +
                        '</td>' +
                        '</tr>').appendTo(gSelectedProductList);
                    }
                });

                gSelectedProductList.find('a.icoPreview').bind('click', function() {
                    var sHref = '/surl/P/' +  $(this).parent().parent().parent().parent().parent().find('.rowCk').val();

                    $(this).attr('href', sHref);

                    return true;
                });
            }
        }
    }

    $('.gBtn .btnAdd').click(function() {
        var selectList = [];

        $.each(gProductList.find('tr'), function(index, element) {
            if ($(element).find('.rowCk').attr('checked')) {
                selectList.push(Number($(element).find('.rowCk').val()));
            }
        });

        categoryProductRequest(selectList);

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay .gCtrlRight .btnEm.eDel').click(function() {
        $.each(gSelectedProductList.find('tr'), function(index, element) {
            if ($(element).find('.rowCk').attr('checked')) {
                $(this).remove();
            }
        });

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay.typeResult .gProduct .allCk').click(function() {
        gSelectedProductList.find('.rowCk').attr('checked', $(this).attr('checked'));
    });

    $('.gDisplay .gCtrlLeft .btnFirst').click(function() {
        var selectedProductElement = gSelectedProductList.find('tr');

        for(var i=selectedProductElement.length-1; i>=0; i--) {
            if ($(selectedProductElement[i]).find('.rowCk').attr('checked')) {
                $(selectedProductElement[i]).insertBefore(selectedProductElement[0]);
            }
        }

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay .gCtrlLeft .btnPrev').click(function() {
        $.each(gSelectedProductList.find('tr'), function(index, element) {
            if ($(this).prev() && $(element).find('.rowCk').attr('checked')) {
                $(this).prev().before($(element));
            }
        });

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay .gCtrlLeft .btnNext').click(function() {
        var selectedProductElement = gSelectedProductList.find('tr');

        for(var i=selectedProductElement.length-1; i>=0; i--) {
            if ($(selectedProductElement[i]).next() && $(selectedProductElement[i]).find('.rowCk').attr('checked')) {
                $(selectedProductElement[i]).next().after($(selectedProductElement[i]));
            }
        }

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay .gCtrlLeft .btnLast').click(function() {
        var selectedProductElement = gSelectedProductList.find('tr');

        for(var i=0; i<selectedProductElement.length-1; i++) {
            if ($(selectedProductElement[i]).find('.rowCk').attr('checked')) {
                $(selectedProductElement[i]).insertAfter(selectedProductElement[selectedProductElement.length-1]);
            }
        }

        reCountSelectedProduct();

        return false;
    });

    $('.gDisplay .gCtrlInsert .btnEm').click(function() {
        var iMoveIdx = $(this).parent().parent().find('input').val();

        var selectedProductElement = gSelectedProductList.find('tr');

        for(var i=0; i<selectedProductElement.length; i++) {
            if ($(selectedProductElement[i]).find('.fText.orderSlider').val()==iMoveIdx) {
                for(var j=0; j<selectedProductElement.length; j++) {
                    if ($(selectedProductElement[j]).find('.rowCk').attr('checked')) {
                        $(selectedProductElement[j]).find('.rowCk').attr('checked', false);
                        if (iMoveIdx<=$(selectedProductElement[j]).find('.fText.orderSlider').val()) {
                            $(selectedProductElement[j]).insertBefore(selectedProductElement[i]);
                        } else {
                            $(selectedProductElement[j]).insertAfter(selectedProductElement[i]);
                        }
                    }
                }

                break;
            }
        }

        reCountSelectedProduct();

        return false;
    });

    $('form[name=frmSliderRegist]').submit(function() {
        if (!$(this).find('input[name=sliderName]').val()) {
            $(this).find('input[name=sliderName]').focus();
            alert('슬라이드 이름을 입력하여 주세요.');

            return false;
        } else if ((!$(this).find('input[name=sliderWidth]').val() || !(Number($(this).find('input[name=sliderWidth]').val())>0)) && "<?php echo $aData['sMode'];?>" != 'm') {
            $(this).find('input[name=sliderWidth]').focus();
            alert('슬라이드 가로 크기를 입력하여 주세요.');

            return false;
        } else if ((!$(this).find('input[name=sliderHeight]').val() || !(Number($(this).find('input[name=sliderHeight]').val())>0)) && "<?php echo $aData['sMode'];?>" != 'm') {
            $(this).find('input[name=sliderHeight]').focus();
            alert('슬라이드 세로 크기를 입력하여 주세요.');

            return false;
       /* } else if (gSelectedProductList.find('.rowCk').length==0) {
            alert('진열된 상품이 없습니다.');

            return false;
        }*/} else {
            gSelectedProductList.find('.rowCk').attr('checked', true);
        }

        return true;
    });

    $('.mButton .btnCancel').click(function() {
        location.href = "[link=Index]";

        return false;
    });

    $('.mButton .btnSubmit').click(function() {
        $('form[name=frmSliderRegist]').submit();

        return false;
    });

    <?php
    if (count($aData['aInfo']) > 0 && is_array($aData['aInfo'])) {

        foreach ($aData['aInfo']['Data'] as $Product) {
            echo 'ProductRequest('.$Product['product_no'].');';
        }
    }
    ?>
    $('.eachProduct').css('display','');
    reCountSelectedProduct();
});
