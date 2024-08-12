$(document).ready(function (){
   $('section.short_price a[data-toggle="link"]').on('click', function (){
      window.open = $(this).data('link','_blank');
   });
});