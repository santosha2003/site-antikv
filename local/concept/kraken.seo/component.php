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

global $APPLICATION;
global $USER;
global $DB;

global $CACHE_MANAGER;

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock,
	Bitrix\Main\Page\Asset as Asset;


//host

$host = explode(":", $_SERVER["HTTP_HOST"]);
$uri = explode("?", $_SERVER["REQUEST_URI"]); 

$protocol = "http://";

if(!empty($_SERVER["HTTPS"]))
    $protocol = "https://";

$serv = $protocol.$host[0]; 
$url_name = $serv.$uri[0];    





$arResult = Array();  

$arResult["H1"] = $GLOBALS['APPLICATION']->GetTitle(false);
$arResult["TITLE"] = $GLOBALS['APPLICATION']->GetPageProperty("title");
$arResult["KEYWORDS"] = $GLOBALS['APPLICATION']->GetPageProperty("keywords");
$arResult["DESCRIPTION"] = $GLOBALS['APPLICATION']->GetPageProperty("description");

if(strlen($GLOBALS["H1"]) > 0)
    $arResult["H1"] = $GLOBALS["H1"];
    
if(strlen($GLOBALS["TITLE"]) > 0)
    $arResult["TITLE"] = $GLOBALS["TITLE"];
    
if(strlen($arResult["TITLE"]) <= 0)
    $arResult["TITLE"] = $arResult["H1"];
    
if(strlen($GLOBALS["KEYWORDS"]) > 0)
    $arResult["KEYWORDS"] = $GLOBALS["KEYWORDS"];
    
if(strlen($GLOBALS["DESCRIPTION"]) > 0)
    $arResult["DESCRIPTION"] = $GLOBALS["DESCRIPTION"];


$url = explode("?", $_SERVER["REQUEST_URI"]);
$url = trim($url[0]);


global $DB;

$strSql = "SHOW TABLES LIKE 'kraken_seo'";
$res = $DB->Query($strSql, false, $err_mess.__LINE__);

if($res->SelectedRowsCount() > 0)
{

    $strSql = "SELECT * FROM kraken_seo WHERE url='".$url."' AND site_id='".SITE_ID."' LIMIT 1";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    if($res->SelectedRowsCount() > 0)
    {
        $ar_result = $res->GetNext();
        
        $arResult["NOINDEX"] = $ar_result["noindex"];
        
        $arResult["NEW_H1"] = trim($ar_result["h1"]);
        $arResult["NEW_TITLE"] = trim($ar_result["title"]);
        $arResult["NEW_KEYWORDS"] = trim($ar_result["keywords"]);
        $arResult["NEW_DESCRIPTION"] = trim($ar_result["description"]);
        
        
        $arResult["OG_IMAGE"] = $ar_result["og_image"];
        $arResult["OG_TITLE"] = $ar_result["og_title"];
        $arResult["OG_DESCRIPTION"] = $ar_result["og_description"];
        $arResult["OG_URL"] = $ar_result["og_url"];
        $arResult["OG_TYPE"] = $ar_result["og_type"];
        
        if($arResult["OG_IMAGE"] > 0)
        {
            $rsFile = CFile::GetByID($arResult["OG_IMAGE"]);
            $arFile = $rsFile->Fetch();
             
            $arResult["OG_IMAGE_PATH"] = $serv.CFile::GetPath($arResult["OG_IMAGE"]);     
            $arResult["OG_IMAGE_NAME"] = $arFile["ORIGINAL_NAME"];
            
        }
        
        
        $arResult["META_TAGS"] = unserialize(base64_decode($ar_result["meta_tags"]));
        
    }
    
    
    
    if($arResult["NOINDEX"] == 1)
        $GLOBALS['APPLICATION']->AddHeadString('<meta name="robots" content="noindex, nofollow" />');
    
    if(!empty($arResult["META_TAGS"]))
    {
        foreach($arResult["META_TAGS"] as $tag)
            $GLOBALS['APPLICATION']->AddHeadString(htmlspecialcharsBack($tag));
    }
    
    //og tags
    
    if(strlen($arResult["OG_URL"]) > 0)
    {
        $string = '<meta property="og:url" content="'.$arResult["OG_URL"].'" />';
        $APPLICATION->AddHeadString($string, false, true);
    }
    
    if(strlen($arResult["OG_TYPE"]) > 0)
    {
        $string = '<meta property="og:type" content="'.$arResult["OG_TYPE"].'" />';
        $APPLICATION->AddHeadString($string, false, true);
    }
    
    if(strlen($arResult["OG_TITLE"]) > 0)
    {
        $string = '<meta property="og:title" content="'.$arResult["OG_TITLE"].'" />';
        $APPLICATION->AddHeadString($string, false, true);
    }
    
    if(strlen($arResult["OG_DESCRIPTION"]) > 0)
    {
        $string = '<meta property="og:description" content="'.$arResult["OG_DESCRIPTION"].'" />';
        $APPLICATION->AddHeadString($string, false, true);
    }
    
    if(strlen($arResult["OG_IMAGE"]) > 0)
    {
        $string = '<meta property="og:image" content="'.$arResult["OG_IMAGE_PATH"].'" />';
        $APPLICATION->AddHeadString($string, false, true);
    }
    
    
    if(strlen($arResult["NEW_TITLE"]) > 0)
        $GLOBALS["TITLE"] = $arResult["NEW_TITLE"];
    
    if(strlen($arResult["NEW_KEYWORDS"]) > 0)
        $GLOBALS["KEYWORDS"] = $arResult["NEW_KEYWORDS"];
    
    if(strlen($arResult["NEW_DESCRIPTION"]) > 0)
        $GLOBALS["DESCRIPTION"] = $arResult["NEW_DESCRIPTION"];
    
    if(strlen($arResult["NEW_H1"]) > 0)
        $GLOBALS["H1"] = $arResult["NEW_H1"];  
    
    

}  


$this->includeComponentTemplate();

?>