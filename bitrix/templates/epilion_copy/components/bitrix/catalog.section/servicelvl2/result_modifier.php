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

$arResult['MIN_PRICE']=9999999999;
$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_PRICE1");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>3, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{	 $arFields = $ob->GetFields();
	 if ($arResult['MIN_PRICE']>$arFields['PROPERTY_PRICE1_VALUE']) {
	 $arResult['MIN_PRICE']= $arFields['PROPERTY_PRICE1_VALUE'];
	 }
}
 

// Создаем изображение для превью соц.сетей
$image_social = CFile::ResizeImageGet($arResult['UF_BANER_IPAD'], array('width'=>'1200', 'height'=>'630'), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);

 $GLOBALS["OpenGraphImages"] = $image_social["src"];

