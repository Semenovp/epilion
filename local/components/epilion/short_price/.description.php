<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("EPILION_SHORT_PRICE_COMPONENT"),
    "DESCRIPTION" => Loc::getMessage("EPILION_SHORT_PRICE_COMPONENT_DESCRIPTION"),
    "CACHE_PATH"=>"Y",
    "COMPLEX" => "Y",
    "PATH" => [
        "ID" => Loc::getMessage("EPILION_SHORT_PRICE_COMPONENT_PATH_ID"),
        "NAME" => Loc::getMessage("EPILION_SHORT_PRICE_COMPONENT_PATH_NAME"),
        "CHILD" => [
            "ID" => Loc::getMessage("EPILION_SHORT_PRICE_COMPONENT_CHILD_PATH_ID"),
            "NAME" => Loc::getMessage("EPILION_SHORT_PRICE_CHILD_PATH_NAME")
        ]
    ],
];
?>