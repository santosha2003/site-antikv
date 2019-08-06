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
global $INTRANET_TOOLBAR;
global $APPLICATION;
global $USER;
global $KRAKEN_TEMPLATE_ARRAY;

global $CACHE_MANAGER;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock,
	Bitrix\Main\Page\Asset as Asset;

CModule::IncludeModule("iblock");


$cur_page = $_SERVER["REQUEST_URI"];
$cur_page_no_index = $APPLICATION->GetCurPage(false);

$arLinks = Array();

$arLinks["catalog"] = "#SITE_DIR#catalog/";
$arLinks["blog"] = "#SITE_DIR#blog/";
$arLinks["news"] = "#SITE_DIR#news/";
$arLinks["action"] = "#SITE_DIR#action/";


$arCodes = Array();

$arCodes["catalog"] = "concept_kraken_site_catalog_";
$arCodes["blog"] = "concept_kraken_site_history_";
$arCodes["news"] = "concept_kraken_site_news_";
$arCodes["action"] = "concept_kraken_site_action_";

//

if($this->startResultCache(false, array($APPLICATION->GetCurUri(), $USER->GetGroups()), ($arParams["MENU_CACHE_USE_USERS"] === "Y"? $this->getGenerationCachePath($USER->GetID()): false)))
{
    
    $maxLevel = 3;
    
	$arResult = array();

	$arFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'], "GLOBAL_ACTIVE"=>"Y", "IBLOCK_ACTIVE"=>"Y", "ACTIVE"=>"Y", "<="."DEPTH_LEVEL" => $maxLevel);
	$dbResSect = CIBlockSection::GetList(Array("left_margin"=>"asc"), $arFilter, false, array("ID", "DEPTH_LEVEL", "NAME", "SECTION_PAGE_URL", "UF_*"));

    $selected = 0;

	while($sectRes = $dbResSect->GetNext())
	{

		
		if(strlen($sectRes["UF_KRAKEN_MENU_COL"])>0)
			$sectRes["UF_KRAKEN_MENU_COL_VAL"] = CUserFieldEnum::GetList(array(), array("ID" => $sectRes["UF_KRAKEN_MENU_COL"],))->GetNext();
		
		if(strlen($sectRes["UF_KRAKEN_MENU_TYPE"])>0)
			$sectRes["UF_KRAKEN_MENU_TYPE_VAL"] = CUserFieldEnum::GetList(array(), array("ID" => $sectRes["UF_KRAKEN_MENU_TYPE"],))->GetNext();
            
        $menuElement = Array();
        
        $menuElement["ID"] = $sectRes["ID"]; 
        $menuElement["NAME"] = strip_tags(html_entity_decode($sectRes["NAME"]));
        $menuElement["LINK"] = $sectRes["UF_KRAKEN_MENU_LINK"]; 
        $menuElement["DEPTH_LEVEL"] = $sectRes["DEPTH_LEVEL"];
        $menuElement["TYPE"] = $sectRes["UF_KRAKEN_MENU_TYPE_VAL"]['XML_ID'];
        $menuElement["COL"] = $sectRes["UF_KRAKEN_MENU_COL_VAL"]['XML_ID'];
                    
        $menuElement["MENU_COLOR"] = $sectRes["~UF_KRAKEN_MENU_COLOR"];    
        $menuElement["MENU_ICON"] = $sectRes["~UF_KRAKEN_MENU_ICON"]; 
        $menuElement["MENU_IC_US"] = $sectRes["~UF_KRAKEN_MENU_IC_US"]; 
        
        
		if($sectRes["UF_KRAKEN_M_BLANK"])
            $menuElement["BLANK"] = true;
          
        
        if($menuElement["TYPE"] == 'none')
            $menuElement["NONE"] = true;		  
        
        
        if($menuElement["TYPE"] == 'action')
            $menuElement["LINK"] = $arLinks[$menuElement["TYPE"]];
                    
        if($menuElement["TYPE"] == 'land')
		{
		  
            if($sectRes['UF_KRAKEN_LAND'] > 0)
            {
                $code = 'concept_kraken_site_'.SITE_ID;
    			$arFilter1 = Array('IBLOCK_CODE' => $code, 'ID' => $sectRes['UF_KRAKEN_LAND'], "ACTIVE"=>"Y");
    			$dbResSect1 = CIBlockSection::GetList(Array("left_margin"=>"asc"), $arFilter1);
    			
    			if($sectRes1 = $dbResSect1->GetNext())
    				$menuElement["LINK"] = $sectRes1['SECTION_PAGE_URL'];
            }          
			

		}
		else if($menuElement["TYPE"] == 'form' || $menuElement["TYPE"] == 'modal' || $menuElement["TYPE"] == 'quiz')
		{
			$menuElement['NOLINK'] = true;
            $menuElement["NONE"] = true;
            
            
            $menuElement["FORM"] = $sectRes["UF_KRAKEN_M_FORM"]; 
            $menuElement["MODAL"] = $sectRes["UF_KRAKEN_M_MODAL"]; 
            $menuElement["QUIZ"] = $sectRes["UF_KRAKEN_M_QUIZ"];

            if( ($menuElement["TYPE"] == 'form' && strlen($sectRes["UF_KRAKEN_M_FORM"])>0) || ($menuElement["TYPE"] == 'modal' && strlen($sectRes["UF_KRAKEN_M_MODAL"])>0) || ($menuElement["TYPE"] == 'quiz' && strlen($sectRes["UF_KRAKEN_M_QUIZ"])>0) )
                $menuElement["NONE"] = false;
            
		}
        
        if(strlen($menuElement["LINK"]) > 0)
            $menuElement["LINK"] = str_replace("#SITE_DIR#", SITE_DIR, $menuElement["LINK"]);
        
        if(strlen($menuElement["LINK"]) > 0 && $selected == 0)
        {
            $selected = CMenu::IsItemSelected($menuElement["LINK"], $cur_page, $cur_page_no_index);
            $menuElement['SELECTED'] = $selected;
        }
        
        
        
        $arSections["land_".$menuElement["ID"]] = $menuElement;
        

		$lvl = $maxLevel - intval($menuElement["DEPTH_LEVEL"]);
		$step = $menuElement["DEPTH_LEVEL"];		


		if($menuElement["TYPE"] == 'catalog' || $menuElement["TYPE"] == 'blog' || $menuElement["TYPE"] == 'news')
		{
		  
			$arSections["land_".$menuElement["ID"]]["LINK"] = $arLinks[$menuElement["TYPE"]];
            
            
            if(strlen($arSections["land_".$menuElement["ID"]]["LINK"]) > 0)
                $arSections["land_".$menuElement["ID"]]["LINK"] = str_replace("#SITE_DIR#", SITE_DIR, $arSections["land_".$menuElement["ID"]]["LINK"]);
            
            if(strlen($arSections["land_".$menuElement["ID"]]["LINK"]) > 0 && $selected == 0)
            {
                $selected = CMenu::IsItemSelected($arSections["land_".$menuElement["ID"]]["LINK"], $cur_page, $cur_page_no_index);
                $arSections["land_".$menuElement["ID"]]['SELECTED'] = $selected;
            }

			$code = $arCodes[$menuElement["TYPE"]].SITE_ID;
            
            
            $iblock = CIBlock::GetList(Array(), Array("CODE"=>$code), true);
            $arIBlock = $iblock->Fetch();
            
            $arSelect = Array("ID", "NAME", "SECTION_PAGE_URL", "DEPTH_LEVEL", "UF_*");
			$arFilter1 = Array('IBLOCK_ID' => $arIBlock["ID"], "GLOBAL_ACTIVE"=>"Y", "IBLOCK_ACTIVE"=>"Y", "ACTIVE"=>"Y", "<="."DEPTH_LEVEL" => $lvl);
			$dbResSect1 = CIBlockSection::GetList(Array("left_margin"=>"asc"), $arFilter1, false, $arSelect);

			while($sectRes1 = $dbResSect1->GetNext())
			{
                $menuElement = Array();
                
                
                $menuElement["ID"] = $sectRes1["ID"]; 
                $menuElement["NAME"] = strip_tags(html_entity_decode($sectRes1["NAME"]));
                $menuElement["LINK"] = $sectRes1["SECTION_PAGE_URL"]; 
                $menuElement["DEPTH_LEVEL"] = $sectRes1["DEPTH_LEVEL"] + $step;
                $menuElement["SHOW"] = $sectRes1["UF_KRAKEN_MAIN_MENU"]; 
                $menuElement["ADD"] = true; 

                if(strlen($menuElement["LINK"]) > 0 && $selected == 0)
                {
                    $selected = CMenu::IsItemSelected($menuElement["LINK"], $cur_page, $cur_page_no_index);
                    $menuElement['SELECTED'] = $selected;
                }

                
                
                
                
                    
                $arSections[] = $menuElement;

			}

		}


	}


	


	foreach($arSections as $key=>$arItem)
	{

        
	  	
	    if($arItem["DEPTH_LEVEL"] == 1)
	    {
	        $main_key = $key;
	        $arResult[$main_key] = $arItem;
	    }
	    
	    if($arItem["DEPTH_LEVEL"] == 2)
	    {
	        $main_key1 = $key;
	        
	        $arResult[$main_key]["SUB"][$main_key1] = $arItem;
	        $arResult[$main_key]["LEVEL"] = 2;
	        unset($arResult[$main_key1]);
            
            if($arItem["SELECTED"])
                $arResult[$main_key]["SELECTED"] = true;
	    }
	    
	    if($arItem["DEPTH_LEVEL"] == 3)
	    {
	        $main_key2 = $key;
	        
	        $arResult[$main_key]["SUB"][$main_key1]["SUB"][$main_key2] = $arItem;
	        $arResult[$main_key]["LEVEL"] = 3;
	        unset($arResult[$main_key2]);
            
            if($arItem["SELECTED"])
            {
                $arResult[$main_key]["SELECTED"] = true;
                $arResult[$main_key]["SUB"][$main_key1]["SELECTED"] = true;
            }
                
	    }
	    
	}
    
    
    
    foreach($arResult as $key=>$arItem)
    {
        if($arItem["ADD"] && !$arItem["SHOW"])
        {
            unset($arResult[$key]);
        }  
        else  
        {
            if(!empty($arItem["SUB"]) && is_array($arItem["SUB"]))
            {
                foreach($arItem["SUB"] as $key1=>$arSub)
                {
                    if($arSub["ADD"] && !$arSub["SHOW"])
                    {
                        unset($arResult[$key]["SUB"][$key1]);
                    }  
                    else  
                    {
                        if(!empty($arSub["SUB"]) && is_array($arSub["SUB"]))
                        {
                            foreach($arSub["SUB"] as $key2=>$arSub2)
                            {
                                if($arSub2["ADD"] && !$arSub2["SHOW"])
                                {
                                    unset($arResult[$key]["SUB"][$key1]["SUB"][$key2]);
                                }  
                            }
                        }
                    }
                }
            }
        }
        
    }
   
   	$this->includeComponentTemplate();
	
}

?>

