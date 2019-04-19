<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    global $KRAKEN_TEMPLATE_ARRAY;
    global $USER;
    global $DB_kraken;
?>

<?
    foreach($arResult["ITEMS"] as $key=>$arItem)
    {
        if($arItem["PROPERTIES"]["ADMIN_ONLY_VIEW"]["VALUE"] == "Y" && !$USER->isAdmin())
            unset($arResult["ITEMS"][$key]);
    }

    $arResult["H1_MAIN"] = 0;
    foreach($arResult["ITEMS"] as $key=>$arItem)
    {
        if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0 && $arItem["PROPERTIES"]["THIS_H1"]["VALUE"] == "Y")  
            $arResult["H1_MAIN"] = 1;
    }

?>
<?
$main_key = -1;
$main_key_first = -1;

$valID = "";





if(is_array($arResult["SECTION"]["UF_KRAKEN_BANNERS"]) && !empty($arResult["SECTION"]["UF_KRAKEN_BANNERS"]))
{
    $arFilter = Array("ID"=> $arResult["SECTION"]["UF_KRAKEN_BANNERS"], "ACTIVE"=>"Y");

    $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);

    while($ob = $res->GetNextElement())
    {
        $arElement = Array();
        
        $arElement = $ob->GetFields();  
        $arElement["PROPERTIES"] = $ob->GetProperties();

        $arResult["SECTION"]["BANNERS"][] = $arElement;
       
    }



}


$menu_count = 0;
$menu_first_sort = 0;
foreach($arResult["ITEMS"] as $key=>$arItem)
{
    //menu
    if($arItem["PROPERTIES"]["SHOW_IN_MENU"]["VALUE"] == "Y")
    {
        $arMenu = Array();


        $arMenu["SORT"] = $arItem["PROPERTIES"]["MENU_SORT"]["VALUE"];

        if(strlen($arItem["PROPERTIES"]["MENU_TITLE"]["VALUE"]) > 0)
            $arMenu["NAME"] = $arItem["PROPERTIES"]["MENU_TITLE"]["~VALUE"];

        elseif(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0)
            $arMenu["NAME"] = $arItem["PROPERTIES"]["HEADER"]["~VALUE"];
        
        else
            $arMenu["NAME"] = $arItem["NAME"];


        $arMenu["ID"] = $arItem["ID"];
        $arMenu["HIDE"] = $arItem["PROPERTIES"]["HIDE_BLOCK"]["VALUE"];
        $arMenu["HIDE_LG"] = $arItem["PROPERTIES"]["HIDE_BLOCK_LG"]["VALUE"];
        $arMenu["ICON"] = $arItem["PROPERTIES"]["MENU_ICON"]["VALUE"];
        $arMenu["ICON_COLOR"] = $arItem["PROPERTIES"]["MENU_ICON"]["DESCRIPTION"];
        $arMenu["PICTURE"] = $arItem["PROPERTIES"]["MENU_PIC"]["VALUE"];

        if(strlen($arItem["PROPERTIES"]["MENU_SORT"]["VALUE"]) > 0)
        {
            $arResult["MENU_FIRST_SORT"][$menu_first_sort] = $arMenu;
            $menu_first_sort++;
        }

        else
            $arResult["MENU_SEC_SORT"][] = $arMenu;
        
        $menu_count++;
        
    }
    
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "component")
        $arResult["COMPONENTS"][] = $arItem;


}

$arResult["MENU_COUNT"] = $menu_count;

if(!empty($arResult["MENU_FIRST_SORT"]))
{
    asort($arResult["MENU_FIRST_SORT"]);

    if(!empty($arResult["MENU_SEC_SORT"]))
    {
        $arResult["MENU"] = array_merge($arResult["MENU_FIRST_SORT"], $arResult["MENU_SEC_SORT"]);
    }
    else
    {
        $arResult["MENU"] = $arResult["MENU_FIRST_SORT"];
    }
   
}

else
{
    $arResult["MENU"] = $arResult["MENU_SEC_SORT"];
}



// posMenu
if(strlen($arResult["SECTION"]["UF_KRAKEN_INMENU_POS"])>0){

    $inner_menu_pos = CUserFieldEnum::GetList(array(), array(
        "ID" => $arResult["SECTION"]["UF_KRAKEN_INMENU_POS"],
    ));
    $arResult["SECTION"]["UF_KRAKEN_INMENU_POS_RES"] = $inner_menu_pos->GetNext();
}




$property_enums = CIBlockPropertyEnum::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>$arParams['IBLOCK_ID'], "CODE"=>"BLINK_COLS"));
$arResult['ENUM_COLLS_BLINK'] = array();
while($enum_fields = $property_enums->GetNext())
{
    $arResult["SECTION"]['ENUM_COLLS_BLINK'][] = $enum_fields['ID'];
}








foreach($arResult["ITEMS"] as $key=>$arItem)
{
    

    //tariffs
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "tariff" && ($arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "flat"))
    {
        
        $type = $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "flat";
        
        if($valID != $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type)
            $main_key = -1;
    }
    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "service")
    {
        
        $type = $arItem["PROPERTIES"]["SERVICE_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "flat";
        
        if($valID != $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type)
            $main_key = -1;
            
    }

    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "blink" && ($arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "link"))
    {

        $type = $arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "link";
        
        if($valID != $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type)
            $main_key = -1;

    }

    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "opinion")
    {
        
        $type = $arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "slider";
        
        if($valID != $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type)
            $main_key = -1;
            
    }

    else
    {
        if($valID != $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"])
            $main_key = -1;
    }


    
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "first_block")
    {
        if($main_key_first < 0)
            $main_key_first = $key;
        
        
        if($arItem["PROPERTIES"]["FB_ADD_PICTURE"]["VALUE"] > 0)
            $arItem["TWO_COLS"] = "Y";
        
        if($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "buttons" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "mixed")
        {
            $k = 0;
            
            if(strlen($arItem["PROPERTIES"]["FB_LB_NAME"]["VALUE"]) > 0)
                $k++;
                
            if(strlen($arItem["PROPERTIES"]["FB_VIDEO_LINK"]["VALUE"]) > 0)
                $k++;
                
            if(strlen($arItem["PROPERTIES"]["FB_RB_NAME"]["VALUE"]) > 0)
                $k++;
                
                
            $arItem["BUTTONS_COUNT"] = $k;
                
        }
        
        if($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "icons" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "mixed")
        {
            $arItem["ICONS_COUNT"] = 0;
            $arItem["ICONS_DESC_COUNT"] = 0;

            if(!empty($arItem["PROPERTIES"]["FB_ICONS"]["VALUE"]))
                $arItem["ICONS_COUNT"] = count($arItem["PROPERTIES"]["FB_ICONS"]["VALUE"]);

            if(!empty($arItem["PROPERTIES"]["FB_ICONS_DESC"]["VALUE"]))
                $arItem["ICONS_DESC_COUNT"] = count($arItem["PROPERTIES"]["FB_ICONS_DESC"]["VALUE"]);

            $arItem["ICONS_MAX"] = max($arItem["ICONS_COUNT"], $arItem["ICONS_DESC_COUNT"]);
        }
        
        
        $arResult["ITEMS"][$main_key_first]["ELEMENTS"][] = $arItem;
        
        if($main_key_first != $key)
            unset($arResult["ITEMS"][$key]);
        
    }
    
    
    //text
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "text")
    {
        if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] > 0)
        {
            $arResult["ITEMS"][$key]["PADDING_CHANGE"] = true;
            $arResult["ITEMS"][$key]["TITLE_CHANGE"] = true;
            $arResult["ITEMS"][$key]["BUTTON_CHANGE"] = true;
        }
    }
   
   
    
    //tariffs flat
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "tariff" && ($arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "flat") && $menu_count <= 0)
    {

        if($main_key < 0)
            $main_key = $key;
    
    
        $arResult["ITEMS"][$main_key]["ELEMENTS"][] = $arItem;
        
        if($main_key != $key)
            unset($arResult["ITEMS"][$key]);

    }

    //blink links

    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "blink" && ($arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "link"))
    {


        if($main_key < 0)
            $main_key = $key;


        $arResult["ITEMS"][$main_key]["ELEMENTS"][] = $arItem;
        
        if($main_key != $key)
            unset($arResult["ITEMS"][$key]);

    }


    //opinion
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "opinion")
    {
        if($arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] != "slider")
        {
            $arResult["ITEMS"][$key]["TITLE_CHANGE"] = true;
            $arResult["ITEMS"][$key]["BUTTON_CHANGE"] = true;
        }

        if($arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] == "slider")
            {   
                if($main_key < 0)
                    $main_key = $key;
            
            
                $arResult["ITEMS"][$main_key]["ELEMENTS"][] = $arItem;
                
                if($main_key != $key)
                    unset($arResult["ITEMS"][$key]);
            }

    }

    


    //news
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "news")
    {

        $arNews = array();

        if(!empty($arItem["PROPERTIES"]["NEWS_ELEMENTS_NEWS"]["VALUE"]))
            $arNews = array_merge($arNews, $arItem["PROPERTIES"]["NEWS_ELEMENTS_NEWS"]["VALUE"]);

        if(!empty($arItem["PROPERTIES"]["NEWS_ELEMENTS_BLOG"]["VALUE"]))
            $arNews = array_merge($arNews, $arItem["PROPERTIES"]["NEWS_ELEMENTS_BLOG"]["VALUE"]);

        if(!empty($arItem["PROPERTIES"]["NEWS_ELEMENTS_ACTION"]["VALUE"]))
            $arNews = array_merge($arNews, $arItem["PROPERTIES"]["NEWS_ELEMENTS_ACTION"]["VALUE"]);


        
        $arSort = Array("ACTIVE_FROM" => "DESC", "ID" => "DESC");

        if($arItem["PROPERTIES"]["NEWS_CHRONO"]["VALUE_XML_ID"] == "asc")
            $arSort = Array("ACTIVE_FROM" => "ASC", "ID" => "ASC");
            

        if(!empty($arNews))
        {

            $arFilter = Array("ID"=> $arNews, "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList($arSort, $arFilter);

            while($ob = $res->GetNextElement())
            {
                $arElement = Array();
                
                $arElement = $ob->GetFields();  
                $arElement["PROPERTIES"] = $ob->GetProperties();


                $arResult["ITEMS"][$key]["ELEMENTS"][] = $arElement;
               
            }

        }

    }

    //catalog
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "catalog")
    {

        $code_cat = "concept_kraken_site_catalog_".SITE_ID;
      
        $ar_res_item = Array();

        if(!empty($arItem["PROPERTIES"]["CATALOG"]["VALUE"]))
        {
            $arFilter = Array("IBLOCK_CODE"=>$code_cat, "ID"=>$arItem["PROPERTIES"]["CATALOG"]["VALUE"], "ACTIVE"=>"Y", "INCLUDE_SUBSECTIONS" => "N");
            $res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter);

            $currency = "";

            if($arItem["PROPERTIES"]["CATALOG_CURR_ON"]["VALUE"] == "Y")
                $currency = $arItem["PROPERTIES"]["CATALOG_CURR_VAL"]["VALUE"];
            
            while($ob = $res->GetNextElement())
            { 

                $arElement = Array();
                $arElement = $ob->GetFields();
                $arElement["PROPERTIES"] = $ob->GetProperties();

                if($arItem["PROPERTIES"]["CATALOG_CURR_ON"]["VALUE"] != "Y")
                    $currency = $arElement["PROPERTIES"]["CURR"]["VALUE"];

                $arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"] = "";

                if(strlen($arElement["PROPERTIES"]["PRICE"]["VALUE"])>0)
                    {                       
                        $unit = "";
                            if(in_array($arElement["PROPERTIES"]["UNITS"]["VALUE"], $KRAKEN_TEMPLATE_ARRAY['CART_UNITS']['VALUE']) && $arItem["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
                            {
                                $unit = $DB_kraken["UNITS"]["ITEMS"][$arElement["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_MAIN"];

                                if(strlen($DB_kraken["UNITS"]["ITEMS"][$arElement["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_PRICE"])>0)
                                    $unit = $DB_kraken["UNITS"]["ITEMS"][$arElement["PROPERTIES"]["UNITS"]["VALUE"]]["~SYM_PRICE"];

                                $unit = "<span class='units-style'> ".$unit."</span>";
                            }

                        $from = "";
                            if($arElement["PROPERTIES"]["PRICE_FROM"]["VALUE"] == "Y")
                                $from = GetMessage("KRAKEN_LAND_FROM");

                        $arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"] = $from."<span class='bold'>".CKraken_format::convertMain($arElement["PROPERTIES"]["PRICE"]["VALUE"], $arElement["PROPERTIES"]["CURR"]["VALUE"], $currency)."</span>".$unit;
                    }

                    if($arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
                       $arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"] = "<span class='bold'>".GetMessage("KRAKEN_LAND_REQUEST")."</span>";

                    $arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"] = $arElement["PROPERTIES"]["OLD_PRICE"]["~VALUE"];

                    if($arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y")
                        $arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"] = "";


                    if(strlen($arElement["PROPERTIES"]["OLD_PRICE"]["VALUE"])>0 && $arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y")
                        $arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"] = CKraken_format::convertMain($arElement["PROPERTIES"]["OLD_PRICE"]["VALUE"], $arElement["PROPERTIES"]["CURR"]["VALUE"], $currency);


                
                $ar_res_item[] = $arElement;  
            }
            
            $arResult["ITEMS"][$key]["ELEMENTS"] = $ar_res_item;

        }

        $arResult["ITEMS"][$key]["BUTTON_CHANGE"] = true;
        

    }
    
    //faq
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "faq")
    {
        $code_faq = "concept_kraken_site_faq_".SITE_ID;

        if(!empty($arItem["PROPERTIES"]["FAQ_ELEMENTS"]["VALUE"]))
        {
            $arFilter = Array("IBLOCK_CODE"=>$code_faq, "SECTION_ID" => $arItem["PROPERTIES"]["FAQ_ELEMENTS"]["VALUE"], "ACTIVE"=>"Y", "INCLUDE_SUBSECTIONS" => "N");

            $res = CIBlockElement::GetList(Array("sort" => "asc"), $arFilter);

            while($ob = $res->GetNextElement())
            {

                $arElement = Array();
                
                $arElement = $ob->GetFields();  
                $arElement["PROPERTIES"] = $ob->GetProperties();
               
                $arResult["ITEMS"][$key]["ELEMENTS"][] = $arElement;
               
            }

        }

        

    }

    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "faq")
        $arResult["ITEMS"][$key]["BUTTON_CHANGE"] = true;
    



    //empl
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "empl")
    {

        if(!empty($arItem["PROPERTIES"]["EMPL"]["VALUE"]))
        {
            $arFilter = Array("ID"=> $arItem["PROPERTIES"]["EMPL"]["VALUE"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");

            $res = CIBlockElement::GetList(Array("sort" => "asc"), $arFilter);

            while($ob = $res->GetNextElement())
            {
                $arElement = Array();

                $arElement = $ob->GetFields();  
                $arElement["PROPERTIES"] = $ob->GetProperties();


                $arResult["ITEMS"][$key]["ELEMENTS"][] = $arElement;
               
            }

        }

        

    }


    
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "tariff" && ($arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "flat"))
    {
        
        $type = $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "flat";
        
        $valID = $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type;
    }

    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "service")
    {
        
        $type = $arItem["PROPERTIES"]["SERVICE_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "flat";
        
        $valID = $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type;
    }

    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "blink" && ($arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "link"))
    {
        

        $type = $arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "link";

        $valID = $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type;
            
    }

    elseif($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "opinion")
    {
        
        $type = $arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"];
        
        if(strlen($type) <= 0)
            $type = "slider";
        
        $valID = $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"].$type;
    }
    else
    {
        $valID = $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"];
    }

    
}

// $arResult["VIDEO_API"] = $video_api;



foreach($arResult["ITEMS"] as $key=>$arItem)
{


    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "gallery")
    {

        $val=3;
        $arCount = Array();

        for($i=1; $i <=4; $i++)
        {
            if(strlen($arItem["PROPERTIES"]["GALLERY_COUNT_PHOTO_$i"]["VALUE"]) > 0)
                $val=(int)$arItem["PROPERTIES"]["GALLERY_COUNT_PHOTO_$i"]["VALUE"];

            $arCount[$i] = $val;
        }

        $arCountDesc = false;

        if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "slider")
        {
            foreach($arItem["PROPERTIES"]["GALLERY"]["~DESCRIPTION"] as $desc)
            {
                if(strlen($desc)>0)
                {
                    $arCountDesc = true;
                    break;
                }

            }

        }

        $arResult["ITEMS"][$key]["GALLERY_COUNT"] = $arCount;
        $arResult["ITEMS"][$key]["GALLERY_COUNT_DESC"] = $arCountDesc;
    }

   
   

  


    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "news")
    {
        $subname = 0;
        $arElements = Array();

        if(!empty($arItem["ELEMENTS"]))
        {
            foreach($arItem["ELEMENTS"] as $arNews)
            {
                
                if(strlen($arNews["ACTIVE_FROM"]) > 0)
                    $subname++;
    
    
                if(strlen($arNews["IBLOCK_SECTION_ID"])>0 && $arResult["ITEMS"][$key]["PARENT_ON"] != "Y")
                    $arResult["ITEMS"][$key]["PARENT_ON"] = "Y";
            }
        }
        


        $arResult["ITEMS"][$key]["SHOW_SUBNAME"] = $subname; 


    }


    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "catalog")
    {

        $picture = 0;
        
        if(!empty($arItem["ELEMENTS"]))
        {
            foreach($arItem["ELEMENTS"] as $arCatalog)
            {
             
                if(strlen($arCatalog["PICTURE"]) > 0)              
                    $picture++;
    
            }
        }
        
           

        $arResult["ITEMS"][$key]["SHOW_CATALOG_PICTURE"] = $picture;


        
    }


    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "numbers")
    {
        $string_num = 0;

        if(!empty($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["VALUE"]))
        {
            foreach($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["VALUE"] as $arNum)
            {
                if(strlen(trim($arNum)) > 0)
                    $string_num++;
            }
        }
        

        $arResult["ITEMS"][$key]["STRING_NUM"] = $string_num;

    }

    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "empl")
    {
        $picture = 0;
        $sect_name = 0;

        if(!empty($arItem["ELEMENTS"]))
        {
            foreach($arItem["ELEMENTS"] as $arEmpl)
            {
          
    
                if(strlen($arEmpl["PREVIEW_PICTURE"] > 0))
                    $picture++;
                if(strlen($arEmpl["SECTION_NAME"] > 0))
                    $sect_name++;
    
            } 
        }
        


        $arResult["ITEMS"][$key]["SHOW_PICTURE"] = $picture;  
        $arResult["ITEMS"][$key]["SHOW_SECT"] = $sect_name;  


    }

    //advantages
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "advantages")
    {
        $arItem["PIC_COUNT"] = 0;
        $arItem["IC_COUNT"] = 0;
        $arItem["PIC_NAME_COUNT"] = 0;
        $arItem["PIC_DESC_COUNT"] = 0;

        if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0 && $menu_count <= 0)
        {
            $arResult["ITEMS"][$key]["PADDING_CHANGE"] = true;
            $arResult["ITEMS"][$key]["TITLE_CHANGE"] = true;
            $arResult["ITEMS"][$key]["BUTTON_CHANGE"] = true;
        }

        if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "images" || $arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "")
        {
            foreach($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"] as $arValue){
                if(strlen($arValue) > 0){
                    $arItem["PIC_COUNT"]++;
                }
            }

        }

        else if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "icons")
        {
            foreach($arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"] as $arValue){
                if(strlen($arValue) > 0){
                    $arItem["IC_COUNT"]++;
                }
            }
        }
        
        foreach($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["DESCRIPTION"] as $arValue){
            if(strlen($arValue) > 0){
                $arItem["PIC_NAME_COUNT"]++;
            }
        }
        foreach($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["VALUE"] as $arValue){
            if(strlen($arValue) > 0){
                $arItem["PIC_DESC_COUNT"]++;
            }
        }


        $arResult["ITEMS"][$key]["PIC_COUNT"] = $arItem["PIC_COUNT"];
        $arResult["ITEMS"][$key]["IC_COUNT"] = $arItem["IC_COUNT"];
        $arResult["ITEMS"][$key]["PIC_NAME_COUNT"] = $arItem["PIC_NAME_COUNT"];
        $arResult["ITEMS"][$key]["PIC_DESC_COUNT"] = $arItem["PIC_DESC_COUNT"];
        $arResult["ITEMS"][$key]["PIC_MAX"] = max($arItem["PIC_COUNT"], $arItem["PIC_DESC_COUNT"], $arItem["PIC_NAME_COUNT"], $arItem["IC_COUNT"]);

    }

}



foreach($arResult["ITEMS"] as $key=>$arItem)
{
    if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "first_block")
    {
        unset($arResult["ITEMS"][$key]);
        array_unshift($arResult["ITEMS"], $arItem);
    }
  
}



// BLOG, NEWS, ACTIONS SECTIONS

$code = array('concept_kraken_site_history_'.SITE_ID, 'concept_kraken_site_news_'.SITE_ID, 'concept_kraken_site_action_'.SITE_ID);

$SectList = CIBlockSection::GetList(array(), array("IBLOCK_CODE"=>$code, "ACTIVE"=>"Y"), false, array("ID","NAME","SECTION_PAGE_URL"));
while ($SectListGet = $SectList->GetNext())
{
    $arResult["SECTION"]["BNA"][$SectListGet["ID"]]=$SectListGet;
}



// EMPL SECTIONS
$codeEmpl = array('concept_kraken_site_employee_'.SITE_ID);

$SectListEmpl = CIBlockSection::GetList(array(), array("IBLOCK_CODE"=>$codeEmpl, "ACTIVE"=>"Y"), false, array("ID", "NAME"));
while ($SectListGetEmpl = $SectListEmpl->GetNext())
{
    $arResult["SECTION"]["EMPL"][$SectListGetEmpl["ID"]]=$SectListGetEmpl;
}


?>

<?$frame = $this->createFrame()->begin();?>


    <?if(strlen($arResult["SECTION"]["UF_KRAKEN_CSS_USER"]) > 0):?>
      
        <?$this->SetViewTarget("service_head");?>

            <?
                
                $headscript = "<style type='text/css'>".$arResult["SECTION"]["~UF_KRAKEN_CSS_USER"]."</style>";

                echo $headscript;

            ?>
     
        <?$this->EndViewTarget(); ?> 
        
    <?endif;?>

    <?if(strlen($arResult["SECTION"]["UF_KRAKEN_JS_USER"]) > 0):?>

        <?$this->SetViewTarget("service_close_body");?>
            
            <?
                $closebodyscript = "<script type='text/javascript'>".$arResult["SECTION"]["~UF_KRAKEN_JS_USER"]."</script>";

                echo $closebodyscript;
            ?>
     
        <?$this->EndViewTarget(); ?> 
        
    <?endif;?>

<?$frame->end();?>


<?
$this->__component->arResultCacheKeys = array_merge($this->__component->arResultCacheKeys, array("CACHED_TPL", "COMPONENTS", 'SEO', 'IPROPERTY_TEMPLATES', 'H1_MAIN'));
?>