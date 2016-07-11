<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
// if(count($arResult["ITEMS"]) == 1){
//     LocalRedirect($arResult["ITEMS"][0]["DETAIL_PAGE_URL"]."?ITEM_ONE=Y");
// }
$section = CIBlockSection::GetList(
    array(),
    array(
        "IBLOCK_TYPE" => "lists",
        "IBLOCK_CODE" => "nr_materials",
        "IBLOCK_ID" => $arResult["ID"],
        "CODE" => $_REQUEST["CODE"]
    ),
    false,
    array("UF_*"),
    false
);
if($section->SelectedRowsCount()){
    $arSection = $section->GetNext();
    ?>
    <div class="grid_wrapper">
        <a title="<?=GetMessage("TITLE_BACK")?>" href="<?=SITE_DIR?>nerudnye-materialy.html" class="backlink"></a><?
        if($arResult["ITEMS"][0]["IBLOCK_SECTION_ID"] == 8){
          print "<!--noindex-->";
        }
        foreach($arResult["ITEMS"] as $Item){
            $ItemName = preg_replace("/(\d+)-(\d+)/", "<span class='nowrap'>\$1-\$2</span>", $Item["NAME"]);
            $ItemName = preg_replace("/сорт (\d+)/", "<span class='nowrap'>сорт \$1</span>", $ItemName);
            if($arSection['CODE'] == 'scheben')
                $Item['DETAIL_PAGE_URL'] = str_replace('nerudnye-materialy/', '', $Item['DETAIL_PAGE_URL']);
            ?>
            <div class="grid_element">
                <a href="<?=$Item["DETAIL_PAGE_URL"]?>">
                    <span class="grid_element_img">
                        <img src="<?=$Item["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$Item["NAME"]?>" />
                        <span></span>
                    </span>
                    <span class="grid_element_title"><?=$ItemName?></span>
                    <?if(!empty($Item['PROPERTIES']['ATT_PRICE']['VALUE'])){?>
                        <span class="price">от <?=$Item['PROPERTIES']['ATT_PRICE']['VALUE'];?> руб.</span>
                    <?}?>
                </a>
            </div><?
        }
        if($arResult["ITEMS"][0]["IBLOCK_SECTION_ID"] == 8){
          print "<!--/noindex-->";
        }?>

    </div>
    <div class="double_zigzag_wrapper">
        <div><?=GetMessage("KRYIM")?></div>
    </div>
    <div class="content_text">
        <?=$arSection["DESCRIPTION"]?>
    </div>
    <?$APPLICATION->SetPageProperty("pagetitle", $arSection["NAME"]);?>
    <?$APPLICATION->SetPageProperty("headertitle", $arSection["UF_META_TITLE"]);?><?
}else{
    CHTTP::SetStatus("404 Not Found");
    require($_SERVER["DOCUMENT_ROOT"]."/404.php");
}?>
