<?
define("CONTACTS", "Y");
define("SHOW_TITLE", "Y");
define("SEO_ARTICLES", "Y");
<<<<<<< HEAD
define("NR_MATERIALS_DETAIL", "Y");
define("NR_MATERIALS_DETAIL_MOREICONS", "Y");
=======
>>>>>>> b9f6293e49cde7e66cc0661fbf17a6146e510aed
$user_title = "Статьи";

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статьи");
?><?$APPLICATION->IncludeComponent(
	"bitrix:news",
<<<<<<< HEAD
	"articles.product",
=======
	"articles",
>>>>>>> b9f6293e49cde7e66cc0661fbf17a6146e510aed
	Array(
		"IBLOCK_TYPE" => "service",
		"IBLOCK_ID" => "9",
		"NEWS_COUNT" => "20",
		"USE_SEARCH" => "N",
		"USE_RSS" => "N",
		"USE_RATING" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"CHECK_DATES" => "Y",
		"SEF_MODE" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_ELEMENT_CHAIN" => "Y",
		"USE_PERMISSIONS" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"USE_SHARE" => "N",
		"PREVIEW_TRUNCATE_LEN" => "",
		"LIST_ACTIVE_DATE_FORMAT" => "",
		"LIST_FIELD_CODE" => array("",""),
		"LIST_PROPERTY_CODE" => array("",""),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"DISPLAY_NAME" => "Y",
		"META_KEYWORDS" => "-",
		"META_DESCRIPTION" => "-",
		"BROWSER_TITLE" => "-",
		"DETAIL_ACTIVE_DATE_FORMAT" => "",
<<<<<<< HEAD
		"DETAIL_FIELD_CODE" => array("PREVIEW_PICTURE","DETAIL_PICTURE","PREVIEW_TEXT"),
		"DETAIL_PROPERTY_CODE" => array("MATERIAL"),
=======
		"DETAIL_FIELD_CODE" => array("",""),
		"DETAIL_PROPERTY_CODE" => array("",""),
>>>>>>> b9f6293e49cde7e66cc0661fbf17a6146e510aed
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"PAGER_TEMPLATE" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"SEF_FOLDER" => "/statyi/",
		"SEF_URL_TEMPLATES" => Array("news"=>"","section"=>"","detail"=>"#ELEMENT_CODE#/"),
		"VARIABLE_ALIASES" => Array(
			"news" => Array(),
			"section" => Array(),
			"detail" => Array(),
		)
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>