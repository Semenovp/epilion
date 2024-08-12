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
$saleIBlock = 6; //Инфоблок акций
$serviceIBlock = 3; //Инфоблок услуг

// Содержимое инфоблока Акций
$ibSaleFilter = [];
if ($arParams["SHOW_SALE"] === "Y") {
    $ibSaleFilter["IBLOCK_ID"] = $saleIBlock;
    $arResult["SALE"]["ITEMS"] = [];
    if ($arParams["SALE_ACTIVE_ONLY"] === "Y") {
        $ibSaleFilter["ACTIVE"] = "Y";
        $ibSaleFilter["ACTIVE_DATE"] = "Y";
    }

    $ibSaleFilter["SECTION_CODE"] = (!empty($arParams["SALE_SECTION_CODE"]))?$arParams["SALE_SECTION_CODE"]:"";

    //echo "<pre>";
    //echo print_r(array_merge(["ID"=>CIBlockSection::GetList([],["=CODE"=>$ibSaleSectionCode],false,false,["ID","NAME","CODE"])->Fetch()["CODE"]],$ibSaleFilter));
    //echo "</pre>";

    $rsIBlockElement = CIBlockElement::GetList(['SORT' => 'ASC', "ID" => "ASC"],
        $ibSaleFilter,
        false,
        false,
        ["ID", "NAME", "IBLOCK_SECTION_CODE", "PROPERTY_PROMO_TITLE", "PROPERTY_PROMO_CONDITION", "PROPERTY_PROMO_PRICE", "PROPERTY_OLD_PRICE", "DATE_ACTIVE_TO"]
    );
    while ($array = $rsIBlockElement->GetNext(1, 0)) {
        $arResult["SALE"]["ITEMS"][$array['ID']] = $array;
    }
}



// Содержимое инфоблока услуг

if ($arParams["SHOW_SERVICE"] === "Y" && !empty($arParams["SERVICE_SECTIONS"])) {
    foreach ($arParams["SERVICE_SECTIONS"] as $section_key => $section_id):
        $ibServiceFilter = [];
        $ibServiceFilter["IBLOCK_ID"] = $serviceIBlock;
        $svcSec = CIBlockSection::GetList(["SORT"=>"ASC"],["IBLOCK_ID"=>3,"ID"=>$section_id],false,["ID", "CODE", "NAME", "UF_*"],false);
        while ($sec = $svcSec->GetNext(1,0)) {
            $arResult["SECTIONS"][$section_id] = [
                "SECTION_CODE"=> $sec["CODE"],
                "SECTION_NAME"=> $sec["NAME"],
                "SECTION_TYPE" => $sec["UF_CALCTYPE"]
            ];
        }

        $prep = ($arResult["SECTIONS"][$section_id]["SECTION_TYPE"] == 5)? true:false; // 5 - калькулятор с препаратами

        if ($arParams["SERVICE_ACTIVE_ONLY"] === "Y")
            $ibServiceFilter["ACTIVE"] = "Y";

        if (!$prep) {
            $ibServiceFilter["SECTION_ID"] = $section_id;
            $arSelect = [
                "IBLOCK_ID",
                "ID",
                "NAME",
                "PROPERTY_PRICE1",
                "PROPERTY_PRICE2",
                "PROPERTY_NEW_PRICE",
                "PROPERTY_NEW_PRICE_CARD",
                "PROPERTY_NEW_PRICE_CARD",
                "PROPERTY_NEW_PRICE_DATE",
                "PROPERTY_PROMO_TITLE"
            ];
        }
        else {
            $ibServiceFilter["IBLOCK_ID"] = 27; //27 - Код инфоблока с препаратами
            $arSelect = [
                "IBLOCK_ID",
                "ID",
                "NAME",
                "PROPERTY_PRICE_BASE",
                "PROPERTY_PRICE_CARD",
                "PROPERTY_PROMO_TITLE",
                "PROPERTY_NEW_PRICE",
                "PROPERTY_NEW_PRICE_CARD",
                "PROPERTY_NEW_PRICE_DATE"
            ];
            }

        if ($arParams["SERVICE_SUBSECTIONS"] === "Y")
            $ibServiceFilter["INCLUDE_SUBSECTIONS"] = "Y";
        if (!empty($arParams["SERVICE_FILTER_PROP"]))
            $ibServiceFilter["PROPERTY_" . $arParams["SERVICE_FILTER_PROP"] . "_VALUE"] = "Y";


        $arResult["SECTIONS"][$section_id]["ITEMS"] = [];

        $rsIBlockElement = CIBlockElement::GetList(['SORT' => 'ASC', "ID" => "ASC"],
            $ibServiceFilter,
            false,
            false,
            $arSelect
        );
        while ($array = $rsIBlockElement->GetNext(0, 0)) {
            $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']] = $array;
            $priceDate = new DateTime($arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_DATE"]);
            $nowTime = time();
            $datePrice = ($priceDate->getTimestamp() <= $nowTime)?true:false;

            if ($prep){
                //Старая цена услуг с препаратами
                $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["OLD_PRICE"] =
                    ($datePrice && !empty($arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_VALUE"]))?
                    $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_VALUE"]:
                    $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_PRICE_BASE_VALUE"];
                //Новая цена услуг с препаратами
                $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["NEW_PRICE"] =
                    ($datePrice && !empty($arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_CARD_VALUE"]))?
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_CARD_VALUE"]:
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_PRICE_CARD_VALUE"];
            }
            else{
                //Старая цена услуг без препаратов
                $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["OLD_PRICE"] =
                    ($datePrice && !empty($arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_VALUE"]))?
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_VALUE"]:
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_PRICE1_VALUE"];
                //Новая цена услуг без препаратов
                $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["NEW_PRICE"] =
                    ($datePrice && !empty($arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_CARD_VALUE"]))?
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_NEW_PRICE_CARD_VALUE"]:
                        $arResult["SECTIONS"][$section_id]["ITEMS"][$array['ID']]["PROPERTY_PRICE2_VALUE"];
            }

        }
    endforeach;
}

//unset($array, $rsIBlockElement, $ibServiceFilter);

//echo "<pre>";
//echo "Фильтр выборки:".PHP_EOL.print_r($arFilter, true);
//echo "</pre>";
// подключаем шаблон компонента

//echo "<pre>";
//echo print_r($arResult);
//echo "</pre>";

$this->IncludeComponentTemplate();
