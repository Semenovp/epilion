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
<section class="short_price">
    <h2><?=$arParams["TITLE_TEXT"]?></h2>
<?
if (isset($arParams["ELEMENT_NUM"]) && $arParams["ELEMENT_NUM"]>=1)
    for($i = 1; $i <= $arParams["ELEMENT_NUM"];$i++) {

        $APPLICATION->IncludeComponent(
            "epilion:short_price.elements",
            "",
            array(
                "COMPONENT_TEMPLATE" => ".default",
                "IBLOCK_TYPE" => "catalog",
                "IBLOCK_ID" => "17",
                "SECTION_ID" => "51",
                "SUBSECTIONS" => "Y",
                "FILTER_NAME" => "",
                "ELEMENTS" => array(),
                "FILTER_PROPERTY" => "SHORT_PRICE",
                "ACTIVE" => "Y",
                "PROMO_SALE" => ($i == 1)?"Y":"N",
                "CACHE_TIME" => "3600"
            ),
            $component
        );
    }
?>
    <div>
        <a class="card_request" <?=($arParams['AB_FORM'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['AB_LINK']} target='_blank'"?>>
            <?=$arParams["AB_TEXT"]?>
        </a>
        <a class="allprice" <?=($arParams['SB_FORM'] === 'Y')?"data-toggle='modal' href=javascript:void(0)":"href={$arParams['SB_LINK']} target='_blank'"?>>
            <?=$arParams["SB_TEXT"]?>
        </a>
    </div>
</section>
