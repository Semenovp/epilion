ymaps.ready(function () {
        var myMap = new ymaps.Map('map', {
            center: [47.296676, 39.712354],
            zoom: 17
        }, {
            searchControlProvider: 'yandex#search'
        });


        //<?=SITE_TEMPLATE_PATH?>

        var placemark = new ymaps.Placemark([47.296676, 39.712354], {
            // Зададим содержимое заголовка балуна.
            balloonContentHeader: '<div class="balloon-content">' +
                '<div class="balloon-logo"><img src="/bitrix/templates/epilion_copy/img/logo.svg"></div> ' +
                '<div class="balloon-pic"><img src="/bitrix/templates/epilion_copy/img/map-pic.jpg"></div> ' +
                '<div class="balloon-address">г.Ростов-на-Дону<br/> пр-т Космонавтов, 39/1</div>' +
                '<div class="balloon-link"><a id="address-link-1" href="/contacts/#address-0">Подробнее</a></div>' +
                '</div>',
            // Зададим содержимое основной части балуна.
            balloonContentBody: '',
            // Зададим содержимое нижней части балуна.
            balloonContentFooter: '',
            // Зададим содержимое всплывающей подсказки.
            hintContent: 'Epillion'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/bitrix/templates/epilion_copy/img/marker.svg',
            // Размеры метки.
            iconImageSize: [52, 74],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-26, -57]
        });

        var placemark_2 = new ymaps.Placemark([47.224453, 39.723915], {
            // Зададим содержимое заголовка балуна.
            balloonContentHeader: '<div class="balloon-content">' +
                '<div class="balloon-logo"><img src="/bitrix/templates/epilion_copy/img/logo.svg"></div> ' +
                '<div class="balloon-pic"><img src="/bitrix/templates/epilion_copy/img/map-pic.jpg"></div> ' +
                '<div class="balloon-address">г.Ростов-на-Дону<br/> пр-т Чехова, 54/32</div>' +
                '<div class="balloon-link"><a id="address-link-2" href="/contacts/#address-1">Подробнее</a></div>' +
                '</div>',
            // Зададим содержимое основной части балуна.
            balloonContentBody: '',
            // Зададим содержимое нижней части балуна.
            balloonContentFooter: '',
            // Зададим содержимое всплывающей подсказки.
            hintContent: 'Epillion'
        }, {
            // Опции.
            // Необходимо указать данный тип макета.
            iconLayout: 'default#image',
            // Своё изображение иконки метки.
            iconImageHref: '/bitrix/templates/epilion_copy/img/marker.svg',
            // Размеры метки.
            iconImageSize: [52, 74],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-26, -57]
        });

        //отключаем зум колёсиком мышки
        myMap.behaviors.disable('scrollZoom');

        //на мобильных устройствах... (проверяем по userAgent браузера)
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
            //... отключаем перетаскивание карты
            myMap.behaviors.disable('drag');
        }


        myMap.geoObjects
            //.add(m['m1'])
            //.add(m['m2'])
            .add(placemark)
            .add(placemark_2);

        // Выставляем масштаб карты чтобы были видны все группы.
        myMap.setBounds(myMap.geoObjects.getBounds());

    });
