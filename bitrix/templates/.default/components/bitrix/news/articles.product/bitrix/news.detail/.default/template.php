<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <main>
        <div class="section_standart detail_text_photo_block">
            <div class="grid_element">
                <a href="<?=$arResult['MATERIAL']["DETAIL_PICTURE"]["SRC"]?>" data-action="getLarge" class="resizer"></a>
        <span class="grid_element_img">
            <a href="<?=$arResult['MATERIAL']["DETAIL_PICTURE"]["SRC"]?>" data-action="getLarge">
                <img src="<?=$arResult['MATERIAL']["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult['MATERIAL']["NAME"]?>" />
                <span></span>
            </a>
        </span>
            </div>
            <div class="grid_text">
                <?=$arResult['MATERIAL']["DETAIL_TEXT"]?>
                <div class="grid_params">
                    <?if($arResult['PROPERTIES']['FAST_DELIVERY']['VALUE']){?>
                    <div class="grid_params-color point1">Доставка на следующий день</div>
                    <?}?>
                    <?if($arResult['PROPERTIES']['FAST_CALC']['VALUE']){?>
                    <div class="grid_params-color point2">Рассчет стоимости заказа от 5 до 10 минут</div>
                    <?}?>
                </div>
            </div>
        </div>
    </main>
    <?if($arResult['PROPERTIES']['NAME']['VALUE']) {?>
        <div class="price_table_grid">
            <div class="price_table_grid-title">Стоимость</div>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Тонна</th>
                        <th>Камаз</th>
                        <th>Куб</th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($arResult['PROPERTIES']['NAME']['VALUE'] as $k=>$item) {?>
                        <tr>
                            <td class="name"><?=$item?></td>
                            <td><?=$arResult['PROPERTIES']['PRICE_1']['VALUE'][$k]?></td>
                            <td><?=$arResult['PROPERTIES']['PRICE_2']['VALUE'][$k]?></td>
                            <td><?=$arResult['PROPERTIES']['PRICE_3']['VALUE'][$k]?></td>
                        </tr>
                    <?}?>
                </tbody>
            </table>
            <?if($arResult['PROPERTIES']['PHONE']['VALUE']){?>
            <div class="phone-block">
                <span><?=$arResult['PROPERTIES']['PHONE_TITLE']['VALUE']?></span><div class="phone-yellow"><?=$arResult['PROPERTIES']['PHONE']['VALUE']?></div>
            </div>
            <?}?>
        </div>
    <?}?>
    <section class="section_standart detail-block">
        <h2><?=$arResult['NAME']?></h2>
        <div class="detail-block_text over-block">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
        <a href="#" class="read-more">Читать далее</a>
    </section>
    <?if($arResult['FAQ_ITEMS']) {?>
    <div class="double_zigzag_wrap">
        <div class="faq-block">
            <div class="faq-block_title">Вопрос-ответ</div>
            <?foreach($arResult['FAQ_ITEMS'] as $k=>$faq){
                if($k and $k%3==0) echo '<div class="faq-block_wrapper">';?>
                <div class="faq-block_item">
                    <p class="faq-question"><?=$faq['NAME']?></p>
                    <p class="faq-answer"><?=$faq['PREVIEW_TEXT']?></p>
                </div>
            <?}?>
            <?if(count($arResult['FAQ_ITEMS'])>3) {?>
                </div>
                <a href="#" class="read-more">Читать далее</a>
            <?}?>
        </div>
    </div>
    <?}?>
    <div class="dark_side">
        <img src="/bitrix/templates/main/images/track-detail.png" />
        <h2><?=GetMessage("NEXT_DAY_DELIVERY_LABEL")?></h2>
    </div>
    <div class="calculation"><?
        if($arResult["DISPLAY_PROPERTIES"]["SEO_TITLE"]["VALUE"]){?>
            <div class="label"><?=$arResult["DISPLAY_PROPERTIES"]["SEO_TITLE"]["VALUE"]?></div><?
        }?><?
        if($arResult["DISPLAY_PROPERTIES"]["SEO_DESC"]["~VALUE"]){?>
            <?=$arResult["DISPLAY_PROPERTIES"]["SEO_DESC"]["~VALUE"]["TEXT"]?><?
        }?>
        <?if($arResult['PROPERTIES']['ORDER_PHONE']['VALUE']){?>
        <div class="order-block">
            <span><?=$arResult['PROPERTIES']['ORDER_TITLE']['VALUE']?></span>
            <div class="phone"><?=$arResult['PROPERTIES']['ORDER_PHONE']['VALUE']?></div>
        </div>
        <?}?>
        <!--    <span data-link="--><?//=SITE_DIR?><!--" class="large_button span_link">--><?//=GetMessage("CALC_BUTTON")?><!--</span>-->
    </div>
    <div class="double_zigzag_wrapper">
        <div><?=GetMessage("KRYIM")?></div>
    </div>



<?/*
<div class="section_standart section_standart_wide seo_articles">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img class="detail_picture" border="0" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arResult["NAME"]?>"  title="<?=$arResult["NAME"]?>" />
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>*/?>