<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

/** @global CIntranetToolbar $INTRANET_TOOLBAR */


use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;


  
if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule('concept.kraken'))
	return false;

    CKraken::krakenOptions($arParams["CURRENT_SITE"]);
    
    $arResult = array();

    $arFilter = Array('IBLOCK_CODE' => $arParams["IBLOCK_CODE"], "ID" => $arParams["CURRENT_FORM"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false);

    while($ob = $res->GetNextElement())
    {
        $arResult = $ob->GetFields();  
        $arResult["PROPERTIES"] = $ob->GetProperties();
    }

    if(strlen($arParams["ELEMENT_ID"])>0)
    {

        if($arParams["ELEMENT_TYPE"] == "CTL")
            $arSelect = array("NAME", "ID");

        if($arParams["ELEMENT_TYPE"]=="TRF")
            $arSelect = array("PROPERTY_TARIFF_NAME", "ID");

        $arFilter1 = Array("ID" => $arParams["ELEMENT_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
        $res1 = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter1, false, false, $arSelect);



        while($ob1 = $res1->GetNextElement())
        {
            $arItem = $ob1->GetFields();  
            $arItem["PROPERTIES"] = $ob1->GetProperties();
    
            if($arParams["ELEMENT_TYPE"]=="CTL")
                $arItem["NAME"] = $arItem["~NAME"];
            
            if($arParams["ELEMENT_TYPE"]=="TRF")
                $arItem["NAME"] = $arItem["~PROPERTY_TARIFF_NAME_VALUE"];

            
            $arResult["ELEMENT"] = $arItem;
        }
        $res1 = "";
    }

	

$this->includeComponentTemplate();
?>
