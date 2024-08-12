<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

// шаблон компонента голосует против композита
$this->setFrameMode(true);
?>


    <div class="container-1200 short_price_item">
        <div class="short_price_item-caption<?=($arParams['PROMO_SALE'] == 'Y')?' promo_sale':''?>">
            <div class="item-caption-gif bolt">
                <svg class="icon">
                    <use xlink:href="/local/components/epilion/short_price/templates/.default/epilion/short_price.elements/.default/img/sprite.svg#bolt"></use>
                </svg>
            </div>
            <div class="item-caption-label">
                Акция!
            </div>
            <h3>
                <?=$arResult["SECTIONS"][$arParams["SECTION_ID"]]["NAME"]?>
            </h3>
            <div class="item-caption-gif cmark">
                <svg>
                    <use xlink:href="/local/components/epilion/short_price/templates/.default/epilion/short_price.elements/.default/img/sprite.svg#checkMark"></use>
                </svg>
            </div>
        </div>
        <div class="short_price_item-service caption">
            Цена по акции
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
        <div class="short_price_item-service">
            <div>
                <h4>Лазерная эпиляция “Все тело” на аппарате Wingderm</h4>
                <p>Действует для новых клиентов.<span>3 дня</span><span> до конца акции. </span></p>
            </div>
            <div>
                <p class="oldprice">15 990₽</p>
                <p class="newprice">11 990₽</p>
            </div>
            <aside>
                <button>Хочу скидку!</button>
            </aside>
        </div>
    </div>









<?
//echo "<pre>";
//echo "Результат выборки:".PHP_EOL.print_r($arParams, true);
//echo "</pre>";
?>