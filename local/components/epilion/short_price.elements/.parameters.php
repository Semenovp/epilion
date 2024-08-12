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

$serviceIBlock = 3; //Инфоблок услуг
$saleIBlock = 6; //Инфоблок акций

//Отобрать секции услуг (уровень вложенности = 1)
$arIBlockSection = [];
$rsIBlockSection = CIBlockSection::GetList(array("SORT" => "ASC"), ["IBLOCK_ID" => $serviceIBlock, "DEPTH_LEVEL" => 1, "UF_SHORT_PRICE"=>true], false, ["SORT","ID","NAME"]);
while ($array = $rsIBlockSection->GetNext(0, 1)) {
    $arIBlockSection[$array['ID']] = '[' . $array['ID'] . '] ' . $array['NAME'];
}



$arComponentParameters = [
    "GROUPS" => [
        "MAIN" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_MAIN'),
            "SORT" => 510,
        ],
        "MAIN_AB" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_MAIN_AB'),
            "SORT" => 520,
        ],
        "MAIN_SB" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_MAIN_SB'),
            "SORT" => 530,
        ],
        "MAIN_EB" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_MAIN_EB'),
            "SORT" => 540,
        ],
        "SALE_SETTINGS" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_SALE'),
            "SORT" => 550,
        ],
        "SERVICE_SETTINGS" => [
            "NAME" => Lc::GetMessage('EPILION_ELEMENTLIST_PROP_SERVICE'),
            "SORT" => 560,
        ],
    ],
    "PARAMETERS" => [
        "MAIN_TITLE" => [
            "SORT"=>500,
            "PARENT" => "MAIN",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_TITLE'),
            "TYPE" => "STRING",
            "DEFAULT" => ""
        ],// ОСНОВНАЯ КНОПКА
        "MAIN_AB_TEXT" => [
            "SORT"=>500,
            "PARENT" => "MAIN_AB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Хочу клубную карту"
        ],
        "MAIN_AB_TYPE" => [
            "SORT"=>510,
            "PARENT" => "MAIN_AB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TYPE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH"=>"Y"
        ],
        "MAIN_AB_LINK" => [
            "SORT"=>520,
            "PARENT" => "MAIN_AB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "/",
            "HIDDEN"=>($arCurrentValues["MAIN_AB_TYPE"] === "Y")?"Y":"N"
        ],// ВТОРОСТЕПЕННАЯ КНОПКА
        "MAIN_SB_TEXT" => [
            "SORT"=>500,
            "PARENT" => "MAIN_SB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Весь прайс"
        ],
        "MAIN_SB_TYPE" => [
            "SORT"=>510,
            "PARENT" => "MAIN_SB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TYPE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH"=>"Y"
        ],
        "MAIN_SB_LINK" => [
            "SORT"=>520,
            "PARENT" => "MAIN_SB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "/upload/totalprice.pdf",
            "HIDDEN"=>($arCurrentValues["MAIN_SB_TYPE"] === "Y")?"Y":"N"
        ],// КНОПКА ЭЛЕМЕНТА
        "MAIN_EB_TEXT" => [
            "SORT"=>500,
            "PARENT" => "MAIN_EB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Хочу скидку!"
        ],
        "MAIN_EB_TYPE" => [
            "SORT"=>510,
            "PARENT" => "MAIN_EB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_TYPE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH"=>"Y"
        ],
        "MAIN_EB_LINK" => [
            "SORT"=>520,
            "PARENT" => "MAIN_EB",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_MAIN_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "/",
            "HIDDEN"=>($arCurrentValues["MAIN_EB_TYPE"] === "Y")?"Y":"N"
        ],// АКЦИИ
        "SHOW_SALE" => [
            "SORT"=>500,
            "PARENT" => "SALE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SHOW_SALE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "REFRESH" => "Y"
        ],
        "SALE_TITLE" => [
            "SORT"=>500,
            "PARENT" => "SALE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SALE_TITLE'),
            "TYPE" => "STRING",
            "DEFAULT" => "Самые выгодные предожения для клиентов Epilion",
            "HIDDEN" => ($arCurrentValues["SHOW_SALE"] === "Y")?"N":"Y",
        ],
        "SALE_SECTION_CODE" => [
            "SORT"=>500,
            "PARENT" => "SALE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SALE_SECTION_CODE'),
            "TYPE" => "STRING",
            "DEFAULT" => "",
            "HIDDEN" => ($arCurrentValues["SHOW_SALE"] === "Y")?"N":"Y",
        ],
        "SALE_ACTIVE_ONLY" => [
            "SORT"=>500,
            "PARENT" => "SALE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_SALE_ACTIVE_ONLY'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "HIDDEN" => ($arCurrentValues["SHOW_SALE"] === "Y")?"N":"Y",
        ],
        "SALE_SHOW_OPENED" => [
            "SORT"=>500,
            "PARENT" => "SALE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_SALE_SHOW_OPENED'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "HIDDEN" => ($arCurrentValues["SHOW_SALE"] === "Y")?"N":"Y",
        ],// УСЛУГИ
        "SHOW_SERVICE" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SHOW_SERVICE'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "REFRESH" => "Y"
        ],
        "SERVICE_SECTIONS" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SERVICE_SECTION'),
            "TYPE" => "LIST",
            "MULTIPLE"=> "Y",
            "ADDITIONAL_VALUES" => "N",
            "VALUES" => $arIBlockSection,
            "REFRESH" => "N",
            "HIDDEN" => ($arCurrentValues["SHOW_SERVICE"] === "Y")?"N":"Y",
        ],
        "SERVICE_SUBSECTIONS" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_SERVICE_SUBSECTIONS'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "HIDDEN" => ($arCurrentValues["SHOW_SERVICE"] === "Y")?"N":"Y",
        ],
        "SERVICE_FILTER_PROP" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_PROP_SERVICE_PROPERTY'),
            "TYPE" => "STRING",
            "DEFAULT" => "",
            "HIDDEN" => ($arCurrentValues["SHOW_SERVICE"] === "Y")?"N":"Y"
        ],
        "SERVICE_ACTIVE_ONLY" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_SERVICE_ACTIVE_ONLY'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "HIDDEN" => ($arCurrentValues["SHOW_SERVICE"] === "Y")?"N":"Y"
        ],
        "SERVICE_SHOW_OPENED" => [
            "SORT"=>500,
            "PARENT" => "SERVICE_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_ELEMENTLIST_SERVICE_SHOW_OPENED'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
            "HIDDEN" => ($arCurrentValues["SHOW_SERVICE"] === "Y")?"N":"Y"
        ],
        'CACHE_TIME' => ['DEFAULT' => 120],
    ],
];
