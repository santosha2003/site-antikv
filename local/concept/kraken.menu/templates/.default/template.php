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


<?if(!empty($arResult)):?>

    <?$admin_active = $USER->isAdmin();?>
    <?$show_setting = $KRAKEN_TEMPLATE_ARRAY["MODE_FAST_EDIT"]['VALUE'][0];?>


    <?$styleBg= '';?>

    <?
        if(strlen($KRAKEN_TEMPLATE_ARRAY["MENU_BG_COLOR"]['VALUE']) > 0)
        {

            $arColor = $KRAKEN_TEMPLATE_ARRAY["MENU_BG_COLOR"]['VALUE'];
            $percent = 1;

            if($arColor != '#')
            {

                if(preg_match('/^\#/', $KRAKEN_TEMPLATE_ARRAY["MENU_BG_COLOR"]['VALUE']))
                {
                    $arColor = Krakenhex2rgb($KRAKEN_TEMPLATE_ARRAY["MENU_BG_COLOR"]['VALUE']);
                    $arColor = implode(',',$arColor);
                }

                if(strlen($KRAKEN_TEMPLATE_ARRAY["MENU_BG_OPACITY"]['VALUE'])>0)
                    $percent = (100 - $KRAKEN_TEMPLATE_ARRAY["MENU_BG_OPACITY"]['VALUE'])/100;
                

                if($KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]['VALUE'] == "2")
                    $styleBg= 'style="background-color: rgba('.$arColor.', '.$percent.')";';

                if($KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]['VALUE'] == "3")
                    $styleBg= 'style="border-bottom: 2px solid rgba('.$arColor.', '.$percent.')";';
            }
            
        }
    ?>



    

    <div class="wrap-main-menu active <?=$KRAKEN_TEMPLATE_ARRAY["MENU_TEXT_COLOR"]['VALUE']?> <?if($KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['VALUE'][0] == "Y"):?>mini-cart-on<?endif;?>"<?if($KRAKEN_TEMPLATE_ARRAY["MENU_VIEW"]['VALUE'] == "1"):?> <?=$styleBg?><?endif;?>>
        <div class="container">



            <div class="main-menu-inner"<?if($KRAKEN_TEMPLATE_ARRAY["MENU_VIEW"]['VALUE'] == "2"):?> <?=$styleBg?><?endif;?>>
                <?if($admin_active && $show_setting == 'Y'):?>
                    <div class="tool-settings">
                        <a href='/bitrix/admin/iblock_list_admin.php?IBLOCK_ID=<?=$arParams['IBLOCK_ID']?>&type=<?=$arParams['IBLOCK_TYPE']?>&lang=ru&find_section_section=0' class="tool-settings <?if($center):?>in-center<?endif;?>" data-toggle="tooltip" target="_blank" data-placement="right" title="<?=GetMessage("KRAKEN_PAGE_GENERATOR_EDIT")?> &quot;<?=TruncateText(GetMessage("KRAKEN_MENU"), 35)?>&quot;"></a>

                    </div>

                <?endif;?>



                <a class="ic-main-menu-burger open-main-menu">
                    <div class="icon-hamburger-wrap">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </div>
                </a>

                <div class="nav-main-menu-wrap">
              
                    <nav class="main-menu">

                        <?foreach($arResult as $arItem):?>
                            <?$colorText = '';?>
                            <?$icon = '';?>

                            <?if(strlen($arItem['MENU_COLOR'])>0):?>
                                <?$colorText = ' style="color: '.$arItem['MENU_COLOR'].'";';?>
                            <?endif;?>

                            <?if($arItem['MENU_IC_US']>0):?>

                                <?$iconResize = CFile::ResizeImageGet($arItem['MENU_IC_US'], array('width'=>15, 'height'=>15), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>

                                <?$icon = '<img class="img-responsive img-icon" src="'.$iconResize['src'].'" alt="icon" />';?>

                            <?elseif(strlen($arItem['MENU_ICON'])>0):?>
                            
                                <?$icon = '<i class="concept-icon '.$arItem['MENU_ICON'].'"></i>';?>
                                
                            <?endif;?>

                            <li class="lvl1 <?if(!empty($arItem["SUB"])):?>parent<?endif;?>">


                                <a 

                                <?if($arItem['NOLINK']):?>

                                    <?=CKraken::krakenMenuAttr($arItem, $arItem['TYPE'])?>

                                <?else:?>

                                    <?if(strlen($arItem["LINK"]) > 0  && !$arItem["NONE"]):?> 

                                        href='<?=$arItem['LINK']?>'


                                        <?if($arItem['BLANK']):?>

                                            target='_blank'

                                        <?endif;?>

                                    <?endif;?>

                                <?endif;?>

                                class="<?if(strlen($arItem["LINK"]) <= 0 && $arItem["NONE"]):?>empty-link<?endif;?>
                                
                                <?if($arItem['NOLINK']):?>

                                    <?=CKraken::krakenMenuClass($arItem, $arItem['TYPE'])?>

                                <?endif;?>

                                

                                <?if($arItem["SELECTED"]):?>selected<?endif;?>" <?=$colorText?> ><span class="wrap-name"><span><?=$icon?><?=$arItem['NAME']?><div class="bord"></div></span></span></a>



                                <?if(!empty($arItem["SUB"])):?>

                                    <ul class="child">
                                        <li class="wrap-shadow"></li>

                                        <?foreach($arItem["SUB"] as $arMenuChild):?>

                                            <li class="<?if(!empty($arMenuChild['SUB'])):?>parent2<?endif;?>">

                                                <a 


                                                <?if($arMenuChild['NOLINK']):?>

                                                    <?=CKraken::krakenMenuAttr($arMenuChild, $arMenuChild['TYPE'])?>

                                                <?else:?>

                                                    <?if(strlen($arMenuChild["LINK"]) > 0 && !$arMenuChild["NONE"]):?> 

                                                        href='<?=$arMenuChild['LINK']?>'

                                                        <?if($arMenuChild['BLANK']):?>

                                                            target='_blank'

                                                        <?endif;?>

                                                    <?endif;?>

                                                <?endif;?>


                                                 class="<?if(strlen($arMenuChild["LINK"]) <= 0  && $arMenuChild["NONE"]):?>empty-link<?endif;?>

                                                    <?if($arMenuChild["SELECTED"]):?>selected<?endif;?>

                                                    <?if($arMenuChild['NOLINK']):?>

                                                        <?=CKraken::krakenMenuClass($arMenuChild, $arMenuChild['TYPE'])?>

                                                    <?endif;?>

                                                    "><?=$arMenuChild['NAME']?><div></div> <span class="act"></span></a> 

                                               

                                                <?if(!empty($arMenuChild['SUB'])):?>
                                                
                                                    <ul class="child2">
                                                        <li class="wrap-shadow"></li>

                                                        <?foreach($arMenuChild['SUB'] as $keyChild2 => $arMenuChild2):?>
                                                            <li>

                                                                <a 

                                                                <?if($arMenuChild2['NOLINK']):?>

                                                                    <?=CKraken::krakenMenuAttr ($arMenuChild2, $arMenuChild2['TYPE'])?>

                                                                <?else:?>

                                                                    <?if(strlen($arMenuChild2["LINK"]) > 0 && !$arMenuChild2["NONE"]):?> 
                                                                    
                                                                        href='<?=$arMenuChild2['LINK']?>'

                                                                        <?if($arMenuChild2['BLANK']):?>

                                                                            target='_blank'

                                                                        <?endif;?>

                                                                    <?endif;?>

                                                                <?endif;?>

                                                                 class="<?if(strlen($arMenuChild2["LINK"]) <= 0 && $arMenuChild2["NONE"]):?>empty-link<?endif;?>

                                                                 <?if($arMenuChild2['SELECTED']):?>selected<?endif;?>

                                                                 <?if($arMenuChild2['NOLINK']):?>

                                                                    <?=CKraken::krakenMenuClass($arMenuChild2, $arMenuChild2['TYPE'])?>

                                                                <?endif;?>

                                                                 "><?=$arMenuChild2['NAME']?><div></div> <span class="act"></span>

                                                                </a>
                                                            </li>


                                                        <?endforeach;?>
                                             
                                                    </ul></li><!-- ^child2 -->
                                                <?endif;?>
                                            </li><!-- ^parent2 -->

                                        <?endforeach;?>
                                    </ul><!-- ^child -->

                                <?endif;?>

                             
                            </li> <!-- ^parent -->
                            

                        <?endforeach;?>

                    </nav>

                </div>

                <?if($KRAKEN_TEMPLATE_ARRAY['CART_IN_MENU_ON']['VALUE'][0] == "Y"):?>

                    <div class="mini-cart-style mini-cart-js active">
                        <div class="area_for_widget-in-menu hidden-xs">
                            <?
                                $APPLICATION->IncludeComponent(
                                    "concept:kraken.mini_cart",
                                    "widget-in-menu",
                                    Array(
                                        "CURRENT_SITE" => SITE_ID,
                                        "MESSAGE_404" => "",
                                        "SET_STATUS_404" => "N",
                                        "SHOW_404" => "N",
                                        "MODE" => $KRAKEN_TEMPLATE_ARRAY["CART_MINICART_MODE"]["VALUE"],
                                        "DESC_EMPTY" => $KRAKEN_TEMPLATE_ARRAY["CART_MINICART_DESC_EMPTY"]["VALUE"],
                                        "DESC_NOEMPTY" => $KRAKEN_TEMPLATE_ARRAY["CART_MINICART_DESC_NOEMPTY"]["VALUE"],
                                        "LINK" => $KRAKEN_TEMPLATE_ARRAY["CART_MINICART_LINK_PAGE"]["VALUE"]
                                    )
                                );
                            ?>
                        </div>
                    </div>

                <?endif;?>

             </div>

        </div>
    </div>

<?endif;?>