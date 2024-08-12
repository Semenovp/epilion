<?php
use \Bitrix\Highloadblock as HL;

function getHlProperties (array $item, string $prop_name): Array {

$arResult = $item;
$result = [];

foreach ($arResult['PROPERTIES'] as $code => $arProp) {

    if ( $arProp['CODE'] != $prop_name ) {
        continue;
    }

    if (!empty($arProp['VALUE']) && ($arProp['USER_TYPE'] == 'directory')) {

        foreach ($arProp['VALUE'] as $valArr => $value) {

                $XML_ID = $value;
                $tableName = $arProp['USER_TYPE_SETTINGS']['TABLE_NAME'];

                $hlblock = HL\HighloadBlockTable::getList(
                    array("filter" => array(
                        'TABLE_NAME' => $tableName
                    ))
                )->fetch();
                if (isset($hlblock['ID'])) {
                    $entity = HL\HighloadBlockTable::compileEntity($hlblock);
                    $entity_data_class = $entity->getDataClass();
                    $res = $entity_data_class::getList(array('filter' => array('UF_XML_ID' => $XML_ID,)));
                    if ($item = $res->fetch()) {
                        $result[] = $item['UF_NAME'];
                    }

                }
                //
        }
    }
    else {
        $result[] = $arProp['VALUE'];
    }

}
return $result;
}

function getTagByXmlId (string $table, string $id): string{
    $XML_ID = $id;
    $tableName = $table;

    $hlblock = HL\HighloadBlockTable::getList(
        array("filter" => array(
            'TABLE_NAME' => $tableName
        ))
    )->fetch();
    if (isset($hlblock['ID'])) {
        $entity = HL\HighloadBlockTable::compileEntity($hlblock);
        $entity_data_class = $entity->getDataClass();
        $res = $entity_data_class::getList(array('filter' => array('UF_XML_ID' => $XML_ID,)));
        if ($item = $res->fetch()) {
            $result = $item['UF_NAME'];
        }
        else $result = "undefined";
    }
    return $result;
}
function numberToMoney (string $num){
    $numArr = str_split($num);
    if (in_array('.',$numArr) || in_array('.',$numArr)){
        $coins = substr($num, strpos($num,'.'));
    }
    else
        $coins = '';

    $banknotes = str_split(substr($num,0, strlen($num) - strlen($coins)));

    $newNum = $coins;
    $j = 1;
    for($i=(count($banknotes)-1); $i>=0; $i--){
        if (($j % 3) !== 0) $newNum = $banknotes[$i].$newNum; else $newNum = " ".$banknotes[$i].$newNum;
        $j++;
    }
    return $newNum;
}
