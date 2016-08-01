<?
define("MAIN_PAGE", "Y");
define("SHOW_TITLE", "Y");

$user_title = "Поставка <span>песка,</span> <span>щебня,</span> <span>отсева</span>";

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("headertitle", "Альфа-Ростов - продажа щебня, песка, глины, керамзита в Ростове-на-Дону и области.");
$APPLICATION->SetTitle("Поставка <span>песка,</span> <span>щебня,</span> <span>отсева</span>");
?>
<p class="header-text">За 8 лет отгружено 10 000 000 т нерудных материалов. С нами работают 100500 компаний по югу России</p>
<section class="adventure section_standart section_standart_wide">
  <ul>
    <li>
      <img src="<?=SITE_TEMPLATE_PATH;?>/images/advent1.png"/>
      <div class="text">Быстрый расчет стоимости </br>
        до 10 мин. в любое время суток</div>
    </li>
    <li>
      <img src="<?=SITE_TEMPLATE_PATH;?>/images/advent2.png"/>
      <div class="text">Доставка от 1 часа </br>
        после вашего звонка</div>
    </li>
    <li>
      <img src="<?=SITE_TEMPLATE_PATH;?>/images/advent3.png"/>
      <div class="text">От 10 до 50 тонн </br>
        единоразовой отгрузки</div>
    </li>
  </ul>
</section>
<?$APPLICATION->IncludeFile(
    "inc/index.php",
    array(),
    array(
        "SHOW_BORDER" => false
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
