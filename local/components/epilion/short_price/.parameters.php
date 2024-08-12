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


$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => Lc::GetMessage('EPILION_SHORT_PRICE_SETTINGS'),
            "SORT" => 500,
        ],
        "AB_SETTINGS" => [
            "NAME" => Lc::GetMessage('EPILION_SHORT_PRICE_AB_SETTINGS'),
            "SORT" => 500,
        ],
        "SB_SETTINGS" => [
            "NAME" => Lc::GetMessage('EPILION_SHORT_PRICE_SB_SETTINGS'),
            "SORT" => 500,
        ],
    ],
    "PARAMETERS" => [
        "TITLE_TEXT" => [
            "SORT"=>500,
            "PARENT" => "SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_TITLE'),
            "TYPE" => "STRING",
            "DEFAULT" => "Стоимость популярных услуг"
        ],
        "ELEMENT_NUM" => [
            "SORT"=>510,
            "PARENT" => "SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_ELEMENT_NUM'),
            "TYPE" => "NUMBER",
            "DEFAULT"=>3,
            "REFRESH"=>"Y"
        ],
        "AB_TEXT" => [
            "SORT"=>520,
            "PARENT" => "AB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_ACCENT_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Хочу клубную карту"
        ],
        "AB_FORM" => [
            "SORT"=>530,
            "PARENT" => "AB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_ACCENT_BUTTON_FORM'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH"=>"Y"
        ],
        "AB_LINK" => [
            "SORT"=>535,
            "PARENT" => "AB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_ACCENT_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "https://",
            "HIDDEN"=>($arCurrentValues["AB_FORM"] == "Y")?"Y":"N",
        ],
        "SB_TEXT" => [
            "SORT"=>520,
            "PARENT" => "SB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_SECONDARY_BUTTON_TEXT'),
            "TYPE" => "STRING",
            "DEFAULT" => "Все цены"
        ],
        "SB_FORM" => [
            "SORT"=>530,
            "PARENT" => "SB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_SECONDARY_BUTTON_FORM'),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "N",
            "REFRESH"=>"Y"
        ],
        "SB_LINK" => [
            "SORT"=>535,
            "PARENT" => "SB_SETTINGS",
            "NAME" => Lc::getMessage('EPILION_SHORT_PRICE_SECONDARY_BUTTON_LINK'),
            "TYPE" => "STRING",
            "DEFAULT" => "/upload/totalprice.pdf",
            "HIDDEN"=>($arCurrentValues["SB_FORM"] == "Y")?"Y":"N",
        ],
        // Настройки кэширования
        'CACHE_TIME' => ['DEFAULT' => 120],
    ],
];
