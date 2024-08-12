class BpValidation{
    constructor() {
        //Форма для валидации
        this.form = $('.bpForm');
        this.phone = $('.bpForm *[type="tel"]');
        this.name = $('.bpForm *[name="client_name"]');

        this.numRExp = /^7[0-9]{10}$/i;
        this.ruRExp = /^([аАбБвВгГдДеЕёЁжЖзЗиИйЙкКлЛмМнНоОпПрРсСтТуУфФхХцЦчЧшШщЩъЪыЫьЬэЭюЮяЯ]+\s?)+$/i;
        this.enRExp = new RegExp('/^([aA-zZ]+\s?)+/','i');

        this.init();

    }
    bpValidate(){
        var res = true;
        var result = new Map();
        var phoneContent = Array.from(this.phone.val());
        //alert(this.name.val());
        var nameContent = Array.from(this.name.val());
        var reg = /^\d$/;
        var fieldRes = '';
        var num = Array('0','1','2','3','4','5','6','7','8','9');

        //ПРОВЕРКА ТЕЛЕФОНА

        //Нормализуем телефон
        for(var i=0; i<=phoneContent.length-1; i++){
            if (reg.test(phoneContent[i])){
                fieldRes += phoneContent[i];
            }
        }
        //alert('Валидация телефона: '+ this.numRExp.test(fieldRes) + ' Телефон: ' + fieldRes);
        //проверяем нормализованный телефон и записываем результат
        if (!this.numRExp.test(fieldRes)) res = false;
        result.set($(this.phone).attr('name'), this.numRExp.test(fieldRes));


        //проверяем имя и записываем результат
        if (!this.ruRExp.test($(this.name).val())) res = false;
        result.set($(this.name).attr('name'), this.ruRExp.test($(this.name).val()));
        //alert('Валидация имени: '+ this.ruRExp.test($(this.name).val()) + ' Имя: ' + $(this.name).val());

        result.set("formResult", res);
        return result;
}
    init(){
        /*this.form.on('submit', function (){
            $(this).bpValidate();
        });*/
        //alert($(this.phone).attr('name'));
    }
}