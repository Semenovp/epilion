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

<?
/*echo "<pre>";
print_r($arResult["SECTIONS"]);
echo "</pre>";*/
?>
				
<section class="service promo_blocks">
        <div class="container">
            <h2>Услуги центра лазерной косметологии Epilion</h2>
          <div class="b-service">
			  <?foreach($arResult["SECTIONS"] as $arSection):?>
			  
			  
				<?
				if ($arSection["UF_ICONS"]!="") {
				?>
				
				<div class="b-service-item b-service-ico">
				<div class="b-service-ico__ico"><img src="<?=CFile::GetPath($arSection["UF_ICONS"]);?>" alt="<?=$arSection['NAME']?>"></div>
				<?if ($arSection["NAME"]):?>
				<div class="b-service-ico__title"><?=$arSection['NAME']?></div>
				<?endif;?>
				<?if ($arSection["NAME"] == 'Лазерная эпиляция'):?>
				<div class="b-service-ico__btn-row double_button">
					<a class="purple-border-btn b-service-ico__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Женщинам</a>
					<a class="purple-border-btn b-service-ico__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Мужчинам</a>
				</div>
				<?else:?>
					<div class="b-service-ico__btn-row"  style='justify-self:center;'>
						<a class="purple-border-btn b-service-ico__btn" <?=($arSection["UF_PROMO_ONLY"] == 1)?'href=javascript:void(0) data-toggle=modal':'href='.$arSection['SECTION_PAGE_URL']?>>Подробнее</a>
				</div>
				<?endif;?>
			  </div>
				<?} else {?>
				
				<div class="b-service-item b-service-pic"><?if ($arSection['PICTURE']["SRC"]):?><img src="<?=$arSection['PICTURE']["SRC"]?>" alt=""><?endif;?>
              <div class="b-service-pic__layout">
                <div class="b-service-pic__title"><?=$arSection['NAME']?></div>
				  <div class="b-service-pic__btn-row"">
					  <?if ( $arSection['UF_USLUGA']==1):?>
                          <a class="purple-border-btn b-service-ico__btn" <?=($arSection["UF_PROMO_ONLY"] == 1)?'href=javascript:void(0) data-toggle=modal':'href='.$arSection['SECTION_PAGE_URL']?>>Подробнее</a>
									<?else:?>
					<a class="border-white-btn b-service-pic__btn" href="<?=$arSection['SECTION_PAGE_URL'];?>">Женщины</a>
						<?endif;?>
				</div>
              </div>
            </div>
			
				<?}?>
			  <?endforeach;?>
          </div>
        </div>
      </section>
	  
	  
	  