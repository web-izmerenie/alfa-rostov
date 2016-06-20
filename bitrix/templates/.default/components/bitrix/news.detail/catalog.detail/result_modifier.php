<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arResult['PROPERTIES']['FAQ']['VALUE']) {
    $faq_id = array_map('intval', $arResult['PROPERTIES']['FAQ']['VALUE']);
    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y", "ID"=>$faq_id);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $arResult['FAQ_ITEMS'][] = $arFields;
    }
}