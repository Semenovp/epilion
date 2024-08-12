// Скрипты Антона

$(document).on('click', '.amount_btn.minus', function() {
    //$('.amount_btn.minus').click(function () {

    var $input = $(this).next(".number__input");
    var $count = parseInt($input.val()) - 1;
    $count = $count < 1 ? 1 : $count;
    $input.val($count);
    $input.change();

    var $price = $input.attr('data-price');
    var $id = $input.attr('data-idp');
    $sum = $price * $count;
    $.ajax({
        url: '/ajax/recallcart.php',
        method: 'post',
        dataType: 'html',
        data: {
            id: $id,
            count: $count
        },
        success: function(data) {
            recalcBasketAjax();
        }
    });


    var tsum = 0;
    $('.price.price_new').each(function() {
        tsum += parseInt($(this).text());

    });
    $('.result_block .result_item .item_price').not('.sale').text(tsum).append("<span class='rub'> Г</span>");
    return false;
});
$(".number__plus").click(function() {
    var $input = $(this).prev(".number__input");
    var $count = parseInt($input.val()) +1;
    $count = $count < 1 ? 1 : $count;
    $input.val($count);
    $input.change();
    var $price = $input.attr('data-price');
    var $id = $input.attr('data-idp');
    $sum = $price * $count;

    $.ajax({
        url: '/ajax/recallcart.php',
        method: 'post',
        dataType: 'html',
        data: {
            id: $id,
            count: $count
        },
        success: function(data) {
            recalcBasketAjax();
        }
    });


    var tsum = 0;
    $('.amount_input').each(function() {
        price= parseInt($(this).attr('data-price'));
        kolvo=parseInt($(this).val());
        tsum+=price*kolvo;
    });
    $('.digi h1').html(tsum+ ' руб.');


})

function recalcBasketAjax() {
    $.post(
        "/ajax/updatebasket.php",
        onAjaxSuccess
    );

    function onAjaxSuccess(data) {

        var tableBasket = '';
        var basket = jQuery.parseJSON(data);
        var basePrice = 0;
        var newPrice = 0;
        var discount = 0;

        if (basket.length == 0) {


        } else {


            $.each(basket, function(index, value) {

                tableBasket += '<div class="b-cart-item b-cart__item">';
                tableBasket += '<div class="b-cart-item__left">';
                tableBasket += '<div class="b-cart-item__pic"><img src="'+ value['PREVIEW_PICTURE'] + '" alt=""></div>';
                tableBasket += '<div class="b-cart-item__txt">';
                tableBasket += '<div class="b-cart-item__txt-top">';


                tableBasket += '<div class="b-cart-item__cat">Инженерный паркет</div>';
                tableBasket += '<div class="b-cart-item__title">' + value['NAME'] + '</div>';
                tableBasket += '<div class="b-cart-item__article">Артикул: ' + value['ARTICLE'] + '</div>';
                tableBasket += '</div>';
                tableBasket += '<div class="b-cart-item__txt-bottom"><a class="link-del b-cart-item__del" data-idp="' + value['ID'] + '" href="javascript:void(0)">Удалить</a></div>';
                tableBasket += '</div>';
                tableBasket += ' </div>';
                tableBasket += '<div class="b-cart-item__right">';
                tableBasket += '<div class="b-cart-item__price">';
                tableBasket += '<div class="b-cart-item__price__item">~' + value['PRICE'] + 'span class="rubl">руб.</span></div>';
                tableBasket += '<div class="b-cart-item__price__desc">цена за 1 м?</div>';
                tableBasket += '</div>';
                tableBasket += '<div class="b-cart-item__count">';
                tableBasket += '<div class="number"><span class="number__minus">';
                tableBasket += '<svg class="icon icon-minus number__minus__ico">';
                tableBasket += '<use xlink:href="/local/templates/inner/img/svg-sprite/sprite.svg#minus"></use>';
                tableBasket += '</svg></span>';
                tableBasket += '<input class="number__input" type="text" size="1" value="' + value['QUANTITY'] + '"><span class="number__plus">';
                tableBasket += '<svg class="icon icon-plus number__plus__ico">';
                tableBasket += '<use xlink:href="/local/templates/inner/img/svg-sprite/sprite.svg#plus"></use>';
                tableBasket += '</svg></span>';
                tableBasket += '</div>';
                tableBasket += ' <div class="b-cart-item__size">м?</div>';
                tableBasket += '</div>';
                tableBasket += '<div class="b-cart-item__total-item">~' + value['QUANTITY'] * value['PRICE'] + '<span class="rubl">руб.</span></div>';
                tableBasket += '</div>';
                tableBasket += '</div>';

                $('.b-cart').html(tableBasket);

                basePrice = basePrice + parseInt(value['BASE_PRICE'] * value['QUANTITY']);
                newPrice = newPrice + parseInt(value['PRICE'] * value['QUANTITY']);
                discount = discount + parseInt(value['DISCOUNT_PRICE'] * value['QUANTITY']);

                //$('.b-cart').html(tableBasket);
            });

            $('.b-cart-total__summ').html('~'+newPrice + ' <span class="rubl">руб.</span>');

            if (discount > 0) {
                /*$('.result_block .result_item:nth-child(2)').css('display', 'inherit');
                $('p.item_price.sale').html(discount + ' <span class="rub"> Г</span>');*/
            }

            //$('p#sumitem').html(basePrice + ' <span class="rub"> Г</span>');
        }
    }

}