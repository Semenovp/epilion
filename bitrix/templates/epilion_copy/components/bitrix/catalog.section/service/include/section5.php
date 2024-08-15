<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<!--Секция калькулятора для всех услуг кроме Лазерной эпиляции (без зон и процедур)-->
<section class="select-zone other-service">
    <div class="container">
        <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "top", array(
                "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => "s1"
            )
        ); ?>
        <div class="section-content-main">
            <h2>
                Что такое массаж
            </h2>
            <p>Массаж – это техника воздействия на тело, которая используется для расслабления мышц, улучшения
                кровообращения и улучшения общего состояния организма. Массаж – это медицинская услуга, которая должна
                оказываться медицинским персоналом.</p>
            <p>Массаж имеет множество положительных эффектов на организм. Он помогает снять напряжение, способствует
                улучшению кровообращения и лимфатической системы, а также снижает боли и способствует общему
                оздоровлению тела.</p>
            <p>В нашем медицинском центре представлен аппаратный и ручной массаж. Каждый вид массажа имеет свои
                особенности и может быть применен в зависимости от конкретных потребностей и целей.</p>
        </div>
        <section class="link-to-services">
            <h2>
                Что мы можем вам предложить
            </h2>
            <div class="service-wrap">
                <div class="service-item">
                    <img src="/bitrix/templates/epilion_copy/img/massage/s_i_1.png" alt="">
                    <div class="title">
                        LPG Cellu M6 Integral
                    </div>
                    <div class="back_layout">
                    </div>
                    <a href="#">Подробнее</a>
                </div>
                <div class="service-item">
                    <img src="/bitrix/templates/epilion_copy/img/massage/s_i_3.png" alt="">
                    <div class="title">
                        Beautylizer Therapy/RSL
                    </div>
                    <div class="back_layout">
                    </div>
                    <a href="#">Подробнее</a>
                </div>
                <div class="service-item">
                    <img src="/bitrix/templates/epilion_copy/img/massage/s_i_2.png" alt="">
                    <div class="title">
                        Ручной массаж
                    </div>
                    <div class="back_layout">
                    </div>
                    <a href="#">Подробнее</a>
                </div>
            </div>
        </section>
        <? $APPLICATION->IncludeComponent(
            "epilion:short_price.elements",
            ".default",
            array(
                "CACHE_TIME" => "120",
                "CACHE_TYPE" => "A",
                "COMPONENT_TEMPLATE" => ".default",
                "MAIN_AB_LINK" => "/",
                "MAIN_AB_TEXT" => "Хочу клубную карту",
                "MAIN_AB_TYPE" => "Y",
                "MAIN_EB_LINK" => "",
                "MAIN_EB_TEXT" => "Хочу скидку!",
                "MAIN_EB_TYPE" => "Y",
                "MAIN_SB_LINK" => "/upload/totalprice.pdf",
                "MAIN_SB_TEXT" => "Весь прайс",
                "MAIN_SB_TYPE" => "N",
                "MAIN_TITLE" => "Стоимость популярных услуг",
                "SALE_ACTIVE_ONLY" => "N",
                "SALE_SECTION_CODE" => "PROMO",
                "SALE_SHOW_OPENED" => "Y",
                "SALE_TITLE" => "Самые выгодные предожения для клиентов Epilion",
                "SERVICE_ACTIVE_ONLY" => "Y",
                "SERVICE_FILTER_PROP" => "PROMO_PRICE",
                "SERVICE_SECTIONS" => array(
                    0 => "30",
                    1 => "79",
                ),
                "SERVICE_SHOW_OPENED" => "N",
                "SERVICE_SUBSECTIONS" => "Y",
                "SHOW_SALE" => "Y",
                "SHOW_SERVICE" => "Y"
            ),
            false
        ); ?>

    </div>
</section>
<section class="indications-contraindications">
    <div class="container">
        <div class="b-ind-cont">
            <div class="b-indications">
                <h3 class="h3 indications-contraindications__h3">Показания</h3>
                <p>Массаж подходит людям любого пола и возраста, поэтому у процедуры обширный список показаний:</p>
                <ul class="custom-ul custom-ul--padding">
                    <li>Целлюлит любой стадии и типа</li>
                    <li>Отеки, тканевые застои</li>
                    <li>Избыточные жировые отложения</li>
                    <li>Мышечная гипотония/гипертонус</li>
                    <li>Снижение тургора/растяжки</li>
                    <li>Нарушение микроциркуляции</li>
                    <li>Симптом «усталых ног»</li>
                    <li>Спортивные травмы (реабилитация)</li>
                    <li>Подготовка и реабилитация после пластических операций и липосакции</li>
                </ul>
            </div>
            <div class="b-contraindications">
                <h3 class="h3 indications-contraindications__h3">Противопоказания</h3>
                <p>Вместе с тем, даже у такой общедоступной процедуры как массаж, есть некоторые случаи, в которых
                    данная процедура противопоказана:</p>
                <ul class="custom-ul custom-ul--padding">
                    <li>Онкологические заболевания</li>
                    <li>Беременность, период лактации</li>
                    <li>Острые инфекционные, вирусные заболевания</li>
                    <li>Прием антикоагулянтов</li>
                    <li>Хронические заболевания в стадии обострения</li>
                    <li>Гипертермия</li>
                    <li>Флебит, тромбоз, трофические язвы, воспаленные варикозные гроздья</li>
                    <li>Эпилепсия</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="tab-zone-section">
    <div class="tab-zone">


        <div class="container">
            <h2>
                Наше оборудование
            </h2>
            <ul class="tab-zone-nav">
                <li class="active">
                    <a class="tab-zone-nav__item" href="#LPG" data-toggle="tab">
                        LPG Cellu M6 Integral
                    </a>
                </li>
                <li>
                    <a class="tab-zone-nav__item" href="#Beautylizer" data-toggle="tab">
                        Beautylizer RSL
                    </a>
                </li>
            </ul>
            <div class="tab-content tab-zone-content">

                <div class="tab-pane fade active in" id="LPG">
                    <div class="c-tab-zone">
                        <div class="c-tab-zone__tab">
                            <h3>
                                Аппарат LPG Cellu M6 Integral
                            </h3>
                            <div class="text-tab">
                                <p>Аппарат LPG Cellu M6 Integral - лидер среди аппаратов для выполнения
                                    вакуумно-роликового массажа. Производитель Франция. LPG Cellu M6 Integral 6-е
                                    поколение аппаратов, которое является самым инновационным и эффективным.</p>
                                <p>LPG массаж – это медицинская аппаратная методика, применяемая для коррекции тела. В
                                    ее основе – стимуляция процессов метаболизма в подкожных жировых клетках. В
                                    результате процедуры улучшается микроциркуляция, становится сильнее лимфоток,
                                    осуществляет стимуляцию всех клеток подкожного жира и фибробластов.</p>
                            </div>
                            <div class="footer-tab">
                                <button class="btn-tabs">
                                    Узнать подробнее
                                </button>
                            </div>
                        </div>
                        <div class="c-tab-zone__txt">
                            <div class="c-tab-zone__text">
                                <div class="cut-text">
                                    <img src="/bitrix/templates/epilion_copy/img/massage/lgt.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="Beautylizer">
                    <div class="c-tab-zone">
                        <div class="c-tab-zone__tab">
                            <h3>
                                Аппарат LPG Cellu M6 Integral
                            </h3>
                            <div class="text-tab">
                                <p>Аппарат LPG Cellu M6 Integral - лидер среди аппаратов для выполнения
                                    вакуумно-роликового массажа. Производитель Франция. LPG Cellu M6 Integral 6-е
                                    поколение аппаратов, которое является самым инновационным и эффективным.</p>
                                <p>LPG массаж – это медицинская аппаратная методика, применяемая для коррекции тела. В
                                    ее основе – стимуляция процессов метаболизма в подкожных жировых клетках. В
                                    результате процедуры улучшается микроциркуляция, становится сильнее лимфоток,
                                    осуществляет стимуляцию всех клеток подкожного жира и фибробластов.</p>
                            </div>
                        </div>
                        <div class="c-tab-zone__txt">
                            <div class="c-tab-zone__text">
                                <div class="cut-text">
                                    <img src="/bitrix/templates/epilion_copy/img/massage/lgt.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>