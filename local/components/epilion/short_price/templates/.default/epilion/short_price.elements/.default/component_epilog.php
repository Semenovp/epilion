<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss("/local/components/epilion/short_price/style.css");
Asset::getInstance()->addJs("/local/components/epilion/short_price/script.js");