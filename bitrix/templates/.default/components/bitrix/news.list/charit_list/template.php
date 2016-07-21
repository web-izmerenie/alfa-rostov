<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?foreach($arResult['ITEMS'] as $arItem){
	$img1 = CFile::ResizeImageGet(
		$arItem['PREVIEW_PICTURE'],
		array('width'=>293, 'height'=>209),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true);
	$img2 = CFile::ResizeImageGet(
		$arItem['DETAIL_PICTURE'],
		array('width'=>293, 'height'=>209),
		BX_RESIZE_IMAGE_PROPORTIONAL,
		true);?>
	<article class="charity-item">
		<a href="#" class="title"><?=$arItem['NAME'];?></a>
		<div class="text"><?=$arItem['PREVIEW_TEXT'];?></div>
		<div class="row">
			<?if($img1['src']){?>
				<img src="<?=$img1['src']?>"/>
			<?}?>
			<?if($img2['src']){?>
				<img src="<?=$img2['src']?>"/>
			<?}?>
		</div>
	</article>
<?}?>
<a href="#" class="btn-add">Показать еше</a>
