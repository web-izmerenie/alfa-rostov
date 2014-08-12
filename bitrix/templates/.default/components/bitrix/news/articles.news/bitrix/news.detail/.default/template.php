<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?=$arResult["DETAIL_TEXT"];?>
<?
    $APPLICATION->SetPageProperty("keywords", $arResult["PROPERTIES"]["KEYWORDS"]["VALUE"]);
    $APPLICATION->SetPageProperty("description", $arResult["PROPERTIES"]["DESCRIPTION"]["VALUE"]);
    $APPLICATION->SetPageProperty("pagetitle", $arResult["NAME"]);
    $APPLICATION->SetPageProperty("headertitle", $arResult["PROPERTIES"]["META_TITLE"]["VALUE"]);
?>