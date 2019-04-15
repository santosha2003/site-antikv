<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul class="newsItems">
    <?foreach($arResult["ITEMS"] as $arItem){?>
        <li class="newsItem">
            <div><span class="data"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span></div>
            <div><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></div>
        </li>
    <?}?>
</ul>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
