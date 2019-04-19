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

<?ob_start();?>

<?global $admin_active;?>
<?global $show_setting;?>
<?global $btn_view;?>
<?global $USER;?>
<?global $KRAKEN_TEMPLATE_ARRAY;?>
<?global $KRAKEN_MENU;?>

<?global $h1;?>
<?$h1 = 0;?>


<?global $components;?>
<?$components = 0;?>


<?$admin_active = $USER->isAdmin();?>
<?$show_setting = $KRAKEN_TEMPLATE_ARRAY["MODE_FAST_EDIT"]['VALUE'][0];?>
<?$btn_view = $KRAKEN_TEMPLATE_ARRAY["BTN_VIEW"]['VALUE'];?>






<?function CreateEmptyBlock($arSection){?>

    <?global $admin_active;?>
    <?global $show_setting;?>
    <?global $KRAKEN_TEMPLATE_ARRAY;?>

    <?global $APPLICATION;?>

    <div class="block light empty-block padding-on">
    
        <div class="shadow"></div>
        <div class="top-shadow"></div>


     
        <div class="head def">
            
            <div class="container">
            
                
                <h2 class='main1'><?=GetMessage("KRAKEN_EMPTYBLOCK_TITLE1")?> <?=GetMessage("KRAKEN_EMPTYBLOCK_QU")?><?=$arSection["NAME"]?><?=GetMessage("KRAKEN_EMPTYBLOCK_QU2")?> <?=GetMessage("KRAKEN_EMPTYBLOCK_TITLE2")?></h2>

                <div class="descrip"><?=GetMessage("KRAKEN_EMPTYBLOCK_SUBTITLE")?></div>
                    
   

            </div>
            
        </div>
        
        <div class="content">

            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        
                        <div class="start-block">
                            
                            <div class="icon start1"></div>
                            
                            <div class="text"><?=GetMessage("KRAKEN_EMPTYBLOCK_STEP1")?></div>
                            
                            <div class="button">
                                <a href='/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=<?=$KRAKEN_TEMPLATE_ARRAY["MENU_IBLOCK_ID"]?>&type=<?=$arSection["IBLOCK_TYPE_ID"]?>&lang=ru&find_section_section=0' target='_blank' class="button-def main-color elips big"><?=GetMessage("KRAKEN_EMPTYBLOCK_BUTTON1")?></a>
                            </div>


                            <!--div class="desc-copy">
                                <div class="parent_copy">
                                    
                                    <a data-clipboard-text="<?=$APPLICATION->GetCurPage()?>" class="list-copy"><?=GetMessage("KRAKEN_EMPTYBLOCK_COPY_URL")?></a>
                                    
                                    <span class="copy-success"><?=GetMessage("KRAKEN_EMPTYBLOCK_COPY_URL_SUCCSESS")?></span>

                                </div>
                            </div-->
                        
                        </div>
                        
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        
                        <div class="start-block">
                            
                            <div class="icon start2"></div>
                            
                            <div class="text"><?=GetMessage("KRAKEN_EMPTYBLOCK_STEP2")?></div>
                            
                            <div class="button">

                                <a class="button-def main-color elips big" target="_blank" href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arSection["IBLOCK_ID"]?>&type=<?=$arSection["IBLOCK_TYPE_ID"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=<?=$arSection["ID"]?>&find_section_section=<?=$arSection["ID"]?>&from=iblock_list_admin"><?=GetMessage("KRAKEN_EMPTYBLOCK_BUTTON2")?></a>
                            </div>
                        
                        </div>
                        
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="start-block">
                            
                            <div class="icon start3"></div>
                            
                            <div class="text"><?=GetMessage("KRAKEN_EMPTYBLOCK_STEP3")?></div>
                            
                            <div class="button">

                                <a class="button-def main-color elips big kraken-sets-open" data-open-set="seo"><?=GetMessage("KRAKEN_EMPTYBLOCK_BUTTON3")?></a>
                            </div>
                        
                        </div>

                    </div>
                
                </div>
            </div>
            
        </div>

    </div>

<?}?>




<?function CreateFirstSlider($arSlider){?>

        <?global $USER;?>
        <?global $btn_view;?>
        <?global $KRAKEN_TEMPLATE_ARRAY;?>
        <?global $KRAKEN_MENU;?>
        <?global $admin_active;?>
        <?global $show_setting;?>

        <?if($KRAKEN_MENU == 0)
            $KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]["VALUE"] = 1;?>

        <div class="wrap-first-slider parent-scroll-down <?if($arSlider["ELEMENTS"][0]["PROPERTIES"]["FB_HEIGHT_WINDOW"]["VALUE"] == "Y"):?> min-height-block<?endif;?>">

            <?if(!$KRAKEN_TEMPLATE_ARRAY["HEADER_BG"]):?><div class="top-shadow"></div><?endif;?>
        
            <div class="first-slider item-block" id="block<?=$arSlider["ID"]?>">

                <?$countSlider = count($arSlider["ELEMENTS"]);?>

                <?if(!empty($arSlider["ELEMENTS"]) && is_array($arSlider["ELEMENTS"])):?>
            
                    <?foreach($arSlider["ELEMENTS"] as $k => $arItem):?>

                        <?
                            $block_name = $arItem['~NAME'];

                            if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0)
                                $block_name .= " (".$arItem["PROPERTIES"]["HEADER"]["~VALUE"].")";

                           $block_name = htmlspecialcharsEx(strip_tags(html_entity_decode($block_name)));
                        ?>

                      
                        <?$style_bg = '';?>

                        <?if(strlen($arItem["PREVIEW_PICTURE"]["SRC"])>0):?>
                            <?$style_bg = "background-image: url('".$arItem["PREVIEW_PICTURE"]["SRC"]."');";?>

                        <?elseif($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "easy" && $arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y"):?>
                            <?$style_bg = "background-image: url('".SITE_TEMPLATE_PATH."/images/bg-fSlider.jpg'); background-size: cover;";?>

                        <?endif;?>
                        
                        <?
                            $style = "";

                            if(strlen($arItem["PROPERTIES"]["MARGIN_TOP"]["VALUE"]) > 0)
                                $style .= "margin-top: ".$arItem["PROPERTIES"]["MARGIN_TOP"]["VALUE"]."px;";

                            if(strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM"]["VALUE"]) > 0)
                                $style .= "margin-bottom: ".$arItem["PROPERTIES"]["MARGIN_BOTTOM"]["VALUE"]."px;";
                            
                            if(strlen($arItem["PROPERTIES"]["PADDING_TOP"]["VALUE"]) > 0)
                                $style .= "padding-top: ".$arItem["PROPERTIES"]["PADDING_TOP"]["VALUE"]."px;";
                        
                            if(strlen($arItem["PROPERTIES"]["PADDING_BOTTOM"]["VALUE"]) > 0)
                                $style .= "padding-bottom: ".$arItem["PROPERTIES"]["PADDING_BOTTOM"]["VALUE"]."px;";

                              
                        ?>

                        

                  
                    
                        <div id="first_slider_<?=$arItem["ID"]?>" class="first-block view-<?=$arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"]?> kraken-firsttype-<?=$KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]["VALUE"]?> <?=$arItem["PROPERTIES"]["SHADOW"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["COVER"]["VALUE_XML_ID"]?> <?if(strlen($arItem["PROPERTIES"]["VIDEO_BACKGROUND"]["VALUE"]) > 0):?> video-bg<?endif;?> <?if($arItem["PROPERTIES"]["HIDE_BLOCK_LG"]["VALUE"] == "Y"):?>hidden-lg hidden-md<?endif;?> <?if($arItem["PROPERTIES"]["HIDE_BLOCK"]["VALUE"] == "Y"):?>hidden-sm hidden-xs<?endif;?>" style="<?=$style_bg?> <?=$style?> <?if(strlen($arItem["PROPERTIES"]["BACKGROUND_COLOR"]["VALUE"]) > 0):?>background-color: <?=$arItem["PROPERTIES"]["BACKGROUND_COLOR"]["VALUE"]?>;<?endif;?>">

                            <?if(strlen($arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"])>0):?>

                                <style>
                                    @media (max-width: 991px){
                                        #first_slider_<?=$arItem["ID"]?>{
                                            <?if(strlen($arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"])>0):?>margin-top: <?=$arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"]?>px !important;<?endif;?>
                                            <?if(strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"])>0):?>margin-bottom: <?=$arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"]?>px !important;<?endif;?>
                                            <?if(strlen($arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"])>0):?>padding-top: <?=$arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"]?>px !important;<?endif;?>
                                            <?if(strlen($arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"])>0):?>padding-bottom: <?=$arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"]?>px !important;<?endif;?>
                                        }
                                    }
                                </style>

                            <?endif;?>

                            <?if(is_array($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"]) && !empty($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"])):?>
                
                                <?foreach($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"] as $arSlID):?>
                                    <?if($arSlID == 'top tb' || $arSlID == 'top bt') continue;?>
                                    <div class="corner <?=$arSlID?> hidden-xs hidden-sm"></div>
                                <?endforeach;?>
                                    
                            <?endif;?>

                            <?CKraken::admin_setting($arItem, true, $admin_active, $show_setting)?>
                           
                            <?if(strlen($arItem["PROPERTIES"]["VIDEO_BACKGROUND"]["VALUE"]) > 0):?>

                                <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem['PROPERTIES']['VIDEO_BACKGROUND']['~VALUE'],$out);?>     
                        
                                <div class="iframe-wrap">
                                    <iframe class="video-bg" allowfullscreen="" frameborder="0" height="100%" src="https://www.youtube.com/embed/<?=$out[1]?>?rel=0&amp;mute=1&amp;controls=0&amp;loop=1&amp;showinfo=0&amp;autoplay=1&amp;playlist=<?=$out[1]?>" width="100%"></iframe>
                                </div>
                               
                            <?endif;?>
                            
                            <div class="shadow"></div>
                        
                            <div class="container">
                                <div class="row">

                                    <?
                                    $class_cols='col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                    $class_padding_left='';
                                   

                                    if($arItem["TWO_COLS"] == "Y")
                                    {
                                        $class_cols='col-lg-7 col-md-7 col-sm-8 col-xs-12 two-cols';

                                        if($arItem["PROPERTIES"]["FB_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left")
                                        {
                                            $class_cols = 'col-lg-7 col-md-7 col-sm-8 col-xs-12 two-cols col-lg-push-5 col-md-push-5 col-sm-push-4 col-xs-push-0 right';
                                            $class_padding_left='wrap-padding-left';
                                        }
                                    }

                                    elseif($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "easy" && $arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y")
                                    {
                                        $class_cols='col-lg-9 col-md-9 col-sm-9 col-xs-12';
                                    }

                                    ?>

                                    <div class="first-block-container <?=$arItem["PROPERTIES"]["FB_TEXT_COLOR"]["VALUE_XML_ID"]?>">
                                        
                                        <div class="first-block-cell text-part <?=$class_cols?><?if($arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y" && $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] != "easy"):?> scrollnext<?endif;?>">
                                        
                                            <div class="<?=$class_padding_left?>">
                   
                                                <div class="head <?if($arItem["TWO_COLS"] == "Y" || ($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "easy" && $arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y")):?>min left<?endif;?> <?=$arItem["PROPERTIES"]["TITLE_SHADOW"]["VALUE_XML_ID"]?> <?=$animate;?> <?=$arItem["PROPERTIES"]["SUBTITLE_SHADOW"]["VALUE_XML_ID"]?>">

                                                	<?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>

											        	<style>

											        		<?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>

                                                                @media (min-width: 992px){

                                                                    <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0):?>
                                                                        #first_slider_<?=$arItem["ID"]?> div.head div.title, #first_slider_<?=$arItem["ID"]?> div.head h1, #first_slider_<?=$arItem["ID"]?> div.head h2{
                                                                            <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"]?>px !important;<?endif;?>

                                                                            <?
                                                                                $line_height_tit = intval($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"]) + 5;
                                                                                if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["DESCRIPTION"])>0)
                                                                                    $line_height_tit = $arItem["PROPERTIES"]["TITLE_SIZE"]["DESCRIPTION"];
                                                                            ?>

                                                                            line-height: <?=$line_height_tit?>px !important;
                                                                        }
                                                                    <?endif;?>

                                                                    <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>

                                                                    #first_slider_<?=$arItem["ID"]?> div.head .subtitle{
                                                                        <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"]?>px !important;<?endif;?>
                                                                        <?
                                                                            $line_height_sub = intval($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"]) + 3;
                                                                            if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["DESCRIPTION"])>0)
                                                                                $line_height_sub = $arItem["PROPERTIES"]["SUBTITLE_SIZE"]["DESCRIPTION"];
                                                                        ?>

                                                                        line-height: <?=$line_height_sub?>px !important;

                                                                    }
                                                                    <?endif;?>
                                                                }

                                                            <?endif;?>

                                                            <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>
                                                                @media (max-width: 991px){

                                                                 <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0):?>
                                                                    #first_slider_<?=$arItem["ID"]?> div.head div.title, #first_slider_<?=$arItem["ID"]?> div.head h1, #first_slider_<?=$arItem["ID"]?> div.head h2{
                                                                        <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"]?>px !important;<?endif;?>

                                                                        <?
                                                                            $line_height_tit_mob = intval($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"]) + 5;
                                                                            if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["DESCRIPTION"])>0)
                                                                                $line_height_tit_mob = $arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["DESCRIPTION"];
                                                                        ?>

                                                                        line-height: <?=$line_height_tit_mob?>px !important;
                                                                    }
                                                                    <?endif;?>

                                                                    <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>
                                                                    #first_slider_<?=$arItem["ID"]?> div.head .subtitle{
                                                                        <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"]?>px !important;<?endif;?>
                                                                        <?
                                                                            $line_height_sub_mob = intval($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"]) + 3;
                                                                            if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["DESCRIPTION"])>0)
                                                                                $line_height_sub_mob = $arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["DESCRIPTION"];
                                                                        ?>

                                                                        line-height: <?=$line_height_sub_mob?>px !important;
                                                                    }
                                                                    <?endif;?>
                                                                }

                                                            <?endif;?>
											            </style>

											        <?endif;?>
                                                    
                                                    <?if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0):?>
                                                    
                                                        <?$tit = Array();?>
                                                        <?$title = Array();?>
                                                    
                                                        <?
                                                        if(substr_count($arItem["PROPERTIES"]["HEADER"]["VALUE"], "{") > 0 && substr_count($arItem["PROPERTIES"]["HEADER"]["VALUE"], "}") > 0)
                                                        {
                                                            $tit = explode("{", $arItem["PROPERTIES"]["HEADER"]["VALUE"]);
                                                            $title[] = $tit[0];
                                                            $tit = $tit[1];
                                                            
                                                            
                                                            $tit = explode("}", $tit);
                                                            $title[] = $tit[1];
                                                            $tit = $tit[0];
                                                            
                                                            
                                                            $tit = explode("|", $tit);
                                                            
                                                        }
                                                        ?>


                                                    
                                                    
                                                        <div class="title main1 <?=$arItem["PROPERTIES"]["HEADER_COLOR"]["VALUE_XML_ID"]?>" <?if(strlen($arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"])>0):?> style="color: <?=$arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"]?>;"<?endif;?>>

                                                            <?$h1_close = 0;?>
                                                            
                                                            <?if($arItem["PROPERTIES"]["THIS_H1"]["VALUE"] == "Y" && $h1 == 0):?>
                                                                <h1>
                                                                
                                                                <?$h1 = 1;?>
                                                                <?$h1_close = 1;?>
                                                            <?endif;?>
                                                        
                                                            <?if(!empty($tit)):?>
                                                                <?=htmlspecialcharsBack($title[0])?><span class="typed"></span><?=htmlspecialcharsBack($title[1])?>
                                                            <?else:?>
                                                                <?=$arItem["PROPERTIES"]["HEADER"]["~VALUE"]?>
                                                            <?endif;?>
                                                            
                                                            <?if($arItem["PROPERTIES"]["THIS_H1"]["VALUE"] == "Y" && $h1_close == 1):?>
                                                                </h1>
                                                            <?endif;?>
                                                        
                                                                                                            
                                                        </div>
                                                        
                                                        <?if(!empty($tit)):?>
                            
                                                            <script>
                                                                $(document).ready(
                                                                    function(){
                                                                    $("div#block<?=$arItem["ID"]?> div.title span.typed").typed({
                                                                        strings: ["<?=implode('","', $tit)?>"],
                                                                        typeSpeed: 50,
                                                                        startDelay: 3000,
                                                                        backDelay: 2000,
                                                                    });
                                                                });
                                                            </script>
                                                        
                                                        <?endif;?>
                                                    
                                                    <?endif;?>
                                                    
                                                    <?if(strlen($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]) > 0):?>
                                                    
                                                        
                                                        <?$tit = Array();?>
                                                        <?$title = Array();?>
                                                    
                                                        <?
                                                        if(substr_count($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"], "{") > 0 && substr_count($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"], "}") > 0)
                                                        {
                                                            $tit = explode("{", $arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]);
                                                            $title[] = $tit[0];
                                                            $tit = $tit[1];
                                                            
                                                            
                                                            $tit = explode("}", $tit);
                                                            $title[] = $tit[1];
                                                            $tit = $tit[0];
                                                            
                                                            
                                                            $tit = explode("|", $tit);
                                                            
                                                        }
                                                        ?>
                                                    
                                                        <div class="subtitle <?=$arItem["PROPERTIES"]["HEADER_COLOR"]["VALUE_XML_ID"]?>" <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_COLOR"]["VALUE"])>0):?> style="color: <?=$arItem["PROPERTIES"]["SUBTITLE_COLOR"]["VALUE"]?>;"<?endif;?>>
                                                        
                                                            <?if(!empty($tit)):?>
                                                                <?=htmlspecialcharsBack($title[0])?><span class="typed"></span><?=htmlspecialcharsBack($title[1])?>
                                                            <?else:?>
                                                                <?=$arItem["PROPERTIES"]["SUBHEADER"]["~VALUE"]?>
                                                            <?endif;?>
                                                        
                                                        </div>
                                                        
                                                        <?if(!empty($tit)):?>
                            
                                                            <script>
                                                                $(document).ready(
                                                                    function(){
                                                                    $("div#block<?=$arItem["ID"]?> div.subtitle span.typed").typed({
                                                                        strings: ["<?=implode('","', $tit)?>"],
                                                                        typeSpeed: 50,
                                                                        startDelay: 3000,
                                                                        backDelay: 2000,
                                                                    });
                                                                });
                                                            </script>
                                                        
                                                        <?endif;?>
                                                        
                                                    <?endif;?>
                                                    
                                                    <?if($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "icons" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "mixed"):?>
                                                        <?if(strlen($arItem["ICONS_MAX"]) > 0):?>
                                                            <div class="icons row">
                                                            
                                                                <?$class = "";?>
                                                                <?$class_offset = "";?>
                                                                
                                                                <?if($arItem["TWO_COLS"] == "Y"):?>
                                                                    <?$class = "col-lg-6 col-md-6 col-sm-6 col-xs-12 min";?>
                                                                <?else:?>
                                                                    
                                                                    <?if($arItem["ICONS_MAX"] <= 3):?>

                                                                        <?$class = "col-lg-4 col-md-4 col-sm-4 col-xs-12";?>

                                                                        <?if($arItem["ICONS_MAX"] == 1):?>
                                                                            <?$class_offset = "col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-0";?>
                                                                        <?elseif($arItem["ICONS_MAX"] == 2):?>
                                                                            <?$class_offset = "col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-0";?>
                                                                        <?endif;?>
                                                                        
                                                                    <?else:?>
                                                                        <?$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12";?>
                                                                    <?endif;?>
                                                                    
                                                                <?endif;?>
                                                                
                                                                <?for($i = 0; $i < $arItem["ICONS_MAX"]; $i++):?>
                                                                
                                                                    <?if($i > 3) continue;?>
                                                                
                                                                    <div class="<?if($i==0):?><?=$class_offset?><?endif;?> <?=$class?> element">
                                                                        
                                                                        <div class="icon">
                                                                            
                                                                            <?if($arItem["ICONS_COUNT"] > 0):?>

                                                                                <div class="mob-cell left">
                                                                        
                                                                                    <div class="image-table">
                                                                                        <div class="image-cell">
                                                                                        
                                                                                            <?if($arItem["PROPERTIES"]["FB_ICONS"]["VALUE"][$i] > 0):?>
                                                                                                <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["FB_ICONS"]["VALUE"][$i], array('width'=>200, 'height'=>200), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]);?>
                                                                                                <img alt="" class="img-responsive" src="<?=$file["src"]?>" />
                                                                                            <?endif;?>
                                                                                            
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            
                                                                            <?endif;?>
                                                                            
                                                                            <?if($arItem["ICONS_DESC_COUNT"] > 0):?>

                                                                                <div class="mob-cell right">
                                                                            
                                                                                    <div class="text-wrap">
                                                                                        <div class="text">
                                                                                            <?=$arItem["PROPERTIES"]["FB_ICONS_DESC"]["~VALUE"][$i]?>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            
                                                                            <?endif;?>
                                                                            
                                                                        </div>
                                                                        
                                                                        
                                                                        
                                                                    </div>

                                                                
                                                                
                                                                <?endfor;?>
                                                                
                                                                
                                                            
                                                            </div>
                                                        <?endif;?>
                                                        
                                                    <?endif;?>

                                                    <?if($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "buttons" || $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "mixed"):?>
                    
                                                        <div class="buttons <?if($arItem["TWO_COLS"] == "Y"):?>row <?else:?> no-image<?endif;?> clearfix  <?if(strlen($arItem["PROPERTIES"]["FB_LB_NAME"]["VALUE"])>0):?> left-button-on<?endif;?><?if(strlen($arItem["PROPERTIES"]["FB_RB_NAME"]["VALUE"])>0):?> right-button-on<?endif;?><?if(strlen($arItem["PROPERTIES"]["FB_VIDEO_LINK"]["VALUE"])>0):?> video-button-on<?endif;?> <?=$arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"]?>">
                                                            
                                                            <?if($arItem["TWO_COLS"] != "Y"):?>
                                                                                                              
                                                                <?/*if($arItem["BUTTONS_COUNT"] == 1):?>
                                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
                                                                <?endif;*/?>
                                                                
                                                                <?if($arItem["BUTTONS_COUNT"] == 2):?>
                                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
                                                                <?endif;?>
                
                                                            <?endif;?>
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"]) <= 0):?>
                                                                <?$arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"] = "form";?>
                                                            <?endif;?>
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["FB_LB_NAME"]["VALUE"]) > 0 && $arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"] != ""):?>
                                                            
                                                                <div class="<?if($arItem["TWO_COLS"] == "Y"):?>col-lg-6 col-md-6 col-sm-6 col-xs-12<?else:?><?if($arItem["BUTTONS_COUNT"] == 1):?> col-lg-12 col-md-12 col-sm-12 col-xs-12<?else:?> col-lg-4 col-md-4 col-sm-4 col-xs-12<?endif;?><?endif;?>">

                                                                    <div class="">
                                                                    
                                                                        <div class="button left">

                                                                            <?
                                                                                $form_id = "";
                                                                                if($arItem["PROPERTIES"]["FB_LB_FORM"]["VALUE"] > 0)
                                                                                    $form_id = $arItem["PROPERTIES"]["FB_LB_FORM"]["VALUE"];

                                                                                if($arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"] == "fast_order")
                                                                                {
                                                                                    $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                                                                                    if($arItem["PROPERTIES"]["FB_LB_FORM"]["VALUE"] > 0)
                                                                                        $form_id = $arItem["PROPERTIES"]["FB_LB_FORM"]["VALUE"];
                                                                                }

                                                                                $arClass = array();
                                                                                $arClass=array(
                                                                                    "XML_ID"=> $arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"],
                                                                                    "FORM_ID"=> $form_id,
                                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["FB_LB_MODAL"]["VALUE"],
                                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["FB_LB_BUTTON_QUIZ"]["VALUE"],
                                                                                    "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["FB_LB_CATALOG"]["VALUE"]
                                                                                );

                                                                                $arAttr=array();
                                                                                $arAttr=array(
                                                                                    "XML_ID"=> $arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"],
                                                                                    "FORM_ID"=> $form_id,
                                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["FB_LB_MODAL"]["VALUE"],
                                                                                    "LINK"=> $arItem["PROPERTIES"]["FB_LB_LINK"]["VALUE"],
                                                                                    "BLANK"=> $arItem["PROPERTIES"]["FB_LB_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                                    "HEADER"=> $block_name,
                                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["FB_LB_BUTTON_QUIZ"]["VALUE"],
                                                                                    "LAND_ID"=> $arItem["PROPERTIES"]["FB_LB_LAND"]["VALUE"],
                                                                                    "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["FB_LB_CATALOG"]["VALUE"]
                                                                                );
                                                                            ?>

                                                                            <a <?if(strlen($arItem["PROPERTIES"]["FB_LB_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["FB_LB_ONCLICK"]["VALUE"]."'";?> title="<?=$arItem["PROPERTIES"]["FB_LB_NAME"]["VALUE"]?>" class="button-def <?=$btn_view?> <?if($arItem["PROPERTIES"]["FB_LB_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_LB_VIEW"]["VALUE_XML_ID"] == "solid"):?> main-color <?elseif($arItem["PROPERTIES"]["FB_LB_VIEW"]["VALUE_XML_ID"] == "shine"):?> shine main-color <?else:?>secondary<?endif;?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr);?>>

                                                                                <?if($arItem["PROPERTIES"]["FB_LB_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                    <?
                                                                                        $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                        if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                            $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                    ?>

                                                                                    <span class="first">
                                                                                       <?=$arItem["PROPERTIES"]["FB_LB_NAME"]["~VALUE"]?>
                                                                                    </span>

                                                                                    <span class="second">
                                                                                        <?=$btn_name2?>
                                                                                    </span> 

                                                                                <?else:?>
                                                                                    <?=$arItem["PROPERTIES"]["FB_LB_NAME"]["~VALUE"]?>
                                                                                <?endif;?>
                                                                                    
                                                                            </a>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["FB_VIDEO_LINK"]["VALUE"]) > 0):?>
                      
                                                                <div class="<?if($arItem["TWO_COLS"] == "Y"):?>col-lg-6 col-md-6 col-sm-6 col-xs-12<?else:?><?if($arItem["BUTTONS_COUNT"] == 1):?> col-lg-12 col-md-12 col-sm-12 col-xs-12<?else:?> col-lg-4 col-md-4 col-sm-4 col-xs-12<?endif;?><?endif;?>">
                                                                    <div class="">

                                                                    <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem['PROPERTIES']['FB_VIDEO_LINK']['~VALUE'],$out);?>    
                                                                        
                                                                        <a class="link-video call-modal callvideo" data-call-modal="<?=$out[1]?>">
                                                                        
                                                                            <div class="video-cont">
                                                                                <div class="video">
                                                                                
                                                                                    <div class="play-button"></div>
                                                                                
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="video-name"><?=$arItem["PROPERTIES"]["FB_VIDEO_NAME"]["~VALUE"]?></div>
                                                                                                <div class="video-comm"><?=$arItem["PROPERTIES"]["FB_VIDEO_COMMENT"]["~VALUE"]?></div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                    
                                                                                </div> 
                                                                            </div>
                                                                        
                                                                        </a>
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"]) <= 0):?>
                                                                <?$arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"] = "form";?>
                                                            <?endif;?>
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["FB_RB_NAME"]["VALUE"]) > 0 && $arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"] != ""):?>
                                                            
                                                                <?if($arItem["BUTTONS_COUNT"] == 3 && $arItem["TWO_COLS"] == "Y"):?>
                                                                    <span class="clearfix"></span>
                                                                <?endif;?>
                                                            
                                                                <div class="<?if($arItem["TWO_COLS"] == "Y"):?>col-lg-6 col-md-6 col-sm-6 col-xs-12<?else:?><?if($arItem["BUTTONS_COUNT"] == 1):?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?else:?>col-lg-4 col-md-4 col-sm-4 col-xs-12<?endif;?><?endif;?>">
                                                                    <div class="">
                        
                                                                        <div class="button right">

                                                                            <?
                                                                                $form_id = "";

                                                                                if($arItem["PROPERTIES"]["FB_RB_FORM"]["VALUE"] > 0)
                                                                                    $form_id = $arItem["PROPERTIES"]["FB_RB_FORM"]["VALUE"];

                                                                                if($arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"] == "fast_order")
                                                                                {
                                                                                    $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                                                                                    if($arItem["PROPERTIES"]["FB_RB_FORM"]["VALUE"] > 0)
                                                                                        $form_id = $arItem["PROPERTIES"]["FB_RB_FORM"]["VALUE"];
                                                                                }

                                                                                $arClass = array();
                                                                                $arClass=array(
                                                                                    "XML_ID"=> $arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"],
                                                                                    "FORM_ID"=> $form_id,
                                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["FB_RB_MODAL"]["VALUE"],
                                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["FB_RB_BUTTON_QUIZ"]["VALUE"],
                                                                                    "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["FB_RB_CATALOG"]["VALUE"]
                                                                                );

                                                                                $arAttr=array();
                                                                                $arAttr=array(
                                                                                    "XML_ID"=> $arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"],
                                                                                    "FORM_ID"=> $form_id,
                                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["FB_RB_MODAL"]["VALUE"],
                                                                                    "LINK"=> $arItem["PROPERTIES"]["FB_RB_LINK"]["VALUE"],
                                                                                    "BLANK"=> $arItem["PROPERTIES"]["FB_RB_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                                    "HEADER"=> $block_name,
                                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["FB_RB_BUTTON_QUIZ"]["VALUE"],
                                                                                    "LAND_ID"=> $arItem["PROPERTIES"]["FB_RB_LAND"]["VALUE"],
                                                                                    "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["FB_RB_CATALOG"]["VALUE"]
                                                                                );
                                                                            ?>


                                                                            <a <?if(strlen($arItem["PROPERTIES"]["FB_RB_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["FB_RB_ONCLICK"]["VALUE"]."'";?> title ="<?=$arItem["PROPERTIES"]["FB_RB_NAME"]["VALUE"]?>" class="button-def <?=$btn_view?> <?if($arItem["PROPERTIES"]["FB_RB_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_RB_VIEW"]["VALUE_XML_ID"] == "solid"):?> main-color <?elseif($arItem["PROPERTIES"]["FB_RB_VIEW"]["VALUE_XML_ID"] == "shine"):?> shine main-color <?else:?> secondary <?endif;?> <?=CKraken::buttonEditClass ($arClass)?>" <?=CKraken::buttonEditAttr ($arAttr)?>>

                                                                                <?if($arItem["PROPERTIES"]["FB_RB_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                    <?
                                                                                        $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                        if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                            $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                    ?>

                                                                                    <span class="first">
                                                                                       <?=$arItem["PROPERTIES"]["FB_RB_NAME"]["~VALUE"]?>
                                                                                    </span>

                                                                                    <span class="second">
                                                                                        <?=$btn_name2?>
                                                                                    </span> 

                                                                                <?else:?>

                                                                                    <?=$arItem["PROPERTIES"]["FB_RB_NAME"]["~VALUE"]?>

                                                                                <?endif;?>

                                                                                    
                                                                            </a>

                                                                        </div>


                        
                                                                    </div>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                        </div>
                                                    
                                                    <?endif;?>
                                                
                                                </div>
                                            
                                            </div>
                                            
                                        </div>
                                        
                                        <?if($arItem["TWO_COLS"] == "Y"):?>
                                        
                                            <div class="first-block-cell image-part hidden-xs col-lg-5 col-md-5 col-sm-4 col-xs-12 <?if($arItem["PROPERTIES"]["FB_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["FB_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-pull-7 col-md-pull-7 col-sm-pull-8 col-xs-pull-0<?endif;?> <?=$arItem["PROPERTIES"]["FB_IMAGE_POSITION"]["VALUE_XML_ID"]?>">

                                                <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["FB_ADD_PICTURE"]["VALUE"], array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, 60);?>
                                                <img src="<?=$file["src"]?>" class="img-responsive center-block" />

                                                
                                            </div>

                                        <?elseif($arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] == "easy" && $arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y"):?>

                                            <div class="first-block-cell col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs">

                                               <div class="wrap-scroll-down hidden-xs">
                                                    <div class="down-scrollBig">
                                                        <i class="fa fa-chevron-down"></i>
                                                    </div>
                                                </div>
                                                
                                            </div>
        
                                        
                                        <?endif;?>
                                        
                                    </div>

                                </div>
                            </div>

                            <?if($arItem["PROPERTIES"]["FB_CLICK_DOWN"]["VALUE"] == "Y" && $arItem["PROPERTIES"]["FB_VIEW"]["VALUE_XML_ID"] != "easy"):?>
                                <div class="wrap-scroll-down hidden-xs">
                                    <div class="down-scroll">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                            <?endif;?>

                            <?if($arItem["PROPERTIES"]["FB_SLIDER_TIME"]["VALUE"] > 0 && $k == 0 && $countSlider > 1):?>
        
                                <script type="text/javascript">
                                    
                                    $(window).load(
                                        function()
                                        {
                                            $('.first-slider').slick('slickSetOption', 'autoplaySpeed', '<?=$arItem["PROPERTIES"]["FB_SLIDER_TIME"]["VALUE"]*1000?>');
                                            $('.first-slider').slick('slickPlay');
                                        }
                                    );
                                    
                                </script>
                            
                            

                            <?endif;?>

                        </div>

                    <?endforeach;?>

                <?endif;?>

            
            </div>

        </div>



   
<?}?>


<?function CreateHead($arItem, $show_menu, $min = false, $main_key){?>

    <?global $h1;?>


    <?if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]) > 0):?>

        <?$animate = '';?>
        <?$animate_set = '';?>

        <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>

            <?$animate = 'wow fadeInDown';?>
            <?$animate_set = 'data-wow-offset="250" data-wow-duration="0.5s" data-wow-delay="0.2s"';?>

        <?endif;?>

        <?
            if($arItem["PROPERTIES"]["MAIN_TITLE_POS"]["VALUE_XML_ID"] == "")
                $arItem["PROPERTIES"]["MAIN_TITLE_POS"]["VALUE_XML_ID"] = "def";
        ?>

        <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>

        	<style>

        		<?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>
                    @media (min-width: 992px){

                        <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0):?>
                        #block<?=$arItem["ID"]?> div.head h1, #block<?=$arItem["ID"]?> div.head h2{
                            <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"]?>px !important;<?endif;?>
                            <?
                                $line_height_tit = intval($arItem["PROPERTIES"]["TITLE_SIZE"]["VALUE"]) + 5;
                                if(strlen($arItem["PROPERTIES"]["TITLE_SIZE"]["DESCRIPTION"])>0)
                                    $line_height_tit = $arItem["PROPERTIES"]["TITLE_SIZE"]["DESCRIPTION"];
                            ?>

                            line-height: <?=$line_height_tit?>px !important;
                        }
                        <?endif;?>

                        <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>
                            #block<?=$arItem["ID"]?> div.head .descrip, #first_slider_<?=$arItem["ID"]?> div.head .subtitle{
                                <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"]?>px !important;<?endif;?>
                                <?
                                    $line_height_sub = intval($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["VALUE"]) + 3;
                                    if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE"]["DESCRIPTION"])>0)
                                        $line_height_sub = $arItem["PROPERTIES"]["SUBTITLE_SIZE"]["DESCRIPTION"];
                                ?>

                                line-height: <?=$line_height_sub?>px !important;
                            }
                        <?endif;?>
                    }

                <?endif;?>

                <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>
                    @media (max-width: 991px){
                    <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0):?>
                        #block<?=$arItem["ID"]?> div.head h1, #block<?=$arItem["ID"]?> div.head h2{
                            <?if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"]?>px !important;<?endif;?>
                            <?
                                $line_height_tit_mob = intval($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["VALUE"]) + 5;
                                if(strlen($arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["DESCRIPTION"])>0)
                                    $line_height_tit_mob = $arItem["PROPERTIES"]["TITLE_SIZE_MOB"]["DESCRIPTION"];
                            ?>

                            line-height: <?=$line_height_tit_mob?>px !important;
                        }
                    <?endif;?>
                    <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>
                        #block<?=$arItem["ID"]?> div.head .descrip, #first_slider_<?=$arItem["ID"]?> div.head .subtitle{
                            <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"])>0):?>font-size: <?=$arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"]?>px !important;<?endif;?>
                            <?
                                $line_height_sub_mob = intval($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["VALUE"]) + 3;
                                if(strlen($arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["DESCRIPTION"])>0)
                                    $line_height_sub_mob = $arItem["PROPERTIES"]["SUBTITLE_SIZE_MOB"]["DESCRIPTION"];
                            ?>

                            line-height: <?=$line_height_sub_mob?>px !important;
                        }
                    <?endif;?>
                    }

                <?endif;?>
            </style>

        <?endif;?>



        <div class="head <?if($min):?>min<?endif;?> <?=$animate;?> <?=$arItem["PROPERTIES"]["MAIN_TITLE_POS"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["TITLE_SHADOW"]["VALUE_XML_ID"]?>  <?=$arItem["PROPERTIES"]["SUBTITLE_SHADOW"]["VALUE_XML_ID"]?>" <?=$animate_set;?>>

            <?if(!$show_menu):?>
        
                <?if(!$min):?>
                    <div class="container">
                <?endif;?>

            <?endif;?>
            
           
            
            <?if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0):?>
            
                <?$tit = Array();?>
                <?$title = Array();?>
            
                <?
                if(substr_count($arItem["PROPERTIES"]["HEADER"]["VALUE"], "{") > 0 && substr_count($arItem["PROPERTIES"]["HEADER"]["VALUE"], "}") > 0)
                {
                    $tit = explode("{", $arItem["PROPERTIES"]["HEADER"]["VALUE"]);
                    $title[] = $tit[0];
                    $tit = $tit[1];
                    
                    
                    $tit = explode("}", $tit);
                    $title[] = $tit[1];
                    $tit = $tit[0];
                    
                    
                    $tit = explode("|", $tit);
                    
                }
                ?>
                <?$h1_close = 0;?>
                
                <?if($arItem["PROPERTIES"]["THIS_H1"]["VALUE"] == "Y" && $h1 == 0):?>
                    <h1 class="main1 <?=$arItem["PROPERTIES"]["HEADER_COLOR"]["VALUE_XML_ID"]?>" <?if(strlen($arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"])>0):?> style="color: <?=$arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"]?>;"<?endif;?>>
                    <?$h1 = 1?>
                    <?$h1_close = 1;?>
                <?else:?>
                    <h2 class="main1 <?=$arItem["PROPERTIES"]["HEADER_COLOR"]["VALUE_XML_ID"]?>" <?if(strlen($arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"])>0):?> style="color: <?=$arItem["PROPERTIES"]["TITLE_COLOR"]["VALUE"]?>;"<?endif;?>>
                <?endif;?>
                    
                    <?if(!empty($tit)):?>
                        <?=htmlspecialcharsBack($title[0])?><span class="typed"></span><?=htmlspecialcharsBack($title[1])?>
                    <?else:?>
                        <?=$arItem["PROPERTIES"]["HEADER"]["~VALUE"]?>
                    <?endif;?>
            
                
                <?if($arItem["PROPERTIES"]["THIS_H1"]["VALUE"] == "Y" && $h1_close == 1):?>
                    </h1>
                <?else:?>
                    </h2>
                <?endif;?>
                
                
                <?if(!empty($tit)):?>
                
                    <?if($main_key == 0):?>
                    
                        <script>
                            $(document).ready(function(){
                                                             
                                $("div#block<?=$arItem["ID"]?> .main1 span.typed").typed({
                                    strings: ["<?=implode('","', $tit)?>"],
                                    typeSpeed: 50,
                                    startDelay: 2000,
                                    backDelay: 2000,
                                });

                            });
                        </script>
                    
                    <?else:?>
                    
                        <script>
                            $(document).ready(function(){
                                                             
                                $(window).scroll(
                                    function()
                                    {
                                        
                                        if($(document).scrollTop() + $(window).height() > $("div#block<?=$arItem["ID"]?>").offset().top + 200)
                                        {
                                            $("div#block<?=$arItem["ID"]?> .main1 span.typed").typed({
                                                strings: ["<?=implode('","', $tit)?>"],
                                                typeSpeed: 50,
                                                startDelay: 2000,
                                                backDelay: 2000,
                                            });
                                        }
                                        
                                    }
                                );

                            });
                        </script>
                    
                    <?endif;?>
                
                <?endif;?>
                
            <?endif;?>
    
            <?if(strlen($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]) > 0):?>
                
                <?$tit = Array();?>
                <?$title = Array();?>
            
                <?
                if(substr_count($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"], "{") > 0 && substr_count($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"], "}") > 0)
                {
                    $tit = explode("{", $arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]);
                    $title[] = $tit[0];
                    $tit = $tit[1];
                    
                    
                    $tit = explode("}", $tit);
                    $title[] = $tit[1];
                    $tit = $tit[0];
                    
                    
                    $tit = explode("|", $tit);
                    
                }
                ?>
            
            
                <div class="descrip <?=$arItem["PROPERTIES"]["HEADER_COLOR"]["VALUE_XML_ID"]?>" <?if(strlen($arItem["PROPERTIES"]["SUBTITLE_COLOR"]["VALUE"])>0):?> style="color: <?=$arItem["PROPERTIES"]["SUBTITLE_COLOR"]["VALUE"]?>;"<?endif;?>>
                
                    <?if(!empty($tit)):?>
                        <?=htmlspecialcharsBack($title[0])?><span class="typed"></span><?=htmlspecialcharsBack($title[1])?>
                    <?else:?>
                        <?=$arItem["PROPERTIES"]["SUBHEADER"]["~VALUE"]?>
                    <?endif;?>
                
                </div>
                
                <?if(!empty($tit)):?>
                
                    <?if($main_key == 0):?>
                    
                        <script>
                            $(document).ready(function(){
                                                             
                                $("div#block<?=$arItem["ID"]?> div.descrip span.typed").typed({
                                    strings: ["<?=implode('","', $tit)?>"],
                                    typeSpeed: 50,
                                    startDelay: 2000,
                                    backDelay: 2000,
                                });

                            });
                        </script>
                    
                    <?else:?>
                    
                        <script>
                            $(document).ready(function(){
                                                             
                                $(window).scroll(
                                    function()
                                    {
                                        
                                        if($(document).scrollTop() + $(window).height() > $("div#block<?=$arItem["ID"]?>").offset().top + 200)
                                        {
                                            $("div#block<?=$arItem["ID"]?> div.descrip span.typed").typed({
                                                strings: ["<?=implode('","', $tit)?>"],
                                                typeSpeed: 50,
                                                startDelay: 2000,
                                                backDelay: 2000,
                                            });
                                        }
                                        
                                    }
                                );

                            });
                        </script>
                    
                    <?endif;?>
                
                <?endif;?>
                
                
            <?endif;?>
                
           

            <?if(!$show_menu):?>
            
                <?if(!$min):?>
                    </div>
                <?endif;?>

            <?endif;?>
            
        </div>

    <?endif;?>
         
<?}?>



<?function CreateButton($arItem, $show_menu, $center = true){?>

    <?global $btn_view;?>
    <?global $KRAKEN_TEMPLATE_ARRAY;?>


    <div class="clearfix"></div>
    
    <?if(strlen($arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"]) <= 0):?>
        <?$arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"] = "form";?>
    <?endif;?>

    <?if(strlen($arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"]) <= 0):?>
        <?$arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"] = "form";?>
    <?endif;?>
    
    <?if(strlen($arItem["PROPERTIES"]["BUTTON_NAME"]["VALUE"]) > 0 && strlen($arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"]) > 0 || strlen($arItem["PROPERTIES"]["BUTTON_NAME_2"]["VALUE"]) > 0 && strlen($arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"]) > 0):?>

        <?
            $block_name = $arItem['~NAME'];

            if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0)
                $block_name .= " (".$arItem["PROPERTIES"]["HEADER"]["~VALUE"].")";

            $block_name = htmlspecialcharsEx(strip_tags(html_entity_decode($block_name)));

            $class_button = "";
            $class_button2 = "";



            if(strlen($arItem["PROPERTIES"]["BUTTON_NAME"]["VALUE"]) > 0 && strlen($arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"]) > 0)
                $class_button = "left-on";
            
            if(strlen($arItem["PROPERTIES"]["BUTTON_NAME_2"]["VALUE"]) > 0 && strlen($arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"]) > 0)
                $class_button2 = "right-on";
            
        ?>
    
        <div class="main-button-wrap <?if(!$show_menu):?><?if($center):?>center<?endif;?><?endif;?> <?=$class_button?> <?=$class_button2?>">

            <?if(strlen($class_button) > 0):?>

                <?
                    if($arItem["PROPERTIES"]["BUTTON_FORM"]["VALUE"] > 0)
                        $form_id = $arItem["PROPERTIES"]["BUTTON_FORM"]["VALUE"];

                    if($arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"] == "fast_order")
                    {
                        $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                        if($arItem["PROPERTIES"]["BUTTON_FORM"]["VALUE"] > 0)
                            $form_id = $arItem["PROPERTIES"]["BUTTON_FORM"]["VALUE"];
                    }

                    $arClass = array();
                    $arClass=array(
                        "XML_ID"=> $arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"],
                        "FORM_ID"=> $form_id,
                        "MODAL_ID"=> $arItem["PROPERTIES"]["BUTTON_MODAL"]["VALUE"],
                        "QUIZ_ID"=> $arItem["PROPERTIES"]["BUTTON_QUIZ"]["VALUE"],
                        "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BUTTON_CATALOG"]["VALUE"]
                    );
                    
                    $arAttr=array();
                    $arAttr=array(
                        "XML_ID"=> $arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"],
                        "FORM_ID"=> $form_id,
                        "MODAL_ID"=> $arItem["PROPERTIES"]["BUTTON_MODAL"]["VALUE"],
                        "LINK"=> $arItem["PROPERTIES"]["BUTTON_LINK"]["VALUE"],
                        "BLANK"=> $arItem["PROPERTIES"]["BUTTON_BLANK"]["VALUE_XML_ID"],
                        "HEADER"=> $block_name,
                        "QUIZ_ID"=> $arItem["PROPERTIES"]["BUTTON_QUIZ"]["VALUE"],
                        "LAND_ID"=> $arItem["PROPERTIES"]["BUTTON_LAND"]["VALUE"],
                        "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BUTTON_CATALOG"]["VALUE"]
                    );
                ?>

                <a <?if(strlen($arItem["PROPERTIES"]["BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BUTTON_ONCLICK"]["VALUE"]."'";?> class="big button-def left <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?> <?if($arItem["PROPERTIES"]["BUTTON_VIEW"]["VALUE_XML_ID"] == "empty"):?> secondary <?elseif($arItem["PROPERTIES"]["BUTTON_VIEW"]["VALUE_XML_ID"] == "shine"):?> shine main-color <?else:?> main-color <?endif;?>" <?=CKraken::buttonEditAttr($arAttr)?>>

                    <?if($arItem["PROPERTIES"]["BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>
                    <?
                    
                        $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                        if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                            $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                    ?>

                    <span class="first">
                       <?=$arItem["PROPERTIES"]["BUTTON_NAME"]["~VALUE"]?>
                    </span>

                    <span class="second">
                        <?=$btn_name2?>
                    </span> 

                <?else:?>

                    <?=$arItem["PROPERTIES"]["BUTTON_NAME"]["~VALUE"]?>

                <?endif;?>
                        

                </a>

            <?endif;?>

            <?if(strlen($class_button2) > 0):?>

                <?
                    if($arItem["PROPERTIES"]["BUTTON_FORM_2"]["VALUE"] > 0)
                        $form_id = $arItem["PROPERTIES"]["BUTTON_FORM_2"]["VALUE"];

                    if($arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"] == "fast_order")
                    {
                        $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                        if($arItem["PROPERTIES"]["BUTTON_FORM_2"]["VALUE"] > 0)
                            $form_id = $arItem["PROPERTIES"]["BUTTON_FORM_2"]["VALUE"];
                    }

                    $arClass = array();
                    $arClass=array(
                        "XML_ID"=> $arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"],
                        "FORM_ID"=> $form_id,
                        "MODAL_ID"=> $arItem["PROPERTIES"]["BUTTON_MODAL_2"]["VALUE"],
                        "QUIZ_ID"=> $arItem["PROPERTIES"]["BUTTON_QUIZ_2"]["VALUE"],
                        "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BUTTON_2_CATALOG"]["VALUE"]
                    );
                    
                    $arAttr=array();
                    $arAttr=array(
                        "XML_ID"=> $arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"],
                        "FORM_ID"=> $form_id,
                        "MODAL_ID"=> $arItem["PROPERTIES"]["BUTTON_MODAL_2"]["VALUE"],
                        "LINK"=> $arItem["PROPERTIES"]["BUTTON_LINK_2"]["VALUE"],
                        "BLANK"=> $arItem["PROPERTIES"]["BUTTON_BLANK_2"]["VALUE_XML_ID"],
                        "HEADER"=> $block_name,
                        "QUIZ_ID"=> $arItem["PROPERTIES"]["BUTTON_QUIZ_2"]["VALUE"],
                        "LAND_ID"=> $arItem["PROPERTIES"]["BUTTON_LAND_2"]["VALUE"],
                        "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BUTTON_2_CATALOG"]["VALUE"]
                    );
                ?>

                <a <?if(strlen($arItem["PROPERTIES"]["BUTTON_2_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BUTTON_2_ONCLICK"]["VALUE"]."'";?> class="big button-def right <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?> <?if($arItem["PROPERTIES"]["BUTTON_VIEW_2"]["VALUE_XML_ID"] == "empty"):?> secondary <?elseif($arItem["PROPERTIES"]["BUTTON_VIEW_2"]["VALUE_XML_ID"] == "shine"):?> shine main-color <?else:?> main-color <?endif;?>" <?=CKraken::buttonEditAttr($arAttr)?>>

                    <?if($arItem["PROPERTIES"]["BUTTON_TYPE_2"]["VALUE_XML_ID"] == "add_to_cart"):?>

                        <?
                        
                            $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                            if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                        ?>

                        <span class="first">
                           <?=$arItem["PROPERTIES"]["BUTTON_NAME_2"]["~VALUE"]?>
                        </span>

                        <span class="second">
                            <?=$btn_name2?>
                        </span> 

                    <?else:?>

                        <?=$arItem["PROPERTIES"]["BUTTON_NAME_2"]["~VALUE"]?>

                    <?endif;?>
                        
                </a>

            <?endif;?>


            
        </div>
        
    <?endif;?>
         
<?}?>


<?function CreateElement($arItem, $arSection, $show_menu, $key){?>


    <?
    
        $main_key = $key;

        global $KRAKEN_TEMPLATE_ARRAY;
        global $admin_active;
        global $btn_view;
        global $KRAKEN_MENU;
        global $show_setting;
        
        global $components;

        $block_name = $arItem['~NAME'];

        if(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0)
            $block_name .= " (".$arItem["PROPERTIES"]["HEADER"]["~VALUE"].")";

        $block_name = htmlspecialcharsEx(strip_tags(html_entity_decode($block_name)));


        

        $bg_on = '';

        $style = "";
        $style2 = "";

        $class ="";

        

        if($KRAKEN_MENU == 0)
            $KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]["VALUE"] = 1;


    
        if(strlen($arItem["PREVIEW_PICTURE"]["SRC"]) > 0)
        {
            $style .= "background-image: url('".$arItem["PREVIEW_PICTURE"]["SRC"]."');";
            $bg_on = 'bg-on';
        }

        if(strlen($arItem["PROPERTIES"]["BACKGROUND_COLOR"]["VALUE"]) > 0)
        {
            $style .= "background-color: ".$arItem["PROPERTIES"]["BACKGROUND_COLOR"]["VALUE"].";";
            $bg_on = 'bg-on';
        }
        if(strlen($arItem["PROPERTIES"]["SHADOW"]["VALUE_XML_ID"])>0)
            $bg_on = 'bg-on';
        
            
        if($arItem["PROPERTIES"]["PARALLAX"]["VALUE_XML_ID"] == "100")
            $style .= "background-attachment: fixed;";
    
        
        if(strlen($arItem["PROPERTIES"]["MARGIN_TOP"]["VALUE"]) > 0)
            $style .= "margin-top: ".$arItem["PROPERTIES"]["MARGIN_TOP"]["VALUE"]."px;";

    
        if(strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM"]["VALUE"]) > 0)
            $style .= "margin-bottom: ".$arItem["PROPERTIES"]["MARGIN_BOTTOM"]["VALUE"]."px;";

        
        if(strlen($arItem["PROPERTIES"]["PADDING_TOP"]["VALUE"]) > 0)
        {
            if(!$arItem["PADDING_CHANGE"])
                $style .= "padding-top: ".$arItem["PROPERTIES"]["PADDING_TOP"]["VALUE"]."px;";
            else
                $style2 .= "padding-top: ".$arItem["PROPERTIES"]["PADDING_TOP"]["VALUE"]."px;";
            
        }
        
    
        if(strlen($arItem["PROPERTIES"]["PADDING_BOTTOM"]["VALUE"]) > 0){
            
            if(!$arItem["PADDING_CHANGE"])
                $style .= "padding-bottom: ".$arItem["PROPERTIES"]["PADDING_BOTTOM"]["VALUE"]."px;";
            else
                $style2 .= "padding-bottom: ".$arItem["PROPERTIES"]["PADDING_BOTTOM"]["VALUE"]."px;";
            
        }


        if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y" && ($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "text"))
            $class = "cham-overflow";
        
   
    ?>

    <?if(strlen($arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"])>0 || strlen($arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"])>0):?>

        <style>
            @media (max-width: 991px){
                #block<?=$arItem["ID"]?>{
                    <?if(strlen($arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"])>0):?>margin-top: <?=$arItem["PROPERTIES"]["MARGIN_TOP_MOB"]["VALUE"]?>px !important;<?endif;?>
                    <?if(strlen($arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"])>0):?>margin-bottom: <?=$arItem["PROPERTIES"]["MARGIN_BOTTOM_MOB"]["VALUE"]?>px !important;<?endif;?>
                    <?if(strlen($arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"])>0):?>padding-top: <?=$arItem["PROPERTIES"]["PADDING_TOP_MOB"]["VALUE"]?>px !important;<?endif;?>
                    <?if(strlen($arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"])>0):?>padding-bottom: <?=$arItem["PROPERTIES"]["PADDING_BOTTOM_MOB"]["VALUE"]?>px !important;<?endif;?>
                }
            }
        </style>

    <?endif;?>
    
    
    <?if($arItem["PROPERTIES"]["COMPONENT_DESIGN"]["VALUE_XML_ID"] != "Y" && $arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "component"):?>
        
  
            #DYNAMIC<?=$components?>#
            <?$components++;?>
  
    
    <?else:?>

    
        <div id="block<?=$arItem["ID"]?>" class="<?if($key == 0):?>first-bigblock kraken-firsttype-<?=$KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]["VALUE"]?><?endif;?> block item-block <?if($show_menu):?> small <?=$bg_on?><?endif;?> <?=$class?><?if(!$arItem["PADDING_CHANGE"]):?> padding-on <?endif;?><?if(strlen($arItem["PROPERTIES"]["VIDEO_BACKGROUND"]["VALUE"]) > 0):?> video-bg<?endif;?> <?=$arItem["PROPERTIES"]["SHADOW"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["COVER"]["VALUE"]?> <?if($arItem["PROPERTIES"]["HIDE_BLOCK_LG"]["VALUE"] == "Y"):?>hidden-lg hidden-md<?endif;?> <?if($arItem["PROPERTIES"]["HIDE_BLOCK"]["VALUE"] == "Y"):?>hidden-sm hidden-xs<?endif;?>" style="<?=$style?>"<?if($arItem["PROPERTIES"]["PARALLAX"]["VALUE_XML_ID"] == "30"):?> data-enllax-ratio=".25"<?endif;?>>
            <?CKraken::admin_setting($arItem, true, $admin_active, $show_setting)?>
    
            
            <?if(strlen($arItem["PROPERTIES"]["VIDEO_BACKGROUND"]["VALUE"]) > 0):?>
    
                <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem['PROPERTIES']['VIDEO_BACKGROUND']['~VALUE'],$out);?>
    
                <div class="iframe-wrap">
                    <iframe class="video-bg" allowfullscreen="" frameborder="0" height="100%" src="https://www.youtube.com/embed/<?=$out[1]?>?rel=0&amp;mute=1&amp;controls=0&amp;loop=1&amp;showinfo=0&amp;autoplay=1&amp;playlist=<?=$out[1]?>" width="100%"></iframe>
                </div>
    
                
               
            <?endif;?>
        
            <div class="shadow"></div>
    
            
            <?if(!$KRAKEN_TEMPLATE_ARRAY["HEADER_BG"]):?>
                <?if($key == 0):?>
                    <div class="top-shadow"></div>
                <?endif;?>
            <?endif;?>
    
            
            <?if(is_array($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"]) && !empty($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"])):?>
                
                <?foreach($arItem["PROPERTIES"]["SLIDES"]["VALUE_XML_ID"] as $arSlID):?>
                    <div class="corner <?=$arSlID?> hidden-xs hidden-sm"></div>
                <?endforeach;?>
                    
            <?endif;?>
    
            
            
            <?if(!$arItem["TITLE_CHANGE"]):?>
                <?CreateHead($arItem, $show_menu, false, $main_key);?>
            <?endif;?>
            
            <div class="content <?if(($arItem["TITLE_CHANGE"]) || !(strlen($arItem["PROPERTIES"]["HEADER"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["SUBHEADER"]["VALUE"]) > 0)):?>no-margin<?endif;?>">
    
                    <div class="<?if(!$show_menu):?>container<?endif;?>">
                        <div class="<?if(!$show_menu):?>row<?endif;?>">
           
                    
                        <?//text?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "text"):?>
                            
                            <div class="descriptive">
                        
                                <div class="descriptive-table">
                                
                                    <div class="descriptive-cell text-part z-text <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] > 0):?>col-lg-7 col-md-7 col-sm-8 col-xs-12 <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-push-5 col-md-push-5 col-sm-push-4 col-xs-push-0 right<?else:?> left<?endif;?> <?else:?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>" style="<?=$style2?>">
                                    
                                        <div class="<?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] > 0):?><?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>wrap-padding-left<?else:?>wrap-padding-right<?endif;?><?endif;?>">
                
                                            <?if($arItem["TITLE_CHANGE"]):?>
                                                <?CreateHead($arItem, $show_menu, true, $main_key)?>
                                            <?endif;?>
                                            
                                            
                                            <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] <= 0 && !empty($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"])):?>
        
                                                <div class="descriptive-tabs-wrap">
                                                
                                                    <div class="images-wrap">
                                                        
                                                        <?foreach($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"] as $k=>$photo):?>
                                                        
                                                            <div class="image-content <?if($k == 0):?>active<?endif;?>">
                                                            
                                                                <div class="mob-tab visible-xs <?if($k == 0):?>active<?endif;?>">
                                                                    <?if(strlen($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]) > 0):?>
                                                                        <?=$arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]?>
                                                                    <?else:?>
                                                                        <?=$k+1?>
                                                                    <?endif;?>
                                                                    <div class="main-color"></div>
                                                                </div>
                
                
                                                                <div class="mob-content <?if($k == 0):?>active<?endif;?>">
                                                                
                                                                    <?$file = CFile::ResizeImageGet($photo, array('width'=>1200, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                    <img alt="<?=$arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]?>" class="img-responsive center-block" src="<?=$file["src"]?>" />
                                                                </div>
                                                            </div>
                                                            
                                                        <?endforeach;?>
                
                                                        
                                                    </div>
        
                                                <?if(count($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"]) > 1 || strlen($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][0]) > 0):?>
                                                
                                                    <ul class="tabs hidden-xs">
    
                                                        <?if(!empty($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"])):?>
                                                        
                                                        <?foreach($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"] as $k=>$photo):?>
                                                            <li class="<?if($k == 0):?>active<?endif;?>">
                                                            
                                                                <?if(strlen($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]) > 0):?>
                                                                    <?=$arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]?>
                                                                <?else:?>
                                                                    <?=$k+1?>
                                                                <?endif;?>
    
                                                            </li>
                                                        <?endforeach;?>
    
                                                        <?endif;?>
                        
                                                    </ul>
                                                
                                                <?endif;?>
                                                
                                            </div>
                                            
                                            <?endif;?>
                                            
         
                                            <?if(strlen($arItem["PREVIEW_TEXT"]) > 0):?>
                                                <div class="text-wrap text-content <?=$arItem["PROPERTIES"]["TEXT_BLOCK_COLOR"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] <= 0):?>center<?endif;?>">
                                                    <?=$arItem["PREVIEW_TEXT"]?>
                                                </div>
                                            <?endif;?>
                                            
                                            <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] > 0 && !empty($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"])):?>
        
                                                <div class="gallery <?if($arItem["PROPERTIES"]["TEXT_BLOCK_BORDER"]["VALUE"]):?>border-img-on<?endif;?>">
                                                    <div class="row clearfix">
                                                    
                                                        <?foreach($arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["VALUE"] as $k=>$photo):?>
                                                            
                                                            <?$file_small = CFile::ResizeImageGet($photo, array('width'=>200, 'height'=>140), BX_RESIZE_IMAGE_EXACT, false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]);?>
                                                            <?$file_big = CFile::ResizeImageGet($photo, array('width'=>1500, 'height'=>1500), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                            
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                            
                                                                <div class="img-wrap">
                                                                    <a data-gallery="a<?=$arItem["ID"]?>" class="cursor-loop" title="<?=$arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]?>" href="<?=$file_big["src"]?>">
                                                                        <img alt="<?=$arItem["PROPERTIES"]["TEXT_BLOCK_GALLERY"]["DESCRIPTION"][$k]?>" class="img-responsive" src="<?=$file_small["src"]?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            
                                                            <?if(($k+1)%4 == 0):?>
                                                                <span class="clearfix"></span>
                                                            <?endif;?>
                                                        
                                                        <?endforeach;?>
                                                    
                                                        
                                                    </div>
                                                </div>
                                            
                                            <?endif;?>
        
                                            <?if($arItem["BUTTON_CHANGE"]):?>
                                                <?=CreateButton($arItem, $show_menu, false)?>
                                            <?endif;?>
                                        
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"] > 0):?>
                                    
                                        <div class="descriptive-cell image-part z-image col-lg-5 col-md-5 col-sm-4 col-xs-12 <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-pull-7 col-md-pull-7 col-sm-pull-8 col-xs-pull-0<?endif;?> <?=$arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_POSITION"]["VALUE_XML_ID"]?>">
                                        
                                            <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE"]["VALUE"], array('width'=>800, 'height'=>1000), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                            <?$animate = '';?>
                                            <?$animate_set = '';?>
    
                                            <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>
    
                                                <?if($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_POSITION"]["VALUE_XML_ID"] == "middle"):?>
    
                                                    <?$animate = 'wow zoomIn';?>
    
                                                <?elseif($arItem["PROPERTIES"]["TEXT_BLOCK_PICTURE_POSITION"]["VALUE_XML_ID"] == "bottom"):?>
    
                                                    <?$animate = 'wow slideInUp';?>
    
                                                <?endif;?>
    
                                                <?$animate_set = 'data-wow-offset="250" data-wow-duration="1s" data-wow-delay="0.5s"';?>
    
                                            <?endif;?>
                                        
                                            <img alt="<?=$arItem['NAME']?>" class=" img-responsive center-block <?=$animate;?>" src="<?=$file["src"]?>" <?=$animate_set?>/>
                                        
                                        </div>
                                        
                                    <?endif;?>
    
                                </div>
                            </div>
                            
                        <?endif;?>
                        
                        <?//text end?>
    
                        <?//advantages?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "advantages"):?>
    
                            <?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == '') $arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] = 'big';?>
                            <?if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == '') $arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] = 'images';?>
                            <?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW"]["VALUE_XML_ID"] == '') $arItem["PROPERTIES"]["ADVANTAGES_VIEW"]["VALUE_XML_ID"] = 'flat';?>
    
                            <?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == '') $arItem["PROPERTIES"]["ADVANTAGES_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] = 'left';?>
    
    
    
                            <?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW"]["VALUE_XML_ID"] == "flat"):?>
    
    
                                <?$count = $arItem["PIC_MAX"];?>
    
                                <div class="advantages clearfix <?=$arItem["PROPERTIES"]["ADVANTAGES_VIEW"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?><?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?> image-on<?endif;?> <?=$arItem["PROPERTIES"]["ADVANTAGES_TEXT_COLOR"]["VALUE_XML_ID"]?>">
    
                                    <?if(!$show_menu):?>
                                    	
                                        <div class="advantages-table clearfix">
    
                                            <div class="advantages-cell clearfix text-part z-text <?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"] > 0):?>col-lg-7 col-md-7 col-sm-12 col-xs-12 <?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-push-5 col-md-push-5 col-sm-push-0 col-xs-push-0 right<?endif;?><?else:?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>" style="<?=$style2?>">
                                            
                                                <div class="<?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"] > 0):?><?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?> wrap-padding-left<?else:?> wrap-padding-right<?endif;?><?endif;?>">
                        
                                                    <?if($arItem["TITLE_CHANGE"]):?>
                                                        <?CreateHead($arItem, $show_menu, true, $main_key)?>
                                                        <div class="clearfix"></div>
                                                    <?endif;?>
    
                                                    <div class="part-wrap row clearfix">
    
                                                        <?if(strlen($count)>0):?>
                                                            <?$rest1 = 5 % 3;?>
                                                            <?$rest2 = 7 % 3;?>
                                                            <?$rowRest = -1;?>
    
                                                            <?$class = "col-lg-4 col-md-4 col-sm-6 col-xs-12";?>  
                                                            <?$class2 = "";?>
                                                            
    
                                                                <?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == "small"):?>
    
                                                                    <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?>
                                                                        <?$class = "col-lg-6 col-md-6 col-sm-6 col-xs-12";?>
                                                                    <?endif;?>
    
                                                                <?else:?>
    
                                                                    <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?>
                                                                        <?$class = "col-lg-6 col-md-6 col-sm-6 col-xs-12";?>
                                                                    <?else:?>
    
                                                                        <?if($count % 4 == 0):?>
                                                                        <?$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12 four-cols";?>
    
                                                                        <?elseif($count % 3 == $rest1):?>
                                                                            <?$class2 = "col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0";?>
                                                                            <?$rowRest = $count-2;?>
                                                                        <?elseif($count % 3 == $rest2):?>
                                                                            <?$class2 = "col-lg-offset-4 col-md-offset-4 col-sm-offset-0 col-xs-offset-0";?>
                                                                            <?$rowRest = $count-1;?>
                                                                        <?endif;?>
    
                                                                    <?endif;?>
                                                                <?endif;?>
    
                                                                <?for($i = 0; $i < $count; $i++):?>
    
                                                                    <div class="<?=$class?><?if($i == $rowRest):?> <?=$class2?><?endif;?>">
    
                                                                        <div class="element <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
                                                                            
    
                                                                            <?if($arItem["PIC_COUNT"] > 0 || $arItem["IC_COUNT"]):?>
                                                                        
                                                                                <div class="image-table">
                                                                                    <div class="image-cell">
    
                                                                                        <?if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "images"):?>
                                                                                    
                                                                                            <?if($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i] > 0):?>
    
    
                                                                                                <?if($arItem["TITLE_CHANGE"]):?>
    
                                                                                                    <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i], array('width'=>720, 'height'=>256), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                                                                                <?else:?>
    
                                                                                                    <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i], array('width'=>720, 'height'=>470), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                                                                                <?endif;?>
    
    
                                                                                                <img alt="" class="img-responsive" src="<?=$file["src"]?>"/>
    
    
                                                                                            <?endif;?>
    
                                                                                        <?elseif($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "icons"):?>
    
                                                                                            <i class="style-ic <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"][$i]?>" style="color: <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["~DESCRIPTION"][$i]?>"></i>
    
                                                                                        <?endif;?>
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                            
                                                                            <?endif;?>
    
    
                                                                            
                                                                            <?if($arItem["PIC_DESC_COUNT"] > 0 || $arItem["PIC_NAME_COUNT"] > 0):?>
    
                                                                                <div class="text-wrap <?if($arItem["PIC_COUNT"] > 0 || $arItem["IC_COUNT"]):?>icons-on<?endif;?>">
    
                                                                                    <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0 || $arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == "small"):?>
    
    
                                                                                        <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i]) > 0):?>
    
                                                                                            <div class="name main1">
                                                                                                <?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i]?>
                                                                                            </div>
    
                                                                                        <?endif;?>
    
    
                                                                                    <?else:?>
    
    
                                                                                        <?if($arItem["PIC_NAME_COUNT"] > 0):?>
    
                                                                                            <div class="name main1">
                                                                                                <?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i]?>
                                                                                            </div>
    
                                                                                        <?endif;?>
    
    
                                                                                    <?endif;?>
    
    
    
                                                                                    <?if($arItem["PIC_DESC_COUNT"] > 0):?>
                                                                                    
                                                                                        <div class="text">
                                                                                            <?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~VALUE"][$i]?>
                                                                                        </div>
    
                                                                                    <?endif;?>
    
                                                                                </div>
                                                                            
                                                                            <?endif;?>
    
                                                                        </div>
    
                                                                    </div>
    
                                                                    <?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == "small"):?>
    
                                                                        <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?>
                                                                            <?if(($i+1) % 2 == 0):?>
                                                                                <span class="clearfix"></span>
                                                                            <?endif;?>
                                                                            
                                                                        <?else:?>
                                                                            <?if(($i+1) % 2 == 0):?>
                                                                                <span class="clearfix visible-sm"></span>
                                                                            <?endif;?>
                                                                            <?if(($i+1) % 3 == 0):?>
                                                                                <span class="clearfix hidden-sm"></span>
                                                                            <?endif;?>
    
                                                                        <?endif;?>
    
                                                                    <?else:?>
    
                                                                        <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?>
    
                                                                            <?if(($i+1) % 2 == 0):?>
                                                                                <span class="clearfix"></span>
                                                                            <?endif;?>
    
                                                                        <?else:?>
                                                                            <?if($count % 4 == 0 && ($i+1) % 4 == 0):?>
                                                                                <span class="clearfix hidden-sm"></span>
                                                                            <?endif;?>
    
                                                                            <?if(($i+1) % 3 == 0 && ($count % 4 != 0 && ($i+1) % 4 != 0)):?>
                                                                                <span class="clearfix hidden-sm"></span>
                                                                            <?endif;?>
    
                                                                            <?if(($i+1) % 2 == 0):?>
                                                                                <span class="clearfix visible-sm"></span>
                                                                            <?endif;?>
    
                                                                        <?endif;?>  
    
                                                                    <?endif;?>
                                                                
                                                                <?endfor;?>
    
                                                            
    
                                                        <?endif;?>
    
                                                    </div>
    
    
    
                                                    <?if($arItem["BUTTON_CHANGE"]):?>
                                                        <?=CreateButton($arItem, $show_menu, false)?>
                                                    <?endif;?>
                                                </div>
    
                                                
                                            </div>
    
                                            <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"]) > 0):?>
                                            
                                                <div class="advantages-cell image-part z-image hidden-sm hidden-xs col-lg-5 col-md-5 col-sm-0 col-xs-12 <?if($arItem["PROPERTIES"]["ADVANTAGES_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-pull-7 col-md-pull-7 col-sm-pull-0 col-xs-pull-0<?endif;?> <?=$arItem["PROPERTIES"]["ADVANTAGES_IMAGE_POSITION"]["VALUE_XML_ID"]?>">
                                                
                                                    <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["ADVANTAGES_IMAGE"]["VALUE"], array('width'=>800, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                
                                                    <img alt="<?=$arItem["NAME"]?>" class="img-responsive center-block" src="<?=$file["src"]?>" />
                                                
                                                </div>
                                                
                                            <?endif;?>
    
                                        </div>
    
    
                                    <?else:?>
    
                                        <div class="row">
    
                                            <div class="<?if($arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == "small"):?>row<?endif;?>">
    
    
                                                <?
    
                                                    $class = '';
                                                    $class2 = 'col-lg-2 col-md-2 col-sm-2 col-xs-4';
                                                    $class3 = 'col-lg-10 col-md-10 col-sm-10 col-xs-8';
    
                                                    if($arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] == "small")
                                                    {
                                                        $class = 'col-lg-6 col-md-6 col-sm-12 col-xs-12';
                                                        $class2 = 'col-lg-2 col-md-2 col-sm-2 col-xs-2';
                                                        $class3 = 'col-lg-10 col-md-10 col-sm-10 col-xs-10';
                                                        
                                                    }
                                                    
                                                ?>
    
                                                <?for($i = 0; $i < $count; $i++):?>
    
                                                    <div class="<?=$class?>">
    
                                                        <?if($i !=0 && $arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"] != "small"):?><div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><div class="adv-line"></div></div><div class="clearfix"></div><?endif;?>
    
    
                                                        <div class="adv-table <?=$arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"]?>">
    
                                                            <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i])>0 || strlen($arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"][$i])>0):?>
    
                                                                <div class="adv-cell left <?=$class2?>">
    
    
                                                                    <?if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "icons"):?>
    
                                                                         <i class="style-ic <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"][$i]?>" style="color: <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["~DESCRIPTION"][$i]?>"></i>
                                                                    
                                                                    <?else:?>
                                                                        <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i], array('width'=>200, 'height'=>800), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                        <img src="<?=$img['src']?>" class="img-responsive center-block" alt="">
    
                                                                    <?endif;?>
                                                                </div>
    
                                                            <?endif;?>
    
                                                            <div class="adv-cell right <?=$class3?>">
                                                                <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i])>0):?>
                                                                    <div class="title bold"><?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i]?></div>
                                                                <?endif;?>
    
                                                                <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~VALUE"][$i])>0):?>
                                                                    <div class="desc"><?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~VALUE"][$i]?></div>
                                                                <?endif;?>
                                                                
                                                            </div>
    
    
                                                        </div>
                                                    </div>
    
                                                    <?if( ($i+1) % 2 == 0 ):?>
                                                        <span class="clearfix"></span>
                                                    <?endif;?>
    
                                                <?endfor;?>
    
                                            </div>
    
                                        </div>
    
                              
                                    <?endif;?>
    
                                    
    
                                </div><!-- ^advantages -->
    
                         
                           
    
                            <?elseif($arItem["PROPERTIES"]["ADVANTAGES_VIEW"]["VALUE_XML_ID"] == "slider"):?>
    
    
                                <div class="slider-advantages <?=$arItem["PROPERTIES"]["ADVANTAGES_VIEW_SIZE"]["VALUE_XML_ID"]?>-slide clearfix <?=$arItem["PROPERTIES"]["ADVANTAGES_TEXT_COLOR"]["VALUE_XML_ID"]?>">
    
                                    <?for($i = 0; $i < $arItem["PIC_MAX"]; $i++):?>
    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="div-table">
                                                   
    
                                                <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i])>0 || strlen($arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"][$i])>0):?>
                                                    <div class="div-cell left">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <?if($arItem["PROPERTIES"]["ADVANTAGES_TYPE_PICTURE"]["VALUE_XML_ID"] == "icons"):?>
    
                                                                         <i class="style-ic <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["VALUE"][$i]?>" style="color: <?=$arItem["PROPERTIES"]["ADVANTAGES_ICONS"]["~DESCRIPTION"][$i]?>"></i>
                                                                    
                                                                    <?else:?>
    
                                                                        <?$file = CFile::ResizeImageGet($arItem["PROPERTIES"]["ADVANTAGES_PICTURES"]["VALUE"][$i], array('width'=>1200, 'height'=>960), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                        <img src="<?=$file['src']?>" class="img-responsive center-block" alt="">
    
                                                                    <?endif;?>
    
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                <?endif;?>
    
                                                <div class="div-cell right">
    
                                                    <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i])>0):?>
                                                        <div class="title bold"><?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~DESCRIPTION"][$i]?></div>
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~VALUE"][$i])>0):?>
                                                        <div class="desc"><?=$arItem["PROPERTIES"]["ADVANTAGES_PICTURES_DESC"]["~VALUE"][$i]?></div>
                                                    <?endif;?>
    
                                                </div>
    
                                            </div>
    
                                        </div>
    
                                    <?endfor;?>
    
                           
                                </div>
    
    
                            <?endif;?>
                            
                        <?endif;?>
                        
                        <?//advantages end?>
                        
                        <?//form?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "form"):?>
    
                            <?if($arItem["PROPERTIES"]["FORM_TEXT_TITLE_COLOR"]["VALUE_XML_ID"] == ""):?>
                                <?$arItem["PROPERTIES"]["FORM_TEXT_TITLE_COLOR"]["VALUE_XML_ID"] = "dark";?>
                            <?endif;?>
    
                            <?if(strlen($arItem["PROPERTIES"]["FORM_BACKGROUND"]["VALUE"])>0):?>
                                <?$bg_form = CFile::ResizeImageGet($arItem["PROPERTIES"]["FORM_BACKGROUND"]["VALUE"], array('width'=>700, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
                            <?endif;?>
    
                            <?if($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"] > 0):?>         
                                <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"], array('width'=>900, 'height'=>1500), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false);?>
                            <?endif;?>
    
                            <?$timer_on = false;?>
    
                            <?if($arItem["PROPERTIES"]["FORM_TIMER_ON"]["~VALUE"] == 'Y'):?>
                                <?$timer_on = true;?>
                            <?endif;?>
                            
                            <?if($arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"] == ""):?>
                                <?$arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"] = "light";?>
                            <?endif;?>
    
                            <?if($arItem["PROPERTIES"]["FORM_TEXT_COLOR"]["VALUE_XML_ID"] == ""):?>
                                <?$arItem["PROPERTIES"]["FORM_TEXT_COLOR"]["VALUE_XML_ID"] = "dark";?>
                            <?endif;?>
    
                            <?if($arItem["PROPERTIES"]["FORM_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == ""):?>
                                <?$arItem["PROPERTIES"]["FORM_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] = "left";?>
                            <?endif;?>
                        
                            
                            
                            <div class="form-block <?/*if((strlen($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) > 0 || !empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])) && $arItem["PROPERTIES"]["FORM_IMAGE_POSITION"]["VALUE_XML_ID"] == "bottom"):?> un-margin-bottom<?endif;*/?>">
    
                                <div class="<?if(!$show_menu):?>container<?endif;?>">
                                
                                    <div class="form-table">
    
                                        <?if(strlen($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) > 0 || !empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])):?>
                                            
                                            <div class="form-cell image-part z-image left <?if($arItem["PROPERTIES"]["FORM_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "right"):?> hidden-lg hidden-md <?endif;?> hidden-sm hidden-xs <?=$arItem["PROPERTIES"]["FORM_IMAGE_POSITION"]["VALUE_XML_ID"]?>">
    
                                                <?if(strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) > 0 || (!empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])) ):?>
    
    
                                                    <div class="text-wrap left <?=$arItem["PROPERTIES"]["FORM_TEXT_TITLE_COLOR"]["VALUE_XML_ID"]?>">
                                                        <?if($arItem["PROPERTIES"]["FORM_UPLINE"]["VALUE"] == 'Y'):?><div class="line main-color"></div><?endif;?>
    
                                                        <?if(strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) > 0):?><div class="form-text-title bold"><?=$arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]?></div><?endif;?>
    
                                                        <?if(!empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])):?><div class="form-text-under-title italic"><?=$arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"]["TEXT"]?></div><?endif;?>
    
                                                    </div>
    
                                                <?endif;?>
                                                
                                                <?if($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"] > 0):?>
    
                                                    <img alt="<?=$arItem["NAME"]?>" class="img-responsive" src="<?=$img["src"]?>" />
                                                
                                                <?endif;?>
                                            
                                            </div>
                                         
                                            
                                        <?endif;?>
    
                                        <div class="form-cell text-part z-text" style="<?=$style2?>">
                                            <div class="">
    
    
                                                <form action="/" class="form send<?if($timer_on):?> timer_form<?endif;?> <?=$arItem["PROPERTIES"]["FORM_TEXT_COLOR"]["VALUE_XML_ID"]?>" enctype="multipart/form-data" method="post" role="form" style="background-image: url('<?=$bg_form["src"]?>'); background-color: <?=$arItem["PROPERTIES"]["FORM_BGC"]["VALUE"]?>;">
    
                                                    <input name="element" type="hidden" value="<?=$arItem["ID"]?>">
                                                    <input name="site_id" type="hidden" value="<?=SITE_ID?>">
                                                    <input name="url" type="hidden" value="">
                                                    <input name="form_name" type="hidden" value="<?=htmlspecialcharsEx($arItem["NAME"])?>">
                                                    <input name="header" type="hidden" value="<?=$block_name?>">
                                                    
                                                    <input type="hidden" name="form_admin" value="<?=$arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"]?>" />
    
    
                                                    <table class="wrap-act">
                                                        <tr>
                                                            <td>
    
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 questions active">
    
    
                                                                    <?if(strlen($arItem["PROPERTIES"]["FORM_TITLE"]["VALUE"]) > 0):?>
    
                                                                        <div class="title main1">
                                                                            <?=$arItem["PROPERTIES"]["FORM_TITLE"]["~VALUE"]?>
                                                                        </div>
    
                                                                    <?endif;?>
    
                                                                    <?if(strlen($arItem["PROPERTIES"]["FORM_SUBTITLE"]["VALUE"]) > 0):?>
    
                                                                        <div class="subtitle">
                                                                            <?=$arItem["PROPERTIES"]["FORM_SUBTITLE"]["~VALUE"]?>
                                                                        </div>
    
                                                                    <?endif;?>
    
                                                                    <?if($timer_on):?>
                                                                        <input type="hidden" class="timerVal" value="<?=$arItem["PROPERTIES"]["FORM_TIMER_SHOW"]["VALUE"]?>">
                                                                        <input type="hidden" class="forCookieTime" value="<?=$arItem["PROPERTIES"]["FORM_TIMER_HIDE"]["VALUE"]?>">
                                                                        <input type="hidden" class="idSect" value="<?=$arSection["ID"]?>">
                                                                       
    
                                                                        <div class="krakentimer">
    
                                                                        <div class="numbers bold">
                                                                            <div class="timer-part timer_left">
                                                                                <span class='t-top'>{hnn}</span>
                                                                                <span class='t-bot'>{hl}</span>
                                                                            </div>
                                                                            <div class="sep">:</div>
                                                                            <div class="timer-part timer_center">
                                                                                <span class='t-top'>{mnn}</span>
                                                                                <span class='t-bot'>{ml}</span>
                                                                            </div>
                                                                            <div class="sep">:</div>
                                                                            <div class="timer-part timer_right">
                                                                                <span class='t-top'>{snn}</span>
                                                                                <span class='t-bot'>{sl}</span>
                                                                            </div>
                                                                        </div>
                                                                    
    
                                                                        </div>
    
                                                                    <?endif;?>
    
    
                                                                    <div class="row">
                                                                        
                                                                        
                                                                        <?if($arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"] == "light" || $arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"] == ""):?>
                                                                    
    
                                                                            <?if($arItem["PROPERTIES"]["FORM_RADIOCHECK"]["VALUE_XML_ID"] == "radio" || $arItem["PROPERTIES"]["FORM_RADIOCHECK"]["VALUE_XML_ID"] == "check"):?>
            
                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
                                                                                    <?if(strlen($arItem["PROPERTIES"]["FORM_LIST_TITLE"]["VALUE"]) > 0):?>
    
                                                                                        <div class="name-tit bold">
                                                                                            <?=$arItem["PROPERTIES"]["FORM_LIST_TITLE"]["~VALUE"]?>
                                                                                        </div>
                    
                                                                                    <?endif;?>
            
                                                                                     <?if($arItem["PROPERTIES"]["FORM_RADIOCHECK"]["VALUE_XML_ID"] == "radio" && is_array($arItem["PROPERTIES"]["FORM_LIST"]["VALUE"]) && !empty($arItem["PROPERTIES"]["FORM_LIST"]["VALUE"])):?>
            
                                                                                            <ul class="form-radio">
            
                                                                                                <?foreach($arItem["PROPERTIES"]["FORM_LIST"]["~VALUE"] as $k=>$arElement):?>
            
                                                                                                    <li>
            
                                                                                                        <label>
            
                                                                                                            <input <?if($k == 0):?>checked <?endif;?> name='radiobutton<?=$arItem["ID"]?>' type="radio" value="<?=$arElement?>"><span></span><?=$arElement?>
            
                                                                                                        </label>
                                                                                                    </li>
            
                                                                                                <?endforeach;?>
            
                                                                                            </ul>
            
                                                                                     <?elseif ($arItem["PROPERTIES"]["FORM_RADIOCHECK"]["VALUE_XML_ID"] == "check" && is_array($arItem["PROPERTIES"]["FORM_LIST"]["VALUE"]) && !empty($arItem["PROPERTIES"]["FORM_LIST"]["VALUE"])):?>
            
                                                                                         <ul class="form-check">
            
                                                                                            <?foreach($arItem["PROPERTIES"]["FORM_LIST"]["~VALUE"] as $k => $arElement):?>
            
                                                                                                <li>
                                                                                                    <label>
                                                                                                        <input type="checkbox" name="checkbox<?=$arItem["ID"]?>[]" value="<?=$arElement?>">
                                                                                                        <span></span>                                                                          
                                                                                                        <span class="text"><?=$arElement?></span>
                                                                                                    </label>
                                                                                                </li>
            
                                                                                            <?endforeach;?>
                                                         
                                                                                        </ul>
    
                                                                                    <?endif;?>
            
                                                                                    
            
                                                                                </div>
            
                                                                            <?endif;?>
    
                                                                            <?if(is_array($arItem["PROPERTIES"]["FORM_INPUTS"]["VALUE_XML_ID"]) && !empty($arItem["PROPERTIES"]["FORM_INPUTS"]["VALUE_XML_ID"])):?>
    
                                                                             
            
                                                                                <?foreach($arItem["PROPERTIES"]["FORM_INPUTS"]["VALUE_XML_ID"] as $k=>$arInput):?>
            
                                                                                    <?if($arInput == "name"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input">
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_NAME')?></span>
                                                                                                <input class='focus-anim <?if(in_array("name", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>' name="name" type="text">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
                                                                                    <?if($arInput == "phone"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input">
    
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_PHONE')?></span>
            
                                                                                                <input class="phone focus-anim <?if(in_array("phone", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>" name="phone" type="text">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
                                                                                    <?if($arInput == "email"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input">
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_EMAIL')?></span>
                                                                                                <input class="focus-anim email <?if(in_array("email", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>" name="email" type="text">
                                                                                                
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
            
                                                                                    <?if($arInput == "count"):?>
            
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input count <?if(in_array("count", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>">
    
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_COUNT')?></span>
                                                                                                <input class='focus-anim <?if(in_array("count", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>' name="count" type="text"> <span class="plus"></span> <span class="minus"></span>
                                                                                            </div>
                                                                                        </div>
            
                                                                                    <?endif;?>
            
            
                                                                                    <?if($arInput == "date"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input date-wrap <?if(in_array("date", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>">
    
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_DATE')?></span>
    
                                                                                                <input class="date focus-anim <?if(in_array("date", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>" name="date" type="text">
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
                                                                                    <?if($arInput == "address"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input input-textarea">
    
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_ADDRESS')?></span>
                                                                                                <textarea class='focus-anim <?if(in_array("address", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>' name="address"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
                                                                                    <?if($arInput == "textarea"):?>
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="input input-textarea">
                                                                                                <div class="bg"></div>
                                                                                                <span class="desc"><?=GetMessage('KRAKEN_FORM_TEXTAREA')?></span>
                                                                                                <textarea class='focus-anim <?if(in_array("textarea", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>' name="text"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    <?endif;?>
            
                                                                                    
            
                                                                                    <?if($arInput == "file"):?>
            
                                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            <div class="load-file">
                                                                                                <label><span class="area-file"><?=GetMessage('KRAKEN_FORM_FILE')?></span> 
            
                                                                                                <input class="hidden <?if(in_array("file", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?>require<?endif;?>" name="userfile" type="file">
            
                                                                                                <?if(in_array("file", $arItem["PROPERTIES"]["FORM_INPUTS_REQ"]["VALUE_XML_ID"])):?><span class="star-req"></span><?endif;?>
            
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
            
                                                                                    <?endif;?>
            
                                                                                <?endforeach;?>
            
                                                                            <?endif;?>
                                                        
                                                                        <?elseif($arItem["PROPERTIES"]["FORM_ADMIN"]["VALUE_XML_ID"] == "professional"):?>
    
                                                                            <?if(!empty($arItem["PROPERTIES"]["FORM_PROP_INPUTS"]["VALUE"]) && is_array($arItem["PROPERTIES"]["FORM_PROP_INPUTS"]["VALUE"])):?>
                                                                        
                                                                                <?foreach($arItem["PROPERTIES"]["FORM_PROP_INPUTS"]["VALUE"] as $key=>$arValue):?>
                                                                                    
                                                                                    <?if(strlen($arValue) > 0):?>
                                                                                        
                                                                                        <?$type = $arItem["PROPERTIES"]["FORM_PROP_INPUTS"]["DESCRIPTION"][$key];?>
                                                                                        
                                                                                        <?$type = explode(";", ToLower($type));?>
    
                                                                                        <?if(!empty($type) && is_array($type)):?>
                                                                                        
                                                                                            <?foreach($type as $k=>$val):?>
                                                                                                <?$type[$k] = trim($val);?>
                                                                                            <?endforeach;?>
    
                                                                                        <?endif;?>
                                                                                        
                                                                                        
                                                                                        <?if($type[0] == "text"):?>
                                                                                            
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class='focus-anim <?if($type[1] == "y"):?>require<?endif;?>' name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text" />
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        
                                                                                        <?if($type[0] == "textarea"):?>
                                                                                            
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input input-textarea">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <textarea class='focus-anim <?if($type[1] == "y"):?>require<?endif;?>' name="input_<?=$arItem["ID"]?>_<?=$key?>"></textarea>
                                                                                                </div>
                                                                                            </div>
             
                                                                                        <?endif;?>
    
                                                                                        <?if($type[0] == "name"):?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class='focus-anim <?if($type[1] == "y"):?>require<?endif;?>' name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text" />
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        <?if($type[0] == "email"):?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class="focus-anim email <?if($type[1] == "y"):?>require<?endif;?>" name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text">
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        <?if($type[0] == "phone"):?>
                                                                                               
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class="phone focus-anim <?if($type[1] == "y"):?>require<?endif;?>" name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text">
                                                                                                </div>
                                                                                            </div>
                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        <?if($type[0] == "count"):?>
                                                                                                                                                     
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input count <?if($type[1] == "y"):?>require<?endif;?>">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class="focus-anim <?if($type[1] == "y"):?>require<?endif;?>" name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text"> <span class="plus"></span> <span class="minus"></span>
                                                                                                </div>
                                                                                            </div>
                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        <?if($type[0] == "date"):?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input date-wrap <?if($type[1] == "y"):?>require<?endif;?>">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class="date focus-anim <?if($type[1] == "y"):?>require<?endif;?>"  name="input_<?=$arItem["ID"]?>_<?=$key?>" type="text">
                                                                                                </div>
                                                                                            </div>
                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        <?if($type[0] == "password"):?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="input">
                                                                                                    <div class="bg"></div>
                                                                                                    <span class="desc"><?=$arValue?></span>
                                                                                                    <input class="focus-anim <?if($type[1] == "y"):?>require<?endif;?>" name="input_<?=$arItem["ID"]?>_<?=$key?>" type="password">
                                                                                                    
                                                                                                </div>
                                                                                            </div>
                                                                                            
                                                                                        <?endif;?>
                                                                                        
                                                                                        
                                                                                        <?if($type[0] == "file"):?>
                
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                                <div class="load-file">
                                                                                                    <label><span class="area-file"><?=$arValue?></span> 
                
                                                                                                    <input class="hidden <?if($type[1] == "y"):?>require<?endif;?>"  name="input_<?=$arItem["ID"]?>_<?=$key?>" type="file">
                
                                                                                                    <?if($type[1] == "y"):?><span class="star-req"></span><?endif;?>
                
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>
                
                                                                                        <?endif;?>
                                                                                        
                                                                                        
                                                                                        <?if($type[0] == "radio"):?>
                                                                                            
                                                                                            <?$list = explode(";", htmlspecialcharsBack($arValue));?>
                                                                                            
                                                                                            <?
                                                                                            $first = $list[0];
                                                                                            
                                                                                            if(substr_count($first, "<") > 0 && substr_count($first, ">") > 0)
                                                                                            {
                                                                                                $tit = str_replace(array("<", ">"), array("", ""), $first);
                                                                                                unset($list[0]);
                                                                                            }
                                                                                            
                                                                                            ?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            
                                                                                                <?if(strlen($tit) > 0):?>
                                                                                                    <div class="name-tit bold"><?=$tit?></div>
                                                                                                <?endif;?>
                
                                                                                                <ul class="form-radio">
                                                                                                
                                                                                                    <?$c = 0;?>
    
                                                                                                    <?if(!empty($list) && is_array($list)):?>
                
                                                                                                        <?foreach($list as $arElement):?>
                    
                                                                                                            <li>
                    
                                                                                                                <label>
                    
                                                                                                                    <input <?if($c == 0):?>checked <?endif;?> name='input_<?=$arItem["ID"]?>_<?=$key?>' type="radio" value="<?=$arElement?>"><span></span><?=$arElement?>
                    
                                                                                                                </label>
                                                                                                            </li>
                                                                                                            
                                                                                                            <?$c++;?>
                    
                                                                                                        <?endforeach;?>
    
                                                                                                    <?endif;?>
                
                                                                                                </ul>
    
                                                                                            </div>
                                                                                        
                                                                                        <?endif;?>
                                                                                        
                                                                                        
                                                                                        <?if($type[0] == "checkbox"):?>
                                                                                            
                                                                                            <?$list = explode(";", htmlspecialcharsBack($arValue));?>
                                                                                            
                                                                                            <?
                                                                                            $first = $list[0];
                                                                                            
                                                                                            if(substr_count($first, "<") > 0 && substr_count($first, ">") > 0)
                                                                                            {
                                                                                                $tit1 = str_replace(array("<", ">"), array("", ""), $first);
                                                                                                unset($list[0]);
                                                                                            }
                                                                                            
                                                                                            ?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                                            
                                                                                                <?if(strlen($tit1) > 0):?>
                                                                                                    <div class="name-tit bold"><?=$tit1?></div>
                                                                                                <?endif;?>
                
                                                                                                <ul class="form-check">
    
                                                                                                    <?if(!empty($list) && is_array($list)):?>
                                                                                                
                                                                                                        <?foreach($list as $arElement):?>
                    
                                                                                                            <li>
                    
                                                                                                                <label>
                    
                                                                                                                    <input name='input_<?=$arItem["ID"]?>_<?=$key?>[]' type="checkbox" value="<?=$arElement?>"><span></span><span class="text"><?=$arElement?></span>
                    
                                                                                                                </label>
                                                                                                            </li>
                                                                                                            
                                                                                                        <?endforeach;?>
    
                                                                                                    <?endif;?>
                
                                                                                                </ul>
    
                                                                                            </div>
                                                                                        
                                                                                        <?endif;?>
    
                                                                                        <?if($type[0] == "select"):?>
                                                                                            
                                                                                            <?$list = explode(";", htmlspecialcharsBack($arValue));?>
                                                                                            
                                                                                            <?
                                                                                            $first = $list[0];
                                                                                            
                                                                                            if(substr_count($first, "<") > 0 && substr_count($first, ">") > 0)
                                                                                            {
                                                                                                $tit2 = str_replace(array("<", ">"), array("", ""), $first);
                                                                                                unset($list[0]);
                                                                                            }
                                                                                            
                                                                                            ?>
                                                                                        
                                                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    
                                                                                                <?if(strlen($tit2) > 0):?>
                                                                                                    <div class="name-tit bold"><?=$tit2?></div>
                                                                                                <?endif;?>
    
                                                                                                <div class="input">
                                                                                            
                                                                                                    <div class="form-select">
                                                                                                        <div class="ar-down"></div>
                                                                                                        
                                                                                                        <div class="select-list-choose first"><span class="list-area"><?=GetMessage('KRAKEN_FORM_SELECT');?></span></div>
    
                                                                                                        <div class="select-list">
    
                                                                                                            <?if(!empty($list) && is_array($list)):?>
                                                                                                            <?foreach($list as $arElement):?>
                                                                                                                <label>
                                                                                                                    <span class="name">
                                                                                                                        
                                                                                                                        <input class="opinion" type="radio" name='input_<?=$arItem["ID"]?>_<?=$key?>' value="<?=$arElement?>">
                                                                                                                        <span class="text"><?=$arElement?></span>
                                                                                                                        
                                                                                                                    </span>
                                                                                                                </label>
                                                                                                            <?endforeach;?>
    
                                                                                                            <?endif;?>
                                                                                                        </div>
                                                                                                    </div>
    
                                                                                                </div>
                
                                                                                             
                                                                                            </div>
                                                                                        
                                                                                        <?endif;?>
    
                                                                                    <?endif;?>
                                                                                        
                                                                                    
                                                                                        
                                                                                <?endforeach;;?>
    
                                                                            <?endif;?>
                                                                        
                                                                                                                                            
                                                                        <?endif;?>
    
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="input-btn">
                                                                                <div class="load">
                                                                                    <div class="xLoader form-preload"><div class="audio-wave"><span></span><span></span><span></span><span></span><span></span></div></div>
                                                                                </div>
    
                                                                                <button class="button-def <?=$btn_view?> main-color big active" name="form-submit" type="submit" <?if(strlen($arItem["PROPERTIES"]["FORM_TO_LINK"]["VALUE"]) > 0):?> data-link='<?=$arItem["PROPERTIES"]["FORM_TO_LINK"]["VALUE"]?>'<?endif;?>><?if(strlen($arItem['PROPERTIES']['FORM_BUTTON']['VALUE']) > 0):?><?=$arItem['PROPERTIES']['FORM_BUTTON']['~VALUE']?><?else:?><?=GetMessage('KRAKEN_PAGE_GENERATOR_FORM_SUBMIT')?><?endif;?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
    
                                                                    <?if(!empty($KRAKEN_TEMPLATE_ARRAY['AGREEMENT_FORM'])):?>
    
                                                                        <div class="wrap-agree">
    
                                                                            <label>
                                                                                <input type="checkbox" class="agreecheck" name="checkboxAgree" value="agree" <?if($KRAKEN_TEMPLATE_ARRAY["POLITIC_CHECKED"]['VALUE'][0] == 'Y'):?> checked<?endif;?>>
                                                                                <span></span>   
                                                                            </label>   
    
                                                                            <div class="wrap-desc">                                                                    
                                                                                <span class="text"><?if(strlen($KRAKEN_TEMPLATE_ARRAY["POLITIC_DESC"]['VALUE'])>0):?><?=$KRAKEN_TEMPLATE_ARRAY["POLITIC_DESC"]['VALUE']?><?else:?><?=GetMessage('KRAKEN_FORM_AGREEMENT')?><?endif;?></span>
                                                                            
                                                                                <?$agrCount = count($KRAKEN_TEMPLATE_ARRAY['AGREEMENT_FORM']);?>
    
                                                                                <?if(!empty($KRAKEN_TEMPLATE_ARRAY['AGREEMENT_FORM']) && is_array($KRAKEN_TEMPLATE_ARRAY['AGREEMENT_FORM'])):?>
                                                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['AGREEMENT_FORM'] as $k => $arAgr):?>
    
                                                                                        <a class="call-modal callagreement" data-call-modal="agreement<?=$arAgr['ID']?>"><?if(strlen($arAgr['PROPERTIES']['CASE_TEXT']['VALUE'])>0):?><?=$arAgr['PROPERTIES']['CASE_TEXT']['VALUE']?><?else:?><?=$arAgr['NAME']?><?endif;?></a><?if($k+1 != $agrCount):?><span>, </span><?endif;?>
    
                                                                                        
                                                                                    <?endforeach;?>
    
                                                                                <?endif;?>
                                                                             
                                                                            </div>
    
                                                                        </div>
                                                                    <?endif;?>
                                                                </div>
                                
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 thank">
                                                                    <?if(!empty($arItem['PROPERTIES']['FORM_THANKS']['VALUE'])):?>
                                                                        <?=$arItem['PROPERTIES']['FORM_THANKS']['~VALUE']["TEXT"]?>
                                                                    <?else:?>
                                                                        <?=GetMessage('KRAKEN_THANK')?>
                                                                    <?endif;?>
                                                                </div>
    
                                                                <?if($timer_on):?>
    
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 timeout_text">
                                                                        <?if(!empty($arItem['PROPERTIES']['FORM_TIMER_TEXT']['VALUE'])):?>
                                                                            <?=$arItem['PROPERTIES']['FORM_TIMER_TEXT']['~VALUE']["TEXT"]?>
                                                                        <?else:?>
                                                                            <?=GetMessage('KRAKEN_TIMEOUT')?>
                                                                        <?endif;?>
                                                                    </div>
    
                                                                <?endif;?>
    
                                                               
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>
    
    
                                                    
                                                    <div class="clearfix"></div>
                                                </form>
    
                                            </div>
    
    
                                        </div>
    
                                        <?if(strlen($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) > 0 || !empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])):?>
    
                                            <div class="form-cell image-part z-image right <?if($arItem["PROPERTIES"]["FORM_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?> hidden-lg hidden-md <?endif;?> <?=$arItem["PROPERTIES"]["FORM_IMAGE_POSITION"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["FORM_IMAGE_HIDDEN_XS"]["VALUE_XML_ID"] == "Y"):?> hidden-xs<?endif;?>">
    
                                                <?if(strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]) || !empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])):?>
    
                                                    <div class="text-wrap <?=$arItem["PROPERTIES"]["FORM_TEXT_TITLE_COLOR"]["VALUE_XML_ID"]?>">
                                                        <?if($arItem["PROPERTIES"]["FORM_UPLINE"]["VALUE"] == 'Y'):?><div class="line main-color"></div><?endif;?>
    
                                                        <?if(strlen($arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"])> 0):?><div class="form-text-title bold"><?=$arItem["PROPERTIES"]["FORM_TEXT_TITLE"]["~VALUE"]?></div><?endif;?>
    
                                                        <?if(!empty($arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"])):?><div class="form-text-under-title italic"><?=$arItem["PROPERTIES"]["FORM_TEXT_UNDER_TITLE"]["~VALUE"]["TEXT"]?></div><?endif;?>
    
                                                    </div>
    
                                                <?endif;?>
                                                
                                                <?if($arItem["PROPERTIES"]["FORM_IMAGE"]["VALUE"] > 0):?>
                                                                                            
                                                    <img alt="<?=$arItem["NAME"]?>" class="img-responsive" src="<?=$img["src"]?>" />
                                                
                                                <?endif;?>
                                                
                                            </div>
    
                                            
                                            
                                        <?endif;?>
    
                                    </div>
    
    
                                </div><!-- ^col-lg-12 col-md-12 col-sm-12 col-xs-12 -->
    
    
                                <div class="clearfix"></div>
                                
                            </div>
                            
                        <?endif;?>
                        
                        <?//form end?>
                        
                        
                        <?//video?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "video"):?>
                            
                            <div class="video-block <?if(!$show_menu):?>col-lg-12 col-md-12 col-sm-12 col-xs-12 <?endif;?> clearfix">
    
                                <?if(count($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"]) <= 1):?>
                                
                                    <?if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"][0]) > 0):?>
    
                                        <?if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][0]) > 0)
                                            $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][0], array('width'=>800, 'height'=>480), BX_RESIZE_IMAGE_PROPORTIONAL, false);
                                        ?>
    
                                        <div class="video-content" style='background-image: url(<?=$img["src"]?>);'>
                                        
                                            <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"][0],$out);?>
    
                                            <?if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][0])<=0):?>
    
                                                <iframe allowfullscreen="" frameborder="0" height="100%" src="https://www.youtube.com/embed/<?=$out[1]?>?rel=0&amp;controls=1&amp;showinfo=0" width="100%"></iframe>
    
                                            <?else:?>
                                                <a class="call-modal callvideo big-play" data-call-modal="<?=$out[1]?>"></a>
                                            <?endif;?>
    
                                            
                                            
                                        </div>
    
                                        <?if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["DESCRIPTION"][0])>0):?>
                                            <div class="desc-one"><?=$arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["DESCRIPTION"][0]?></div>
                                        <?endif;?>
                                    
                                    <?endif;?>
                                    
                                    
    
                                <?else:?>
    
                                    <?
    
                                        $countVideo = count($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"]);
                                        $class="";
                                        $offsetClass = "";
    
                                        if(!$show_menu)
                                        {
                                            if($countVideo == 2)
                                            {
                                                $offsetClass = 'col-lg-offset-1 col-md-offset-0 col-sm-offset-0 col-xs-offset-0';
                                                $class="col-lg-5 col-md-6 col-sm-6 col-xs-12";
                                            }
    
    
                                            else
                                            {
    
                                                $arNeed = array(
                                                    "0.25" => array("OFFSET"=>"col-lg-offset-four col-md-offset-four col-sm-offset-one", "NUM" => 0), 
                                                    "0.5" => array("OFFSET"=>"col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0", "NUM" => 1), 
                                                    "0.75" =>  array("OFFSET"=>"col-lg-offset-one col-md-offset-one col-sm-offset-2", "NUM" => 2));
    
                                                $residual = $countVideo / 4;
    
                                                if($countVideo > 4)
                                                {
                                                    $residual = $residual - floor($residual);
                                                }
                                                $residual = strval($residual);
                                                $needKey = $countVideo - $arNeed[$residual]["NUM"];
    
                                                $class="col-lg-3 col-md-3 col-sm-3 col-xs-12";
    
                                            }
    
                                        }
    
                                        else
                                            $class="col-lg-6 col-md-6 col-sm-6 col-xs-12";
    
                                        
                                    ?>
    
    
    
                                    <?if(is_array($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"]) && !empty($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"])):?>
                                        <div class="row">
                                            <div class="video-gallery-wrap <?if($countVideo == 2):?>two-video<?endif;?> clearfix">
    
                                                 <?if(!empty($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"]) && is_array($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"])):?>
                                    
                                                    <?foreach($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["VALUE"] as $k=>$arVideo):?>
    
                                                        <?
                                                            if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][$k])>0)
                                                            {
                                                                if($countVideo == 2)
                                                                {
                                                                    $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][$k], array('width'=>460, 'height'=>230), BX_RESIZE_IMAGE_EXACT, false); 
                                                                }
                                                                else
                                                                {
                                                                    $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["VIDEO_BLOCK_PICTURES"]["VALUE"][$k], array('width'=>300, 'height'=>150), BX_RESIZE_IMAGE_EXACT, false); 
                                                                }
                                                                
                                                            }
    
                                                            else
                                                            {
                                                                $img["src"] = SITE_TEMPLATE_PATH."/images/video-pic.jpg";
                                                            }
                                                        ?>
    
                                                        
                                                        <div class="video-gallery <?=$class?><?if($k == 0):?> <?=$offsetClass?><?endif;?><?if(($k+1) == $needKey):?> <?=$arNeed[$residual]["OFFSET"]?><?endif;?>">
                                                            <div class="video-gallery-element">
    
                                                                <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/", $arVideo, $out);?>     
                                                                <table class="videoimage-wrap" style='background-image: url(<?=$img["src"]?>);'>
                                                                    <tr>
                                                                        <td>
                                                                            <a class="call-modal callvideo" data-call-modal="<?=$out[1]?>">
                                                                              
                                                                                <div class="play"></div>
                                                                            </a>
    
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                                        
    
    
                                                                <?if(strlen($arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["DESCRIPTION"][$k])>0):?>
                                                                    <div class="desc"><?=$arItem["PROPERTIES"]["VIDEO_BLOCK_CODE"]["DESCRIPTION"][$k]?></div>
                                                                <?endif;?>
                                                            </div>
    
                                                        </div>  
    
    
    
                                                        <?if(!$show_menu):?>
                                                            <?if(($k+1) % 4 == 0):?>
                                                                <div class="clearfix hidden-xs"></div>    
                                                            <?endif;?>
                                                            <?if(($k+1) % 2 == 0):?>
                                                                <div class="clearfix visible-xs"></div>    
                                                            <?endif;?>
                                                        <?else:?>
                                                            <?if(($k+1) % 2 == 0):?>
                                                                <div class="clearfix"></div>    
                                                            <?endif;?>
                                                        <?endif;?>
    
                                                    <?endforeach;?>
    
                                                <?endif;?>
    
                                            </div>
                                        </div>
    
    
    
                                    <?endif;?>
    
    
                                <?endif;?>
    
                                <?if(strlen($arItem["DETAIL_TEXT"]) > 0):?>
                                        
                                    <div class="text text-content <?=$arItem["PROPERTIES"]["VIDEO_BLOCK_COLOR"]["VALUE_XML_ID"]?>">
                                        <?=$arItem["~DETAIL_TEXT"]?>
                                    </div>
                                
                                <?endif;?>
                            
                            </div>
                            
                        <?endif;?>
                        
                        <?//video end?>
                        
                        
                        
                        <?//tariffs?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "tariff"):?>
    
                            
                            <?if($arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "" || $arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "flat"):?>
    
                                <?if($show_menu):?>
    
    
                                    <div class="tarif-2 <?=$arItem["PROPERTIES"]["TARIFF_TEXT_COLOR"]["VALUE_XML_ID"]?>">
    
                                        <div class="row clearfix">
    
                                            <div class="<?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>col-lg-8 col-md-8 col-sm-8 col-xs-12<?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left"):?> col-lg-push-4 col-md-push-4 col-sm-push-4 col-xs-push-0<?endif;?><?else:?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>">
    
                                                <div class="left-wrap-inner">
    
    
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_NAME"]["VALUE"]) > 0):?>
                                                        <div class="title main1">
                                                            <?=$arItem["PROPERTIES"]["TARIFF_NAME"]["~VALUE"]?> <?if($arItem["PROPERTIES"]["TARIFF_HIT"]["VALUE"] == "Y"):?><span class="hit"></span><?endif;?>
                                                        </div>
                                                    <?endif;?>
                    
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["VALUE"]) > 0):?>
                                                        <div class="subtitle italic">
                                                            <?=$arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["~VALUE"]?>
                                                        </div>
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                            
                                                    
                                                        <div class="row">
    
                                                            <div class="price-wrap">
                                                            
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                                    <div class="old-price"><?=$arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["~VALUE"]?></div>
                                                                <?endif;?>
                
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0):?>
                                                                    <div class="price main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICE"]["~VALUE"]?></div>
                                                                <?endif;?>
                                                                
                                                            </div>
    
                                                        </div>
                                                                
                                                            
                                                    <?endif;?>
    
    
                                                    <?if(empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
    
                                                        
    
                                                        <?if((strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                
                                                            <div class="buttons-wrap">
                                                            
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>
                          
                                                                    <div class="button-child">

                                                                        <?
                                                                            $arClass = array();
                                                                            $arClass=array(
                                                                                "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                            );
                                                                            
                                                                            $arAttr=array();
                                                                            $arAttr=array(
                                                                                "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                "LINK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                                "BLANK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                                "HEADER"=> $block_name,
                                                                                "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                                "LAND_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                            );
                                                                        ?>
    
                                                                        <a <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass ($arClass)?><?if(!$show_menu):?><?if($count <= 3):?> big<?else:?> medium<?endif;?><?else:?> medium<?endif;?>" <?=CKraken::buttonEditAttr($arAttr)?> title='<?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]?>' data-element-id="<?=$arItem["ID"]?>" data-element-type = "TRF">

                                                                           

                                                                            <?if($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>

                                                                            <?endif;?>

                                                                            

                                                                        </a>
                                                                    </div>
    
                                                                <?endif;?>
    
                                                           
    
                       
                                                                <?if(!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
    
                                                                    <div class="button-child">
                                                                        <a class="link-def btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff" data-element-id="<?=$arItem["ID"]?>"><i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=GetMessage("KRAKEN_MORE_DETAIL")?></span></a>
                                                                    </div>
                                                                
                                                                <?endif;?>
                                                                
                                                            </div>
                                                        
                                                        <?endif;?>  
    
                                                    <?endif;?>   
    
                                                </div>                           
                                                    
                                            </div>
    
                                            <?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>
    
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 <?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left" && $arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>col-lg-pull-8 col-md-pull-8 col-sm-pull-8 col-xs-pull-0<?endif;?>">
    
                                                    
                                                        <div class="tarif-img-wrap">
                                                            
                                                            <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"], array('width'=>300, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]); ?>
    
                                                            
                                                            <?if((!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
                                                                <a class="btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff" data-element-id="<?=$arItem["ID"]?>"></a>
                                                            <?endif;?>
                                                            
                                                            <img class="img-responsive center-block" src="<?=$img["src"]?>" alt='<?=$arItem["PROPERTIES"]["TARIFF_NAME"]["VALUE"]?>'/>

                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"])>0):?>
	
	                                                            <div class="name-wrap">
	                                                                <div class="image-descrip italic">
	                                                                    <?=$arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"]?>
	                                                                </div>
	                                                            </div>
                                                            <?endif;?>
    
                                                        </div>
                                                            
                                                    
    
                                                </div>
    
                                            <?endif;?>
    
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <?if(!empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                    
                                                    <div class="list-wrap">
                                                    
                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["VALUE"]) > 0):?>
                                                            <div class="name-list main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["~VALUE"]?></div>
                                                        <?endif;?>
                
                
                                                        <ul class="list-char">
    
                                                            <?if(!empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                                                            
                                                                <?foreach($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"] as $k=>$val):?>
                                                                    <li class="clearfix">
                                                                    
                                                                        <table class="mobile-break">
                                                                            <tr>
                                                                                <td class="left">
                                                                                    <div><?=$val?></div>
                                                                                </td>
                                                                                
                                                                                <td class="dotted">
                                                                                    <div></div>
                                                                                </td>
                                                                                
                                                                                <td class="right">
                                                                                    <div class="main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICES"]["~DESCRIPTION"][$k]?></div>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    
                                                                    </li>
                                                                <?endforeach;?>
    
                                                            <?endif;?>
    
                                                        </ul>
                                                    </div>
    
                                                    <div class="clearfix"></div>
    
                                                    <?if((strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                            
                                                        <div class="buttons-wrap">
                                                        
                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>

                                                                <?
                                                                   

                                                                    $arClass = array();
                                                                    $arClass=array(
                                                                        "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                        "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                        "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                        "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                    );
                                                                    
                                                                    $arAttr=array();
                                                                    $arAttr=array(
                                                                        "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                        "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                        "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                        "LINK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                        "BLANK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                        "HEADER"=> $block_name,
                                                                        "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                        "LAND_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                    );
                                                                ?>
                      
                                                                <div class="button-child">
    
                                                                    <a <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass($arClass)?><?if(!$show_menu):?><?if($count <= 3):?> big<?else:?> medium<?endif;?><?else:?> medium<?endif;?>" data-element-id="<?=$arItem["ID"]?>" data-element-type = "TRF" <?=CKraken::buttonEditAttr($arAttr)?> title='<?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]?>'>

                                                                        <?if($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                            <?
                                                                            
                                                                                $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                    $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                            ?>

                                                                            <span class="first">
                                                                               <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                            </span>

                                                                            <span class="second">
                                                                                <?=$btn_name2?>
                                                                            </span> 

                                                                        <?else:?>

                                                                            <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>

                                                                        <?endif;?>
                                                                            
                                                                    </a>
                                                                </div>
    
                                                               
    
                                                            <?endif;?>
    
                   
                                                            <?if(!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
    
                                                                <div class="button-child">
                                                                    <a class="link-def btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff"  data-element-id="<?=$arItem["ID"]?>"><i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=GetMessage("KRAKEN_MORE_DETAIL")?></span></a>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                        </div>
                                                    
                                                    <?endif;?> 
                                                
                                                <?endif;?>
                                            </div>
    
                                        </div>
    
    
                                        
                                    </div>
    
                                <?else:?>

                                    <?$class = "";?>
                                    <?$count = count($arItem["ELEMENTS"]);?>

                                    <?
                                    if($count <= 3)
                                    {
                                        $class = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                                        $col_lg = 3;
                                        $col_md = 3;
                                        $col_sm = 3;
                                    }
                                    else
                                    {
                                        $class = "col-lg-3 col-md-3 col-sm-6 col-xs-12 four-elements";
                                        $col_lg = 4;
                                        $col_md = 4;
                                        $col_sm = 2;
                                    }
                                    ?>
                                    
                                    
                                    <?$class2 = "";?>
                                    
                                    <?if($count == 1):?>
                                        <?$class2 = "col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-0";?>
                                    <?elseif($count == 2):?>
                                        <?$class2 = "col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0";?>
                                    <?endif;?>
                            
                                    <div class="tarif col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>"  <?if($arItem["PROPERTIES"]["TARIFF_ROUND_HEIGHT"]["VALUE"] == "Y"):?> data-round-height = "Y" data-col-lg="<?=$col_lg?>" data-col-md="<?=$col_md?>" data-col-sm="<?=$col_sm?>"<?endif;?>>
                                        
                                        
                                        <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>
                                        
                                            <?foreach($arItem["ELEMENTS"] as $k=>$arTariff):?>
    
                                                <div class="tarif-item <?=$class?> <?if($k==0):?><?=$class2?><?endif;?>">
    
                                                    <?CKraken::admin_setting($arTariff, false, $admin_active, $show_setting)?>
    
                                                    <div class="row">
                                                        
                                                        <div class="tarif-element <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>" >

                                                            <div class="tarif-element-inner">

                                                                <div class="trff-top-part">

                                                                    <?if($arTariff["PROPERTIES"]["TARIFF_HIT"]["VALUE"] == "Y"):?><div class="star"></div><?endif;?>
            
                                                                
                                                                    <?if(strlen($arTariff["PROPERTIES"]["TARIFF_NAME"]["VALUE"]) > 0):?>
                                                                        <div class="name main1">
                                                                            <?=$arTariff["PROPERTIES"]["TARIFF_NAME"]["~VALUE"]?>
                                                                        </div>
                                                                    <?endif;?>
            
                                                                    <?if($arTariff["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>
                                                                        
                                                                        <?$img = CFile::ResizeImageGet($arTariff["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"], array('width'=>300, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]); ?>
            
                                                                        
                                                                        <?if((!empty($arTariff["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
                                                                            <a class="btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff" data-element-id="<?=$arTariff["ID"]?>">
                                                                        <?endif;?>
                                                                        
                                                                        <img class="image" src="<?=$img["src"]?>" />
                                                                            
                                                                         <?if((!empty($arTariff["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
                                                                            </a>
                                                                        <?endif;?>
                                                                    
                                                                    <?endif;?>
                                                                    
                                                                    <?if(strlen($arTariff["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["VALUE"]) > 0):?>
                                                                        <div class="tarif-descript italic">
                                                                            <?=$arTariff["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["~VALUE"]?>
                                                                        </div>
                                                                    <?endif;?>

                                                            
                                                                
                                                                    <?if(!empty($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                                                    
                                                                        <ul>
                                                                            
                                                                            <?if(is_array($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) && !empty($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                                                                
                                                                                <?foreach($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["~VALUE"] as $val):?>
                                                                                    <li class="point-green"><?=$val?></li>
                                                                                <?endforeach;?>
                                                                                
                                                                            <?endif;?>
                                                                            
                                                                            <?if(is_array($arTariff["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["VALUE"]) && !empty($arTariff["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["VALUE"])):?>
                                                                                
                                                                                <?foreach($arTariff["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["~VALUE"] as $val):?>
                                                                                    <li><?=$val?></li>
                                                                                <?endforeach;?>
                                                                                
                                                                            <?endif;?>
                                                                            
                                                                        </ul>
                                                                    
                                                                    <?endif;?>
                                                                </div>

                                                                <div class="trff-bot-part">
                                                                    
                                                                    <?if((!empty($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])) && (strlen($arTariff["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0 || strlen($arTariff["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0)):?>
                                                                        <div class="line-grey"></div>
                                                                    <?endif;?>
                                                                    
                                                                    <?if(strlen($arTariff["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0 || strlen($arTariff["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                                        
                                                                        <div class="price-wrap">
                                                                            
                                                                            <?if(strlen($arTariff["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                                                <div class="old-price main2"><?=$arTariff["PROPERTIES"]["TARIFF_OLD_PRICE"]["~VALUE"]?></div>
                                                                            <?endif;?>
                    
                                                                            <?if(strlen($arTariff["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0):?>
                                                                                <div class="price main1"><?=$arTariff["PROPERTIES"]["TARIFF_PRICE"]["~VALUE"]?></div>
                                                                            <?endif;?>
                                                                            
                                                                        </div>
                                                                    
                                                                    <?endif;?>
                    
                                                                    
                                                                    <?if(strlen($arTariff["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"]) <= 0):?>
                                                                        <?$arTariff["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] = "form";?>
                                                                    <?endif;?>
                                                                    
                                                                    <?if((strlen($arTariff["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arTariff["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                                                                    
                                                                        <div class="bot-wrap">
                                                                            
                                                                            <?if(strlen($arTariff["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>

                                                                                <?
                                                                                    $arClass = array();
                                                                                    $arClass=array(
                                                                                        "XML_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                        "FORM_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                        "MODAL_ID"=> $arTariff["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                        "QUIZ_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                                    );
                                                                                    
                                                                                    $arAttr=array();
                                                                                    $arAttr=array(
                                                                                        "XML_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                        "FORM_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                        "MODAL_ID"=> $arTariff["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                        "LINK"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                                        "BLANK"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                                        "HEADER"=> $block_name,
                                                                                        "QUIZ_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                                        "LAND_ID"=> $arTariff["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                                    );
                                                                                ?>
                
                                                                            
                                                                                <div class="button-wrap">
                
                                                                                    <a <?if(strlen($arTariff["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arTariff["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass ($arClass)?><?if(!$show_menu):?><?if($count <= 3):?> big<?else:?> medium<?endif;?><?else:?> medium<?endif;?>" data-element-id="<?=$arTariff["ID"]?>" data-element-type = "TRF" <?=CKraken::buttonEditAttr($arAttr)?>>

                                                                                        <?if($arTariff["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                            <?
                                                                                            
                                                                                                $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                                    $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                            ?>

                                                                                            <span class="first">
                                                                                               <?=$arTariff["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                                            </span>

                                                                                            <span class="second">
                                                                                                <?=$btn_name2?>
                                                                                            </span> 

                                                                                        <?else:?>

                                                                                            <?=$arTariff["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>

                                                                                        <?endif;?>
                                                                                            
                                                                                    </a>
                                                                                </div>
                
                                                                          
                                                                            
                                                                            <?endif;?>
                                
                                                                            <?if(!empty($arTariff["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arTariff["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                                                                                <div class="link-wrap">
                                                                                    <a class="btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff"  data-element-id="<?=$arTariff["ID"]?>"><i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=GetMessage("KRAKEN_MORE_DETAIL")?></span></a>
                                                                                </div>
                                                                                
                                                                            <?endif;?>
                                                                        </div>
                                                                    
                                                                    <?endif;?>
                                                                </div>

                                                            </div>
                                                            
                                                        
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                
                                                <?
	                                                if($count <= 3)
	                                                {
	                                                    if(($k+1)%3 == 0)
	                                                        echo "<span class='clearfix visible-lg visible-md visible-sm'></span>";
	                                                }

	                                                else
	                                                {
	                                                    if(($k+1)%2 == 0)
	                                                        echo "<span class='clearfix visible-sm'></span>";
	                                                    if(($k+1)%4 == 0)
	                                                        echo "<span class='clearfix visible-lg visible-md'></span>";
	                                                }
	                                            ?>

	                                            <?
	                                                if($count > 3)
	                                                {
	                                                    if( ($k+1) % 4 == 0)
	                                                        $row++;
	                                            
	                                                }
	                                            ?>
                                                
                                            <?endforeach;?>
                                        
                                        <?endif;?>
                                        
                                    </div>
                                <?endif;?>
                                                
                            <?endif;?>
                            
                            
                            <?if($arItem["PROPERTIES"]["TARIFF_VIEW"]["VALUE_XML_ID"] == "full"):?>
    
                                <?if($show_menu):?>
    
                                    <div class="tarif-2 <?=$arItem["PROPERTIES"]["TARIFF_TEXT_COLOR"]["VALUE_XML_ID"]?>">
    
                                        <div class="row clearfix">
    
    
                                            <div class="<?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>col-lg-8 col-md-8 col-sm-8 col-xs-12<?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left"):?> col-lg-push-4 col-md-push-4 col-sm-push-4 col-xs-push-0<?endif;?><?else:?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>">
    
                                                <div class="left-wrap-inner">
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_NAME"]["VALUE"]) > 0):?>
                                                        <div class="title main1">
                                                            <?=$arItem["PROPERTIES"]["TARIFF_NAME"]["~VALUE"]?> <?if($arItem["PROPERTIES"]["TARIFF_HIT"]["VALUE"] == "Y"):?><span class="hit"></span><?endif;?>
                                                        </div>
                                                    <?endif;?>
                    
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["VALUE"]) > 0):?>
                                                        <div class="subtitle italic">
                                                            <?=$arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["~VALUE"]?>
                                                        </div>
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                            
                                                    
                                                        <div class="row">
    
                                                            <div class="price-wrap">
                                                            
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                                    <div class="old-price"><?=$arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["~VALUE"]?></div>
                                                                <?endif;?>
                
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0):?>
                                                                    <div class="price main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICE"]["~VALUE"]?></div>
                                                                <?endif;?>
                                                                
                                                            </div>
    
                                                        </div>
                                                                
                                                            
                                                    <?endif;?>
    
    
                                                    <?if(empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
    
                                                        <?if((strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                
                                                            <div class="buttons-wrap">
                                                            
                                                                <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>

                                                                    <?
                                                                        $arClass = array();
                                                                        $arClass=array(
                                                                            "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                            "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                            "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                            "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                        );
                                                                        
                                                                        $arAttr=array();
                                                                        $arAttr=array(
                                                                            "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                            "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                            "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                            "LINK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                            "BLANK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                            "HEADER"=> $block_name,
                                                                            "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                            "LAND_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                        );
                                                                    ?>
    
                                                                    
                          
                                                                    <div class="button-child">
    
                                                                        <a <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass ($arClass)?><?if(!$show_menu):?> big<?else:?> medium<?endif;?>" data-element-id="<?=$arItem["ID"]?>" data-element-type = "TRF" <?=CKraken::buttonEditAttr($arAttr)?> title='<?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]?>'>

                                                                            <?if($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>

                                                                            <?endif;?>

                                                                            
                                                                        </a>
                                                                    </div>
    
                                                                 
    
                                                                <?endif;?>
    
                       
                                                                <?if(!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
    
                                                                    <div class="button-child">
                                                                        <a class="link-def btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff"  data-element-id="<?=$arItem["ID"]?>"><i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=GetMessage("KRAKEN_MORE_DETAIL")?></span></a>
                                                                    </div>
                                                                
                                                                <?endif;?>
                                                                
                                                            </div>
                                                        
                                                        <?endif;?>  
    
                                                    <?endif;?>
                                                </div>                          
                                                    
                                            </div>
    
                                            <?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>
    
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 <?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left" && $arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>col-lg-pull-8 col-md-pull-8 col-sm-pull-8 col-xs-pull-0<?endif;?>">
    
                                                    
                                                        <div class="tarif-img-wrap">
                                                            
                                                            <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"], array('width'=>300, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]); ?>
    
                                                            
                                                            <?if((!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
                                                                <a class="btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff" data-element-id="<?=$arItem["ID"]?>"></a>
                                                            <?endif;?>
                                                            
                                                            <img class="img-responsive center-block" src="<?=$img["src"]?>" alt='<?=$arItem["PROPERTIES"]["TARIFF_NAME"]["VALUE"]?>'/>

                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"])>0):?>
	
	                                                            <div class="name-wrap">
	                                                                <div class="image-descrip italic">
	                                                                    <?=$arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"]?>
	                                                                </div>
	                                                            </div>
	                                                            
                                                            <?endif;?>
    
                                                        </div>
                                                            
                                                    
    
                                                </div>
    
                                            <?endif;?>
    
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <?if(!empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                    
                                                    <div class="list-wrap">
                                                    
                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["VALUE"]) > 0):?>
                                                            <div class="name-list main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["~VALUE"]?></div>
                                                        <?endif;?>
                
                
                                                        <ul class="list-char">
                                                            
                                                            <?foreach($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"] as $k=>$val):?>
                                                                <li class="clearfix">
                                                                
                                                                    <table class="mobile-break">
                                                                        <tr>
                                                                            <td class="left">
                                                                                <div><?=$val?></div>
                                                                            </td>
                                                                            
                                                                            <td class="dotted">
                                                                                <div></div>
                                                                            </td>
                                                                            
                                                                            <td class="right">
                                                                                <div class="main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICES"]["~DESCRIPTION"][$k]?></div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                
                                                                </li>
                                                            <?endforeach;?>
    
                                                        </ul>
                                                    </div>
    
                                                    <div class="clearfix"></div>
    
                                                    <?if((strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                            
                                                        <div class="buttons-wrap">
                                                        
                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>

                                                            <?
                                                                $form_id = "";
                                                                if($arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"] > 0)
                                                                    $form_id = $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"];


                                                                $arClass = array();
                                                                $arClass=array(
                                                                    "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                    "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                );
                                                                
                                                                $arAttr=array();
                                                                $arAttr=array(
                                                                    "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                    "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                    "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                    "LINK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                    "BLANK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                    "HEADER"=> $block_name,
                                                                    "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                    "LAND_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                );
                                                            ?>
    
                                                                
                      
                                                                <div class="button-child">
    
                                                                    <a <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass ($arClass)?><?if(!$show_menu):?> big<?else:?> medium<?endif;?>" data-element-id="<?=$arItem["ID"]?>" data-element-type = "TRF" <?=CKraken::buttonEditAttr($arAttr)?> title='<?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]?>'>

                                                                        <?if($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                            <?
                                                                                $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                    $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                            ?>

                                                                            <span class="first">
                                                                               <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                            </span>

                                                                            <span class="second">
                                                                                <?=$btn_name2?>
                                                                            </span> 

                                                                        <?else:?>
                                                                            <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?></a>
                                                                        <?endif;?>
                                                                </div>
    
                                                             
    
                                                            <?endif;?>
    
                   
                                                            <?if(!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
    
                                                                <div class="button-child">
                                                                    <a class="link-def btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff"  data-element-id="<?=$arItem["ID"]?>"><i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=GetMessage("KRAKEN_MORE_DETAIL")?></span></a>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                        </div>
                                                    
                                                    <?endif;?> 
                                                
                                                <?endif;?>
                                            </div>
    
                                        </div>
    
    
                                        
                                    </div>
    
                                <?else:?>
                                
                                    <div class="tarif-2 clearfix <?=$arItem["PROPERTIES"]["TARIFF_TEXT_COLOR"]["VALUE_XML_ID"]?>">

                                    	<?
	                                        if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0)
	                                            $img = CFile::ResizeImageGet($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, false);
	                                    ?>
                                    
                                        <div class="">
                                        
                                            <div class="tarif-table">
                
                                                <div class="tarif-cell text-part <?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>col-lg-7 col-md-7 col-sm-12 col-xs-12<?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left" && $arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?> col-lg-push-5 col-md-push-5 col-sm-push-0 col-xs-push-0<?endif;?><?else:?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>">
    
                                                    <div class="left-wrap-inner">
                                                
                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_NAME"]["VALUE"]) > 0):?>
                                                            <div class="title main1">
                                                                <?=$arItem["PROPERTIES"]["TARIFF_NAME"]["~VALUE"]?> <?if($arItem["PROPERTIES"]["TARIFF_HIT"]["VALUE"] == "Y"):?><span class="hit"></span><?endif;?>
                                                            </div>
                                                        <?endif;?>
                        
                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["VALUE"]) > 0):?>
                                                            <div class="subtitle italic">
                                                                <?=$arItem["PROPERTIES"]["TARIFF_PREVIEW_TEXT"]["~VALUE"]?>
                                                            </div>
                                                        <?endif;?>
                                                        
                                                        
                                                        <div class="tarif-body">

                                                        	<?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>

			                                                    <noindex>

			                                                        <div class="image-hidden visible-sm visible-xs">

			                                                            <?if((!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
			                                                                <a class="btn-modal-open" data-header="<?=$block_name?>" data-site-id='<?=SITE_ID?>' data-detail="tariff" data-element-id="<?=$arItem["ID"]?>"  data-all-id = "<?=implode("," , $arItem["ID_ALL"])?>">
			                                                            <?endif;?>
			                                                        
			                                                            <img alt="<?=$arItem["NAME"]?>" class="img-responsive" src="<?=$img["src"]?>" />
			                                                            
			                                                            <?if((!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"])) || (!empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) && is_array($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]))):?>
			                                                                </a>
			                                                            <?endif;?>

			                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"])>0):?>

				                                                            <div class="name-wrap">
				                                                                <div class="image-descrip italic">
				                                                                    <?=$arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"]?>
				                                                                </div>
				                                                            </div>
			                                                            <?endif;?>

			                                                        </div>

			                                                    </noindex>

			                                                <?endif;?>
                                                        
                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                            
                                                                <div class="list-wrap">
                
                                                                    <div class="price-wrap">
                                                                    
                                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["VALUE"]) > 0):?>
                                                                            <div class="old-price main2"><?=$arItem["PROPERTIES"]["TARIFF_OLD_PRICE"]["~VALUE"]?></div>
                                                                        <?endif;?>
                        
                                                                        <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICE"]["VALUE"]) > 0):?>
                                                                            <div class="price main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICE"]["~VALUE"]?></div>
                                                                        <?endif;?>
                                                                        
                                                                    </div>
                                                                    
                                                                </div>
                                                            
                                                            <?endif;?>
                                                        
                                                            
                                                            <?if(!empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                                        
                                                                <div class="list-wrap">
                                                                    <div class="row clearfix">
                                                                    
                                                                        <?if(is_array($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"]) && !empty($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["VALUE"])):?>
                                                                        
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                          
                                                                                <ul class="adv-plus-minus">
                                                                                    
                                                                                    <?foreach($arItem["PROPERTIES"]["TARIFF_INCLUDE"]["~VALUE"] as $val):?>
                                                                                        <li class="point-green"><?=$val?></li>
                                                                                    <?endforeach;?>
                                                                                
                                                                                </ul>
                
                                                                            </div>
                                                                        
                                                                        <?endif;?>
                                                                        
                                                                        <?if(is_array($arItem["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["VALUE"]) && !empty($arItem["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["VALUE"])):?>
                                                                         
                                                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                            
                                                                                
                                                                                <ul class="adv-plus-minus">
                                                                                    
                                                                                    <?foreach($arItem["PROPERTIES"]["TARIFF_NOT_INCLUDE"]["~VALUE"] as $val):?>
                                                                                        <li><?=$val?></li>
                                                                                    <?endforeach;?>
                     
                                                                                </ul>
                                                                                
                                                                            </div>
                                                                        
                                                                        <?endif;?>
                                                                        
                                                                    </div>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                            <?if(!empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                        
                                                                <div class="list-wrap">
                                                                
                                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["VALUE"]) > 0):?>
                                                                        <div class="name main1"><?=$arItem["PROPERTIES"]["TARIFF_PRICES_TITLE"]["~VALUE"]?></div>
                                                                    <?endif;?>
                            
                            
                                                                    <ul class="list-char">
                                                                        
                                                                        <?foreach($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"] as $k=>$val):?>
                                                                            <li class="clearfix">
                                                                            
                                                                                <table class="mobile-break">
                                                                                    <tr>
                                                                                        <td class="left">
                                                                                            <div class="left"><?=$val?></div>
                                                                                        </td>
                                                                                        
                                                                                        <td class="dotted">
                                                                                            <div class="dotted"></div>
                                                                                        </td>
                                                                                        
                                                                                        <td class="right">
                                                                                            <div class="main1 right"><?=$arItem["PROPERTIES"]["TARIFF_PRICES"]["~DESCRIPTION"][$k]?></div>
                                                                                        </td>
                                                                                    </tr>
                                                                                </table>
                                                                            
                                                                            </li>
                                                                        <?endforeach;?>
                
                                                                    </ul>
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                            <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"]) <= 0):?>
                                                                <?$arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] = "form";?>
                                                            <?endif;?>
                                                            
    
                                                           
                                                            <?if((strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0) || !empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_PRICES"]["VALUE"])):?>
                        
                                                                <div class="buttons-wrap no-margin-left-right">
                                                                
                                                                    <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["VALUE"]) > 0):?>

                                                                        <?
                                                                            $arClass = array();
                                                                            $arClass=array(
                                                                                "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"]
                                                                            );
                                                                            
                                                                            $arAttr=array();
                                                                            $arAttr=array(
                                                                                "XML_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"],
                                                                                "FORM_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_FORM"]["VALUE"],
                                                                                "MODAL_ID"=> $arItem["PROPERTIES"]["TARIFF_MODAL"]["VALUE"],
                                                                                "LINK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LINK"]["VALUE"],
                                                                                "BLANK"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                                "HEADER"=> $block_name,
                                                                                "QUIZ_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_QUIZ"]["VALUE"],
                                                                                "LAND_ID"=> $arItem["PROPERTIES"]["TARIFF_BUTTON_LAND"]["VALUE"]
                                                                            );
                                                                        ?>
    
                                                                        
                              
                                                                            <div class="button-child">
    
                                                                                <a <?if(strlen($arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["TARIFF_BUTTON_ONCLICK"]["VALUE"]."'";?> class="button-def <?=$btn_view?> main-color more-modal-info <?=CKraken::buttonEditClass ($arClass)?> <?if(!$show_menu):?> big<?else:?> medium<?endif;?>" data-element-id="<?=$arItem["ID"]?>" data-element-type = "TRF" <?=CKraken::buttonEditAttr ($arAttr)?>>

                                                                                    <?if($arItem["PROPERTIES"]["TARIFF_BUTTON_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                        <?
                                                                                        
                                                                                            $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                            if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                                $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                        ?>

                                                                                        <span class="first">
                                                                                           <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>
                                                                                        </span>

                                                                                        <span class="second">
                                                                                            <?=$btn_name2?>
                                                                                        </span> 

                                                                                    <?else:?>

                                                                                        <?=$arItem["PROPERTIES"]["TARIFF_BUTTON_NAME"]["~VALUE"]?>

                                                                                    <?endif;?>
                                                                                        

                                                                                </a>
                                                                            </div>
    
                                                                    
    
                                                                    <?endif;?>
    
                           
                                                                    <?if(!empty($arItem["PROPERTIES"]["TARIFF_DETAIL_TEXT"]["VALUE"]) || !empty($arItem["PROPERTIES"]["TARIFF_GALLERY"]["VALUE"])):?>
    
                                                                        <div class="button-child">
                                                                            <a class="button-def <?=$btn_view?> secondary big btn-modal-open" data-header='<?=$block_name?>' data-site-id='<?=SITE_ID?>' data-detail="tariff"  data-element-id="<?=$arItem["ID"]?>">
                                                                                <i class="fa fa-info" aria-hidden="true"></i>
                                                                                <?=GetMessage("KRAKEN_MORE_DETAIL")?>
                                                                            </a>
                                                                        </div>
                                                                    
                                                                    <?endif;?>
                                                                    
                                                                </div>
                                                            
                                                            <?endif;?>
                                                            
                                                        </div>
    
                                                    </div>
                                                </div>
                    
                                                <?if($arItem["PROPERTIES"]["TARIFF_PICTURE"]["VALUE"] > 0):?>
    
                                                    <div class="tarif-img-wrap">
                                                
                                                        <div class="tarif-cell image-part col-lg-5 col-md-5 col-sm-0 col-xs-12 hidden-sm hidden-xs <?if($arItem["PROPERTIES"]["TARIFF_PICTURE_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-pull-7 col-md-pull-7 col-sm-pull-0 col-xs-pull-0<?endif;?>">
                                                        
                                                            <img alt="" class="img-responsive center-block" src="<?=$img["src"]?>" />
                            
                                                            <div class="name-wrap">
                                                                <div class="image-descrip italic">
                                                                    <?=$arItem["PROPERTIES"]["TARIFF_PICTURE"]["~DESCRIPTION"]?>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
    
                                                    </div>
                                                
                                                <?endif;?>
                                                
                                            </div>
                                        </div>
                                            
                                        
                                    </div>
    
                                <?endif;?>
                            
                            <?endif;?>
    
                        <?endif;?>
                        
                        <?//tariffs end?>
    
    
    
                        <?//opinion?>
    
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "opinion"):?>
    
                            <?
                                if($arItem["PROPERTIES"]["OPINION_TEXT_COLOR"]["VALUE_XML_ID"] == "")
                                    $arItem["PROPERTIES"]["OPINION_TEXT_COLOR"]["VALUE_XML_ID"] = "dark";
    
                                if($arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] == "")
                                    $arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] = "slider";
                            ?>
    
                            <?if($arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] == "slider"):?>
    
                                <div class="opinion <?=$arItem["PROPERTIES"]["OPINION_TEXT_COLOR"]["VALUE_XML_ID"]?> <?=$arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"]?>-<?if(!$show_menu):?>big<?else:?>small<?endif;?> <?=$arItem["ELEMENTS"][0]["PROPERTIES"]["OPINION_ROUND_OFF"]["VALUE_XML_ID"]?>">
    
                                    <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>

                                        <?$count_opin = count($arItem["ELEMENTS"])?>
    
                                        <?if(!$show_menu):?>
    
                                            <div class="slider" data-count = "<?=$count_opin;?>">
                                                <div class="slider-nav-wrap <?if($count_opin == 2 || $count_opin == 3):?>open<?endif;?>">
    
                                                    <?if($count_opin > 3 || $count_opin == 1):?>
                                                        <div class="slider-icon-center main-color"><span></span></div>
                                                    <?endif;?>
    
                                                    <div class="slider-nav">
                                            
                                                        <?foreach($arItem["ELEMENTS"] as $k=>$arOpinion):?>
    
                                                            <div class="for-count">
                                                                
                                                                <?if($count_opin == 2 || $count_opin == 3):?>
                                                                    <div class="slider-icon main-color"><span></span></div>
                                                                <?endif;?>
                                                            
                                                            
                                                                <div class="slider-image">
                                                                    <div class="image-child">
           
                                                                        <?CKraken::admin_setting($arOpinion, false, $admin_active, $show_setting)?>
                                                                    
                                                                        <?if($arOpinion["PROPERTIES"]["OPINION_IMAGE"]["VALUE"] > 0):?>
                                                                            <?$img_big = CFile::ResizeImageGet($arOpinion["PROPERTIES"]["OPINION_IMAGE"]["VALUE"], array('width'=>234, 'height'=>234), BX_RESIZE_IMAGE_EXACT , false, false, false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]);?>
                                                                            <img alt="" class="img-responsive center-block" src="<?=$img_big["src"]?>" />
                                                                        <?else:?>
                                                                            <img alt="" class="img-responsive center-block" src="<?=SITE_TEMPLATE_PATH?>/images/quote.png">
                                                                        <?endif;?>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                        <?endforeach;?>
    
                                                    </div>
                                                        
                                                </div>
                                                
    
                                                <div class="slider-for">
                                                    <?foreach($arItem["ELEMENTS"] as $k=>$arOpinion):?>
                                                        <div>
    
    
                                                            <?if(!empty($arOpinion["PROPERTIES"]["OPINION_TEXT"]["VALUE"])):?>
    
                                                                <div class="text italic">
                                                                    <?=$arOpinion["PROPERTIES"]["OPINION_TEXT"]["~VALUE"]["TEXT"]?>
                                                                </div>
    
                                                            <?endif;?>
    
                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0 || strlen($arOpinion["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
    
                                                                <div class="descrip-wrap">
                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0):?>
    
                                                                        <div class="name main1">
                                                                            <?=$arOpinion["PROPERTIES"]["OPINION_NAME"]["~VALUE"]?>
                                                                        </div>
                                                                    <?endif;?>
    
                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
                                                                        <div class="proof">
                                                                            <?=$arOpinion["PROPERTIES"]["OPINION_PROF"]["~VALUE"]?>
                                                                        </div>
                                                                    <?endif;?>
                                                                </div>
    
                                                            <?endif;?>
    
                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0 || strlen($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                                <div class="more-info-wrap">
    
                                                                    <div class="more-info no-margin-left-right">
                                                                        
                                                                        <?if(strlen($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                                            <div class="link-wrap">
    
                                                                                <?$arFile = CFile::MakeFileArray($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]);?>
                                                    
                                                                                <?$is_image = CFile::IsImage($arFile["name"], $arFile["type"]);?>
    
                                                                            
                                                                                <a href="<?=CFile::GetPath($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"])?>" <?if(!$is_image):?> target="_blank" <?else:?> data-gallery="s<?=$arOpinion['ID']?>" <?endif;?>class="link-blank">
    
                                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_FILE_TEXT"]["VALUE"]) > 0):?>
    
                                                                                        <span class="bord-bot"><?=$arOpinion["PROPERTIES"]["OPINION_FILE_TEXT"]["~VALUE"]?></span>
    
                                                                                    <?endif;?>
    
                                                                                </a>
    
                                                                            </div>
    
                                                                        <?endif;?>
    
                                                                        
    
    
                                                                        <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0):?>
    
                                                                            <div class="link-wrap">
    
                                                                            <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arOpinion['PROPERTIES']['OPINION_VIDEO']['~VALUE'],$out);?>   
    
                                                                                <a class="link-video call-modal callvideo" data-call-modal="<?=$out[1]?>">
    
                                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO_TEXT"]["VALUE"]) > 0):?>
    
                                                                                        <span class="bord-bot"><?=$arOpinion["PROPERTIES"]["OPINION_VIDEO_TEXT"]["~VALUE"]?></span>
    
                                                                                    <?endif;?>
                                                                                </a>
                                                                            </div>
                                                                     
                                                                        <?endif;?>
    
                                                                    </div>
                                                                </div>
    
                                                            <?endif;?>
    
    
                                                        </div>
                                                    <?endforeach;?>
                                                </div>
                                        
                                            </div>
    
                                        <?else:?>
    
                                            <div class="slider-mini">
    
                                                <?foreach($arItem["ELEMENTS"] as $k=>$arOpinion):?>
    
                                                    <div>
                                                        <div class="row">
    
                                                            <div class="opinion-table">
    
                                                                <div class="opinion-cell z-image image-part col-lg-4 col-md-4 col-sm-4 col-xs-12">
    
                                                                    <div class="wrap-img">     
                                                                        <?CKraken::admin_setting($arOpinion, false, $admin_active, $show_setting)?>                         
    
                                                                        <?if($arOpinion["PROPERTIES"]["OPINION_IMAGE"]["VALUE"] > 0):?>
                                                                            <?$img_big = CFile::ResizeImageGet($arOpinion["PROPERTIES"]["OPINION_IMAGE"]["VALUE"], array('width'=>250, 'height'=>250), BX_RESIZE_IMAGE_EXACT, false);?>
                                                                            <img alt="" class="img-responsive" src="<?=$img_big["src"]?>" />
                                                                        <?else:?>
                                                                            <img alt="" class="img-responsive" src="<?=SITE_TEMPLATE_PATH?>/images/quote.png">
                                                                        <?endif;?>
    
                                                                        <div class="slider-icon main-color"><span></span></div>
    
                                                                    </div>
                                    
                                                                    
                                                                    
                                                                </div>
    
                                                                <div class="opinion-cell text-part col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                                                    <?if($arOpinion["TITLE_CHANGE"]):?>
                                                                        <?CreateHead($arOpinion, $show_menu, true, $main_key)?>
                                                                    <?endif;?>
    
                                                                    <?if(!empty($arOpinion["PROPERTIES"]["OPINION_TEXT"]["VALUE"])):?>
                                                                        <div class="text italic">
                                                                            <?=$arOpinion["PROPERTIES"]["OPINION_TEXT"]["~VALUE"]["TEXT"]?>
                                                                        </div>
                                                                    <?endif;?>
    
                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0 || strlen($arOpinion["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
    
                                                                        <div class="name-wrap">
                                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0):?>
                                                                                <div class="name main1">
                                                                                     <?=$arOpinion["PROPERTIES"]["OPINION_NAME"]["~VALUE"]?>
                                                                                </div>
    
                                                                            <?endif;?>
    
                                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
                                                                                <div class="prof">
                                                                                    <?=$arOpinion["PROPERTIES"]["OPINION_PROF"]["~VALUE"]?>
                                                                                </div>
                                                                            <?endif;?>
                                                                        </div>
    
                                                                    <?endif;?>
    
                                                                    
    
                                                                    <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0 || strlen($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                                        <div class="more-info">
    
                                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                                                <?$arFile = CFile::MakeFileArray($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"]);?>
                                                                                <?$is_image = CFile::IsImage($arFile["name"], $arFile["type"]);?>
    
                                                                                <div class="link-wrap">
    
                                                                                    <a href="<?=CFile::GetPath($arOpinion["PROPERTIES"]["OPINION_FILE"]["VALUE"])?>" <?if(!$is_image):?> target="_blank" <?else:?> data-gallery="s<?=$arOpinion['ID']?>" <?endif;?>class="link-blank">
    
                                                                                        <?if(strlen($arOpinion["PROPERTIES"]["OPINION_FILE_TEXT"]["VALUE"]) > 0):?>
    
                                                                                            <span class="bord-bot"><?=$arOpinion["PROPERTIES"]["OPINION_FILE_TEXT"]["~VALUE"]?></span>
    
                                                                                        <?endif;?>
    
                                                                                    </a>
                                                                                </div>
    
                                                                            <?endif;?>
    
                                                                            <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0):?>
    
                                                                                <div class="link-wrap">
    
                                                                                 <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arOpinion['PROPERTIES']['OPINION_VIDEO']['~VALUE'],$out);?>     
    
                                                                                        <a class="link-video call-modal callvideo" data-call-modal="<?=$out[1]?>">
    
    
                                                                                        <?if(strlen($arOpinion["PROPERTIES"]["OPINION_VIDEO_TEXT"]["VALUE"]) > 0):?>
    
                                                                                            <span class="bord-bot"><?=$arOpinion["PROPERTIES"]["OPINION_VIDEO_TEXT"]["~VALUE"]?></span>
    
                                                                                        <?endif;?>
                                                                                    </a>
                                                                                </div>
                                                                         
                                                                            <?endif;?>
                                                                        </div>
    
                                                                    <?endif;?>
    
                                                                    <?if($arOpinion["BUTTON_CHANGE"]):?>
                                                                        <?=CreateButton($arOpinion, $show_menu, false)?>
                                                                    <?endif;?>
                                                                </div>
    
                                                            </div>
    
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </div>
    
                                                <?endforeach;?>
                                                
                                            </div>
    
                                        <?endif;?>
    
                                    <?endif;?>
    
                                </div>
                                                
                            <?endif;?>
                            
                            
                            <?if($arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"] == "block"):?>
    
                                <div class="opinion<?if($show_menu):?> row<?endif;?> <?=$arItem["PROPERTIES"]["OPINION_TEXT_COLOR"]["VALUE_XML_ID"]?> full-<?=$arItem["PROPERTIES"]["OPINION_VIEW"]["VALUE_XML_ID"]?>">
                
                                    <div class="opinion-table">
    
                                        <div class="opinion-cell text-part col-lg-7 col-md-7 col-sm-8 col-xs-12 <?if($arItem["PROPERTIES"]["OPINION_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-push-5 col-md-push-5 col-sm-push-4 col-xs-push-0<?endif;?>">
                                            <?if($arItem["TITLE_CHANGE"]):?>
                                                <?CreateHead($arItem, $show_menu, true, $main_key)?>
                                            <?endif;?>
    
                                            <?if(!empty($arItem["PROPERTIES"]["OPINION_TEXT"]["VALUE"])):?>
                                                <div class="text italic">
                                                    <?=$arItem["PROPERTIES"]["OPINION_TEXT"]["~VALUE"]["TEXT"]?>
                                                </div>
                                            <?endif;?>
    
                                            <?/*if(strlen($arItem["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
    
                                                <div class="name-wrap visible-xs">
    
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0):?>
    
                                                        <div class="name main1">
                                                            <?=$arItem["PROPERTIES"]["OPINION_NAME"]["~VALUE"]?>
                                                        </div>
    
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
                                                        <div class="prof">
                                                            <?=$arItem["PROPERTIES"]["OPINION_PROF"]["~VALUE"]?>
                                                        </div>
                                                    <?endif;?>
                                                </div>
    
                                            <?endif;*/?>
    
                                            <?if(strlen($arItem["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                <div class="more-info">
    
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_FILE"]["VALUE"]) > 0):?>
    
                                                        <?$arFile = CFile::MakeFileArray($arItem["PROPERTIES"]["OPINION_FILE"]["VALUE"]);?>
                                                        <?$is_image = CFile::IsImage($arFile["name"], $arFile["type"]);?>
    
                                                        <div class="link-wrap">
    
                                                            <a href="<?=CFile::GetPath($arItem["PROPERTIES"]["OPINION_FILE"]["VALUE"])?>" <?if(!$is_image):?> target="_blank" <?else:?> data-gallery="s<?=$arItem['ID']?>" <?endif;?>class="link-blank">
    
                                                                <?if(strlen($arItem["PROPERTIES"]["OPINION_FILE_TEXT"]["VALUE"]) > 0):?>
    
                                                                    <span class="bord-bot"><?=$arItem["PROPERTIES"]["OPINION_FILE_TEXT"]["~VALUE"]?></span>
    
                                                                <?endif;?>
    
                                                            </a>
                                                        </div>
    
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_VIDEO"]["VALUE"]) > 0):?>
    
                                                        <div class="link-wrap">
    
                                                         <?preg_match("/^(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?(?=.*v=((\w|-){11}))(?:\S+)?$/",$arItem['PROPERTIES']['OPINION_VIDEO']['~VALUE'],$out);?>     
    
                                                                <a class="link-video call-modal callvideo" data-call-modal="<?=$out[1]?>">
    
    
                                                                <?if(strlen($arItem["PROPERTIES"]["OPINION_VIDEO_TEXT"]["VALUE"]) > 0):?>
    
                                                                    <span class="bord-bot"><?=$arItem["PROPERTIES"]["OPINION_VIDEO_TEXT"]["~VALUE"]?></span>
    
                                                                <?endif;?>
                                                            </a>
                                                        </div>
                                                 
                                                    <?endif;?>
                                                </div>
    
                                            <?endif;?>
    
                                            <?if($arItem["BUTTON_CHANGE"]):?>
                                                <?=CreateButton($arItem, $show_menu, false)?>
                                            <?endif;?>
                                        </div>
      
                                        
                                        <div class="opinion-cell z-image image-part col-lg-5 col-md-5 col-sm-4 col-xs-12 <?if($arItem["PROPERTIES"]["OPINION_IMAGE_BLOCK_POSITION"]["VALUE_XML_ID"] == "left"):?>col-lg-pull-7 col-md-pull-7 col-sm-pull-8 col-xs-pull-0<?endif;?>">                                 
    
                                            <?if($arItem["PROPERTIES"]["OPINION_IMAGE"]["VALUE"] > 0):?>
                                                <?$img_big = CFile::ResizeImageGet($arItem["PROPERTIES"]["OPINION_IMAGE"]["VALUE"], array('width'=>500, 'height'=>500), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                <img alt="" class="img-responsive center-block" src="<?=$img_big["src"]?>" />
                                            <?else:?>
                                                <img alt="" class="img-responsive center-block" src="<?=SITE_TEMPLATE_PATH?>/images/quote.png">
                                            <?endif;?>
            
                                            <?if(strlen($arItem["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
    
                                                <div class="name-wrap">
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_NAME"]["VALUE"]) > 0):?>
                                                        <div class="name main1">
                                                             <?=$arItem["PROPERTIES"]["OPINION_NAME"]["~VALUE"]?>
                                                        </div>
    
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["OPINION_PROF"]["VALUE"]) > 0):?>
                                                        <div class="prof">
                                                            <?=$arItem["PROPERTIES"]["OPINION_PROF"]["~VALUE"]?>
                                                        </div>
                                                    <?endif;?>
                                                </div>
    
                                            <?endif;?>
                                            
                                        </div>
                                        
                                     
    
                                    </div>
                                </div>
                            
                            <?endif;?>
    
                        <?endif;?>
    
                        <?//opinion end?>
    
                        
                        <?//numbers?>
    
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "numbers"):?>
    
                            <div class="info-num <?if(!$show_menu):?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?> clearfix <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>">
                                <div class="row">
    
                                    <?$class = "col-lg-6 col-md-6 col-sm-6 col-xs-12";?>
                            
    
                                    <?$count = count($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["VALUE"]);?>
    
                                    <?if(!$show_menu):?>
                                    
                                        <?if($count <= 3):?>
                                            <?$class = "col-lg-4 col-md-4 col-sm-4 col-xs-12";?>      
                                        <?else:?>
                                            <?$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12 four-elements";?>
                                        <?endif;?>
    
                                        
                                        <?if($count == 1):?>
                                            <?$class2 = "col-lg-offset-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-0";?>
                                        <?elseif($count == 2):?>
                                            <?$class2 = "col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0";?>
                                        <?endif;?>
    
                                    <?endif;?>
    
    
                                    <?if(is_array($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["VALUE"]) && !empty($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["VALUE"])):?>
                                   
                                            
                                        <?foreach($arItem["PROPERTIES"]["NUMBERS_TEXTS"]["~VALUE"] as $k => $arValue):?>
                                                
                                                <div class="info-num-element <?=$class?> <?if($k==0):?><?=$class2?><?endif;?> <?=$arItem["PROPERTIES"]["NUMBERS_TEXTS_COLOR"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>" >
    
                                                    <?if($arItem["STRING_NUM"] > 0):?>
    
                                                        <div class="title main1" <?if(strlen($arItem["PROPERTIES"]["NUMBERS_FONT_SIZE"]["VALUE"]) > 0):?> style="font-size: <?=$arItem["PROPERTIES"]["NUMBERS_FONT_SIZE"]["VALUE"]?>px; line-height: <?=$arItem["PROPERTIES"]["NUMBERS_FONT_SIZE"]["VALUE"] + 3?>px; min-height: <?=$arItem["PROPERTIES"]["NUMBERS_FONT_SIZE"]["VALUE"] + 3?>px "<?endif;?>>
                                                            
                                                            <?=$arValue?>
                                                        </div>
    
                                                     <?endif;?>
    
    
                                                    <div class="text">
                                                        <?=$arItem["PROPERTIES"]["NUMBERS_TEXTS"]["~DESCRIPTION"][$k]?>
                                                    </div>
                                                </div>
    
    
                                                <?if(!$show_menu):?>
                                                
                                                    <?if($count <= 3):?>
    
                                                        
                                                        <?if(($k+1)%3 == 0):?>
                                                            <span class="clearfix visible-lg visible-md visible-sm"></span>
                                                        <?endif;?>
                                                        
                                                    <?else:?>
                                                        
                                                        <?if(($k+1)%2 == 0):?>
                                                            <span class="clearfix visible-sm"></span>
                                                        <?endif;?>
                                                        
                                                        <?if(($k+1)%4 == 0):?>
                                                            <span class="clearfix visible-lg visible-md"></span>
                                                        <?endif;?>
                                                        
                                                    <?endif;?>
                                                <?else:?>
    
                                                    <?if(($k+1)%2 == 0):?>
                                                        <span class="clearfix"></span>
                                                    <?endif;?>
    
                                                <?endif;?>
                                        <?endforeach;?>
    
                                    <?endif;?>
                                            
    
                                </div>
                            </div>
    
    
                        <?endif;?>
    
                        <?//numbers end?>
    
                        <?//gallery?>
                        
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "gallery"):?>
    
                            <?if(is_array($arItem["PROPERTIES"]["GALLERY"]["VALUE"]) && !empty($arItem["PROPERTIES"]["GALLERY"]["VALUE"])):?>
                            
                                <?if($show_menu):?>
                                    <div class="row">
                                <?endif;?>
                            
                            
                            
                                <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "slider"):?>
                            
                                <?
                                 $arWaterMark = Array();
        
                                 if($arItem["PROPERTIES"]["GALLERY_WATERMARK"]["VALUE"] > 0){
        
                                    $arWaterMark = Array(
                                        array(
                                            "name" => "watermark",
                                            "position" => "center",
                                            "type" => "image",
                                            "size" => "big",
                                            "file" => $_SERVER["DOCUMENT_ROOT"].CFile::GetPath($arItem["PROPERTIES"]["GALLERY_WATERMARK"]["VALUE"]), 
                                            "fill" => "exact",
                                        )
                                    );
                                 }
                                 
                                ?>
                                
                                
                                
    
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <?
                                        $count_slide = 1;

                                        if($arItem["PROPERTIES"]["GALLERY_PICS_IN_SLIDE"]["VALUE"] > 0)
                                        {
                                            $count_slide = $arItem["PROPERTIES"]["GALLERY_PICS_IN_SLIDE"]["VALUE"];

                                            if($count_slide < 1)
                                                $count_slide = 1;

                                            if($count_slide > 6)
                                                $count_slide = 6;
                                        }
                                            
                                    ?>
    
                                    <div class="slider-gallery clearfix <?if($count_slide > 1):?>over-one<?endif;?> slider-gallery-<?=$count_slide?>" data-slide-visible = "<?=$count_slide?>">
                                        <?foreach($arItem["PROPERTIES"]["GALLERY"]["VALUE"] as $k=>$photo):?>
    
                                            <div class="slide-style">
                                                <div class="wrap-slide">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                            
                                                                
                                                                <?
                                                                    $img = CFile::ResizeImageGet($photo, array('width'=>1200, 'height'=>700), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, $arWaterMark, false, $img_quality);
                                                                    $img_big = CFile::ResizeImageGet($photo, array('width'=>2000, 'height'=>2000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, $arWaterMark, false, $img_quality);
                                                                ?>

                                                                <a href="<?=$img_big["src"]?>" title="<?=$arItem["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$k]?>" data-gallery="gal<?=$arItem['ID']?>" class="cursor-loop">
                                                                    <div class="slide-element" style="background-image: url('<?=$img["src"]?>');"></div>
                                                                </a>   
        
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                
                                                <?if($arItem["GALLERY_COUNT_DESC"] && $count_slide == 1):?>
                                                    <div class="desc"><?=$arItem["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$k]?></div>
                                                <?endif;?>
                                                
                                            </div>
    
                                        <?endforeach;?>
    
                                    </div>
    
                                </div>
    
                                <div class="clearfix"></div>
    
    
    
                            <?else:?>
    
                                    <div class="gallery-block clearfix <?if($arItem["PROPERTIES"]["GALLERY_BORDER"]["VALUE"] == "Y"):?>border-img-on<?endif;?> <?=$arItem["PROPERTIES"]["GALLERY_DESK_COLOR"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "nogallery"):?>nogallery<?endif;?>">
                                        
    
                                            <? 
                                                $arSize = Array();
    
                                                $arSize[3] = array('width'=>400, 'height'=>400);
                                                $arSize[4] = array('width'=>300, 'height'=>300);
                                                $arSize[6] = array('width'=>200, 'height'=>200);
    
                                                $arStyle = Array();
    
                                                $arStyle[3] = 'big';
                                                $arStyle[4] = 'middle';
                                                $arStyle[6] = 'small';
    
                                            ?>
    
                                            <?$class = "";?>
                                           
    
                                            <?$str = 1;?>
    
                                            <?$rows = 0;?>
    
                                            <?
                                             $arWaterMark = Array();
    
                                             if($arItem["PROPERTIES"]["GALLERY_WATERMARK"]["VALUE"] > 0){
    
                                                $arWaterMark = Array(
                                                    array(
                                                        "name" => "watermark",
                                                        "position" => "center",
                                                        "type" => "image",
                                                        "size" => "real",
                                                        "file" => $_SERVER["DOCUMENT_ROOT"].CFile::GetPath($arItem["PROPERTIES"]["GALLERY_WATERMARK"]["VALUE"]), 
                                                        "fill" => "exact",
                                                    )
                                                );
                                             }
                                                
                                             
                                            ?>
    
                                            <?foreach($arItem["PROPERTIES"]["GALLERY"]["VALUE"] as $k=>$photo):?>
    
                                                <?if($photo <= 0) continue;?>
    
                                                    <?$rows++;?>  
    
                                                    <?$class = 12 / $arItem["GALLERY_COUNT"][$str];?>
    
    
                                                       
                                                    <div class="col-lg-<?=$class?> col-md-<?=$class?> col-sm-<?=$class?> <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "nogallery"):?> col-xs-6 <?else:?> col-xs-4<?endif;?> <?=$arStyle[$arItem["GALLERY_COUNT"][$str]]?>">
                                                        
                                                        <?$img_big = CFile::ResizeImageGet($photo, array('width'=>1600, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, false, $arWaterMark);?>
    
                                                        <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "nogallery"):?>
                                                            <?$img = CFile::ResizeImageGet($photo, $arSize[$arItem["GALLERY_COUNT"][$str]], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, false, false, false, 75);?>
                                                        <?else:?>
                                                            <?$img = CFile::ResizeImageGet($photo, $arSize[$arItem["GALLERY_COUNT"][$str]], BX_RESIZE_IMAGE_EXACT, false, false, false, 75);?>
                                                        <?endif;?>
    
                                                        <div class="gallery-img">
    
                                                            <a href="<?=$img_big["src"]?>" data-gallery="gal<?=$arItem['ID']?>" class="cursor-loop" title="<?=$arItem["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$k]?>">
    
    
                                                                <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "nogallery"):?>
    
                                                                    <table>
                                                                        <tr>
                                                                            <td>
                                                                                <div class="gallery-img-wrap">
                                                                                    <div class="corner-line"></div>
                                                                                    <img alt="" class="img-responsive center-block" src="<?=$img["src"]?>" />
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <?if(strlen($arItem["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$k]) > 0 ):?>
                                                                        <div class="text-img">
                                                                            <?=$arItem["PROPERTIES"]["GALLERY"]["DESCRIPTION"][$k]?>
                                                                        </div>
                                                                    <?endif;?>
    
                                                                <?else:?>
    
                                                                    <div class="corner-line"></div>
                                                                    <img alt="" class="img-responsive center-block" src="<?=$img["src"]?>" />
    
                                                                <?endif;?>
                                                                
                                                            </a>
    
                                                        </div>
             
    
                                                    </div> 
    
                                                    <?if($arItem["PROPERTIES"]["GALLERY_VIEW"]["VALUE_XML_ID"] == "nogallery"):?>
    
                                                        <?if(($k+1)%2==0):?>
                                                            <span class="clearfix visible-xs"></span>
                                                        <?endif;?>
    
                                                    <?else:?>
    
                                                        <?if(($k+1)%3==0):?>
                                                            <span class="clearfix visible-xs"></span>
                                                        <?endif;?>
    
                                                    <?endif;?>
    
                                                    <?if($rows >= $arItem["GALLERY_COUNT"][$str]):?>
                                                    
                                                        <?$rows = 0;?>
                                                        <?$str++;?>
    
                                                        <?if($str>4) $str=4;?>
    
                                                        <span class="clearfix hidden-xs"></span>  
    
                                                   <?endif;?>
                                                    
                                         
                                            <?endforeach;?>
    
                                                
                                    </div>
                                <?endif;?>
                                
                                <?if($show_menu):?>
                                    </div>
                                <?endif;?>
    
                            <?endif;?>
                        <?endif;?>
                        <?//gallery end?>
    
    
                        <?//news?>
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "news"):?>
    
                                </div>
                            </div>
                        
                            <?if($arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"] == ""):?>
                                <?$arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"] == "chrono";?>
                            <?endif;?>
                        
    
                            <?if(strlen($arItem["PROPERTIES"]["NEWS_PICTURE"]["VALUE"]) > 0):?>
                                <div class="<?if(!$show_menu):?>container<?endif;?>">
                                
                                    <div class="<?if($show_menu):?>row<?endif;?> clearfix">
                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-image">
                                            <?$img_big = CFile::ResizeImageGet($arItem["PROPERTIES"]["NEWS_PICTURE"]["VALUE"], array('width'=>1600, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                            <img alt="" class="img-responsive center-block" src="<?=$img_big["src"]?>">
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                         
                             
                            <?endif;?>
    
                            <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>
    
                                <div class="news<?if($arItem["SHOW_SUBNAME"] == 0):?> no-date<?endif;?> <?=$arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"]?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>">
    
                               
                                    <?if($arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"] == "chrono"):?>
                                        <div class="bg_line_cont">
                                            <div class="bg_line"></div>
                                        </div>
                                    <?endif;?>
    
                                
                                    <div class="<?if(!$show_menu):?>container<?endif;?>">
    
                                    <?if($arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"] == "chrono"):?>
                                        
                                    
                                        <div class="row">
                                            <div class="slider slider-news<?if($show_menu):?> slider-news-small<?else:?> slider-news-big<?endif;?>">
    
                                                <?foreach($arItem["ELEMENTS"] as $k=>$arNews):?>
    
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="element">
    
                                                            <?CKraken::admin_setting($arNews, false, $admin_active, $show_setting)?>
                                                            
    
                                                            <?if($arItem["SHOW_SUBNAME"] > 0):?>
                                                                <div class="date">
    
                                                                    <?if($arNews["IBLOCK_CODE"] == "concept_kraken_site_action_".SITE_ID):?>
                                                                        
                                                                        <?if(getmicrotime() > MakeTimeStamp($arNews["ACTIVE_TO"])):?>
    
                                                                            <span class="off"><?=GetMessage("KRAKEN_ACT_OFF")?></span>
    
                                                                        <?else:?>
    
                                                                            <span><?=GetMessage("KRAKEN_ACT_ON")?></span>
    
                                                                        <?endif;?>
    
                                                                    <?else:?>
    
                                                                        <?if(strlen($arNews["ACTIVE_FROM"])>0):?>
                                                                            <?echo CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arNews["ACTIVE_FROM"], CSite::GetDateFormat()));?>
                                                                        <?endif;?>
    
                                                                    <?endif;?>
                                                                    
                                                                </div>
                                                            <?endif;?>
    
    
                                                            <div class="point"></div>
    
                                                            <?if(strlen($arNews['PREVIEW_PICTURE']) > 0):?>
                                                                            
                                                                <?$img = CFile::ResizeImageGet($arNews["PREVIEW_PICTURE"], array('width'=>240, 'height'=>240), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                <!-- <a href="<?=$arNews["DETAIL_PAGE_URL"]?>"> -->
                                                                    <a href="<?=$arNews["DETAIL_PAGE_URL"]?>"><div class="wrap-img" style="background-image: url(<?=$img["src"]?>);"></div></a>
                                                                <!-- </a> -->
                                                           
    
                                                            <?endif;?>
    
    
                                                            <div class="name bold">
                                                                <a href="<?=$arNews["DETAIL_PAGE_URL"]?>"><?=$arNews["~NAME"]?></a>
                                                            </div>
    
    
                                                            <div class="wrap-new-info clearfix">
    
                                                                    
                                                                <div class="wrap-text">
    
                                                                    <?if(!empty($arNews["PROPERTIES"]["NEWS_DETAIL_TEXT"]["VALUE"]) > 0):?>
                                                                        <div class="text">
                                                                            <?=$arNews["PROPERTIES"]["NEWS_DETAIL_TEXT"]["~VALUE"]["TEXT"]?>
                                                                        </div>
                                                                    <?endif;?>
    
                                                                    <?
    
                                                                        if($arNews["IBLOCK_CODE"] == "concept_kraken_site_action_".SITE_ID)
                                                                            $link_name = $KRAKEN_TEMPLATE_ARRAY["ACT_MORE"]["~VALUE"];
    
                                                                        if($arNews["IBLOCK_CODE"] == "concept_kraken_site_history_".SITE_ID)
                                                                            $link_name = $KRAKEN_TEMPLATE_ARRAY["BLG_MORE"]["~VALUE"];
    
                                                                        if($arNews["IBLOCK_CODE"] == "concept_kraken_site_news_".SITE_ID)
                                                                            $link_name = $KRAKEN_TEMPLATE_ARRAY["NW_MORE"]["~VALUE"];
                                                                    
                                                                    ?>
    
                                                                    <?if(strlen($link_name)>0):?>
    
                                                                        <div class="btn-detail-wrap">
                                                                            <a href="<?=$arNews["DETAIL_PAGE_URL"]?>">
                                                                                <i class="ic-style fa fa-info" aria-hidden="true"></i><span class='bord-bot'><?=$link_name?></span>
                                                                            </a>
                                                                        </div>
    
                                                                    <?endif;?>
    
                                                               
                                                                    
                                                                
    
                                                                </div>
    
                                                            </div>
    
                                                        </div>
                                                    </div>
                                                <?endforeach;?>
    
                                            </div>
                                        </div>
                              
                                    <?elseif($arItem["PROPERTIES"]["NEWS_VIEW"]["VALUE_XML_ID"] == "flat"):?>
    
                                        <?
                                            $class = "col-lg-3 col-md-3 col-sm-6 col-xs-12";
    
                                            if($show_menu)
                                                $class = "col-lg-4 col-md-4 col-sm-6 col-xs-12";
                                        ?> 
                                        
                                        <div class="row">
    
                                            <div class="wrap-elements">  
    
                                                <?foreach($arItem["ELEMENTS"] as $k=>$arNews):?>
            
                                                    <div class="<?=$class?>">
                                                        <div class="wrap-element <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
            
                                                            <div class="element">
                                                            
                                                                <?CKraken::admin_setting($arNews, false, $admin_active, $show_setting)?>
                
                                                                <?/*<a href='<?=$arNews["DETAIL_PAGE_URL"]?>' class="wrap-link"></a>*/?>
                                                             
                
                                                                <table>
                                                                    <tr>
                                                                        <td>
                
                                                                            <?$img["src"] = "";?>
                
                                                                            <?if(strlen($arNews["PREVIEW_PICTURE"])>0):?>
                                                                                <?$img = CFile::ResizeImageGet($arNews["PREVIEW_PICTURE"], array('width'=>600, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                            <?endif;?>
    
                                                                            <a href='<?=$arNews["DETAIL_PAGE_URL"]?>' class='hover_shine img-wrap'>
                                                                                <div class='bg-img' <?if(strlen($arNews["PREVIEW_PICTURE"])>0):?> style='background-image: url(<?=$img["src"]?>);'<?endif;?>>
                    
                                                                                    <div class="new-dark-shadow"></div>
                                                                              
                                                                                </div>
                                                                                <div class="shine"></div>
                                                                            </a>
                                                                     
                                                                        </td>
                                                                    </tr>
                                                                </table>
                
                
                                                                <div class="wrap-text">
    
                
                                                                    <?if($arNews["IBLOCK_CODE"] != "concept_kraken_site_action_".SITE_ID && $arItem["PARENT_ON"] == "Y"):?>
                                                                        <div class="section" title='<?=$arNews['SECTION_NAME']?>'>
    
                                                                            <?
    
                                                                                $name = "";
                                                                                $link_news = "";
    
                                                                                if(strlen($arSection['BNA'][$arNews['IBLOCK_SECTION_ID']]['NAME'])>0)
                                                                                {
                                                                                    
                                                                                    $name = $arSection['BNA'][$arNews['IBLOCK_SECTION_ID']]['~NAME'];
                                                                                    $link_news = $arSection['BNA'][$arNews['IBLOCK_SECTION_ID']]['SECTION_PAGE_URL'];
                                                                                }
                                                                                else
                                                                                {
                                                                                    
                                                                                    $name_def = "NEWS";
                                                                                    $link_news = "/news/";
                                                                                    
                                                                                    if($arNews["IBLOCK_CODE"] == "concept_kraken_site_history_".SITE_ID)
                                                                                    {
                                                                                        
                                                                                        $name_def = "BLOG";
                                                                                        $link_news = "/blog/";
                                                                                    }
    
                                                                                    $name = GetMessage("KRAKEN_DEF_".$name_def);
    
                                                                                }
    
                                                                            ?>
    
                                                                            <a href='<?=$link_news?>' class="wrap-link-sect"><?=$name?></a>
                                                                        </div>
    
                                                                    
                                                                    <?endif;?>
    
                                                                    <?if($arNews["IBLOCK_CODE"] == "concept_kraken_site_action_".SITE_ID):?>
    
                                                                        <div class="date-action">
                                                                            
                                                                            <?if(getmicrotime() > MakeTimeStamp($arNews["ACTIVE_TO"]) && strlen($arNews["ACTIVE_TO"]) > 0):?>
    
                                                                                <span class="off"><?=GetMessage("KRAKEN_ACT_OFF")?></span>
    
                                                                            <?else:?>
    
                                                                                <?if(strlen($arNews["ACTIVE_TO"])>0):?>
    
                                                                                    <span class="to"><?=GetMessage("KRAKEN_ACT_ON_TO")?><?echo CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arNews["ACTIVE_TO"], CSite::GetDateFormat()));?></span>
    
                                                                                <?else:?>
    
                                                                                    <span><?=GetMessage("KRAKEN_ACT_ON")?></span>
    
                                                                                <?endif;?>
    
                                                                            <?endif;?>
    
                                                                        </div>
    
                                                                    <?endif;?>
    
    
    
                                                                    <a href='<?=$arNews["DETAIL_PAGE_URL"]?>'>
                                                                        <div class="new-name bold"><?=$arNews['~NAME']?></div>
                                                                    </a>
                
                
                                                                    <?if($arItem["SHOW_SUBNAME"] > 0 && strlen($arNews["ACTIVE_FROM"]) > 0):?>
                                                                    
                                                                    
                                                                        <div class="date">
                                                                            <?if($arNews["IBLOCK_CODE"] != "concept_kraken_site_action_".SITE_ID):?>
    
                                                                                <?if(strlen($arNews["ACTIVE_FROM"])>0):?>
                                                                                    <?echo CIBlockFormatProperties::DateFormat("j F Y", MakeTimeStamp($arNews["ACTIVE_FROM"], CSite::GetDateFormat()));?>
                                                                                <?endif;?>
    
                                                                            <?endif;?>
                                                                        </div>
                                                                    
                                                                        
                                                                    <?endif;?>
                
                
                                                                    <?if(!empty($arNews["PROPERTIES"]["NEWS_DETAIL_TEXT"]["~VALUE"])):?>
                                                                        <a href='<?=$arNews["DETAIL_PAGE_URL"]?>'>
                                                                            <div class="new-text"><?=$arNews["PROPERTIES"]["NEWS_DETAIL_TEXT"]["~VALUE"]["TEXT"]?></div>
                                                                        </a>
                                                                    <?endif;?>
                
                                                                </div>
                
                                                            </div>
    
                                                            <div class="new-shadow"></div>
    
                                                        </div>
            
                                                   </div>
            
                                                    <?if(!$show_menu):?>
            
                                                        <?if(($k+1) % 4 == 0):?>
                                                            <span class="clearfix hidden-sm"></span>
                                                        <?endif;?>
            
                                                        <?if(($k+1) % 2 == 0):?>
                                                            <span class="clearfix visible-sm"></span>
                                                        <?endif;?>
            
                                                    <?else:?>
            
                                                        <?if(($k+1) % 3 == 0):?>
                                                            <span class="clearfix hidden-sm"></span>
                                                        <?endif;?>
            
                                                        <?if(($k+1) % 2 == 0):?>
                                                            <span class="clearfix visible-sm"></span>
                                                        <?endif;?>
            
                                                    <?endif;?>
            
            
            
                                                   
            
                                                <?endforeach;?>
    
                                            </div> 
                                        
                                        </div>
    
                                    <?endif;?>
                                
                                    </div><!-- ^container -->
    
                                </div>
                                
                            <?endif;?>
                            
    
                            <div class="<?if(!$show_menu):?>container<?endif;?>">
                            
                                <div class="<?if(!$show_menu):?>row<?endif;?>">
    
                          
                        <?endif;?>
                        <?//news end?>
    
                        <?//faq?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "faq"):?>
                            
                            <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>
    
                                <?if($show_menu):?>
    
                                    <?
                                        $class1="";
                                        $class2="col-lg-8 col-md-8 col-sm-8 col-xs-12";
                                        $class3="col-lg-4 col-md-4 col-sm-4 col-xs-12";
    
                                    if($arItem["PROPERTIES"]["FAQ_PICTURE"]["VALUE"] > 0)
                                    {

                                        $class1="col-lg-2 col-md-2 col-sm-2 col-xs-12";
                                        $class2="col-lg-6 col-md-6 col-sm-6 col-xs-12 with-photo";
                                    }
                                    ?>
    
                                    <div class="faq-block <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>">
    
                                        <div class="faq-table clearfix">
    
                                            <?if($arItem["PROPERTIES"]["FAQ_PICTURE"]["VALUE"] > 0):?>
    
    
                                                <div class="faq-cell <?=$class1?> left">
    
    
                                                    <table>
                                                        <tr>
                                                            <td>
    
                                                                <?$img_big = CFile::ResizeImageGet($arItem["PROPERTIES"]["FAQ_PICTURE"]["VALUE"], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_EXACT, false);?>
    
                                                                <img alt="" class="img-responsive center-block" src="<?=$img_big["src"]?>">
    
                                                                <?/*<img alt="" class="img-responsive center-block" src="<?=SITE_TEMPLATE_PATH?>/images/faqq.png">*/?>
                                                                
                                                            </td>
                                                        </tr>
                                                    </table>
    
                                                    
                                                </div>   
    
                                            <?endif;?>      
    
    
                                        
                                            <div class="faq-cell <?=$class2?> center">
                                                <div class="wrap-faqtext">
    
                                                    <?if(strlen($arItem["PROPERTIES"]["FAQ_NAME"]["VALUE"])):?>
                                                        <div class="name bold"><?=$arItem["PROPERTIES"]["FAQ_NAME"]["~VALUE"]?></div>
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["FAQ_PROF"]["VALUE"])):?>
                                                        <div class="desc italic"><?=$arItem["PROPERTIES"]["FAQ_PROF"]["~VALUE"]?></div>
                                                    <?endif;?>
    
                                                </div>
                                                
                                            </div>
                                         
    
    
                                            <div class="faq-cell <?=$class3?> right">
                                                <?if($arItem["BUTTON_CHANGE"]):?>
                                                    <?CreateButton($arItem, false);?>
                                                <?endif;?>
                                                
                                            </div>
                                        </div>
    
                                        <div class="quest-part">
                                            <div class="faq">
    
                                                <?foreach($arItem["ELEMENTS"] as $k=>$arFaq):?>
                                                    <div class="faq-element quest-parent <?if($k == 0):?> active <?endif;?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
                                                        
                                                        <?CKraken::admin_setting($arFaq, false, $admin_active, $show_setting)?>
    
                                                        <div class="question quest-click">
                                                            <span><?=$arFaq["~NAME"]?></span>
                                                        </div>
    
                                                        <div class="text text-content italic quest-text">
                                                            <?=$arFaq["~PREVIEW_TEXT"]?>
                                                        </div>
                                                    </div>
                                                <?endforeach;?>
    
                                            </div>
                                        </div>
    
                                  
                                        
                                    </div>
    
                                <?else:?>
    
                                    <div class="faq-block col-lg-12 col-md-12 col-sm-12 col-xs-12 <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>">
                                        <div class="row">
    
                                            <?CKraken::admin_setting($arItem, false, $admin_active, $show_setting)?>
    
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                <div class="photo">
    
                                                    <?if($arItem["PROPERTIES"]["FAQ_PICTURE"]["VALUE"] > 0):?>
                                                        <?$img_big = CFile::ResizeImageGet($arItem["PROPERTIES"]["FAQ_PICTURE"]["VALUE"], array('width'=>700, 'height'=>1096), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                        <img alt="" class="img-responsive center-block" src="<?=$img_big["src"]?>">
                                                    <?else:?>
                                                        <img alt="" class="img-responsive center-block" src="<?=SITE_TEMPLATE_PATH?>/images/faqq.png">
                                                    <?endif;?>
    
                                                    <?if(strlen($arItem["PROPERTIES"]["FAQ_NAME"]["VALUE"]) > 0 || strlen($arItem["PROPERTIES"]["FAQ_PROF"]["VALUE"]) > 0):?>
                                                        <div class="comm">
                                                            <?=GetMessage("KRAKEN_FAQ_DESC")?>
                                                        </div>
                                                    <?endif;?>
                                                   
                                                    <div class="bot">
                                                        
                                                        <div class="wrap">
                                                            <div class="name">
                                                                <?if(strlen($arItem["PROPERTIES"]["FAQ_NAME"]["VALUE"])):?>
                                                                    <span class="main1"><?=$arItem["PROPERTIES"]["FAQ_NAME"]["~VALUE"]?></span><br>
                                                                <?endif;?>
                                                                <?if(strlen($arItem["PROPERTIES"]["FAQ_PROF"]["VALUE"])):?>
                                                                    <span class="prof italic"><?=$arItem["PROPERTIES"]["FAQ_PROF"]["~VALUE"]?></span>
                                                                <?endif;?>
                                                            </div>
                                                        </div>
                                                    
    
                                                        <div class="hidden-sm">
                                                            <?if($arItem["BUTTON_CHANGE"]):?>
                                                                <?CreateButton($arItem, false);?>
                                                            <?endif;?>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                <div class="l_wrap">
                                                    <div class="faq">
    
                                                        <?foreach($arItem["ELEMENTS"] as $k=>$arFaq):?>
                                                            <div class="faq-element quest-parent <?if($k == 0):?> active <?endif;?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
    
                                                                
                                                                
                                                                <?CKraken::admin_setting($arFaq, false, $admin_active, $show_setting)?>
                                                                
    
                                                                <div class="question quest-click">
                                                                    <span><?=$arFaq["~NAME"]?></span>
                                                                </div>
    
    
                                                                <div class="text text-content italic quest-text">
                                                                    <?=$arFaq["~PREVIEW_TEXT"]?>
                                                                </div>
                                                            </div>
                                                        <?endforeach;?>
    
    
    
                                                        <div class="btn_wrap visible-sm visible-xs">
                                                            <?if($arItem["BUTTON_CHANGE"]):?>
                                                                <?CreateButton($arItem, false);?>
                                                            <?endif;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
    
                                <?endif;?>
    
    
    
                            <?endif;?>
                        <?endif;?>
                        <?//faq end?>
    
                        <?//catalog?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "catalog"):?>
                            
                        
                            <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>

             
                                
                                <div class="catalog-block tab-control <?if(!isset($_COOKIE['__kraken_cart_'.SITE_ID]) && $KRAKEN_TEMPLATE_ARRAY["CART_ADD_ON"]["VALUE"][0] == "Y"):?>first-click-cart-on first-click-cart<?endif;?>">
                                    
                                    <div class="catalog-content-wrap">
                                    
                                        <div class="tabb-content-wrap">
                                            <div class="<?if(!$show_menu):?>container<?endif;?>">

                                                <?
                                                    $two_cols = false;

                                                    if($KRAKEN_TEMPLATE_ARRAY["CATALOG_VIEW_XS"]["VALUE"] == "")
                                                        $KRAKEN_TEMPLATE_ARRAY["CATALOG_VIEW_XS"]["VALUE"] = "6";

                                                    if($arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"] == "")
                                                        $arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"] = $KRAKEN_TEMPLATE_ARRAY["CATALOG_VIEW_XS"]["VALUE"];

                                                    if($arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"] == "6")
                                                        $two_cols = true;
                                                    
                                                    if($KRAKEN_TEMPLATE_ARRAY["CATALOG_VIEW_XS"]["VALUE"] == "6" && strlen($arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"])<=0)
                                                        $two_cols = true;
                                                    
                                                    
                                                ?>
                                              
                                                <?$count = count($arItem["ELEMENTS"]);?>
    
                                                <?$class_col = "col-lg-4 col-md-4 col-sm-6 col-xs-".$arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"];?>
                                          
                                                <?$class = "";?>
    
                                                <?if(!$show_menu):?>
    
                                                    <?$class_col = "col-lg-3 col-md-3 col-sm-4 col-xs-".$arItem["PROPERTIES"]["CATALOG_VIEW_XS"]["VALUE_XML_ID"];?>
                                                
                                                    <?if($count == 1):?>
                                                        <?$class = "col-lg-offset-four col-md-offset-four col-sm-offset-four";?>
                                                    <?elseif($count == 2):?>
                                                        <?$class = "col-lg-offset-3 col-md-offset-3 col-sm-offset-0 col-xs-offset-0";?>
                                                    <?elseif($count == 3):?>
                                                        <?$class = "col-lg-offset-one col-md-offset-one";?>
                                                    <?endif;?>
    
                                                <?endif;?>
            
                                                <div class="tabb-content active no-tab">
    
                                                    <div class="element-list show-hidden-parent <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?> <?if($two_cols):?>two-cols<?else:?>one-col<?endif;?>">
                                                        <div class="<?if($show_menu):?>row <?endif;?>clearfix">
    
                                                            <?foreach($arItem["ELEMENTS"] as $key=>$arElement):?>
                                                           
                                                               
                                                                <div class="<?=$class_col?> show-hidden-child <?if($key == 0):?><?=$class;?><?endif;?> <?if($key > 7):?>hidden<?endif;?> <?if($key > 5):?>hidden-sm<?endif;?> element-parent">
                                                                    
                                                                    
                                                                    <div class="element-outer elem-hover">
                                    
                                                                        <div class="element elem-hover-height-more <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
                                                        
                                                                            <div class="element-inner elem-hover-height">

                                                                                <?if(!$two_cols):?><div class="row clearfix"><?endif;?>
                                                                            
                                                                                    <?CKraken::admin_setting($arElement, false, $admin_active, $show_setting)?>
                                                                                    
                                                                                    <div class="image-wrap <?if(!$two_cols):?>col-lg-12 col-md-12 col-sm-12 col-xs-5<?endif;?>">
        
                                                                                        <table>
                                                                                            <tr>
                                                                                                <td class="parent_anim_img_area">
                                                                                                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                                                                                        
                                                                                                        <?if(empty($arElement["PROPERTIES"]["MORE_PHOTO"]["VALUE"])):?>

                                                                                                        
                                                                                                            <img alt="<?=$arElement["NAME"]?>" class="img-responsive center-block animate_to_box" src="<?=SITE_TEMPLATE_PATH?>/images/ufo.jpg" data-cart-id-img="<?=$arElement["ID"]?>"/>
                                                                                                        <?else:?>
                                                                                                            
                                                                                                            <?if($arElement["PROPERTIES"]["RESIZE_IMAGES"]["VALUE_XML_ID"] == "scale"):?>
                                                                                                                <?$file = CFile::ResizeImageGet($arElement["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>300, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, false, Array(), false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]);?>
                                                                                                            <?else:?>
                                                                                                                <?$file = CFile::ResizeImageGet($arElement["PROPERTIES"]["MORE_PHOTO"]["VALUE"][0], array('width'=>300, 'height'=>262), BX_RESIZE_IMAGE_EXACT, false, Array(), false, $KRAKEN_TEMPLATE_ARRAY["PICTURES_QUALITY"]["VALUE"]);?>
                                                                                                            <?endif;?>
                                                                                                            
                                                                                                            <img alt="<?=$arElement["NAME"]?>" class="img-responsive center-block animate_to_box" src="<?=$file["src"]?>" data-cart-id-img="<?=$arElement["ID"]?>">
                                                                                                            
                                                                                                        <?endif;?>
                                                                                                    
                                                                                                        
                                                                                                    </a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                        
                                                                                        <?if(!empty($arElement["PROPERTIES"]["LABELS"]["VALUE_XML_ID"])):?>
                                                                                        
                                                                                            <div class="icons-wrap">
                                                                                                
                                                                                                <?foreach($arElement["PROPERTIES"]["LABELS"]["VALUE_XML_ID"] as $k=>$xml_id):?>
                                                                                                    <div class="icon ic_<?=$xml_id?>" title="<?=$arElement["PROPERTIES"]["LABELS"]["VALUE"][$k]?>"></div>
                                                                                                <?endforeach;?>
                                                            
                                                                                            </div>
                                                                                        
                                                                                        <?endif;?>
                                                                                    </div>

                                                                                    <div class="bot-part <?if(!$two_cols):?>col-lg-12 col-md-12 col-sm-12 col-xs-7<?endif;?>">
                                                            
                                                            
                                                                                        <div class="name"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["~NAME"]?></a></div>
            
                                                                                        <?if(strlen($arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"])>0 || strlen($arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"])>0):?>

                                                                                            <div class="price-table">

                                                                                                <?if(strlen($arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"])>0 && $arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y"):?>
                                                                                                    <div class="price-cell old-price">
                                                                                                        <?=$arElement["PROPERTIES"]["CUR_OLD_PRICE"]["VALUE"]?>
                                                                                                    </div>
                                                                                                <?endif;?>

                                                                                                <?if(strlen($arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"])>0 || $arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] == "Y"):?>
                                                                                                
                                                                                                    <div class="price-cell price <?if($arElement["PROPERTIES"]["OLD_PRICE"]["VALUE"] > 0 && $arElement["PROPERTIES"]["REQUEST_PRICE"]["VALUE"] != "Y"):?>red-color<?endif;?>">
                                                                                                        <?=$arElement["PROPERTIES"]["CUR_PRICE"]["VALUE"]?>
                                                                                                    </div>
                                                                                                <?endif;?>
                                                                                              
                                                                                            </div>

                                                                                        <?endif;?>
                                                                                    </div>

                                                                                <?if(!$two_cols):?></div><?endif;?>
                                                        
                                                                            </div>
                                                                           
                                                        
                                                        
                                                                            <div class="btn-detail-wrap elem-hover-show">

                                                                                <?if($KRAKEN_TEMPLATE_ARRAY["CART_ON"]["VALUE"][0] == "Y" && $arElement["PROPERTIES"]["CART_ADD_ON"]["VALUE"] == "Y" ):?>

                                                                                    <?
                                                                                        $btn_name = GetMessage("LAND_CART_BTN_ADD_NAME");

                                                                                        if(strlen($arElement["PROPERTIES"]["CART_BTN_NAME"]["~VALUE"]) > 0)
                                                                                            $btn_name = $arElement["PROPERTIES"]["CART_BTN_NAME"]["~VALUE"];

                                                                                        else if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADD_NAME"]["~VALUE"]) > 0)
                                                                                            $btn_name = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADD_NAME"]["~VALUE"];



                                                                                        $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                        if(strlen($arElement["PROPERTIES"]["CART_BTN_NAME_ADDED"]["~VALUE"]) > 0)
                                                                                            $btn_name2 = $arElement["PROPERTIES"]["CART_BTN_NAME_ADDED"]["~VALUE"];

                                                                                        else if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                            $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];


                                                                                        $step = $arResult["PROPERTIES"]["CART_PRICE_STEP"]["VALUE"];
                                                                                        if($step <= 0)
                                                                                            $step = 1;

                                                                                        $min_count = $arResult["PROPERTIES"]["CART_MIN_COUNT"]["VALUE"];
                                                                                        if($min_count <= 0)
                                                                                            $min_count = 1;

                                                                                        if($step < $min_count)
                                                                                            $step = $min_count;


                                                                                    ?>
                                                                                    <div class="def-wrap-btn">

                                                                                        <a class="button-def main-color <?=$KRAKEN_TEMPLATE_ARRAY["BTN_VIEW"]['VALUE']?> click_cart" data-cart-id="<?=$arElement["ID"]?>" data-cart-step="<?=$step?>" data-cart-action = "add">

                                                                                            <span class="first">
                                                                                               <span class="txt"><?=$btn_name?></span>
                                                                                            </span>

                                                                                            <span class="second">
                                                                                                <span class="txt"><?=$btn_name2?></span>
                                                                                            </span>
                                                                                            
                                                                                        </a>

                                                                                    </div>

                                                                                <?endif;?>

                                                                                <?
                                                                                    $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                                                                                    if($arElement["PROPERTIES"]["ORDER_FORM"]["VALUE"] > 0)
                                                                                        $form_id = $arElement["PROPERTIES"]["ORDER_FORM"]["VALUE"];
                                                                                ?>
                                                                                
                                                                                <?if($arElement["PROPERTIES"]["DONT_SHOW_FORM"]["VALUE"] != "Y" && $form_id != "N"):?>
                                                                                
                                                                                    <a class="button-def main-color more-modal-info <?=$KRAKEN_TEMPLATE_ARRAY["BTN_VIEW"]['VALUE']?> <?if(strlen($form_id)>0):?>call-modal callform<?endif;?> catalog" data-call-modal="form<?=$form_id?>" data-header="<?=$block_name?>" data-element-type = "CTL" data-element-id="<?=$arElement["ID"]?>">
                                                                                        <?if(strlen($arElement["PROPERTIES"]["BUTTON_NAME"]["VALUE"]) > 0):?>
                                                                                            <?=$arElement["PROPERTIES"]["BUTTON_NAME"]["~VALUE"]?>
                                                                                        <?else:?>
                                                                                            <?=$KRAKEN_TEMPLATE_ARRAY["CTLG_BTN"]["~VALUE"]?>
                                                                                        <?endif;?>
                                                                                    </a> 
                                                                                
                                                                                <?endif;?>
    
                                                                                <?if(strlen($KRAKEN_TEMPLATE_ARRAY["CTLG_MORE"]["VALUE"]) > 0):?>
    
                                                                                    <a class="link-def" href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                                                                        <i class="ic-style fa fa-info" aria-hidden="true"></i><span class="bord-bot"><?=$KRAKEN_TEMPLATE_ARRAY["CTLG_MORE"]["~VALUE"]?></span>
                                                                                    </a>
    
                                                                                <?endif;?>
                                                        
                                                                                
                                                        
                                                                            </div>
                                                                        </div>
                                                        
                                                                    </div>
                                                                </div>
    
                                                                <?if($show_menu):?>
    
                                                                    <?if(($key+1) % 3 == 0):?>
                                                                        <span class="clearfix hidden-sm hidden-xs"></span>
                                                                    <?endif;?>
    
                                                                    <?if(($key+1) % 2 == 0):?>
                                                                        <span class="clearfix visible-sm visible-xs"></span>
                                                                    <?endif;?>
    
                                                             
    
                                                                <?else:?>
    
                                                                    <?if(($key+1) % 4 == 0):?>
                                                                        <span class="clearfix hidden-sm hidden-xs"></span>
                                                                    <?endif;?>
    
                                                                    <?if(($key+1) % 3 == 0):?>
                                                                        <span class="clearfix visible-sm"></span>
                                                                    <?endif;?>
    
                                                                    <?if(($key+1) % 2 == 0):?>
                                                                        <span class="clearfix visible-xs"></span>
                                                                    <?endif;?>
    
                                                                <?endif;?>
    
                                                                
    
                                                            <?endforeach;?>
    
    
                                                        </div>
    
                                                        <div class="catalog-button-wrap center <?if($count > 8):?>visible-lg visible-md visible-xs<?endif;?> <?if($count > 6):?>visible-sm <?else:?>hidden<?endif;?>" >
        
                                                            <a class="button-def <?=$btn_view?> secondary big show-hidden"><?=GetMessage("KRAKEN_SHOW_ALL")?></a>
                                                            
                                                        </div>
    
    
                                                    </div>
                                              
                                                </div>
            
            
                                            </div>
                                        </div>
                                        
                                    </div>
    
                                    <?if($arItem["BUTTON_CHANGE"]):?>
                                        <?=CreateButton($arItem, $show_menu, false)?>
                                    <?endif;?>
                                
                                </div>
                                
                            <?endif;?>
    
    
                        <?endif;?>
                        <?//catalog end?>
    
    
    
                        <?//map?>
    
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "map"):?>
    
                          
                                </div><!-- ^container -->
                            </div><!-- ^row -->
    
                        
    
                
                            <div class="map-block <?if(!strlen($arItem["PROPERTIES"]["MAP"]["VALUE"]) > 0):?>no-map<?endif;?>">
    
                                <?if($arItem["PROPERTIES"]["MAP_VIEW"]["VALUE_XML_ID"] == "info-on-map" && strlen($arItem["PROPERTIES"]["MAP"]["VALUE"]) > 0):?>
    
                                    <div class="map-descript-wrap">
    
                                        
                                        <div class="<?if(!$show_menu):?>container<?endif;?>">
                                        
    
                                            <div class="row">
    
                                                <?if(strlen($arItem["PROPERTIES"]["MAP_NAME"]["VALUE"]) > 0 || !empty($arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"]) || strlen($arItem["PROPERTIES"]["MAP_ADDRESS"]["~VALUE"]) > 0):?>
    
                                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"> 
    
                                                        <table class="wrap-table">
                                                            <tr>
                                                                <td>
    
                                                                    <div class="map-descript">
    
                                                                        <?if(strlen($arItem["PROPERTIES"]["MAP_NAME"]["VALUE"]) > 0):?>
    
                                                                            <div class="name">
                                                                                <?=$arItem["PROPERTIES"]["MAP_NAME"]["~VALUE"]?>
                                                                            </div>
    
                                                                        <?endif;?>
    
    
                                                                        <div class="text-table-wrap">
    
                                                                            <?if(strlen($arItem["PROPERTIES"]["MAP_ADDRESS"]["VALUE"]) > 0):?>
    
                                                                                <div class="text-table">
                                                                                   <!--  <div class="text-cell icon icon-point"></div> -->
    
                                                                                    <div class="text-cell text">
    
                                                                                        <?=$arItem["PROPERTIES"]["MAP_ADDRESS"]["~VALUE"]?>
    
                                                                                    </div>
                                                                                </div>
    
                                                                            <?endif;?>
    
                                                                            <?if(!empty($arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"])):?>
    
                                                                                <div class="text-table">
                                                                                    <!-- <div class="text-cell icon icon-phone">
                                                                                    </div> -->
    
    
                                                                                    <div class="text-cell text phone bold">
                                                                                    
                                                                                        <?=implode("<br/>",$arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"])?>
    
    
                                                                                    </div>
                                                                                </div>
    
                                                                            <?endif;?>
    
                                                                            <?if(!empty($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"])):?>
    
                                                                                <div class="text-table">
                                                                                    <!-- <div class="text-cell icon icon-mail">
                                                                                    </div> -->
    
    
                                                                                    <div class="text-cell text e-mail">
                                                                                        <?foreach($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"] as $k => $arMail):?>   
    
                                                                                            <?if($k != 0):?>
                                                                                                <br>
                                                                                            <?endif;?>
    
                                                                                             <a href="mailto:<?=$arMail?>"><?=$arMail?></a>
    
                                                                                        <?endforeach;?>
    
                                                                                        
                                                                                        
                                                                                    </div>
                                                                                </div>
    
                                                                            <?endif;?>
                                                                            <?if(!empty($arItem["PROPERTIES"]["MAP_DESC"]["~VALUE"])):?>
    
                                                                                <div class="text-table">
                                                                                    <div class="text-cell text ">
    
                                                                                        <?=$arItem["PROPERTIES"]["MAP_DESC"]["~VALUE"]["TEXT"]?>
                                                                                         
                                                                                    </div>
                                                                                </div>
    
                                                                            <?endif;?>
                                                                        </div>
    
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                        </table>
    
                                                        
                                                    </div>
    
                                                    <span class="clearfix">  </span>
    
                                                <?endif;?>
    
                                            </div>
    
                    
                                        </div><!-- ^container -->
                                  
    
                                    </div>
    
                                <?else:?>
    
                                    <div class="bot-wrap">
                                        
                                        <div class="<?if(!$show_menu):?>container<?endif;?>">
                                        
    
                                        <?
                                            $class1='col-lg-3 col-md-3 col-sm-6 col-xs-12';
                                            $class2='col-lg-3 col-md-3 col-sm-6 col-xs-12';
                                            $class3='col-lg-3 col-md-3 col-sm-6 col-xs-12';
                                            $class4='col-lg-3 col-md-3 col-sm-6 col-xs-12';
    
                                            if($show_menu)
                                            {
                                                $class1='hidden';
                                                $class2='col-lg-4 col-md-4 col-sm-4 col-xs-12';
                                                $class3='col-lg-4 col-md-4 col-sm-4 col-xs-12';
                                                $class4='col-lg-4 col-md-4 col-sm-4 col-xs-12';
                                            }
                                        ?>
                                        
                                            <div class="text-table-wrap clearfix">
                                                <?if(strlen($arItem["PROPERTIES"]["MAP_NAME"]["VALUE"]) > 0):?>
                                                    <div class="text-cell-wrap <?=$class1?>">
                                                        <div class="name">
                                                            <?=$arItem["PROPERTIES"]["MAP_NAME"]["~VALUE"]?>
                                                        </div>
                                                    </div>
                                                <?endif;?>
    
                                                <?if(strlen($arItem["PROPERTIES"]["MAP_ADDRESS"]["VALUE"]) > 0 || (strlen($arItem["PROPERTIES"]["MAP_NAME"]["VALUE"]) > 0 && $show_menu)):?>
                                                    <div class="text-cell-wrap <?=$class2?>">
                                            
                                                            
                                                        <div class="text">
                                                            <?if(strlen($arItem["PROPERTIES"]["MAP_NAME"]["VALUE"]) > 0 && $show_menu):?>
                                                                <div class="name">
                                                                    <?=$arItem["PROPERTIES"]["MAP_NAME"]["~VALUE"]?>
                                                                </div>
    
                                                            <?endif;?>
                                                            <?=$arItem["PROPERTIES"]["MAP_ADDRESS"]["~VALUE"]?>
                                                        </div>
    
                                                    
                                                    </div>
                                                <?endif;?>
    
                                                <?if(!$show_menu):?>
    
                                                    <span class="clearfix visible-sm"></span>
    
                                                <?endif;?>
    
                                                <?if(!empty($arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"]) || !empty($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"])):?>
                                                    <div class="text-cell-wrap <?=$class3?>">
    
                                                        <div class="text">
    
                                                            <?if(!empty($arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"])):?>
                                                                <div class="phone bold">
                                                                
                                                                    <?=implode("<br/>",$arItem["PROPERTIES"]["MAP_PHONE"]["VALUE"])?>
    
                                                                </div>
                                                            <?endif;?>
    
                                                            <?if(!empty($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"])):?>
                                                                <div class="e-mail">
                                                                    <?foreach($arItem["PROPERTIES"]["MAP_MAIL"]["VALUE"] as $k => $arMail):?>   
    
                                                                        <?if($k != 0):?>
                                                                            <br>
                                                                        <?endif;?>
                                                                        <a href="mailto:<?=$arMail?>"><?=$arMail?></a>
    
                                                                    <?endforeach;?>
                                                                </div>
    
                                                            <?endif;?>
    
                                                        </div>
                                                
                                                    </div>
                                                <?endif;?>
    
    
                                                <?if(!empty($arItem["PROPERTIES"]["MAP_DESC"]["~VALUE"])):?>
                                                    <div class="text-cell-wrap <?=$class4?>">
    
                                                        <div class="text ">
    
                                                            <?=$arItem["PROPERTIES"]["MAP_DESC"]["~VALUE"]["TEXT"]?>
                                                             
                                                        </div>
    
                                                    </div>
    
                                                <?endif;?>
    
                                            </div>
    
                                      
                                        </div><!-- ^container -->
                                   
                                           
                                    </div>
    
                                <?endif;?>
    
    
                                
    
                                <div class="<?if(!$show_menu):?>container<?endif;?>">
    
                                
    
                                    <div class="main-button-wrap center">
                                
                                        <a class="map-show button-def secondary "><?=GetMessage("KRAKEN_MAP_SHOW")?></a>    
                                          
                                    </div>
    
                           
                                </div><!-- ^container -->
                            
                                
                                <?if(strlen($arItem["PROPERTIES"]["MAP"]["VALUE"]) > 0):?>
    
                                    <div class="map-height">
    
                                        <?if (preg_match("<script>", $arItem["PROPERTIES"]["MAP"]["VALUE"])):?>
                                           
                                           <?$map = str_replace("<script ", "<script data-skip-moving='true' ", $arItem["PROPERTIES"]["MAP"]["~VALUE"]);?>
                                           <?=str_replace("scroll=true", "scroll=false", $map);?>
                                           
                                       <?else:?>
                                               
                                           <?if(preg_match("<iframe>", $arItem["PROPERTIES"]["MAP"]["VALUE"])):?>
                                               <div class="overlay" onclick="style.pointerEvents='none'"></div>
                                           <?endif;?>
                                           
                                           <?=$arItem["PROPERTIES"]["MAP"]["~VALUE"];?>
                                                                  
                                       <?endif;?>
             
                                   </div>
    
                                <?endif;?>
                                          
                                
                            </div>
    
                           
    
                            <div class="<?if(!$show_menu):?>container<?endif;?>">
                            
                                <div class="<?if(!$show_menu):?>row<?endif;?>">
    
                          
                        <?endif;?>
    
                        <?//map end?>
    
                        <?//switcher?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "switcher"):?>
                          
                            <?if(!empty($arItem["PROPERTIES"]["SWITCHER_TABNAME"]["~VALUE"])):?>
    
                                   
                                </div><!-- ^row -->
                                    </div><!-- ^container -->
                       
    
                                    <div class="switcher">
    
                                        <?if($arItem["PROPERTIES"]["SWITCHER_VIEW"]["VALUE_XML_ID"] == "tabs-left" || $arItem["PROPERTIES"]["SWITCHER_VIEW"]["VALUE_XML_ID"] == ""):?>
    
                                            
    
                                            <div class="<?if(!$show_menu):?>container<?endif;?>">
    
                                                <div class="row clearfix">
                                                    
                                                    <div class="col-lg-4 col-md-4 col-sm-0 col-xs-0 hidden-sm hidden-xs">
                                                        <ul class="switcher-tab left">
    
                                                        <?foreach($arItem["PROPERTIES"]["SWITCHER_TABNAME"]["~VALUE"] as $k => $arTabs):?>  
                                                            
    
                                                            <li<?if($k == 0):?> class="active"<?endif;?>>
                                                                <span><?=$arTabs;?></span>
                                                            </li>
    
                                                            <?endforeach;?>
                                                            
                                                        </ul>
                                                    </div>
    
                                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <div class="switcher-content-wrap left">
    
                                                            <?foreach($arItem["PROPERTIES"]["SWITCHER_TABNAME"]["~VALUE"] as $k => $arTabs):?>
    
                                                                <div class="switcher-wrap <?if($k == 0):?>active<?endif;?>">
    
                                                                    <div class="switcher-title visible-sm visible-xs <?if($k == 0):?>active<?endif;?>"><?=$arTabs?><div class="main-color"></div></div>   
    
                                                                    <div class="switcher-content text-content <?if($k == 0):?>active<?endif;?>">
                                                                        
                                                                        <?=$arItem["PROPERTIES"]["SWITCHER_HTML"]["~VALUE"][$k]["TEXT"]?>
                                                                    </div>
    
                                                                </div>
                                                            <?endforeach;?>
    
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                          
                                            </div><!-- ^container -->
                                    
    
                                            
    
                                        <?elseif($arItem["PROPERTIES"]["SWITCHER_VIEW"]["VALUE_XML_ID"] == "tabs-up"):?>
    
                                      
    
                                            <div class="<?if(!$show_menu):?>container <?endif;?>hidden-sm hidden-xs">
    
                                        
                                                <ul class="switcher-tab clearfix">
    
                                                    <?foreach($arItem["PROPERTIES"]["SWITCHER_TABNAME"]["~VALUE"] as $k => $arTabs):?>  
                                                
    
                                                    <li class="<?=$class?> <?if($k == 0):?>active <?=$class2?><?endif;?>">
                                                        <span><?=$arTabs;?></span>
                                                    </li>
    
                                                    <?endforeach;?>
                                                    
                                                </ul> 
    
                                           
                                            </div> <!-- ^container -->
                                      
    
                                            <!-- <div class="block-grey-line hidden-sm hidden-xs"></div> -->
    
                                           
                                                <div class="<?if(!$show_menu):?> container<?endif;?>">
                                            
    
                                                <div class="switcher-content-wrap">
                                                    
                                                
                                                    <?foreach($arItem["PROPERTIES"]["SWITCHER_TABNAME"]["~VALUE"] as $k => $arTabs):?>
    
                                                        <div class="switcher-wrap <?if($k == 0):?>active<?endif;?>">
    
                                                            <div class="switcher-title visible-sm visible-xs <?if($k == 0):?>active<?endif;?>"><?=$arTabs?><div class="main-color"></div></div>   
    
                                                            <div class="switcher-content text-content <?if($k == 0):?>active<?endif;?>">
                                                                
                                                                <?=$arItem["PROPERTIES"]["SWITCHER_HTML"]["~VALUE"][$k]["TEXT"]?>
                                                            </div>
    
                                                        </div>
                                                    <?endforeach;?>
    
                                                </div>
    
                                      
                                                </div><!-- ^container -->
                                       
    
                                        <?endif;?>
    
                                    </div>
    
                                <div class="<?if(!$show_menu):?>container<?endif;?>">
                            
                                    <div class="<?if(!$show_menu):?>row<?endif;?>">
                            
    
                                <?endif;?>
                          
                        <?endif;?>
    
                        <?//switcher end?>
    
                        <?//partners?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "partners"):?>
    
                            <?if(is_array($arItem["PROPERTIES"]["PARTNERS"]["VALUE"]) && !empty($arItem["PROPERTIES"]["PARTNERS"]["VALUE"])):?>
    
                            <?
    
                                $countPartners = count($arItem["PROPERTIES"]["PARTNERS"]["VALUE"]);
    
                                $class = "";
                                $offsetClass = "";
    
                                if($countPartners <= 6)
                                {
    
                                    if($countPartners <= 4)
                                    {
                                        $class="col-lg-3 col-md-3 col-sm-4 col-xs-6 big";
                                    }
                                    else
                                    {
                                        $class="col-lg-2 col-md-2 col-sm-4 col-xs-6";
                                    }
    
                                    $arNeed = array(
                                        "0.16" => array("OFFSET"=>"col-lg-offset-four col-md-offset-four col-sm-offset-four col-xs-offset-3"), 
                                        "0.33" => array("OFFSET"=>"col-lg-offset-3 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"), 
                                        "0.5" =>  array("OFFSET"=>"col-lg-offset-one col-md-offset-one col-sm-offset-0 col-xs-offset-0"),
                                        "0.66" =>  array("OFFSET"=>""),
                                        "0.83" =>  array("OFFSET"=>"col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0"));
                            
                                    $residual = strval(floor(($countPartners / 6)*100)/100);
                                    $needKey = 1;
     
                                }
    
                                else
                                {
                                    $class="col-lg-2 col-md-2 col-sm-4 col-xs-6";
    
                                    $arNeed = array(
                                        "0.16" => array("OFFSET"=>"col-lg-offset-5 col-md-offset-5 col-sm-offset-0 col-xs-offset-3", "NUM" => 0), 
                                        "0.33" => array("OFFSET"=>"col-lg-offset-4 col-md-offset-4 col-sm-offset-0 col-xs-offset-0", "NUM" => 1), 
                                        "0.5" =>  array("OFFSET"=>"col-lg-offset-3 col-md-offset-3 col-sm-offset-0 col-xs-offset-0", "NUM" => 2),
                                        "0.66" =>  array("OFFSET"=>"col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0", "NUM" => 3),
                                        "0.83" =>  array("OFFSET"=>"col-lg-offset-1 col-md-offset-1 col-sm-offset-0 col-xs-offset-0", "NUM" => 4));
    
                            
                                    $residual = strval((floor(($countPartners / 6)*100)/100) - (intval($countPartners / 6))) ;
                                    $needKey = $countPartners - $arNeed[$residual]["NUM"];                          
    
                                }
    
                            ?>
    
                            <div class="partners">
    
                                <div class="<?if($show_menu):?>row <?endif;?>clearfix">
    
                                    <?foreach($arItem["PROPERTIES"]["PARTNERS"]["VALUE"] as $k => $arPartner):?>
    
                                        <div class="<?=$class?> <?if(($k+1) == $needKey && !$show_menu):?> <?=$arNeed[$residual]["OFFSET"]?> <?endif;?>">
    
                                        <?if($countPartners <= 4):?>
    
                                            <?$img = CFile::ResizeImageGet($arPartner, array('width'=>360, 'height'=>180), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                        <?else:?>
                                            <?$img = CFile::ResizeImageGet($arPartner, array('width'=>288, 'height'=>144), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                        <?endif;?>
    
                                            <div class="partners-wrap <?=$arItem["PROPERTIES"]["PARTNERS_GRAYSCALE"]["VALUE_XML_ID"]?> ">
    
                                                <table>
                                                    <tr>
                                                        <td><img class="img-responsive" src="<?=$img["src"]?>"></td>
                                                    </tr>
                                                </table>
    
                                                <?if(strlen($arItem["PROPERTIES"]["PARTNERS"]["DESCRIPTION"][$k]) > 0):?>
    
                                                    <div class="partners-part-bot hidden-sm hidden-xs">
                                                        <?=$arItem["PROPERTIES"]["PARTNERS"]["~DESCRIPTION"][$k]?>
                                                    </div>
    
                                                <?endif;?>
    
                                            </div>
                                            
                                        </div>
    
                                        <?if(($k+1) % 2 == 0):?>
                                            <div class="clearfix visible-xs"></div>
                                        <?endif;?>
    
                                        <?if(($k+1) % 3 == 0):?>
                                            <div class="clearfix visible-sm"></div>
                                        <?endif;?>
    
                                        <?if(($k+1) % 6 == 0):?>
    
                                            <div class="clearfix"></div>
    
                                        <?endif;?>
    
                                    <?endforeach;?>
    
                                </div>
    
                            </div>
    
                            <?endif;?>
    
                        <?endif;?>
    
                        <?//partners end?>
    
                        <?//blink?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "blink"):?>
                        
                    
                            <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?> 
    
    
                                <div class="banners-menu big-parent-colls <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>parent-animate<?endif;?>">
                                    <?if($admin_active && $show_setting == 'Y'):?>
    
                                        <div class='change-colls-info'><?=GetMessage('KRAKEN_BLINK_INFO_SAVE')?></div>
    
                                    <?endif;?>
    
                                    
                                    <div class="<?if($show_menu):?>row<?endif;?>">
                                    
    
                                        <div class="frame-wrap clearfix">
    
                                            <?foreach($arItem["ELEMENTS"] as $k=>$arLink):?>
                                                <?$size = array("width" => 280, "height" => 280);?>
                                                <?$cols = 'col-lg-3 col-md-3 col-sm-6 col-xs-12 small';?>
    
                                                <?if($arLink["PROPERTIES"]['BLINK_COLS']['VALUE_XML_ID'] == 'middle'):?>
                                                    <?$size = array("width" => 580, "height" => 280);?>
                                                    <?$cols = 'col-lg-6 col-md-6 col-sm-6 col-xs-12 middle';?>
                                                <?endif;?>
    
                                                <?if($show_menu):?>
    
                                                    <?$cols = 'col-lg-4 col-md-4 col-sm-6 col-xs-12 small';?>
    
                                                    <?if($arLink["PROPERTIES"]['BLINK_COLS']['VALUE_XML_ID'] == 'middle'):?>
                                                        <?$cols = 'col-lg-8 col-md-8 col-sm-6 col-xs-12 middle';?>
                                                    <?endif;?>
    
                                                <?endif;?>
                                                    
                                                    
                                                <?$size2 = array("width" => 400, "height" => 280);?>
                                                <?$size3 = array("width" => 350, "height" => 350);?>
    
    
    
    
                                                <div class="<?=$cols?> parent-change-cools<?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?> child-animate opacity-zero<?endif;?>">
                                                    <input type="hidden" class='colls_code' value="BLINK_COLS">
                                                    <input type="hidden" class='colls_middle' value="<?=$arSection['ENUM_COLLS_BLINK'][0]?>">
                                                    <input type="hidden" class='colls_small' value="<?=$arSection['ENUM_COLLS_BLINK'][1]?>">
                                                    
                                                    <div class="frame <?=$arLink["PROPERTIES"]['BLINK_TEXT_COLOR']['VALUE_XML_ID']?>">
    
    
                                                        <?if($admin_active && $show_setting == 'Y'):?>
    
                                                            <span class='change-colls' data-type='element' data-element-id='<?=$arLink['ID']?>'></span>
    
                                                        <?endif;?>

                                                        <?if(strlen($arLink["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0)

                                                            {
                                                                $form_id = "";
                                                                if($arLink["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"] > 0)
                                                                    $form_id = $arLink["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"];

                                                                if($arLink["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "fast_order")
                                                                {
                                                                    $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                                                                    if($arLink["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"] > 0)
                                                                        $form_id = $arLink["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"];
                                                                }

                                                                $arClass = array();
                                                                $arClass=array(
                                                                    "XML_ID"=> $arLink["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"],
                                                                    "FORM_ID"=> $form_id,
                                                                    "MODAL_ID"=> $arLink["PROPERTIES"]["BLINK_BUTTON_MODAL"]["VALUE"],
                                                                    "QUIZ_ID"=> $arLink["PROPERTIES"]["BLINK_BUTTON_QUIZ"]["VALUE"],
                                                                    "CUR_ELEMENT_ID"=> $arLink["PROPERTIES"]["BLINK_BTN_CATALOG"]["VALUE"]
                                                                );

                                                                $arAttr=array();
                                                                $arAttr=array(
                                                                    "XML_ID"=> $arLink["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"],
                                                                    "FORM_ID"=> $form_id,
                                                                    "MODAL_ID"=> $arLink["PROPERTIES"]["BLINK_BUTTON_MODAL"]["VALUE"],
                                                                    "LINK"=> $arLink["PROPERTIES"]["BLINK_BUTTON_LINK"]["VALUE"],
                                                                    "BLANK"=> $arLink["PROPERTIES"]["BLINK_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                                    "HEADER"=> $block_name,
                                                                    "QUIZ_ID"=> $arLink["PROPERTIES"]["BLINK_BUTTON_QUIZ"]["VALUE"],
                                                                    "LAND_ID"=> $arLink["PROPERTIES"]["BLINK_BTN_LAND"]["VALUE"],
                                                                    "CUR_ELEMENT_ID"=> $arLink["PROPERTIES"]["BLINK_BTN_CATALOG"]["VALUE"]
                                                                );
                                                            }
                                                        ?>
    
                                                        <?if($arLink["PROPERTIES"]['BLINK_LINK_BLOCK']['VALUE'] == 'Y' && strlen($arLink["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0):?>
    
                                                            <a <?if(strlen($arLink["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arLink["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="wrap-link <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>></a><?endif;?>
    
                                                        <?$img = CFile::ResizeImageGet($arLink["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'], array('width'=>900, 'height'=>900), BX_RESIZE_IMAGE_EXACT, false);?>
                    
                                                                      
                                                       <?$img = CFile::ResizeImageGet($arLink["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'], $size, BX_RESIZE_IMAGE_EXACT, true);?>  
                                                        <img class="img hidden-xs hidden-sm" src="<?=$img["src"]?>"  />
                                                        
                                                        
                                                        <?$img = CFile::ResizeImageGet($arLink["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'], $size2, BX_RESIZE_IMAGE_EXACT, true);?>  
                                                        <img class="img visible-sm" src="<?=$img["src"]?>"  />
                                                        
                                                        
                                                        <?$img = CFile::ResizeImageGet($arLink["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'], $size3, BX_RESIZE_IMAGE_EXACT, true);?>  
                                                        <img class="img visible-xs" src="<?=$img["src"]?>"  />      
                                                                
                                                        <div class="small-shadow"></div>
                                                        <div class="frameshadow"></div>
                                                        
                                                        <div class="text">
                                                        
                                                            <div class="cont">
                                                                <div class="name bold"><?=$arLink["PROPERTIES"]['BLINK_TITLE']['~VALUE']?></div>
    
                                                                <?if(!empty($arLink["PROPERTIES"]['BLINK_TEXT']['~VALUE'])):?>
                                                                    <div class="comment"><?=$arLink["PROPERTIES"]['BLINK_TEXT']['~VALUE']["TEXT"]?></div>
                                                                <?endif;?>
                                                            </div>
    
                                                            <?if(strlen($arLink["PROPERTIES"]['BLINK_NAME']['VALUE'])>0 && strlen($arLink["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0):?>
    
                                                                <div class="button">
                                                                    <a <?if(strlen($arLink["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arLink["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>>

                                                                        <?if($arLink["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                            <?
                                                                            
                                                                                $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                    $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                            ?>

                                                                            <span class="first">
                                                                               <?=$arLink["PROPERTIES"]["BLINK_NAME"]["~VALUE"]?>
                                                                            </span>

                                                                            <span class="second">
                                                                                <?=$btn_name2?>
                                                                            </span> 

                                                                        <?else:?>

                                                                            <?=$arLink["PROPERTIES"]['BLINK_NAME']['~VALUE']?>

                                                                        <?endif;?>
                                                                            

                                                                    </a>
                                                                </div>
                                                            <?endif;?>
    
                                                        </div>
                                                        <?CKraken::admin_setting($arLink, false, $admin_active, $show_setting)?>
                                                        
                                                    </div>
                                                </div>
    
                                                <?if(($k+1) % 2 == 0 ):?><div class="clearfix visible-sm"></div><?endif;?>
    
                                            <?endforeach;?>
                                        </div>
    
                             
                                    </div>
                               
    
                                </div>
    
                            <?endif;?>
    
                            <?if($arItem["PROPERTIES"]["BLINK_VIEW"]["VALUE_XML_ID"] == "banner"):?>
                                <div class="banner clearfix">
                                    
                                        <div class="<?if(!$show_menu):?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>">
                                    
                                        <?
                                            $bg = '';
    
                                            if(strlen($arItem["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'])>0)
                                                $bg = CFile::ResizeImageGet($arItem["PROPERTIES"]['BLINK_BACKGROUND']['VALUE'], array('width'=>900, 'height'=>900), BX_RESIZE_IMAGE_PROPORTIONAL, false);
                                        ?>
    
                                        <div class="element" style="background-image: url('<?=$bg["src"]?>');">
                                            <div class="row">
    
                                                <?
                                                    $view = '1';
                                                    $col_img = 'col-lg-3 col-md-3';
                                                    $col_btn = 'col-lg-3 col-md-3';
                                                    $col_text = 'col-lg-6 col-md-6';
    
                                                    $text_ini = false;
                                                    $img_ini = false;
                                                    $btn_ini = false;
    
                                                    if(strlen($arItem["PROPERTIES"]['BLINK_TITLE']['VALUE'])>0 || !empty($arItem["PROPERTIES"]['BLINK_TEXT']['VALUE'])>0)
                                                        $text_ini = true;
    
                                                    if(strlen($arItem["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0 && strlen($arItem["PROPERTIES"]['BLINK_NAME']['VALUE'])>0)
                                                        $btn_ini = true;
    
                                                    if(strlen($arItem["PROPERTIES"]['BLINK_PICTURE']['VALUE'])>0)
                                                        $img_ini = true;
                                                    
    
                                                    if(!$btn_ini)
                                                    {
                                                        $col_btn = 'hidden-lg hidden-md';
                                                        $col_img = 'col-lg-3 col-md-3';
                                                        $col_text = 'col-lg-9 col-md-9';
                                                    }
    
                                                    if(!$img_ini)
                                                    {
                                                        $col_img = 'hidden-lg hidden-md';
                                                        $col_btn = 'col-lg-3 col-md-3';
                                                        $col_text = 'col-lg-9 col-md-9';
                                                    }
    
                                                    if(!$btn_ini && !$img_ini)
                                                    {
                                                        $col_btn = 'hidden-lg hidden-md';
                                                        $col_img = 'hidden-lg hidden-md';
                                                        $col_text = 'col-lg-12 col-md-12';
                                                    }
    
    
                                                    $mark1 = $col_text.'';
                                                    $mark2 = $col_btn.' button';
                                                    $mark3 = $col_img.' image';
    
    
                                                    if($arItem["PROPERTIES"]['BLINK_POSITION']['VALUE_XML_ID'] == 'view2')
                                                    {
                                                        $view = '2';
                                                        $mark1 = $col_btn.' button';
                                                        $mark2 = $col_text.'';
                                                        $mark3 = $col_img.' image';
                                                    }
    
                                                    elseif($arItem["PROPERTIES"]['BLINK_POSITION']['VALUE_XML_ID'] == 'view3')
                                                    {
                                                        $view = '3';
                                                        $mark1 = $col_img.' image';
                                                        $mark2 = $col_btn.' button';
                                                        $mark3 = $col_text.'';
                                                    }
    
                                                    elseif($arItem["PROPERTIES"]['BLINK_POSITION']['VALUE_XML_ID'] == 'view4')
                                                    {
                                                        $view = '4';
                                                        $mark1 = $col_img.' image';
                                                        $mark2 = $col_text.'';
                                                        $mark3 = $col_btn.' button';
                                                    }



                                                    if(strlen($arItem["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0)
                                                    {
                                                        $form_id = "";
                                                        if($arItem["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"] > 0)
                                                            $form_id = $arItem["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"];

                                                        if($arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "fast_order")
                                                        {
                                                            $form_id = $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_CATALOG'];

                                                            if($arItem["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"] > 0)
                                                                $form_id = $arItem["PROPERTIES"]["BLINK_BUTTON_FORM"]["VALUE"];
                                                        }

                                                        $arClass = array();
                                                        $arClass=array(
                                                            "XML_ID"=> $arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"],
                                                            "FORM_ID"=> $form_id,
                                                            "MODAL_ID"=> $arItem["PROPERTIES"]["BLINK_BUTTON_MODAL"]["VALUE"],
                                                            "QUIZ_ID"=> $arItem["PROPERTIES"]["BLINK_BUTTON_QUIZ"]["VALUE"],
                                                            "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BLINK_BTN_CATALOG"]["VALUE"]
                                                        );

                                                        $arAttr=array();
                                                        $arAttr=array(
                                                            "XML_ID"=> $arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"],
                                                            "FORM_ID"=> $form_id,
                                                            "MODAL_ID"=> $arItem["PROPERTIES"]["BLINK_BUTTON_MODAL"]["VALUE"],
                                                            "LINK"=> $arItem["PROPERTIES"]["BLINK_BUTTON_LINK"]["VALUE"],
                                                            "BLANK"=> $arItem["PROPERTIES"]["BLINK_BUTTON_BLANK"]["VALUE_XML_ID"],
                                                            "HEADER"=> $block_name,
                                                            "QUIZ_ID"=> $arItem["PROPERTIES"]["BLINK_BUTTON_QUIZ"]["VALUE"],
                                                            "LAND_ID"=> $arItem["PROPERTIES"]["BLINK_BTN_LAND"]["VALUE"],
                                                            "CUR_ELEMENT_ID"=> $arItem["PROPERTIES"]["BLINK_BTN_CATALOG"]["VALUE"]
                                                        );
                                                    }
                                                ?>
    
                                                <div class="part-wrap <?=$arItem["PROPERTIES"]['BLINK_TEXT_COLOR']['VALUE_XML_ID']?>">
    
                                                    <div class="part col-sm-8 col-xs-12 left <?=$mark1?>">
                                                        <div class="part-inner-wrap">
    
                                                            <div class="hidden-sm hidden-xs unset-margin-top-child">
                                                                <?if($view == '1'):?>
    
                                                                    <?if(strlen($arItem["PROPERTIES"]['BLINK_TITLE']['VALUE'])>0):?>
                                                                        <div class="text bold"><?=$arItem["PROPERTIES"]['BLINK_TITLE']['~VALUE']?></div>
                                                                    <?endif;?>
    
                                                                    <?if(!empty($arItem["PROPERTIES"]['BLINK_TEXT']['VALUE'])):?>
                                                                        <div class="desc"><?=$arItem["PROPERTIES"]['BLINK_TEXT']['~VALUE']["TEXT"]?></div>
                                                                    <?endif;?>
    
                                                                <?elseif($view == '2'):?>
    
                                                                    <?if($btn_ini):?>
                                                                        <a <?if(strlen($arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>>

                                                                            <?if($arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["BLINK_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]['BLINK_NAME']['~VALUE']?>

                                                                            <?endif;?>
                                                                                

                                                                        </a>
    
                                                                    <?endif;?>
    
                                                                <?elseif($view == '3' || $view == '4'):?>
    
                                                                    <?if($img_ini):?>
    
                                                                        <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]['BLINK_PICTURE']['VALUE'], array('width'=>300, 'height'=>2900), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                        <img src="<?=$img['src']?>" alt="" class="img-responsive">
    
                                                                    <?endif;?>
    
                                                                <?endif;?>
                                                            </div>
    
                                                            <noindex>
                                                                <div class="visible-sm visible-xs unset-margin-top-child">
                                                                
                                                                    <?if(strlen($arItem["PROPERTIES"]['BLINK_TITLE']['VALUE'])>0):?>
                                                                        <div class="text bold"><?=$arItem["PROPERTIES"]['BLINK_TITLE']['~VALUE']?></div>
                                                                    <?endif;?>
    
                                                                    <?if(!empty($arItem["PROPERTIES"]['BLINK_TEXT']['VALUE'])):?>
                                                                        <div class="desc"><?=$arItem["PROPERTIES"]['BLINK_TEXT']['~VALUE']["TEXT"]?></div>
                                                                    <?endif;?>
    
                                                                    <?if($btn_ini):?>
                                                                        <a <?if(strlen($arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>>
                                                                            
                                                                            <?if($arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["BLINK_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]['BLINK_NAME']['~VALUE']?>

                                                                            <?endif;?>
                                                                        </a>
                                                                        
                                                                    <?endif;?>
                                                                </div>
                                                            </noindex> 
                                                            
                                                        </div>
                                                    </div>
    
                                                    <div class="part col-sm-0 col-xs-0 center hidden-sm hidden-xs <?=$mark2?>">
    
                                                        <div class="part-inner-wrap">
                                                            <?if($view == '1' || $view == '3'):?>
    
                                                                <?if($btn_ini):?>
                                                                    <a <?if(strlen($arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>>
                                                                        <?if($arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["BLINK_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]['BLINK_NAME']['~VALUE']?>

                                                                            <?endif;?>
                                                                        
                                                                    </a>
                                                                    
                                                                <?endif;?>
    
                                                            <?elseif($view == '2' || $view == '4'):?>
    
                                                                <?if(strlen($arItem["PROPERTIES"]['BLINK_TITLE']['VALUE'])>0):?>
                                                                    <div class="text bold"><?=$arItem["PROPERTIES"]['BLINK_TITLE']['~VALUE']?></div>
                                                                <?endif;?>
    
                                                                <?if(!empty($arItem["PROPERTIES"]['BLINK_TEXT']['VALUE'])):?>
                                                                    <div class="desc"><?=$arItem["PROPERTIES"]['BLINK_TEXT']['~VALUE']["TEXT"]?></div>
                                                                <?endif;?>
    
                                                            <?endif;?>
    
                                                        </div>
                                                    </div>
    
                                                    <div class="part col-sm-4 col-xs-12 right <?=$mark3?>">
                                                        <div class="part-inner-wrap">
                                                            <div class="hidden-sm hidden-xs unset-margin-top-child">
    
                                                                <?if($view == '1' || $view == '2'):?>
    
                                                                    <?if($img_ini):?>
    
                                                                        <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]['BLINK_PICTURE']['VALUE'], array('width'=>300, 'height'=>2900), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                        <img src="<?=$img['src']?>" alt="" class="img-responsive">
                                                                    
                                                                    <?endif;?>
    
                                                                <?elseif($view == '3'):?>
    
                                                                    <?if(strlen($arItem["PROPERTIES"]['BLINK_TITLE']['VALUE'])>0):?>
                                                                        <div class="text bold"><?=$arItem["PROPERTIES"]['BLINK_TITLE']['~VALUE']?></div>
                                                                    <?endif;?>
    
                                                                    <?if(!empty($arItem["PROPERTIES"]['BLINK_TEXT']['VALUE'])):?>
                                                                        <div class="desc"><?=$arItem["PROPERTIES"]['BLINK_TEXT']['~VALUE']["TEXT"]?></div>
                                                                    <?endif;?>
    
                                                                <?elseif($view == '4'):?>
                                                                    <?if($btn_ini):?>
                                                                        <a <?if(strlen($arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>>
                                                                            <?if($arItem["PROPERTIES"]["BLINK_BTN_TYPE"]["VALUE_XML_ID"] == "add_to_cart"):?>

                                                                                <?
                                                                                
                                                                                    $btn_name2 = GetMessage("LAND_CART_BTN_ADDED_NAME");

                                                                                    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"]) > 0)
                                                                                        $btn_name2 = $KRAKEN_TEMPLATE_ARRAY["CART_BTN_ADDED_NAME"]["~VALUE"];
                                                                                ?>

                                                                                <span class="first">
                                                                                   <?=$arItem["PROPERTIES"]["BLINK_NAME"]["~VALUE"]?>
                                                                                </span>

                                                                                <span class="second">
                                                                                    <?=$btn_name2?>
                                                                                </span> 

                                                                            <?else:?>

                                                                                <?=$arItem["PROPERTIES"]['BLINK_NAME']['~VALUE']?>

                                                                            <?endif;?>
                                                                        </a>
                                                                        
                                                                    <?endif;?>
                                                                <?endif;?>
    
                                                            </div>
    
                                                            <noindex>
                                                                <div class="visible-sm visible-xs unset-margin-top-child">
                                                                    <?if($img_ini):?>
    
                                                                        <?$img = CFile::ResizeImageGet($arItem["PROPERTIES"]['BLINK_PICTURE']['VALUE'], array('width'=>300, 'height'=>2900), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                        <img src="<?=$img['src']?>" alt="" class="img-responsive">
                                                                    
                                                                    <?endif;?>
                                                                </div>  
                                                            </noindex>
                                                        </div>
                                                    </div>
    
                                                </div>
    
                                            </div>
    
                                            <?if($arItem["PROPERTIES"]['BLINK_LINK_BLOCK']['VALUE'] == 'Y' && strlen($arItem["PROPERTIES"]['BLINK_BTN_TYPE']['VALUE_XML_ID'])>0):?><a <?if(strlen($arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"])>0) echo "onclick='".$arItem["PROPERTIES"]["BLINK_ONCLICK"]["VALUE"]."'";?> class="wrap-link <?=CKraken::buttonEditClass($arClass)?>" <?=CKraken::buttonEditAttr($arAttr)?>></a><?endif;?>
    
    
                                        </div>
                                
                                    </div>
                                  
                                </div>
                            <?endif;?>
    
                        <?endif;?>
    
                        <?//blink end?>
    
    
                        <?//empl?>
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "empl"):?>
                            <?if(is_array($arItem["ELEMENTS"]) && !empty($arItem["ELEMENTS"])):?>
    
                                <?if($arItem["PROPERTIES"]["EMPL_VIEW"]["VALUE_XML_ID"] == "full"):?>
    
                                    <div class="empl-parent clearfix">
    
                                        <?foreach($arItem["ELEMENTS"] as $k=>$arEmpl):?>
    
    
                                            <div class="empl-full <?if(!$show_menu):?>col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?>">
                                                <?CKraken::admin_setting($arEmpl, false, $admin_active, $show_setting)?>
    
                                                <?if(strlen($arEmpl["PROPERTIES"]["EMPL_DESC"]["~VALUE"])>0):?>
    
    
                                                    <div class="empl-desc <?if($arItem["PROPERTIES"]["EMPL_PICTURE_POSITION"]["VALUE_XML_ID"] == 'left'):?> col-lg-offset-4 col-md-offset-4 col-sm-offset-0 col-xs-offset-0<?endif;?> col-lg-8 col-md-8 col-sm-12 col-xs-12" title='<?=$arEmpl["PROPERTIES"]["EMPL_DESC"]["~VALUE"]?>'><?=$arEmpl["PROPERTIES"]["EMPL_DESC"]["~VALUE"]?></div>
    
                                                <?endif;?>
    
                                                <div class="empl-table">
    
                                                    <?if($arItem["PROPERTIES"]["EMPL_PICTURE_POSITION"]["VALUE_XML_ID"] == 'left'):?>
    
                                                        <div class="empl-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 left hidden-sm hidden-xs">
                                                            <noindex>
    
                                                                <div class="bg-fone"></div>
    
                                                                <div class="container-photo">
    
                                                                 
    
                                                                    <div class="wrap-photo">
    
                                                                        <?$mainimg["src"] = SITE_TEMPLATE_PATH.'/images/empl.jpg';?>
    
                                                                        <?if(strlen($arEmpl["PREVIEW_PICTURE"])>0):?>
                                                                            <?$mainimg = CFile::ResizeImageGet($arEmpl["PREVIEW_PICTURE"], array('width'=>350, 'height'=>350), BX_RESIZE_IMAGE_EXACT, false);?>
                                                                        <?endif;?>
                                                                        
    
                                                                        <img class="img-responsive center-block<?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?> wow zoomIn<?endif;?>" src="<?=$mainimg["src"]?>" alt='<?=$arEmpl['NAME']?>'>
                                                                        <div class="icon-center main-color"><span></span></div>
                                                                    </div>
                                                                 
    
                                                                    <?if(strlen($arEmpl["~DETAIL_TEXT"])>0):?>
                                                                        <div class="empl-under-desc italic"><?=$arEmpl["~DETAIL_TEXT"]?></div>
                                                                    <?endif;?>
    
                                                                    <?if(strlen($arEmpl["DETAIL_PICTURE"])>0):?>
    
                                                                        <?$underimg = CFile::ResizeImageGet($arEmpl["DETAIL_PICTURE"], array('width'=>600, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                                                        <img src="<?=$underimg["src"]?>" class="img-responsive center-block under" alt='<?=$arEmpl['NAME']?>'>
    
                                                                    <?endif;?>
    
                                                                </div>
    
    
    
                                                            </noindex> 
                                                        </div>
    
                                                    <?endif;?>
    
    
    
                                                    <div class="empl-cell col-lg-8 col-md-8 col-sm-12 col-xs-12 center">
                                                        <div class="empl-name bold"><?=$arEmpl["~NAME"]?></div>
    
                                                        <?if(strlen($arEmpl["~PREVIEW_TEXT"])>0):?>
                                                            <div class="line main-color"></div>
                                                            <div class="empl-text"><?=$arEmpl["~PREVIEW_TEXT"]?></div>
                                                        <?endif;?>
    
                                                        <?if((strlen($arEmpl["PROPERTIES"]["EMPL_BTN_NAME"]["~VALUE"])>0 && strlen($arEmpl["PROPERTIES"]["EMPL_FORMS"]["~VALUE"])>0) || strlen($arEmpl["PROPERTIES"]["EMPL_PHONE"]["~VALUE"])>0 || strlen($arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"])>0):?>
    
    
                                                            <div class="wrap-info">
                                                                <div class="row">
    
                                                                    <div class="empl-table-in">
    
                                                                        <?
                                                                        $class1='col-lg-4 col-md-4 col-sm-12 col-xs-12';
    
                                                                        if($show_menu)
                                                                            $class1='col-lg-6 col-md-6 col-sm-12 col-xs-12';
                                                                        
                                                                        ?>
                                                                            
                                                                        <?if(strlen($arEmpl["PROPERTIES"]["EMPL_BTN_NAME"]["~VALUE"])>0 && strlen($arEmpl["PROPERTIES"]["EMPL_FORMS"]["VALUE"])>0):?>
    
                                                                            <div class="empl-cell-in <?=$class1?> left">
                                                                                <a class="button-def main-color <?=$btn_view?> call-modal callform" data-call-modal="form<?=$arEmpl["PROPERTIES"]["EMPL_FORMS"]["VALUE"]?>" data-header="<?=$block_name?>" title='<?=$arEmpl["PROPERTIES"]["EMPL_BTN_NAME"]["VALUE"]?>'><?=$arEmpl["PROPERTIES"]["EMPL_BTN_NAME"]["~VALUE"]?></a>
                                                                            </div>
                                                                        <?endif;?>
    
                                                                        <?if(strlen($arEmpl["PROPERTIES"]["EMPL_PHONE"]["~VALUE"])>0 || ($show_menu && strlen($arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"])>0)):?>
                                                                            <div class="<?=$class1?> empl-cell-in center">
                                                                                <?if(strlen($arEmpl["PROPERTIES"]["EMPL_PHONE"]["~VALUE"])>0):?>
    
                                                                                    <div class="empl-phone bold"><span title='<?=$arEmpl["PROPERTIES"]["EMPL_PHONE"]["VALUE"]?>'>
                                                                                        <?$phone=preg_replace('/[^0-9+]/', '', $arEmpl['PROPERTIES']['EMPL_PHONE']['VALUE']);?>
    
                                                                                        <a href="tel:<?=$phone?>"><?=$arEmpl['PROPERTIES']['EMPL_PHONE']['~VALUE']?></a>
                                                                                    </span></div>
    
                                                                                <?endif;?>
    
                                                                                <?if(strlen($arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]) > 0 && $show_menu):?>
                                                                                    <div class="empl-email"><a href="mailto:<?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]?>"><span class="bord-bot" title='<?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["VALUE"]?>'><?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]?></span></a></div>
                                                                                <?endif;?>
                                                                            </div>
                                                                        <?endif;?>
    
                                                                        <?if(strlen($arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]) > 0 && !$show_menu):?>
                                                                            <div class="<?=$class1?> empl-cell-in right">
                                                                                <div class="empl-email"><a href="mailto:<?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]?>" title='<?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["VALUE"]?>'><span class="bord-bot"><?=$arEmpl["PROPERTIES"]["EMPL_EMAIL"]["~VALUE"]?></span></a></div>
                                                                            </div>
                                                                        <?endif;?>
    
                                                                    </div>
                                                              
                                                                </div>
                                                            </div>
    
                                                        <?endif;?>
                                                    </div>
    
    
    
                                                    <div class="empl-cell col-lg-4 col-md-4 col-sm-12 col-xs-12 <?if($arItem["PROPERTIES"]["EMPL_PICTURE_POSITION"]["VALUE_XML_ID"] == 'left'):?> hidden-lg hidden-md<?endif;?> right">
                                                        <div class="bg-fone"></div>
    
                                                        <div class="container-photo">
    
                                                            
    
                                                            <div class="wrap-photo">
                                                                <?$mainimg["src"] = SITE_TEMPLATE_PATH.'/images/empl.jpg';?>
    
                                                                <?if(strlen($arEmpl["PREVIEW_PICTURE"])>0):?>
                                                                    <?$mainimg = CFile::ResizeImageGet($arEmpl["PREVIEW_PICTURE"], array('width'=>350, 'height'=>350), BX_RESIZE_IMAGE_EXACT, false);?>
                                                                <?endif;?>
    
                                                                
                                                              
    
                                                                <img class="img-responsive center-block<?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?> wow zoomIn<?endif;?>" src="<?=$mainimg["src"]?>" alt='<?=$arEmpl['NAME']?>'>
                                                                <div class="icon-center main-color"><span></span></div>
                                                            </div>
                                                         
    
                                                            <?if(strlen($arEmpl["~DETAIL_TEXT"])>0):?>
                                                                <div class="empl-under-desc italic"><?=$arEmpl["~DETAIL_TEXT"]?></div>
                                                            <?endif;?>
    
                                                            <?if(strlen($arEmpl["DETAIL_PICTURE"])>0):?>
    
                                                                <?$underimg = CFile::ResizeImageGet($arEmpl["DETAIL_PICTURE"], array('width'=>600, 'height'=>400), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
    
                                                                <img src="<?=$underimg["src"]?>" class="img-responsive center-block under" alt='<?=$arEmpl['NAME']?>'>
    
                                                            <?endif;?>
    
                                                        </div>
                                                        
                                                    </div>
                                                </div>
    
                                            </div>
    
                                        <?endforeach;?>
    
                                    </div>
    
                                <?else:?>
                                    <div class="empl<?if(!$show_menu):?> col-lg-12 col-md-12 col-sm-12 col-xs-12<?endif;?><?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?> parent-animate<?endif;?>">
    
                                        <?$rest1 = 5 % 3;?>
                                        <?$rest2 = 7 % 3;?>
                                        <?$rowRest = -1;?>
    
                                        <?$class = "col-lg-4 col-md-4 col-sm-6 col-xs-12";?>  
                                        <?$class2 = "";?>
                                        <?$count = count($arItem["ELEMENTS"]);?>
    
                                        <?$btn_size = "middle";?>
    
                                        <?if($count % 4 == 0 && !$show_menu):?>
                                            <?$class = "col-lg-3 col-md-3 col-sm-6 col-xs-12 four-cols";?>
    
                                        <?elseif($count % 3 == $rest1):?>
                                            <?$class2 = "col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0";?>
                                            <?$rowRest = $count-2;?>
                                            
                                            <?$btn_size = "big";?>
                                        <?elseif($count % 3 == $rest2):?>
                                            <?$class2 = "col-lg-offset-4 col-md-offset-4 col-sm-offset-0 col-xs-offset-0";?>
                                            <?$rowRest = $count-1;?>
                                            
                                            <?$btn_size = "big";?>
                                        <?endif;?>
    
             
                                    
    
                                    <?foreach($arItem["ELEMENTS"] as $k=>$arEmpl):?>
    
    
                                        <div class="wrap-element elem-hover <?=$class?><?if($k == $rowRest && !$show_menu):?> <?=$class2?><?endif;?> <?if($arItem["PROPERTIES"]["ANIMATE"]["VALUE"] == "Y"):?>child-animate opacity-zero<?endif;?>">
    
                                            <div class="element elem-hover-height-more">
                                            
                                                <?CKraken::admin_setting($arEmpl, false, $admin_active, $show_setting)?>
                                                
                                                <div class="elem-hover-height">
    
                                                    <?$img["src"] = SITE_TEMPLATE_PATH.'/images/empl.jpg';?>
    
                                                    <?if(strlen($arEmpl["PREVIEW_PICTURE"])>0):?>
                                                        <?$img = CFile::ResizeImageGet($arEmpl["PREVIEW_PICTURE"], array('width'=>600, 'height'=>600), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                    <?endif;?>
                                                
                                                    
                                                    <div class="empl-face" style="background-image: url('<?=$img["src"]?>');"></div>
    
                                                   
    
                                                    <div class="wrap-text">
    
    
                                                        <?if(strlen($arSection['EMPL'][$arEmpl['IBLOCK_SECTION_ID']]['NAME'])>0):?>
                                                            <div class="section" title='<?=$arSection['EMPL'][$arEmpl['IBLOCK_SECTION_ID']]['NAME']?>'><?=$arSection['EMPL'][$arEmpl['IBLOCK_SECTION_ID']]['~NAME']?></div>
                                                        <?endif;?>
        
                                                        <div class="empl-name bold"><?=$arEmpl['~NAME']?></div>
        
                                                        <?if(strlen($arEmpl['PROPERTIES']['EMPL_DESC']['VALUE'])>0):?>
                                                            <div class="empl-desc italic"><?=$arEmpl['PROPERTIES']['EMPL_DESC']['~VALUE']?></div>
                                                        <?endif;?>
    
                                                    </div>
    
                                                </div>
    
                                                <?if(strlen($arEmpl['PROPERTIES']['EMPL_PHONE']['VALUE'])>0 || strlen($arEmpl['PROPERTIES']['EMPL_EMAIL']['VALUE'])>0 || (strlen($arEmpl['PROPERTIES']['EMPL_BTN_NAME']['VALUE'])>0 && strlen($arEmpl['PROPERTIES']['EMPL_FORMS']['VALUE'])>0) ):?>
                                                    <div class="hide-part elem-hover-show">
                                                        <?if(strlen($arEmpl['PROPERTIES']['EMPL_PHONE']['VALUE'])>0):?>
                                                            <div class="empl-phone bold">
    
                                                                <span title='<?=$arEmpl['PROPERTIES']['EMPL_PHONE']['VALUE']?>'>
    
                                                                    <?$phone=preg_replace('/[^0-9+]/', '', $arEmpl['PROPERTIES']['EMPL_PHONE']['VALUE']);?>
    
                                                                    <a href="tel:<?=$phone?>"><?=$arEmpl['PROPERTIES']['EMPL_PHONE']['~VALUE']?></a>
    
                                                                </span>
    
                                                            </div>
                                                        <?endif;?>
    
                                                        <?if(strlen($arEmpl['PROPERTIES']['EMPL_EMAIL']['VALUE'])>0):?>
                                                            <div class="empl-email"><a href="mailto:<?=$arEmpl['PROPERTIES']['EMPL_EMAIL']['VALUE']?>" title='<?=$arEmpl['PROPERTIES']['EMPL_EMAIL']['VALUE']?>'><span class="bord-bot"><?=$arEmpl['PROPERTIES']['EMPL_EMAIL']['~VALUE']?></span></a></div>
                                                        <?endif;?>
    
                                                        <?if(strlen($arEmpl['PROPERTIES']['EMPL_BTN_NAME']['VALUE'])>0 && strlen($arEmpl['PROPERTIES']['EMPL_FORMS']['VALUE'])>0):?>
    
                                                            <div class="wrap-button">
                                                            <a class="button-def main-color call-modal callform <?=$btn_size?> <?=$btn_view?>"  data-call-modal="form<?=$arEmpl['PROPERTIES']['EMPL_FORMS']['VALUE']?>" data-header="<?=$block_name?>" title='<?=$arEmpl['PROPERTIES']['EMPL_BTN_NAME']['VALUE']?>'><?=$arEmpl['PROPERTIES']['EMPL_BTN_NAME']['~VALUE']?></a>
                                                            </div>
                                                        <?endif;?>
                                                        
                                                    </div>
                                                <?endif;?>
                                            </div>
    
                                            <?if( ($k+1) % 2 == 0 ):?>
                                                <span class="clearfix visible-sm"></span>
                                            <?endif;?>
                                            <?if( ($k+1) % 4 == 0 ):?>
                                                <span class="clearfix hidden-sm"></span>
                                            <?endif;?>
    
                                       </div>
    
                                        <?if(!$show_menu):?>
    
                                            <?if($count % 4 == 0 && ($k+1) % 4 == 0):?>
                                                <span class="clearfix hidden-sm"></span>
                                            <?endif;?>
    
                                            <?if(($k+1) % 3 == 0 && ($count % 4 != 0 && ($k+1) % 4 != 0)):?>
                                                <span class="clearfix hidden-sm"></span>
                                            <?endif;?>
    
                                            <?if(($k+1) % 2 == 0):?>
                                                <span class="clearfix visible-sm"></span>
                                            <?endif;?>
    
                                        <?else:?>
    
                                            <?if(($k+1) % 3 == 0):?>
                                                <span class="clearfix hidden-sm"></span>
                                            <?endif;?>
    
                                            <?if(($k+1) % 2 == 0):?>
                                                <span class="clearfix visible-sm"></span>
                                            <?endif;?>
    
                                        <?endif;?>
    
                                    <?endforeach;?>
    
                                    </div>
    
                                    
    
                                <?endif;?>
    
                               
    
                            <?endif;?>
                        <?endif;?>
                        <?//empl end?>
                        
                        
                        
                        
                        <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "component"):?>
                            #DYNAMIC<?=$components?>#
                            <?$components++;?>
                        <?endif;?>
                    
              
                    </div><!-- ^row -->
            
                    
    
                    <?if(!$arItem["BUTTON_CHANGE"]):?>
                        <?CreateButton($arItem, $show_menu);?>
                    <?endif;?>
    
                </div><!-- ^container -->
            
                
            </div>
    
            <?if(!empty($arItem["PROPERTIES"]["LINES"]["VALUE_XML_ID"]) && is_array($arItem["PROPERTIES"]["LINES"]["VALUE_XML_ID"])):?>
    
                <?foreach($arItem["PROPERTIES"]["LINES"]["VALUE_XML_ID"] as $line):?>
                    
                    <div class="line-ds <?=$line?>">
    
                        <div class="<?if(!$show_menu):?>container<?endif;?>">
                            <div class="ln"></div>
                        </div>
                    </div>
                
                
                <?endforeach;?>
    
            <?endif;?>
            
    
        </div>
    
    <?endif;?>

    
<?}?>



    <?if(!empty($arResult["ITEMS"])):?>

        <?$elements = count($arResult["ITEMS"])?>
        <?$counter = 0?>
        <?$inner_menu = false;?>
        <?$show_menu = false;?>

        <?if( (!empty($arResult["MENU"]) || !empty($arResult["SECTION"]["BANNERS"]))):?>
            <?$inner_menu = true;?>
        <?endif;?>
        
        <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
            <?global $USER;?>
            <?global $btn_view?>


            <?if($arItem["PROPERTIES"]["TYPE"]["VALUE_XML_ID"] == "first_block"):?>
            
                <?CreateFirstSlider($arItem);?>

            <?else:?>


                <?if($counter == 1 && $inner_menu):?>
                    <?$show_menu = true;?>

                    <div class="container content-container">
                        <div class="row">
                            

                            <?
                       
                            $class1 = '';
                            $class2 = '';

                            if(strlen($arResult["SECTION"]["UF_KRAKEN_INMENU_POS"])>0){
                                if($arResult["SECTION"]["UF_KRAKEN_INMENU_POS_RES"]['XML_ID'] == 'right')
                                {
                                    $class1 = 'col-lg-push-9 col-md-push-9 col-sm-push-0 col-xs-push-0';
                                    $class2 = 'col-lg-pull-3 col-md-pull-3 col-sm-pull-0 col-xs-pull-0';
                                }
                            }

                          ?>

                            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs <?=$class1?>">
                                <div class="menu-navigation static on-scroll" id='navigation'>

                                    <div class="menu-navigation-wrap">

                                        <div class="menu-navigation-inner">




                                            <?if(!empty($arResult["MENU"])):?>

                                                <ul class='nav'>
                                                    <?foreach($arResult["MENU"] as $menu):?>
                                                        

                                                    <li class='<?if(strlen($menu['ICON'])>0 || strlen($menu['PICTURE'])>0):?> on-ic<?endif;?> <?if($menu["HIDE_LG"] == "Y") echo 'hidden-lg hidden-md'; if($menu["HIDE"] == "Y") echo 'hidden-sm hidden-xs';?>'>

                                                        <?if(strlen($menu['PICTURE'])>0):?>
                                                            <?$img = CFile::ResizeImageGet($menu["PICTURE"], array('width'=>20, 'height'=>20), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                            <img src="<?=$img["src"]?>" alt='<?=$menu['NAME']?>' />
                                                        <?elseif(strlen($menu['ICON'])>0):?>
                                                            <i class="<?=$menu['ICON']?>" style='color: <?=$menu['ICON_COLOR']?>;'></i>
                                                        <?endif;?>

                                                        <a href="#block<?=$menu['ID']?>" class='scroll'><?=$menu['NAME']?></a></li>

                                                    <?endforeach;?>

                                                   
                                            
                                                </ul>

                                            <?endif;?>

                                            <?if(!empty($arResult["SECTION"]["BANNERS"])):?>

                                                <div class="menu-banners menu-banner-slider">

                                                    <?foreach($arResult["SECTION"]["BANNERS"] as $banner):?>
                                                        <div>
                                                            <?
                                                                $imgBG['src'] = '';
                                                    

                                                                if(strlen($banner['DETAIL_PICTURE']) > 0)
                                                                    $imgBG = CFile::ResizeImageGet($banner['DETAIL_PICTURE'], array('width'=>600, 'height'=>800), BX_RESIZE_IMAGE_EXACT, true);
                                                           ?>

                                                            
                                                            <div class="item <?=$banner['PROPERTIES']['BANNER_COLOR_TEXT']['VALUE_XML_ID']?> <?=$banner['PROPERTIES']['BANNER_BORDER']['VALUE_XML_ID']?>" style="background-color: <?=$banner['PROPERTIES']['BANNER_USER_BG_COLOR']['VALUE']?>; background-image: url('<?=$imgBG['src']?>');">

                                                                

                                                                <?if(strlen($banner['PREVIEW_PICTURE']) > 0):?>
                                                                    <?$img = CFile::ResizeImageGet($banner['PREVIEW_PICTURE'], array('width'=>200, 'height'=>100), BX_RESIZE_IMAGE_EXACT, true);?>
                                                                   
                                                                
                                                                    <div class="img" style='background-image: url("<?=$img["src"]?>");'></div>

                                                                <?endif;?>

                                                                <?if(strlen($banner['PROPERTIES']['BANNER_UPTITLE']['~VALUE']) > 0):?>
                                                                    <div class="uptitle"><?=$banner['PROPERTIES']['BANNER_UPTITLE']['~VALUE']?></div>
                                                                <?endif;?>

                                                                <?if(strlen($banner['PROPERTIES']['BANNER_TITLE']['~VALUE']) > 0):?>

                                                                    <div class="name bold"><?=$banner['PROPERTIES']['BANNER_TITLE']['~VALUE']?></div>

                                                                <?endif;?>


                                                                <?if(!empty($banner['PROPERTIES']['BANNER_TEXT']['~VALUE'])):?>

                                                                    <div class="desc"><?=$banner['PROPERTIES']['BANNER_TEXT']['~VALUE']["TEXT"]?></div>

                                                                <?endif;?>

                                                                <?
                                                                    if(strlen($banner['PROPERTIES']['BANNER_BTN_NAME']['~VALUE']) > 0 || strlen($banner['PROPERTIES']['BANNER_BTN_NAME']['~VALUE']) > 0)
                                                                    {
                                                                        $arClass = array();
                                                                        $arClass=array(
                                                                            "XML_ID"=> $banner["PROPERTIES"]["BANNER_BTN_TYPE"]["VALUE_XML_ID"],
                                                                            "FORM_ID"=> $banner["PROPERTIES"]["BANNER_BTN_FORM"]["VALUE"],
                                                                            "MODAL_ID"=> $banner["PROPERTIES"]["BANNER_BTN_MODAL"]["VALUE"],
                                                                            "QUIZ_ID"=> $banner["PROPERTIES"]["BANNER_BTN_QUIZ"]["VALUE"]
                                                                        );

                                                                        $arAttr=array();
                                                                        $arAttr=array(
                                                                            "XML_ID"=> $banner["PROPERTIES"]["BANNER_BTN_TYPE"]["VALUE_XML_ID"],
                                                                            "FORM_ID"=> $banner["PROPERTIES"]["BANNER_BTN_FORM"]["VALUE"],
                                                                            "MODAL_ID"=> $banner["PROPERTIES"]["BANNER_BTN_MODAL"]["VALUE"],
                                                                            "LINK"=> $banner["PROPERTIES"]["BANNER_LINK"]["VALUE"],
                                                                            "BLANK"=> $banner["PROPERTIES"]["BANNER_BTN_BLANK"]["VALUE_XML_ID"],
                                                                            "HEADER"=> $block_name,
                                                                            "QUIZ_ID"=> $banner["PROPERTIES"]["BANNER_BTN_QUIZ"]["VALUE"],
                                                                            "LAND_ID"=> $banner["PROPERTIES"]["BANNER_BTN_LAND"]["VALUE"]
                                                                        );
                                                                    }
                                                                ?>

                                                                <?if(strlen($banner['PROPERTIES']['BANNER_BTN_NAME']['~VALUE']) > 0):?>

                                                                    <a class="button-def main-color <?=$btn_view?> <?=CKraken::buttonEditClass ($arClass)?>" <?=CKraken::buttonEditAttr ($arAttr)?>><?=$banner['PROPERTIES']['BANNER_BTN_NAME']['~VALUE']?></a>

                                                                <?endif;?>

                                                                <?=CKraken::admin_setting($banner, false, $admin_active, $show_setting)?>
                                                                

                                                                <?if($banner['PROPERTIES']['BANNER_ACTION_ALL_WRAP']['VALUE'] == 'Y'):?>
                                                                    <a class='menu-banner-wrap <?=CKraken::buttonEditClass ($arClass)?>' <?=CKraken::buttonEditAttr ($arAttr)?>></a>
                                                                <?endif;?>
                                                               
                                                            </div>

                                                            <?if(strlen($banner['PROPERTIES']['BANNER_DESC']['~VALUE']) > 0):?>

                                                                <div class="more-desc italic"><?=$banner['PROPERTIES']['BANNER_DESC']['~VALUE']?></div>

                                                            <?endif;?>
                                                        </div>

                                                    <?endforeach;?>
                                                </div>

                                            <?endif;?>

                                        </div>

                                    </div>


                                </div>
                            </div>

                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 content-inner <?=$class2?>">

                <?endif;?>

            
                <?CreateElement($arItem, $arResult["SECTION"], $show_menu, $key);?>

                <?if((($counter+1) == $elements) && $inner_menu):?>

                            </div><!-- col-lg-8 -->

                            <div class="clearfix"></div>

                        </div><!-- ^row -->
                    </div><!-- ^container -->

                    

                <?endif;?>
            
            <?endif;?>

            <?$counter++;?>
            
        
        <?endforeach;?>

    <?else:?>

        <?CreateEmptyBlock($arResult["SECTION"]);?>

    <?endif;?> 
    



<?$this->__component->arResult["CACHED_TPL"] = @ob_get_contents();
  ob_get_clean();?>
    
