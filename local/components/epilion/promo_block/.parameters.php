<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var string $componentPath
 * @var string $componentName
 * @var array $arCurrentValues
 * */

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc as Lc;


if( !Loader::includeModule("iblock") ) {
    throw new \Exception('Не загружены модули необходимые для работы компонента');
}

//Отобрать контентные инфоблоки
$iblockType = 1;

$arIblocks=[];
$rsIblocks = CIBlock::GetList(["SORT"=>"ASC"],["TYPE"=>$iblockType]);
while ($rsIblock = $rsIblocks->GetNext(1,0)){
    $arIblocks[$rsIblock["ID"]] = html_entity_decode($rsIblock["NAME"]);
}


//Отобрать секции инфоблока (уровень вложенности = 1)
$arSections = [];
$rsIBlockSection = CIBlockSection::GetList(array("SORT" => "ASC"), ["IBLOCK_ID" => $arCurrentValues["IBLOCK"], "DEPTH_LEVEL" => 1], false, ["SORT","ID","IBLOCK_ID","NAME"]);
while ($rsSection = $rsIBlockSection->GetNext(1,0)) {
    $arSections[$rsSection['ID']] = html_entity_decode($rsSection['NAME']);
}

//Отобрать секции услуг (уровень вложенности = 1)
$arElements = [];
$arElementsContent = [];
$arElementFilter = [
    "IBLOCK_ID" => $arCurrentValues["IBLOCK"],
];

if (!empty($arCurrentValues["SECTION"])){
    $arElementFilter["SECTION_ID"] = $arCurrentValues["SECTION"];
    $arElementFilter["INCLUDE_SUBSECTIONS"] = "Y";
}

$arElementSelect = ["SORT","IBLOCK_ID", "ID","NAME", "DETAIL_PAGE_URL"];

//$arProps = ["PROMO_PROPERTY","TITLE", "TEXT", "PICTURE"]; //Динамические свойства элементов

$promoProp = (!empty($arCurrentValues["PROMO_PROPERTY"]))?$arCurrentValues["PROMO_PROPERTY"]:"PROMO";
$promoProp ="PROPERTY_".$promoProp;

if (!empty($arCurrentValues["PROMO_PROPERTY"])) {
    $arElementFilter[$promoProp."_VALUE"] = "Y";
    $arElementSelect[] = $promoProp;
}
else{
    $arElementFilter["PROPERTY_PROMO_VALUE"] = "Y";
    $arElementSelect[] = "PROPERTY_PROMO";
}

$rsIBlockElement = CIBlockElement::GetList(
    array("SORT" => "ASC"),
    $arElementFilter,
    false,
    false,
    $arElementSelect
);
while ($rsElement = $rsIBlockElement->GetNext(1,0)) {
    if (!empty($rsElement[$promoProp."_VALUE"])) {
        $arElements[$rsElement['ID']] = html_entity_decode($rsElement['NAME']);
        $arElementsContent[$rsElement['ID']] = [
            "TITLE" => $rsElement['NAME'],
            "TEXT" => $rsElement['PREVIEW_TEXT'],
            "PICTURE" => $rsElement['PREVIEW_PICTURE'],
            "DETAIL_PAGE_URL" => $rsElement['DETAIL_PAGE_URL'],
        ];
    }
}


$arComponentParameters = [
    "GROUPS" => [
        "MAIN" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_ELEMENT_SETTINGS'),
            "SORT" => 510
        ],
        "CONTENT" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_ELEMENT_CONTENT'),
            "SORT" => 520
        ],
        "BUTTONS" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_ELEMENT_BUTTONS'),
            "SORT" => 530
        ],
    ],
    "PARAMETERS" => [
        "IBLOCK" => [// Выбор контентного инфоблока
            "SORT"=>500,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_SETTINGS_IBLOCK'),
            "TYPE" => "LIST",
            "MULTIPLE"=>"N",
            "VALUES"=>$arIblocks,
            "REFRESH"=>"Y"
        ],// Выбор секции инфоблока
        "SECTION" => [
            "SORT"=>510,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_SETTINGS_SECTION'),
            "TYPE" => "LIST",
            "MULTIPLE"=>"N",
            "VALUES"=>$arSections,
            "REFRESH"=>"Y"
        ],// Выбор элемента в секции инфоблока
        "ELEMENT" => [
            "SORT"=>520,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_SETTINGS_ELEMENT'),
            "TYPE" => "LIST",
            "MULTIPLE"=>"N",
            "VALUES"=>$arElements,
            "REFRESH"=>"Y"
        ],// Код свойства для выбора промо-элементов (значение должно быть "Y")
        "PROMO_PROPERTY" => [
            "SORT"=>520,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_SETTINGS_PROMO_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT"=>"PROMO",
            "REFRESH"=>"Y"
        ],// Заголовок для контента
        "TITLE" => [
            "SORT"=>520,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_CONTENT_TITLE_PROP'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],// Текст для контента
        "TEXT" => [
            "SORT"=>520,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_CONTENT_TEXT_PROP'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],
        // Картинка для контента
        "PICTURE" => [
            "SORT"=>520,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_CONTENT_PICTURE_PROP'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],// Положение картинки
        "PICTURE_POSITION" => [
            "SORT"=>520,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_CONTENT_PICTURE_POSITION'),
            "TYPE" => "LIST",
            "VALUES"=>[
                0=>"Слева",
                1=>"Справа"
            ],
            "DEFAULT"=>1
        ],// Цвет фона для блока
        "BG_COLOR" => [
            "SORT"=>520,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_CONTENT_BGCOLOR'),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ],// Показать основную кнопку?
        "PRIMARY_BUTTON_SHOW" => [
            "SORT"=>500,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_PRIMARY_SHOW'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "REFRESH"=>"Y"
        ],// Текст основной кнопки
        "PRIMARY_BUTTON_TEXT" => [
            "SORT"=>510,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_PRIMARY_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Хочу клубную карту",
            "HIDDEN"=>($arCurrentValues["PRIMARY_BUTTON_SHOW"] === "Y")?"N":"Y"
        ],// Ссылка основной кнопки (если не задана - вызывается форма)
        "PRIMARY_BUTTON_LINK" => [
            "SORT"=>520,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_PRIMARY_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "",
            "HIDDEN"=>($arCurrentValues["PRIMARY_BUTTON_SHOW"] === "Y")?"N":"Y"
        ],// Показать второстепенную кнопку?
        "SECONDARY_BUTTON_SHOW" => [
            "SORT"=>600,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_SECONDARY_SHOW'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "REFRESH"=>"Y"
        ],// Текст второстепенной кнопки
        "SECONDARY_BUTTON_TEXT" => [
            "SORT"=>610,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_SECONDARY_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Подробнее",
            "HIDDEN"=>($arCurrentValues["SECONDARY_BUTTON_SHOW"] === "Y")?"N":"Y"
        ],// Ссылка второстепенной кнопки (если не задана - вызывается детальная страница элемента)
        "SECONDARY_BUTTON_LINK" => [
            "SORT"=>620,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_ELEMENT_BUTTONS_SECONDARY_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => $arElementsContent[$arCurrentValues["ELEMENT"]]["DETAIL_PAGE_URL"],
            "HIDDEN"=>($arCurrentValues["SECONDARY_BUTTON_SHOW"] === "Y")?"N":"Y"
        ],
        'CACHE_TIME' => ['DEFAULT' => 120],
    ],
];
