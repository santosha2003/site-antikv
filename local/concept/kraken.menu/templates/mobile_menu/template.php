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
global $KRAKEN_TEMPLATE_ARRAY;
?>
<?$bIsMainPage = $APPLICATION->GetCurDir(false) == SITE_DIR;?>

<a class="close-menu mobile hidden-lg hidden-md hidden-sm"></a>
    <div class="open-menu-mobile hidden-lg hidden-md hidden-sm tone-<?=$KRAKEN_TEMPLATE_ARRAY["MOBILE_MENU_TONE"]['VALUE']?>">

        <div class="menu-mobile-inner">

            <div class="head-wrap">
                <table class="logotype">
                    <tr>
                        <td>
                            <?if(strlen($KRAKEN_TEMPLATE_ARRAY["HEAD_LOGO"]['VALUE'])>0):?>
                                                             
                                <?$logotypeResize = CFile::ResizeImageGet($KRAKEN_TEMPLATE_ARRAY["HEAD_LOGO"]['VALUE'], array('width'=>500, 'height'=>90), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

                                <?if(!$bIsMainPage):?><a href="<?=SITE_DIR?>"><?endif;?>
                                    <img class="img-responsive" src="<?=$logotypeResize['src']?>" alt="logotype" />
                                <?if(!$bIsMainPage):?></a><?endif;?>
                              
                             <?endif;?>
                        </td>
                    </tr>
                </table>
                
            </div>
        
               
            <div class="menu-content">

                <ul class="mobile-menu-list main-list show-open" data-menu-list="main">

                    <?foreach($arResult as $arItem):?>
                        <?$colorText = '';?>
                        <?$icon = '';?>

                        <?if(strlen($arItem['MENU_COLOR'])>0):?>
                                <?$colorText = ' style="color: '.$arItem['MENU_COLOR'].'";';?>
                            <?endif;?>

                        <?if($arItem['MENU_IC_US'] > 0):?>

                            <?$iconResize = CFile::ResizeImageGet($arItem['MENU_IC_US'], array('width'=>19, 'height'=>19), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

                            <?$icon = '<img class="img-responsive img-icon" src="'.$iconResize['src'].'" alt="icon" />';?>

                        <?elseif(strlen($arItem['MENU_ICON'])>0):?>
                            <?$icon = '<i class="concept-icon '.$arItem['MENU_ICON'].'"></i>';?>
                        <?endif;?>

                        <li class="<?if($arItem["SELECTED_MENU"] == "Y"):?>selected<?endif;?><?if(!empty($arItem["SUB"])):?> parent<?endif;?>">

                            <a 

                            <?if($arItem['NOLINK']):?>

                                <?=CKraken::krakenMenuAttr ($arItem, $arItem['MENU_TYPE_VAL']['XML_ID'])?>

                            <?else:?>

                                <?if(strlen($arItem['LINK'])>0 && empty($arItem["SUB"]) && !$arItem["NONE"] ):?> 

                                    href="<?=$arItem['LINK']?>"

                                    <?if($arItem['BLANK']):?>

                                        target='_blank'

                                    <?endif;?>

                                <?endif;?>

                            <?endif;?>


                             <?=$colorText?><?if(!empty($arItem["SUB"])):?> class="open-mobile-list" data-menu-list="<?=$arItem['IBLOCK_ID'].$arItem["ID"]?>"<?endif;?>><?=$icon?><?=$arItem['NAME']?></a>
                            <div class="border-mob-menu"></div>
                        </li> 

                    <?endforeach;?>
                </ul><!-- ^mobile-menu-list -->

                <?foreach($arResult as $arItem):?>

                    <?if(empty($arItem["SUB"])) continue;?>

                    <?$colorText = '';?>
                    <?$icon = '';?>

                    <?if($arItem['MENU_IC_US']>0):?>

                        <?$iconResize = CFile::ResizeImageGet($arItem['MENU_IC_US'], array('width'=>19, 'height'=>19), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

                        <?$icon = '<img class="img-responsive img-icon" src="'.$iconResize['src'].'" alt="icon" />';?>

                    <?elseif(strlen($arItem['MENU_ICON'])>0):?>
                        <?$icon = '<i class="concept-icon '.$arItem['MENU_ICON'].'"></i>';?>
                    <?endif;?>


                    <ul class="mobile-menu-list in-list" data-menu-list="<?=$arItem['IBLOCK_ID'].$arItem['ID']?>">
                        <li class="back"><a class="open-mobile-list" data-menu-list="main"><i class='concept-icon concept-left-open-1'></i><?=GetMessage("KRAKEN_MOBILE_MENU_BACK")?></a></li>

                        <li class="menu-title">
                            <a 

                            <?if($arItem['NOLINK']):?>

                                class = "<?=CKraken::krakenMenuClass($arItem, $arItem['TYPE'])?>"

                                <?=CKraken::krakenMenuAttr($arItem, $arItem['TYPE'])?>

                            <?else:?>

                                <?if(strlen($arItem['LINK'])>0):?> 

                                    href="<?=$arItem['LINK']?>"

                                    <?if($arItem['BLANK']):?>

                                        target='_blank'

                                    <?endif;?>

                                <?endif;?>

                            <?endif;?>

                            <?=$colorText?>><?=$icon?><?=$arItem['NAME']?>
                                

                            </a>
                        </li>
                        <?foreach($arItem["SUB"] as $arElements):?>
                            <li class="<?if(!empty($arElements["SUB"])):?>parent<?endif;?><?if($arElements["SELECTED"]):?> selected<?endif;?>">
                                <a 

                                <?if($arElements['NOLINK']):?>

                                    class = "<?=CKraken::krakenMenuClass($arElements, $arElements['TYPE'])?>"

                                    <?=CKraken::krakenMenuAttr($arElements, $arElements['TYPE'])?>

                                <?else:?>

                                    <?if(strlen($arElements['LINK'])>0 && empty($arElements["SUB"]) && !$arElements["NONE"] ):?> 

                                        href="<?=$arElements['LINK']?>"

                                        <?if($arElements['BLANK']):?>

                                            target='_blank'

                                        <?endif;?>

                                    <?endif;?> 

                                <?endif;?> 



                                <?if(!empty($arElements["SUB"])):?> class="open-mobile-list 

                                    <?if($arMenuChild2['NOLINK']):?>

                                        <?=CKraken::krakenMenuClass ($arMenuChild2, $arMenuChild2['TYPE'])?>

                                    <?endif;?>

                                    " data-menu-list="<?=$arItem['IBLOCK_ID'].$arItem['ID'].$arElements['ID']?>"<?endif;?>><?=$arElements['NAME']?></a>
                                <div class="border-mob-menu"></div>
                            </li>

                        <?endforeach;?>
                    </ul><!-- ^mobile-menu-list -->



                    <?foreach($arItem["SUB"] as $arElements):?>

                        <?if(empty($arElements['SUB'])) continue;?>

                        <ul class="mobile-menu-list in-list" data-menu-list="<?=$arItem['IBLOCK_ID'].$arItem['ID'].$arElements['ID']?>">
                            <li class="back"><a class="open-mobile-list" data-menu-list="<?=$arItem['IBLOCK_ID'].$arItem['ID']?>"><i class='concept-icon concept-left-open-1'></i><?=GetMessage("KRAKEN_MOBILE_MENU_BACK")?></a></li>
                            <li class="menu-title">
                                <a 

                                <?if($arElements['NOLINK']):?>

                                    class = "<?=CKraken::krakenMenuClass($arElements, $arElements['TYPE'])?>"

                                    <?=CKraken::krakenMenuAttr($arElements, $arElements['TYPE'])?>

                                <?else:?>

                                    <?if(strlen($arElements['LINK'])>0):?> 

                                        href="<?=$arElements['LINK']?>"

                                        <?if($arElements['BLANK']):?>

                                            target='_blank'

                                        <?endif;?>

                                    <?endif;?> 

                                <?endif;?> 

                                <?if($arElements['NOLINK']):?>

                                    class='<?=CKraken::krakenMenuClass ($arElements, $arElements['TYPE'])?>'

                                <?endif;?>
                                >

                                <?=$arElements['NAME']?></a>
                            </li>

                            <?foreach($arElements['SUB'] as $key_arElements2 => $arElements2):?>

                                <li <?if($arElements2['SELECTED']):?>class="selected"<?endif;?>>
                                    <a

                                    <?if($arElements2['NOLINK']):?>

                                        class = "<?=CKraken::krakenMenuClass($arElements2, $arElements2['TYPE'])?>"

                                        <?=CKraken::krakenMenuAttr ($arElements2, $arElements2['TYPE'])?>

                                    <?else:?>

                                        <?if(strlen($arElements2['LINK'])>0 && empty($arElements2["SUB"]) && !$arElements2["NONE"] ):?> 

                                            href="<?=$arElements2['LINK']?>"

                                            <?if($arElements2['BLANK']):?>

                                                target='_blank'

                                            <?endif;?>

                                        <?endif;?> 

                                    <?endif;?> 

                                    <?if($arElements2['NOLINK']):?>

                                        class='<?=CKraken::krakenMenuClass($arElements2, $arElements2['TYPE'])?>'

                                    <?endif;?>

                                    ><?=$arElements2['NAME']?></a>
                                    <div class="border-mob-menu"></div>
                                </li>

                            <?endforeach;?>

                        </ul><!-- ^mobile-menu-list -->

                    <?endforeach;?>

                <?endforeach;?>

            </div><!-- ^menu-content -->

        </div><!-- ^menu-mobile-inner -->


        <div class="foot-wrap">
         
          
            <?if(!empty($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE']) || !empty($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE']) ):?>
                
                <div class="contacts">
                    <div class="phone-wrap">
                        <?$is = '';?>

                        <?if(!empty($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE'])):?>
                      
                            <div class="phone"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['~VALUE'][0]['name']?></div>
                            <?$is = 'phone';?>
                            <div class="desc"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['~VALUE'][0]['desc']?></div>
                        <?else:?>
                            <a href="mailto:<?=$KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'][0]['name']?>"><span class="bord-bot"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'][0]['name']?></span></a>
                            <div class="desc"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['~VALUE'][0]['desc']?></div>
                            <?$is = 'email';?>
                        <?endif;?>

                        <?if(count($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE'])>1 || count($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'])>1 || (!empty($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE']) && !empty($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE']))):?>
                            <div class="ic-open-list-contact open-list-contact"><span></span></div>
                        <?endif;?>
                    </div>

                    <?if(count($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE'])>1 || count($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'])>1 || (!empty($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['VALUE']) && !empty($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE']))):?>

                        <div class="list-contacts">

                            <?foreach($KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['~VALUE'] as $keyPhone => $arPnone):?>

                                <?if($is == 'phone' && $keyPhone == 0) continue;?>
                                <div class="contact-wrap">
                                    <div class="phone"><?=$arPnone['name']?></div>
                                    <div class="desc"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_CONTACTS"]['~VALUE'][$keyPhone]['desc']?></div>
                                </div>
                            <?endforeach;?>

                            <?foreach($KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'] as $keyEmail => $arEmail):?>
                                <?if($is == 'email' && $keyEmail==0) continue;?>

                                <div class="contact-wrap">
               
                                    <div class="email"><a href="mailto:<?=$arEmail['name']?>"><span class="bord-bot"><?=$arEmail['name']?></span></a></div>
                                    <div class="desc"><?=$KRAKEN_TEMPLATE_ARRAY["HEAD_EMAILS"]['VALUE'][$keyEmail]['desc']?></div>
                                </div>


                            <?endforeach;?>

                        </div>
                        

                    <?endif;?>
                      

                </div>
            <?endif;?>
                        
            <?if($KRAKEN_TEMPLATE_ARRAY["SHOW_CALLBACK"]['VALUE'] == "Y" && $KRAKEN_TEMPLATE_ARRAY["FORMS"]['VALUE_CALLBACK'] != "N"):?>
                <a class="button-def shine main-color <?=$KRAKEN_TEMPLATE_ARRAY["BTN_VIEW"]['VALUE']?> call-modal callform" data-header="<?=GetMessage('KRAKEN_FORM_NAME_MOB')?>" data-call-modal="form<?=$KRAKEN_TEMPLATE_ARRAY["FORMS"]["VALUE_CALLBACK"]?>"><?=$KRAKEN_TEMPLATE_ARRAY["CALLBACK_NAME"]["VALUE"]?></a>
              
            <?endif;?>

            <?if($KRAKEN_TEMPLATE_ARRAY["GROUP_POS"]["VALUE"][2] == 'Y'):?>
                <?=CKraken::CreateSoc($KRAKEN_TEMPLATE_ARRAY)?>
            <?endif;?>
      
           
        </div><!-- ^foot-wrap -->
        
         
    </div><!-- ^menu-mobile -->

   