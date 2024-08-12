<?php
function daySpell (int $daysNum):string
{
    $typical = [
        1=>"день",
        2=>"дня",
        3=>"дня",
        4=>"дня"
    ];

    $strNum = str_split((string)$daysNum);
    $lastDigit = (int)$strNum[count($strNum)-1];
    if ($daysNum === 0) return "0 дней";
        elseif ($daysNum <= 4 || ($daysNum > 20 && $lastDigit <=4 && $lastDigit != 0))
            return (string)$typical[$lastDigit];
        else
            return "дней";

}

function dateToDays(string $strDate):int
{
    $datObj =  new DateTime($strDate);
    $uTStamp = $datObj->getTimestamp();
    $cTime = time();

    $days = intdiv(($uTStamp - $cTime), 86400);
    if ($days > 0)
        return $days;
    else
        return 0;
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