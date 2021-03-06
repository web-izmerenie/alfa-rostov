<div class="material_selection">
<div class="center_wrapper"></div>
<div class="carousel">                
    <div class="slides"><?
        CModule::IncludeModule("iblock");
        $res = CIBlockElement::GetList(
            array(
                "NAME" => "asc"
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
            $pic = CFile::GetPath($fields["PREVIEW_PICTURE"]);
            $fields["NAME"] = trim($fields["NAME"]);
            $arName = preg_split("/\s+/", $fields["NAME"]);
            if(count($arName) > 2){
                $topName = $arName[0];
                unset($arName[0]);
                $bottomName = implode(" ", $arName);
                $bottomName = preg_replace("/(\d+)-(\d+)/", "<span>$1-$2</span>", $bottomName);
            }else{
                $topName = implode(" ", $arName);
                $bottomName = "";
            }
            ?>
            <div onclick="yaCounter10759630.reachGoal('SLIDE'); return true;" title="" data-item-id="<?=$fields["ID"]?>" data-item-title="<?=$topName?>" data-item-promo="<?=$bottomName?>" class="slideItem">
                <div class="hover"></div>
                <img src="<?=$pic?>" />
            </div><?
        }?>
        
        
    </div>
</div>
<div class="selected_item_wrapper">
    <div class="selected_item_title"></div>
    <div class="selected_item_promo"></div>
</div>
</div>
<div class="controls">
    <!--<div class="controls_item cars">
        <div class="rounded">
        
        </div>
        <div class="cars_counter">0</div>
        <div class="controls_title"><?=GetMessage("CARS_COUNT")?></div>
    </div>-->
    <div class="controls_item weight">
        <div class="controls_title"><?=GetMessage("WEIGHT")?></div>
        <div class="rounded">
            <div class="weight_wrapp">
                <input onclick="yaCounter10759630.reachGoal('WEIGHT'); return true;" class="cursor" type="text" value="0" name="weight" id="weight" />
                <span>т</span>
            </div>
<div class="alert"></div>
        </div>
        
    </div>
    <!--<div class="controls_item bailer_wrapper bailer_8_darkgray">
        <div class="bailer"></div>
    </div>-->
    <div class="form_wrapper">
    <div class="form_inner">
        <div onclick="yaCounter10759630.reachGoal('POINT'); return true;" class="destination_point">
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
                <li class="other_city" data-value="0"><input type="text" value="<?=GetMessage("ANOTHER")?>" /></li>
            </ul>
            <?/* <input type="hidden" name="destination_point" id="destination_point" value="<?=$arDestCur["VALUE"]?>" /> */?>
            <input type="hidden" name="destination_point" id="destination_point" value="0" />
            <div class="form_title"><?=GetMessage("FINAL_DESTINATION")?></div>
            <?/* <div class="current_point" data-value="<?=$arDestCur["VALUE"]?>"><span><?=$arDestCur["NAME"]?></span></div> */?>
            <div class="current_point" data-value="0"><span><?=GetMessage("ADD_CITY")?></span></div>
        </div>
        <div class="total_price">
            <div class="form_title">Стоимость</div>
            <div class="total_price_value">0 <span>руб.</span></div>
            <div class="price_value">0</div>
            <div class="not_price_for_me">
                <a href="javascript:void(0)">Не устравивает цена?</a>
                <p>Звони по телефону 221-80-70</p>
            </div>
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
<!--        <a href="javascript:void(0)" id="showForm" class="large_button">Оформить заказ</a>-->
        <div class="label_other_city"><?=GetMessage("LABEL_OTHER_CITY")?></div>
    </div>
</div>
</div>
<div class="order_by_phone">
    <h3>Оформите заказ по телефону</h3>
    <p>8 (863) 221-80-70</p>
    <div class="main_track_wrapper texture_8_darkgray">
        <div class="main_track">

        </div>
    </div>
</div>

     