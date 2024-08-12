<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<!--Секция калькулятора для услуг Косметологии (без зон с препаратами)-->
<section class="select-zone other-service">
        <div class="container">
			 <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","top",Array(
					"START_FROM" => "0", 
					"PATH" => "", 
					"SITE_ID" => "s1" 
					)
				);?>
              <div class="tab-zone">
              <!--Если услуга не Unisex показываем ТАБы навигации М/Ж -->
              <?if($GLOBALS["UnisexService"] == 'false'):?>
                     <ul class="tab-zone-nav">
                    <?foreach($arResult['TAB'] as $key =>$tab):?>
					    <?if ($key==0):?>
						    <li class="active">
					    <?else:?>
						    <li>
					    <?endif;?>
							<a class="tab-zone-nav__item" data-gender="<?=$tab['CODE'];?>" href="#<?=$tab['CODE'];?>" data-toggle="tab"><?=$tab['NAME'];?></a>
						    </li>
				    <?endforeach;?>
				</ul>
            <?endif;?>
            <!--ТАБы навигации М/Ж - Конец-->

            <div class="tab-content tab-zone-content">
              <?foreach($arResult['TAB'] as $key =>$tab):?>
			  
		        <div class="tab-pane fade <?if ($key==0) echo "active in";?>" id="<?=$tab['CODE'];?>">
                    <div class="c-tab-zone">
                      <div class="c-tab-zone__tab">
                        <div class="c-tab-zone__select">
                          <h3 class="h3 c-tab-zone__h3">Стоимость процедур</h3>
                        </div>
                           <div class="c-tab-zone__radio-list">
                          <div class="custom-radio-list">
                            <div class="custom-radio custom-radio--card-1 c-tab-zone__radio-item active" data-price="0">
                              <div class="custom-radio__ico"></div>
                              <div class="custom-radio__text">Нет карты</div>
                            </div>
                            <?$kard=2;?>
                            <?foreach($arResult['CARD'] as $key =>$card):?>
                            <div class="custom-radio custom-radio--card-<?=$kard;?> c-tab-zone__radio-item"  data-price="<?=$card['SALE']?>">
                              <div class="custom-radio__ico"></div>
                              <div class="custom-radio__text"><?=$card['NAME'];?><span class="help custom-tooltip" title="<?=$card['NAME'];?>" data-toggle="tooltip" data-placement="bottom">
                                  <svg class="icon icon-help help__ico">
                                    <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
                                  </svg></span></div>
                            </div>
                            <?$kard++;?>
                            <?endforeach;?>
                          </div>
                        </div>
                        <div class="b-removal preparat-block">
                          <dl class="b-removal-dl-inf">
                            <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
                            <dd class="b-removal-dl-inf__dd">Цена по карте</dd>
                          </dl>

                            <?
                                $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_PRICE1", "PROPERTY_PRICE2", "PROPERTY_TITLE_SERVICE","PROPERTY_HELP");
                                $arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$tab['ID'], "ACTIVE"=>"Y");
                                $res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                                while($ob = $res->GetNextElement())
                                {
                                 $arFields = $ob->GetFields();

                                ?>
                            <div class="b-removal-dl_rows">
                                <dl class="b-removal-dl" data-pic="z_w_<?= $arFields['ID'] ?>" data-id="<?= $arFields['ID'] ?>" data-pareny="<?= $arResult['ID']['NAME'] ?>" data-price="<?= $arFields['PROPERTY_PRICE1_VALUE'] ?>" data-sale="<?= $arFields['PROPERTY_PRICE2_VALUE'] ?>" data-name="<?= $arFields['PROPERTY_TITLE_SERVICE_VALUE'] ?>">
                                  <dt class="b-removal-dl__dt">
                                      <span class="b-removal-ico">
                                        <span class="b-removal-ico__checkmark">
                                                <svg class="icon b-removal-ico__ico-checkmark">
                                                  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#checkmark"></use>
                                                </svg>
                                        </span>
                                     </span>

                                     <?if ($arResult["UF_ZONE"]):?>
                                        <a class="b-removal-dl__title" href="<?= $arFields[ 'DETAIL_PAGE_URL' ] ?>">
                                                 <?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?>
                                                 <?if($arFields[ 'PROPERTY_HELP_VALUE']):?>
                                                     <span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
                                                        <svg class="icon icon-help help__ico">
                                                          <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
                                                        </svg>
                                                     </span>
                                                 <?endif;?>
                                        </a>
                                    <?else:?>
                                            <span class="b-removal-dl__title"><?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?>
                                                <?if (!empty($arFields['PROPERTY_HELP_VALUE'])):?>
                                                     <span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
                                                                    <svg class="icon icon-help help__ico">
                                                                      <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
                                                                    </svg>
                                                    </span>
                                                <?endif;?>
                                            </span>
                                        <?//endif;?>
                                    <?endif;?>
                                </dt>
                                    <?$fromPrice = 0;?>
                                    <?
                                    foreach ($arResult['preparat'] as $prep_id=>$prep_prop)
                                        if (($fromPrice === 0)&&($prep_prop["PROPERTY_SERVICE_VALUE"] === $arFields["ID"]))
                                            $fromPrice=$prep_prop['SALE_PRICE'];
                                        elseif ($prep_prop["PROPERTY_SERVICE_VALUE"] === $arFields["ID"])
                                            $fromPrice=($prep_prop['SALE_PRICE']<$fromPrice)?$prep_prop['SALE_PRICE']:$fromPrice;
                                    ?>
                                  <dd class="b-removal-dl__dd">
                                      <span class="b-removal-dl__price" data-minprice="<?=($fromPrice > 0)?$fromPrice:$arFields['PROPERTY_PRICE2_VALUE']?>"><?="от ".($fromPrice > 0)?$fromPrice:$arFields['PROPERTY_PRICE2_VALUE']." ₽" ?></span>
                                      <div class="prep_more">
                                          <a href="javascript:void(0)" data-link="<?=$arFields['DETAIL_PAGE_URL']?>">Подробнее</a>
                                          <svg class="icon b-removal-ico__ico-openArrow">
                                              <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#openArrow"></use>
                                          </svg>
                                      </div>
                                 </dd>
                               </dl>
                                   <?$prep_exist = false;?>
                                   <?foreach ($arResult['preparat'] as $prep_id=>$prep_prop):?>
                                       <?if ($prep_prop["PROPERTY_SERVICE_VALUE"] === $arFields["ID"]):?>
                                        <?if (!$prep_exist):?>
                                            <div class="preparats">
                                            <?$prep_exist = true;?>
                                        <?endif;?>
                                           <dl data-id="<?=$prep_prop['ID']?>" data-name="<?=$prep_prop['NAME']?>" data-price="<?=$prep_prop['BASE_PRICE']?>" data-sale="<?=$prep_prop['SALE_PRICE']?>">
                                               <svg class="icon b-removal-ico__ico-checkmark2">
                                                   <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#checkmark2"></use>
                                               </svg>
                                               <dt><?=$prep_prop["NAME"]?></dt>
                                               <dd><?=$prep_prop["BASE_PRICE"]." ₽"?></dd>
                                           </dl>
                                        <?endif;?>
                                    <?endforeach;?>
                                    <?if ($prep_exist):?>
                                        </div>
                                    <?endif;?>
                            </div>
                           <?
                              }
                            ?>
                        </div>
                        <div class="b-removal-total">
                          <div class="b-removal-total__content">
                            <div class="b-removal-total__txt">
                              <p><?=$arParams['PREVIEW_TEXT_USLUG'];?></p>
                            </div>
                              <div class="b-total">
                                <div class="b-total__summ">Общая стоимость: <span class="nowrap total">0</span></div>
                                <div class="b-total__sale">Ваша скидка по клубной карте <span class="nowrap">0</span></div>
                                <div class="b-removal-tag">

                                </div>
                              </div>
                          </div>
                            <!--Делаем кнопку активной по умолчанию-->
                            <!--div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div-->
                              <div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn" href="#" data-target="#modal-visit" data-toggle="modal">Записаться  на приём</a></div>
                        </div>
                      </div>
                      <div class="c-tab-zone__txt">
                        <div class="c-tab-zone__text">
                          <div class="cut-text">
                            <?=html_entity_decode(($arResult["UF_ALTSERVICETEXT"])?:$arResult["DESCRIPTION"]);?>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
			<?endforeach;?>
            </div>
          </div>
        </div>
      </section>
<?

?>