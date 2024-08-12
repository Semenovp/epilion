<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */

$this->setFrameMode(true);


if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

?>
      <!-- Баннер-->
	  <section class="ser-banner ser-banner--v2">
        <div class="ser-banner--v2__pc ser-banner--v2__pc--bg-pos-right" style="background-image: url(<?=$arResult['PICTURE']['SRC'];?>)"></div>
        <div class="ser-banner--v2__ipad ser-banner--v2__ipad--bg-pos-right" style="background-image: url(&quot;img/lazer/banner/2.jpg&quot;)"></div>
        <div class="ser-banner--v2__mobile" style="background-image: url(&quot;img/lazer/banner/3.jpg&quot;)"></div>
        <div class="container">
          <div class="b-ser-ban b-ser-ban--dark">
            <h1 class="h1 b-ser-ban__h1"><?=$arResult['NAME'];?></h1>
            <div class="b-ser-ban__txt">
              <?=$arResult['UF_BANER_TEXT'];?>
              
            </div>
          </div>
        </div>
      </section>
      <!-- Выбор зон-->
      <section class="select-zone">
        <div class="container">
          <div class="breadcrumb"><a class="breadcrumb__item" href="index.html">Главная</a><a class="breadcrumb__item" href="service.html">Услуги</a></div>
          <div class="tab-zone">
            <ul class="tab-zone-nav">
			<?$my_sections = CIBlockSection::GetList (Array("ID" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$arResult['ID']),false, Array('ID', 'NAME', 'CODE'));
				$i=0;
			   while($ar_fields = $my_sections->GetNext()) {?>	  
				<li <?if($i===0) {?>class="active"<?}?>><a class="tab-zone-nav__item" href="#<?=$ar_fields['CODE'];?>" data-toggle="tab"><?=$ar_fields['NAME'];?></a></li>
			  <?$i++;?>
			  <?}?>
            </ul>
            <div class="tab-content tab-zone-content">
			<?$my_sections = CIBlockSection::GetList (Array("ID" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$arResult['ID']),false, Array('ID', 'NAME', 'CODE'));
			$i=0;
			 while($ar_fields = $my_sections->GetNext()) {?>
			<!-- Таб для гендера-->
              <div class="tab-pane fade show <?if ($i===0) {?>active in<?}?>" id="<?=$ar_fields['CODE'];?>">
                <div class="c-tab-zone">
                  <div class="c-tab-zone__tab">
                    <div class="c-tab-zone__select">
                      <h3 class="h3 c-tab-zone__h3">Стоимость процедур</h3>
                    </div>
                    <div class="c-tab-zone__radio-list">
                      <div class="check c-tab-zone__radio-item">
                        <input id="q1" type="radio" name="cardRadioGirl" value="Нет карты" checked>
                        <label for="q1">Нет карты</label>
                      </div>
                      <div class="check c-tab-zone__radio-item">
                        <input id="q2" type="radio" name="cardRadioGirl" value="Клубная карта GOLD">
                        <label for="q2">Клубная карта GOLD<span class="help custom-tooltip" title="Цена с клубной картай GOLD" data-toggle="tooltip" data-placement="bottom">
                            <svg class="icon icon-help help__ico">
                              <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#help"></use>
                            </svg></span></label>
                      </div>
                      <div class="check c-tab-zone__radio-item">
                        <input id="q3" type="radio" name="cardRadioGirl" value="Клубная карта PLATINUM">
                        <label for="q3">Клубная карта PLATINUM<span class="help custom-tooltip" title="Цена с клубной картай PLATINUM" data-toggle="tooltip" data-placement="bottom">
                            <svg class="icon icon-help help__ico">
                              <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#help"></use>
                            </svg></span></label>
                      </div>
                    </div>
                    <div class="tab-zone-2">
                      <ul class="tab-zone-2-nav">
					 <? 
					
					 $key2=0;
					 $my_sections2 = CIBlockSection::GetList (
						  Array("ID" => "ASC"),
						  Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], 'SECTION_ID'=>$ar_fields['ID']),
						  false,
						  Array('ID', 'NAME', 'CODE')
					   );
					 while($ar_fields2 = $my_sections2->GetNext())
						{
							
						?>
						
					 <li  <?if ($key2===0) {?>class="active"<?}?>><a class="tab-zone-2-nav__item" href="#zone-<?=$key2;?>" data-toggle="tab">Женщинам<?=$ar_fields2['NAME'];?></a></li>
						<?$key2++;?>
						<?}?>
                      </ul>
                      <div class="tab-content tab-zone-2-content">
					  <?
					  $key2=0;
					  $my_sections2 = CIBlockSection::GetList (
						  Array("ID" => "ASC"),
						  Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], 'SECTION_ID'=>$ar_fields['ID']),
						  false,
						  Array('ID', 'NAME', 'CODE','PICTURE')
					   );
					 while($ar_fields2 = $my_sections2->GetNext())
						{

							?>
                        <div class="tab-pane fade show <?if ($key2===0) {?>active in<?}?>" id="zone-<?=$key2;?>">
                          <div class="b-removal">
                            <div class="b-removal-pic-container">
                              <div class="b-removal-pic b-removal-pic-1">
								<img src="<?=CFile::GetPath($ar_fields2['PICTURE']);?>" alt="">
								<?
								$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRICE1","PROPERTY_ZONE");
								$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields2['ID'], "ACTIVE"=>"Y");
								$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
								while($ob = $res->GetNextElement())
								{
								 $arFields = $ob->GetFields();
								 
								 print_r($arFields);
								?>
                                <div class="zone-mini-style" id="z_w_<?=$arFields['ID'];?>" data-name="<?=$arFields['NAME'];?>"  style="background-image: url(<?=CFile::GetPath($arFields['PROPERTY_ZONE_VALUE']);?>);"></div>
								<?}?>
							  </div>
								
                            </div>
                            <dl class="b-removal-dl-inf">
                              <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
                              <dd class="b-removal-dl-inf__dd">Цена по карте</dd>
                            </dl>
								<?
								$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRICE1");
								$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields2['ID'], "ACTIVE"=>"Y");
								$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
								while($ob = $res->GetNextElement())
								{
								 $arFields = $ob->GetFields();

								
								?>
							<dl class="b-removal-dl" data-id="<?=$arFields['ID'];?>" data-pareny="<?=$ar_fields2['NAME'];?>" data-price="<?=$arFields['PROPERTY_PRICE1_VALUE'];?>" data-name="<?=$arFields['NAME'];?>">
                              <dt class="b-removal-dl__dt">
								  <span class="b-removal-ico">
									<span class="b-removal-ico__plus">
											<svg class="icon icon-plus b-removal-ico__ico-plus">
											  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#plus"></use>
											</svg>
									</span>
									<span class="b-removal-ico__minus">
											<svg class="icon icon-minus b-removal-ico__ico-minus">
											  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#minus"></use>
											</svg>
									</span>
								 </span>
									<span class="b-removal-dl__title"><?=$arFields['NAME'];?></span>
									
							</dt>
                              <dd class="b-removal-dl__dd"><span class="b-removal-dl__price"><?=$arFields['PROPERTY_PRICE1_VALUE'];?><span class="help custom-tooltip" title="<?=$arFields['NAME'];?>" data-toggle="tooltip" data-placement="bottom">
                                    <svg class="icon icon-help help__ico">
                                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#help"></use>
                                    </svg></span></span>
							 </dd>
                           </dl>
								<?
								}
								?>                            								
							

                           
                            
                          </div>
                        </div>
						<?
						$key2++;
							}
						?>
        
                      </div>
                      <div class="b-removal-total">
                        <div class="b-removal-total__content">
                          <div class="b-removal-total__txt">
                            <p>Тут должно быть краткое описание того, что нужно сделать, чтобы добавить услуги в список</p>
                          </div>
                          <div class="b-total">
                            <div class="b-total__summ">Общая стоимость: <span class="nowrap total" value=0>2 190 ₽</span></div>
                            <div class="b-total__sale">Ваша скидка по клубной карте <span>0</span> ₽</div>
                            <div class="b-removal-tag">
                   
                              <div class="b-removal-tag__item">Ягодицы
                                <button class="clear-btn" type="button">
                                  <svg class="icon icon-close_big clear-btn__ico">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#close_big"></use>
                                  </svg>
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="b-removal-total__btn-row"><a class="blue-btn b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
                      </div>
                    </div>
                  </div>
                  <div class="c-tab-zone__txt">
                    <div class="c-tab-zone__text">
                      <?=$arResult['DESCRIPTION'];?>
                    </div>
                  </div>
                </div>
              </div>
			  <?$i++;?>
				<?}?>
              <!-- Таб для гендера-->
            </div>
          </div>
        </div>
      </section>
      <!-- Контакты 2-->
      <section class="main-contact_2">
        <div class="container">
          <div class="b-main-contact_2"><a class="b-phone-c_2 b-main-contact_2__item" href="tel:+79008009988"><span class="b-phone-c_2__pic">
                <svg class="icon icon-phone-2 b-phone-c_2__ico">
                  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#phone-2"></use>
                </svg></span><span class="b-phone-c_2__txt">+7 (900) 800 99 88</span></a>
            <div class="b-locate-c_2 b-main-contact_2__item"><span class="b-locate-c_2__pic">
                <svg class="icon icon-locate-2 b-locate-c_2__ico">
                  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#locate-2"></use>
                </svg></span><span class="b-locate-c_2__txt">г. Ростов-на-Дону Ул. ХХХХХХХХ дом. ХХХХХ пом. ХХ</span></div><a class="b-mail-c_2 b-main-contact_2__item" href="mailto:mail@epilion.ru"><span class="b-mail-c_2__pic">
                <svg class="icon icon-mail b-mail-c_2__ico">
                  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#mail"></use>
                </svg></span><span class="b-mail-c_2__txt">mail@epilion.ru</span></a>
          </div>
        </div>
      </section>
      <!-- Список оборудования-->
      <section class="device">
        <div class="container-1200">
          <div class="b-device">
            <div class="b-device-item">
              <h3 class="h3 b-device-item__h3">Наше оборудование</h3>
              <div class="b-device-item__pic"><img src="<?=CFile::GetPath($arResult['PHOTO_OBORUD']);?>" alt=""></div>
              <div class="b-device-item__content">
              <? echo $arResult['OBORUD'];?>
              </div>
            </div>
            <div class="b-device-item">
              <h3 class="h3 b-device-item__h3">Подготовка перед эпиляцией</h3><a class="b-device-item__pic b-about-service-video fancybox" href="https://youtu.be/Vx6W96H5q4Q" data-fancybox-group=""><img src="<?=CFile::GetPath($arResult['PHOTO_PODGOTOVKA']);?>" alt="">
                <div class="b-about-service-video__layout"><span class="play-btn play-btn--size74">
                    <svg class="icon icon-play play-btn__ico">
                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#play"></use>
                    </svg></span></div></a>
              <div class="b-device-item__content">
					<? echo $arResult['PODGOTOVKA'];?>
              </div>
            </div>
            <div class="b-device-item">
              <h3 class="h3 b-device-item__h3">Как проходит процедура лазерной эпиляции</h3><a class="b-device-item__pic b-about-service-video fancybox" href="https://youtu.be/Vx6W96H5q4Q" data-fancybox-group=""><img src="<?=CFile::GetPath($arResult['PHOTO_PROCESS']);?>" alt="">
                <div class="b-about-service-video__layout"><span class="play-btn play-btn--size74">
                    <svg class="icon icon-play play-btn__ico">
                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#play"></use>
                    </svg></span></div></a>
              <div class="b-device-item__content">
				<? echo $arResult['PROCESS'];?>
              </div>
            </div>
            <div class="b-device-item">
              <h3 class="h3 b-device-item__h3">Уход за собой после процедуры</h3>
              <div class="b-device-item__pic"><img src="<?=CFile::GetPath($arResult['PHOTO_POSLE']);?>" alt=""></div>
              <div class="b-device-item__content">
                <? echo $arResult['POSLE'];?>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Показания - Противопоказания-->
      <section class="indications-contraindications">
        <div class="container">
          <div class="b-ind-cont">
            <div class="b-indications">
              <h3 class="h3 indications-contraindications__h3">Показания</h3>
              <p>Лазерная эпиляция показана всем, кто хочет быстро и на короткий срок избавиться от нежелательных волос на теле. Существуют случаи, когда только этот метод становится единственным решением для достижения гладкой кожи, а другие способы использовать невозможно.</p>
              <p>К показаниям относится:</p>
              <ul class="custom-ul custom-ul--padding">
                <li>быстрый и обильный рост волос на теле;</li>
                <li>наличие большого количества вросших волос;</li>
                <li>фолликулит (воспаление волосяных фолликулов);</li>
                <li>сильная боль или раздражение кожи при других видах эпиляции.</li>
              </ul>
              <p>Во всех этих случаях удаление волос лазером поможет забыть о неприятных ощущениях, надолго устранить лишнюю растительность и значительно облегчить жизнь.</p>
            </div>
            <div class="b-contraindications">
              <h3 class="h3 indications-contraindications__h3">Противопоказания</h3>
              <p>Перед процедурой лазерной эпиляции стоит ознакомиться с противопоказаниями, при которых процедура не рекомендуется:</p>
              <ul class="custom-ul custom-ul--padding">
                <li>беременность и лактация;</li>
                <li>варикоз 2 и более степени;</li>
                <li>истинный фотодерматит;</li>
                <li>герпес;</li>
                <li>псориаз;</li>
                <li>волосяные родимые пятна и келоидные рубцы в области обработки;</li>
                <li>множественные родинки;</li>
                <li>повышенная чувствительность к свету;</li>
                <li>нарушения свертываемости крови;</li>
                <li>сахарный диабет;</li>
                <li>эпилепсия;</li>
                <li>онкологические заболевания;</li>
                <li>некоторые вирусные патологии;</li>
                <li>прием гормональных и некоторых из обезболивающих средств (предварительно нужна консультация врача).</li>
              </ul>
              <p>Если появятся побочные эффекты, вы можете обратиться к специалистам центра и получить от них консультацию. Мастера расскажут и то, когда нужен следующий сеанс, и каким будет общее количество процедур.</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Видео наших процедур-->
     
    


		<script>
		var arr = [];		// Создать пустой массив
		var total_price_service2;
		var serviceArr = [];
		var time;
		var date;
		$('a.tab-zone-2-nav__item').on('click', function() {
			
			var chast=$(this).text();
			var pos = arr.indexOf(chast);
			
			if (pos==-1) {
				arr.push(chast);
			}
		
			
				return arr;
		});	
		
		
		
		$('a.blue-btn.b-removal-total__btn').on('click', function() {
		
			 $.ajax({
				type: "POST",
				url: '/ajax/order.php',
				data: {
					'test':serviceArr
				},
				dataType: "html",
				success: function(data) {
				
					var result = jQuery.parseJSON( data );
					
					$('.item_service').html(result.msg); 
					var sum = 0;

					$('span.b-modal-service-list-item__price').each(function() {
						  sum = sum + parseInt($(this).text());
						  
					});
					total_price_service2=sum;
					$('.b-modal-total__new-price').val(sum);
					$('.b-modal-total__new-price').text(sum);
					return total_price_service2;
				}
			});
		});
		$("#data_service").select2().on("select2:select", function (e) {	
		  time = $(this).val();
		
		$("input[name='time']").val(time);
		return time;

	});
	$('#datepicker').datepicker( {
        onSelect: function(date) {
           // alert(date);
			$("input[name='data']").val(date);
        }
    });
	$("#service_choice").select2()
	.on("select2:select", function (e) {	
			var total_price=Number($('.b-modal-total__new-price').val());
			
			 var select_val = Number($(this).val());
			 
			  serviceArr.push(select_val);
			 	 $.ajax({
						type: "POST",
						url: '/ajax/order.php',
						data: {
							'test':serviceArr
						},
						dataType: "html",
						success: function(data) {

							var result = jQuery.parseJSON( data );
							
							$('.item_service').html(result.msg); 
							var sum = 0;

							$('span.b-modal-service-list-item__price').each(function() {
								  sum = sum + parseInt($(this).text());
								  
							});
							total_price_service2=sum;
							$('.b-modal-total__new-price').val(sum);
							$('.b-modal-total__new-price').text(sum);
							return total_price_service2;
						}
					});
			 total_price=total_price+select_val;
			  
			 $('.b-modal-total__new-price').text(total_price);
			 $('.b-modal-total__new-price').val(total_price);
	});
	
		$('button#btn_step1').on('click', function() {
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
							url: '/ajax/order.php',
							data: {
								'test':serviceArr
							},
							dataType: "html",
							success: function(data) {
								
								var result = jQuery.parseJSON( data );
								
								$('.modal-st2-detail__list').html(result.msg2); 
								
								$('.span.modal-st2-detail__price-service').each(function() {
									  sum = sum + parseInt($(this).text());
									 
								});
									$('#modal-visit').removeClass('in');
									$('#modal-visit').css('display','none');
									$('#modal-visit-stp2').addClass('in');
									$('#modal-visit-stp2').css('display','block');
								$('.modal-st2-detail__total-price').text(total_price_service2);
							}
						});
			} else {
				$('.msg').css('color','red');
				$('.msg').text('Вы что-то забыли выбрать');
			}
		});	
		
		$('.b-removal-dl').on('click', function() {
			var service_price=Number($(this).attr('data-price'));
			var service_name=$(this).attr('data-name');
			 var total_price_service=Number($('.total').val());
			 
			 var id=$(this).attr('data-id');
			if (serviceArr.indexOf(id) == -1) {
			 serviceArr.push(id);
			 
			}
			 for(var i = 0; i < serviceArr.length; i++) {
				// alert(serviceArr[i]);
			 }
			
			if (serviceArr.length>0) {
				$('a.blue-btn.b-removal-total__btn.disabled').removeClass('disabled');
			} 
			if($(this).hasClass("active")) {
				$('.b-removal-tag__item[data-name="'+service_name+'"]').remove();
				$('.zone-mini-style[data-name="'+service_name+'"]').removeClass('active');			
				$(this).removeClass('active');		
				 total_price_service2=total_price_service-service_price;
				$('.total').text(total_price_service2);
				$('.total').val(total_price_service2);
				$('.b-removal-tag__item[data-name="'+service_name+'"]').remove();
			} else {
				$(this).addClass('active');		
				total_price_service2=total_price_service+service_price;
				$('.total').text(total_price_service2);
				$('.total').val(total_price_service2);
			}
			return total_price_service2;
			
		});
		
		
		
			$('body').on('click', '.b-removal-tag__item', function () {
				
				var price=Number($(this).attr('data-price'));
				var service_name=$(this).attr('data-name');
				
				total_price_service2=total_price_service2-price;
				$(this).remove();
				$('.total').text(total_price_service2);
				$('.total').val(total_price_service2);
				$('.b-removal-dl[data-name="'+service_name+'"]').removeClass('active');
				return total_price_service2;
				
			});
			
			$('body').on('click', 'button.blue-btn-2.modal-visit-stp2__btn', function () {
					
			        $.ajax({
						type: "POST",
						url: '/ajax/order.php',
						data: {
							'name': $("input.input-text.valid[name='name']").val(),
							'step': $("input[name='step1']").val(),
							'phone': $("input.input-text.valid[name='phone']").val(),
							'test':serviceArr
						},
						dataType: "json",
						success: function(data) {
							
							var result = jQuery.parseJSON( data );
							
							alert(result.msg); 
						
						

						}
					});
		 });
			
		</script>
		<?

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BASKET_URL: '<?=$arParams['BASKET_URL']?>',
		ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});
	var <?=$obName?> = new JCCatalogSectionComponent({
		siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
		componentPath: '<?=CUtil::JSEscape($componentPath)?>',
		navParams: <?=CUtil::PhpToJSObject($navParams)?>,
		deferredLoad: false, // enable it for deferred load
		initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
		bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
		lazyLoad: !!'<?=$showLazyLoad?>',
		loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
		template: '<?=CUtil::JSEscape($signedTemplate)?>',
		ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
		parameters: '<?=CUtil::JSEscape($signedParams)?>',
		container: '<?=$containerName?>'
	});
</script>
<!-- component-end -->