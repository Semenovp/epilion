
(function($) {
    $(function() {
        const isPrice = [
            {
                'text': 'Лазерная эпиляция',
                'children': [
                    {
                        'id': 'Лицо',
                        'text': '1200'
                    },
                    {
                        'id': 'Верхняя губа',
                        'text': '4400'
                    },
                    {
                        'id': 'Лоб',
                        'text': '1200'
                    },
                    {
                        'id': 'Подбородок',
                        'text': '900'
                    },
                    {
                        'id': 'Щеки',
                        'text': '270'
                    }
                ]
            }, {
                'text': 'Омоложение кожи',
                'children': [
                    {
                        'id': 'Ноги до колена',
                        'text': '1200'
                    },
                    {
                        'id': 'Поверхность бедер на выбор',
                        'text': '4400'
                    },
                    {
                        'id': 'Лоб',
                        'text': '1200'
                    },
                    {
                        'id': 'Подбородок',
                        'text': '900'
                    },
                    {
                        'id': 'Щеки',
                        'text': '270'
                    }
                ]
            }
        ];

        function formatPrice (price) {
            if (!price.id) { return price.text; }
            const $price = $(
                '<span class="service-option">' +
                '<span class="service-option__txt">'+ price.id +'</span>' +
                '<span class="service-option__price">'+ price.text+"</span>" +
                '</span>'
            );
            return $price;
        };

        $(".js-select2--modal").select2({
            placeholder: "Добавить процедуру",
            templateResult: formatPrice,
            templateSelection: function (price) {
                const $span = $('<span class="">'+ price.id +'</span>');
                return $span;
            },
            data: isPrice
        });


    });
})(jQuery);
