<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>


<section class="procedure-inf">
        <div class="container-1200">
          <div class="b-procedure-inf">
            <div class="b-procedure-inf__txt">
              <div class="cut-text">
                <h3 class="h3 b-procedure-inf__h3">Подробнее о процедуре <span class="semibold"><?=$arResult["NAME"];?></span></h3>
               <?=$arResult["DESCRIPTION"];?>
              </div>
            </div>
            <div class="b-procedure-inf__pic-container">
              <div class="b-procedure-inf__bage-list"><span class="bage-price b-procedure-inf__bage-item">
                  <svg class="icon icon-rub bage-price__ico">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#rub"></use>
                  </svg>от 2 190</span><span class="bage-time b-procedure-inf__bage-item">
                  <svg class="icon icon-clock-2 bage-time__ico">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#clock-2"></use>
                  </svg>01:20</span></div>
              <div class="b-procedure-inf__image"><img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" alt=""></div>
            </div>
            <div class="b-procedure-inf__footer">
              <div class="b-procedure-inf__footer-left">
                <div class="b-procedure-inf__total-sale"><span>Стоимость с клубной картой:</span><span><?=$arResult["PROPERTIES"]["PRICE2"]["VALUE"];?> ₽</span></div>
                <div class="b-procedure-inf__total"><span>Стоимость без карты:</span><span><?=$arResult["PROPERTIES"]["PRICE1"]["VALUE"];?> ₽</span></div>
              </div>
              <div class="b-procedure-inf__footer-right"><a class="blue-btn-2 b-procedure-inf__btn" href="#" data-id="<?=$arResult["ID"];?>" data-price="<?=$arResult["PROPERTY_PRICE1"]["VALUE"];?>" data-sale="<?=$arResult["PROPERTY_PRICE2"]["VALUE"];?>" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Выбор зон-->
      <section class="select-procedure" id="procedureZone">
        <div class="container-1200">
          <h3 class="h3 select-procedure__h3">С этой процедурой также выбирают</h3>
          <div class="b-select-procedure">
		  
           
    		 <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"element_more", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
		"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
		"PROPERTY_CODE" => array(
			0 => "TITLE_SERVICE",
			1 => "HELP",
			2 => "GENDER",
			3 => "TIME",
			4 => "PRICE2",
			5 => "PRICE3",
			6 => "PRICE1",
			7 => "SERVICE_TYPE",
			8 => "tm",
			9 => "country",
			10 => "cover",
			11 => "",
		),
		"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"SET_TITLE" => "N",
		"MESSAGE_404" => $arParams["~MESSAGE_404"],
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"FILE_404" => $arParams["FILE_404"],
		"DISPLAY_COMPARE" => "N",
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => "",
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"])?$arParams["PRODUCT_PROPERTIES"]:[]),
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
		"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
		"LAZY_LOAD" => $arParams["LAZY_LOAD"],
		"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
		"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],
		"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"])?$arParams["OFFERS_CART_PROPERTIES"]:[]),
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"])?$arParams["LIST_OFFERS_PROPERTY_CODE"]:[]),
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
		"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"])?$arParams["LIST_OFFERS_LIMIT"]:0),
		"SECTION_ID" => $arResult["IBLOCK_SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
		"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
		"CURRENCY_ID" => $arParams["CURRENCY_ID"],
		"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
		"HIDE_NOT_AVAILABLE_OFFERS" => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
		"SECTION_USER_FIELDS" => array(
			0 => "UF_ICONS",
			1 => "UF_USLUGA",
			2 => "UF_SEO",
			3 => "UF_BANER_TEXT",
			4 => "UF_BANNER_PC",
			5 => "UF_BANNER_IPAD",
			6 => "UF_BANNER_MOBILE",
			7 => "UF_PHOTO_ZH",
			8 => "UF_PHOTO_M",
		),
		"LABEL_PROP" => "",
		"LABEL_PROP_MOBILE" => "",
		"LABEL_PROP_POSITION" => $arParams["LABEL_PROP_POSITION"],
		"ADD_PICT_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => $arParams["PRODUCT_DISPLAY_MODE"],
		"PRODUCT_BLOCKS_ORDER" => $arParams["LIST_PRODUCT_BLOCKS_ORDER"],
		"PRODUCT_ROW_VARIANTS" => "[]",
		"ENLARGE_PRODUCT" => "STRICT",
		"ENLARGE_PROP" => isset($arParams["LIST_ENLARGE_PROP"])?$arParams["LIST_ENLARGE_PROP"]:"",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => isset($arParams["LIST_SLIDER_INTERVAL"])?$arParams["LIST_SLIDER_INTERVAL"]:"",
		"SLIDER_PROGRESS" => isset($arParams["LIST_SLIDER_PROGRESS"])?$arParams["LIST_SLIDER_PROGRESS"]:"",
		"OFFER_ADD_PICT_PROP" => $arParams["OFFER_ADD_PICT_PROP"],
		"OFFER_TREE_PROPS" => (isset($arParams["OFFER_TREE_PROPS"])?$arParams["OFFER_TREE_PROPS"]:[]),
		"PRODUCT_SUBSCRIPTION" => "N",
		"SHOW_DISCOUNT_PERCENT" => $arParams["SHOW_DISCOUNT_PERCENT"],
		"DISCOUNT_PERCENT_POSITION" => $arParams["DISCOUNT_PERCENT_POSITION"],
		"SHOW_OLD_PRICE" => $arParams["SHOW_OLD_PRICE"],
		"SHOW_MAX_QUANTITY" => $arParams["SHOW_MAX_QUANTITY"],
		"MESS_SHOW_MAX_QUANTITY" => (isset($arParams["~MESS_SHOW_MAX_QUANTITY"])?$arParams["~MESS_SHOW_MAX_QUANTITY"]:""),
		"RELATIVE_QUANTITY_FACTOR" => (isset($arParams["RELATIVE_QUANTITY_FACTOR"])?$arParams["RELATIVE_QUANTITY_FACTOR"]:""),
		"MESS_RELATIVE_QUANTITY_MANY" => (isset($arParams["~MESS_RELATIVE_QUANTITY_MANY"])?$arParams["~MESS_RELATIVE_QUANTITY_MANY"]:""),
		"MESS_RELATIVE_QUANTITY_FEW" => (isset($arParams["~MESS_RELATIVE_QUANTITY_FEW"])?$arParams["~MESS_RELATIVE_QUANTITY_FEW"]:""),
		"MESS_BTN_BUY" => (isset($arParams["~MESS_BTN_BUY"])?$arParams["~MESS_BTN_BUY"]:""),
		"MESS_BTN_ADD_TO_BASKET" => (isset($arParams["~MESS_BTN_ADD_TO_BASKET"])?$arParams["~MESS_BTN_ADD_TO_BASKET"]:""),
		"MESS_BTN_SUBSCRIBE" => (isset($arParams["~MESS_BTN_SUBSCRIBE"])?$arParams["~MESS_BTN_SUBSCRIBE"]:""),
		"MESS_BTN_DETAIL" => (isset($arParams["~MESS_BTN_DETAIL"])?$arParams["~MESS_BTN_DETAIL"]:""),
		"MESS_NOT_AVAILABLE" => (isset($arParams["~MESS_NOT_AVAILABLE"])?$arParams["~MESS_NOT_AVAILABLE"]:""),
		"MESS_BTN_COMPARE" => (isset($arParams["~MESS_BTN_COMPARE"])?$arParams["~MESS_BTN_COMPARE"]:""),
		"USE_ENHANCED_ECOMMERCE" => "N",
		"DATA_LAYER_NAME" => (isset($arParams["DATA_LAYER_NAME"])?$arParams["DATA_LAYER_NAME"]:""),
		"BRAND_PROPERTY" => (isset($arParams["BRAND_PROPERTY"])?$arParams["BRAND_PROPERTY"]:""),
		"TEMPLATE_THEME" => (isset($arParams["TEMPLATE_THEME"])?$arParams["TEMPLATE_THEME"]:""),
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => $basketAction,
		"SHOW_CLOSE_POPUP" => isset($arParams["COMMON_SHOW_CLOSE_POPUP"])?$arParams["COMMON_SHOW_CLOSE_POPUP"]:"",
		"COMPARE_PATH" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
		"COMPARE_NAME" => $arParams["COMPARE_NAME"],
		"USE_COMPARE_LIST" => "Y",
		"BACKGROUND_IMAGE" => (isset($arParams["SECTION_BACKGROUND_IMAGE"])?$arParams["SECTION_BACKGROUND_IMAGE"]:""),
		"COMPATIBLE_MODE" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => (isset($arParams["DISABLE_INIT_JS_IN_COMPONENT"])?$arParams["DISABLE_INIT_JS_IN_COMPONENT"]:""),
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENT_COUNT" => "0",
		"VIEW_MODE" => "SECTION",
		"ROTATE_TIMER" => "30",
		"SHOW_PAGINATION" => "N",
		"SEF_MODE" => "N",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_BROWSER_TITLE" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_META_DESCRIPTION" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y"
	),
	false
);
			?>
          </div>
          <div class="select-procedure__btn-row"><a class="blue-border-btn select-procedure__btn no-active" id="btnShowZone" href="javascript: void(0);">Смотреть все цены</a></div>
         <?/*
		 <form class="select-zone-2 hidden" id="selectZone2" action="" method="">
            <div class="c-tab-zone__radio-list">
              <div class="check c-tab-zone__radio-item">
                <input id="q1" type="radio" name="cardRadioGirl" value="Нет карты" checked>
                <label for="q1">Нет карты</label>
              </div>
			  
			<?foreach($arResult['CARD'] as $key =>$card):?>	
				  <div class="check c-tab-zone__radio-item" data-price="<?=$card['SALE']?>">
					<input id="q1<?=$tab['CODE'];?><?=$key?>" type="radio" name="cardRadioGirl" value="<?=$card['NAME'];?>">
					<label for="q1<?=$tab['CODE'];?><?=$key?>"><?=$card['NAME'];?><span class="help custom-tooltip" title="<?=$card['NAME'];?>" data-toggle="tooltip" data-placement="bottom">
						<svg class="icon icon-help help__ico">
						  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
						</svg></span></label>
				  </div>
				<?endforeach;?>
              
            </div>
			
            <div class="tab-zone-2">
              <ul class="tab-zone-2-nav">
                <li class="active"><a class="tab-zone-2-nav__item" href="#zone-1" data-toggle="tab">Лицо</a></li>
                <?
							$my_sections = CIBlockSection::GetList (Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$arResult['IBLOCK_SECTION_ID']),false, Array('ID', 'NAME', 'CODE'));
							$i=0;
							while($ar_fields = $my_sections->GetNext()) {?>	  
								<li <?if($i==0) {?>class="active"<?}?>>
									<a class="tab-zone-2-nav__item" href="#zone-<?=$ar_fields['ID']?>" data-toggle="tab"><?echo $ar_fields['NAME'];?></a>
								</li>
							  <?$i++;?>
						  <?}?>
              </ul>
              <div class="tab-content tab-zone-2-content">
                <div class="tab-pane fade show active in" id="zone-1">
                  <div class="b-removal">
                    <div class="b-removal-pic-container">
                      <div class="b-removal-pic b-removal-pic-1"><img src="<?= SITE_TEMPLATE_PATH ?>/img/zone/g1.jpg" alt="">
                        <div class="zone-mini-style active" id="z_w_1" title="Шея" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/1.svg);"></div>
                        <div class="zone-mini-style" id="z_w_2" title="Щеки" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/2.svg);"></div>
                        <div class="zone-mini-style" id="z_w_3" title="Бакенбарды" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/3.svg);"></div>
                        <div class="zone-mini-style" id="z_w_4" title="Побородок" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/4.svg);"></div>
                        <div class="zone-mini-style" id="z_w_5" title="Верхняя губа" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/5.svg);"></div>
                        <div class="zone-mini-style" id="z_w_6" title="Лоб" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/6.svg);"></div>
                        <div class="zone-mini-style" id="z_w_7" title="Лицо полностью" style="background-image: url(<?= SITE_TEMPLATE_PATH ?>/img/zone-mini-masc/woman/face/7.svg);"></div>
                      </div>
                    </div>
                    <div class="b-removal-pic-container__price-container">
                      <dl class="b-removal-dl-inf">
                        <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
                        <dd class="b-removal-dl-inf__dd">Цена по карте</dd>
                      </dl>
                      
                      
                      <dl class="b-removal-dl">
                        <dt class="b-removal-dl__dt"><span class="b-removal-ico"><span class="b-removal-ico__plus">
                              <svg class="icon icon-plus b-removal-ico__ico-plus">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#plus"></use>
                              </svg></span><span class="b-removal-ico__minus">
                              <svg class="icon icon-minus b-removal-ico__ico-minus">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#minus"></use>
                              </svg></span></span><span class="b-removal-dl__title">Шея<span class="help custom-tooltip" title="Передняя или задняя поверхность" data-toggle="tooltip" data-placement="bottom">
                              <svg class="icon icon-help help__ico">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
                              </svg></span></span></dt>
                        <dd class="b-removal-dl__dd"><span class="b-removal-dl__price">3 000</span></dd>
                      </dl>
                    </div>
                  </div>
                </div>
                
                
                
              </div>
              <div class="b-removal-total">
                <div class="b-removal-total__content">
                  <div class="b-removal-total__txt">
                    <p>Тут должно быть краткое описание того, что нужно сделать, чтобы добавить услуги в список</p>
                  </div>
                  <div class="b-total">
                    <div class="b-total__summ">Общая стоимость: <span class="nowrap">2 190 ₽</span></div>
                    <div class="b-total__sale">Ваша скидка по клубной карте <span class="nowrap">900 ₽</span></div>
                    <div class="b-removal-tag">
                      <div class="b-removal-tag__item">Голень + колено + пальцы
                        <button class="clear-btn" type="button">
                          <svg class="icon icon-close_big clear-btn__ico">
                            <use xlink:href="img/svg-sprite/sprite.svg#close_big"></use>
                          </svg>
                        </button>
                      </div>
                      <div class="b-removal-tag__item">Ягодицы
                        <button class="clear-btn" type="button">
                          <svg class="icon icon-close_big clear-btn__ico">
                            <use xlink:href="img/svg-sprite/sprite.svg#close_big"></use>
                          </svg>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
              </div>
            </div>
          </form>*/
		  ?>
        </div>
      </section>
      <!-- Подготовка перед эпиляцией-->

