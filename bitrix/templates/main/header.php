<?
    IncludeTemplateLangFile(__FILE__);
    
    $html_classes = array();
    $revision = 1;
    
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
        
    $html_classes = implode(" ", $html_classes);
    
?><!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>" class="<?=$html_classes?>">
<head>
    <meta charset="utf-8" />
    <?$APPLICATION->ShowMeta("keywords")?>
    <?$APPLICATION->ShowMeta("description")?>
    <title><?$APPLICATION->ShowTitle()?></title>
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
                <a href="<?=SITE_DIR?>" class="logo"></a><?
            }?>            
            <nav class="top_menu"><?$APPLICATION->IncludeComponent("bitrix:menu", "top.menu", array(
	"ROOT_MENU_TYPE" => "top",
	"MENU_CACHE_TYPE" => "A",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
            </nav>
        </header>
        <div class="wrapper"><?//var_dump(CSite::GetCurDir());
            if(defined("SHOW_TITLE")){?>
            <div class="page_header"><?
                if($user_title){?>
            	<h1><?=$user_title?></h1><?
                }else{
                    ?>
                    <h1><?=$APPLICATION->ShowTitle()?></h1><?
                }?>
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
        