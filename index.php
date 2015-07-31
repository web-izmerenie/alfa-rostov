<?
define("MAIN_PAGE", "Y");
define("SHOW_TITLE", "Y");
define("SHOW_KRYIM_BLOCK", "Y");

$user_title = "Поставка <span>песка,</span> <span>щебня,</span> <span>отсева</span>";

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("headertitle", "Альфа-Ростов - продажа щебня, песка, глины, керамзита в Ростове-на-Дону и области.");
$APPLICATION->SetTitle("Поставка <span>песка,</span> <span>щебня,</span> <span>отсева</span>");
?>
<?$APPLICATION->IncludeFile(
    "inc/index.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?>       
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>