<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arComponentParameters = array(
	"PARAMETERS" => array(
		"STORE" => array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => GetMessage("STORE_ID"),
			"TYPE" => "STRING",
			"DEFAULT" => "1"
		),
		"MAP_TYPE" => array(
			"PARENT" => "ADDITIONAL_SETTINGS",
			"NAME" => GetMessage("MAP_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => array("Yandex","Google"),
			'DEFAULT' => "Yandex",
		),
		"CACHE_TIME" => array("DEFAULT"=>"3600"),
		"SET_TITLE" => array(),
	)
);