<?
define("ERROR_404", "Y");

CHTTP::SetStatus("404 Not Found");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
?>
<div class="section_standart section_standart_wide">
    <main style="text-align:center">
        <img src="/bitrix/templates/main/images/404.png" alt="Страница не найдена" />
        <h1>Ошибка 404</h1>
        <p>Введен неверный адрес, или такой страницы больше нет. <br /> Вернитесь на <a href="/">главную</a></p>
    </main>
</div> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>