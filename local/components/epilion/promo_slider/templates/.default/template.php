<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

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

// шаблон компонента голосует против композита
$this->setFrameMode(false);
require_once $_SERVER["DOCUMENT_ROOT"]."/local/components/epilion/.functions.php";
?>

<section class="promo_slider" data-delay="<?=$arParams['SLIDER_DELAY']?>" <?=($arParams["SECTION_BG_COLOR"] !== "")?"style='background-color:{$arParams["SECTION_BG_COLOR"]}'":"transparent"?>>
    <h2 class="promo_slider_caption"><?=$arParams['CAPTION']?></h2>
    <div class="container">
        <div class="promo_slides">
            <?$slideCounter = 0;?>
            <?foreach ($arResult["ITEMS"] as $itemKey => $arItem):?>
                <?
                if ($arParams["PICTURE_POSITION"] == 0 || ($arParams["PICTURE_POSITION"] == 2 && $slideCounter%2 == 0) || ($arParams["PICTURE_POSITION"] == 3 && $slideCounter%2 == 1))
                    $picture_position = 'picture_left';
                else
                    $picture_position = '';
                ?>
                <div
                        data-slid="<?=$arItem['ID']?>"
                        class="promo_slide <?=$picture_position?><?=($slideCounter == 0)?" active":""?>" <?=($arParams["ELEMENT_BG_COLOR"] !== "")?"style='background-color:{$arParams["ELEMENT_BG_COLOR"]}'":""?>
                >
                    <div class="promo_slide_content">
                        <h3 class="promo_slide_title">
                            <?=$arItem['TITLE']?>
                        </h3>
                        <div class="promo_slide_prices">
                            <span class="promo_price"<?=($arItem['PROMO_PRICE'])?">".numberToMoney($arItem['PROMO_PRICE'])." ₽":"style='background-color:transparent'>"?></span>
                            <span class="old_price"><s><?=($arItem['OLD_PRICE'])?numberToMoney($arItem['OLD_PRICE'])." ₽":""?></s></span>
                        </div>
                        <div class="promo_slide_text">
                            <?=html_entity_decode($arItem["TEXT"]);?>
                        </div>
                        <a class="promo_slide_button" <?=($arParams['BUTTON_LINK'] === '')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['BUTTON_LINK']} target='_blank'"?>>
                            <?=$arParams["BUTTON_TEXT"]?>
                        </a>
                    </div>
                    <div class="promo_slide_image">
                        <img src="<?=$arItem['PICTURE']?>">
                    </div>
                </div>
            <?$slideCounter++;?>
            <?endforeach;?>
        </div>
        <div class="slider_dots">
            <?$dotCounter = 0;?>
            <?foreach ($arResult["ITEMS"] as $item):?>
                <span <?=($dotCounter == 0)?"class='active'":""?> data-id="<?=$item['ID']?>"></span>
                <?$dotCounter++;?>
            <?endforeach;?>
        </div>
    </div>
</section>