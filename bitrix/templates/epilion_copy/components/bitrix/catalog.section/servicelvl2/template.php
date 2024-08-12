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
      <section class="ser-banner ser-banner--v3">
	   <div class="ser-banner--v2__pc ser-banner--v2__pc--bg-pos-right" style="background-image: url(<?= CFile::GetPath(   $arResult['UF_BANNER_PC']) ?>)"></div>
        <div class="ser-banner--v2__ipad ser-banner--v2__ipad--bg-pos-right" style="background-image: url(<?= CFile::GetPath(   $arResult['UF_BANNER_IPAD']) ?>)"></div>
        <div class="ser-banner--v2__mobile" style="background-image: url(<?= CFile::GetPath(   $arResult['UF_BANNER_MOBILE']) ?>)"></div>
        <div class="container">
          <div class="b-ser-ban b-ser-ban--dark">
            <h1 class="h1 b-ser-ban__h1"><?= $arResult['NAME'] ?></h1>
		  <?if ($arResult['UF_BANER_TEXT']):?>
            <div class="b-ser-ban__txt">
			<?=$arResult['UF_BANER_TEXT'];?>    
            </div>
		  <?endif;?>
          </div>
        </div>
      </section>
      <!-- Хлебные крошки-->
      <div class="container">
             <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","top",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);?>
      </div>
      <!-- О процедуре-->
      <section class="procedure-inf">
        <div class="container-1200">
          <div class="b-procedure-inf">
            <div class="b-procedure-inf__txt">
              <div class="cut-text">
                <h3 class="h3 b-procedure-inf__h3">Подробнее о процедуре <span class="semibold"><?= $arResult['NAME'];?></span></h3>
				<?if ($arResult['PREVIEW_TEXT']):?>
					<?=$arResult['PREVIEW_TEXT'];?>
				<?endif;?>
              </div>
            </div>
            <div class="b-procedure-inf__pic-container">
              <div class="b-procedure-inf__bage-list"><span class="bage-price b-procedure-inf__bage-item">
                  <svg class="icon icon-rub bage-price__ico">
                    <use xlink:href="img/svg-sprite/sprite.svg#rub"></use>
                  </svg>от <?=$arResult['MIN_PRICE'];?></span><span class="bage-time b-procedure-inf__bage-item">
                  <svg class="icon icon-clock-2 bage-time__ico">
                    <use xlink:href="img/svg-sprite/sprite.svg#clock-2"></use>
                  </svg>01:20</span></div>
              <div class="b-procedure-inf__image"><img src="<?= SITE_TEMPLATE_PATH ?>/img/laser-zone-page/zone/1.jpg" alt=""></div>
            </div>
            <div class="b-procedure-inf__footer">
              <div class="b-procedure-inf__footer-left">
                <div class="b-procedure-inf__total-sale"><span>Стоимость с клубной картой:</span><span>0 ₽</span></div>
                <div class="b-procedure-inf__total"><span>Стоимость без карты:</span><span>0 ₽</span></div>
              </div>
              <div class="b-procedure-inf__footer-right"><a class="blue-btn-2 b-procedure-inf__btn" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Выбор зон-->
      <section class="select-procedure" id="procedureZone">
        <div class="container-1200">
          <h3 class="h3 select-procedure__h3">С этой процедурой также выбирают</h3>
          <div class="b-select-procedure">
		<?  $APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"more",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => "show",
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"PRICE_CODE" => $arParams["~PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

					"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
					"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
					"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
					"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],
					"SECTION_USER_FIELDS" => array("UF_ICONS","UF_USLUGA","UF_SEO","UF_BANER_TEXT","UF_BANNER_PC","UF_BANNER_IPAD","UF_BANNER_MOBILE","UF_PHOTO_ZH","UF_PHOTO_M","UF_ALTSERVICETEXT","UF_CALCTYPE"),
					'LABEL_PROP' => $arParams['LABEL_PROP'],
					'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
					'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
					'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
					'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
					'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
					'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
					'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
					'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
					'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

					'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
					'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
					'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
					'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
					'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
					'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
					'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
					'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
					'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
					'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
					'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
					'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

					'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
					'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
					'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

					'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ADD_SECTIONS_CHAIN" => "N",
					'ADD_TO_BASKET_ACTION' => $basketAction,
					'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
					'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
					'COMPARE_NAME' => $arParams['COMPARE_NAME'],
					'USE_COMPARE_LIST' => 'Y',
					'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
					'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
					'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
				),
				$component
			);
			?>
          </div>
          <div class="select-procedure__btn-row"><a class="blue-border-btn select-procedure__btn no-active" id="btnShowZone" href="javascript: void(0);">Смотреть все цены</a></div>
          <form class="select-zone-2 hidden" id="selectZone2" action="" method="">
            <div class="c-tab-zone__radio-list">
              <div class="check c-tab-zone__radio-item">
                <input id="q1" type="radio" name="cardRadioGirl" value="Нет карты" checked>
                <label for="q1">Нет карты</label>
              </div>
              <div class="check c-tab-zone__radio-item">
                <input id="q2" type="radio" name="cardRadioGirl" value="Клубная карта GOLD">
                <label for="q2">Клубная карта GOLD<span class="help custom-tooltip" title="Цена с клубной картай GOLD" data-toggle="tooltip" data-placement="bottom">
                    <svg class="icon icon-help help__ico">
                      <use xlink:href="img/svg-sprite/sprite.svg#help"></use>
                    </svg></span></label>
              </div>
              <div class="check c-tab-zone__radio-item">
                <input id="q3" type="radio" name="cardRadioGirl" value="Клубная карта PLATINUM">
                <label for="q3">Клубная карта PLATINUM<span class="help custom-tooltip" title="Цена с клубной картай PLATINUM" data-toggle="tooltip" data-placement="bottom">
                    <svg class="icon icon-help help__ico">
                      <use xlink:href="img/svg-sprite/sprite.svg#help"></use>
                    </svg></span></label>
              </div>
            </div>
            <div class="tab-zone-2">
              <ul class="tab-zone-2-nav">
			  <?$my_sections = CIBlockSection::GetList (Array("ID" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$arResult['ID']),false, Array('ID', 'NAME', 'CODE'));?>
			  <?$i=0;?>
			  <?while($ar_fields = $my_sections->GetNext()) { ?>	  
				<li <?if($i==0) {?>class="active"<?}?>><a class="tab-zone-2-nav__item" href="#zone-<?= $i;?>" data-toggle="tab"><?echo $ar_fields['NAME'];?></a></li>
				<?$i++;?>
			  <?}?>
              </ul>
              <div class="tab-content tab-zone-2-content">
                <div class="tab-pane fade show active in" id="zone-1">
                  <div class="b-removal">
                    <div class="b-removal-pic-container">
                      <div class="b-removal-pic b-removal-pic-1"><img src="img/zone/g1.jpg" alt="">
                        <div class="zone-mini-style active" id="z_w_1" title="Шея" style="background-image: url(img/zone-mini-masc/woman/face/1.svg);"></div>
                        <div class="zone-mini-style" id="z_w_2" title="Щеки" style="background-image: url(img/zone-mini-masc/woman/face/2.svg);"></div>
                        <div class="zone-mini-style" id="z_w_3" title="Бакенбарды" style="background-image: url(img/zone-mini-masc/woman/face/3.svg);"></div>
                        <div class="zone-mini-style" id="z_w_4" title="Побородок" style="background-image: url(img/zone-mini-masc/woman/face/4.svg);"></div>
                        <div class="zone-mini-style" id="z_w_5" title="Верхняя губа" style="background-image: url(img/zone-mini-masc/woman/face/5.svg);"></div>
                        <div class="zone-mini-style" id="z_w_6" title="Лоб" style="background-image: url(img/zone-mini-masc/woman/face/6.svg);"></div>
                        <div class="zone-mini-style" id="z_w_7" title="Лицо полностью" style="background-image: url(img/zone-mini-masc/woman/face/7.svg);"></div>
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
                                <use xlink:href="img/svg-sprite/sprite.svg#plus"></use>
                              </svg></span><span class="b-removal-ico__minus">
                              <svg class="icon icon-minus b-removal-ico__ico-minus">
                                <use xlink:href="img/svg-sprite/sprite.svg#minus"></use>
                              </svg></span></span><span class="b-removal-dl__title">Лицо полностью</span></dt>
                        <dd class="b-removal-dl__dd"><span class="b-removal-dl__price">1 150</span></dd>
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
                    <div class="b-total__summ">Общая стоимость: <span class="nowrap">0 ₽</span></div>
                    <div class="b-total__sale">Ваша скидка по клубной карте <span class="nowrap">0 ₽</span></div>
                    <div class="b-removal-tag">
                      
                    </div>
                  </div>
                </div>
                <div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
              </div>
            </div>
          </form>
        </div>
      </section>
      <!-- Подготовка перед эпиляцией-->
      <section class="preparation-for">
 
      </section>
      <!-- Контакты 2-->
  
		<?

$signer = new \Bitrix\Main\Security\Sign\Signer;
$signedTemplate = $signer->sign($templateName, 'catalog.section');
$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
?>
<script>
	BX.message({
		BTN_MESSAGE_BASKET_REDIRECT: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT'
  ) ?>',
		BASKET_URL: '<?= $arParams['BASKET_URL'] ?>',
		ADD_TO_BASKET_OK: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		TITLE_ERROR: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR') ?>',
		TITLE_BASKET_PROPS: '<?= GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS') ?>',
		TITLE_SUCCESSFUL: '<?= GetMessageJS('ADD_TO_BASKET_OK') ?>',
		BASKET_UNKNOWN_ERROR: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR'
  ) ?>',
		BTN_MESSAGE_SEND_PROPS: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS'
  ) ?>',
		BTN_MESSAGE_CLOSE: '<?= GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE') ?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP'
  ) ?>',
		COMPARE_MESSAGE_OK: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK') ?>',
		COMPARE_UNKNOWN_ERROR: '<?= GetMessageJS(
      'CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR'
  ) ?>',
		COMPARE_TITLE: '<?= GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE') ?>',
		PRICE_TOTAL_PREFIX: '<?= GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX') ?>',
		RELATIVE_QUANTITY_MANY: '<?= CUtil::JSEscape(
      $arParams['MESS_RELATIVE_QUANTITY_MANY']
  ) ?>',
		RELATIVE_QUANTITY_FEW: '<?= CUtil::JSEscape(
      $arParams['MESS_RELATIVE_QUANTITY_FEW']
  ) ?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT'
  ) ?>',
		BTN_MESSAGE_LAZY_LOAD: '<?= CUtil::JSEscape(
      $arParams['MESS_BTN_LAZY_LOAD']
  ) ?>',
		BTN_MESSAGE_LAZY_LOAD_WAITER: '<?= GetMessageJS(
      'CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER'
  ) ?>',
		SITE_ID: '<?= CUtil::JSEscape($component->getSiteId()) ?>'
	});
	var <?= $obName ?> = new JCCatalogSectionComponent({
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		componentPath: '<?= CUtil::JSEscape($componentPath) ?>',
		navParams: <?= CUtil::PhpToJSObject($navParams) ?>,
		deferredLoad: false, // enable it for deferred load
		initiallyShowHeader: '<?= !empty($arResult['ITEM_ROWS']) ?>',
		bigData: <?= CUtil::PhpToJSObject($arResult['BIG_DATA']) ?>,
		lazyLoad: !!'<?= $showLazyLoad ?>',
		loadOnScroll: !!'<?= $arParams['LOAD_ON_SCROLL'] === 'Y' ?>',
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		ajaxId: '<?= CUtil::JSEscape($arParams['AJAX_ID']) ?>',
		parameters: '<?= CUtil::JSEscape($signedParams) ?>',
		container: '<?= $containerName ?>'
	});
</script>
<!-- component-end -->