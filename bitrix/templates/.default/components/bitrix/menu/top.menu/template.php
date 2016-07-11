<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?><?
    preg_match("/\/([a-z-_0-9]+).html/", $arItem["LINK"], $matches);
    
    if(stripos($arItem["LINK"], $matches[1]) && stripos($APPLICATION->GetCurPage(), $matches[1]) && $arItem["LINK"] != $APPLICATION->GetCurPage()){
        $arItem["SELECTED"] = "Y";
    }
?><?
    if($APPLICATION->GetCurPage() == SITE_DIR){?>
        <?if($arItem["SELECTED"]):?>
            <?if($arItem["LINK"] == $APPLICATION->GetCurPage()):?>
                <li><span><?=$arItem["TEXT"]?></span></li>
            <?else:?>
                <li><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a></li>
            <?endif?>
        <?else:?>
            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
        <?endif?><?
    }else{?>
        <?if($arItem["SELECTED"]):?>
            <?if($arItem["LINK"] == $APPLICATION->GetCurPage()):?>
                <li><span><?=$arItem["TEXT"]?></span></li>
            <?else:?>
                <li><span data-link="<?=$arItem["LINK"]?>" class="span_link active"><?=$arItem["TEXT"]?></span></li>
            <?endif?>
        <?else:?>
            <li><span data-link="<?=$arItem["LINK"]?>" class="span_link" ><?=$arItem["TEXT"]?></span></li>
        <?endif?>
    <?}?>
        
	
<?endforeach?>

</ul>
<?endif?>