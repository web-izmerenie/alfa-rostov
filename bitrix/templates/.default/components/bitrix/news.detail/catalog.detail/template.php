<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<main>
<div class="section_standart detail_text_photo_block">
    <div class="grid_element"><?
        $href = $_GET["ITEM_ONE"] ? "/nerudnye-materialy.html" : $arResult["SECTION"]["PATH"][0]["SECTION_PAGE_URL"]?>
        <a title="<?=GetMessage("TITLE_BACK")?>" href="<?=$href?>" class="backlink"></a>
        <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-action="getLarge" class="resizer"></a>
        <span class="grid_element_img">
            <a href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" data-action="getLarge">
                <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" />
                <span></span>
            </a>
        </span>
    </div>
    <div class="grid_text">
        <?=$arResult["DETAIL_TEXT"]?>
    </div>
</div><?
    $feature = CIBlockElement::GetList(
        array(),
        array(
            "IBLOCK_TYPE" => "service",
            "IBLOCK_CODE" => "featurecontent",
            "PROPERTY_ELEMENT" => $arResult["ID"]
        ),
        false,
        false,
        array()
    );
    if($feature->SelectedRowsCount()){?>
        <section class="section_standart feature_list">
            <h2><?=GetMessage("FEATURES")?></h2>
            <div class="feature_inner"><?
            while($arFeature = $feature->GetNextElement()){
                $fields = $arFeature->GetFields();
                $props = $arFeature->GetProperties();
                
                $f_props = CIBlockElement::GetById($props["FEATURE"]["VALUE"]);
                $arF_props = $f_props->GetNextElement();
                $ffields = $arF_props->GetFields();
                $fprops = $arF_props->GetProperties();?>
                <div class="feature_item"><?
                    if($ffields["PREVIEW_TEXT"] || $fields["DETAIL_TEXT"]){?>
                    <div class="char_desc"><?
                        if($ffields["PREVIEW_TEXT"]){?>
                        <div class="char_desc_norm"><?=GetMessage("NORM:")?> <span><?=$ffields["PREVIEW_TEXT"]?></span></div><?
                        }
                        if($fields["DETAIL_TEXT"]){?>
                        <div class="char_desc_title"><?=GetMessage("CONCLUSION:")?></div>
                        <div class="char_desc_description"><?=$fields["DETAIL_TEXT"]?></div><?
                        }?>
                    </div><?
                    }?>                     
                    <div class="feature_item_icon"><?
                        if($ffields["PREVIEW_TEXT"] || $fields["DETAIL_TEXT"]){?>
                        <div class="has_char" title="">
                            <div class="has_char_inner"></div>
                        </div><?
                        }
                        $pic = CFile::GetPath($ffields["PREVIEW_PICTURE"])?>
                        <img src="<?=$pic?>" /></div>
                    <div class="feature_item_name"><?=$ffields["NAME"]?></div>
                    <div class="feature_item_value"><?=$props["VALUE"]["VALUE"]?></div>
                </div><?
            }?>
                 
            </div>
        </section><?
    }
?>
</main>
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
    <span data-link="<?=SITE_DIR?>" class="large_button span_link"><?=GetMessage("CALC_BUTTON")?></span>
</div>
<div class="double_zigzag_wrapper">
    <div><?=GetMessage("KRYIM")?></div>
</div><?
    $APPLICATION->SetPageProperty("keywords", $arResult["DISPLAY_PROPERTIES"]["KEYWORDS"]["VALUE"]);
    $APPLICATION->SetPageProperty("description", $arResult["DISPLAY_PROPERTIES"]["DESCRIPTION"]["VALUE"]);
?>