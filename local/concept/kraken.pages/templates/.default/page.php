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
$this->setFrameMode(true);
?>

<?
$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE"=>"Y", 'CODE'=>$arResult["VARIABLES"]["SECTION_CODE"]);
$db_list = CIBlockSection::GetList(Array("SORT"=>"ASC"), $arFilter, false, array("UF_KRAKEN_LINK_OBJ"));

$ar_result = $db_list->GetNext();
?>

<?
if($ar_result["UF_KRAKEN_LINK_OBJ"])
     LocalRedirect(SITE_DIR);
?>

<?if($ar_result["ID"] > 0):?>

    <?$GLOBALS["KRAKEN_CURRENT_SECTION_ID"] = $APPLICATION->IncludeComponent(
    	"concept:kraken.one.page", 
    	"", 
    	array(
    		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
    		"CACHE_TIME" => $arParams["CACHE_TIME"],
    		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
    		"CHECK_DATES" => $arParams["CHECK_DATES"],
    		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
    		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
    		"PARENT_SECTION" => $ar_result["ID"],
    		"SET_TITLE" => $arParams["SET_TITLE"],
    		"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
    		"MESSAGE_404" => $arParams["MESSAGE_404"],
    		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
    		"SHOW_404" => $arParams["SHOW_404"],
    		"FILE_404" => $arParams["FILE_404"],
    		"COMPONENT_TEMPLATE" => ""
    	),
    	$component
    );?>
    
    
<!-- dlya nastroek saita -->

    <?$GLOBALS["KRAKEN_IBLOCK_ID"] = $arParams["IBLOCK_ID"];?>
    <?$GLOBALS["KRAKEN_IBLOCK_TYPE"] = $arParams["IBLOCK_TYPE"];?>

<?endif;?>