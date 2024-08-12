     <section class="select-zone other-service">
        <div class="container">
			 <?$APPLICATION->IncludeComponent("bitrix:breadcrumb","top",Array(
					"START_FROM" => "0", 
					"PATH" => "", 
					"SITE_ID" => "s1" 
					)
				);?>
				
          <div class="tab-zone">
            <ul class="tab-zone-nav">
                 <ul class="tab-zone-nav">
				<?
				foreach($arResult['TAB'] as $key =>$tab):
				?>
					<?if ($key==0):?>
						<li class="active">
					<?else:?>
						<li>
					<?endif;?>
							<a class="tab-zone-nav__item" data-gender="<?=$tab['CODE'];?>" href="#<?=$tab['CODE'];?>" data-toggle="tab"><?=$tab['NAME'];?></a>
						</li>
				<?endforeach;?>
					
				
				</ul>
            </ul>
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
                    <?/*<div class="c-tab-zone__radio-list">
                      <div class="check c-tab-zone__radio-item">
                        <input id="q1-1" type="radio" name="cardRadioMan" value="Нет карты" checked>
                        <label for="q1-1">Нет карты</label>
                      </div>
				  <?foreach($arResult['CARD'] as $key =>$card):?>	
				  <div class="check c-tab-zone__radio-item" data-price="<?=$card['SALE']?>">
					<input id="<?=$tab['CODE'];?><?=$key?>" type="radio" name="cardRadioMan" value="<?=$card['NAME'];?>">
					<label for="<?=$tab['CODE'];?><?=$key?>"><?=$card['NAME'];?><span class="help custom-tooltip" title="<?=$card['NAME'];?>" data-toggle="tooltip" data-placement="bottom">
						<svg class="icon icon-help help__ico">
						  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
						</svg></span></label>
				  </div>
				<?endforeach;?>
                    </div>*/?>
                    <div class="b-removal">
                      <dl class="b-removal-dl-inf">
                        <dt class="b-removal-dl-inf__dt">Обрабатываемая зона</dt>
                        <dd class="b-removal-dl-inf__dd">Цена по карте</dd>
                      </dl>
					  
                      	<?
										
							$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL","PROPERTY_PRICE1", "PROPERTY_PRICE2", "PROPERTY_TITLE_SERVICE",'PROPERTY_HELP');
							$arFilter = Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "IBLOCK_SECTION_ID"=>$tab['ID'], "ACTIVE"=>"Y");
							$res = CIBlockElement::GetList(Array("SORT" => "ASC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
							while($ob = $res->GetNextElement())
							{
							 $arFields = $ob->GetFields();
							
							?>
						<dl class="b-removal-dl" data-pic="z_w_<?= $arFields['ID'] ?>" data-id="<?= $arFields['ID'] ?>" data-pareny="<?= $arResult['ID']['NAME'] ?>" data-price="<?= $arFields['PROPERTY_PRICE1_VALUE'] ?>" data-sale="<?= $arFields['PROPERTY_PRICE2_VALUE'] ?>" data-name="<?= $arFields['PROPERTY_TITLE_SERVICE_VALUE'] ?>">
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
							 
							 <?if ($arResult["UF_ZONE"]):?>
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
							<span class="help custom-tooltip" title="<?= $arFields['PROPERTY_HELP_VALUE'] ?>" data-toggle="tooltip" data-placement="bottom">
											<svg class="icon icon-help help__ico">
											  <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/img/svg-sprite/sprite.svg#help"></use>
											</svg></span>
							<?endif;?>
						</dt>
						  <dd class="b-removal-dl__dd"><span class="b-removal-dl__price"><?= $arFields[ 'PROPERTY_PRICE1_VALUE'] ?>
						  	 
								</span>
						 </dd>
					   </dl>
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
                        <?=$arResult['DESCRIPTION'];?>
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