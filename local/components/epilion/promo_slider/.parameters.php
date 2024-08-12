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


//Отобрать секции услуг (уровень вложенности = 1)
$arElements = [];
$arElementsContent = [];
$arElementFilter = [
    "IBLOCK_ID" => $arCurrentValues["IBLOCK"],
];

$arElementSelect = ["SORT","IBLOCK_ID", "ID","NAME", "DETAIL_PAGE_URL"];

$promoProp = (!empty($arCurrentValues["PROMO_SLIDER"]))?$arCurrentValues["PROMO_SLIDER"]:"PROMO_SLIDER";
$promoProp ="PROPERTY_".$promoProp;

if (!empty($arCurrentValues["PROMO_SLIDER"])) {
    $arElementFilter[$promoProp."_VALUE"] = "Y";
    $arElementSelect[] = $promoProp;
}
else{
    $arElementFilter["PROPERTY_PROMO_SLIDER_VALUE"] = "Y";
    $arElementSelect[] = "PROPERTY_PROMO_SLIDER";
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
            "NAME" => Lc::GetMessage('EPILION_PROMO_SLIDER_SETTINGS'),
            "SORT" => 500
        ],
        "PROPERTIES" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_SLIDER_PROPERTIES'),
            "SORT" => 510
        ],
        "CONTENT" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_SLIDER_CONTENT'),
            "SORT" => 520
        ],
        "BUTTONS" => [
            "NAME" => Lc::GetMessage('EPILION_PROMO_SLIDER_BUTTONS'),
            "SORT" => 530
        ],
    ],
    "PARAMETERS" => [
        "IBLOCK" => [// Выбор контентного инфоблока
            "SORT"=>500,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_IBLOCK'),
            "TYPE" => "LIST",
            "MULTIPLE"=>"N",
            "VALUES"=>$arIblocks,
            "REFRESH"=>"Y"
        ],// Выбор элементов инфоблока
        "ELEMENTS" => [
            "SORT"=>510,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_ELEMENTS'),
            "TYPE" => "LIST",
            "MULTIPLE"=>"Y",
            "VALUES"=>$arElements
        ],// Задержка слайдов в слайдере в секундах
        "SLIDER_DELAY" => [
            "SORT"=>520,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_DELAY'),
            "TYPE" => "NUMBER",
            "DEFAULT"=>5
        ],// Код свойства для выбора элементов промо-слайдера (значение должно быть "Y")
        "PROMO_SLIDER" => [
            "SORT"=>520,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_PROMO_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT"=>"PROMO_SLIDER",
            "REFRESH"=>"Y"
        ],
        // Код свойства для стандартной цены
        "OLD_PRICE" => [
            "SORT"=>530,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_OLDPRICE_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT"=>"OLD_PRICE"
        ],
        // Код свойства промо-цены
        "PROMO_PRICE" => [
            "SORT"=>540,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_PROMOPRICE_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT"=>"PROMO_PRICE"
        ],
        // Заголовок для контента (если не указано - "NAME")
        "TITLE" => [
            "SORT"=>510,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_TITLE_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],// Код свойства для текста (если не указано - "PREVIEW_TEXT")
        "TEXT" => [
            "SORT"=>520,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_TEXT_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ], // Картинка для контента (если не указано - "PREVIEW_PICTURE")
        "PICTURE" => [
            "SORT"=>530,
            "PARENT" => "PROPERTIES",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_PICTURE_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ], // Заголовок слайдера
        "CAPTION" => [
            "SORT"=>500,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_CAPTION'),
            "TYPE" => "STRING",
            "DEFAULT"=>""
        ],// Положение картинки
        "PICTURE_POSITION" => [
            "SORT"=>540,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_PICTURE_POSITION'),
            "TYPE" => "LIST",
            "VALUES"=>[
                0=>"Все слева",
                1=>"Все справа",
                2=>"Чередовать слева",
                3=>"Чередовать справа",
            ],
            "DEFAULT"=>0
        ],// Цвет фона для секции
        "SECTION_BG_COLOR" => [
            "SORT"=>550,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_SECTON_BGCOLOR'),
            "TYPE" => "STRING",
            "DEFAULT" => "transparent",
        ],// Цвет фона для блока
        "ELEMENT_BG_COLOR" => [
            "SORT"=>560,
            "PARENT" => "CONTENT",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_BGCOLOR'),
            "TYPE" => "STRING",
            "DEFAULT" => "#FFFFFF",
        ],// Текст CTA - кнопки
        "BUTTON_TEXT" => [
            "SORT"=>500,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Хочу клубную карту",
            "HIDDEN"=>($arCurrentValues["PRIMARY_BUTTON_SHOW"] === "Y")?"N":"Y"
        ],// Свойство где хранится ссылка  кнопки (если не задано - "DETAIL_PAGE_URL", для вызова формы указать в ссылке FORM)
        "BUTTON_LINK" => [
            "SORT"=>510,
            "PARENT" => "BUTTONS",
            "NAME" => Lc::getMessage('EPILION_PROMO_SLIDER_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],
        'CACHE_TIME' => ['DEFAULT' => 120],
    ],
];
