<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */
/*card*/
$component = $this->getComponent();

 $arSelect = Array("ID", "IBLOCK_ID", "CODE", "NAME", "PROPERTY_SALE");
	$arFilter = Array("IBLOCK_ID"=>18, "ACTIVE"=>"Y");
	$res = CIblockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
	$key=0;
	while($ob = $res->GetNextElement()){

	$arFields = $ob->GetFields();
		 $arResult['CARD'][$key]['NAME']=$arFields['NAME'];
		 $arResult['CARD'][$key]['SALE']=$arFields['PROPERTY_SALE_VALUE'];
	$key++;
	}
    $detailed404 = false;
    $nondetailedSections = [
        0=>'/lechenie-akne/',
        1=>'/omolozhenie-kozhi/',
        2=>'/otbelivanie-kozhi/'
    ];
    foreach($nondetailedSections as $sec) if (strpos($arResult['SECTION']['SECTION_PAGE_URL'], $sec)) $detailed404 =  true;
    if ($detailed404) {
        http_response_code(404);
        header('Location:/404.php');
    }
    /*else
        {
            echo "<pre>";
            echo print_r($arResult['SECTION']['SECTION_PAGE_URL'],1);
            echo "</pre>";
        }*/

/*card*/

/*min_price*/
	
	$max_sale=$arResult['CARD'][0]['SALE'];
foreach ($arResult['CARD'] as $key=>$card):
	if ($max_sale<$card['SALE']) {
		$max_sale=$arFields['SALE'];
	}
endforeach;
$arResult['MIN_PRICE']=(isset($arResult['PROPERTIES']['PRICE2']['VALUE']) && !empty($arResult['PROPERTIES']['PRICE2']['VALUE']))?$arResult['PROPERTIES']['PRICE2']['VALUE']:(intval($arResult['PROPERTIES']['PRICE1']['VALUE'])*(100-intval($max_sale)))/100;

/*min_price*/
$i=0;
if(CModule::IncludeModule("iblock")) {
    $my_sections = CIBlockSection::GetList(array("SORT" => "ASC"), array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID' => $arResult['ID']), false, array('ID', 'NAME', 'CODE', "DEPTH_LEVEL", 'DESCRIPTION'));
    if ($ar_fields = $my_sections->GetNext()) {
        //echo print_r($ar_fields, 1);
        $arResult['TAB'][$i]['ID'] = $ar_fields['ID'];
        $arResult['TAB'][$i]['NAME'] = $ar_fields['NAME'];
        $arResult['TAB'][$i]['DESCRIPTION'] = $ar_fields['DESCRIPTION'];
        $arResult['TAB'][$i]['CODE'] = $ar_fields['CODE'];
        $i++;
    }
}
$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();
//echo "<pre>";
//echo print_r($arResult,1);
//echo "</pre>";

// Создаем изображение для превью соц.сетей
$image_social = CFile::ResizeImageGet($arResult["PROPERTIES"]["SLIDER_TO_550"]["VALUE"], array('width'=>'1200', 'height'=>'630'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);

$GLOBALS["OpenGraphImages"] = $image_social["src"];

