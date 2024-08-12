<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */



if (!isset($arParams['CACHE_TIME'])) {
    $arParams['CACHE_TIME'] = 3600;
}

use Bitrix\Main\Loader;

if( !Loader::includeModule("iblock") ) {
    throw new \Exception('Не загружены модули необходимые для работы компонента');
}

$iFilter = [
    "IBLOCK_ID"=>$arParams["IBLOCK"],
];
if (count($arParams["ELEMENTS"]) > 0) $iFilter["><ID"] = $arParams["ELEMENTS"];

$iSelect = ["SORT","IBLOCK_ID", "ID"];

$arPropsDefaults = [//Динамические свойства элементов
    "PROMO_SLIDER"=>"PROMO_SLIDER",
    "OLD_PRICE"=>"OLD_PRICE",
    "PROMO_PRICE"=>"PROMO_PRICE",
    "TITLE"=>"NAME",
    "TEXT"=>"PREVIEW_TEXT",
    "PICTURE"=>"PREVIEW_PICTURE",
    "BUTTON_LINK"=>"DETAIL_PAGE_URL"
];

$promo_prop = (!empty($arParams["PROMO_SLIDER"]))?$arParams["PROMO_SLIDER"]:"PROMO_SLIDER";

foreach ($arPropsDefaults as $property => $default){
    if ($property === "PROMO_SLIDER") {
        $iFilter["PROPERTY_" . $promo_prop . "_VALUE"] = "Y";
        $iSelect[] = "PROPERTY_" . $arParams[$promo_prop];
    }
    else
    if (!empty($arParams[$property])) {
        $iSelect[] = "PROPERTY_" . $arParams[$property];
    }
    else{
        $iSelect[] = $default;
    }
}


$rsIBlockElement = CIBlockElement::GetList(
    array("SORT" => "ASC"),
    $iFilter,
    false,
    false,
    $iSelect
);
$arResult["ITEMS"] = [];
while ($rsElement = $rsIBlockElement->GetNext(1,0)) {
    if (isset($rsElement["PREVIEW_PICTURE"]) && !empty($rsElement["PREVIEW_PICTURE"]))
        $rsElement["PREVIEW_PICTURE"] = CFile::GetPath($rsElement["PREVIEW_PICTURE"]);
    if (["PROPERTY_".$promo_prop."_VALUE"] !== "Y") {
        $arResult["ITEMS"][$rsElement['ID']] = [
            "ID" => $rsElement['ID'],
        ];
        foreach ($arPropsDefaults as $property => $default) {
            if ($property != "PROMO_SLIDER")
                if (!empty($arParams[$property])) {
                    if ($property === "TEXT" && !empty($arParams["TEXT"]))
                        $arResult["ITEMS"][$rsElement['ID']][$property] = $rsElement["PROPERTY_" . $arParams[$property] . "_VALUE"]["TEXT"];
                    else
                        $arResult["ITEMS"][$rsElement['ID']][$property] = $rsElement["PROPERTY_" . $arParams[$property] . "_VALUE"];
                } else {
                    $arResult["ITEMS"][$rsElement['ID']][$property] = $rsElement[$default];
                }
        }
    }
}

//echo "<pre>";
//echo print_r($iFilter);
//echo print_r($iSelect);
//echo print_r($arParams);
//echo print_r($arResult);
//echo print_r($rsElement);
//echo "</pre>";

$this->IncludeComponentTemplate();
