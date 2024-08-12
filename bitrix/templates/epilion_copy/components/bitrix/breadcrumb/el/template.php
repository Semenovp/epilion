<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
$strReturn .= '<div class="container"><div class="breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';
$banCatLevels = [4,5];//Исключенные из ХК порядковыеномера Категорий
$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	//echo $index;
	if (!in_array($index, $banCatLevels)) {
		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
		if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
		{
			$strReturn .= '
					<a class="breadcrumb__item" href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item">
						'.$title .'
					</a>
				';
		}
		elseif ($index == $itemSize-1) //БакановПВ else -> elseif ($index == $itemSize-1) 
		{
			$strReturn .= '
				
					'.$arrow.'
					<span class="breadcrumb__item">'.$title.'</span>
				';
		}
	}
}

$strReturn .= '</div></div>';

return $strReturn;
 
 
    