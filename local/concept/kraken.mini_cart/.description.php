<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("KRAKEN_IB_MINI_CART"),
	"DESCRIPTION" => GetMessage("KRAKEN_IB_MINI_CART_DESC"),
	"ICON" => "/images/news_list.gif",
	"SORT" => 20,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "concept",
        "NAME" => GetMessage("KRAKEN_IB_MINI_CART_PARTNER"),
		"SORT" => 200,
		"CHILD" => array(
			"ID" => "pages",
			"NAME" => GetMessage("KRAKEN_IB_MINI_CART_NAME"),
			"SORT" => 10,
			"CHILD" => array(
				"ID" => "page_cmpx",
			),
		),
	),
);

?>