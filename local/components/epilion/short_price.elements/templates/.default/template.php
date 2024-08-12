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
<section class="short_price">
    <h2><?=$arParams['MAIN_TITLE']?></h2>

    <?/*----    АКЦИИ    ----*/?>
    <?if ($arParams["SHOW_SALE"] === "Y"):?>
    <div class="container-1200 short_price_item promo_sale">
        <div class="short_price_item-caption">
            <div class="item-caption-gif bolt">
                <svg class="icon">
                    <use xlink:href="/local/components/epilion/short_price.elements/templates/.default/img/sprite.svg#bolt"></use>
                </svg>
            </div>
            <h3>
                <span class="item-caption-label">
                    Акция!
                </span>
                <span><?=$arParams["SALE_TITLE"]?></span>
            </h3>
            <div class="item-caption-gif cmark<?=($arParams['SALE_SHOW_OPENED'] === 'Y')?' rotated':''?>">
                <svg>
                    <use xlink:href="/local/components/epilion/short_price.elements/templates/.default/img/sprite.svg#checkMark"></use>
                </svg>
            </div>
        </div>
        <div class="short_price_item-service caption<?=($arParams['SALE_SHOW_OPENED'] === 'Y')?' shown':''?>">
            Цена по акции
        </div>
        <?foreach($arResult["SALE"]["ITEMS"] as $arSaleItem):?>
        <div class="short_price_item-service<?=($arParams['SALE_SHOW_OPENED'] === 'Y')?' shown':''?>">
            <div>
                <h4><?=$arSaleItem["PROPERTY_PROMO_TITLE_VALUE"]?></h4>
                <p>
                    <?=$arSaleItem["PROPERTY_PROMO_CONDITION_VALUE"]?>
                    <span>
                        <span><?=(dateToDays($arSaleItem["DATE_ACTIVE_TO"]) !== 0)?dateToDays($arSaleItem["DATE_ACTIVE_TO"]):""?><?=" ".daySpell(dateToDays($arSaleItem["DATE_ACTIVE_TO"]));?></span>
                        <span> до конца акции</span>
                    </span>
                </p>
            </div>
            <div   class="price_block">
                <p class="oldprice"><s><?=$arSaleItem["PROPERTY_OLD_PRICE_VALUE"]?> ₽</s></p>
                <p class="newprice"><?=$arSaleItem["PROPERTY_PROMO_PRICE_VALUE"]?> ₽</p>
            </div>
            <aside>
                <a <?=($arParams['MAIN_EB_TYPE'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['MAIN_EB_LINK']} target='_blank'"?>><?=$arParams["MAIN_EB_TEXT"]?></a>
            </aside>
        </div>
        <?endforeach;?>
    </div>
    <?endif;?>

        <?/*----    УСЛУГИ    ----*/?>

    <?if ($arParams["SHOW_SERVICE"] === "Y" && count($arResult["SECTIONS"])>0):?>
    <?foreach($arResult["SECTIONS"] as $arSectionIndex => $arSectionItem):?>
        <?if (count($arSectionItem["ITEMS"])>0):?>
        <div class="container-1200 short_price_item">
            <div class="short_price_item-caption">
                <h3>
                    <?=$arSectionItem["SECTION_NAME"]?>
                </h3>
                <div class="item-caption-gif cmark<?=($arParams['SERVICE_SHOW_OPENED'] === 'Y')?' rotated':''?>">
                    <svg>
                        <use xlink:href="/local/components/epilion/short_price.elements/templates/.default/img/sprite.svg#checkMark"></use>
                    </svg>
                </div>
            </div>
            <div class="short_price_item-service caption<?=($arParams['SERVICE_SHOW_OPENED'] === 'Y')?' shown':''?>">
                Цена по карте
            </div>
            <?foreach($arSectionItem["ITEMS"] as $arServiceItem):?>
                <div class="short_price_item-service service_item<?=($arParams['SERVICE_SHOW_OPENED'] === 'Y')?' shown':''?>">
                    <div>
                        <h4><?=(!empty($arServiceItem["PROPERTY_PROMO_TITLE_VALUE"]))?$arServiceItem["PROPERTY_PROMO_TITLE_VALUE"]:$arServiceItem["NAME"]?></h4>
                    </div>
                    <div  class="price_block">
                        <p class="oldprice"><?=($arServiceItem["OLD_PRICE"] !== $arServiceItem["NEW_PRICE"])?$arServiceItem["OLD_PRICE"]." ₽":""?></p>
                        <p class="newprice"><?=$arServiceItem["NEW_PRICE"]?> ₽</p>
                    </div>
                    <aside>
                        <a <?=($arParams['MAIN_EB_TYPE'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['MAIN_EB_LINK']} target='_blank'"?>><?=$arParams["MAIN_EB_TEXT"]?></a>
                    </aside>
                </div>
            <?endforeach;?>
        </div>
        <?endif;?>
    <?endforeach;?>



    <?endif;?>









<?
//echo "<pre>";
//echo "Результат выборки:".PHP_EOL.print_r($arParams, true);
//echo "</pre>";
?>

    <div>
        <a class="card_request" <?=($arParams['MAIN_AB_TYPE'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['MAIN_AB_LINK']} target='_blank'"?>>
            <?=$arParams["MAIN_AB_TEXT"]?>
        </a>
        <a class="allprice" <?=($arParams['MAIN_SB_TYPE'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['MAIN_SB_LINK']} target='_blank'"?>>
            <?=$arParams["MAIN_SB_TEXT"]?>
        </a>
    </div>
</section>