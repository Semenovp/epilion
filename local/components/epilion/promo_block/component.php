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
if (!empty($arParams["SECTION"])) {
    $iFilter["SECTION_ID"] = $arParams["SECTION"];
    $iFilter["SUBSECTIONS"] = "Y";
}
if (!empty($arParams["ELEMENT"])) $iFilter["ID"] = $arParams["ELEMENT"];

$iSelect = ["SORT","IBLOCK_ID", "ID"];

$arPropsDefaults = [//Динамические свойства элементов
    "PROMO_PROPERTY"=>"PROMO",
    "TITLE"=>"NAME",
    "TEXT"=>"PREVIEW_TEXT",
    "PICTURE"=>"PREVIEW_PICTURE",
    "DETAIL_PAGE_URL"=>"DETAIL_PAGE_URL"
];

$promo_prop = (!empty($arParams["PROMO_PROPERTY"]))?$arParams["PROMO_PROPERTY"]:"PROMO";

foreach ($arPropsDefaults as $property => $default){
    if ($property === "PROMO_PROPERTY") {
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
if ($rsElement = $rsIBlockElement->GetNext(1,0)) {
    if (isset($rsElement["PREVIEW_PICTURE"]) && !empty($rsElement["PREVIEW_PICTURE"]))
        $rsElement["PREVIEW_PICTURE"] = CFile::GetPath($rsElement["PREVIEW_PICTURE"]);
    if (["PROPERTY_".$promo_prop."_VALUE"] !== "Y") {
        $arResult = [
            "ID" => $rsElement['ID'],
        ];
        foreach ($arPropsDefaults as $property => $default) {
            if ($property != "PROMO_PROPERTY")
                if (!empty($arParams[$property])) {
                    $arResult[$property] = $rsElement["PROPERTY_" . $arParams[$property] . "_VALUE"];
                } else {
                    $arResult[$property] = $rsElement[$default];
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
