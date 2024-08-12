$(document).ready(function (e){
    $('.modal_price_button').on('click tap', function (event){
        var properties = new Object();
        properties.id = $(this).data('serviceid');
        properties.name = $(this).data('servicename');
        properties.modal_block = '#modals';

        getModal ($(this).data('servicecode'), $(this).data('type'), properties, properties.modal_block);
    });
});

function getModal(service, modal_type, modal_params, modal_block) {
    var str = '';
    str = modal_block;
    $(modal_block+' .modal-body').off('click');
    $.ajax({
        type: "POST",
        url: '/ajax/modals.php',
        data: {
            'service': service,
            'modal_type': modal_type,
            'props': JSON.stringify(modal_params)
        },
        dataType: "html",
        success: function (data) {
                $(modal_block).append(data);
                $(modal_block).slideToggle();
                $('html').css('overflow','hidden');
                $(modal_block+' .modal-body').on('click', function (event){
                    event.stopPropagation();
                });
                $(modal_block+', .modal-body>.close-icon').one('click', function (){
                    $(modal_block).hide();
                    $(modal_block).html('');
                    $('html').css('overflow','');
                });
        }
    });
}