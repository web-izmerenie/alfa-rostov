<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?=$arResult["DETAIL_TEXT"];?>
<?
    $APPLICATION->SetPageProperty("keywords", $arResult["DISPLAY_PROPERTIES"]["KEYWORDS"]["VALUE"]);
    $APPLICATION->SetPageProperty("description", $arResult["DISPLAY_PROPERTIES"]["DESCRIPTION"]["VALUE"]);
?>