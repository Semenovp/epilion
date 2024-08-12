<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";
if (isset($_GET["q"])) $arResult[] = ["TITLE"=>"Поиск", "LINK"=>""];
$strReturn = '';

//we can't use $APPLICATION->SetAdditionalCSS() here because we are inside the buffered function GetNavChain()
$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	//$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
		
		$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
		if(($index != $itemSize-1))
		{
			$strReturn .= '
			        <item itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a  itemprop="item" class="breadcrumb__item" href="'.$arResult[$index]["LINK"].'" title="'.$title.'">
                            <span itemprop="name">
                                '.$title.'
                            </span>
                        </a>
                        <meta itemprop="position" content="'.($index + 1).'" />
					</item>
				';
		}
		else
		{
			$strReturn .= '
			<item itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
					'.$arrow.'
					<a itemprop="item" href="javascript:void(0)" class="breadcrumb__item last"><span  itemprop="name">'.$title.'</span></a>
					<meta itemprop="position" content="'.($index + 1).'" />
			</item>
				';
		}
}

$strReturn .= '</div>';
//echo  print_r($arResult);
return $strReturn;
    