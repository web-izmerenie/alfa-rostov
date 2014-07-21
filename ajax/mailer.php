<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
if(stripos($_POST["name"], "мя") || stripos($_POST["contact"], "елефон")){
    $result["status"] = "error";
    $result["fields"][]["field"] = stripos($_POST["name"], "мя") ? "name" : "";
    $result["fields"][]["field"] = stripos($_POST["contact"], "елефон") ? "contact" : "";
    
}else{  
    CModule::IncludeModule("iblock");
    $res = CIBlockElement::GetById($_POST["currId"]);
    $arRes = $res->GetNext();
    
    $result["NAME"] = $_POST["name"];
    $arFields["NAME"] = $_POST["name"];
    $arFields["CONTACT"] = $_POST["contact"];
    $arFields["SUMM"] = $_POST["total"];
    $arFields["GOOD"] = $arRes["NAME"];
    
    $send = CEvent::SendImmediate(
        "SEND_REQUEST", 
        "s1", 
        $arFields, 
        "N"
    ); 
    
    if($send){
        $result["status"] = "success";
    }else{
        $result["status"] = "error";
    }    
}

echo json_encode($result);
?>