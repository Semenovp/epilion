<?//if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

$arVariables = array();
$arComponentVariables = array('ACTION');
$arVariableAliases = array();

CComponentEngine::InitComponentVariables(
    false,                 // в режиме не ЧПУ всегда false
    $arComponentVariables, // массив имен переменных, которые компонент может получать из запроса
    $arVariableAliases,    // массив псевдонимов переменных
    $arVariables           // массив, в котором возвращаются восстановленные переменные
);


$subComponent = 'elements';


$this->IncludeComponentTemplate($subComponent);