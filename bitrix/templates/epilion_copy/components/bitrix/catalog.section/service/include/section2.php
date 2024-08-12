<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<!--Секция калькулятора для  Лазерной эпиляции (с зонами и ФОТО без препаратов)-->
<section class="select-zone">
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
                            <a class="tab-zone-nav__item" href="#<?=$tab['CODE'];?>" data-toggle="tab"><?=$tab['NAME'];?></a>
                        </li>
                <?endforeach;?>
                </ul>
			<?endif;?>
            <!-- -->

            <div class="tab-content tab-zone-content">
              <!-- Таб для гендера-->
			  <?foreach($arResult['TAB'] as $key =>$tab):?>
			  
			     <div class="tab-pane fade <?if ($key==0) echo "show active in";?>" id="<?=$tab['CODE'];?>">
					<div class="c-tab-zone">
					  <div class="c-tab-zone__tab">
						<div class="c-tab-zone__select">
						  <h3 class="h3 c-tab-zone__h3">Стоимость процедур</h3>
						</div>
						  <div class="c-tab-zone__radio-list">
							  <div class="custom-radio-list">
								<div class="custom-radio custom-radio--card-1 active c-tab-zone__radio-item" data-price="0">
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
						<div class="tab-zone-2">
						  <ul class="tab-zone-2-nav">
						  <!-- тут раздел уровня 2-->
						  <?
							$my_sections = CIBlockSection::GetList (Array("SORT" => "ASC"), Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$tab['ID']),false, Array('ID', 'NAME', 'CODE'));
							$i=0;
							while($ar_fields = $my_sections->GetNext()) {?>	  
								<li <?if($i==0) {?>class="active"<?}?>>
									<a class="tab-zone-2-nav__item" href="#zone-<?=$ar_fields['ID']?>" data-toggle="tab"><?echo $ar_fields['NAME'];?></a>
								</li>
							  <?$i++;?>
						  <?}?>
						  <!-- тут раздел уровня 2--> 
						  </ul>
						
						  <div class="tab-content tab-zone-2-content">
						  
							 <?
						  $i2=0;
						  $my_sections = CIBlockSection::GetList (
							  Array("SORT" => "ASC"),
							  Array("IBLOCK_ID" => $arParams['IBLOCK_ID'], "ACTIVE" => "Y", 'SECTION_ID'=>$tab['ID']),
							  false,
							  Array('ID', 'NAME', 'CODE','PICTURE','UF_PHOTO_ZH','UF_TYPE_PHOTO' )
								);
								
							
							while($ar_fields = $my_sections->GetNext())
								
							{		
									if ($ar_fields['UF_TYPE_PHOTO']) {
										$type_pic=$ar_fields['UF_TYPE_PHOTO'];
									} else {
										$type_pic=1;
									}
									?>
									
								<div class="tab-pane fade show <?if ($i2==0) {?>active in<?}?>" id="zone-<?=$ar_fields['ID']?>">
								  <div class="b-removal">
									<div class="b-removal-pic-container">
								
									  <div class="b-removal-pic b-removal-pic-<?=$type_pic;?>">
										<img src="<?= CFile::GetPath($ar_fields['UF_PHOTO_ZH']) ?>" alt=""> 
										<?
										$arSelect = Array("ID", "NAME","PROPERTY_PRICE1", "PROPERTY_PRICE2","PROPERTY_ZONE");
										$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields['ID'], "ACTIVE"=>"Y");
										$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
										while($ob = $res->GetNextElement())
										{
										 $arFields = $ob->GetFields();
										?>
										<div class="zone-mini-style" id="z_w_<?= $arFields['ID'] ?>" data-name="<?= $arFields['NAME'] ?>"  style="background-image: url(<?= CFile::GetPath(   $arFields['PROPERTY_ZONE_VALUE']) ?>);"></div>
										<?}?>
									  </div>
										
									</div>
									<dl class="b-removal-dl-inf">
									  <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
									  <dd class="b-removal-dl-inf__dd">Цена</dd>
									</dl>
									
										<?								
										$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_PRICE1","PROPERTY_PRICE2", "PROPERTY_TITLE_SERVICE",'PROPERTY_HELP','PROPERTY_GENDER',"PROPERTY_NEW_PRICE","PROPERTY_NEW_PRICE_CARD","PROPERTY_NEW_PRICE_DATE");
										$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$ar_fields['ID'], "ACTIVE"=>"Y", "PROPERTY_GENDER_VALUE"=>strtolower($tab['NAME']));
										$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
										while($ob = $res->GetNextElement())
										{
										 $arFields = $ob->GetFields();
                                         $arPrice = (!empty($arFields['PROPERTY_NEW_PRICE_VALUE']) && (MakeTimeStamp($arFields['PROPERTY_NEW_PRICE_DATE_VALUE']) <= getmicrotime())) ? $arFields['PROPERTY_NEW_PRICE_VALUE'] : $arFields['PROPERTY_PRICE1_VALUE'];
                                         $arSalePrice = (!empty($arFields['PROPERTY_NEW_PRICE_CARD_VALUE']) && (MakeTimeStamp($arFields['PROPERTY_NEW_PRICE_DATE_VALUE']) <= getmicrotime())) ? $arFields['PROPERTY_NEW_PRICE_CARD_VALUE'] : $arFields['PROPERTY_PRICE2_VALUE'];
										?>
									<dl class="b-removal-dl" data-pic="z_w_<?= $arFields['ID'] ?>" data-id="<?= $arFields['ID'] ?>" data-gender="<?= $arFields['PROPERTY_GENDER_VALUE'] ?>" data-pareny="<?= $ar_fields['NAME'] ?>" data-price="<?= $arPrice ?>" data-sale="<?= $arSalePrice ?>" data-name="<?= $arFields['PROPERTY_TITLE_SERVICE_VALUE'] ?>">
									  <dt class="b-removal-dl__dt">
										  <span class="b-removal-ico">
											<span class="b-removal-ico__plus">
													<svg class="icon icon-plus b-removal-ico__ico-plus">
													  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#plus"></use>
													</svg>
											</span>
											<span class="b-removal-ico__minus">
													<svg class="icon icon-minus b-removal-ico__ico-minus">
														<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#minus"></use>
													</svg>
											</span>
										 </span>
									
										 <?if ($arResult["UF_ZONA"]):?>
											<a class="b-removal-dl__title" href="<?= $arFields[ 'DETAIL_PAGE_URL' ] ?>">
													 <?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?>
													 <?if($arFields[ 'PROPERTY_HELP_VALUE']):?>	
													 <span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
														<svg class="icon icon-help help__ico">
														  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
														</svg></span>
														<?endif;?>
													</a>
										<?else:?>
										<span class="b-removal-dl__title"><?= $arFields[ 'PROPERTY_TITLE_SERVICE_VALUE' ] ?></span>
										<?if($arFields[ 'PROPERTY_HELP_VALUE']):?>	
										<span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
														<svg class="icon icon-help help__ico">
														  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
														</svg>
										</span>
										<?endif;?>
										<?endif;?>
										
											
									</dt>
										<?if ($arSalePrice == 0):?>
										<dd class="b-removal-dl__dd"><span class="b-removal-dl__price"><?=$arPrice ?></span></dd>
										<?else:?>
										<dd class="b-removal-dl__dd"><span class="b-removal-dl__price"><?=$arSalePrice?></span></dd>
										<?endif?>
								   </dl>
										<?//echo "<pre>"; echo print_r($arFields, true); echo "</pre>";
										}
										?>                            							
									
								  </div>
								</div>
							<?$i2++;?>
							
							<?}?>
							
					
				  </div>
				   <!-- раздел где лицо польнось --> 
				   
				  </div>
				  <div class="b-removal-total">
					<div class="b-removal-total__content">
					  <div class="b-removal-total__txt">
						<!--p><?=$arParams['PREVIEW_TEXT_USLUG'];?></p-->
						  <p>Для вычисления общей стоимости услуг выберите нужные зоны.</p>
							<p><a href='/upload/totalprice.pdf' target='_blank'><?="Смотреть полный прайс"?></a></p>
					  </div>
					  <div class="b-total">
						<div class="b-total__summ">Общая стоимость: <span class="nowrap total">0</span></div>
						<div class="b-total__sale">Ваша скидка по клубной карте <span class="nowrap">0</span></div>
						<div class="b-removal-tag">

						</div>
					  </div>
					</div>
<!--Включаем кнопку записи " по-умолчанию" в прайсе страницы услуги-->
					<!--div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn disabled" href="#" data-target="#modal-visit" data-toggle="modal" data-gender="<?=$tab['CODE'];?>">Записаться  на приём</a></div-->
					<div class="b-removal-total__btn-row"><a class="blue-btn-2 b-removal-total__btn" href="#" data-target="#modal-visit" data-toggle="modal" data-gender="<?=$tab['CODE'];?>">Записаться  на приём</a></div>
				  </div>
				</div>

			  <div class="c-tab-zone__txt">
				<div class="c-tab-zone__text">
				  <div class="cut-text">
					<?=$tab['DESCRIPTION'];?>
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
