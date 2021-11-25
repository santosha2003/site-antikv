<!DOCTYPE html>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); IncludeTemplateLangFile(__FILE__);?>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>" />
    <?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle(true);?></title>    <link rel="SHORTCUT ICON" href="/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH;?>/fancybox/jquery.fancybox-1.3.1.css" media="screen" />-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH;?>/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH;?>/slick/slick-theme.css"/>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/normilize.css">
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/style.css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/custom.css?v=202011301512">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH;?>/css/new_header.css">
	<link rel="stylesheet" href="/forum/styles/rusantikvar/theme/responsive.css"> <!--Это стили для баннера-->
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<header>
    <div class="content-bl">
        <div class="header-top">
            <div class="icons">
                <a href="/" class="ico1" ></a>
                <a href="/kontakty/" class="ico2" ></a>
                <a href="/search/" class="ico3" ></a>
            </div>
            <div class="logo"><a href="/" ><img src="/bitrix/templates/rus/images/logo.png" alt="Rusantikvar"  /></a></div>
            <div class="cartauth">
                <div class="profile">
                    <?global $USER;
                        if (!$USER->IsAuthorized()):?>
                            <a href="/auth/" class="vhod" >Вход</a>
                            <a href="/auth/?register=yes" class="rega" >Регистрация</a>
                    <?else:?>
                            <p>Здравствуйте, <?echo $USER->GetLogin();?> | <a href="?logout=yes" >Выйти</a></p>
                    <?endif?>
                </div>
                <?$APPLICATION->IncludeComponent(
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
                );?>
            </div>
        </div>
<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
	"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."/include/announcement.php"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y"
	)
);?>
		<div class="header-new">
			<table width="100%">
    			<tr>
        			<td class="header-new" width="25%">
						<img id="firstIMG" class="header-new" src="#">
					</td>
        			<td class="header-new" width="50%">
						<center><p class="header-new">Профессиональный коллектив окажет<br>
 						необходимые консультации по вопросам <br>
						наград и знаков Российской Империи, <br>
						советских республик, СССР и зарубежных стран. <br>
						Выкуп, помощь в оценке, подборе коллекций, <br>
						продажа, консультации. <br> <br>
						<a class="header-new" href="tel:+7(903)2022101">8 903 202 21 01</a> <br>
						<a class="header-new" href="mailto:antikvar@rusantikvar.ru">antikvar@rusantikvar.ru</a>
						</p></center>
						<p class="test"></p>
					</td>
        			<td class="header-new" width="25%">
						<img  id="secondIMG" class="header-new" src="#">
					</td>
    			</tr>
			</table>
		</div>
		<?
			$dir = $_SERVER['DOCUMENT_ROOT'] ."/new_header";
			$filenames = array_diff(scandir($dir), array('..', '.', '.section.php'));
			$js_array = '["'. join('","', $filenames) .'"]';
		?>
		<script type="text/javascript">
			var arr = <?echo $js_array;?>;
			var max = (arr.length)-1;
			var i = (Math.floor((Math.random()*max)+0)); 
			var j = (Math.floor((Math.random()*max)+0)); 
			document.getElementById("firstIMG").src='/new_header/'+arr[i];
			document.getElementById("secondIMG").src='/new_header/'+arr[j];
			setInterval(function(){   
				var i = (Math.floor((Math.random()*max)+0)); 
				var j = (Math.floor((Math.random()*max)+0)); 
				document.getElementById("firstIMG").src='/new_header/'+arr[i];
				document.getElementById("secondIMG").src='/new_header/'+arr[j];
 			}, 5000);
		</script>
        <div class="header-menu">
            <?$APPLICATION->IncludeComponent(
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
        </div>
    </div>
</header>
<main class="main">
    <div class="content-bl">
        <div class="content-wrap breadcrumbs">
            <div class="content-left"></div>
            <div class="content-right">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "navi",
                    array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "COMPONENT_TEMPLATE" => ""
                    ),
                    false
                );?>
            </div>
        </div>
        <div class="content-wrap">
            <div class="content-left">

                <div class="content-left-top">

                    <?$APPLICATION->IncludeComponent(
                        "bitrix:catalog.section.list",
                        "left-sections",
                        array(
                            "ADD_SECTIONS_CHAIN" => "Y",
                            "CACHE_GROUPS" => "Y",
                            "CACHE_TIME" => "36000000",
                            "CACHE_TYPE" => "A",
                            "COUNT_ELEMENTS" => "Y",
                            "IBLOCK_ID" => "1",
                            "IBLOCK_TYPE" => "catalog",
                            "SECTION_CODE" => "",
                            "SECTION_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SECTION_ID" => $_REQUEST["SECTION_ID"],
                            "SECTION_URL" => "",
                            "SECTION_USER_FIELDS" => array(
                                0 => "",
                                1 => "",
                            ),
                            "SHOW_PARENT_NAME" => "Y",
                            "TOP_DEPTH" => "2",
                            "VIEW_MODE" => "LIST",
                            "COMPONENT_TEMPLATE" => ".default"
                        ),
                        false
                    );?>

                </div>

				<!--tyt-->

                <div class="content-left-bottom">

                    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"awards_rus", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "/awards_rus/#ELEMENT_ID#/",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "11",
		"IBLOCK_TYPE" => "award_russian",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9999",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Награды",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "RAND",
		"SORT_BY2" => "RAND",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => "awards_rus"
	),
	false
);?>

                </div>
            </div>
            <div class="content-right">
                <div class="content-right-top">
                    <h1><?$APPLICATION->ShowTitle(false);?></h1>