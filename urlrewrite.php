<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/nerudnye-materialy/([a-z-_0-9]+)/([a-z-_0-9]+)/(.*)#",
		"RULE" => "CODE=\$1&ELEMENT_CODE=\$2",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/detail.php",
	),
	array(
		"CONDITION" => "#^/kontaktnaya-informatsiya.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/kontaktnaya-informatsiya/index.php",
	),
	array(
		"CONDITION" => "#^/nerudnye-materialy.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/sectionlist.php",
	),
	array(
		"CONDITION" => "#^/scheben/([a-z-_0-9]+)/(.*)#",
		"RULE" => "CODE=scheben&ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/detail.php",
	),
	array(
		"CONDITION" => "#^/([a-z-_0-9]+).html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/itemlist.php",
	),
	array(
		"CONDITION" => "#^/o-kompanii.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/o-kompanii/index.php",
	),
	array(
		"CONDITION" => "#^/o-kompanii/novosti/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/o-kompanii/novosti/index.php",
	),
	array(
		"CONDITION" => "#^/o-kompanii/stati/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/o-kompanii/stati/index.php",
	),
	array(
		"CONDITION" => "#^/robots.txt(\\?|\$)#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/robots.php",
	),
	array(
		"CONDITION" => "#^/novosti.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/o-kompanii/novosti/index.php",
	),
	array(
		"CONDITION" => "#^/stati.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/o-kompanii/stati/index.php",
	),
	array(
		"CONDITION" => "#^/scheben/(.*)#",
		"RULE" => "CODE=scheben",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/itemlist.php",
	),
	array(
		"CONDITION" => "#^/statyi/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/statyi/index.php",
	),
	array(
		"CONDITION" => "#^/stati.html(.*)#",
		"RULE" => "CODE=\$1",
		"ID" => "",
		"PATH" => "/o-kompanii/stati/index.php",
	),
	array(
		"CONDITION" => "#^/scheben/(.*)#",
		"RULE" => "CODE=scheben",
		"ID" => "",
		"PATH" => "/nerudnye-materialy/itemlist.php",
	),
	array(
		"CONDITION" => "#^/statyi/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/statyi/index.php",
	),
);

?>
