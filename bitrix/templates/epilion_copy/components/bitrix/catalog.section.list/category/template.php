<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
//$this->setFrameMode(true);
?>


<section class="main-catalog-c main-catalog-c--<?if ($arParams['CATALOG_VIEW']==="FIRST") {?>v1<?} else {?>v2<?}?>">
        <!-- Каталог-->
        <div class="main-catalog">
          <div class="container">
            <h2 class="h2 main-catalog__h2">EPILION - центр лазерной косметологии</h2>
          </div>
		   <div class="b-main-catalog">
<?if (count($arResult['SECTIONS'])) { ?>

						<?
						foreach ($arResult['SECTIONS'] as $arSection) {
							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
							?>
								<div class="b-main-catalog-item">
								<?if ($arSection["UF_ICONS"]):?>
								  <div class="b-main-catalog-item__ico-c"><img src="<?=CFile::GetPath($arSection["UF_ICONS"]);?>" alt=""></div>
								<?endif;?>
								<?if ($arSection["NAME"]):?>
									<div class="b-main-catalog-item__title"><? echo $arSection["NAME"]; ?></div>
								<?endif;?>
									<?if ( $arSection['UF_USLUGA']==1):?>
									<a class="purple-border-btn b-main-catalog-item__btn" href="/service<?echo $arSection['SECTION_PAGE_URL'];?>">Подробнее</a>
									<?else:?>
									<a class="purple-border-btn b-main-catalog-item__btn" href="/service<?echo $arSection['SECTION_PAGE_URL'];?>">Подробнее</a>
									<?endif;?>
									
								</div>
							    
						<? } ?>
				
		
<? } ?>
</div>
		 <!-- Инфоблок услуг конец -->
        </div>
        <!-- О нас-->
        <div class="container container-responsible">
          <div class="main-about">
            <div class="main-about__txt">
			
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
		"PATH" => "/include/h2_about_v1.php"
	),
	false
);
?>
             
              <div class="cut-text">
                <h3 class="h3 main-about__h3">			 <?php
$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	"template2", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"AREA_FILE_RECURSIVE" => "Y",
		"EDIT_TEMPLATE" => "",
		"COMPONENT_TEMPLATE" => "template2",
		"PATH" => "/include/h3_about_v1.php"
	),
	false
);
?>
</h3>
                
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
							"PATH" => "/include/main-about__subtitle_v1.php"
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
							"PATH" => "/include/p_about_index_v1.php"
						),
						false
					);
				?>
				
              </div>
            </div>
            <div class="main-about__btn-row"><a class="blue-border-btn main-about__btn" href="#">Подробнее</a></div>
          </div>
        </div>
      </section>