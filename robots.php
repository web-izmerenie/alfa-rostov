<?header('Content-Type: text/plain; charset=utf-8')?>
<?if($_SERVER['HTTP_HOST'] !== 'alfa-rostov.ru' && $_SERVER['HTTP_HOST'] !== 'www.alfa-rostov.ru'):?>
User-Agent: *
Disallow: /
<?else:?>
User-Agent: *
Allow: /bitrix/templates/
Disallow: /bitrix/
Disallow: /node_modules/
Disallow: /ie_old/
Disallow: /ie_old/
Disallow: /staty
Disallow: *proxy*
Host: www.alfa-rostov.ru
<?endif?>
