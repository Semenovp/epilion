<?
   if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
   	die();
   /*echo "<pre>";
   echo print_r($_SERVER);
   cho"</pre>";
   if($_SERVER['REQUEST_URI'][count($_SERVER['REQUEST_URI'])-1] !== "/") {
        header("Location: {$_SERVER['REQUEST_URI']}/",TRUE,301);
        exit();
    }
    echo $_SERVER['REQUEST_URI'];*/

   use Bitrix\Main\Page\Asset;
   global $APPLICATION;
   ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
   <head>
      <?$APPLICATION->ShowHead();?>
      <title><?$APPLICATION->ShowTitle();?></title>
      <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
	  <meta name="author" content="ООО 'Эпилион'">
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" type="image/jpg" sizes="32x32" href="favicon.jpg">
      <?
         //Для подключения css
         Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/css/main.css");
         //Для подключения скриптов
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/wow.min.js");
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/jquery-1.10.2.min.js");
         Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/scrips.min.js");
         //Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/map.js", true);
		 Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/map-contact.js");

//Asset::getInstance()->addJs("https://www.google.com/recaptcha/api.js");
         ?>
		 <script async src="<?=SITE_TEMPLATE_PATH?>/js/jquery.cookie.js"></script>
   </head>
   <body class="loading">
      <div id="panel">
         <?$APPLICATION->ShowPanel();?>
      </div>
   
      <script>
         new WOW().init();
      </script>
      <div class="mobile_menu close_menu">
		<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_menu_mobile", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "mobile",
		"COMPONENT_TEMPLATE" => "top_menu_mobile",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "86400",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "catalog",
		"USE_EXT" => "Y",
		"MENU_THEME" => "site",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
		<div class="mobile_menu__lk">
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
					"PATH" => "/include/mobil_watsapp.php"
				),
				false
			);
			?>
	       <a class="blue-btn mobile_menu__btn yakor" href="javascript:void(0)" data-target="#modal-visit" data-toggle="modal">Записаться</a>
			
			<div class="mobile_menu-address">
			  <svg class="icon icon-locate mobile_menu-address__ico">
				<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#locate"></use>
				</svg>
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
								"PATH" => "/include/mobil_adress.php"
							),
							false
						);
						?>
			</div>
			
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
						"PATH" => "/include/mobil_email.php"
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
						"PATH" => "/include/mobil_instagram.php"
					),
					false,
                    array(
                        "ACTIVE_COMPONENT" => "N"
                    )
				);
			?>
			
		  </div>   
      </div>
      <div class="b-header-line">
          <div class="no-container">
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
                      "PATH" => "/include/top_line.php"
                  ),
                  false
              );
              ?>
          </div>
      </div>
      <header class="header-fix">
         <div class="container">
            <div class="b-header-fix">
          <div class="b-header-fix__left">
			  <a class="logo b-header-fix__logo" href="/"><img src="<?=SITE_TEMPLATE_PATH?>/img/logo-fix.svg" alt=""></a>
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
								"PATH" => "/include/fix_adress.php"
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
								"PATH" => "/include/fix_phone.php"
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
                                "PATH" => "/include/fix_watsapp.php"
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
								"PATH" => "/include/fix_instagram.php"
							),
							false,
                            array(
                                "ACTIVE_COMPONENT" => "N"
                            )
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
								"PATH" => "/include/fix_vk.php"
							),
							false,
                            array(
                                "ACTIVE_COMPONENT" => "N"
                            )
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
								"PATH" => "/include/fix_watsapp.php"
							),
							false,
                            array(
                                "ACTIVE_COMPONENT"=>"N"
                            )
						);
						?>

                  <a class="blue-btn b-header__btn b-header-fix__btn" href="javascript:void(0)" data-target="#modal-visit" data-toggle="modal">Записаться на приём</a>
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
									false,
                                    array(
                                        "ACTIVE_COMPONENT" => "N"
                                    )
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
                                     "PATH" => "/include/header_top_vk.php"
                                 ),
                                 false,
                                 array(
                                     "ACTIVE_COMPONENT" => "N"
                                 )
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
                                     "PATH" => "/include/header_top_ok.php"
                                 ),
                                 false,
                                 array(
                                     "ACTIVE_COMPONENT" => "N"
                                 )
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
                                 "PATH" => "../include/watsapp.php"
                             ),
                             false
                         );
                         ?>
                     </div>
					 
			   <div class="b-header-top__right">
			    <!--/a-->
				  </div>
                      <?$APPLICATION->IncludeComponent(
                        "bitrix:search.form",
                        "epilion",
                        array(
                            "PAGE" => "#SITE_DIR#search/index.php",
                            "USE_SUGGEST" => "Y",
                            "COMPONENT_TEMPLATE" => "epilion"
                        ),
                        false
                    );?>
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
							false,
                            ["ACTIVE_COMPONENT"=>"N"]
						);?>
                         <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"main_top", 
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
		"COMPONENT_TEMPLATE" => "main_top",
		"VARIANT" => "NEW"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
                     <a class="blue-btn b-header__btn" href="javascript:void(0)" data-target="#modal-visit" data-toggle="modal">Записаться на приём</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
	</header>