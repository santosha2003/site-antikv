<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Bitrix Site Manager Demo version");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Goods from XML-catalog");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"",
	Array(
		"IBLOCK_TYPE" => "books", 
		"IBLOCK_ID" => "#SERVICE_IBLOCK_ID#", 
		"SECTION_ID" =>"", 
		"SECTION_URL" => "/e-store/books/index.php?SECTION_ID=#SECTION_ID#", 
		"COUNT_ELEMENTS" => "Y", 
		"DISPLAY_PANEL" => "N", 
		"CACHE_TYPE" => "A", 
		"CACHE_TIME" => "3600" 
	)
);?> 
<hr />

<?$APPLICATION->IncludeComponent("bitrix:catalog.top", ".default", Array(
	"IBLOCK_TYPE"	=>	"books",
	"IBLOCK_ID" => "#SERVICE_IBLOCK_ID#",
	"ELEMENT_SORT_FIELD"	=>	"sort",
	"ELEMENT_SORT_ORDER"	=>	"asc",
	"ELEMENT_COUNT"	=>	"3",
	"LINE_ELEMENT_COUNT"	=>	"1",
	"PROPERTY_CODE"	=>	array(),
	"SECTION_URL"	=>	"/e-store/books/index.php?SECTION_ID=#SECTION_ID#",
	"DETAIL_URL"	=>	"/e-store/books/index.php?SECTION_ID=#SECTION_ID#&ELEMENT_ID=#ELEMENT_ID#",
	"BASKET_URL"	=>	"/personal/cart/",
	"ACTION_VARIABLE"	=>	"action",
	"PRODUCT_ID_VARIABLE"	=>	"id",
	"SECTION_ID_VARIABLE"	=>	"SECTION_ID",
	"CACHE_TYPE"	=>	"A",
	"CACHE_TIME"	=>	"3600",
	"DISPLAY_COMPARE"	=>	"N",
	"PRICE_CODE"	=>	array("RETAIL"),
	"USE_PRICE_COUNT"	=>	"N",
	"SHOW_PRICE_COUNT"	=>	"1"
	)
);?>
<h2>Video News</h2>

<?$APPLICATION->IncludeComponent(
	"bitrix:player",
	"",
	Array(
		"PLAYER_TYPE" => "auto",
		"USE_PLAYLIST" => "N",
		"PATH" => "/upload/media_player.flv",
		"WIDTH" => "400",
		"HEIGHT" => "324",
		"FULLSCREEN" => "Y",
		"SKIN_PATH" => "/bitrix/components/bitrix/player/mediaplayer/skins",
		"SKIN" => "bitrix.swf",
		"CONTROLBAR" => "bottom",
		"WMODE" => "transparent",
		"HIDE_MENU" => "N",
		"SHOW_CONTROLS" => "Y",
		"SHOW_STOP" => "N",
		"SHOW_DIGITS" => "Y",
		"CONTROLS_BGCOLOR" => "FFFFFF",
		"CONTROLS_COLOR" => "000000",
		"CONTROLS_OVER_COLOR" => "000000",
		"SCREEN_COLOR" => "000000",
		"WMODE_WMV" => "window",
		"AUTOSTART" => "N",
		"REPEAT" => "N",
		"VOLUME" => "90",
		"DISPLAY_CLICK" => "play",
		"MUTE" => "N",
		"HIGH_QUALITY" => "Y",
		"ADVANCED_MODE_SETTINGS" => "N",
		"BUFFER_LENGTH" => "10",
		"DOWNLOAD_LINK_TARGET" => "_self"
	),
false
);?>

<!-- #NEW_PHOTO# -->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
