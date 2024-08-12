<?
   if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
   	die();
   use Bitrix\Main\Page\Asset
   ?>
<!DOCTYPE html>
<html>
   <head>
      <?$APPLICATION->ShowHead();?>
      <title><?$APPLICATION->ShowTitle();?></title>
      <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
      <meta name="description" content="">
      <meta name="author" content="Снисаренко Игорь">
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
      <?
         //Для подключения css
         Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/main.css");
         //Для подключения скриптов
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/wow.min.js");
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.10.2.min.js");
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/scrips.min.js");
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/map.js");
		  Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/map-contact.js");
         ?>
      <!-- Yandex.Metrika counter-->   
      <script type="text/javascript">
         (function(m,e,t,r,i,k,a){m[i]=m[i] || function () {
          (m[i].a = m[i].a || []).push(arguments)
         };
         m[i].l=1 * new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
         (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
         
         ym(70446319, "init", {
         clickmap:true,
         trackLinks:true,
         accurateTrackBounce:true,
         webvisor:true
         });
         
      </script>
      <noscript>
         <div><img src="https://mc.yandex.ru/watch/70446319" style="position:absolute; left:-9999px;" alt=""></div>
      </noscript>
      <!-- /Yandex.Metrika counter-->
   </head>
   <body class="loading">
      <div id="panel">
         <?$APPLICATION->ShowPanel();?>
      </div>
   
      <script>
         new WOW().init();  
      </script>
      <div class="mobile_menu close_menu">
		<div class="mobile_menu__menu">
				<div class="menu-stage">
				  <ul>
					<li><a class="yakor" href="#"><span>Главная</span></a></li>
					<li class="has-sub active"><a href="#"><span>Услуги</span></a>
					  <ul>
						<li><a class="yakor" href="#">Лазерная эпиляция</a></li>
						<li class="active"><a class="yakor" href="#">Лифтинг и омоложение</a></li>
						<li><a class="yakor" href="#">Отбеливание кожи</a></li>
						<li><a class="yakor" href="#">Лечение акне</a></li>
						<li><a class="yakor" href="#">Чистка лица</a></li>
						<li><a class="yakor" href="#">Пилинги</a></li>
						<li><a class="yakor" href="#">Корпоративные программы</a></li>
					  </ul>
					</li>
					<li class="has-sub"><a href="#"><span>Лояльность</span></a>
					  <ul>
						<li><a class="yakor" href="#">Клубные карты</a></li>
						<li><a class="yakor" href="#">Подарочные карты</a></li>
						<li><a class="yakor" href="#">Акции</a></li>
					  </ul>
					</li>
					<li class="has-sub"><a href="#"><span>О центре</span></a>
					  <ul>
						<li><a class="yakor" href="#">О центре</a></li>
						<li><a class="yakor" href="#">Наше оборудование</a></li>
						<li><a class="yakor" href="#">Контакты</a></li>
						<li><a class="yakor" href="#">Лицензия и сертификаты</a></li>
					  </ul>
					</li>
				  </ul>
				</div>
			  </div>
		<div class="mobile_menu__lk">
		  <a class="header-whatsapp yakor" href="#">
			  <svg class="icon icon-whatsapp header-whatsapp__ico">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#whatsapp"></use>
			  </svg><span class="header-whatsapp__txt">Написать нам</span>
		  </a>
	       <a class="blue-btn mobile_menu__btn yakor" href="#" data-target="#modal-visit" data-toggle="modal">Записаться</a>
			
			<div class="mobile_menu-address">
			  <svg class="icon icon-locate mobile_menu-address__ico">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#locate"></use>
			  </svg><span class="mobile_menu-address__txt">г. Ростов-на-Дону Ул. ХХХХХХХХ дом. ХХХХХ пом. ХХ</span>
			</div><a class="mobile_menu-mail yakor" href="mailto:XXX@epilion.ru">
			  <svg class="icon icon-mail-2 mobile_menu-mail__ico">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#mail-2"></use>
			  </svg><span class="mobile_menu-mail__txt">XXX@epilion.ru</span></a><a class="mobile_menu-inst yakor" href="#">
			  <svg class="icon icon-inst-2 mobile_menu-inst__ico">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#inst-2"></use>
			  </svg><span class="mobile_menu-inst__txt">@epilion_clinic</span></a>
		  </div>   
      </div>
      <header class="header-fix">
         <div class="container">
            <div class="b-header-fix">
               <div class="b-header-fix__left">
                  <a class="logo b-header-fix__logo" href="/">
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
						"PATH" => "/include/logo.php"
					),
					false
				);
				?>
				  </a>
                  <div class="b-ico-nav">
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
						"PATH" => "/include/fixcontact.php"
					),
					false
				);
				?>
                  </div>
               </div>
               <div class="nav-icon-container">
                  <div class="nav-icon close_menu">
                     <div></div>
                  </div>
               </div>
               <div class="b-header-fix__right">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "fix_gorizontal", Array(
					"ROOT_MENU_TYPE" => "catalog",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "A",	// Тип кеширования
						"MENU_CACHE_TIME" => "36000000",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
						"MENU_THEME" => "blue",	// Тема меню
						"CACHE_SELECTED_ITEMS" => "N",
						"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
						"MAX_LEVEL" => "2",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
						"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
						"COMPONENT_TEMPLATE" => "fix_gorizontal"
					),
					false
				);?>

					<?/*if ($USER->IsAuthorized())  {?>
					<?$logout=$APPLICATION->GetCurPageParam("logout=yes", array(
						 "login",
						 "logout",
						 "register",
						 "forgot_password",
						 "change_password"));
					?>
					
					<span class="login-fix-container">
					<a class="b-login-fix" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!--<div class="b-login-fix__ico-c"><img src="" alt=""></div>-->
				<div class="b-login-fix__ico-c">
						  <svg class="icon icon-user b-login-fix__ico">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#user"></use>
						  </svg>
						</div>
					
					<span class="b-login-fix__txt"><?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></span></a>
				  <div class="dropdown-menu main-nav__dropdown-menu"><a class="dropdown-item" href="#" data-target="#modalLogin" data-toggle="modal"><span class="dropdown-item__txt">Мои записи</span></a><a class="dropdown-item" href="#" data-target="#modalReg" data-toggle="modal"><span class="dropdown-item__txt">Профиль</span>
				  </a>
			  
			  <a class="dropdown-item" href="#" data-target="#modalReg" data-toggle="modal"><span class="dropdown-item__txt">Советы доктора</span></a>
			  <a class="dropdown-item exit-link" href="<?=$logout;?>" data-target="#modalReg" data-toggle="modal"><span class="dropdown-item__txt">
                    <svg class="icon icon-lk exit-link__ico">
                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#lk"></use>
                    </svg>Выйти</span></a>
					</div>
					</span>
					<?}else{?>
						<span class="login-fix-container"><a class="b-login-fix" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<div class="b-login-fix__ico-c">
						  <svg class="icon icon-user b-login-fix__ico">
							<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#user"></use>
						  </svg>
						</div>
						<span class="b-login-fix__txt">Войти</span></a>
					  <div class="dropdown-menu main-nav__dropdown-menu"><a class="dropdown-item" href="#" data-target="#modalLogin" data-toggle="modal"><span class="dropdown-item__txt">Войти</span></a><a class="dropdown-item" href="#" data-target="#modalReg" data-toggle="modal"><span class="dropdown-item__txt">Регистрация</span></a></div>
					</span>
					<?}*/?>
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
						"PATH" => "/include/watsapp.php"
					),
					false
				);
				?>

                  <a class="blue-btn b-header__btn b-header-fix__btn" href="#" data-target="#modal-visit" data-toggle="modal">Записаться на приём</a>
               </div>
            </div>
         </div>
      </header>
      <header class="header">
         <div class="b-header">
            <div class="b-header-top">
               <div class="container">
                  <div class="b-header-top__container">
                     <div class="b-header-top__left">
                        <!-- адрес клиники-->
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
										"PATH" => "/include/header_top_adress.php"
									),
									false
								);
								?>
						     <!-- адрес клиники--> 
					
                        <a class="b-header-work_time b-header-inf" href="#">
                           <svg class="icon icon-clock b-header-inf__ico b-header-work_time__ico">
                             <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#clock"></use>
                           </svg>
                           <span class="b-header-inf__txt">
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
						"PATH" => "/include/header_top_time.php"
					),
					false
				);
				?>
						   </span>
                        </a>
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
						"PATH" => "/include/header_top_phone.php"
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
						"PATH" => "/include/header_top_inst.php"
					),
					false
				);
				?>

                     </div>
					 <?/*if ($USER->IsAuthorized())  {?>
					<?$logout=$APPLICATION->GetCurPageParam("logout=yes", array(
						 "login",
						 "logout",
						 "register",
						 "forgot_password",
						 "change_password"));
					?>
					  <div class="b-header-top__right">
						   <a class="b-login" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  <div class="b-login__ico-c">
							  <svg class="icon icon-user b-login__ico">
                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#user"></use>
                    </svg>
								<!--<img src="<?=SITE_TEMPLATE_PATH?>/img/akne/3.jpg" alt="">-->
							  </div>
							  <span class="b-login__txt"><?=(CUser::GetFirstName())?CUser::GetFirstName():CUser::GetLogin()?></span>
							</a>
							<div class="dropdown-menu main-nav__dropdown-menu">
							<a class="dropdown-item" href="/personal/#appointment"><span class="dropdown-item__txt">Мои записи</span></a>
							<a class="dropdown-item" href="/personal/#profile"><span class="dropdown-item__txt">Профиль</span></a>
							<a class="dropdown-item" href="/personal/#advice"><span class="dropdown-item__txt">Советы доктора</span></a>
							<a class="dropdown-item exit-link" href="<?=$logout;?>"><span class="dropdown-item__txt">
								  <svg class="icon icon-lk exit-link__ico">
									<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#lk"></use>
								  </svg>Выйти</span>
							</a>
							</div>
					  </div>
					 <?}else {?>
                     <div class="b-header-top__right"><a class="b-login" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="b-login__ico-c">
                    <svg class="icon icon-user b-login__ico">
                      <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#user"></use>
                    </svg>
                  </div><span class="b-login__txt">Личный кабинет</span></a>
                <div class="dropdown-menu main-nav__dropdown-menu"><a class="dropdown-item" href="#" data-target="#modalLogin" data-toggle="modal"><span class="dropdown-item__txt">Войти</span></a><a class="dropdown-item" href="#" data-target="#modalReg" data-toggle="modal"><span class="dropdown-item__txt">Регистрация</span></a></div>
              </div>
					 <?}*/?>
			   <div class="b-header-top__right"><a class="header-whatsapp" href="#">
                  <svg class="icon icon-whatsapp header-whatsapp__ico">
                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#whatsapp"></use>
                  </svg><span class="header-whatsapp__txt">Написать нам</span></a></div>
			  
                  </div>
               </div>
            </div>
            <div class="b-header-bottom">
               <div class="container">
                  <div class="b-header-bottom__container">
                     <a class="logo" href="/">
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
						"PATH" => "/include/logo_top.php"
					),
					false
				);
				?>
					 </a>
                     <div class="b-header-bottom__right">
					 
                          
						
						<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"catalog_horizontal1", 
	array(
		"ROOT_MENU_TYPE" => "catalog",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "36000000",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_THEME" => "blue",
		"CACHE_SELECTED_ITEMS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "Y",
		"COMPONENT_TEMPLATE" => "catalog_horizontal1"
	),
	false
);?>
                     <a class="blue-btn b-header__btn" href="#" data-target="#modal-visit" data-toggle="modal">Записаться на приём</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>