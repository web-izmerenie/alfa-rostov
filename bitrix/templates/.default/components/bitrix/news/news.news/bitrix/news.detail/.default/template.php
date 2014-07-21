<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?
$arResult["DISPLAY_ACTIVE_FROM"] = explode(" ", $arResult["DISPLAY_ACTIVE_FROM"]);
unset($arResult["DISPLAY_ACTIVE_FROM"][2]);
$arResult["DISPLAY_ACTIVE_FROM"] = implode(" ", $arResult["DISPLAY_ACTIVE_FROM"]);
?>
<div class="news_date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
<div class="news_title">
    <h2><?=$arResult["NAME"]?></h2>
</div>
<div class="detail_text">
    <?=$arResult["DETAIL_TEXT"]?>
</div><?
if($arResult["DETAIL_PICTURE"]["SRC"]){?>
    <div class="detail_picture"><img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>"></div><?
}?>
</div>