<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/components/bitrix/catalog.section/service/beforeafter.css");
Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/components/bitrix/catalog.section/service/beforeafter.js");

/**
 * @var array $arParams
 * @var array $templateData
 * @var string $templateFolder
 * @var CatalogSectionComponent $component
 */

global $APPLICATION;


if (!empty($templateData['TEMPLATE_LIBRARY']))
{
	$loadCurrency = false;
	if (!empty($templateData['CURRENCIES']))
	{
		$loadCurrency = \Bitrix\Main\Loader::includeModule('currency');
	}

	CJSCore::Init($templateData['TEMPLATE_LIBRARY']);

	if ($loadCurrency)
	{
		?>
		<script>
			BX.Currency.setCurrencies(<?=$templateData['CURRENCIES']?>);
		</script>
		<?
	}
}

//	lazy load and big data json answers
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if ($request->isAjaxRequest() && ($request->get('action') === 'showMore' || $request->get('action') === 'deferredLoad'))
{
	$content = ob_get_contents();
	ob_end_clean();

	list(, $itemsContainer) = explode('<!-- items-container -->', $content);
	list(, $paginationContainer) = explode('<!-- pagination-container -->', $content);
	list(, $epilogue) = explode('<!-- component-end -->', $content);

	if ($arParams['AJAX_MODE'] === 'Y')
	{
		$component->prepareLinks($paginationContainer);
	}

	$component::sendJsonAnswer(array(
		'items' => $itemsContainer,
		'pagination' => $paginationContainer,
		'epilogue' => $epilogue,
	));
}
/*
$APPLICATION->SetPageProperty('og:image', "https://".SITE_SERVER_NAME . $arResult['DETAIL_PICTURE']['SOCIAL']);
//print_r($arResult["PICTURE"]);
$APPLICATION->SetPageProperty('og:image:width', $image_social['WIDTH']);
$APPLICATION->SetPageProperty('og:image:height', $image_social['HEIGHT']);
*/

?>
