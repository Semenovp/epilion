$(document).ready(function (){
    $('.short_price_item-caption').on('click', function (e){
        e.stopPropagation();
        $(this).find('.item-caption-gif.cmark').toggleClass('rotated');
        if ($(this).find('.item-caption-gif.cmark').hasClass('rotated'))
            $(this).siblings('.short_price_item-service').addClass('shown');
        else
            $(this).siblings('.short_price_item-service').removeClass('shown');
    }) ;
    if (window.screen.width > 500) {
        $('.caption+.short_price_item-service.shown, .caption+.short_price_item-service.service_item').on('mouseover', function () {
            $(this).siblings('.caption.shown').addClass('noColor');
        });
        $('.caption+.short_price_item-service.shown, .caption+.short_price_item-service.service_item').on('mouseout', function () {
            $(this).siblings('.caption.shown').removeClass('noColor');
        });
    }
    else {
        $('section.short_price .service_item').on('click', function (){
            $(this).find('aside a').trigger('click');
        });
    }

});