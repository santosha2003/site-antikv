<?
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
/** @global CCacheManager $CACHE_MANAGER */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arParams['STORE'] = (isset($arParams['STORE']) ? (int)$arParams['STORE'] : 0);
if ($arParams['STORE'] <= 0)
{
	ShowError(GetMessage("STORE_NOT_EXIST"));
	return;
}

$arParams['MAP_TYPE'] = (isset($arParams['MAP_TYPE']) ? $arParams['MAP_TYPE'] : 'Yandex');
if ($arParams['MAP_TYPE'] != 'Yandex' && $arParams['MAP_TYPE'] != 'Google')
	$arParams['MAP_TYPE'] = 'Yandex';

$arParams['SET_TITLE'] = (isset($arParams['SET_TITLE']) && $arParams['SET_TITLE'] == 'Y' ? 'Y' : 'N');

if (!isset($arParams['CACHE_TIME']))
	$arParams['CACHE_TIME'] = 3600;

if ($this->StartResultCache())
{
	if (!\Bitrix\Main\Loader::includeModule("catalog"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("CATALOG_MODULE_NOT_INSTALL"));
		return;
	}
	$arResult['STORE'] = $arParams['STORE'];
	$arSelect = array(
		"ID",
		"TITLE",
		"ADDRESS",
		"DESCRIPTION",
		"GPS_N",
		"GPS_S",
		"IMAGE_ID",
		"PHONE",
		"SCHEDULE",
	);
	$dbProps = CCatalogStore::GetList(array('ID' => 'ASC'),array('ID' => $arResult['STORE'], 'ACTIVE' => 'Y'),false,false,$arSelect);
	$arResult = $dbProps->GetNext();
	if (!$arResult)
	{
		$this->AbortResultCache();
		ShowError(GetMessage("STORE_NOT_EXIST"));
		return;
	}
	if($arResult["GPS_N"] != '' && $arResult["GPS_S"] != '')
		$this->AbortResultCache();
	$arResult["MAP"] = $arParams["MAP_TYPE"];
	if(isset($arParams["PATH_TO_LISTSTORES"]))
		$arResult["LIST_URL"] = CComponentEngine::MakePathFromTemplate($arParams["PATH_TO_LISTSTORES"]);
	$this->IncludeComponentTemplate();
}

if ($arParams["SET_TITLE"] == "Y")
{
	$title = (isset($arResult["TITLE"]) && $arResult["TITLE"] != '' ? $arResult["TITLE"]." (".$arResult["ADDRESS"].")" : $arResult["ADDRESS"]);
	$APPLICATION->SetTitle($title);
}