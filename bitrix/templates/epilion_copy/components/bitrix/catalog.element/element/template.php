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
 * @var string $templateFolder
 */

$this->setFrameMode(true);
// получение цепочки разделов
$scRes = CIBlockSection::GetNavChain(
                        $arResult['IBLOCK_ID'],
                        $arResult['IBLOCK_SECTION_ID'],
                        array("ID","DEPTH_LEVEL","NAME")
                    );
$ROOT_SECTION_ID = 0;
while($arGrp = $scRes->Fetch()){
    // определяем корневой раздел
    if ($arGrp['DEPTH_LEVEL'] == 1){
        $ROOT_SECTION_NAME = $arGrp['NAME'];
        $ROOT_SECTION_ID = $arGrp['ID'];
    }
	    if ($arGrp['DEPTH_LEVEL'] == 2){
        $ROOT_2_NAME = $arGrp['NAME'];
        $ROOT_2 = $arGrp['ID'];
    }
}

?>
    <aside id="modals"></aside>
      <!-- Баннер-->
      <section class="ser-banner ser-banner--v3">
        <div class="ser-banner--v3__pc ser-banner--v3__pc--bg-pos-right" style="background-image: url(<?= CFile::GetPath($arResult["PROPERTIES"]["SLIDER_FROM_1250"]["VALUE"]) ?>)"></div>
        <div class="ser-banner--v3__pc-mini ser-banner--v3__pc-mini--bg-pos-right" style="background-image: url(<?= CFile::GetPath(   $arResult["PROPERTIES"]["SLIDER_TO_1250"]["VALUE"]) ?>)"></div>
        <div class="ser-banner--v3__ipad ser-banner--v3__ipad--bg-pos-right" style="background-image: url(<?= CFile::GetPath(   $arResult["PROPERTIES"]["SLIDER_TO_767"]["VALUE"]) ?>)"></div>
        <div class="ser-banner--v3__mobile" style="background-image: url(<?= CFile::GetPath($arResult["PROPERTIES"]["SLIDER_TO_550"]["VALUE"]) ?>)"></div>
        <div class="container">
          <div class="b-ser-ban b-ser-ban--dark">
            <h1 class="h1 b-ser-ban__h1"><?=$arResult["NAME"];?></h1>
			<?if($arResult["PREVIEW_TEXT"]):?>
            <div class="b-ser-ban__txt">
              <?=$arResult["PREVIEW_TEXT"];?>
            </div>
			<?endif;?>
          </div>
        </div>
      </section>
      <!-- Хлебные крошки-->
      
        
				 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"el",
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "el",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
      <?
//Массив сервисов, у которых используются препараты
$preparatServices = ["cosmetology"];
if (in_array($arResult["PROPERTIES"]["SERVICE_TYPE"]["VALUE_XML_ID"],$preparatServices))
    {
     $arSelect = ["ID", "NAME", "PROPERTY_PRICE_BASE", "PROPERTY_PRICE_CARD"];
     $arFilter = ["IBLOCK_ID"=>27, "PROPERTY_SERVICE"=>$arResult["ID"], "ACTIVE"=>"Y"];
     $arResult["PREPARATS"] = [];
     if (CModule::IncludeModule("iblock")) {
         $arPreparats = CIBlockElement::GetList(array(),$arFilter,false,false,$arSelect);
         while ($arPrep = $arPreparats->GetNext(1,0)){
             $arResult["PREPARATS"][] = $arPrep;
         }
     }
    }
?>
      <!-- О процедуре-->
      <section class="procedure-inf">
        <div class="container-1200">
          <div class="b-procedure-inf">
            <div class="b-procedure-inf__txt <?=(!isset($arResult["PREVIEW_PICTURE"]["SRC"]) or empty($arResult["PREVIEW_PICTURE"]["SRC"]))?'b-procedure-inf_txt_fullwidth':''?>">
              <div class="cut-text">
                <?if (isset($arResult["PREPARATS"]) && count($arResult["PREPARATS"])>0):?>
                    <div class="header_and_button">
                <?endif;?>
                        <h3 class="h3 b-procedure-inf__h3">Подробнее о процедуре <span class="semibold"><?="&nbsp".$arResult["NAME"];?></span></h3>
                <?if (isset($arResult["PREPARATS"]) && count($arResult["PREPARATS"])>0):?>
                        <div class="modal_price_button" data-type="preparat_price" data-serviceid="<?=$arResult["ID"]?>" data-servicename="<?=$arResult["NAME"]?>" data-servicecode="<?=$arResult["PROPERTIES"]["SERVICE_TYPE"]["VALUE_XML_ID"]?>"><span>Посмотреть</span> цены<span><?=" (".count($arResult["PREPARATS"]).")"?></span></div>
                    </div>
                <?endif;?>
                <?=$arResult["DETAIL_TEXT"];?>
              </div>
            </div>
            <?if (isset($arResult["PREVIEW_PICTURE"]["SRC"]) and !empty($arResult["PREVIEW_PICTURE"]["SRC"])):?>
            <div class="b-procedure-inf__pic-container">
              <div class="b-procedure-inf__bage-list"><span class="bage-price b-procedure-inf__bage-item">
                  <svg class="icon icon-rub bage-price__ico">
                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#rub"></use>
                  </svg>от <?=roundUpToAny($arResult['MIN_PRICE']);?></span>
				   <?if ($arResult["PROPERTIES"]["TIME"]["VALUE"]):?>
				  <span class="bage-time b-procedure-inf__bage-item">
				 
					  <svg class="icon icon-clock-2 bage-time__ico">
						<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#clock-2"></use>
					  </svg><?=$arResult["PROPERTIES"]["TIME"]["VALUE"];?> 
					  
					  </span>
				  <?endif;?>
				</div>
              <div class="b-procedure-inf__image"><img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" alt=""></div>
            </div>
            <?endif;?>
            <div class="b-procedure-inf__footer">
              <?if (roundUpToAny($arResult['MIN_PRICE']) != roundUpToAny($arResult["PROPERTIES"]["PRICE1"]["VALUE"])):?>
                <div class="b-procedure-inf__footer-left">
                <div class="b-procedure-inf__total-sale"><span>Стоимость с клубной картой:</span><span> от <?=roundUpToAny($arResult['MIN_PRICE']);?> ₽</span></div>
                <div class="b-procedure-inf__total"><span>Стоимость без карты:</span><span><?=roundUpToAny($arResult["PROPERTIES"]["PRICE1"]["VALUE"]);?> ₽</span></div>
              <?else:?>
                  <div class="b-procedure-inf__footer-left single-price">
                  <div class="b-procedure-inf__total-sale"><span>Стоимость процедуры:</span><span> от <?=roundUpToAny($arResult['MIN_PRICE']);?> ₽</span></div>
              <?endif;?>
              </div>
              <div class="b-procedure-inf__footer-right"><a class="blue-btn-2 b-procedure-inf__btn" href="#" data-id="<?=$arResult["ID"];?>" data-price="<?=$arResult["PROPERTIES"]["PRICE1"]["VALUE"];?>" data-sale="<?=$arResult["PROPERTIES"]["PRICE2"]["VALUE"];?>" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- Выбор зон-->
    <?
    $arF = Array('IBLOCK_ID'=>$arResult["IBLOCK_ID"], 'ID'=>$arResult['IBLOCK_SECTION_ID']);
    $serviceSection = CIBlockSection::GetList(["SORT"=>"ASC"], $arF, false, Array('PROPERTY'=>'UF_*'),false);
    while ($serSecEl = $serviceSection->GetNextElement(true, false)){
    $arFields = $serSecEl->GetFields();
    $arResult['SECTION_FIELDS'] = $arFields;
}
unset($arFields, $arF, $serviceSection);
?>
	  <?if (!$arResult['SECTION_FIELDS']['UF_UNISEX']):?>
        <section class="select-procedure" id="procedureZone">
        <div class="container-1200">
          <h3 class="h3 select-procedure__h3">С этой процедурой также выбирают</h3>
          <div class="b-select-procedure">
		  <?
		  $GLOBALS['arrFilter'] = array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y", '!ID' => array($arResult["ID"]), 'IBLOCK_SECTION_ID' => array($arResult["IBLOCK_SECTION_ID"]) );
		  
		  ?>
           
    		 <? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"element_more", 
	array(
		"COMPONENT_TEMPLATE" => "element_more",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "3",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "arrFilter",
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "TITLE_SERVICE",
			1 => "HELP",
			2 => "GENDER",
			3 => "TIME",
			4 => "PRICE2",
			5 => "PRICE3",
			6 => "PRICE1",
			7 => "SERVICE_TYPE",
			8 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"INCLUDE_SUBSECTIONS" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SET_STATUS_404" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);
			?>
          </div>
          <div class="select-procedure__btn-row"><a class="blue-border-btn select-procedure__btn no-active" id="btnShowZone" href="javascript: void(0);">Смотреть все цены</a></div>
         
		 <form class="select-zone-2 hidden" id="selectZone2" action="" method="">

		  <?$kard=2;?>
		  <div class="custom-radio-list">
								<div class="custom-radio custom-radio--card-1 active c-tab-zone__radio-item" data-price="0">
								  <div class="custom-radio__ico"></div>
								  <div class="custom-radio__text">Нет карты</div>
								</div>
								<?$kard=2;?>
								<?foreach($arResult['CARD'] as $key =>$card):?>	
								<div class="custom-radio custom-radio--card-<?=$kard;?> c-tab-zone__radio-item"  data-price="<?=$card['SALE']?>">
								  <div class="custom-radio__ico"></div>
								  <div class="custom-radio__text"><?=$card['NAME'];?><span class="help custom-tooltip" title="><?=$card['NAME'];?>" data-toggle="tooltip" data-placement="bottom">
									  <svg class="icon icon-help help__ico">
										<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
									  </svg></span></div>
								</div>
								<?$kard++;?>
								<?endforeach;?>
							  </div>

			
            <div class="tab-zone-2">
              <ul class="tab-zone-2-nav">
              
				
                <?
							$my_sections = CIBlockSection::GetList (Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>  $ROOT_2),false, Array('ID', 'NAME', 'CODE'));
							$i=0;
							while($ar_fields = $my_sections->GetNext()) {?>	  
								<li <?if($i==0) {?>class="active"<?}?>>
									<a class="tab-zone-2-nav__item" href="#zone-<?=$ar_fields['ID']?>" data-toggle="tab"><?=$ar_fields['NAME'];?></a>
								</li>
							  <?$i++;?>
						  <?}?>
              </ul>
              <div class="tab-content tab-zone-2-content">
			  
			  <?$my_sections = CIBlockSection::GetList (Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>  $ROOT_2),false,Array('ID', 'NAME', 'CODE','PICTURE','UF_PHOTO_ZH','UF_TYPE_PHOTO', 'UF_ZONA'));
				$key=0;?>
			  <?while($ar_fields = $my_sections->GetNext()) {?>	 

				<?if ($ar_fields['UF_TYPE_PHOTO']) {
										$type_pic=$ar_fields['UF_TYPE_PHOTO'];
									} else {
										$type_pic=1;
									}?>			  
                <div class="tab-pane fade show <?if ($key==0) {?>active in<?}?>" id="zone-<?=$ar_fields['ID']?>">
                  <div class="b-removal">
                    <div class="b-removal-pic-container">
					
                      <div class="b-removal-pic b-removal-pic-<?=$type_pic;?>">
						<img src="<?= CFile::GetPath($ar_fields['UF_PHOTO_ZH']) ?>" alt=""> 
						<?
						$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_PRICE1", "PROPERTY_PRICE2","PROPERTY_ZONE");
						$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields['ID'], "ACTIVE"=>"Y");
						$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
						while($ob = $res->GetNextElement())
						{
						 $arFields = $ob->GetFields();
						?>
						<div class="zone-mini-style" id="z_w_<?= $arFields['ID'] ?>" data-name="<?= $arFields['NAME'] ?>"  style="background-image: url(<?= CFile::GetPath(   $arFields['PROPERTY_ZONE_VALUE']) ?>);"></div>
						<?}?>
					  </div>
					  
					  
                    </div>
                    <div class="b-removal-pic-container__price-container">
                      <dl class="b-removal-dl-inf">
                        <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
                        <dd class="b-removal-dl-inf__dd">Цена</dd>
                      </dl>
                      
                      
                      
										<?								
										$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_PRICE1", "PROPERTY_PRICE2", "PROPERTY_TITLE_SERVICE",'PROPERTY_HELP');
										$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields['ID'], "ACTIVE"=>"Y");
										$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
										while($ob = $res->GetNextElement())
										{
										 $arFields = $ob->GetFields();
										
										?>
									<dl class="b-removal-dl" data-pic="z_w_<?= $arFields['ID'] ?>" data-id="<?= $arFields['ID'] ?>" data-pareny="<?= $ar_fields['NAME'] ?>" data-price="<?= $arFields['PROPERTY_PRICE1_VALUE'] ?>" data-sale="<?= $arFields['PROPERTY_PRICE2_VALUE'] ?>" data-name="<?= $arFields['PROPERTY_TITLE_SERVICE_VALUE'] ?>">
									  <dt class="b-removal-dl__dt">
										  <span class="b-removal-ico">
											<span class="b-removal-ico__plus">
													<svg class="icon icon-plus b-removal-ico__ico-plus">
													  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#plus"></use>
													</svg>
											</span>
											<span class="b-removal-ico__minus">
													<svg class="icon icon-minus b-removal-ico__ico-minus">
													  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#minus"></use>
													</svg>
											</span>
										 </span>
									
										 <?if ($ar_fields["UF_ZONA"]):?>
											<a class="b-removal-dl__title" href="<?= $arFields[ 'DETAIL_PAGE_URL' ] ?>">
													 <?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?>
													 <?if($arFields[ 'PROPERTY_HELP_VALUE']):?>	
													 <span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
														<svg class="icon icon-help help__ico">
														  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
														</svg></span>
														<?endif;?>
													</a>
										<?else:?>
										<span class="b-removal-dl__title"><?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?></span>
										 <?if($arFields[ 'PROPERTY_HELP_VALUE']):?>	
										<span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
														<svg class="icon icon-help help__ico">
														  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
														</svg></span>
									 <?endif;?>
										<?endif;?>
										
											
									</dt>
									  <dd class="b-removal-dl__dd"><span class="b-removal-dl__price"><?= $arFields[ 'PROPERTY_PRICE1_VALUE'] ?></span></dd>
								   </dl>
										<?
										}
										?>                            							
					  
                    </div>
                  </div>
                </div>
				<?$key++?>
                <?}?>
                
                
              </div>
              <div class="b-removal-total">
                <div class="b-removal-total__content">
                  <div class="b-removal-total__txt">
				  <p>Для вычисления общей стоимости услуг выберите нужные зоны.</p>
					<p><a href='/upload/totalprice.pdf' target='_blank'><?="Смотреть полный прайс"?></a></p>
                  </div>
                  <div class="b-total">
                    <div class="b-total__summ">Общая стоимость: <span class="nowrap">0 ₽</span></div>
                    <div class="b-total__sale">Ваша скидка по клубной карте <span class="nowrap">0 ₽</span></div>
                    <div class="b-removal-tag">

                    </div>
                  </div>
                </div>
<!--Включение активной кнопки записи по-умолчанию в калькуляторе страницы зоны -->
                <!--div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div-->
                <div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn " href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
              </div>
            </div>
          </form>
		  
        </div>
      </section>
      <?endif;?>
      <!-- Подготовка перед эпиляцией-->
        <!-- Контакты 2-->
      <section class="main-contact_2">
        <div class="container">
          <div class="b-main-contact_2">
				<?php
				$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					"template2", 
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => "template2",
						"PATH" => "/include/contact_index_phone_v2.php"
					),
					false
				);
				?>

				<?php
				$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					"template2", 
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => "template2",
						"PATH" => "/include/contact_index_adress_v2.php"
					),
					false
				);
				?>

			<?php
				$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					"template2", 
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => "template2",
						"PATH" => "/include/contact_index_mail_v2.php"
					),
					false
				);
				?>
          </div>
        </div>
      </section>

		<?$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*", 'PREVIEW_PICTURE','PREVIEW_TEXT');
			$arFilter = Array("IBLOCK_ID"=>11, "PROPERTY_ELEMENT"=>$arResult['ID'], "ACTIVE"=>"Y");
			$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
			while($ob = $res->GetNextElement())
			{
			 $arFields = $ob->GetFields();
			 $arProps = $ob->GetProperties();
             $class="device";
			 ?>
			<?
			$property_enums = CIBlockPropertyEnum::GetList(Array( "SORT"=>"ASC"), Array("IBLOCK_ID"=>11, "CODE"=>"TYPE"));
			while($enum_fields = $property_enums->GetNext())
			{	
				
				
				if ($enum_fields["VALUE"]===$arProps['TYPE']['VALUE']):
				
					$class=$enum_fields['XML_ID'];

				endif;
			 
			}
			?>
		<?if ($arProps['TYPE']['VALUE']!="Показание/Противопоказания"):?>
			   <section class="<?=$class;?>" style="background: url(<?= CFile::GetPath($arProps['FON']['VALUE']);?>) #<?=$arProps['COLOR']['VALUE']?> calc(100% - 38px) bottom no-repeat;">
					<?if ($arProps['LONG']['VALUE']):?>
					<div class="container-1200">
					<?else:?>
					<div class="container">
					<?endif;?>
					
					<div class="b-device">
					 <?if ((!$arFields['PREVIEW_PICTURE']) && (!$arProps['PHOTO_POSLE']['VALUE']) && (!$arProps['PHOTO_POSLE']['VALUE'])):?>
					 <div class="b-device-item b-device-item--none-pic">
					 <?elseif(($arProps['POSITION']['VALUE']==="Справо")):?>
					 <div class="b-device-item b-device-item--pic-right">
					 <?elseif(($arProps['YOUTUBE']['VALUE'])):?>
					 <div class="b-device-item b-device-item--video">
					 <?else:?>
					 <div class="b-device-item">
					  <?endif;?>
					  
					  <h3 class="h3 b-device-item__h3"><?=$arProps['H3']['VALUE']?></h3>
					  <?if (($arFields['PREVIEW_PICTURE']) && (!$arProps['YOUTUBE']['VALUE'])):?>
					  <div class="b-device-item__pic-container">
						<div class="b-device-item__pic"><img src="<?= CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" alt=""></div>
					  </div>
					  <?endif;?>
					  <?if (($arFields['PREVIEW_PICTURE']) && ($arProps['YOUTUBE']['VALUE'])):?>
					  <div class="b-device-item__pic-container"><a class="b-device-item__pic b-about-service-video fancybox" href="<?=$arProps['YOUTUBE']['VALUE'];?>" data-fancybox-group=""><img src="<?= CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" alt="">
                  <div class="b-about-service-video__layout"><span class="play-btn play-btn--size74">
                      <svg class="icon icon-play play-btn__ico">
                        <use xlink:href="<?=SITE_TEMPLATE_PATH;?>/img/svg-sprite/sprite.svg#play"></use>
                      </svg></span></div></a></div>
					  <?endif;?>
					  <div class="b-device-item__content">
					  <?if(($arProps['YOUTUBE']['VALUE'])):?>
						<div class="cut-text-video">
					  <?else:?>
						<div >
					  <?endif;?>
						<?=$arFields['PREVIEW_TEXT']?>
						</div>
					  </div>
					</div>
					</div> 
			</div> 
				</div> <!-- <div class="b-device-item"> -->
				</div> <!-- <div class="container"> -->
				
			</section>
			<?else:?>
			<section class="<?=$class;?>" style="background: url(<?= CFile::GetPath($arProps['FON']['VALUE']);?>) #<?=$arProps['COLOR']['VALUE']?> calc(100% - 38px) bottom no-repeat;">
				<?=$arFields['PREVIEW_TEXT']?>
			</section>
			<?endif;?>
			<? 
			}
			?>
  
 

    
<script>
	BX.message({
		ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('CT_BCE_CATALOG_ECONOMY_INFO2')?>',
		TITLE_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_ERROR')?>',
		TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_TITLE_BASKET_PROPS')?>',
		BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR')?>',
		BTN_SEND_PROPS: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_SEND_PROPS')?>',
		BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
		BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE')?>',
		BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
		TITLE_SUCCESSFUL: '<?=GetMessageJS('CT_BCE_CATALOG_ADD_TO_BASKET_OK')?>',
		COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_OK')?>',
		COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
		COMPARE_TITLE: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_COMPARE_TITLE')?>',
		BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
		PRODUCT_GIFT_LABEL: '<?=GetMessageJS('CT_BCE_CATALOG_PRODUCT_GIFT_LABEL')?>',
		PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX')?>',
		RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
		RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
		SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
	});

	var <?=$obName?> = new JCCatalogElement(<?=CUtil::PhpToJSObject($jsParams, false, true)?>);
</script>
<?
unset($actualItem, $itemIds, $jsParams);