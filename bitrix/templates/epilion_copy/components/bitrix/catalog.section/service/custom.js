$(document).ready(function (){
        //Установить в калькуляторе заголовок для столбца с ценой
    (parseInt($('.custom-radio.active').attr('data-price')) == 0) ? $('.b-removal-dl-inf__dd').text('Цена без скидки') : $('.b-removal-dl-inf__dd').text('Цена по карте');
});