<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("main"))
	return;


$Sites = array();
$rsSites = CSite::GetList($by="sort", $order="desc", Array());
while ($arSite = $rsSites->Fetch())
{
	$Sites[$arSite["LID"]] = $arSite["NAME"];
}


$modeFields = array(
	"semi_show" => GetMessage("KRAKEN_COMP_MINICART_MODE_SEMI_SHOW"),
	"show" => GetMessage("KRAKEN_COMP_MINICART_MODE_SHOW")
);

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		
		"CURRENT_SITE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_COMP_MINICART_CUR_SITE"),
			"TYPE" => "LIST",
			"VALUES" => $Sites
		),
		"MODE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_COMP_MINICART_MODE"),
			"TYPE" => "LIST",
			"VALUES" => $modeFields,
			"DEFAULT" => "show",
		),
		"DESC_EMPTY" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_COMP_MINICART_DESC_EMPTY"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("KRAKEN_COMP_MINICART_DESC_EMPTY_DEF"),
		),
		"DESC_NOEMPTY" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_COMP_MINICART_DESC_NOEMPTY"),
			"TYPE" => "STRING",
			"DEFAULT" => GetMessage("KRAKEN_COMP_MINICART_DESC_NOEMPTY_DEF"),
		),
		"LINK" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_COMP_MINICART_LINK"),
			"TYPE" => "STRING",
			"DEFAULT" => "",
		),

		
	),
);


CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);

?>