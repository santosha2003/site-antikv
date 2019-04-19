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

<?global $KRAKEN_TEMPLATE_ARRAY;
global $DB_kraken;?>
<?/*$is_constructor = IsConstructor("concept_kraken_site");*/?>



<div class="hidden-xs">
    <div class="kraken-main-setting">
        <div class="kraken-btn mgo-widget-call_pulse">
            
        </div>
        <span><?=GetMessage("KRAKEN_SETTINGS_LIST_BUTTON_TIP")?></span>
    </div>


    <div class="kraken-sets-list-wrap">
        <div class="kraken-sets-list">

            <div class="kraken-sets-list-table">

                <div class="kraken-sets-list-cell">

                    <?
                        $arPages = array("news", "blog", "action", "catalog");
                        $arPage["news"] = "tab_cont_news_tab";
                        $arPage["blog"] = "tab_cont_blog_tab";
                        $arPage["action"] = "tab_cont_action_tab";
                        $arPage["catalog"] = "tab_cont_catalog_tab";
                        $arPage["cart"] = "tab_cont_shop";
                    ?>


                 
                    <?if(in_array($arParams["CURRENT_PAGE"], $arPages)):?>

                        <?if($arParams["CURRENT_DIR"] == "main"):?>

                            <a class="kraken-sets-list-item sectedit" href='/bitrix/admin/concept_kraken.php?site_id=<?=SITE_ID?>&tab=<?=$arPage[$arParams["CURRENT_PAGE"]]?>' target='_blank'>
                                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_MAIN_".$arParams["CURRENT_PAGE"])?></span>
                            </a>
                        <?endif;?>

                        <?if($arParams["CURRENT_DIR"] == "section"):?>
                            <a class="kraken-sets-list-item sectedit" href='/bitrix/admin/iblock_section_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID_PAGE"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arParams["CURRENT_SECTION_ID"]?>&lang=ru&find_section_section=0' target='_blank'>
                                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_SECT_".$arParams["CURRENT_PAGE"])?></span>
                            </a>
                        <?endif;?>

                        <?if($arParams["CURRENT_DIR"] == "element"):?>

                            <a class="kraken-sets-list-item sectedit" href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID_PAGE"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arParams["CURRENT_ELEMENT_ID"]?>&find_section_section=<?=$arParams["CURRENT_SECTION_ID"]?>&WF=Y' target='_blank'>
                                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_ELEM_".$arParams["CURRENT_PAGE"])?></span>
                            </a>

                        <?endif;?>

                    <?else:?>

                        <?if($arParams["CURRENT_PAGE"] == "cart"):?>

                            <a class="kraken-sets-list-item sectedit" href='/bitrix/admin/concept_kraken.php?site_id=<?=SITE_ID?>&tab=<?=$arPage[$arParams["CURRENT_PAGE"]]?>' target='_blank'>
                                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_MAIN_".$arParams["CURRENT_PAGE"])?></span>
                            </a>

                        <?else:?>
                            <a class="kraken-sets-list-item sectedit" href='/bitrix/admin/iblock_section_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arParams["CURRENT_SECTION_ID"]?>&lang=ru&find_section_section=0' target='_blank'>
                                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_PAGE")?></span>
                            </a>
                        <?endif;?>
                    <?endif;?>

                </div>

                

                <?if(in_array($arParams["CURRENT_PAGE"], $arPages)):?>

                    <div class="kraken-sets-list-cell">

                        <a class="kraken-sets-list-item addsect" href="/bitrix/admin/iblock_section_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID_PAGE"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=0&find_section_section=0&from=iblock_list_admin" target='_blank'>
                            <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_SECTEDIT")?></span>
                        </a>
                        <!-- <div class="vertic-line"></div> -->
                    </div>

                <?endif;?>


                
                <!-- <div class="kraken-sets-list-cell">
                    <a class="kraken-sets-list-item page kraken-sets-open" data-open-set='page'>
                        <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS")?></span>
                    </a>
                </div> -->

                <?if($arParams["CURRENT_PAGE"] != "cart"):?>
                    <div class="kraken-sets-list-cell">

                        <?if(in_array($arParams["CURRENT_PAGE"], $arPages)):?>
                       
                            <a class="kraken-sets-list-item addblock" href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID_PAGE"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=<?=$arParams["CURRENT_SECTION_ID"]?>&find_section_section=<?=$arParams["CURRENT_SECTION_ID"]?>&from=iblock_list_admin' target='_blank'>
                                <span class="set-icon">
                                    <?=GetMessage("KRAKEN_SETTINGS_ADD_".$arParams["CURRENT_PAGE"])?>
                                </span>
                            </a>

                        <?else:?>
                            <a class="kraken-sets-list-item addblock" href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arParams["IBLOCK_ID"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=<?=$arParams["CURRENT_SECTION_ID"]?>&find_section_section=<?=$arParams["CURRENT_SECTION_ID"]?>&from=iblock_list_admin' target='_blank'>
                                <span class="set-icon">
                                    <?=GetMessage("KRAKEN_SETTINGS_LIST_ADDBLOCK")?>
                                </span>
                            </a>
                        <?endif;?>
                    </div>
                <?endif;?>

                <div class="kraken-sets-list-cell">
                    <a class="kraken-sets-list-item seo kraken-sets-open" data-open-set='seo'>
                        <span class="seo-name">SEO</span>
                        <span class="set-icon">

                            <?if(in_array($arParams["CURRENT_PAGE"], $arPages) || $arParams["CURRENT_PAGE"] == "cart"):?>
                                <?=GetMessage("KRAKEN_SETTINGS_LIST_SEO_PAGE")?>
                            <?else:?>
                                <?=GetMessage("KRAKEN_SETTINGS_LIST_SEO")?>
                            <?endif;?>

                        </span>

                        <span class="status-seo"></span>
                    </a>
                </div>
                <div class="kraken-sets-list-cell">
                    <div class="kraken-sets-list-close">
                        
                    </div>
                    <span><?=GetMessage("KRAKEN_SETTINGS_CLOSE_LIST_SET")?></span>
                </div>
            </div>
        </div>

        <div class="kraken-sets-list-left">
           
            <a class="kraken-sets-list-item kraken-sets-open edit-sets" data-open-set='edit-sets'>
                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS")?></span>
            </a>
            <a class="kraken-sets-list-item kraken-sets-open addpage" data-open-set='addpage'>
                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_ADDPAGE")?></span>
            </a>
            <a class="kraken-sets-list-item kraken-sets-open forms" data-open-set='forms'>
                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_FORMS")?></span>
            </a>
            <a class="kraken-sets-list-item kraken-sets-open modals" data-open-set='modals'>
                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_LIST_MODAL")?></span>
            </a>

            <a class="kraken-sets-list-item kraken-sets-open iblist" data-open-set='iblist'>
                <span class="set-icon"><?=GetMessage("KRAKEN_SETTINGS_IBLIST")?></span>
            </a>
              
          
        </div>

    </div>


    <div class="sets-shadow"></div>

    <div class="kraken-setting edit-sets">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3 kraken-set-image"><div></div></td>
                        <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS")?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <form action="/" class="set-form form-setting" enctype="multipart/form-data" method="post" role="form">
                
                <input type="hidden" name="site_id" value="<?=SITE_ID?>" />
                <input type="hidden" name="section_id" name="section_id" value="<?=$GLOBALS["CURRENT_SECTION_ID"]?>" />
                <input type="hidden" name="server_url" value="<?=$arResult["SERVER_URL"]?>" />
                    
                <input name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SITE_BUILD_ON']['VALUE_ID'][0][0]?>" type="hidden" <?if($KRAKEN_TEMPLATE_ARRAY['SITE_BUILD_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SITE_BUILD_ON']['VALUE_ID'][0][2]):?> checked value="<?=$KRAKEN_TEMPLATE_ARRAY['SITE_BUILD_ON']['VALUE_ID'][0][2]?>" <?endif;?>>
                



                <div class="kraken-set-content">
                    <table class="sides">
                        <tr>
                            <td class='set-side-left'>
                                <ul class="set-tabs">
                                    <li class='active' data-set='instruct'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_INSTRUCT")?></li>
                                    <li data-set='disain'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_DISAIN")?></li>
                                    <li data-set='contacts'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_CONTACTS")?></li>
                                    <li data-set='menu'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_MAIN_MENU")?></li>
                                    <li data-set='footer'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_FOOTER")?></li>
                                    <li data-set='lids'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_LIDS")?></li>
                                    <li data-set='politic'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_POLITIC")?></li>
                                    <?/*<li data-set='domain'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_DOMAIN")?></li>*/?>
                                    
                                    <li data-set='services'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_SERVICES")?></li>
                                    <li data-set='cart'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_CART")?></li>
                                    <li data-set='customs'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_CUSTOM")?></li>
                                    <li data-set='other'><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_OTHER")?></li>

                                    
                                    
                                    
                                </ul>
                                <div class="other-li">
                                    <a href="/bitrix/admin/concept_kraken.php?site_id=<?=SITE_ID?>" target="_blank">
                                    <?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_EDIT_IN_ADMIN")?>
                                    </a>
                                </div>
                            </td>
                            <td class='set-side-right'>

                                <div class="set-content" data-set='disain'>
                                    <div class="input-wrap middle">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR']['NAME']?></div>
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_description" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR']['VALUE']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <ul class="form-check alone">                                                
                                                    <li>
                                                        <label>
                                                            <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR_BACKDROP']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR_BACKDROP']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR_BACKDROP']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR_BACKDROP']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_DESCRIPTOR_BACKDROP']['NAME']?></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>


                                    </div>

                                    <?$name_logo = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE']);?>
                                    <?$name_fav = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE']);?>
                                    <?$name_head_bg = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['VALUE']);?>

                                   
                                    
                                    <div class="input-wrap middle">
                            
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_PICTURES")?></div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <div class="input to-right clearfile-parent">

                                                    <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE']?>">
                                                    <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE_ID']?>_del" value="">
                                                    
                                                    <label class="file on-save<?if(strlen($name_logo["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                        <span class="ex-file-desc"><?=GetMessage("KRAKEN_SETTINGS_LIST_LOGO")?></span>
                                                        <span class="ex-file"><?=$name_logo["ORIGINAL_NAME"]?></span>
                                                        <input type="file" accept="image/*" class="hidden" id="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE_ID']?>" name="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_LOGO']['VALUE_ID']?>"/>

                                                    </label>

                                                    <div class="clearfile on-save<?if(strlen($name_logo["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <div class="input to-left clearfile-parent">
                                                    <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE']?>">
                                                    <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE_ID']?>_del" value="">
                                                    
                                                    <label class="file on-save<?if(strlen($name_fav["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                        <span class="ex-file-desc"><?=GetMessage("KRAKEN_SETTINGS_LIST_FAVICON")?></span>
                                                        <span class="ex-file"><?=$name_fav["ORIGINAL_NAME"]?></span>
                                                        <input type="file" accept="image/*" class="hidden" id="<?=$KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE_ID']?>" name="<?=$KRAKEN_TEMPLATE_ARRAY['FAVICON']['VALUE_ID']?>" placeholder="<?=GetMessage("KRAKEN_SETTINGS_LIST_FAVICON1")?>" data-placeholder="<?=GetMessage("KRAKEN_SETTINGS_LIST_FAVICON1")?>" />
                                                    </label>
                                                    <div class="clearfile on-save<?if(strlen($name_fav["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                

                                    <div class="input-wrap">
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_FONTS")?></div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right in-focus">
                                                    <span class="desk"><?=GetMessage("KRAKEN_SETTINGS_LIST_FONT_TITLE")?></span>

                                                    <select name="kraken_font_title" class='on-save'>
                                                        <?if(!empty($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TITLE"]['NAME'])):?>
                                                            <?foreach($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TITLE"]['NAME'] as $k => $arFont):?>
                                                                <option <?if($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TITLE"]['VALUE'] == $KRAKEN_TEMPLATE_ARRAY["FONTS"]["TITLE"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FONTS"]["TITLE"]['VALUE_ID'][$k]?>"><?=$arFont?></option>
                                                            <?endforeach;?>
                                                        <?endif;?>
                                                    </select>
                                                </div>
                                                
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-left in-focus">
                                                    <span class="desk"><?=GetMessage("KRAKEN_SETTINGS_LIST_FONT_TEXT")?></span>

                                                    <select name="kraken_font_text" class='on-save'>

                                                        <?if(!empty($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TEXT"]['NAME'])):?>

                                                            <?foreach($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TEXT"]['NAME'] as $k => $arFont):?>
                                                                <option <?if($KRAKEN_TEMPLATE_ARRAY["FONTS"]["TEXT"]['VALUE'] == $KRAKEN_TEMPLATE_ARRAY["FONTS"]["TEXT"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FONTS"]["TEXT"]['VALUE_ID'][$k]?>"><?=$arFont?></option>
                                                            <?endforeach;?>

                                                        <?endif;?>
                                                    </select>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_COLOR")?></div>
                                        <div class="kraken-color-row clearfix">

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR_STD']['VALUE_ID'])):?>
                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR_STD']['VALUE_ID'] as $k => $arColor):?>
                                                    <div class="kraken-color-col">
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR_STD']['VALUE'] == $arColor && strlen($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE'])<=0):?>checked="checked"<?endif;?> name="kraken_color_std" type="radio" value="<?=$arColor?>">
                                                            <span><span style="background-color:<?=$arColor?>;"></span></span>
                                                        </label>
                                                    </div>

                                                    <?if(($cell+1) % 7 == 0):?>
                                                        <div class="clearfix hidden-xs"></div>
                                                    <?endif;?>
                                                <?endforeach;?>
                                            <?endif;?>

                                        </div>
                                    </div>


                                    <div class="input-wrap">
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['NAME']?></div>
                                                <div class="input to-right parent-clearcolor">
                                                    <div class="bg"></div>
                                                   
                                                    <?
                                                        $color = ' ';
                                                        if(strlen($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE'])>0)
                                                            $color = $KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE'];
                                                    ?>


                                                    <input id="picker_<?=$KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE_ID']?>" class="picker_color on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE_ID']?>" type="text" value="<?=$color?>">
                                                    <span class='call_picker on-save'></span>

                                                    <div class="picker-wrap">
                                                        <a class="picker-close"></a>
                                                        <div id="panel_<?=$KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE_ID']?>" class='picker_panel'></div>
                                                    </div>

                                                    <div class="clearcolor on-save <?if(strlen($KRAKEN_TEMPLATE_ARRAY['MAIN_COLOR']['VALUE'])>1):?> on<?endif;?>"></div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FONT_COLOR']['NAME']?></div>


                                        <ul class='form-radio'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['FONT_COLOR']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['FONT_COLOR']['VALUE_ID'] as $arColor):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['FONT_COLOR']['VALUE'] == $arColor[2]):?> checked="checked"<?endif;?> name="kraken_<?=$arColor[0]?>" type="radio" value="<?=$arColor[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arColor[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                    </div>

                                    
                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_TONE']['NAME']?></div>


                                        <ul class='form-radio'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['HEAD_TONE']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['HEAD_TONE']['VALUE_ID'] as $arTone):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['HEAD_TONE']['VALUE'] == $arTone[2]):?> checked="checked"<?endif;?> name="kraken_<?=$arTone[0]?>" type="radio" value="<?=$arTone[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arTone[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['LOGOTYPE_POSITION']['NAME']?></div>


                                        <ul class='form-radio clearfix'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['LOGOTYPE_POSITION']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['LOGOTYPE_POSITION']['VALUE_ID'] as $arPos):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['LOGOTYPE_POSITION']['VALUE'] == $arPos[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arPos[0]?>" type="radio" value="<?=$arPos[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arPos[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                 
                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['COLOR_HEADER']['NAME']?></div>


                                        <ul class='form-radio clearfix'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['COLOR_HEADER']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['COLOR_HEADER']['VALUE_ID'] as $arPos):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['COLOR_HEADER']['VALUE'] == $arPos[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arPos[0]?>" type="radio" value="<?=$arPos[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arPos[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                 
                                    </div>

                                    <div class="input-wrap none">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['BTN_VIEW']['NAME']?></div>


                                        <ul class='form-radio in-line clearfix'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['BTN_VIEW']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['BTN_VIEW']['VALUE_ID'] as $arBtn):?>
                                                
                                                    <li class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['BTN_VIEW']['VALUE'] == $arBtn[2]):?> checked="checked"<?endif;?> name="kraken_<?=$arBtn[0]?>" type="radio" value="<?=$arBtn[2]?>">          
                                                            <span></span>
                                                            <span class="button-def <?=$arBtn[2]?>"><?=GetMessage("KRAKEN_SETTINGS_BTN_VIEW_NAME")?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                 
                                    </div>

                                    <div class="input-wrap middle">
                            
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_HEAD_BG_TITLE")?></div>
                                                <div class="input to-right parent-clearcolor">
                                                    <div class="bg"></div>
                                                   
                                                    <?
                                                        $color = ' ';
                                                        if(strlen($KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE'])>0)
                                                            $color= $KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE'];
                                                    ?>


                                                    <input id="picker_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE_ID']?>" class="picker_color on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE_ID']?>" type="text" value="<?=$color?>">
                                                    <span class='call_picker on-save'></span>

                                                    <div class="picker-wrap">
                                                        <a class="picker-close"></a>
                                                        <div id="panel_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE_ID']?>" class='picker_panel'></div>
                                                    </div>

                                                    <div class="clearcolor on-save <?if(strlen($KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COLOR']['VALUE'])>1):?> on<?endif;?>"></div>
                                                    
                                                    
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_OPACITY']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_OPACITY']['HINT']?>"></span></div>
                                                <div class="input to-left">                                        
                                                    <input class='on-save' type="text" class="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_OPACITY']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_OPACITY']['VALUE']?>">
                                                </div>
                                            </div>

                                           
                                        </div>
                                    </div>

                                    <div class="input-wrap">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right clearfile-parent">
                                                    <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['VALUE']?>">
                                                    <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['VALUE_ID']?>_del" value="">
                                                    <label class="file on-save<?if(strlen($name_head_bg["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                        <span class="ex-file-desc"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['NAME']?></span>
                                                        <span class="ex-file"><?=$name_head_bg["ORIGINAL_NAME"]?></span>
                                                        <input type="file" accept="image/*" class="hidden" name="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG']['VALUE_ID']?>"/>
                                                    </label>
                                                    <div class="clearfile on-save<?if(strlen($name_head_bg["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                </div>
                                                
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <ul class="form-check alone">                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COVER']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COVER']['VALUE'][0] ==$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COVER']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COVER']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_BG_COVER']['NAME']?></span>
                                                        </label>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-wrap">
                                       
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class='on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_FIXED']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['HEAD_FIXED']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['HEAD_FIXED']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_FIXED']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_FIXED']['NAME']?></span>
                                                </label>
                                            </li>
                                        </ul>
                                                
                                         
                                    </div>


                                    <?/*<div class="input-wrap middle">

                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_VALUTA")?></div>

                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_RUB']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_rub" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_RUB']['VALUE']?>">
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_USD']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_usd" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_USD']['VALUE']?>">
                                                </div>
                                                
                                            </div>
                                            <div class="clerafix"></div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_EUR']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_eur" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_EUR']['VALUE']?>">
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_BYR']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_byr" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_BYR']['VALUE']?>">
                                                </div>
                                                
                                            </div>
                                            <div class="clerafix"></div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_UAH']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_uah" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_UAH']['VALUE']?>">
                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_KZT']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_kzt" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_KZT']['VALUE']?>">
                                                </div>
                                                
                                            </div>
                                            <div class="clerafix"></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_USER']['NAME']?></div>
                                                <div class="input to-right">                                        
                                                    <input type="text" class="text on-save" name="kraken_valuta_user" value="<?=$KRAKEN_TEMPLATE_ARRAY['VALUTA_USER']['VALUE']?>">
                                                </div>
                                                
                                            </div>
                                            <div class="clerafix"></div>
                                        </div>


                                    </div> */?>

                                    

                                    <?/*<div class="spec-comment italic">

                                        <?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_COMMENT")?>
                                        
                                    </div>

                                    <div class="instruct">
                                        <a href=""><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_INSTRUCT_DISAIN")?>
                                        </a>
                                    </div>
                                    */?>

                                </div>

                                <div class="set-content" data-set='lids'>
                                    

                                    <div class="input-wrap">
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_ADMIN_EMAIL")?> <span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_LIST_ADMIN_EMAIL_HINT")?>"></span></div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['MAIL_FROM']['VALUE'])>0):?> in-focus<?endif;?>">     
                                                    <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['MAIL_FROM']['NAME']?></span>                                   
                                                    <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MAIL_FROM']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['MAIL_FROM']['VALUE']?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-left <?if(strlen($KRAKEN_TEMPLATE_ARRAY['MAIL_TO']['VALUE'])>0):?> in-focus<?endif;?>"> 
                                                    <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['MAIL_TO']['NAME']?></span>                                       
                                                    <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MAIL_TO']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['MAIL_TO']['VALUE']?>">
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="input-wrap">
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class='on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SAVE_IN_IB']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['SAVE_IN_IB']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SAVE_IN_IB']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['SAVE_IN_IB']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['SAVE_IN_IB']['NAME']?></span> 
                                                </label>
                                                
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="input-wrap">
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class="open_more_options on-save" data-show-options='bx_options' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE_ID'][0][2]?>"><span></span><span><?=$KRAKEN_TEMPLATE_ARRAY['BX_ON']['NAME']?></span> 
                                                </label>
                                                <span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['BX_ON']['HINT']?>"></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="more-option<?if($KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['BX_ON']['VALUE_ID'][0][2]):?> on<?endif;?>" data-show-options='bx_options'>

                                        <div class="input-wrap">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['BX_URL']['VALUE'])>0):?> in-focus<?endif;?>">     
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['BX_URL']['NAME']?></span>                                   
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['BX_URL']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['BX_URL']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['BX_LOG']['VALUE'])>0):?> in-focus<?endif;?>">     
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['BX_LOG']['NAME']?></span>                                   
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['BX_LOG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['BX_LOG']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input to-left<?if(strlen($KRAKEN_TEMPLATE_ARRAY['BX_PAS']['VALUE'])>0):?> in-focus<?endif;?>"> 
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['BX_PAS']['NAME']?></span>                                       
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['BX_PAS']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['BX_PAS']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div><!-- data-show-options='bx_options' -->


                                    <div class="input-wrap">
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class='open_more_options on-save' data-show-options='amo_options' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE_ID'][0][2]?>"><span></span><span class='text'><?=$KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['NAME']?></span> 
                                                </label>

                                                <span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['HINT']?>"></span>
                                                
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="more-option<?if($KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SEND_TO_AMO']['VALUE_ID'][0][2]):?> on<?endif;?>" data-show-options='amo_options'>

                                        <div class="input-wrap">

                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['AMO_URL']['VALUE'])>0):?> in-focus<?endif;?>">     
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['AMO_URL']['NAME']?></span>                                   
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['AMO_URL']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['AMO_URL']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['AMO_LOG']['VALUE'])>0):?> in-focus<?endif;?>">     
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['AMO_LOG']['NAME']?></span>                                   
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['AMO_LOG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['AMO_LOG']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input to-left<?if(strlen($KRAKEN_TEMPLATE_ARRAY['AMO_HASH']['VALUE'])>0):?> in-focus<?endif;?>"> 
                                                        <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['AMO_HASH']['NAME']?></span>                                       
                                                        <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['AMO_HASH']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['AMO_HASH']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div><!-- data-show-options='amo_options' -->
                                            
                                    
                                </div>

                                <div class="set-content" data-set='footer'>
                                    

                                    <div class="input-wrap">
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class="open_more_options on-save" data-show-options='footer_options' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE_ID'][0][2]?>"><span></span><span ><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['NAME']?></span> 
                                                </label>
                                               
                                            </li>
                                        </ul>
                                    </div>

                                    

                                    <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_ON']['VALUE_ID'][0][2]):?> on<?endif;?>" data-show-options='footer_options'>

                                        <div class="input-wrap">
                                        <?$name_footer_bg = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['VALUE']);?>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right clearfile-parent">
                                                    <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['VALUE']?>">
                                                    <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['VALUE_ID']?>_del" value="">
                                                    <label class="file on-save<?if(strlen($name_footer_bg["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                        <span class="ex-file-desc"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['NAME']?></span>
                                                        <span class="ex-file"><?=$name_footer_bg["ORIGINAL_NAME"]?></span>
                                                        <input type="file" accept="image/*" class="hidden" name="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_BG']['VALUE_ID']?>"/>
                                                    </label>
                                                    <div class="clearfile on-save<?if(strlen($name_footer_bg["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="input-wrap middle">
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['NAME']?></div>
                                                <div class="input to-right parent-clearcolor">
                                                    <div class="bg"></div>
                                                   
                                                    <?
                                                        $color = ' ';
                                                        if(strlen($KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE'])>0)
                                                            $color= $KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE'];
                                                    ?>


                                                    <input id="picker_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE_ID']?>" class="picker_color on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE_ID']?>" type="text" value="<?=$color?>">
                                                    <span class='call_picker on-save'></span>

                                                    <div class="picker-wrap">
                                                        <a class="picker-close"></a>
                                                        <div id="panel_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE_ID']?>" class='picker_panel'></div>
                                                    </div>

                                                    <div class="clearcolor on-save <?if(strlen($KRAKEN_TEMPLATE_ARRAY['FOOTER_COLOR_BG']['VALUE'])>1):?> on<?endif;?>"></div>
                                                    
                                                    
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_OPACITY_BG']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_OPACITY_BG']['HINT']?>"></span></div>
                                                <div class="input to-left">                                        
                                                    <input class='on-save' type="text" class="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_OPACITY_BG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_OPACITY_BG']['VALUE']?>">
                                                </div>
                                            </div>

                                           
                                        </div>
                                    </div>
                                        <div class="input-wrap">

                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_DESC']['NAME']?></div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input">     
                                                                                          
                                                        <input class='on-save' type="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_DESC']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_DESC']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_INFO']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title='<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_INFO']['HINT']?>'></span></div>
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="input">     
                                                                                          
                                                        <input class='on-save' type="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_INFO']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_INFO']['VALUE']?>">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>

                                        <div class="input-wrap">
                                            <ul class="form-check">                                                
                                                <li>
                                                    <label>
                                                        <input class="open_more_options on-save" data-show-options='footer_author_show' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE_ID'][0][2]?>"><span></span><span><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['NAME']?></span> 
                                                    </label>
                                                </li>

                                            </ul>
                                        </div>

                                        <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_ON']['VALUE_ID'][0][2]):?> on<?endif;?>" data-show-options='footer_author_show'>

                                            <div class="input-wrap parent-more-option">

                                                <ul class='form-radio clearfix'>

                                                    <li>
                                                        <label>
                                                            <input class="open_more_options on-save" data-show-options='' <?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE'] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][0][2]):?>checked="checked"<?endif;?> name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][0][0]?>" type="radio" value="default">          
                                                            <span></span>
                                                            <span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][0][1]?></span>
                                                        </label>
                                                    </li>

                                                    <li>
                                                        <label>
                                                            <input class="open_more_options on-save" data-show-options='footer_author_type_user' <?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE'] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][1][2]):?>checked="checked"<?endif;?> name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][1][0]?>" type="radio" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][1][2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][1][1]?></span>
                                                        </label>
                                                    </li>

                                               </ul>
                                         
                                            </div>  <!-- ^parent-more-option -->


                                            <div class="more-options-wrap">
                                                <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE'] == $KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_TYPE']['VALUE_ID'][1][2]):?> on<?endif;?>" data-show-options='footer_author_type_user'>

                                                   <div class="input-wrap">

                                                        <div class="row clearfix">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_DESC']['VALUE'])>0):?> in-focus<?endif;?>">

                                                                    <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_DESC']['NAME']?></span>

                                                                    <input type="text" class="focus-anim on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_DESC']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_DESC']['VALUE']?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-left clearfile-parent">

                                                                    <?$name_copy_user = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['VALUE']);?>

                                                                        <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['VALUE']?>">
                                                                        <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['VALUE_ID']?>_del" value="">
                                                                        <label class="file on-save<?if(strlen($name_copy_user["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                                            <span class="ex-file-desc"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['NAME']?></span>
                                                                            <span class="ex-file"><?=$name_copy_user["ORIGINAL_NAME"]?></span>
                                                                            <input type="file" accept="image/*" class="hidden" name="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_PIC']['VALUE_ID']?>"/>
                                                                        </label>
                                                                        <div class="clearfile on-save<?if(strlen($name_copy_user["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                               
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_URL']['NAME']?></div>
                                                                <div class="input">
                                                                    <input class='on-save' type="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_URL']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FOOTER_COPYRIGHT_USER_URL']['VALUE']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- ^more-options-wrap -->

                                        </div> <!-- ^data-show-options='footer_author_show' -->

                                    </div>
                                    <!-- data-show-options='footer_options'-->
                                </div>


                                <div class="set-content" data-set='services'>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['META']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['META']['HINT']?>"></span></div>
                                        <div class="parent-row">

                                            <div class="empty-template">
                                                <div class="row row-for-copy">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="input to-right">
                                                            <div class="bg"></div>
                                                            <input type="text" class="text for-copy-1" name="list_kraken_meta[n<?=count($KRAKEN_TEMPLATE_ARRAY['META']['VALUE'])?>]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="rows-copy">

                                                <?if(!empty($KRAKEN_TEMPLATE_ARRAY['META']['VALUE'])):?>

                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['META']['VALUE'] as $k => $arMeta):?>
                                                        <div class="row row-for-copy">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <div class="input to-right <?if(strlen($arMeta['name'])>0):?> in-focus<?endif;?>">
                                                                    <div class="bg"></div>
                                                                    <input type="text" class="text on-save" name="list_kraken_meta[n<?=$k?>]" value="<?=$arMeta['name']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?endforeach;?>

                                                <?endif;?>

                                            </div>

                                            <div class="addrow on-save">+ <span><?=GetMessage("KRAKEN_SETTINGS_META_ADD")?></span></div>
     
                                        </div>
                                    </div>


                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['METRIKA']['NAME']?>
                                        </div>

                                        <div class="textarea middle">    
                                            <textarea type="text" class="text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['METRIKA']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['METRIKA']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['GOOGLE']['NAME']?>
                                        </div>

                                        <div class="textarea middle">    
                                            <textarea type="text" class="text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['GOOGLE']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['GOOGLE']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['GTM_HEAD']['NAME']?>
                                        </div>

                                        <div class="textarea middle">    
                                            <textarea type="text" class="text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['GTM_HEAD']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['GTM_HEAD']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['GTM_BODY']['NAME']?>
                                        </div>

                                        <div class="textarea middle">    
                                            <textarea type="text" class="text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['GTM_BODY']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['GTM_BODY']['VALUE']?></textarea>
                                        </div>


                                    </div>


                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['INHEAD']['NAME']?></div>
                                        <div class="textarea middle on-save">
                                            <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['INHEAD']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['INHEAD']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['INBODY']['NAME']?></div>
                                        <div class="textarea middle on-save">
                                            <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['INBODY']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['INBODY']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['INCLOSEBODY']['NAME']?></div>
                                        <div class="textarea middle on-save">
                                            <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['INCLOSEBODY']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['INCLOSEBODY']['VALUE']?></textarea>
                                        </div>

                                        <div class="spec-comment italic no-line"><?=GetMessage("KRAKEN_SETTINGS_LIST_SERVICES_DESC")?></div>
                                        
                                    </div>
                                </div>

                                <div class="set-content" data-set='customs'>

                                    <div class="input-wrap no-margin-top-bot">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['STYLES']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['STYLES']['HINT']?>"></span></div>
                            
                                        <div class="textarea middle on-save">
                                            <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['STYLES']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['STYLES']['VALUE']?></textarea>
                                        </div>

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['SCRIPTS']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['SCRIPTS']['HINT']?>"></span></div>
                                        <div class="textarea middle on-save">
                                            <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SCRIPTS']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['SCRIPTS']['VALUE']?></textarea>
                                        </div>

                                        
                                    </div>
                                </div>

                                <div class="set-content" data-set='contacts'>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_CHOOSE_FORMS_TITLE")?></div>
                                        <div class="row">

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right in-focus">
                                                    <span class="desk"><?=GetMessage("KRAKEN_SETTINGS_CHOOSE_FORMS_CALLBACK")?></span>

                                                    <select name="kraken_id_callback" class='on-save'>
                                                        <?if(!empty($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'])):?>

                                                            <?foreach($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'] as $k => $arForm):?>
                                                                <option <?if($KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_CALLBACK'] == $KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]?>"><?=$arForm?></option>
                                                            <?endforeach;?>

                                                        <?endif;?>
                                                    </select>
                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                     <div class="input-wrap">

                                        <ul class="form-check alone">                                                
                                            <li>
                                                <label>
                                                    <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SHOW_CALLBACK']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['SHOW_CALLBACK']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SHOW_CALLBACK']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['SHOW_CALLBACK']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['SHOW_CALLBACK']['NAME']?></span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>  
                                    <div class="input-wrap">

                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CALLBACK_NAME']['VALUE'])>0):?> in-focus<?endif;?>">
                                            <div class="bg"></div>
                                            <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CALLBACK_NAME']['NAME']?></span>    
                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CALLBACK_NAME']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CALLBACK_NAME']['VALUE']?>">
                                        
                                        </div>

                                    </div>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title='<?=$KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['HINT']?>'></span></div>
                                        <div class="parent-row">

                                            <div class="empty-template">
                                                <div class="row row-for-copy">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-right">
                                                            <div class="bg"></div>
                                                            <span class="desc"><?=GetMessage("KRAKEN_SETTINGS_CONTACTS")?></span>       
                                                            <input type="text" class="focus-anim text for-copy-1" name="list_kraken_phones[n<?=count($KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['VALUE'])?>]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-left"> 
                                                            <div class="bg"></div>
                                                            <span class="desc"><?=GetMessage("KRAKEN_SETTINGS_CONTACTS_DESC")?></span>                                       
                                                            <input type="text" class="focus-anim text for-copy-2" name="list_kraken_descphones[n<?=count($KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['VALUE'])?>]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="rows-copy">
   

                                                <?if(!empty($KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['VALUE'])):?>
   
                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['HEAD_CONTACTS']['VALUE'] as $k => $arPhones):?>



                                                        <div class="row row-for-copy">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-right <?if(strlen($arPhones['name'])>0):?> in-focus<?endif;?>">
                                                                    <div class="bg"></div>
                                                                    <span class="desc "><?=GetMessage("KRAKEN_SETTINGS_CONTACTS")?></span>       
                                                                    <input type="text" class="focus-anim text on-save" name="list_kraken_phones[n<?=$k?>]" value="<?=$arPhones['name']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-left <?if(strlen($arPhones['desc'])>0):?> in-focus<?endif;?>"> 
                                                                    <div class="bg"></div>
                                                                    <span class="desc "><?=GetMessage("KRAKEN_SETTINGS_CONTACTS_DESC")?></span>                                       
                                                                    <input type="text" class="focus-anim text on-save" name="list_kraken_descphones[n<?=$k?>]" value="<?=$arPhones['desc']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?endforeach;?>

                                                <?endif;?>

                                            </div>

                                            <div class="addrow multy on-save">+ <span><?=GetMessage("KRAKEN_SETTINGS_CONTACTS_ADD")?></span></div>
     
                                        </div>
                                    </div>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['HEAD_EMAILS']['NAME']?></div>
                                        <div class="parent-row">

                                            <div class="empty-template">
                                                <div class="row row-for-copy">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-right">
                                                            <div class="bg"></div>
                                                            <span class="desc"><?=GetMessage("KRAKEN_SETTINGS_EMAILS")?></span>       
                                                            <input type="text" class="focus-anim text for-copy-1" name="list_kraken_emails_addr[n<?=count($KRAKEN_TEMPLATE_ARRAY['HEAD_EMAILS']['VALUE'])?>]" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-left"> 
                                                            <div class="bg"></div>
                                                            <span class="desc"><?=GetMessage("KRAKEN_SETTINGS_EMAILS_DESC")?></span>                                       
                                                            <input type="text" class="focus-anim text for-copy-2" name="list_kraken_descemails_addr[n<?=count($KRAKEN_TEMPLATE_ARRAY['HEAD_EMAILS']['VALUE'])?>]" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="rows-copy">

                                                <?if(!empty($KRAKEN_TEMPLATE_ARRAY['HEAD_EMAILS']['VALUE'])):?>

                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['HEAD_EMAILS']['VALUE'] as $k => $arEmail):?>
                                            
                                                        <div class="row row-for-copy">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-right <?if(strlen($arEmail['name'])>0):?> in-focus<?endif;?>">
                                                                    <div class="bg"></div>
                                                                    <span class="desc "><?=GetMessage("KRAKEN_SETTINGS_EMAILS")?></span>       
                                                                    <input type="text" class="focus-anim text on-save" name="list_kraken_emails_addr[n<?=$k?>]" value="<?=$arEmail['name']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input to-left <?if(strlen($arEmail['desc'])>0):?> in-focus<?endif;?>"> 
                                                                    <div class="bg"></div>
                                                                    <span class="desc "><?=GetMessage("KRAKEN_SETTINGS_EMAILS_DESC")?></span>                                       
                                                                    <input type="text" class="focus-anim text on-save" name="list_kraken_descemails_addr[n<?=$k?>]" value="<?=$arEmail['desc']?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?endforeach;?>

                                                <?endif;?>

                                            </div>

                                            <div class="addrow multy on-save">+ <span><?=GetMessage("KRAKEN_SETTINGS_EMAILS_ADD")?></span></div>
     
                                        </div>

                                    </div>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_SOCIALS_TITLE")?></div>
                                       
                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['VK']['VALUE'])>0):?> in-focus<?endif;?>">
                                            <div class="bg"></div>
                                            <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['VK']['NAME']?></span>

                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['VK']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['VK']['VALUE']?>">
                                            <div class="wrap-i"><i class="concept-vkontakte"></i></div>
                                        </div>
                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['FB']['VALUE'])>0):?> in-focus<?endif;?>">  
                                            <div class="bg"></div>
                                            <span class="desc "><?=$KRAKEN_TEMPLATE_ARRAY['FB']['NAME']?></span>     
                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['FB']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['FB']['VALUE']?>">
                                            <div class="wrap-i"><i class="concept-facebook-1"></i></div>
                                        </div>

                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['TW']['VALUE'])>0):?> in-focus<?endif;?>">
                                            <div class="bg"></div>
                                            <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['TW']['NAME']?></span>    
                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['TW']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['TW']['VALUE']?>">
                                            <div class="wrap-i"><i class="concept-twitter-bird-1"></i></div>
                                        </div>

                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['YOUTUBE']['VALUE'])>0):?> in-focus<?endif;?>">     
                                            <div class="bg"></div>
                                            <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['YOUTUBE']['NAME']?></span>  
                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['YOUTUBE']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['YOUTUBE']['VALUE']?>">
                                            <div class="wrap-i">
                                                <i class="concept-youtube-play"></i>
                                            </div>
                                        </div>

                                        <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['INST']['VALUE'])>0):?> in-focus<?endif;?>">  
                                            <div class="bg"></div>
                                            <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['INST']['NAME']?></span>  
                                            <input type="text" class='focus-anim on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['INST']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['INST']['VALUE']?>">
                                            <div class="wrap-i">
                                                <i class="concept-instagram-4"></i>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['GROUP_POS']['NAME']?></div>
                                        <ul class="form-check">

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['GROUP_POS']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['GROUP_POS']['VALUE_ID'] as $key => $opt):?>

                                                    <li>

                                                        <label>
                                                            <input class='on-save' name="kraken_<?=$opt[0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['GROUP_POS']['VALUE'][$key] == $opt[2]):?> checked<?endif;?> type="checkbox" value="<?=$opt[2]?>"><span></span><span><?=$opt[1]?></span> 
                                                        </label>
                                                       
                                                    </li>

                                                <?endforeach;?>  

                                            <?endif;?>                                           
                                            
                                        </ul>
                                    </div>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=GetMessage("KRAKEN_SHARE_TITLE")?></div>

                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class='on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SHARE_ON']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['SHARE_ON']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SHARE_ON']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['SHARE_ON']['VALUE_ID'][0][2]?>"><span></span><span><?=GetMessage("KRAKEN_SHARE_NAME")?></span> 
                                                </label>
                                               
                                            </li>
                                            <li>
                                                <label>
                                                    <input class= 'open_more_options on-save' data-show-options='call_phone_on' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_ON']['VALUE_ID'][0][0]?>" <?if($KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_ON']['VALUE'][0] == "Y"):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_ON']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_ON']['NAME']?></span>
                                                </label>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_ON']['VALUE'][0] == "Y"):?>on<?endif;?>" data-show-options='call_phone_on'>

                                        <div class="input-wrap">

                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_NUM']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_NUM']['HINT']?>"></span></div>
                                                    <div class="input to-right">                 
                                                        <input type="text" class="text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_NUM']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_NUM']['VALUE']?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_DESC']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_DESC']['HINT']?>"></span></div>
                                                    <div class="input to-right">            
                                                        <input type="text" class="text on-save" name="kraken_<?$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_DESC']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['WIDGET_FAST_CALL_DESC']['VALUE']?>">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
 
                                </div>

                                <div class="set-content" data-set='politic'>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['POLITIC_DESC']['NAME']?></div>

                                        <div class="textarea middle">
                                            <textarea class='on-save' name="kraken_politic_desc"><?=$KRAKEN_TEMPLATE_ARRAY['POLITIC_DESC']['~VALUE']?></textarea>
                                        </div>

                                    </div>

                                    <div class="input-wrap">
                                        <ul class="form-check">                                                
                                            <li>
                                                <label>
                                                    <input class='on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['POLITIC_CHECKED']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['POLITIC_CHECKED']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['POLITIC_CHECKED']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['POLITIC_CHECKED']['VALUE_ID'][0][2]?>"><span></span><span ><?=$KRAKEN_TEMPLATE_ARRAY['POLITIC_CHECKED']['NAME']?></span> 
                                                </label>
                                               
                                            </li>
                                        </ul>
                                    </div>

                                    <?if(!empty($KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['ITEMS'])):?>

                                        <div class="input-wrap">
                                            <div class="name bold"><?=GetMessage("KRAKEN_AGREEMENT_NAME")?></div>
                                            <ul class="political">

                                                <?if(!empty($KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['ITEMS'])):?>

                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['ITEMS'] as $k => $arAgr):?>

                                                        <li>
                                                            <div> 
                                                                <?=$arAgr['NAME']?> <a href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['IBLOCK_ID']?>&type=<?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['IBLOCK_TYPE']?>&ID=<?=$arAgr['ID']?>&lang=ru&find_section_section=0&WF=Y" target='_blank'></a>
                                                            </div>
                                                        </li>

                                                    <?endforeach;?>

                                                <?endif;?>
                                                
                                            </ul>
                                        </div>
                                    <?endif;?>

                                    <div class="button-wrap">
                                        <a href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['IBLOCK_ID']?>&type=<?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENT']['IBLOCK_TYPE']?>&ID=0&lang=ru&IBLOCK_SECTION_ID=0&find_section_section=0&from=iblock_list_admin' target="_blank" class="plus"><?=GetMessage("KRAKEN_SETTINGS_CHOOSE_AGREEMENT_NEW")?></a>
                                    </div>

                                </div>

                                <div class="set-content" data-set='other'>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_SITENAME")?></div>
                                            
                                        <div class="input">
                                            <div class="bg"></div>

                                            <input class="on-save" type="text" name="kraken_name_site" value="<?=$KRAKEN_TEMPLATE_ARRAY['NAME_SITE']['VALUE']?>">
                                        </div>

                                    </div>

                                    <div class="input-wrap">

                                        <div class="name bold"><?=GetMessage("KRAKEN_SETTINGS_CHOOSE_FORMS_TITLE")?></div>

                                        <div class="row">
                                            

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="input to-right in-focus">
                                                    <span class="desk"><?=GetMessage("KRAKEN_SETTINGS_CHOOSE_FORMS_CATALOG")?></span>

                                                    <select name="kraken_id_form_catalog" class='on-save'>

                                                        <?if(!empty($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'])):?>

                                                            <?foreach($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'] as $k => $arForm):?>
                                                                <option <?if($KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_CATALOG'] == $KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]?>"><?=$arForm?></option>
                                                            <?endforeach;?>

                                                        <?endif;?>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-wrap">

                                        <ul class="form-check alone">  
                                            <li>
                                                <label>
                                                    <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['ADD_SITE_TITLE']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['ADD_SITE_TITLE']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['ADD_SITE_TITLE']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['ADD_SITE_TITLE']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['ADD_SITE_TITLE']['NAME']?></span>
                                                </label>
                                            </li>
                                                                                          
                                            <li>
                                                <label>
                                                    <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MODE_FAST_EDIT']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['MODE_FAST_EDIT']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['MODE_FAST_EDIT']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['MODE_FAST_EDIT']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['MODE_FAST_EDIT']['NAME']?></span>
                                                </label>
                                            </li>

                                            <li>
                                                <label>
                                                    <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['SCROLLBAR']['VALUE_ID'][0][0]?>"<?if($KRAKEN_TEMPLATE_ARRAY['SCROLLBAR']['VALUE'][0] == $KRAKEN_TEMPLATE_ARRAY['SCROLLBAR']['VALUE_ID'][0][2]):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['SCROLLBAR']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['SCROLLBAR']['NAME']?></span>
                                                </label>
                                            </li>


                                        </ul>

                                    </div>

                                </div>

                                <div class="set-content" data-set='menu'>


                                    <div class="input-wrap parent-more-option">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['NAME']?></div>
                                        <ul class='form-radio clearfix'>


                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['VALUE_ID'] as $k => $arMenuType):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class="open_more_options on-save" data-show-options='<?if($arMenuType[2] !=1):?>menu_type<?endif;?>' <?if($KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['VALUE'] == $arMenuType[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arMenuType[0]?>" type="radio" value="<?=$arMenuType[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arMenuType[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                       </ul>
                                    </div>



                                    <div class="more-options-wrap">
                                        <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['VALUE'] =='2' || $KRAKEN_TEMPLATE_ARRAY['MENU_TYPE']['VALUE'] =='3'):?> on<?endif;?>" data-show-options='menu_type'>

                                            <div class="input-wrap">

                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_VIEW']['NAME']?></div>
                                                <ul class='form-radio clearfix'>

                                                    <?if(!empty($KRAKEN_TEMPLATE_ARRAY['MENU_VIEW']['VALUE_ID'])):?>

                                                        <?foreach($KRAKEN_TEMPLATE_ARRAY['MENU_VIEW']['VALUE_ID'] as $k => $arMenuView):?>

                                                            <li>
                                                                <label>
                                                                    <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['MENU_VIEW']['VALUE'] == $arMenuView[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arMenuView[0]?>" type="radio" value="<?=$arMenuView[2]?>">          
                                                                    <span></span>
                                                                    <span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_VIEW']['VALUE_ID'][$k][1]?></span>
                                                                </label>
                                                            </li>


                                                        <?endforeach;?>
                                                    <?endif;?>
                                                </ul>

                                            </div>

                                            <div class="input-wrap middle">
                            
                                                <div class="row">
                                                    
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['NAME']?></div>
                                                        <div class="input to-right parent-clearcolor">
                                                            <div class="bg"></div>
                                                           
                                                            <?
                                                                $color = ' ';
                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE'])>0)
                                                                    $color= $KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE'];
                                                            ?>

                                                      

                                                            <input id="picker_<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE_ID']?>" class="picker_color on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE_ID']?>" type="text" value="<?=$color?>">
                                                            <span class='call_picker'></span>

                                                            <div class="picker-wrap">
                                                                <a class="picker-close"></a>
                                                                <div id="panel_<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE_ID']?>_panel" class='picker_panel on-save'></div>
                                                            </div>

                                                            <div class="clearcolor on-save <?if(strlen($KRAKEN_TEMPLATE_ARRAY['MENU_BG_COLOR']['VALUE'])>1):?> on<?endif;?>"></div>
                                                            
                                                            
                                                        </div>

                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_OPACITY']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_OPACITY']['HINT']?>"></span></div>
                                                        <div class="input to-left">                                        
                                                            <input class='on-save' type="text" class="text" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_OPACITY']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['MENU_BG_OPACITY']['VALUE']?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-wrap">
                                                <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MENU_TEXT_COLOR']['NAME']?></div>

                                                <ul class='form-radio clearfix'>

                                                    <?if(!empty($KRAKEN_TEMPLATE_ARRAY['MENU_TEXT_COLOR']['VALUE_ID'])):?>

                                                        <?foreach($KRAKEN_TEMPLATE_ARRAY['MENU_TEXT_COLOR']['VALUE_ID'] as $arPos):?>
                                                        
                                                            <li>
                                                                <label>
                                                                    <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['MENU_TEXT_COLOR']['VALUE'] == $arPos[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arPos[0]?>" type="radio" value="<?=$arPos[2]?>">          
                                                                    <span></span>
                                                                    <span class="text"><?=$arPos[1]?></span>
                                                                </label>
                                                            </li>

                                                        <?endforeach;?>

                                                    <?endif;?>

                                                </ul>
                                         
                                            </div>


                                            
                                        </div>
                                    </div>

                                    <div class="input-wrap">
                                        <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['MOBILE_MENU_TONE']['NAME']?></div>


                                        <ul class='form-radio clearfix'>

                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['MOBILE_MENU_TONE']['VALUE_ID'])):?>

                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['MOBILE_MENU_TONE']['VALUE_ID'] as $arPos):?>
                                                
                                                    <li>
                                                        <label>
                                                            <input class='on-save' <?if($KRAKEN_TEMPLATE_ARRAY['MOBILE_MENU_TONE']['VALUE'] == $arPos[2]):?>checked="checked"<?endif;?> name="kraken_<?=$arPos[0]?>" type="radio" value="<?=$arPos[2]?>">          
                                                            <span></span>
                                                            <span class="text"><?=$arPos[1]?></span>
                                                        </label>
                                                    </li>

                                                <?endforeach;?>

                                            <?endif;?>

                                        </ul>
                                 
                                    </div>
                                </div>

                                <div class="set-content active" data-set='instruct'>
                                    <div class="input-wrap">
                                  

                                        <div class="instruct">
                                            <a target="_blank" href="https://youtu.be/VNOxzzebVYc"><?=GetMessage("KRAKEN_SETTINGS_INSTRUCT6")?></a>
                                        </div>

                                        <div class="instruct">
                                            <a target="_blank" href="https://goo.gl/XwGdiY"><?=GetMessage("KRAKEN_SETTINGS_INSTRUCT1")?></a>
                                        </div>
                                        
                                        <div class="instruct">
                                            <a target="_blank" href="https://goo.gl/ffvH6d"><?=GetMessage("KRAKEN_SETTINGS_INSTRUCT2")?></a>
                                        </div>
                                        
                                        <div class="instruct">
                                            <a target="_blank" href="https://concept360.ru/marketplace/icons/"><?=GetMessage("KRAKEN_SETTINGS_INSTRUCT4")?></a>
                                        </div>
                                        <div class="instruct">
                                            <a target="_blank" href="https://goo.gl/MJ9Dq8"><?=GetMessage("KRAKEN_SETTINGS_INSTRUCT5")?></a>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="set-content" data-set='cart'>

                                    <div class="input-wrap clearfix">
                       
                                        <ul class="form-check alone">                                                
                                            <li>
                                                <label>
                                                    <input class= 'open_more_options on-save' data-show-options='cart_on' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_ON']['VALUE_ID'][0][0]?>" <?if($KRAKEN_TEMPLATE_ARRAY['CART_ON']['VALUE'][0][0] == 'Y'):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_ON']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['CART_ON']['NAME']?></span>
                                                </label>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="more-option <?if($KRAKEN_TEMPLATE_ARRAY['CART_ON']['VALUE'][0] == 'Y'):?>on<?endif;?>" data-show-options='cart_on'>

                                        <div class="section-title"><?=GetMessage("KRAKEN_CART_BASE_TITLE")?></div>

                                        <div class="input-wrap middle-sm clearfix">

                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_FORMS")?><a target = "_blank" href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=<?=$KRAKEN_TEMPLATE_ARRAY['FORMS']["IBLOCK_ID"]?>&type=<?=$arParams["IBLOCK_TYPE"]?>&lang=ru&find_section_section=0" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_FORMS_HINT")?>"></a></div>
                                                <div class="row clearfix">

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-right in-focus">
                                                            <span class="desk"><?=GetMessage("KRAKEN_CART_FORM_FAST_ORDER")?></span>

                                                            <select name="kraken_fast_order" class='on-save'>
                                                                <?foreach($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'] as $k => $arForm):?>
                                                                    <option <?if($KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_FAST_ORDER'] == $KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]?>"><?=$arForm?></option>
                                                                <?endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="input to-left in-focus">
                                                            <span class="desk"><?=GetMessage("KRAKEN_CART_FORM_ORDER")?></span>

                                                            <select name="kraken_order" class='on-save'>
                                                                <?foreach($KRAKEN_TEMPLATE_ARRAY["FORMS"]['NAME'] as $k => $arForm):?>
                                                                    <option <?if($KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ORDER'] == $KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]):?> selected <?endif;?> value="<?=$KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_ID'][$k]?>"><?=$arForm?></option>
                                                                <?endforeach;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                        </div>

                                        <div class="input-wrap middle-sm clearfix">

                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_BAS_CURR_TITLE")?><a target = "_blank" href="/bitrix/admin/kraken_shop_currency.php" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_CURR_HINT")?>"></a></div>
                                            <div class="row clearfix">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                    <div class="input to-right in-focus">
                                                        <span class="desk"><?=GetMessage("KRAKEN_CART_BAS_CURR")?></span>

                                                        <select name="kraken_base_curr" class='on-save'>
                                                            <?foreach($DB_kraken["CURRENCY"]["ITEMS"] as $arItem):?>
                                                                <option <?if($KRAKEN_TEMPLATE_ARRAY['BASE_CURR']['VALUE'] == $arItem["ID"]):?> selected <?endif;?> value="<?=$arItem["ID"]?>"><?=$arItem["NAME"]?></option>
                                                            <?endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="input-wrap">

                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['CART_UNITS']['NAME']?><a target = "_blank" href="/bitrix/admin/kraken_shop_units.php" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_UNITS_HINT")?>"></a></div>
                                            <ul class="form-check">
                                            

                                                <?foreach($DB_kraken["UNITS"]["ITEMS"] as $arItem):?>

                                                    <li>

                                                        <label>
                                                            <input class='on-save' name="kraken_cart_unit<?=$arItem["ID"]?>" <?if(in_array($arItem["ID"], $KRAKEN_TEMPLATE_ARRAY['CART_UNITS']['VALUE'])):?> checked<?endif;?> type="checkbox" value="<?=$arItem["ID"]?>"><span></span><span><?=$arItem["NAME"]?></span> 
                                                        </label>
                                                       
                                                    </li>

                                                <?endforeach;?>                                             
                                                
                                            </ul>

                                        </div>

                                        <div class="input-wrap">

                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['CART_PAY']['NAME']?><a target = "_blank" href="/bitrix/admin/kraken_shop_payment.php" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_PAY_HINT")?>"></a></div>
                                            <ul class="form-check">
                                            

                                                <?foreach($DB_kraken["PAYMENT"]["ITEMS"] as $arItem):?>

                                                    <li>

                                                        <label>
                                                            <input class='on-save' name="kraken_cart_pay<?=$arItem["ID"]?>" <?if(in_array($arItem["ID"], $KRAKEN_TEMPLATE_ARRAY['CART_PAY']['VALUE'])):?> checked<?endif;?> type="checkbox" value="<?=$arItem["ID"]?>"><span></span><span><?=$arItem["NAME"]?></span> 
                                                        </label>
                                                       
                                                    </li>

                                                <?endforeach;?>                                             
                                                
                                            </ul>

                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_PAY_TIT']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_PAY_TIT']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_PAY_TIT']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_PAY_TIT']['VALUE']?>">
                                            </div>

                                        </div>


                                        <div class="input-wrap big">
                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['CART_DELIV']['NAME']?><a target = "_blank" href="/bitrix/admin/kraken_shop_delivery.php" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_DELIV_HINT")?>"></a></div>
                                            <ul class="form-check">

                                                <?foreach($DB_kraken["DELIVERY"]["ITEMS"] as $arItem):?>

                                                    <li>
                                                        <label>
                                                            <input class='on-save' name="kraken_cart_deliv<?=$arItem["ID"]?>" <?if(in_array($arItem["ID"], $KRAKEN_TEMPLATE_ARRAY['CART_DELIV']['VALUE'])):?> checked<?endif;?> type="checkbox" value="<?=$arItem["ID"]?>"><span></span><span><?=$arItem["NAME"]?></span> 
                                                        </label>
                                                       
                                                    </li>

                                                <?endforeach;?>                                             
                                                
                                            </ul>

                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_DELIV_TIT']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_DELIV_TIT']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_DELIV_TIT']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_DELIV_TIT']['VALUE']?>">
                                            </div>

                                        </div>

                                        <div class="section-title"><?=GetMessage("KRAKEN_CART_DESIGN_TITLE")?></div>

                                        <div class="input-wrap none">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="input to-right clearfile-parent">

                                                        <?$name_cart_bg = CFile::GetFileArray($KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE']);?>

                                                        <input type="hidden" name="image<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE']?>">
                                                        <input type="hidden" class='kraken_file_del' name="<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE_ID']?>_del" value="">
                                                        
                                                        <label class="file on-save<?if(strlen($name_cart_bg["ORIGINAL_NAME"]) > 0):?> focus-anim<?endif;?> click-file-clear">
                                                            <span class="ex-file-desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['NAME']?></span>
                                                            <span class="ex-file"><?=$name_cart_bg["ORIGINAL_NAME"]?></span>
                                                            <input type="file" accept="image/*" class="hidden" id="<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE_ID']?>" name="<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_BG']['VALUE_ID']?>"/>

                                                        </label>

                                                        <div class="clearfile on-save<?if(strlen($name_cart_bg["ORIGINAL_NAME"]) > 0):?> on<?endif;?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="input-wrap">

                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_HEAD_TIT']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_TIT']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_TIT']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_TIT']['VALUE']?>">
                                            </div>

                                        </div>

                                        <div class="input-wrap">
                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_DESIGN_BTNS_TITLE")?></div>
                      
                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADD_NAME']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADD_NAME']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADD_NAME']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADD_NAME']['VALUE']?>">
                                            </div>
                            
                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADDED_NAME']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADDED_NAME']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADDED_NAME']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ADDED_NAME']['VALUE']?>">
                                            </div>

                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_ORDER_NAME']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ORDER_NAME']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ORDER_NAME']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_ORDER_NAME']['VALUE']?>">
                                            </div>

                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_FAST_ORDER_NAME']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_FAST_ORDER_NAME']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_FAST_ORDER_NAME']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_FAST_ORDER_NAME']['VALUE']?>">
                                            </div>
                                        </div>

                                        <div class="input-wrap big">
                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['CART_COMMENT']['NAME']?></div>
                                            <div class="textarea on-save">
                                                <textarea name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_COMMENT']['VALUE_ID']?>"><?=$KRAKEN_TEMPLATE_ARRAY['CART_COMMENT']['VALUE']?></textarea>
                                            </div>
                                        </div>

                                        <div class="section-title"><?=GetMessage("KRAKEN_CART_MESSAGES_TITLE")?></div>

                                        <div class="input-wrap middle-sm">
                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_MESSAGE_ADMIN_TIT")?></div>
                                            <div class="input<?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_ADMIN']['VALUE']) > 0):?> in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_ADMIN']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_ADMIN']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_ADMIN']['VALUE']?>">
                                            </div>
                                       
                                        </div>

                                        <div class="input-wrap middle-sm">
                                            <div class="textarea focus-anim <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MESS_ADMIN']['VALUE'])>0):?>in-focus<?endif;?> middle on-save">

                                                <div class="bg"></div>

                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_ADMIN']['NAME']?></span>

                                                <textarea class="focus-anim" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_ADMIN']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_ADMIN']['VALUE']?>"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_ADMIN']['VALUE']?></textarea>
                                            </div>
                                        </div>

                                        <div class="input-wrap middle-sm">
                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_MESSAGE_USER_TIT")?></div>
                                            <div class="input<?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_USER']['VALUE']) > 0):?> in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_USER']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_USER']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_THEME_USER']['VALUE']?>">
                                            </div>
                                       
                                        </div>

                                        <div class="input-wrap middle-sm">
                                            <div class="textarea focus-anim <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MESS_USER']['VALUE'])>0):?>in-focus<?endif;?> middle on-save">

                                                <div class="bg"></div>

                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_USER']['NAME']?></span>

                                                <textarea class="focus-anim" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_USER']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_USER']['VALUE']?>"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MESS_USER']['VALUE']?></textarea>
                                            </div>
                                        </div>

                                        <div class="input-wrap big">

                                            <a href="/bitrix/admin/concept_kraken.php?lang=ru&site_id=<?=SITE_ID?>" target="_blank"><span class="bord"><?=GetMessage("KRAKEN_CART_MESSAGE_COMMENT_LINK")?></span></a>

                                            <div class="spec-comment no-line italic">
                                                <?=GetMessage("KRAKEN_CART_MESSAGE_COMMENT")?>
                                            </div>

                                       </div>

                                        <div class="section-title"><?=GetMessage("KRAKEN_CART_OTHER_TITLE")?></div>

                                        <div class="input-wrap middle-sm">

                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']['NAME']?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']['HINT']?>"></span></div>
                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']['VALUE_ID'])):?>
                                                <ul class='edit-style form-radio'>
                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']['VALUE_ID'] as $arItem):?>

                                                        <li>
                                                   
                                                            <label>
                                                                <input class='on-save' <?if($arItem[2] == $KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']['VALUE']):?> checked="checked"<?endif;?> name="kraken_<?=$arItem[0]?>" type="radio" value="<?=$arItem[2]?>">          
                                                                <span></span>
                                                                <span class="text"><?=$arItem[1]?></span>
                                                            </label>

                                                            <a href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arResult["AGREEMENT_BLOCK"]["ID"]?>&type=concept_hameleon&ID=<?=$arItem['ID']?>&lang=ru&find_section_section=0&WF=Y" target='_blank' data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=GetMessage("KRAKEN_SET_MAIN_EDIT")?>"></a>
                                                        </li>

                                                    <?endforeach;?>
                                                </ul>

                                            <?endif;?>

                                        </div>

                                        <div class="input-wrap middle-sm">
                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']['VALUE']?>">
                                            </div>
                                        </div>

                                        <div class="input-wrap big">
                                            <div class="input <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']['VALUE']?>">
                                            </div>
                                        </div>

                                        <div class="input-wrap">
                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['ADVS']['NAME']?><a target = "_blank" href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=<?=$arResult["ADV_BLOCK"]['ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&lang=ru&find_section_section=0" class="edit-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_CART_ADVS_HINT")?>"></a></div>
                                            <ul class="form-check">



                                                <?foreach($KRAKEN_TEMPLATE_ARRAY['ADVS']['VALUE_ID'] as $key => $arItem):?>

                                                    <li>
                                                        <label>
                                                            <input class='on-save' name="kraken_cart_advs<?=$arItem[2]?>" <?if(in_array($arItem[2], $KRAKEN_TEMPLATE_ARRAY['ADVS']['VALUE'])):?> checked<?endif;?> type="checkbox" value="<?=$arItem[2]?>"><span></span><span><?=$arItem[1]?></span> 
                                                        </label>
                                                       
                                                    </li>

                                                <?endforeach;?>                                             
                                                
                                            </ul>
                                        </div>

                                        <div class="input-wrap big">
                                            <ul class="form-check alone">                                                
                                                <li>
                                                    <label>
                                                        <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_ADD_ON']['VALUE_ID'][0][0]?>" <?if($KRAKEN_TEMPLATE_ARRAY['CART_ADD_ON']['VALUE'][0] == "Y"):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_ADD_ON']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['CART_ADD_ON']['NAME']?></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>



                                        <div class="section-title"><?=GetMessage("KRAKEN_CART_SET_MINICART")?></div>

                                        <div class="input-wrap middle-sm">

                                            <div class="name bold"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_MODE']['NAME']?></div>
                                            <?if(!empty($KRAKEN_TEMPLATE_ARRAY['CART_MINICART_MODE']['VALUE_ID'])):?>
                                                <ul class='edit-style form-radio'>
                                                    <?foreach($KRAKEN_TEMPLATE_ARRAY['CART_MINICART_MODE']['VALUE_ID'] as $arItem):?>

                                                        <li>
                                                   
                                                            <label>
                                                                <input class='on-save' <?if($arItem[2] == $KRAKEN_TEMPLATE_ARRAY['CART_MINICART_MODE']['VALUE']):?> checked="checked"<?endif;?> name="kraken_<?=$arItem[0]?>" type="radio" value="<?=$arItem[2]?>">          
                                                                <span></span>
                                                                <span class="text"><?=$arItem[1]?></span>
                                                            </label>
                                                        </li>

                                                    <?endforeach;?>
                                                </ul>

                                            <?endif;?>

                                        </div>

                                        <div class="input-wrap">

                                            <div class="name bold"><?=GetMessage("KRAKEN_CART_EMPTY_LINK")?><span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_LINK_PAGE']['HINT']?>"></span></div>

                                            <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MINICART_LINK_PAGE']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_LINK_PAGE']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_LINK_PAGE']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_LINK_PAGE']['VALUE']?>">
                                            </div>
                                        </div>


                                        <div class="input-wrap">

                                            <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_EMPTY']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_EMPTY']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_EMPTY']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_EMPTY']['VALUE']?>">
                                            </div>
                                        </div>


                                        <div class="input-wrap big">

                                            <div class="input to-right <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_NOEMPTY']['VALUE']) > 0):?>in-focus<?endif;?>">
                                                <div class="bg"></div>
                                                <span class="desc"><?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_NOEMPTY']['NAME']?></span>       
                                                <input type="text" class="focus-anim text on-save" name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_NOEMPTY']['VALUE_ID']?>" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_MINICART_DESC_NOEMPTY']['VALUE']?>">
                                            </div>
                                        </div>

                                        <div class="input-wrap big">
                                            <ul class="form-check alone">                                                
                                                <li>
                                                    <label>
                                                        <input class= 'on-save' name="kraken_<?=$KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['VALUE_ID'][0][0]?>" <?if($KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['VALUE'][0] == "Y"):?> checked<?endif;?> type="checkbox" value="<?=$KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['VALUE_ID'][0][2]?>"><span></span><span class="text"><?=$KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['NAME']?></span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>

                                </div>

                            </td>
                        </tr>
                    </table>
                    
                    
                </div>
                <div class="kraken-set-foot off">
                    <table>
                        <tr>
                            <td class='set-left'>
                                <div class="load">
                                    <div class="xLoader form-preload set-load"><div class="audio-wave"><span></span><span></span><span></span><span></span><span></span></div></div>
                                </div>
                                <button class="active" name="form-submit" type="submit" value=""><?=GetMessage("KRAKEN_SETTINGS_LIST_SAVE")?></button>
                               </td>
                            <td class='set-right'>
                                <div class='kraken-set-close'><?=GetMessage("KRAKEN_SETTINGS_LIST_CLOSE")?></div>
                            </td>
                        </tr>
                    </table>
                    
                </div>
            </form>
        
        </div>
    </div>


    <div class="kraken-setting addpage">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3 kraken-set-image"><div></div></td>
                        <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_ADDPAGE")?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <form action="/" class="form-page-list" enctype="multipart/form-data" method="post" role="form">

                <input type="hidden" name="site_id" value="<?=SITE_ID?>" />
                

                <?if(!empty($arResult["SECTIONS"])):?>
                    <?foreach($arResult["SECTIONS"] as $arSection):?>
                        <input type="hidden" name="page_active<?=$arSection['ID']?>" value="<?=$arSection['ACTIVE']?>">
                    <?endforeach;?>
                <?endif;?>


                <div class="kraken-set-content">
                    <ul class="list">

                        <?if(!empty($arResult["SECTIONS"])):?>
                    
                            <?foreach($arResult["SECTIONS"] as $key=>$arSection):?>
                                
                                <li>
                                
                                    <?if($arSection["ID"] == $arParams["CURRENT_SECTION_ID"]):?>
                                        <div class="active" data-toggle="tooltip" data-placement="right" title="<?=GetMessage("KRAKEN_SETTINGS_LIST_CURRENT_PAGE")?>"></div>
                                    <?endif;?>
                                    
                                    <?if($key == 0):?>
                                        <?$url = SITE_DIR;?>
                                    <?else:?>
                                        <?$url = $arSection["SECTION_PAGE_URL"];?>
                                    <?endif;?>
                              
                                    <?$url2 = $arResult["SERVER_URL"].$url;?>
                                

                                    <span class="list-name">
                                        
                                        <?if($arSection["ID"] != $arParams["CURRENT_SECTION_ID"]):?>
                                            <a href="<?=$url2?>"><span class="bord-bot"><?=$arSection["NAME"]?></span></a>
                                        <?else:?>
                                            <?=$arSection["NAME"]?>
                                        <?endif;?>
                                       
                                    </span>


                                    
                                    <span class="icons-wrap parent_copy">
                                        
                                        <a data-clipboard-text="<?=$url2?>" class="icon list-copy" data-toggle="tooltip" data-placement="top" title="<?=GetMessage("KRAKEN_SETTINGS_LIST_COPY")?>"></a>
                                        
                                        <span class="al copy-success"><?=GetMessage("KRAKEN_SETTINGS_LIST_ALL_SETTINGS_ALERT")?></span>
                                    </span>

                                    <div class="more_set">
                                        <table class='more_set'>
                                            <tr>
                                                <td class='left_set'>
                                                    <span><?=GetMessage("KRAKEN_SETTINGS_LIST_SORT")?></span>
                                                    <input type="text" name = 'sort_<?=$arSection["ID"]?>' class="sort" value="<?=$arSection["SORT"]?>">
                                                </td>
                                                <td class='right_set'>
                                                    <div class="ignite<?if(strlen($arSection['ACTIVE']=='Y')):?> on<?endif;?>">
                                                        <span class="off"><?=GetMessage("KRAKEN_SETTINGS_LIST_PAGE_OFF")?></span>
                                                        <span class="on"><?=GetMessage("KRAKEN_SETTINGS_LIST_PAGE_ON")?></span>
                                                        <span class="toggle-indicator" data-page-id = '<?=$arSection["ID"]?>'>
                                                            <span class="toggle-icon"></span>
                                                            <span class="toggle-icon-overlay"></span>
                                                        </span> 
                                               
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                    
                                   
                                    <?if($arSection["ID"] == $arParams["CURRENT_SECTION_ID"]):?>
                                    
                                        <div class="domen">
                                            <div class="arrow"></div>
                                            <?=$url2?>
                                        </div>

                                    <?endif;?>
                                    
                                 
                
                                </li>
                            
                            <?endforeach;?>

                        <?endif;?>
                        
                    </ul>

                    <div class="button-wrap">
                        <a class="plus new_page" data-open-set='newpage'><?=GetMessage("KRAKEN_SETTINGS_LIST_ADD_BUTTON")?></a>
                        <a class="edit open_edit"><?=GetMessage("KRAKEN_SETTINGS_LIST_EDIT_SETS_EDIT_LIST")?></a>
                    </div>

                    <div class="more_edit">
                        <div class="load">
                            <div class="xLoader form-preload"><div class="audio-wave"><span></span><span></span><span></span><span></span><span></span></div></div>
                        </div>
                        <button class="active btn-green" name="form-submit" type="submit" value=""><?=GetMessage("KRAKEN_SETTINGS_LIST_SAVE")?></button>

                        <a class="edit close_edit"><?=GetMessage("KRAKEN_SETTINGS_LIST_CANCEL")?></a>
                    </div>
                </div>
               
            </form>
        
        </div>
    </div>

    <div class="kraken-setting newpage">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_NEWPAGE")?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <form action="/" class="set-form form-add-page" enctype="multipart/form-data" method="post" role="form">

                <input type="hidden" name="site_id" value="<?=SITE_ID?>" />
                <input type="hidden" name="server_url" value="<?=$arResult["SERVER_URL"]?>" />
                <input type="hidden" name="iblock_id" id="iblock_id" value="<?=$arParams["IBLOCK_ID"]?>" />

                <div class="kraken-set-content">

                    <div class="input-wrap">
                        <div class="name"><?=GetMessage("KRAKEN_SETTINGS_NEW_PAGE_NAME")?></div>

                        <div class="input">
                            <input type="text" class="name require" name="newpage_name" value="">
                        </div>

                    </div>

                    <div class="input-wrap">
                        <div class="name"><?=GetMessage("KRAKEN_SETTINGS_NEW_PAGE_ID")?> <span class="answer" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_NEW_PAGE_ID_HINT")?>"></span></div>

                        <div class="input">
                            <input type="text" class="name require" name="newpage_id" value="">
                        </div>

                    </div>

                    <div class="input-wrap">
                        <div class="load">
                            <div class="xLoader form-preload"><div class="audio-wave"><span></span><span></span><span></span><span></span><span></span></div></div>
                        </div>
                        <button class="active btn-green" name="form-submit" type="submit" value=""><?=GetMessage("KRAKEN_SETTINGS_NEW_PAGE_SAVE")?></button>
                    </div>

                </div>
               
            </form>
        
        </div>
    </div>

   

    <div class="kraken-setting modals list-style">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3 kraken-set-image"><div></div></td>
                        <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_MODAL")?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <div class="kraken-set-content">


                <?if(!empty($arResult['MODALS_IN_SECTION'])):?>
                    <?foreach($arResult['MODALS_IN_SECTION'] as $arSectModal):?>

                        <div class="list-wrap">

                            <div class="list-title"><?=$arSectModal['NAME']?></div>

                        	<ul class='list'>
                                <?if(!empty($arSectModal['ELEMENTS'])):?>
                                    <?foreach($arSectModal['ELEMENTS'] as $arModal):?>
                                        <li>
                                            <span class="list-name"><a class='call-modal callmodal from-set' data-call-modal="modal<?=$arModal['ID']?>"><span class="bord-bot"><?=$arModal['NAME']?></span></a></span><a data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_DEF_EDIT")?>" class='edit-list' href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arModal['IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=<?=$arModal['IBLOCK_SECTION_ID']?>&find_section_section=<?=$arModal['IBLOCK_SECTION_ID']?>&from=iblock_list_admin" target="_blank"></a>
                                            
                                        </li>
                                    <?endforeach;?>
                                <?endif;?>
                              
                        	</ul>

                        </div>

                    <?endforeach;?>
                <?endif;?>

                <?if(!empty($arResult['MODALS_ELEMENTS_NO_SECTION'])):?>
                    <div class="list-wrap">
                        <ul class='list'>
                            <?foreach($arResult['MODALS_ELEMENTS_NO_SECTION'] as $arModal):?>

                                <li>
                                    <span class="list-name"><a class='call-modal callmodal from-set' data-call-modal="modal<?=$arModal['ID']?>"><span class="bord-bot"><?=$arModal['NAME']?></span></a></span><a data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_DEF_EDIT")?>" class='edit-list' href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arModal['IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arModal['ID']?>&lang=ru&find_section_section=0&WF=Y" target="_blank"></a>


                                </li>

                            <?endforeach;?>
                        </ul>
                    </div>
                <?endif;?>


                <div class="button-wrap">
                    <a class="plus" href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arResult['MODALS_ELEMENTS_IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=0&find_section_section=0&from=iblock_list_admin' target="_blank"><?=GetMessage("KRAKEN_ADD_MODAL")?></a>
              
                </div>

            </div>

            
        
        </div>
    </div>


    <div class="kraken-setting forms list-style">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3 kraken-set-image"><div></div></td>
                        <td class="col-lg-6 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_LIST_FORMS")?></td>
                        <td class="col-lg-3 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <div class="kraken-set-content">

                <?if(!empty($arResult['FORMS_IN_SECTION'])):?>
                    <?foreach($arResult['FORMS_IN_SECTION'] as $arSectForm):?>

                        <?if(empty($arSectForm['ELEMENTS'])) continue;?>

                        <div class="list-wrap">

                            <div class="list-title"><?=$arSectForm['NAME']?></div>

                            <ul class='list'>
                                <?if(!empty($arSectForm['ELEMENTS'])):?>
                                    <?foreach($arSectForm['ELEMENTS'] as $arForm):?>
                                        <li>
                                            <span class="list-name"><a class='call-modal callform from-set' data-call-modal="form<?=$arForm['ID']?>"><span class="bord-bot"><?=$arForm['NAME']?></span></a></span><a data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_DEF_EDIT")?>" class='edit-list' href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arForm['IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arForm['ID']?>&lang=ru&find_section_section=<?=$arForm['IBLOCK_SECTION_ID']?>&WF=Y" target="_blank"></a>
                                        </li>
                                    <?endforeach;?>
                                <?endif;?>
                              
                            </ul>

                        </div>

                    <?endforeach;?>
                <?endif;?>

                <?if(!empty($arResult['FORMS_ELEMENTS_NO_SECTION'])):?>
                    <div class="list-wrap">
                        <ul class='list'>
                            <?foreach($arResult['FORMS_ELEMENTS_NO_SECTION'] as $arForm):?>

                                <li>
                                    <span class="list-name"><a data-toggle="tooltip" data-placement="right" title="" data-original-title="<?=GetMessage("KRAKEN_SETTINGS_DEF_EDIT")?>" class='call-modal callform from-set' data-call-modal="form<?=$arForm['ID']?>"><span class="bord-bot"><?=$arForm['NAME']?></span></a></span><a class='edit-list' href="/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arForm['IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=<?=$arForm['ID']?>&lang=ru&find_section_section=0&WF=Y" target="_blank"></a>
                                </li>
                                
                            <?endforeach;?>
                        </ul>
                    </div>
                <?endif;?>

                <div class="button-wrap">
                    <a class="plus" href='/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=<?=$arResult['FORMS_ELEMENTS_IBLOCK_ID']?>&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=0&lang=ru&IBLOCK_SECTION_ID=0&find_section_section=0&from=iblock_list_admin' target="_blank"><?=GetMessage("KRAKEN_ADD_FORM")?></a>
                    <a class="edit instr" href='https://goo.gl/ffvH6d' target="_blank"><?=GetMessage("KRAKEN_FORM_HINT")?></a>
                </div>

            </div>

            
        
        </div>
    </div>

    <div class="kraken-setting iblist list-style">
        <div class="inner">

            <div class="kraken-set-head">
                <table>
                    <tr>
                        <td class="col-lg-2 col-md-3 col-sm-3 col-xs-3 kraken-set-image"><div></div></td>
                        <td class="col-lg-8 col-md-6 col-sm-6 col-xs-6 kraken-set-name bold"><?=GetMessage("KRAKEN_SETTINGS_IBLIST_TITLE")?></td>
                        <td class="col-lg-2 col-md-3 col-sm-3 col-xs-3"></td>
                    </tr>
                </table>

                <a class="kraken-set-close"></a>
                
            </div>

            <div class="kraken-set-content">

                <ul class='list'>

                    <?if(!empty($arResult['IBLIST'])):?>
                        <?foreach($arResult['IBLIST'] as $ibItem):?>

                            <li>

                                <span class="list-name"><a target="_blank" href="/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=<?=$ibItem["ID"]?>&type=<?=$ibItem["IBLOCK_TYPE_ID"]?>&lang=ru&find_section_section=0"><span class="bord-bot"><?=$ibItem["NAME"]?></span></a></span>
                                
                            </li>

                        <?endforeach;?>
                    <?endif;?>

                </ul>

  
            </div>

            
        
        </div>
    </div>


</div>