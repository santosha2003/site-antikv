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
<?
    if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_PAGE_HEADBG"]["VALUE"])>0)
    {
        $bg_pic = CFile::ResizeImageGet($KRAKEN_TEMPLATE_ARRAY["CART_PAGE_HEADBG"]["VALUE"], array('width'=>1600, 'height'=>1200), BX_RESIZE_IMAGE_PROPORTIONAL, false);
    }

?>
<style>
    .wrapper-cart{
        display: none !important;
    }
</style>

<?
    $view = "cart-no-empty";
    if($arResult["COUNT"] <= 0)
        $view = "cart-empty";


    if(isset($_REQUEST["order_id"]) && $_REQUEST["order_id"] > 0)
        $view = "order-complited";


?>

<div class="cart_page_wrap cart-page-inner-js <?=$view?>">


    <div class="cart-first-block cover <?=$KRAKEN_TEMPLATE_ARRAY["HEAD_TONE"]["VALUE"]?> kraken-firsttype-<?=$KRAKEN_TEMPLATE_ARRAY["MENU_TYPE"]["VALUE"]?>" <?if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_PAGE_HEADBG"]["VALUE"])>0):?> style="background-image: url(<?=$bg_pic["src"]?>);"<?endif;?>>
        <input type="hidden" class="cart_page" value="Y">

        <div class="shadow"></div>
        <div class="top-shadow"></div>

        <div class="container">

            <div class="part-wrap">

                <div class="first-part">

                    <div class="row">

                        <table class="mobile-break">
                            <tr>
                            <?
                                $lCols = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
                                $rCols = '';
                                if($KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_FAST_ORDER']>0)
                                {
                                    $leftCols = 'col-lg-8 col-md-8 col-sm-8 col-xs-12';
                                    $rCols = 'col-lg-4 col-md-4 col-sm-4 col-xs-12';
                                }

                            ?>
                                                
                            <td class="text-part <?=$leftCols?>">
                            
                                <div class="head">
                                    
                                    <div class="title main1">
                                        <h1>
                                            <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_PAGE_TITLE']['VALUE'])>0):?>
                                                <?=$KRAKEN_TEMPLATE_ARRAY['CART_PAGE_TITLE']['VALUE']?>
                                            <?else:?>
                                                <?=$KRAKEN_TEMPLATE_ARRAY['CART_HEAD_TIT']['VALUE']?>
                                            <?endif;?>
                                                
                                        </h1>
                                    </div>
                                                                                    
                                </div>
                                
                            </td>

                            <?if(strlen($rCols)>0):?>

                                <td class="<?=$rCols?> r-part hidden-xs">

                                    <div class="fast-order-btn-cart-page-js <?if($arResult["COUNT"] <= 0):?>cart-empty<?endif;?>">

                                        <a class="style-fast-order call-modal callform for_cart" data-call-modal ="form<?=$KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_FAST_ORDER']?>" data-header="<?=GetMessage("KRAKEN_PAGE_CART_HEADER_FAST_ORDER")?>">
                                            <span class="bord-bot white"><?if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_FAST_ORDER_NAME"]["~VALUE"])>0) echo $KRAKEN_TEMPLATE_ARRAY["CART_BTN_FAST_ORDER_NAME"]["~VALUE"]; else echo GetMessage("KRAKEN_PAGE_CART_FAST_ORDER_BTN_NAME");?></span>
                                       </a>
                                   </div>
                                    
                                </td>

                            <?endif;?>

                            </tr>

                        </table>

                    </div>

                </div>

                <div class="second-part">
                    
                    <div class="head">
                                
                        <div class="title main1">
                            <?
                            if($view == "order-complited")
                            {
                                if($KRAKEN_TEMPLATE_ARRAY['CART_PAGE_ORDER_COMPLITED_MESS']['~VALUE'])
                                {
                                    
                                    $search = array("#ID_ORDER#");
                                    $replace = array($_REQUEST["order_id"]);
                                    $mes = str_replace($search, $replace, $KRAKEN_TEMPLATE_ARRAY['CART_PAGE_ORDER_COMPLITED_MESS']['~VALUE']);
                                    echo $mes;
                                }

                                else                            
                                    echo GetMessage("KRAKEN_PAGE_CART_ORDER_COMPLITED").$_REQUEST["order_id"].GetMessage("KRAKEN_PAGE_CART_ORDER_COMPLITED_2")."<br/><a href='".SITE_DIR."catalog/'>".GetMessage("KRAKEN_PAGE_CART_ORDER_COMPLITED_3")."</a>";
                            }
                            else
                            {
                                if($KRAKEN_TEMPLATE_ARRAY['CART_PAGE_EMPTY_MESS']['~VALUE'])
                                    echo $KRAKEN_TEMPLATE_ARRAY['CART_PAGE_EMPTY_MESS']['~VALUE'];
                                else
                                    echo GetMessage("KRAKEN_PAGE_CART_EMPTY")."<a href='".SITE_DIR."catalog/'>".GetMessage("KRAKEN_PAGE_CART_EMPTY_2")."</a>";
                            }
                            ?>
                        </div>                                       
                    </div>
                </div>

            </div>


        </div>
                                            
    </div>


    <div class="form-cart-wrap">

        <?
        $lCol = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
        $rCol = "col-sm-12 col-xs-12 visible-sm visible-xs";

        if($KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_ORDER']>0)
        {
            $lCol = "col-lg-8 col-md-8 col-sm-12 col-xs-12";
            $rCol = "col-lg-4 col-md-4 col-sm-12 col-xs-12";
        }
        ?>
        <div class="container">
            <div class="row">            
                
                <div class="form-cart-wrap-inner clearfix">
              
                    <form action="/" class="form-page-cart form-cart-style form send" method="post" role="form">     
                        <table class="main-table mobile-break pad-break">
                            <tbody>

                                <tr>
                                    <td class="left-p <?=$lCol?>">
                                 
                                        <div class="product-area">
                                            <div class="area_for_list">
                                                <?$APPLICATION->IncludeComponent(
                                                    "concept:kraken.cart",
                                                    "list",
                                                    Array(
                                                        "CURRENT_SITE" => SITE_ID,
                                                        "MESSAGE_404" => "",
                                                        "SET_STATUS_404" => "N",
                                                        "SHOW_404" => "N"
                                                    )
                                                );?>
                                            </div>
                                        </div>

                                        <div class="total-price-area-style">

                                            <table class="tpas mobile-break">
                                                <tr>
                                                    <td class="tpas-left">
                                                        <div class="tpas-left-inner">
                                                            <?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_COMMENT']['~VALUE']) > 0):?>

                                                                <div class="comment">
                                                                   <?=$KRAKEN_TEMPLATE_ARRAY['CART_COMMENT']['~VALUE']?>
                                                                </div> 

                                                            <?endif;?>
                                                        </div>
                                                    </td>
                                                    <td class="tpas-right">
                                                        <div class="tpas-right-inner">
                                                            <div class="area_for_total">
                                                                <?$APPLICATION->IncludeComponent(
                                                                    "concept:kraken.cart",
                                                                    "total-page",
                                                                    Array(
                                                                        "CURRENT_SITE" => SITE_ID,
                                                                        "MESSAGE_404" => "",
                                                                        "SET_STATUS_404" => "N",
                                                                        "SHOW_404" => "N"
                                                                    )
                                                                );?>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                            
                                            
                                        </div>

                                        <div class="wrap-adv-table">

                                            <div class="row">

                                                <?
                                                    $code_adv = 'concept_kraken_site_advantages_'.SITE_ID;
                                                    $arFilter = Array("IBLOCK_CODE"=> $code_adv, "ID" => $KRAKEN_TEMPLATE_ARRAY['ADVS']['VALUE'], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                                                    $res = CIBlockElement::GetList(Array(), $arFilter, false);

                                                    $arAdvs = array();

                                                    while($ob = $res->GetNextElement()){ 
                                                        $arFields = $ob->GetFields();
                                                        $arFields["PROPERTIES"] = $ob->GetProperties();  
                                                        $arAdvs[] = $arFields;
                                                    }
                                                ?>

                                                <?$total_count = count($arAdvs);?>

                                                <div class="adv-table clearfix">

                                                    <?foreach($arAdvs as $key=>$arAdv):?>
                                                        <?                                                
                                                            $row = 3;
                                                            $class = "col-lg-4 col-md-4 col-sm-4 col-xs-12";
                                                            
                                                            
                                                            if($total_count == 2)
                                                            {
                                                                $row = 2;
                                                                $class = "col-lg-6 col-md-6 col-sm-6 col-xs-12";
                                                            }
                                                            
                                                            if($total_count == 1)
                                                            {
                                                                $row = 1;
                                                                $class = "col-lg-12 col-md-12 col-sm-12 col-xs-12";
                                                            }
                                                        
                                                        ?>

                                                        <div class="<?=$class?> adv-cell">
                                                            <table>
                                                                <tr>
                                                                
                                                                    <td class="img">

                                                                        <?if($arAdv["PREVIEW_PICTURE"] > 0):?>
                                                                            
                                                                            <?$file = CFile::ResizeImageGet($arAdv["PREVIEW_PICTURE"], array('width'=>100, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, false);?>
                                                                    
                                                                            <img src="<?=$file["src"]?>" alt="<?=$arAdv["NAME"]?>" class="img-responsive" />

                                                                        <?elseif(strlen($arAdv["PROPERTIES"]["ICON"]["VALUE"]) && $arAdv["PREVIEW_PICTURE"] <= 0):?>
                                                 
                                                                            <div class="icon">
                                                                                <i class="<?=$arAdv["PROPERTIES"]["ICON"]["VALUE"]?>" <?if(strlen($arAdv["PROPERTIES"]["ICON"]["DESCRIPTION"]) > 0):?>style="color: <?=$arAdv["PROPERTIES"]["ICON"]["DESCRIPTION"]?>;"<?endif;?>></i>
                                                                            </div>
                                                                            
                                                                        <?else:?>
                                                                            <div class="icon default"></div>
                                                                        <?endif;?>
                                                                        
                                                                    </td>
                                                                    
                                                                    <td class='text'><?=$arAdv["PROPERTIES"]["SIGN"]["~VALUE"]?></td>
                                                                    
                                                                </tr>
                                                            </table>
                                                        </div>


                                                        <?if(($key+1)%$row == 0):?>
                                                            </div>
                                                        <?endif;?>

                                                        <?if(($key+1)%$row == 0 && ($key+1) != $total_count):?>
                                                            <div class="adv-table clearfix">
                                                        <?endif;?>

                                                    <?endforeach;?>

                                                </div> <!-- adv-table -->


                                            </div> 

                                        </div>

                                        
                                 
                                        <div class="buttons cart-buttons-height hidden-xs">
                                            <table class="mobile-break">
                                                <tbody>
                                                    <tr>

                                                        <?
                                                            if(strlen($KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"])>0 && $KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"] != "N")
                                                                $par_condition = "class='open-info call-modal callagreement' data-call-modal='agreement".$KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"]."'";

                                                            if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']["VALUE"])>0)
                                                                $par_condition = "class='open-info' target='_blank' href='".$KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']["VALUE"]."' ";                                                           
                                                        ?>

                                                        <?if(isset($par_condition)):?>

                                                            <td class="left">
                                                                <a <?=$par_condition?>><span class="bord-bot"><?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']["VALUE"])>0) echo $KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']["VALUE"]; else echo GetMessage("KRAKEN_PAGE_CART_DELIVERY");?></span></a>
                                                            </td>

                                                        <?endif;?>
                                                        <td class="right">
                                                            <div class="clear">
                                                                <a class="click_cart clear-cart" data-cart-action="clear"><?=GetMessage("KRAKEN_PAGE_CART_CLEAR")?></a>
                                                            </div>
                                                        </td>
                                                       
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </td>
                                    
                                    <td class="right-p <?=$rCol?>">

                                        <?if($KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_ORDER']>0):?>

                                            <div class="form-order row">
                                                <?
                                                    $APPLICATION->IncludeComponent(
                                                    "concept:kraken.form",
                                                    "cart",
                                                    Array(
                                                        "COMPOSITE_FRAME_MODE" => "A",
                                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                                        "CURRENT_FORM" => $KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_ORDER'],
                                                        "CURRENT_SITE" => SITE_ID,
                                                        "IBLOCK_CODE" => "concept_kraken_forms_".SITE_ID,
                                                        "MESSAGE_404" => "",
                                                        "SET_STATUS_404" => "N",
                                                        "SHOW_404" => "N",
                                                        "CART_PAGE" => "Y" 
                                                    )
                                                );?>
                                            </div>

                                        <?endif;?>


                                        <noindex>

                                            <div class="buttons buttons-2 cart-buttons-height visible-xs">
                                                <?if(strlen($KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_FAST_ORDER'])>0):?>
                                                    <div class="style-fast-order-wrap">
                                                        <a class="style-fast-order call-modal callform for_cart" data-call-modal ="form<?=$KRAKEN_TEMPLATE_ARRAY['FORMS']['VALUE_FAST_ORDER']?>" data-header="<?=GetMessage("KRAKEN_PAGE_CART_HEADER_FAST_ORDER")?>">
                                                            <span class="bord-bot white"><?if(strlen($KRAKEN_TEMPLATE_ARRAY["CART_BTN_FAST_ORDER_NAME"]["~VALUE"])>0) echo $KRAKEN_TEMPLATE_ARRAY["CART_BTN_FAST_ORDER_NAME"]["~VALUE"]; else echo GetMessage("KRAKEN_PAGE_CART_FAST_ORDER_BTN_NAME");?></span>
                                                       </a>
                                                    </div>                                                  
                                               <?endif;?>

                                                <table class="mobile-break">
                                                    <tbody>
                                                        <tr>
                                                            <?
                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"])>0 && $KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"] != "N")
                                                                    $par_condition = "class='open-info call-modal callagreement' data-call-modal='agreement".$KRAKEN_TEMPLATE_ARRAY['AGREEMENTS']["VALUE"]."'";

                                                                if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']["VALUE"])>0)
                                                                    $par_condition = "class='open-info' target='_blank' href='".$KRAKEN_TEMPLATE_ARRAY['CART_LINK_CONDITIONS']["VALUE"]."' ";                                                           
                                                            ?>

                                                            <?if(isset($par_condition)):?>

                                                                <td class="left">
                                                                    <a <?=$par_condition?>><span class="bord-bot"><?if(strlen($KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']["VALUE"])>0) echo $KRAKEN_TEMPLATE_ARRAY['CART_BTN_NAME_CONDITIONS']["VALUE"]; else echo GetMessage("KRAKEN_PAGE_CART_DELIVERY");?></span></a>
                                                                </td>

                                                            <?endif;?>
                                                            <td class="right">
                                                                <div class="clear">
                                                                    <a class="click_cart clear-cart" data-cart-action="clear"><?=GetMessage("KRAKEN_PAGE_CART_CLEAR")?></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </noindex>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                         <div class="clearfix"></div>

                    </form>

                    

                </div>
                
            </div>
        </div>
    </div>


</div>