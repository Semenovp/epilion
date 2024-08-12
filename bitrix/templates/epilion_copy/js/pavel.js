$( ".check.full-price-pc-header__radio-item" ).on('click', function(){
		var sale = Number.parseInt($(this).attr('data-price'));
		skidka=(100-sale)/100;
		
		 $('span[data-name="price"]' ).each(function( index, element ) {
			
		price=$(this).attr('data-price');

		$(this).text(Math.ceil(price*skidka));

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
	});