<?
define("SHOW_TITLE", "Y");
define("TWO_COLS", "Y");
define("CHARITY", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("pagetitle", "Благотворительность");
$APPLICATION->SetPageProperty("headertitle", "Благотворительность");
$APPLICATION->SetTitle("Благотворительность");
?><div class="preview-text">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "page",
		"AREA_FILE_SUFFIX" => "text",
		"EDIT_TEMPLATE" => ""
	)
);?>
</div>
<?$APPLICATION->IncludeFile("/o-kompanii/blagotvoritelnost/ajax.php");?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
