<?
function p($arg){
    echo "<pre>";
    print_r($arg);
    echo "</pre>";
}

AddEventHandler("iblock", "OnBeforeIBlockElementAdd", "OnBeforeIBlockElementAddHandler");

function OnBeforeIBlockElementAddHandler(&$arFields){
    if($arFields["IBLOCK_ID"] == "3"){
        
        $feature = CIBlockElement::GetList(
            array(),
            array(
                "IBLOCK_ID" => 2,
                "ID" => $arFields["PROPERTY_VALUES"][6]["n0"]
            ),
            false,
            false,
            array()
        ); // Get feature
        $arFeature = $feature->GetNext();
        
        $elem = CIBlockElement::GetList(
            array(),
            array(
                "IBLOCK_ID" => 1,
                "ID" => $arFields["PROPERTY_VALUES"][7]["n0"]
            ),
            false,
            false,
            array()
        ); // Get element
        $arElem = $elem->GetNext();
        
        $arFields["NAME"] = $arFeature["NAME"]." для ".$arElem["NAME"];
        
    }
}

/*  */
?>