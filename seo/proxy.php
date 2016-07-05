<?PHP

$url=trim('http://www.alfa-rostov.ru'.$_GET['url']);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$html=curl_exec($ch);
curl_close($ch);


$html=preg_replace('/<h1>[^<>]*<\/h1>/i','',$html);
$html=str_replace('<h3>','<h1>',$html);
$html=str_replace('</h3>','</h1>',$html);
echo $html;
