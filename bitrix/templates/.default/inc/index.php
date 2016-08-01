<section class="calculator">
  <div class="container">
    <div class="title">Рассчитать стоимость</div>
    <div class="material_selection">
      <div class="close"></div>
      <?CModule::IncludeModule("iblock");
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
                      $bottomName = preg_replace("/(\d+)-(\d+)/", "$1-$2", $bottomName);
                  }else{
                      $topName = implode(" ", $arName);
                      $bottomName = "";
                  }
                  ?>
                  <div onclick="yaCounter10759630.reachGoal('SLIDE'); return true;" data-item-id="<?=$fields["ID"]?>" class="slideItem">
                      <img src="<?=$pic?>" />
                      <div class="text">
                        <p><span><?=$topName;?></span></p>
                        <p><span><?=$bottomName;?></span></p>
                      </div>
                  </div><?
              }?>
    </div>
    <div class="controls">
        <div class="controls_item material">
            <div class="controls_title">Материал</div>
            <div class="rounded">
                <div class="material_wrapp">
                  <div onclick="yaCounter10759630.reachGoal('SLIDE'); return true;" data-item-id="956" class="slideItem">
                      <img src="/upload/iblock/430/430fd5e13a1dd11e1a151af4bfc0f755.jpg">
                      <div class="text">
                        <p><span>Выберите</span></p>
                        <p><span>нерудный материал</span></p>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="controls_item weight">
            <div class="controls_title"><?=GetMessage("WEIGHT")?></div>
            <div class="rounded">
                <div class="weight_wrapp">
                    <input onclick="yaCounter10759630.reachGoal('WEIGHT'); return true;" class="cursor" type="text" value="0" maxlength="3" name="weight" id="weight" />
                    <span>т</span>
                </div>
                <div class="alert"></div>
            </div>
        </div>
        <div class="form_wrapper controls_item">
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
                <div class="form_title">Город</div>
                <?/* <div class="current_point" data-value="<?=$arDestCur["VALUE"]?>"><span><?=$arDestCur["NAME"]?></span></div> */?>
                <div class="current_point" data-value="0"><span><?=GetMessage("ADD_CITY")?></span></div>
            </div>
        </div>
    </div>
    </div>
    <div class="total_price">
        <div class="price">
          <span class="label">Итого:</span>
          <span class="price_value"> 0</span>
          <span class="total_price_value">(0 <span>руб.</span>)</span>
        </div>
        <div class="not_price_for_me">Не устравивает цена? Звоните!</div>
        <div class='other_city_30'>Звоните прямо сейчас!
          МЫ рассчитаем стоимость в течение 1 мин. 8 (863) 221-80-70
        </div>
    </div>
    <div class="order_form">
      <h3>Оформите заказ по телефону: <span>8 (863) 221-80-70</span></h3>
      <p>или</p>
      <a class="call_form btn" href="#form_application">заказать онлайн</a>
    </div>
  </div>
  <div class="order_by_phone">
      <div class="main_track_wrapper texture_8_darkgray">
          <div class="main_track">

          </div>
      </div>
  </div>
</section>
