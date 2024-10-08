<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Localization\Loc;

$arComponentDescription = [
    "NAME" => Loc::getMessage("EPILION_PROMO_SLIDER_COMPONENT"),
    "DESCRIPTION" => Loc::getMessage("EPILION_PROMO_SLIDER_COMPONENT_DESCRIPTION"),
    "COMPLEX" => "N",
    "PATH" => [
        "ID" => Loc::getMessage("EPILION_PROMO_SLIDER_COMPONENT_PATH_ID"),
        "NAME" => Loc::getMessage("EPILION_PROMO_SLIDER_COMPONENT_PATH_NAME"),
        "CHILD" => [
            "ID" => Loc::getMessage("EPILION_PROMO_SLIDER_COMPONENT_CHILD_PATH_ID"),
            "NAME" => Loc::getMessage("EPILION_PROMO_SLIDER")
        ]
    ],
];
?>