<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult['MATERIAL'] = array();
if($arResult['PROPERTIES']['MATERIAL']['VALUE']) {
    $arSelect = Array("ID", "NAME", "IBLOCK_ID", "SECTION_PAGE_URL", "PREVIEW_PICTURE", "DETAIL_PICTURE", "DETAIL_TEXT");
    $arFilter = Array("IBLOCK_ID"=>1, "ID"=>intval($arResult['PROPERTIES']['MATERIAL']['VALUE']), "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nTopCount"=>1), $arSelect);
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        if($arFields['PREVIEW_PICTURE'])
            $arFields['PREVIEW_PICTURE'] = CFile::GetFileArray($arFields['PREVIEW_PICTURE']);
        if($arFields['DETAIL_PICTURE'])
            $arFields['DETAIL_PICTURE'] = CFile::GetFileArray($arFields['DETAIL_PICTURE']);
        $arResult['MATERIAL'] = $arFields;

    }
}

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