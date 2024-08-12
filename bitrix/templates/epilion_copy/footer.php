<footer class="footer">
      <div class="b-footer-top">
        <div class="container-1200">
          <div class="b-footer-top__container">
            <div class="b-footer-top__left">
              <div class="b-footer-top__col">
                <div class="b-footer-top__title">Услуги</div>
				
<? $APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"footer_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "footer_menu",
		"DELAY" => "Y",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
                
              </div>
              <div class="b-footer-top__col">
                <div class="b-footer-top__title">Лояльность</div>
				<?$APPLICATION->IncludeComponent(
					"bitrix:menu", 
					"footer_menu", 
					array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"COMPONENT_TEMPLATE" => "footer_menu",
						"DELAY" => "Y",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "N",
						"ROOT_MENU_TYPE" => "catalog",
						"USE_EXT" => "Y"
					),
					false
				);?>
              </div>
              <div class="b-footer-top__col">
                <div class="b-footer-top__title">О компании</div>
                <?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"footer_menu", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"COMPONENT_TEMPLATE" => "footer_menu",
							"DELAY" => "Y",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "N",
							"ROOT_MENU_TYPE" => "about",
							"USE_EXT" => "Y"
						),
						false
					);?>
              </div>
            </div>
            <div class="b-footer-top__right"><a class="purple-btn b-footer-top__btn" href="javascript:void(0)" data-target="#modal-visit" data-toggle="modal">Записаться на приём</a>
              <div class="b-network">
                <div class="b-footer-top__title b-network__title">Социальные сети</div>
                <div class="network">
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
						"PATH" => "/include/socseti.php"
					),
					false
				);
				?>
			
			</div>
              </div>

            </div>
          </div>
            <div class="b-ft-contact">
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
                        "PATH" => "../include/contact_footer.php"
                    ),
                    false
                );
                ?>
            </div>
        </div>
      </div>
      <div class="b-footer-middle">
        <div class="container-1200">
          <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"botton_gorizontal_menu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "botton_gorizontal_menu",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "Y",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "bottom_gorizont_footer",
		"USE_EXT" => "N"
	),
	false
);?>
        </div>
      </div>
      <div class="b-footer-bottom">
        <div class="container-1200">
          <div class="b-footer-bottom__container">
		  <a class="logo-ft" href="/">
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
				?></a>
            <div class="b-footer-bottom__right">
              <div class="b-footer-bottom__title">
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
						"PATH" => "/include/footer_copyriting.php"
					),
					false
				);
				?></div>
              <p>
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
						"PATH" => "/include/footer_copyriting_text.php"
					),
					false
				);
				?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--div id="overlay"></div-->
	<?/*
	$APPLICATION->IncludeComponent(
	"custom:order", 
	".default", 
	array(
	),
	false
);
	?>
	    <!-- Регистрация-->
		 <?/* МОДАЛКИ С УСЛУГАМИ И ПОДТВЕЖДЕНИЕМ ЗАКОММЕНТИРОВАНЫ
				$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					"template2", 
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"AREA_FILE_RECURSIVE" => "Y",
						"EDIT_TEMPLATE" => "",
						"COMPONENT_TEMPLATE" => "template2",
						"PATH" => "/include/modal_reg.php"
					),
					false
				);
		?>
    <!-- Вход-->
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
						"PATH" => "/include/modal_login.php"
					),
					false
				);
		?>
    <!-- Восстановление пароля-->
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
						"PATH" => "/include/modal_recovery.php"
					),
					false
				);
			*/?>

<!-- Упрощенная модалка -->
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
                    "PATH" => "/include/reg-forma.php"
                ),
                false
            );
            ?>

	<script async src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <script src="<?=SITE_TEMPLATE_PATH?>/js/bpValidation.js"></script>
	   <script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
	   <?//Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");?>
      <!--Yandex.Metrika counter-->
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


<script type="text/javascript">
		$(document).ready(function() 
		{
				var str = window.location.href;
			//alert(str);
				if ((str.indexOf('epilion.ru/service/lazernaya-epilyatsiya/') != -1) && (str.indexOf('/woman/') != -1)) 
					{
						$('#manModal').removeClass('in');
						$('#woomanModal').addClass('in');
						$('[data-gender="wooman"]').addClass('active');
						$('[data-gender="man"]').removeClass('active');
					}
						  else if (str.indexOf('epilion.ru/service/lazernaya-epilyatsiya/') != -1 && (str.indexOf('/man/') != -1)) 
					{
						$('[data-gender="man"]').addClass('active');
						$('[data-gender="wooman"]').removeClass('active');
						$('#woomanModal').removeClass('in');
						$('#manModal').addClass('in');
						}
			if (str.indexOf('epilion.ru/service/'))
				{
					//$('.custom-radio--card-2').click();
				}
			//console.log(str);		
			$('.indications-contraindications').prev().find('.b-device').addClass('b-device-last');
		});
		
	
	</script>

<? //Подключаем OpenGraph
if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443){ //Получаем протокол сайта.
    $protocol = 'https://';
}else{
    $protocol = 'http://';
}
$title = $APPLICATION->GetPageProperty("title");
if($title == ''){
    $title = $APPLICATION->GetTitle();
}
if($title == ''){
    $title = $APPLICATION->GetDirProperty("title");
}

$description = $APPLICATION->GetPageProperty("description");
if($description == ''){
    $description = $APPLICATION->GetDirProperty("description");
}

$rsSites = CSite::GetByID(SITE_ID);
$arSite = $rsSites->Fetch();
//echo $arSite['SITE_NAME'];
$APPLICATION->AddHeadString('<meta property="og:title" content="'.$title.'"/>',true); //Тайтл сайта.
$APPLICATION->AddHeadString('<meta property="og:type" content="website"/>',true); //Указываем, что по ссылке передаётся страница сайта.
$APPLICATION->AddHeadString('<meta property="og:url" content="'.$protocol.$_SERVER["SERVER_NAME"].$APPLICATION->GetCurPage(false).'" />',true); //Ссылка на старницу.
$APPLICATION->AddHeadString('<meta property="og:sitename" content="'.$arSite['SITE_NAME'].'" />',true); //Ссылка на старницу.

if($description != ''){
    $APPLICATION->AddHeadString('<meta property="og:description" content="'.$description.'"/>',true); //Мета описание, если оно не пусто.
}

if((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443){ //Получаем протокол сайта.
    $protocol = 'https://';
}else{
    $protocol = 'http://';
}
if ($GLOBALS["OpenGraphImages"]) {
    $APPLICATION->AddHeadString('<meta property="og:image" content="'.$protocol.$_SERVER["SERVER_NAME"].$GLOBALS["OpenGraphImages"] .'"/>',true); //Ставим в шапку сайта тег на картинку товара.
} else {
    $APPLICATION->AddHeadString('<meta property="og:image" content="'.$protocol.$_SERVER["SERVER_NAME"].'/bitrix/templates/epilion_copy/img/logo-fix.svg"/>',true);
}
?>
<?/*
$obCache = new CPageCache;
$life_time = 30*600;
$cache_id = bitrix_sessid_get();
$obCache->StartDataCache($life_time, $cache_id, "/");
*/?>
<script async src="<?=SITE_TEMPLATE_PATH.'/js/callibri.js'?>" type="text/javascript" charset="utf-8"></script>
<?
//$obCache->EndDataCache();
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
        "PATH" => "/include/social_fly.php"
    ),
    false
);
?>
  </body>
</html>

