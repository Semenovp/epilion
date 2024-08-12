<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Loader;
use \Bitrix\Main\Localization\Loc;
/**
 * @var string $componentPath
 * @var string $componentName
 * @var array $arCurrentValues
 * */
$arTemplateParameters = array(
    // Настройки кэширования
    'CACHE_TIME' => ['DEFAULT' => 3900],
);