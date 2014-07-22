<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");
//p($_POST);
$_POST["weight"] = (float)$_POST["weight"];
if($_POST["weight"] < 10){
    $_POST["weight"] = 10;
    $result["WEIGHT"] = "1";
}
$cube = array(37, 39);
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