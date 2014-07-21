<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <section id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="article_item"><?
    $arItem["DISPLAY_ACTIVE_FROM"] = explode(" ", $arItem["DISPLAY_ACTIVE_FROM"]);
    unset($arItem["DISPLAY_ACTIVE_FROM"][2]);
    $arItem["DISPLAY_ACTIVE_FROM"] = implode(" ", $arItem["DISPLAY_ACTIVE_FROM"]);?>
        <span class="article_item_date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></span><h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
    </section>
		
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

