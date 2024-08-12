<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>

        <div class="container">
          <h2 class="h2 clinic-service__h2">Услуги нашей клиники</h2>
        </div>
        <div class="b-clinic-service">
		<?foreach($arResult["SECTIONS"] as $arSection):?>
		<?
		if (($arSection['UF_USLUGA'])==1) {
		?>
          <div class="b-clinic-service-item">
		  <?if ($arSection['PICTURE']["SRC"]):?>
            <div class="b-clinic-service-item__pic"><img src="<?=$arSection['PICTURE']["SRC"]?>" alt=""></div>
		  <?endif;?>
            <div class="b-clinic-service-item__content">
              <div class="b-clinic-service-item__top">
                <div class="b-clinic-service-item__title"><?=$arSection['NAME']?></div>
				 <?if ($arSection['DESCRIPTION']):?>
                <div class="cut-text-54 cut-text-54--blue-gradient">
                <?=$arSection['DESCRIPTION']?>
                </div>
				<?endif;?>
              </div>
		<?if ($arSection['NAME'] == 'Лазерная эпиляция'):?>
              <div class="b-clinic-service-item__btn-row">
						<a class="purple-border-btn b-clinic-service-item__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Женщины</a>
						<a class="purple-border-btn b-clinic-service-item__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Мужчины</a>
			  </div>
		<?else:?>
              <div class="b-clinic-service-item__btn-row">
				  <a class="purple-border-btn b-clinic-service-item__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Подробнее</a>
			  </div>
		<?endif;?>
            </div>
          </div>
		<?
		}
		?>

	<?endforeach;?>

        </div>