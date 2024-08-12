function setSlider(container){
   var found = false;
   $(container).find('[data-id]').each(function (){
      if ($(this).hasClass('active')) {
         found = true;
      }
      else
         if (found){
            $(this).trigger('click');
            found = false;
         }
   });
   if (found) $(container).find('[data-id]:first-child').trigger('click');
}

$(document).ready(function (){
   var sliderClass = '.slider_dots';
   if (parseInt($('.promo_slider').data('delay')) > 0){
      var timer = setInterval(() => setSlider('.slider_dots'), ($('.promo_slider').data('delay'))?parseInt($('.promo_slider').data('delay'))*1000:5000);
   }
   $('.slider_dots span').on('click', function (){
      $(this).addClass('active').siblings().removeClass('active');
      $(this).parents('.slider_dots').siblings('.promo_slides').find('[data-slid="'+$(this).data('id')+'"]').addClass('active').siblings('.promo_slide').removeClass('active');
   });
});