$(document).ready(function (){
	$('.custom-radio:not(.active)').trigger('click');
	$('.preparat-block .b-removal-dl__dd').on('click', function (event){
		event.preventDefault();
		event.stopPropagation();
		window.location.href=$(this).find('a').data('link');
	});
	$('.main_top .main-nav__dropdown-btn').on('click',function (e){e.preventDefault();});
	//ymaps.ready(init);
});


// Обработчики упрощенной формы

function showSimpleModal(selector){
	$('.reg-section').css({'display':'flex'});
}

$(".reg-form-main").on('click', function(event){
	event.stopPropagation();
});
$(".reg-section").on("click", function(){
	$(".reg-section").css({"display":"none"});
});

$('.bpForm').on("submit", function (e){
	e.preventDefault();
	$(this).children('input[name="form_link"]').val($(location).attr('href'));
	//alert("OK");
	var formValid = new BpValidation();
	var bpFormResult = formValid.bpValidate();
	if (bpFormResult.get('formResult')) {
		$.ajax({
			type: "POST",
			url: '/ajax/order_simple.php',
			data: $("#regFrom").serialize(),
			dataType: "html",
			success: function (data) {
				var formSendResult = jQuery.parseJSON( data );

				//alert(data);
				//$("main").append(data);
				//$(".reg-section input, .reg-section textarea").val('');
				//$(".reg-section input, .reg-section textarea").css('border-color','');
				$(".reg-form").children().remove();
				if (formSendResult.formState) {
					$('.reg-form_h3').text('Ваш запрос успешно отправлен');
					$(".reg-form").append('<p>'+formSendResult.formOrder+'</p>');
					$(".reg-form").append('<p>'+formSendResult.formMail+'</p>');
				} else {
					$('.reg-form_h3').text('Извините, сервис записи временно занят...');
					$(".reg-form").append('<p>Если мы сегодня вам не перезвоним, запишитесь по телефону ' +
						'<a href="tel:+78633017373">+7 (863) 301 73 73</a> или в <a href="https://api.whatsapp.com/send?phone=79613017373">WhatsApp</a>' +
						'</p>');
					$(".reg-form").append('<p>'+formSendResult.formState+'</p>');
				}
				$(".reg-form").append('<button id="okButton" class="simple-reg-form-button blue-btn-2">ОК</button>');
				$('#okButton').on('click', function (){
					$(".reg-section").hide();
				});
				//alert('Результат валидации формы = '+bpFormResult.get('formResult'));
			}
		});
	} else
		{
			//alert('Результат валидации: '+bpFormResult.get('formResult'));
			for(let results of bpFormResult.keys()){
				if(bpFormResult.get(results) === false) {
					$(".bpForm input[name='" + results + "']").css({'border': '1px solid #E20A3E'});
					$(".bpForm input[name='" + results + "']").one('focus',function (e) {
						$(".bpForm input[name='" + results + "']").css('border','');
					});
					//alert('Результат валидации для "'+ results +'" = ' + bpFormResult.get(results));
				}
				//else alert('Результат валидации для "'+ results +'" = ' + bpFormResult.get(results));
			}
		}
});

// Обработчики упрощенной формы

//Обработчики ТОП-услуг (квадраты на главной и на странице "УСЛУГИ"
$('.b-main-catalog-item, .b-service-item').off();
	$('.b-main-catalog-item a, .b-service>.b-service-item a').on('click', function (e){e.preventDefault()});
	$('.b-main-catalog-item, .b-service-item').on('click', function (e){
		e.preventDefault();
		e.stopPropagation();
		window.location.href = $(this).find('a:first-of-type').attr('href');
	});


//Обработчики ТОП-услуг (квадраты на главной и на странице "УСЛУГИ" - Конец

//ГЛАВНЫЙ СЛАЙДЕР - Переключение слайдов
var slideNum = 1;
var slideTime = 4000;


$('.owl-dots').ready(function(){
function slideMain(){
//alert ('Функция 1');
//alert ($('.owl-dots .owl-dot').length);
$('.main-slider .owl-dot').eq(slideNum).click();
}

var slideTimer = setInterval(slideMain,slideTime);
var thisSlideNum =  slideNum;

$('.main-slider .owl-dot').on('click', function(e){
	thisSlideNum = $('.main-slider .owl-dot').index($('.main-slider .owl-dot.active'));
//alert ($('.main-slider .owl-dot').index($(e.target)));
	if (thisSlideNum != slideNum) {
		slideNum = thisSlideNum; 
		clearInterval(slideTimer); 
		slideTimer = setInterval(slideMain,slideTime);
	}
	if (slideNum < ($('.main-slider .owl-dot').length - 1)) slideNum++; else slideNum = 0;
	thisSlideNum =  slideNum;
});
});



//КОНЕЦ СЛАЙДЕР

function round(x) { return x%5<3 ? (x%5===0 ? x : Math.ceil(x/5)*5) : Math.ceil(x/5)*5 };

		var arr = [];
		var total_price_service2;
		var serviceArr = [];
		var time;
		var date;
		var skidka=0;
		var adress;
		var s_arr; 
		/*убрать из массива элемент*/
		Array.prototype.remove = function(x) { 
			var i;
			for(i in this){
				if(this[i].toString() == x.toString()){
					this.splice(i,1)
				}
			}
		}
		/*убрать из массива элемент*/
		
		$('a.tab-zone-2-nav__item').on('click', function() {
			
			var chast=$(this).text();
			var pos = arr.indexOf(chast);
			
			if (pos==-1) {
				arr.push(chast);
				var $json = JSON.stringify(arr);
				//delete_cookie('proceduri');
				//setcookie("proceduri", $json, (new Date).getTime() + (3 * 24 * 60 * 60 * 1000), "/");
				
			}
				return arr;
		});	
		$('.blue-btn-2.message-alert__btn').on('click', function() {
			$('.tab-pane.fade.show.active.in .message-alert').hide();
			$('.tab-pane.fade.show:not(.active) .message-alert').show();
			$('.b-modal-service.b-modal-service--disabled').removeClass('b-modal-service--disabled');
		});
		
		
		$('a[data-toggle="modal"]').on('click', function(stopclick) {
			//Отключаем показ модалки к калькуляцией
			stopclick.stopPropagation();
			showSimpleModal('body');
			//Отключаем показ модалки с калькуляцией - КОНЕЦ

			gender=$(this).attr('data-gender');

			 $.ajax({
				type: "POST",
				url: '/ajax/modal1.php',
				data: {
					'skidka':skidka,
					'gender':gender,
					'test':serviceArr
				},
				dataType: "html",
				success: function(data) {

					var result = jQuery.parseJSON( data );

						$('.item_service[data-gender="'+result.gender+'"]').html(result.msg);
						$( ".tab-pane.fade.show.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg);


					$('.b-modal-total__new-price').val(result.total);
					$('.b-modal-total__new-price').text(result.total);
					$('form[name="modal-1"]').change();
					return total_price_service2;
				}
			});
		});
		
		$("#data_service").select2().on("select2:select", function (e) {	
		 
			 time = $(this).val();		
			$("input[name='time']").val(time);
			$('form[name="modal-1"]').change();
			return time;

		});
		
		$('#datepicker').datepicker( {
			onSelect: function(date) {
			   // alert(date);
				$("input[name='data']").val(date);
				$('form[name="modal-1"]').change();
				return date;
			}
		});
		
		
		/*Женщины*/
	$("select").select2().on("select2:select", function (e) {
			var total_price=Number($('.b-modal-total__new-price').val());
			 var select_val = Number($(this).val());
			gender=$(this).attr('name');
			if ( $.inArray( select_val, serviceArr )<0) {
				if($(".b-removal-dl").is('[data-id="'+select_val+'"]')) {
				$('[data-id="'+select_val+'"]').trigger('click');
					
				} else {
					serviceArr.push(select_val);
					var $json = JSON.stringify(arr);
					
				}
				
				
			 	 $.ajax({
						type: "POST",
						url: '/ajax/modal1.php',
						data: {
							'skidka':skidka,
							'gender':gender,
							'test':serviceArr
						},
						dataType: "html",
						success: function(data) {

							var result = jQuery.parseJSON( data );
							
							$( ".tab-pane.fade.show.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg); 
							total_price_service2=result.total;
							$('.tab-pane.fade.show.active.in .b-modal-total__new-price').val(result.total);
							$('.tab-pane.fade.show.active.in .b-modal-total__new-price').text(result.total);
							$('form[name="modal-1"]').change();
							return total_price_service2;
						}
					});
			  }
			 
	});
	/*Женщины*/
	
	/*Поменяли вкладку*/

	$('.tab-zone-nav__item').on('click', function() {
		serviceArr.length=0;
		total_price_service2=0;
		/*Итог*/
		$('.b-total__summ span').val(0);
		$('.b-total__summ span').text(0);
		/*Скидка*/
		$('.b-total__sale span').val(0);
		$('.b-total__sale span').text(0);
		$('.b-removal-dl.active').removeClass('active');
		$('.zone-mini-style.active').removeClass('active');
		$('.b-removal-tag').remove();
		$('form[name="modal-1"]').change();
		return serviceArr;
	});

	$('.tab-zone-nav__item').on('click', function() {
		total_price_service2=0;
		return total_price_service2;
	});
	/*Поменяли вкладку */
	

	/*Кликнули по выбору услуги страница сервиса*/

$('.b-removal-dl').on('click', function(e) {
	
	var service_price=Number($(this).attr('data-price'));
	var service_name=$(this).attr('data-name');
	// var total_price_service=Number($('.total').val());
	 var zone=$(this).attr('data-pic');
	 var id=$(this).attr('data-id');
	 //Раскрываем-скрываем блок с препаратами
	var svg = $(this).find('.b-removal-ico__ico-checkmark')[0];
	if (($(this).parents('.preparat-block').length>0)) {
		$(this).parents('.b-removal-dl_rows').siblings('.b-removal-dl_rows').find('svg.b-removal-ico__ico-checkmark').attr('class','icon b-removal-ico__ico-checkmark');
		$(this).parents('.b-removal-dl_rows').siblings('.b-removal-dl_rows').find('.preparats').hide(400, 'swing');
		$(this).parents('.b-removal-dl_rows').siblings('.b-removal-dl_rows').find('.b-removal-dl__dd a').hide();
		$(this).parents('.b-removal-dl_rows').siblings('.b-removal-dl_rows').find('.b-removal-dl__price').show();

		 if ($(svg).attr('class') == 'icon b-removal-ico__ico-checkmark rotated') {
			 $(svg).attr('class', 'icon b-removal-ico__ico-checkmark');
			 $(this).siblings('.preparats').slideToggle(200, 'swing');
			 $(this).find('.b-removal-dl__price').show();
			 $(this).find('.b-removal-dl__dd a').hide();
		 }
		 else {
			 $(svg).attr('class', 'icon b-removal-ico__ico-checkmark rotated');
			 $(this).siblings('.preparats').slideToggle(200, 'swing');
			 $(this).siblings('.preparats').css('display', 'flex');
			 $(this).find('.b-removal-dl__price').hide();
			 $(this).find('.b-removal-dl__dd a').show();
			 $(this).find('.b-removal-dl__dd a').css('display','flex');
		 }
	 }
	 else {
		 if (serviceArr.indexOf(id) == -1) {
			 serviceArr.push(id);
			 var $json = JSON.stringify(serviceArr);
		 } else {
			 serviceArr.remove(id);
		 }
		 $.ajax({
			 type: "POST",
			 url: '/ajax/cart.php',
			 data: {
				 'skidka': skidka,
				 'test': serviceArr
			 },
			 dataType: "json",
			 success: function (data) {

				 //var result = jQuery.parseJSON(data);
				 $('.b-total').html(data);
			 }

		 });

		 if (serviceArr.length > 0) {
			 $('a.blue-btn-2.b-removal-total__btn.disabled').removeClass('disabled');
		 } else {
			 $('a.blue-btn-2.b-removal-total__btn').addClass('disabled');
		 }
		 if ($(this).hasClass("active")) {
			 $('.b-removal-tag__item[data-name="' + service_name + '"]').remove();
			 $('.zone-mini-style[data-name="' + service_name + '"]').removeClass('active');
			 $(this).removeClass('active');
			 $('#' + zone).removeClass('active');
			 serviceArr.splice(id);
		 } else {
			 $(this).addClass('active');
			 $('#' + zone).addClass('active');

		 }
		 $('form[name="modal-1"]').change();
		 return total_price_service2;
	 }
	
});
//Клик по "препарату" (косметология)
$('.preparat-block .preparats>dl').on('click', function(e) {
	var service_price=(Number($(this).attr('data-sale')) > 0)?Number($(this).attr('data-sale')):Number($(this).attr('data-price'));
	var service_name=$(this).attr('data-name');
	var id=$(this).attr('data-id');

	if (serviceArr.indexOf(id) == -1) {
		serviceArr.push(id);
		var $json = JSON.stringify(serviceArr);
		$(this).find('.b-removal-ico__ico-checkmark2').css('fill','#0DA8AD');
	} else {
		serviceArr.remove(id);
		$(this).find('.b-removal-ico__ico-checkmark2').css('fill','');
	}
	$.ajax({
		type: "POST",
		url: '/ajax/cart.php',
		data: {
			'skidka':$('.custom-radio.active').attr('data-price'),
			'sale-price':true,
			'test': serviceArr,
			'preparat':true
		},
		dataType: "json",
		success: function (data) {

			//var result = jQuery.parseJSON(data);
			$('.b-total').html(data);
		}

	});

	if (serviceArr.length > 0) {
		$('a.blue-btn-2.b-removal-total__btn.disabled').removeClass('disabled');
	} else {
		$('a.blue-btn-2.b-removal-total__btn').addClass('disabled');
	}
	if ($(this).hasClass("active")) {
		$('.b-removal-tag__item[data-name="' + service_name + '"]').remove();
		$('.zone-mini-style[data-name="' + service_name + '"]').removeClass('active');
		$(this).removeClass('active');
		//$('#' + zone).removeClass('active');
		serviceArr.splice(id);
	} else {
		$(this).addClass('active');
		//$('#' + zone).addClass('active');

	}
	$('form[name="modal-1"]').change();
	return total_price_service2;

});
//Пеерключение скидочных карт в калькуляторе
$('.custom-radio').on('click',  function () {
	var sale=parseInt($(this).attr('data-price'));
	(sale == 0) ? $('.b-removal-dl-inf__dd').text('Цена без скидки') : $('.b-removal-dl-inf__dd').text('Цена по карте');
	var prep = ($('.preparat-block').length>0)?true:false;
	skidka=sale;

	$.ajax({
		type: "POST",
		url: '/ajax/cart.php',
		data: {
			'skidka':skidka,
			'test':serviceArr,
			'preparat':prep
		},
		dataType: "json",
		success: function(data) {

			//var result = jQuery.parseJSON(data);
			$('.b-total').html(data);

			let koefsale=(100-sale)/100;

			$(".b-removal-dl__price").each(function(indx, element){
				let price=$(this).parent().parent().data('price');
				//Если цена по карте задана, коэффициент карты не учитываем
				let salePrice=$(this).parent().parent().data('sale');
				if (salePrice == 0 || salePrice == null)
					price=parseInt(parseInt(price)*koefsale);
				else if (koefsale < 1)
					price=salePrice;
				if ($(this).parents('.preparat-block').length > 0)
					$(this).text('от '+$(this).data('minprice')+' ₽');
				else
					$(this).text(round(price));
			});

		}

	});
	$.ajax({
		type: "POST",
		url: '/ajax/modal1.php',
		data: {
			'skidka':sale,
			//'gender':gender,
			'test':serviceArr,
			'preparat':prep
		},
		dataType: "html",
		success: function(data) {


			var result = jQuery.parseJSON( data );

			$( ".tab-pane.fade.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg);

			$('.b-modal-total__new-price').val(result.total);
			$('.b-modal-total__new-price').text('от '+result.total+' ₽');
			$('span.b-removal-dl__price').text();

			let koefsale2=(100-parseInt(sale))/100;

			$(".b-removal-dl__price").each(function(indx, element){
				let price=$(this).parent().parent().data('price');
				//Если цена по карте задана, коэффициент карты не учитываем
				let salePrice=$(this).parent().parent().data('sale');
				if (salePrice == 0)
					price=parseInt(parseInt(price)*koefsale2);
				else if (koefsale2 < 1)
					price=salePrice;
				//price=parseInt(parseInt(price)*koefsale2);

				if ($(this).parents('.preparat-block').length > 0)
					$(this).text('от ' + $(this).data('minprice') + ' ₽');
				else
					$(this).text(round(price));

			});

		}

	});

	return skidka;
});


$('.b-ft-contact').on('click',  function () {
	var sale=parseInt($(this).attr('data-price'));

	skidka=sale;

	(sale == 0) ? $('.b-removal-dl-inf__dd').text('Цена без скидки'):$('.b-removal-dl-inf__dd').text('Цена по карте');

	 $.ajax({
			type: "POST",
			url: '/ajax/cart.php',
			data: {
				'skidka':$(this).attr('data-price'),
				'test':serviceArr
			},
			dataType: "json",
			success: function(data) {
		
				//var result = jQuery.parseJSON(data);
				$('.b-total').html(data);
			
				let koefsale=(100-sale)/100;

					$(".b-removal-dl__price").each(function(indx, element){
						let price=$(this).parent().parent().data('price');
						//Если цена по карте задана, коэффициент карты не учитываем
						let salePrice=$(this).parent().parent().data('sale');
						if (salePrice == 0 || salePrice == null)
							price=parseInt(parseInt(price)*koefsale); 
						else if (koefsale < 1)
							price=salePrice;

					  $(this).text(round(price));
					});
					
			}

		});
	 $.ajax({
		type: "POST",
		url: '/ajax/modal1.php',
		data: {
			'skidka':sale,
			//'gender':gender,
			'test':serviceArr
		},
		dataType: "html",
		success: function(data) {
	
		
			var result = jQuery.parseJSON( data );
						
							$( ".tab-pane.fade.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg); 
					
					$('.b-modal-total__new-price').val(result.total);
					$('.b-modal-total__new-price').text(result.total);
					$('span.b-removal-dl__price').text();
					
					let koefsale2=(100-parseInt(sale))/100;
				
					$(".b-removal-dl__price").each(function(indx, element){
					  let price=$(this).parent().parent().data('price');
						//Если цена по карте задана, коэффициент карты не учитываем
					  let salePrice=$(this).parent().parent().data('sale');
						if (salePrice == 0)
							price=parseInt(parseInt(price)*koefsale2); 
						else if (koefsale2 < 1)
							price=salePrice;
					  //price=parseInt(parseInt(price)*koefsale2);
					  
					  $(this).text(round(price));
					
					});					
					
		}

	});		
		
	return skidka;
});

/*Клик по тэгу зоны тела*/
$('body').on('click', '.icon.icon-close_big.clear-btn__ico', function () {
		var id=$(this).attr('data-id');
		var prep = ($('.preparat-block').length>0)?true:false;
		serviceArr.remove(id);
	
	$.ajax({
		type: "POST",
		url: '/ajax/cart.php',
		data: {
			'skidka':skidka,
			'test':serviceArr,
			'preparat':prep
		},
		dataType: "json",
		success: function(data) {
	
			//var result = jQuery.parseJSON(data);
			$('.b-total').html(data);
			$('.b-removal-dl[data-id='+ id+']').removeClass('active');
			$('#z_w_'+ id).removeClass('active');
			$('#z_m_'+ id).removeClass('active');
			$('.preparats dl[data-id="'+id+'"]').find('.icon.b-removal-ico__ico-checkmark2').css('fill','#C7DBDE');
		}

	});
	
});
/*Клик по тэгу зоны тела*/
/*Клик по тэгу зоны тела*/
$('body').on('click', 'button.clear-btn.b-modal-service-list-item__clear', function () {
		var id=$(this).attr('data-id');
		serviceArr.remove(id);
			 var total_price=Number($('.b-modal-total__new-price').val());
			 var select_val = Number($(this).val());
			
		
			 	 $.ajax({
						type: "POST",
						url: '/ajax/modal1.php',
						data: {
							'skidka':skidka,
							'gender':gender,
							'test':serviceArr
						},
						dataType: "html",
						success: function(data) {

							var result = jQuery.parseJSON( data );
							if (result.msg){
								$( ".tab-pane.fade.show.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg); 
							} else {
								$( ".tab-pane.fade.show.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(""); 
							}
							total_price_service2=result.total;
							$('.tab-pane.fade.show.active.in .b-modal-total__new-price').val(result.total);
							$('.tab-pane.fade.show.active.in .b-modal-total__new-price').text(result.total);
							return total_price_service2;
						}
					});
			 //total_price=total_price+select_val;
			  
			 $('.b-modal-total__new-price').text(total_price_service2);
			 $('.b-modal-total__new-price').val(total_price_service2);
});
/*Клик по тэгу зоны тела*/
/*Клик по вкладке в модалке выбора пола*/	
	$('.tab-sex-nav li').on('click', function() {
		var pol=$(this).attr('data-gender');
		gender=pol;
		serviceArr.length=0;
		total_price_service2=0;
		$.ajax({
				type: "POST",
				url: '/ajax/modal1.php',
				data: {
					'skidka':skidka,
					'gender':gender,
					'test':serviceArr
				},
				dataType: "html",
				success: function(data) {
				
					var result = jQuery.parseJSON(data);
					
					$('.item_service').html(''); 
					//alert(result.gender);
						
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('show'); 
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('active'); 
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('in'); 
						$('.item_service[data-gender="'+result.gender+'"]').html(result.msg); 
						$('.tab-sex-nav li[data-gender="'+result.gender+'"]').addClass('active');
					
					$('.message-alert[data-gender="'+pol+'"]').css('display','block');
					$('.b-modal-service').addClass('b-modal-service--disabled');
					
					$('.b-modal-total__new-price').val(result.total);
					$('.b-modal-total__new-price').text(result.total);
					$('form[name="modal-1"]').change();
					return gender;
				}
			});
	});
/*Клик по вкладке в модалке выбора пола*/			
			
/*Модалки пошли*/			
		$('button.blue-btn-2.b-form-btn-row__btn').on('click', function() {
			
			
			var error=0;
			if ($("input[name='data']").val()=="") {
				error++;
			}
			
			if (serviceArr.length==0) {
				error++;
			}

			if (error==0) {
		
			
				 $.ajax({
							type: "POST",
							url: '/ajax/modal2.php',
							data: {
								'skidka':skidka,
								'date':$("input[name='data']").val(),
								'time':time,
								'adress':$("input[name='adress']").val(),
								'test':serviceArr
							},
							dataType: "html",
							success: function(data) {
								
								var result = jQuery.parseJSON( data );
							
								$('#containerDetail').html(result.msg2); 
								
								
							}
						});
			} else {
	
				$('.msg').css('color','red');
				$('.msg').text('Вы что-то забыли выбрать');
			}
		});	
		
			
			$('body').on('click', 'button.blue-btn-2.modal-visit-stp2__btn', function () {
					cleanAddress = $("input[name='adress']").val().trim();
					cleanAddress = cleanAddress.slice(0,cleanAddress.indexOf('Телефон')-1);
			        $.ajax({
						type: "POST",
						url: '/ajax/order.php',
						data: {
							//'name': $("input.input-text.valid[name='name']").val(),
							'name': $("input.input-text[name='name']").val(),
							'step': $("input[name='step1']").val(),
							//'phone': $("input.input-text.valid[name='phone']").val(),
							'phone': $("input.input-text[name='phone']").val(),
							'adress': cleanAddress,
							'date': $("input[name='data']").val(),
							//'time': $("input.input-text.valid[name='time']").val(),
							'time':$('#select2-data_service-container').text(),
							'gender':$('.tab-sex-nav .active').attr('data-gender'),
							'card':$('#manModal .active .custom-radio__text').text().trim(),
							'cost':$('#manModal .b-modal-total__new-price').text().trim(),
							'test':serviceArr
						},
						dataType: "json",
						success: function(data) {
							
							var result = jQuery.parseJSON( data );
							$(".modalThank__order").text(result);
						}
					});
		 });
/*Отправка упрощенной формы записи
$('.simple-reg-form-button').on('click', function () {
	//alert('Отправка началась');
	//cleanAddress = $("input[name='client_name']").val().trim();
	//cleanAddress = cleanAddress.slice(0,cleanAddress.indexOf('Телефон')-1);
	$.ajax({
		type: "POST",
		url: 'ajax/order_simple.php',
		data: {
			'name': $("input.reg-form-input[name='client_name']").val(),
			'order_type': 'simple_order',
			'phone': $("input.reg-form-input[name='client_phone']").val(),
			'comments': $("textarea.reg-form-input[name='comments']").val()
			//'adress': cleanAddress,
			//'date': $("input[name='data']").val(),
			//'time': $("input.input-text.valid[name='time']").val(),
			//'time':$('#select2-data_service-container').text(),
			//'gender':$('.tab-sex-nav .active').attr('data-gender'),
			//'card':$('#manModal .active .custom-radio__text').text().trim(),
			//'cost':$('#manModal .b-modal-total__new-price').text().trim(),
			//'test':serviceArr
		},
		dataType: "json",
		success: function(data) {
			var result = jQuery.parseJSON( data );
			$(".modalThank__order").text(result);
			$(".reg-section input").val('');
			$(".reg-section textarea").text('');
			$(".reg-section").click();
		}
	});
});*/
			

	var kod='';
	var flag=false;
	$( ".sendCode" ).on('click', function(){
		var $divParent=$(this).parent('.modal-visit-stp2__row--code__code').parent('.modal-visit-stp2__row--code');
		var tel = $divParent.find('input').val();
		
		$.ajax({
			type: "POST",
			url: '/ajax/verif.php',
			data: {
				'phone':tel
			},
			dataType: "html",
			success: function(data) {
				console.log(data);
				kod=data;	
			}
		});
	});
		$('body').on('keyup', 'input#fieldCode-2', function () {
		var tel = $('input.input-text.phone_input.valid').val();
		if ($(this).val()==kod) {
			flag = true;
			$(".resend-code").html("<span>Верный код</span>");
			$(this).removeClass('error');
			$('button.blue-btn-2.modal-visit-stp2__btn.disabled').removeClass('disabled');
			return flag;
		}	else {
			$('button.blue-btn-2.modal-visit-stp2__btn.disabled').addClass('disabled');
		}		
	});
	
	/*регистрация*/
	$('body').on('submit', 'form.form-request-4.modal-visit__container.modalReg__container', function () {
		
			$.ajax({
				type: "POST",
				url: '/ajax/registr.php',
				data: 
					$(this).serialize(),
				dataType: "html",
				success: function(data) {
							if (data==1) {
				location.reload();
				}					
				}
			});
		

	});
	/*регистрация*/
	
	/*Авторизация мобилка*/
	$('body').on('submit', 'form.form-request-2.modalReg__container', function () {		
		if (flag=true) {
		$.ajax({
			type: "POST",		
			url: '/ajax/login.php',
			data: 
				$(this).serialize(),
			dataType: "html",
			success: function(data) {
				if (data==1) {
					location.reload();
				}else{
					$('.modal-visit-stp2__btn-row').before('<div class="error">Нет пользователя с данным телефоном</div>');
				}				
			}
		});
		}
	});
	/*Авторизация мобилка*/
	
	/*Авторизация email*/
	$('body').on('submit','form.form-request-3.modalReg__container', function () {
		$.ajax({
			type: "POST",
			url: '/ajax/login.php',
			data: 
				$(this).serialize(),
			dataType: "html",
			success: function(data) {
				if (data==1) {
					location.reload();
				}else {				
					$('.modal-visit-stp2__btn-row').before('<div class="error">Неверный логин или пароль</div>');
				}				
			}
		});
	});
	/*Авторизация email*/
	
	$('body').on('keyup', 'input#fieldCode-1', function () {
		var tel = $('input.input-text.phone_input.valid').val();
		if ($(this).val()==kod) {
			flag = true;
			$('#resendCode1').html("<span>Верный код</span>");
			$(this).removeClass('error');
			$('button.blue-btn-2.modal-visit-stp2__btn.disabled').removeClass('disabled');
			return flag;
		}		
	});
	
	$('body').on('keyup', 'input#fieldCode', function () {	
		
		var tel = $('input.input-text.phone_input.valid').val();
		var step=$('input[name="step1"]').val();
		if ($(this).val()==kod) {
			flag = true;
			$('#resendCode').html("<span>Верный код</span>");
			$(this).removeClass('error');
			$('button.blue-btn-2.modal-visit-stp2__btn.disabled').removeClass('disabled');
			return flag;
		}		
	});
	
	
	$( "input[name='cardRadio-1']" ).on('click', function(){
		var card = $(this).val();
		$("input[name='card']").val(card);
		$('form[name="modal-1"]').change();
		
	});
	$( ".tab-address-nav__item" ).on('click', function(){
		adress = $(this).text();
		$("input[name='adress']").val(adress);
		$('form[name="modal-1"]').change();
		

	});
$('form[name="modal-1"]').on('change',  function () {	
	var error=0;
	if (($("input[name='data']").val()=="") || ($("input[name='data']").val()=="") || (serviceArr.length<1) || ($("input[name='data']").val()==""))  {
		
		error++;
	}
	
	if (error==0) {
		$('button.blue-btn-2.b-form-btn-row__btn[data-target="#modal-visit-stp2"]').removeClass('disabled');
	} else {
		$('button.blue-btn-2.b-form-btn-row__btn[data-target="#modal-visit-stp2"]').addClass('disabled');
	}
});
	
	
	$( "input[name='cardRadio-1']" ).on('click', function(){
		var card = $(this).val();
		$("input[name='card']").val(card);
	});
	$( ".tab-address-nav__item" ).on('click', function(){
		adress = $(this).text();
		$("input[name='adress']").val(adress);

	});
/*прайс лист*/
$( ".check.full-price-pc-header__radio-item" ).on('click', function(){
		var sale = Number.parseInt($(this).attr('data-price'));
		skidka=(100-sale)/100;
		
		 $('span[data-name="price"]' ).each(function( index, element ) {

		price=$(this).attr('data-price');
		cardPrice=$(this).attr('data-sale');
		if (cardPrice == 0 || cardPrice == NaN)
			$(this).text(Math.ceil(price*skidka));
		else if (skidka < 1)
			$(this).text(cardPrice);
		else $(this).text(price);

		//БакановПВ - изменияем названия столбцов с ценами
			 	if (sale == 0) 
			 {
				$('.full-price-pc-container-item__table th:first-child').text('Без карты, ₽');
				$('.full-price-pc-container-item__table th:last-child').text('Без карты, ₽');
			 }
				else 
			{
				$('.full-price-pc-container-item__table th:first-child').text('С картой, ₽');
				$('.full-price-pc-container-item__table th:last-child').text('С картой, ₽');
			 }
		//БакановПВ - изменияем названия столбцов с ценами - КОНЕЦ
		 });
		//$('span[data-name="price"]').text(price*skidka);
	});

/*прайс лист*/
/*единичная страница*/
$('a.blue-btn-2.b-procedure-inf__btn').on('click',  function () {
	var select_val=$(this).attr('data-id');
	gender="wooman";
	$('.b-removal-dl[data-id="'+select_val+'"]').trigger('click');
				 $.ajax({
				type: "POST",
				url: '/ajax/modal1.php',
				data: {
					'skidka':skidka,
					'gender':gender,
					'test':serviceArr
				},
				dataType: "html",
				success: function(data) {
				
					var result = jQuery.parseJSON( data );
				
					//$('.item_service').html(result.msg); 
				
						/*
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('show'); 
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('active'); 
						$('.tab-content>.tab-pane[data-gender="'+result.gender+'"]').addClass('in'); 
						$('.tab-sex-nav li[data-gender="'+result.gender+'"]').addClass('active');*/
						$('.item_service[data-gender="'+result.gender+'"]').html(result.msg); 
						$( ".tab-pane.fade.show.active.in" ).children( ".b-modal-service" ).children( ".b-modal-service-list" ).children( ".item_service" ).html(result.msg); 
					
					
					$('.b-modal-total__new-price').val(result.total);
					$('.b-modal-total__new-price').text(result.total);
					return total_price_service2;
				}
			});
	
});

/*единичная страница*/