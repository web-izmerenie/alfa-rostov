<div class="center_wrapper"></div>
<div class="carousel">                
    <div class="slides"><?
        CModule::IncludeModule("iblock");
        $res = CIBlockElement::GetList(
            array(
                "SORT" => "asc"
            ),
            array(
				"ACTIVE" => "Y",
                "IBLOCK_TYPE" => "lists",
                "IBLOCK_CODE" => "nr_materials"
            ),
            false,
            false,
            array()
        );
        while($arRes = $res->GetNextElement()){
            $fields = $arRes->GetFields();
            $props = $arRes->GetProperties();
            $pic = CFile::GetPath($fields["PREVIEW_PICTURE"]);?>
            <div data-item-id="<?=$fields["ID"]?>" data-item-title="<?=$fields["NAME"]?>" data-item-promo="<?=$props["PROMO"]["VALUE"]?>" class="slideItem"><img src="<?=$pic?>" /></div><?
        }?>
        
        
    </div>
</div>
<div class="selected_item_wrapper">
    <div class="selected_item_title"></div>
    <div class="selected_item_promo"></div>
</div>
<div class="controls">
    <div class="controls_item cars">
        <div class="rounded">
        
        </div>
        <div class="cars_counter">1</div>
        <div class="controls_title"><?=GetMessage("CARS_COUNT")?></div>
    </div>
    <div class="controls_item weight">
        <div class="rounded">
            <div class="weight_wrapp">
                <input class="cursor" type="text" value="10" name="weight" id="weight" />
                <span>т</span>
            </div>
            <div class="alert"></div>
        </div>
        <div class="controls_title"><?=GetMessage("WEIGHT")?></div>
    </div>
    <div class="controls_item bailer_wrapper bailer_8_darkgray">
        <div class="bailer"></div>
    </div>
</div>
<div class="main_track_wrapper texture_8_darkgray">
    <div class="main_track">

    </div>
</div>
<div class="form_wrapper">
    <div class="form_inner">
        <div class="destination_point">
            <ul class="point_list"><?
                $dest = CIBlockElement::GetList(
                    array(
                        "SORT" => "asc"
                    ),
                    array(
                        "ACTIVE" => "Y",
                        "IBLOCK_TYPE" => "service",
                        "IBLOCK_CODE" => "destination"
                    ),
                    false,
                    false,
                    array()
                );
                $destCounter = 0;
                $arDestCur = array();
                while($arDest = $dest->GetNext()){
                    $destCounter++;
                    if($destCounter == 1){
                        $arDestCur["VALUE"] = $arDest["ID"];
                        $arDestCur["NAME"] = $arDest["NAME"];
                    }?>
                    <li data-value="<?=$arDest["ID"]?>"><?=$arDest["NAME"]?></li><?
                }
            ?>
                <?/* <li data-value="0"><input type="text" value="<?=GetMessage("ANOTHER")?>" /></li> */?>
            </ul>
            <?/* <input type="hidden" name="destination_point" id="destination_point" value="<?=$arDestCur["VALUE"]?>" /> */?>
            <input type="hidden" name="destination_point" id="destination_point" value="0" />
            <div class="form_title"><?=GetMessage("FINAL_DESTINATION")?></div>
            <?/* <div class="current_point" data-value="<?=$arDestCur["VALUE"]?>"><span><?=$arDestCur["NAME"]?></span></div> */?>
            <div class="current_point" data-value="0"><span><?=GetMessage("ADD_CITY")?></span></div>
        </div>
        <div class="total_price">
            <div class="form_title">Общая стоимость</div>
            <div class="total_price_value">0 <span>руб.</span></div>
            <div class="price_value">0</div>
        </div>
    </div>
    <div class="form_inner form_inner_wrapp">
        <div class="main_form">
            <span>Имя</span>
            <input type="text" value="" name="name" id="name" />
            <span>Телефон или E-mail</span>
            <input type="text" value="" name="contact" id="contact" />
            <span>Отправить</span>
            <input class="large_button" id="sendForm" type="submit" value="Отправить" />
        </div>
        <a href="javascript:void(0)" id="showForm" class="large_button">Оформить заказ</a>
    </div>
</div>
     