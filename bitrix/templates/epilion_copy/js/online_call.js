$(document).on('ready',function (){
    $('.online_call').on('mouseover mouseout', function (e){
            $(this).toggleClass('onlinecall_hover');
    });
    $('.online_call').on('touchstart click', function (e){
        if ($(this).hasClass('onlinecall_hover')) {
            window.open(
                'https://wa.me/79613017373?text=Добрый+день+Epilion!%F0%9F%91%8B%0AЯ+на+вашем+сайте+и+у+меня+есть+вопрос.+%0D%0A',
                '_blank'
            );
        }
        else
        {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('onlinecall_hover');
            $('body').one('click touchstart', function (event){
                $('.online_call').removeClass('onlinecall_hover');
            });
        }
    });
});