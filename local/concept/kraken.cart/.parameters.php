<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arCurrentValues */

if(!CModule::IncludeModule("iblock"))
	return;

$Sites = array();
$rsSites = CSite::GetList($by="sort", $order="desc", Array());
while ($arSite = $rsSites->Fetch())
{
	$Sites[$arSite["LID"]] = $arSite["NAME"];
}

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		
		"CURRENT_SITE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("KRAKEN_PARAM_CUR_SITE"),
			"TYPE" => "LIST",
			"VALUES" => $Sites
		),
		
	),
);


CIBlockParameters::Add404Settings($arComponentParameters, $arCurrentValues);

?>