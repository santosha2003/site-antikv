<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if (!function_exists("GetTreeRecursive")) //Include from main.map component
{
$aMenuLinksExt=$APPLICATION->IncludeComponent("bitrix:store.menu.sections", "", array(
	"IBLOCK_TYPE_ID" => "catalog",
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/ng/catalog/",
        "SECTION_PAGE_URL" => "#SECTION_CODE#/",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "11",
        "DEPTH_LEVEL" => "1",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600"
	),
	false,
	Array('HIDE_ICONS' => 'Y')
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
}
?>