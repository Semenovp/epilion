<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
/**
 * @var string $componentPath
 * @var string $componentName
 * @var array $arCurrentValues
 * */
$arTemplateParameters = array(
    "PROMO_SALE" => [
        "SORT"=>500,
        "PARENT" => "SETTINGS",
        "NAME" => Loc::getMessage('EPILION_ELEMENTLIST_PROMO_SALE'),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y"
    ],
    // Настройки кэширования
    'CACHE_TIME' => ['DEFAULT' => 120],
);