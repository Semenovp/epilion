<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Эпиляция в Ростове-на-Дону депиляция зоны эпиляции");
$APPLICATION->SetPageProperty("keywords", "Лазерная эпиляция, эпиляция лазером сделать, Лазерная эпиляция Ростов-на-Дону, Лазерная эпиляция в Ростове-на-Дону, лазерное удаление волос лазером, депиляция лазером");
$APPLICATION->SetPageProperty("description", "Epilion - VIP лазером эпиляция лазерная 100% удаление волос без боли, делать лазерную эпиляцию записаться на лазерную эпиляцию Ростов-на-Дону в Центре и на Северном");
$APPLICATION->SetTitle("Лазерная эпиляция в Ростове-на-Дону  ");
?><article class="content">
<!-- Главный слайдер--> <section class="main-slider owl-carousel">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"slider-home", 
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
		"IBLOCK_ID" => "1",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
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
		"COMPONENT_TEMPLATE" => "slider-home",
		"IBLOCK_TYPE" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_TITLE" => "Новости"
	),
	false
);?> </section>
<?$APPLICATION->IncludeComponent(
	"epilion:short_price.elements", 
	".default", 
	array(
		"CACHE_TIME" => "120",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"MAIN_AB_LINK" => "/",
		"MAIN_AB_TEXT" => "Хочу клубную карту",
		"MAIN_AB_TYPE" => "Y",
		"MAIN_EB_LINK" => "",
		"MAIN_EB_TEXT" => "Хочу скидку!",
		"MAIN_EB_TYPE" => "Y",
		"MAIN_SB_LINK" => "/upload/totalprice.pdf",
		"MAIN_SB_TEXT" => "Весь прайс",
		"MAIN_SB_TYPE" => "N",
		"MAIN_TITLE" => "Стоимость популярных услуг",
		"SALE_ACTIVE_ONLY" => "N",
		"SALE_SECTION_CODE" => "PROMO",
		"SALE_SHOW_OPENED" => "Y",
		"SALE_TITLE" => "Самые выгодные предожения для клиентов Epilion",
		"SERVICE_ACTIVE_ONLY" => "Y",
		"SERVICE_FILTER_PROP" => "PROMO_PRICE",
		"SERVICE_SECTIONS" => array(
			0 => "30",
			1 => "79",
		),
		"SERVICE_SHOW_OPENED" => "N",
		"SERVICE_SUBSECTIONS" => "Y",
		"SHOW_SALE" => "Y",
		"SHOW_SERVICE" => "Y"
	),
	false
);?></article>
<!-- Контакты --><section class="main-contact">
<div class="container">
	<div class="b-main-contact">
		<div class="b-main-contact__working">
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_time_v1.php"
	)
);?>
		</div>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_phone_v1.php"
	)
);?>
		<p>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_adress_v1.php"
	)
);?>
		</p>
		<p>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_mail_v1.php"
	)
);?>
		</p>
		<p>
			 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_instagram_v1.php"
	)
);?>
		</p>
	</div>
</div>
</section>
<!-- Контакты -->
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"main_promo_blocks",
	Array(
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
		"CATALOG_VIEW" => "FIRST",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "main_promo_blocks",
		"COUNT_ELEMENTS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"NAME_CUSTOMER",1=>"LINK_CUSTOMER",2=>"MANAGER",3=>"ANSWER",4=>"EMAIL_CUSTOMER",5=>"STAR",6=>"",),
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>"",),
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"UF_ICONS",1=>"UF_USLUGA",2=>"UF_SEO",3=>"UF_BANER_TEXT",4=>"UF_BANNER_PC",5=>"UF_BANER_IPAD",6=>"UF_BANER_MOBILE",7=>"UF_PHOTO_M",8=>"UF_PHOTO_ZH",9=>"UF_ZONA",10=>"UF_CALCTYPE",11=>"UF_PROMO_ONLY",12=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_PARENT_NAME" => "Y",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "LINE"
	)
);?>
<?$APPLICATION->IncludeComponent(
	"epilion:promo_block", 
	".default", 
	array(
		"BG_COLOR" => "#EAF6F6",
		"CACHE_TIME" => "3900",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENT" => "2061",
		"IBLOCK" => "23",
		"PICTURE" => "",
		"PICTURE_POSITION" => "1",
		"PRIMARY_BUTTON_LINK" => "",
		"PRIMARY_BUTTON_SHOW" => "Y",
		"PRIMARY_BUTTON_TEXT" => "Хочу клубную карту",
		"PROMO_PROPERTY" => "PROMO_NEWS",
		"SECONDARY_BUTTON_LINK" => "https://epilion.ru/news/",
		"SECONDARY_BUTTON_SHOW" => "Y",
		"SECONDARY_BUTTON_TEXT" => "Подробнее",
		"SECTION" => "",
		"TEXT" => "PROMO_TEXT",
		"TITLE" => ""
	),
	false
);?>
 <?$APPLICATION->IncludeComponent(
	"epilion:promo_slider", 
	".default", 
	array(
		"BUTTON_LINK" => "/service/",
		"BUTTON_TEXT" => "Хочу клубную карту",
		"CACHE_TIME" => "3900",
		"CACHE_TYPE" => "A",
		"CAPTION" => "Наши акции и предложения",
		"COMPONENT_TEMPLATE" => ".default",
		"ELEMENTS" => array(
			0 => "2010",
			1 => "2172",
			2 => "2253",
			3 => "2369",
			4 => "2372",
		),
		"ELEMENT_BG_COLOR" => "#FFFFFF",
		"IBLOCK" => "6",
		"OLD_PRICE" => "OLD_PRICE",
		"PICTURE" => "",
		"PICTURE_POSITION" => "3",
		"PROMO_PRICE" => "PROMO_PRICE",
		"PROMO_SLIDER" => "PROMO_SLIDER",
		"SECTION_BG_COLOR" => "#F3F6F6",
		"SLIDER_DELAY" => "5",
		"TEXT" => "PROMO_TEXT",
		"TITLE" => ""
	),
	false
);?>
 <article class="content">
 <!-- Отзывы--> <section class="b-review">
<div class="container">
	 <!--h2 class="h2 b-review__h2">Отзывы наших клиентов</h2--> <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"otzivi",
	Array(
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
		"COMPONENT_TEMPLATE" => "otzivi",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_PICTURE",2=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"LINK",2=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>
</div>
 </section>
<!-- Карта--> <section class="map-main">
<?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/map.php"
	)
);?> </section>
<!-- Контакты 2--> <section class="main-contact_2">
<div class="container">
	<div class="b-main-contact_2">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_phone_v2.php"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_adress_v2.php"
	)
);?> <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"template2",
	Array(
		"AREA_FILE_RECURSIVE" => "Y",
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"COMPONENT_TEMPLATE" => "template2",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/contact_index_mail_v2.php"
	)
);?>
	</div>
</div>
 </section>
<!-- Галерея--> <section class="main-gallary">
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"newgallery", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "newgallery",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
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
		"IBLOCK_ID" => "9",
		"IBLOCK_TYPE" => "1",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "74",
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
		"STRICT_SECTION_CHECK" => "N"
	),
	false
);?> </section>
<!-- Обратная связь--> <section class="main-form">
<?$APPLICATION->IncludeComponent(
	"custom:form", 
	".default", 
	array(
		"BUTTON_MSG" => "Перезвонить",
		"CACHE" => "3600",
		"COMPONENT_TEMPLATE" => ".default",
		"GENDIR_NAME" => "Котова Виктория Викторовна",
		"GENDIR_POST" => "Руководитель центра Epilion",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "-",
		"NAME_EMAIL" => "Email",
		"NAME_MESSAGE" => "Ваше сообщение:",
		"NAME_PHONE" => "Телефон",
		"NAME_TEXT" => "Главные ценности центра Epilion заключаются в том, чтобы сделать профессиональные и качественные услуги лазерной косметологии доступными для всех женщин и мужчин. Нам очень важно Ваше мнение, поэтому мы с нетерпением ждем обратной связи от каждого клиента. Вы можете оставить свой отзыв в наших социальных сетях или рассказать о впечатлениях от процедуры врачу или администратору центра. Помогите нам сделать Epilion ещё лучше. Все наши изменения направлены на ваш комфорт и быстрый результат.",
		"NAME_THEME" => "Остались вопросы? Мы свяжемся с вами!"
	),
	false
);?> </section> </article><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>