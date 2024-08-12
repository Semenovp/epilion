<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();



$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_TEXT1","PROPERTY_TEXT2","PROPERTY_TEXT3","PROPERTY_TEXT4","PROPERTY_PHOTO1","PROPERTY_PHOTO2"
,"PROPERTY_PHOTO3","PROPERTY_PHOTO4","PROPERTY_MINUS","PROPERTY_PLUS"
);//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
	

	
 $arFields = $ob->GetFields();
  	/*echo "<pre>";
	print_r($arFields);
	echo "</pre>";*/
 $arResult['PHOTO_OBORUD']= $arFields['PROPERTY_PHOTO1_VALUE'];
 $arResult['PHOTO_PODGOTOVKA']= $arFields['PROPERTY_PHOTO2_VALUE'];
 $arResult['PHOTO_PROCESS']= $arFields['PROPERTY_PHOTO3_VALUE'];
 $arResult['PHOTO_POSLE']= $arFields['PROPERTY_PHOTO4_VALUE'];
 
 $arResult['OBORUD']= $arFields['PROPERTY_TEXT1_VALUE']['TEXT'];
 $arResult['PODGOTOVKA']= $arFields['PROPERTY_TEXT2_VALUE']['TEXT'];
 $arResult['PROCESS']= $arFields['PROPERTY_TEXT3_VALUE']['TEXT'];
 $arResult['POSLE']= $arFields['PROPERTY_TEXT4_VALUE']['TEXT'];
}

/*card*/
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
	
/*card*/

$my_sections = CIBlockSection::GetList (Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$arResult['ID']),false, Array('ID', 'NAME', 'CODE', "DEPTH_LEVEL", 'DESCRIPTION'));
$i=0;
while($ar_fields = $my_sections->GetNext()) {

	$arResult['TAB'][$i]['ID']=$ar_fields['ID'];
	$arResult['TAB'][$i]['NAME']=$ar_fields['NAME'];
	$arResult['TAB'][$i]['DESCRIPTION']=$ar_fields['DESCRIPTION'];
	$arResult['TAB'][$i]['CODE']=$ar_fields['CODE'];
$i++;	
}

// Создаем изображение для превью соц.сетей
$image_social = CFile::ResizeImageGet($arResult['UF_BANER_IPAD'], array('width'=>'1200', 'height'=>'630'), BX_RESIZE_IMAGE_EXACT, true);

 $GLOBALS["OpenGraphImages"] = $image_social["src"];


?>
