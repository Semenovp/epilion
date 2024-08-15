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
	<h2 class="h2 video-procedure__h2">Фотогалерея</h2>
	<div class="slider-procedure owl-carousel">

		<?foreach($arResult["ITEMS"] as $arItem):?>

			<a class="slider-procedure-item fancybox" href="<?=$arItem['PROPERTIES']['YOUTUBE']['VALUE']?>" data-fancybox-group="gallery"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=$arItem['NAME']?>">
				<div class="slider-procedure-item__hover"><span class="play-btn-v2">
					<svg class="icon icon-play play-btn-v2__ico">
					<use xlink:href="<?=SITE_TEMPLATE_PATH?>/img/svg-sprite/sprite.svg#play"></use>
					</svg></span>
					<div class="slider-procedure-item__txt"><?=$arItem['NAME']?></div>
				</div>
			</a>

		<?endforeach;?>
	</div>
</div>

		
			