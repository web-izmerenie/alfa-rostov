<?
    IncludeTemplateLangFile(__FILE__);

    $html_classes = array();
    $revision = 6;

    if($USER->IsAdmin()){
        $revision = time();
    }
    if(defined("MAIN_PAGE"))
        $html_classes[] = "main_page";
    if(defined("NR_MATERIALS"))
        $html_classes[] = "nr_materials";
    if(defined("NR_MATERIALS_DETAIL"))
        $html_classes[] = "nr_materials_detail";
    if(defined("NR_MATERIALS_DETAIL_MOREICONS"))
        $html_classes[] = "nr_materials_detail_moreicons";
    if(defined("TWO_COLS"))
        $html_classes[] = "two_cols";
    if(defined("ARTICLES_LIST"))
        $html_classes[] = " articles_list";
    if(defined("NEWS_LIST"))
        $html_classes[] = "news_list";
    if(defined("PROPERTIES"))
        $html_classes[] = "properties";
    if(defined("ARTICLE_DETAIL_COLBLOCKS"))
        $html_classes[] = "article_detail_colblocks";
    if(defined("VACANCY"))
        $html_classes[] = "vacancy";
    if(defined("CONTACTS"))
        $html_classes[] = "contacts";
    if(defined("ERROR_404"))
        $html_classes[] = "error_404";
    if(defined("CHARITY"))
        $html_classes[] = "charity";

    $html_classes = implode(" ", $html_classes);


?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=$html_classes?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="320px" />
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <?if(defined('SEO_ARTICLES')) {?>
        <title><?=$APPLICATION->ShowTitle()?></title>
    <?}else{?>
        <title><?$APPLICATION->ShowProperty("headertitle")?></title>
    <?}?>
    <!--[if IE 8]>
        <script>document.getElementsByTagName('html')[0].className += ' ie8';</script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/bitrix/templates/main/styles/build/build.css?v=<?=$revision?>" />
    <?if(defined("CONTACTS")):?>
        <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCHuPjTMfHDcczFnfcHNOMPEsI7wqY5A8k&sensor=false"></script>
    <?endif;?>
    <?$APPLICATION->ShowCSS();?>
    <script src="/bitrix/templates/main/scripts/build/build.js?v=<?=$revision?>"></script>
    <?$APPLICATION->ShowHeadStrings();?>

    <script>
        //<![CDATA[
            require(['basics/get_val'], function (getVal) {

                getVal.set('lang', '<?=LANGUAGE_ID?>');
                getVal.set('revision', '<?=$revision?>');

                require(['main']);

            });
        //]]>
    </script>

</head>

<body><?$APPLICATION->ShowPanel();?>
<div class="overlay"></div>
    <div class="main_wrapper">
        <header><?
            if($APPLICATION->GetCurPage() == SITE_DIR){?>
                <span class="logo"></span><?
            }else{?>
                <a onclick="yaCounter10759630.reachGoal('LOGO'); return true;" href="<?=SITE_DIR?>" class="logo"></a><?
            }?>
            <nav class="top_menu">
              <?$APPLICATION->IncludeComponent(
              	"bitrix:catalog.section.list",
              	"top_menu",
              	Array(
              		"IBLOCK_TYPE" => "lists",
              		"IBLOCK_ID" => "1",
              		"SECTION_ID" => $_REQUEST["SECTION_ID"],
              		"SECTION_CODE" => "",
              		"COUNT_ELEMENTS" => "Y",
              		"TOP_DEPTH" => "2",
              		"SECTION_FIELDS" => array("", ""),
              		"SECTION_USER_FIELDS" => array("UF_ALTER_LINK", ""),
              		"VIEW_MODE" => "LIST",
              		"SHOW_PARENT_NAME" => "Y",
              		"SECTION_URL" => "",
              		"CACHE_TYPE" => "A",
              		"CACHE_TIME" => "36000000",
              		"CACHE_GROUPS" => "Y",
              		"ADD_SECTIONS_CHAIN" => "Y"
              	)
              );?>
            </nav>
            <a class="call-module-window" href="#call-me">
              <img src="<?=SITE_TEMPLATE_PATH;?>/images/callme.png"/>
              <p>Позвоните мне</p>
            </a>
        </header>
        <div class="wrapper"><?

            if(defined("SHOW_TITLE")){?>
            <div class="page_header"><?
                if(defined('SEO_ARTICLES')) {?>
                    <h1><?=$APPLICATION->ShowTitle(false);?></h1>
				<?} elseif(defined('SHOW_FAKE_TITLE')) {?>
					<div class="h1"><?=$APPLICATION->ShowTitle(false);?></div>
                <?} else {
                    if ($user_title) {?>
                        <h1><?= $user_title ?></h1><?
                    } else {

                        /* if($pagetitle){?>
                            <h1><?=$pagetitle?></h1><?
                        }else{
                            $filepath = stripos($_SERVER["PHP_SELF"], "urlrewrite") ? $_SERVER['REAL_FILE_PATH'] : $_SERVER["PHP_SELF"];

                            $arFilepath = explode("/", $filepath);
                            $lastIndex = count($arFilepath) - 1;
                            if(stripos($arFilepath[$lastIndex], "php")){
                                unset($arFilepath[$lastIndex]);
                            }
                            $filepath = implode("/", $arFilepath) . "/";

                            $isInclude = include($_SERVER["DOCUMENT_ROOT"].$filepath.".section.php");
                            if($isInclude){?>
                                <h1><?=$sSectionName?></h1><?
                            }else{?>
                                <h1><?=$APPLICATION->ShowTitle()?></h1><?
                            }
                        } */
                        ?>
                        <!--noindex-->
                        <h1><? $APPLICATION->ShowProperty("pagetitle") ?></h1><?
                    }
                }?>
                <?if(defined('CALC_TITLE')){?>
                    <div class="calculation">
                        <ul>
                            <li>Быстрый расчет стоимости - 5-10 минут.</li>
                            <li>Доставка заказа от 1 часа после вашего звонка.</li>
                            <li>Единовременная отгрузка от 10 до 50 тонн.</li>

                        </ul>
                    </div>
                <?}?>
                <!--/noindex-->
            </div><?
            }
            if(defined("TWO_COLS")){?>
                <div class="section_standart">
                    <nav class="left_menu"><?$APPLICATION->IncludeComponent("bitrix:menu", "left.menu", Array(
	"ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
	"MENU_CACHE_TYPE" => "A",	// Тип кеширования
	"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
	"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
		0 => "",
	),
	"MAX_LEVEL" => "1",	// Уровень вложенности меню
	"CHILD_MENU_TYPE" => "",	// Тип меню для остальных уровней
	"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	"DELAY" => "N",	// Откладывать выполнение шаблона меню
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
	),
	false
);?>
                    </nav>
                    <main><?
            }?>
