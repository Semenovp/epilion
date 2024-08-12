
$(document).on('ready', function (){
    var xStart = parseInt($('#draggable').parent().offset().left);
    var xEnd = xStart + parseInt($('#draggable').parent().css('width'));
    var yDistance = parseInt($(this).parent().css('height'));

    $('#draggable').draggable({"containment": [xStart-10, 0, xEnd - 10, yDistance], "axis":"x", drag:function(event, ui){
            xStart = parseInt($(this).parent().offset().left);
            xEnd = xStart + parseInt($(this).parent().css('width'));
            var x = ui.position.left+10;
            $('.ba-after').css({'padding-left':x});
        }});
});
$('#draggable').on('mousedown', function () {
    $('.divider-stick').css({'opacity': 0.1});
});
$(document).on('mouseup', function () {
    $('.divider-stick').css({'opacity': 0.7});
});
