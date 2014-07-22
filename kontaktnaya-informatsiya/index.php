<?
define("CONTACTS", "Y");
define("SHOW_TITLE", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="section_standart section_standart_wide">
    <main>
        <div class="box">
            <p>344116<br>г. Ростов-на-Дону<br>ул. 2-я Володарского, 76/23 А<br>офис 112</p>
        </div>
        <div class="box">
            <h4>Call-центр</h4>
            <p>(863) 221-80-70</p>
            <h4>Факс</h4>
            <p>(863) 236-20-50</p>
        </div>
        <div class="box">
            <h4>Отдел продаж</h4>
            <p>(863) 221-999-2</p>
            <h4>Бухгалтерия</h4>
            <p>(863) 231-58-51, 256-555-2</p>
        </div>
        <div class="box">
            <h4>Почта</h4>
            <p><a href="mailto:info@alfa-rostov.ru">info@alfa-rostov.ru</a></p>
        </div>
        <?/* <div class="map" id="map">
            
        </div> */?>
        <div class="google-map map" id="google-map" ></div>
    </main>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>