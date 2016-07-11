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
$this->setFrameMode(true);?>
<ul>
	<?foreach ($arResult['SECTIONS'] as $arSection):
		if($arSection['UF_ALTER_LINK'])
			$arSection['SECTION_PAGE_URL'] = $arSection['UF_ALTER_LINK'];?>
		<li>
			<a href="<?=$arSection['SECTION_PAGE_URL'];?>"
				<?if($_REQUEST['CODE'] == $arSection['CODE']):?>
					class="active"
				<?endif;?>>
				<?=$arSection['NAME'];?>
			</a>
		</li>
	<?endforeach; ?>
	<li><a href="/kontaktnaya-informatsiya/"
		<?if($APPLICATION->GetCurPage() == "/kontaktnaya-informatsiya/"):?>
		class="active"
	<?endif;?>>Контакты</a></li>
</ul>
