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

<section class="promo_block" <?=($arParams["BG_COLOR"] !== "")?"style='background-color:{$arParams["BG_COLOR"]}'":""?>>
    <div class="container <?=($arParams["PICTURE_POSITION"] == 0)?"reverse":""?>">
        <div class="promo_block_content">
            <h2 class="promo_block_title">
                <?=$arResult['TITLE']?>
            </h2>
            <div class="promo_block_text">
                <?=html_entity_decode($arResult['TEXT']["TEXT"])?>
            </div>
            <div class="buttons">
                <?if ($arParams['PRIMARY_BUTTON_SHOW'] === "Y"):?>
                    <a class="primary_button" <?=($arParams['PRIMARY_BUTTON_LINK'] === '')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['PRIMARY_BUTTON_LINK']} target='_blank'"?>>
                        <?=$arParams["PRIMARY_BUTTON_TEXT"]?>
                    </a>
                <?endif;?>
                <?if ($arParams['SECONDARY_BUTTON_SHOW'] === "Y"):?>
                    <a class="secondary_button" href="<?=($arParams['SECONDARY_BUTTON_LINK'] !== '')?$arParams['SECONDARY_BUTTON_LINK'] :$arResult['DETAIL_PAGE_URL']?>" target="_blank">
                        <?=$arParams["SECONDARY_BUTTON_TEXT"]?>
                    </a>
                <?endif;?>
            </div>
        </div>
        <div class="promo_block_image">
            <img src="<?=$arResult['PICTURE']?>">
        </div>
    </div>
</section>