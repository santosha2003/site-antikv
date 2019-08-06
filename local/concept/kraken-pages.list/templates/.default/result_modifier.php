<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<?

$host = explode(":", $_SERVER["HTTP_HOST"]);

if(strlen(SITE_SERVER_NAME) > 0 && $host[0] != SITE_SERVER_NAME)
    $host = SITE_SERVER_NAME;

else
    $host = $host[0];


    $host = CKraken::HostFunc($host);

    $url_name = "http://";

    if($_SERVER["HTTPS"] == "On")
        $url_name = "https://";

    $url_name .= $host;

$arResult["SERVER_URL"] = $url_name;


/*
foreach($arResult["SECTIONS"] as $key=>$arSection)
{

    if($arSection["PICTURE"] > 0)
    {
        $rsFile = CFile::GetByID($arSection["PICTURE"]);
        $arFile = $rsFile->Fetch();
        
        $arResult["SECTIONS"][$key]["LOGO_NAME"] = $arFile["ORIGINAL_NAME"];
    }
    
    if($arSection["DETAIL_PICTURE"] > 0)
    {
        $rsFile = CFile::GetByID($arSection["DETAIL_PICTURE"]);
        $arFile = $rsFile->Fetch();
        
        $arResult["SECTIONS"][$key]["FAVICON_NAME"] = $arFile["ORIGINAL_NAME"];
    }
    
    
    $arResult["SECTIONS"][$key]["UF_CHAM_TITLE_FONT_VAL"]["XML_ID"] = "lato";
    
    if(strlen($arSection["UF_CHAM_TITLE_FONT"]) > 0 )
    {
        $font = CUserFieldEnum::GetList(array(), array(
            "ID" => $arSection["UF_CHAM_TITLE_FONT"],
        ));

        $arResult["SECTIONS"][$key]["UF_CHAM_TITLE_FONT_VAL"] = $font->GetNext();

    }
    
    
    $arResult["SECTIONS"][$key]["UF_CHAM_TEXT_FONT_VAL"]["XML_ID"] = "lato";
    
    if(strlen($arSection["UF_CHAM_TEXT_FONT"]) > 0)
    {
        $font = CUserFieldEnum::GetList(array(), array(
            "ID" => $arSection["UF_CHAM_TEXT_FONT"],
        ));

        $arResult["SECTIONS"][$key]["UF_CHAM_TEXT_FONT_VAL"] = $font->GetNext();
    }
    
    
    $arResult["SECTIONS"][$key]["UF_CHAM_MAIN_COLOR_VAL"]["XML_ID"] = "light-blue";
    
    if(strlen($arSection["UF_CHAM_MAIN_COLOR"]) > 0)
    {
        $font = CUserFieldEnum::GetList(array(), array(
            "ID" => $arSection["UF_CHAM_MAIN_COLOR"],
        ));

        $arResult["SECTIONS"][$key]["UF_CHAM_MAIN_COLOR_VAL"] = $font->GetNext();
    }

    if(strlen($arSection["UF_CHAM_MENU_TYPE"]) > 0)
    {
        $menu = CUserFieldEnum::GetList(array(), array(
            "ID" => $arSection["UF_CHAM_MENU_TYPE"],
        ));

        $arResult["SECTIONS"][$key]["UF_CHAM_MENU_TYPE_ENUM"] = $menu->GetNext();
    }

}

$rsEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_NAME"=>"UF_CHAM_TITLE_FONT")); 
while($arEnum = $rsEnum->GetNext())
    $arResult["TITLE_FONTS"][] = $arEnum;

$rsEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_NAME"=>"UF_CHAM_TEXT_FONT")); 
while($arEnum = $rsEnum->GetNext())
    $arResult["TEXT_FONTS"][] = $arEnum;

$rsEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_NAME"=>"UF_CHAM_MAIN_COLOR")); 
while($arEnum = $rsEnum->GetNext())
    $arResult["MAIN_COLOR"][] = $arEnum;

$rsEnum = CUserFieldEnum::GetList(array(), array("USER_FIELD_NAME"=>"UF_CHAM_MENU_TYPE")); 
while($arEnum = $rsEnum->GetNext())
    $arResult["MENU_TYPE"][] = $arEnum;
*/

?>
