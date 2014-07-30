<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
//p($_POST);

$element = CIBlockElement::GetById($_POST["id"]);
$arElement = $element->GetNext();

$arAloneElement = array(1,2,3,5,6,7); // Array of section ids where just one element inside

if(in_array($arElement["IBLOCK_SECTION_ID"], $arAloneElement)){
    $result["BAILER_CLASS"] = "bailer_" . $arElement["IBLOCK_SECTION_ID"];
    $result["TEXTURE_CLASS"] = "texture_" . $arElement["IBLOCK_SECTION_ID"];
}else{
    switch($arElement["IBLOCK_SECTION_ID"]){
        case "4":
            $result["BAILER_CLASS"] = "bailer_4_" . $_POST["id"];
            $result["TEXTURE_CLASS"] = "texture_4_" . $_POST["id"];
        break;
        
        case "8":
            $darkgray = array(40,53,54,189,190,191,954,955,956);
            $grayblue = array(55,56,57);
            $red = array(58,59,60);
            if(in_array($_POST["id"], $darkgray)){
                $result["BAILER_CLASS"] = "bailer_8_darkgray";
                $result["TEXTURE_CLASS"] = "texture_8_darkgray";
            }
            if(in_array($_POST["id"], $grayblue)){
                $result["BAILER_CLASS"] = "bailer_8_grayblue";
                $result["TEXTURE_CLASS"] = "texture_8_grayblue";
            }
            if(in_array($_POST["id"], $red)){
                $result["BAILER_CLASS"] = "bailer_8_red";
                $result["TEXTURE_CLASS"] = "texture_8_red";
            }
            
        break;
    }
}

$_POST["weight"] = (float)$_POST["weight"];
if($_POST["weight"] < 10){
    $_POST["weight"] = 10;
    $result["WEIGHT"] = "1";
}
$cube = array(37, 39, 838, 839, 840, 841);
$unit = in_array($_POST["id"], $cube) ? "м<sup>3</sup>" : "т";
$result["UNIT"] = $unit;
$res = CIBlockElement::GetList(
    array(),
    array(
        "IBLOCK_ID" => 7,
        "PROPERTY_MATERIAL" => $_POST["id"],
        "PROPERTY_DESTINATION" => $_POST["point"],
        array(
            "LOGIC" => "AND",
            array(
                ">=PROPERTY_FROM" => $_POST["weight"]
            ),
            array(
                "<=PROPERTY_TO" => $_POST["weight"]
            )
        )
    ), 
    false,
    false,
    array()
);
if($res->SelectedRowsCount()){
    $arRes = $res->GetNextElement();
    $p = $arRes->GetProperties();
    $f = $arRes->GetFields();
    $result["TOTAL_PRICE"] = number_format($p["PRICE"]["VALUE"] * $_POST["weight"], 0, '', ' ');
    $result["PRICE"] = $p["PRICE"]["VALUE"];
    
    
    echo json_encode($result);
} else {
    echo "Ошибка";
}
?>