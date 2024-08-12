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

?>

<?
//Проверяем есть ли у раздела подразделы
$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => $arParams['IBLOCK_ID'],'SECTION_ID' => $arResult['TAB'][0]['ID']));

?>

      <!-- Баннер-->
	  <section class="ser-banner ser-banner--v2">
        <div class="ser-banner--v2__pc ser-banner--v2__pc--bg-pos-right" style="background-image: url(<?= CFile::GetPath($arResult['UF_BANNER_PC']) ?>)"></div>
        <div class="ser-banner--v2__ipad ser-banner--v2__ipad--bg-pos-right" style="background-image: url(<?= CFile::GetPath($arResult['UF_BANER_IPAD']) ?>)"></div>
        <div class="ser-banner--v2__mobile" style="background-image: url(<?= CFile::GetPath($arResult['UF_BANER_MOBILE']) ?>)"></div>
        <div class="container">
          <div class="b-ser-ban b-ser-ban--dark">
            <h1 class="h1 b-ser-ban__h1"><?= $arResult['NAME'] ?></h1>
            <div class="b-ser-ban__txt">
              <?= $arResult['UF_BANER_TEXT'] ?>
              
            </div>
          </div>
        </div>
      </section>
      <!-- Выбор зон-->
	  <?if (($intCount>0) and ($arResult['DEPTH_LEVEL']!=3)):?>
		<?require_once("include/section2.php");?>
		 <?endif;?>
	   <?if (($intCount<=0) and ($arResult['DEPTH_LEVEL']!=3)):?>
	    <?require_once("include/section1.php");?>
	  <?endif;?>
	   <?if ($arResult['DEPTH_LEVEL']==3):?>
	    <?require_once("include/section3.php");?>
	  <?endif;?>
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
		"PATH" => "/include/contact_index_adress_v2.php",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
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
			$arFilter = Array("IBLOCK_ID"=>11, "PROPERTY_RAZDEL"=>$arResult['ID'], "ACTIVE"=>"Y");
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
			//if ()
			?>
		<?if ($arProps['TYPE']['VALUE']!="Показание/Противопоказания"):?>
			   <section class="<?=$class;?>" style="background: url(<?= CFile::GetPath($arProps['FON']['VALUE']);?>) #<?=$arProps['COLOR']['VALUE']?> calc(100% - 38px) bottom no-repeat;">
					<?if ($arProps['LONG']['VALUE']):?>
					<div class="container-1200">
					<?else:?>
					<div class="container">
					<?endif;?>
					
					<div class="b-device">
					 <?if ((!$arFields['PREVIEW_PICTURE']) && (!$arProps['PHOTO_DO']['VALUE']) && (!$arProps['PHOTO_POSLE']['VALUE'])):?>
					 <div class="b-device-item b-device-item--none-pic">
					 <?elseif(($arProps['POSITION']['VALUE']==="Справо")):?>
					 <div class="b-device-item b-device-item--pic-right">
					 <?elseif(($arProps['YOUTUBE']['VALUE'])):?>
					 <div class="b-device-item b-device-item--video">
					 <?else:?>
					 <div class="b-device-item">
					  <?endif;?>
					  
					  <h3 class="h3 b-device-item__h3"><?=$arProps['H3']['VALUE']?></h3>
					  <?if (($arFields['PREVIEW_PICTURE'] || ($arProps['PHOTO_DO']['VALUE'] && $arProps['PHOTO_POSLE']['VALUE'])) && (!$arProps['YOUTUBE']['VALUE'])):?>
					  <div class="b-device-item__pic-container">
                          <?if ($arProps['PHOTO_DO']['VALUE'] && $arProps['PHOTO_POSLE']['VALUE']):?>
                          <?
                              $APPLICATION->IncludeComponent(
                                  "bitrix:main.include",
                                  "template2",
                                  array(
                                      "AREA_FILE_SHOW" => "file",
                                      "AREA_FILE_SUFFIX" => "inc",
                                      "AREA_FILE_RECURSIVE" => "Y",
                                      "EDIT_TEMPLATE" => "",
                                      "COMPONENT_TEMPLATE" => "template2",
                                      "PATH" => "/include/beforeafter.php"
                                  ),
                                  false
                              );
                              ?>
                          <script type="text/javascript">
                              $(document).on('ready', function (){
                                var bgColor = $('.fBefore,.fAfter').parents('.device').css('background-color');
                                  $('.fBefore,.fAfter').css('background-color', bgColor);
                                  $('.ba-frame').parent().css({'height':'100%', 'width':'100%', 'display':'flex'});
                                  $('.ba-before').css({'background-image':'url("<?= CFile::GetPath($arProps['PHOTO_DO']['VALUE']);?>")'});
                                  $('.ba-after').css({'background-image':'url("<?= CFile::GetPath($arProps['PHOTO_POSLE']['VALUE']);?>")'});
                              });
                          </script>
                          <?else:?>
                          <div class="b-device-item__pic">
						    <img src="<?= CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" alt="">
                          </div>
						  <?endif;?>

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