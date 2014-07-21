<?
define("SHOW_TITLE", "Y");
define("NR_MATERIALS", "Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule("iblock");
$APPLICATION->SetTitle("Нерудные материалы");
?>
<div class="grid_wrapper"><?
    $section = CIBlockSection::GetList(
        array(
            "SORT" => "asc"
        ),
        array(
            "IBLOCK_TYPE" => "lists",
            "IBLOCK_CODE" => "nr_materials"
        ),
        false,
        array(),
        false
    );
    while($arSection = $section->GetNext()){
        $picture = CFile::GetPath($arSection["PICTURE"]);?>
        <div class="grid_element">
            <a href="<?=$arSection["SECTION_PAGE_URL"]?>">
                <span class="grid_element_img">
                    <img src="<?=$picture?>" alt="<?=$arSection["NAME"]?>" />
                    <span></span>
                </span>
                <span class="grid_element_title"><?=$arSection["NAME"]?></span>
            </a>
        </div><?
    }?>   
    
</div>
<div class="double_zigzag_wrapper">
    <div><?=GetMessage("KRYIM")?></div>
</div>
<div class="content_text"><?
    $iblock = CIBlock::GetById($arParams["IBLOCK_ID"]);
    $arIBlock = $iblock->GetNext();
?>
    <?=$arIBlock["DESCRIPTION"]?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>