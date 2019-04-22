
<div id="space-for-footer"></div>

<div id="footer-wrapper">
  <div id="footer">

    <div id="copyright">

               <?php
 if (function_exists('iconv')) {
        $str1=iconv("UTF-8","Windows-1251","Новая Игра");
         $str2=iconv("UTF-8","Windows-1251","разработка сайтов");
         $str3=iconv("UTF-8","Windows-1251","от Soft Media Group, продвижение, хостинг, техподдержка");
 }


 else { $str1 ="net modulya"; $str2= "perekodir.."; $str3=" php iconv"; }
          if ($_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] =='/index.php'  ) { ?>
   <?=$str1;?> <a href="http://santoshapro.me:90/"><font><u><?=$str2;?> </u></font></a> <a href="http://softmg.ru/"> <font><u><?=$str3;?></u> </font></a>
<?php }?>


    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => SITE_DIR."include/copyright.php"
        )
);?></div>

    <div id="footer-links">                     <?$APPLICATION->IncludeComponent(
        "bitrix:menu",
        "bottom",
        Array(
                "ROOT_MENU_TYPE" => "bottom",
                "MAX_LEVEL" => "1"
        )
);?>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t38.3;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
var yaParams = {/*Р—РґРµСЃСЊ РїР°СЂР°РјРµС‚СЂС‹ РІРёР·РёС‚Р°*/};
</script>

<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
<script type="text/javascript">
try { var yaCounter21454678 = new Ya.Metrika({id:21454678,
          webvisor:true,
          clickmap:true,
          accurateTrackBounce:true,params:window.yaParams||{ }});
} catch(e) { }
</script>
<noscript><div><img src="//mc.yandex.ru/watch/21454678" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


                        </div>
                </div>
        </div>
        <?
        if ($APPLICATION->GetProperty("CATALOG_COMPARE_LIST", false) == false && IsModuleInstalled('iblock'))
        {
                $arFilter = Array("TYPE"=>"catalog", "SITE_ID"=>SITE_ID);
                $obCache = new CPHPCache;
                if($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog/active"))
                {
                        $arIBlocks = $obCache->GetVars();
                }
                elseif(CModule::IncludeModule("iblock") && $obCache->StartDataCache())
                {

                        $arIBlocks = array();
                        $dbRes = CIBlock::GetList(Array(), $arFilter);
                        $dbRes = new CIBlockResult($dbRes);

                        if(defined("BX_COMP_MANAGED_CACHE"))
                        {
                                global $CACHE_MANAGER;
                                $CACHE_MANAGER->StartTagCache("/iblock/catalog/active");

                                while($arIBlock = $dbRes->GetNext())
                                {
                                        $CACHE_MANAGER->RegisterTag("iblock_id_".$arIBlock["ID"]);

                                        if($arIBlock["ACTIVE"] == "Y")
                                                $arIBlocks[$arIBlock["ID"]] = $arIBlock;
                                }

                                $CACHE_MANAGER->RegisterTag("iblock_id_new");
                                $CACHE_MANAGER->EndTagCache();
                        }
                        else
                        {
                                while($arIBlock = $dbRes->GetNext())
                                {
                                        if($arIBlock["ACTIVE"] == "Y")
                                                $arIBlocks[$arIBlock["ID"]] = $arIBlock;
                                }
                        }
                            
                        $obCache->EndDataCache($arIBlocks);
                }
                else
                {
                        $arIBlocks = array();
                }               
                        
                if(count($arIBlocks) == 1)
                {
                        foreach($arIBlocks as $iblock_id => $arIBlock)
                                $APPLICATION->IncludeComponent(
                                        "bitrix:catalog.compare.list",
                                        "store",
                                        Array(
                                                "IBLOCK_ID" => $iblock_id,
                                                "COMPARE_URL" => $arIBlock["LIST_PAGE_URL"]."compare/"
                                        ),
                                        false,
                                        Array("HIDE_ICONS" => "Y")
                                );
                }
        }
        
        ?>