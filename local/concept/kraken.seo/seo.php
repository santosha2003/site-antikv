<?
$site_id = trim($_REQUEST["site_id"]);
define("SITE_ID", $site_id);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$arResult["OK"] = "N";


global $DB;

$strSql = "SHOW TABLES LIKE 'kraken_seo'";
$res = $DB->Query($strSql, false, $err_mess.__LINE__);

if($res->SelectedRowsCount() > 0 && $_REQUEST["send"] == "Y")
{
    
    
    if(SITE_CHARSET == "windows-1251")
    {
        foreach($_REQUEST as $key => $value)
        {
            if(is_array($value))
            {
                foreach($value as $k=>$val)
                    $value[$k] = utf8win1251($val);
                    
                $_REQUEST[$key] = $value;
                    
            }
            else
            {
                $_REQUEST[$key] = utf8win1251($value);
            }
            
            
        }
    }
    
    
    
    $url = trim($_REQUEST["seourl"]);
    
    $update = false;
    
    $strSql = "SELECT * FROM kraken_seo WHERE url='".$url."' AND site_id='".SITE_ID."' LIMIT 1";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);

    if($res->SelectedRowsCount() > 0)
        $update = true;
        
    
    if($update == false)
    {
        $strSql = "INSERT INTO kraken_seo (url, site_id, noindex) VALUES ('".$url."','".SITE_ID."', 0)";
        $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    }
    
    
    $noindex = trim($_REQUEST["kraken_seo_noindex"]);
    
    if(strlen($noindex) <= 0)
        $noindex = 0;
    
    $strSql = "UPDATE kraken_seo SET noindex='".$noindex."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    
    $h1 = trim($_REQUEST["kraken_seo_h1"]);
    
    $strSql = "UPDATE kraken_seo SET h1='".$h1."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $title = trim($_REQUEST["kraken_seo_title"]);
    
    $strSql = "UPDATE kraken_seo SET title='".$title."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    
    $description = trim($_REQUEST["kraken_seo_description"]);
    
    $strSql = "UPDATE kraken_seo SET description='".$description."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $keywords = trim($_REQUEST["kraken_seo_keywords"]);
    
    $strSql = "UPDATE kraken_seo SET keywords='".$keywords."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $og_title = trim($_REQUEST["kraken_seo_og_title"]);
    
    $strSql = "UPDATE kraken_seo SET og_title='".$og_title."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $og_description = trim($_REQUEST["kraken_seo_og_description"]);
    
    $strSql = "UPDATE kraken_seo SET og_description='".$og_description."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $og_url = trim($_REQUEST["kraken_seo_og_url"]);
    
    $strSql = "UPDATE kraken_seo SET og_url='".$og_url."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $og_type = trim($_REQUEST["kraken_seo_og_type"]);
    
    $strSql = "UPDATE kraken_seo SET og_type='".$og_type."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    if(strlen($_FILES["kraken_seo_og_image"]["name"]) > 0)
    {
        
        $arIMAGE = $_FILES["kraken_seo_og_image"];
        $arIMAGE["old_file"] = $_REQUEST["imageogimage"];
        $arIMAGE["MODULE_ID"] = "concept.kraken";
        
        $fid = CFile::SaveFile($arIMAGE, "kraken");
        CFile::Delete($arIMAGE["old_file"]);

        $strSql = "UPDATE kraken_seo SET og_image='".$fid."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
        $res = $DB->Query($strSql, false, $err_mess.__LINE__);

    }
    elseif($_REQUEST["kraken_seo_og_image_del"] == 'Y' && strlen($_FILES["kraken_seo_og_image"]["name"]) <= 0)
    {
        CFile::Delete($_REQUEST['imageogimage']);
        
        
        $strSql = "UPDATE kraken_seo SET og_image='' WHERE url='".$url."' AND site_id='".SITE_ID."'";
        $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    }
    
    
    
    
    $meta_tags = $_REQUEST["kraken_other_meta"];
    array_shift($meta_tags);
    
    $meta = Array();
    
    foreach($meta_tags as $key=>$value)
    {
        if(strlen($value) > 0)
            $meta[] = $value;
    }
    
    $meta_tags = base64_encode(serialize($meta));
    
    $strSql = "UPDATE kraken_seo SET meta_tags='".$meta_tags."' WHERE url='".$url."' AND site_id='".SITE_ID."'";
    $res = $DB->Query($strSql, false, $err_mess.__LINE__);
    
    
    $arResult["OK"] = "Y";
        
    
}


/*



$bs = new CIBlockSection;

$ID = intval(trim($_REQUEST["section_id"]));

$arFields = Array();

$arFields["UF_CHAM_NOINDEX"] = trim($_REQUEST["hameleon_seo_noindex"]);

$arFields["IPROPERTY_TEMPLATES"]["SECTION_META_TITLE"] = trim($_REQUEST["hameleon_seo_title"]);
$arFields["IPROPERTY_TEMPLATES"]["SECTION_META_KEYWORDS"] = trim($_REQUEST["hameleon_seo_keywords"]);
$arFields["IPROPERTY_TEMPLATES"]["SECTION_META_DESCRIPTION"] = trim($_REQUEST["hameleon_seo_description"]);

$arFields["UF_CHAM_OG_URL"] = $_REQUEST["hameleon_seo_og_url"];
$arFields["UF_CHAM_OG_TYPE"] = $_REQUEST["hameleon_seo_og_type"];
$arFields["UF_CHAM_OG_TITLE"] = $_REQUEST["hameleon_seo_og_title"];
$arFields["UF_CHAM_OG_DESC"] = $_REQUEST["hameleon_seo_og_description"];


$arFields["UF_CHAM_META_TAGS"] = $_REQUEST["hameleon_other_meta"];

if(SITE_CHARSET == "windows-1251")
{
    foreach($arFields as $key => $value)
    {
        if(is_array($value))
        {
            foreach($value as $k=>$val)
                $value[$k] = utf8win1251($val);
                
        }
        else
        {
            $arFields[$key] = utf8win1251($value);
        }
        
        
    }
        
        
    $arFields["IPROPERTY_TEMPLATES"]["SECTION_META_TITLE"] = utf8win1251(trim($_REQUEST["hameleon_seo_title"]));
    $arFields["IPROPERTY_TEMPLATES"]["SECTION_META_KEYWORDS"] = utf8win1251(trim($_REQUEST["hameleon_seo_keywords"]));
    $arFields["IPROPERTY_TEMPLATES"]["SECTION_META_DESCRIPTION"] = utf8win1251(trim($_REQUEST["hameleon_seo_description"]));
}



if(strlen($_FILES["hameleon_seo_og_image"]["name"]))
{
    $arFile = $_FILES["hameleon_seo_og_image"];
    $arFile["MODULE_ID"] = "iblock";
    
    $arFields["UF_CHAM_OG_IMAGE"] = $arFile;
}
elseif($_REQUEST["hameleon_seo_og_image_del"] == 'Y' && strlen($_FILES["hameleon_seo_og_image"]["name"]) <= 0)
{
    CFile::Delete($_REQUEST['imageogimage']);
    
    $arFile = CFile::MakeFileArray();
    $arFile["MODULE_ID"] = "iblock";
    $arFile["del"] = "Y";
    
    $arFields["UF_CHAM_OG_IMAGE"] = $arFile;
}


*/


    
$arResult = json_encode($arResult);
echo $arResult;   
?>