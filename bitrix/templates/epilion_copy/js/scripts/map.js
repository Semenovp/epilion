ymaps.ready(function () {

    var myMap = new ymaps.Map('map', {
            center: [55.722305, 37.653897],
            zoom: 16
        }, {
            searchControlProvider: 'yandex#search'
        }),

        // Создаём макет содержимого.
        MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
            '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
        ),

        myPlacemark1 = new ymaps.Placemark(myMap.getCenter(), {
            hintContent: 'Softline',
            balloonContent: 'Дербеневская наб., 7, стр. 8, Москва'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: 'img/marker.svg',
            // Размеры метки.
            iconImageSize: [32, 45],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-16, -22]
        });

    myMap.geoObjects
        .add(myPlacemark1);

});
