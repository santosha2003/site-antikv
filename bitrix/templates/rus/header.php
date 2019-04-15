<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->ShowHead()?>
<link rel="SHORTCUT ICON" href="/favicon.ico">
<link rel="stylesheet" type="text/css" href="/bitrix/templates/rus/skin.css" />	
<script type="text/javascript" src="/bitrix/templates/rus/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/rus/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="/bitrix/templates/rus/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="/bitrix/templates/rus/fancybox/jquery.fancybox-1.3.1.js"></script>
<link rel="stylesheet" type="text/css" href="/bitrix/templates/rus/fancybox/jquery.fancybox-1.3.1.css" media="screen" />
<script type="text/javascript" src="/bitrix/templates/rus/js/base.js"></script>

</head>
<body> 
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
 
<div class="wrapper"> 	 
  <div class="header"> 		 
    <div class="icons"> 			<a href="/" class="ico1" ></a> 			<a href="/contacts/" class="ico2" ></a> 			<a href="/search/" class="ico3" ></a> 		</div>
   		 
    <div class="logo"><a href="/" ><img src="/bitrix/templates/rus/images/logo.png" alt="Rusantikvar"  /></a></div>
   		 		 
    <div class="cartauth"> <?global $USER;
if (!$USER->IsAuthorized()):?> 			<a href="/auth/" class="vhod" >Вход</a> 			<a href="/auth/?register=yes" class="rega" >Регистрация</a>			 			 
      <div class="clear"></div>
     <?else:?> 
      <p>Здравствуйте, <?echo $USER->GetLogin();?> | <a href="?logout=yes" >Выйти</a></p>
     <?endif?> <?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.small", 
	"basket_small", 
	array(
		"PATH_TO_BASKET" => "/personal/basket.php",
		"PATH_TO_ORDER" => "/personal/order.php",
		"COMPONENT_TEMPLATE" => "basket_small",
		"SHOW_DELAY" => "Y",
		"SHOW_NOTAVAIL" => "Y",
		"SHOW_SUBSCRIBE" => "Y"
	),
	false
);?> 		</div>
   		 				 	</div>
 	 
  <div class="topMenu"> <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"topMenu", 
	array(
		"ROOT_MENU_TYPE" => "top",
		"MAX_LEVEL" => "2",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COMPONENT_TEMPLATE" => "topMenu"
	),
	false
);?> 		 
    <div class="clear"></div>
   		 	</div>
 	
  <div style="margin-bottom: 30px;"><!-- отступ от верхнего меню --></div>
  <!-- <div class="advert"> 					<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("include_areas/bannerTop.php"),
							Array(),
							Array("MODE"=>"html")
						);?>		 	</div> -->
 	 	 
  <table class="twoCol"> 		 
    <tbody> 
      <tr> 			<td class="leftCol"> 				 
          <div class="blok1"> 					 
            <div class="topBG"></div>
           	 					 
            <div class="middBG"> 						 
              <h2>Магазин</h2>
             <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"leftMenu", 
	array(
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"COMPONENT_TEMPLATE" => "leftMenu"
	),
	false
);?> 					</div>

            <div class="bottBG"></div>
           	 				</div>
          <div class="bloknov"> 					 
            <div class="topBG"></div>
           	 					 
            <div class="middBG"> 						 
              <h2>Новости</h2>
             <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"newsIndex", 
	array(
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"AJAX_MODE" => "Y",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "5",
		"NEWS_COUNT" => "5",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"SORT_BY2" => "TIMESTAMP_X",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"PREVIEW_TRUNCATE_LEN" => "41",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_TITLE" => "N",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_TITLE" => "Новости",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "arrows_adm",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"COMPONENT_TEMPLATE" => "newsIndex",
		"AJAX_OPTION_ADDITIONAL" => "",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?> 					</div>
            <div class="bottBG"></div>
           	 				</div>

         <?/*?>				 				 
          <div class="blok1"> 					 
            <div class="topBG"></div>
           	 					 
            <div class="middBG"> 						 
              <h2>Корзина</h2>
             						Пуста 						 
              <table class="smallcart"> 							 
                <tbody> 
                  <tr> 								<td>Товаров:</td> 								<td><span>123 шт</span></td> 							</tr>
                 							 
                  <tr> 								<td>Сумма:</td> 								<td><span>123 000 руб.</span></td> 							</tr>
                 						</tbody>
               </table>
             					</div>
           	 					 
            <div class="bottBG"></div>
           	 				</div>
         				 <?*/?> 					<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath("include_areas/banner.php"),
							Array(),
							Array("MODE"=>"html")
						);?>				 				 			</td> 			<td class="rightCol"> 
          <div class="breadcrump"> <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"navi", 
	array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1",
		"COMPONENT_TEMPLATE" => "navi"
	),
	false
);?> </div>
         				 
          <div class="blok2"> 					 
            <div class="topBG"></div>
           	 					 
            <div class="middBG"> 						 
              <h1><?$APPLICATION->ShowTitle(false);?></h1>

              <div class="context"> 						 						 						 									 