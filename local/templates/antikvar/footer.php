<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
</div>
    <div class="content-right-bottom">
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
        );?>
    </div>
</div>
</div>
</div>
</main>
<footer>
    <div class="copy">
        <div class="content-bl">
    <p>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t39.6;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
 </p>
            <p><b>Rusantikvar:</b> антикварный салон, продажа и покупка антикварных предметов</p>
            <p class="copy-year">Copyright © 2018</p>
        </div>
    </div>
</footer>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/fancybox/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/slick/slick.min.js"></script>
<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH;?>/js/jquery.jcarousel.js"></script>
<script src="<?=SITE_TEMPLATE_PATH;?>/js/script.js"></script>
<a href="#" class="scrollup">Наверх</a>
</body>
</html>