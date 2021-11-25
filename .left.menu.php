<?
//if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$aMenuLinks = Array(
);
global $APPLICATION;?>
<?$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"bitrix:menu.sections",
	"",
	array(
		"IS_SEF" => "Y",
		"SEF_BASE_URL" => "/catalog/",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#CODE#",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"DEPTH_LEVEL" => "1",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	),
	false
);
?>
<?// double in .left.menu_ext
//$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt)


?>