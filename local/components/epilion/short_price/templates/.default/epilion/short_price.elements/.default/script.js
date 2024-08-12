$(document).ready(function (){
    $('.short_price_item-caption').on('click', function (e){
        e.stopPropagation();
        $(this).find('.item-caption-gif.cmark').toggleClass('rotated');
        if ($(this).find('.item-caption-gif.cmark').hasClass('rotated'))
            $(this).siblings('.short_price_item-service').addClass('shown');
        else
            $(this).siblings('.short_price_item-service').removeClass('shown');
    }) ;
});