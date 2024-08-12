<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>

 <article class="content">
      <!-- Баннер-->
	  <?if ($arParams['BACKGROUND']):?>
      <section class="ser-banner" style="background-image: url(<?=$arParams['BACKGROUND'];?>)">
        <div class="container">
          <div class="b-ser-ban">
		  <?if ($arParams['H1_PREVIEW']):?>
            <h1 class="h1 b-ser-ban__h1"><?=$arParams['H1_PREVIEW'];?></h1>
		  <?endif;?>	
		  <?if ($arParams['TEXT_PREVIEW']):?>
            <div class="b-ser-ban__txt"><?=$arParams['TEXT_PREVIEW'];?></div>
		  <?endif;?>
          </div>
        </div>
      </section>
	  <?endif;?>
      <div class="container">
        <?/*$APPLICATION->IncludeComponent("bitrix:breadcrumb","top",Array(
        "START_FROM" => "0", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
			)
		);*/?>
      </div>
      <!-- Сервисы-->
	  
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"main_promo_blocks",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "NAME_CUSTOMER",
			1 => "LINK_CUSTOMER",
			2 => "MANAGER",
			3 => "ANSWER",
			4 => "EMAIL_CUSTOMER",
			5 => "STAR",
			6 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "service",
		"IBLOCK_TYPE" => "catalog",
		"NEWS_COUNT" => "6",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_ICONS",
			1 => "UF_USLUGA",
			2 => "UF_SEO",
			3 => "UF_BANER_TEXT",
			4 => "UF_BANNER_PC",
			5 => "UF_BANER_IPAD",
			6 => "UF_BANER_MOBILE",
			7 => "UF_PHOTO_M",
			8 => "UF_PHOTO_ZH",
            9 => "UF_ZONA",
            10 => "UF_CALCTYPE",
			11 => ""
		),
		"SECTION_URL" => "",
		"VIEW_MODE" => "LINE",
		"SHOW_PARENT_NAME" => "Y",
		"CATALOG_VIEW" => "FIRST"
	),
	false
);?>
      
      <!-- О сервисах-->
           <section class="about-service">
        <div class="container">
          <div class="b-about-service">
            <div class="b-about-service-h">
              <div class="b-about-service-h__quote">
                <svg class="icon icon-quote b-about-service-h__quote-ico">
                  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#quote"></use>
                </svg>
              </div>
              <div class="b-about-service-h__quote-bg">
                <svg class="icon icon-quote-bg-service b-about-service-h__quote-bg-ico">
                  <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#quote-bg-service"></use>
                </svg>
              </div>
              <div class="b-about-service-h__txt"><?=$arParams['SLOVO_ABOUT_SERVICE']?></div>
              <div class="callback-form-director b-about-service-h__occupation">
                <div class="callback-form-director__pic"><img src="<?=$arParams['AVATAR']?>" alt=""></div>
                <div class="callback-form-director__txt">
                  <div class="callback-form-director__title"><?=$arParams['SLOVO_ABOUT_SERVICE_NAME']?></div>
                  <div class="callback-form-director__desc"><?=$arParams['SLOVO_ABOUT_SERVICE_DOLZHNOST']?></div>
                </div>
              </div>
            </div><a class="b-about-service-video fancybox" href="<?=$arParams['ABOUT_SERVICE_VIDEO_LINK']?>" data-fancybox-group=""><img src="<?=$arParams['PHTOHO_FOR_VIDEO']?>" alt="">
              <div class="b-about-service-video__layout"><span class="play-btn play-btn--size74">
                  <svg class="icon icon-play play-btn__ico">
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#play"></use>
                  </svg></span></div></a>
            <div class="b-about-service-bottom">
              <div class="cut-text-54 cut-text-54--white-gradient">
                <div class="b-about-service-bottom__txt"><?=$arParams['TEXT_FOR_SERVICE']?></div>
              </div>
              <div class="b-about-service-bottom__btn-row">
			  <a class="blue-border-btn b-about-service-bottom__btn" href="<?=$arParams['LINK_BUTTONS_URL1']?>"><?=$arParams['LINK_BUTTONS_TEXT1']?></a>
			  <a class="blue-border-btn b-about-service-bottom__btn" href="<?=$arParams['LINK_BUTTONS_URL2']?>"><?=$arParams['LINK_BUTTONS_TEXT2']?></a>
			  </div>
            </div>
          </div>
        </div>
      </section>
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
      <!-- Услуги нашей клиники-->
	  
	  	  

      <section class="clinic-service">
			<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"uslugi_service", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "NAME_CUSTOMER",
			1 => "LINK_CUSTOMER",
			2 => "MANAGER",
			3 => "ANSWER",
			4 => "EMAIL_CUSTOMER",
			5 => "STAR",
			6 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => $sortField,
		"SORT_ORDER1" => $sortOrder,
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "uslugi_service",
		"IBLOCK_TYPE" => "catalog",
		"NEWS_COUNT" => "3",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"SECTION_ID" => "",
		"SECTION_CODE" => "",
		"COUNT_ELEMENTS" => "N",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"TOP_DEPTH" => "1",
		"SECTION_FIELDS" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "SORT",
			5 => "DESCRIPTION",
			6 => "PICTURE",
			7 => "DETAIL_PICTURE",
			8 => "IBLOCK_TYPE_ID",
			9 => "IBLOCK_ID",
			10 => "IBLOCK_CODE",
			11 => "IBLOCK_EXTERNAL_ID",
			12 => "DATE_CREATE",
			13 => "CREATED_BY",
			14 => "TIMESTAMP_X",
			15 => "MODIFIED_BY",
			16 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "UF_ICONS",
			1 => "UF_USLUGA",
			2 => "",
		),
		"SECTION_URL" => ""
	),
	false
);?>
      </section>
      <!-- Контакты-->
      <section class="main-contact">
        <div class="container">
          <div class="b-main-contact">
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
								"PATH" => "/include/contact1.php"
							),
							false
						);
						?>
          </div>
        </div>
      </section>
      <!-- Видео наших процедур-->
      <section class="video-procedure">
					<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"video_service", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "10",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "NAME_CUSTOMER",
			2 => "LINK_CUSTOMER",
			3 => "MANAGER",
			4 => "ANSWER",
			5 => "EMAIL_CUSTOMER",
			6 => "STAR",
			7 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => $sortField,
		"SORT_ORDER1" => $sortOrder,
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "video_service",
		"IBLOCK_TYPE" => "1",
		"NEWS_COUNT" => "3",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"PAGER_TITLE" => "Новости"
	),
	false
);?>
      </section>
      <!-- Отзывы-->
      <section class="b-review">
  
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"otzivi", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "LINK",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "otzivi",
		"IBLOCK_TYPE" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_TITLE" => "Новости"
	),
	false
);?>
  
      </section>
    </article>