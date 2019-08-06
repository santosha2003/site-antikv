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
<link rel="stylesheet" href="<?=$component->__template->GetFolder()?>/style.css">
<div class="content">
<form action="<?=$arResult["FORM_ACTION"]?>">
	<input class="inputfield" type="text" name="q" value=""/>
	<input class="submitbutton" name="s" type="submit" value="<?=GetMessage("BSF_T_SEARCH_BUTTON");?>" />
</form>
<div class="cleaner"></div>
</div>