<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult["ITEMS"])){?>

    <div class="sort">
        <span>Cортировать по:</span> &nbsp;&nbsp;&nbsp;
        <div class="sort-list">
            <div class="sort-list-item">
                <span>алфавиту:</span><a href="?sort=name&order=down" rel="nofollow">убыв.</a>&nbsp;&nbsp;<a href="?sort=name&order=up" rel="nofollow">возр.</a>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="sort-list-item">
                <span>цене:</span><a href="?sort=price&order=down" rel="nofollow">убыв.</a>&nbsp;&nbsp;<a href="?sort=price&order=up" rel="nofollow">возр.</a>&nbsp;&nbsp;&nbsp;
            </div>
            <div class="sort-list-item">
                <span>дате добавления:</span><a href="?sort=date&order=down" rel="nofollow">убыв.</a>&nbsp;&nbsp;<a href="?sort=date&order=up" rel="nofollow">возр.</a>&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>


    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <div class="paginator">
            <?=$arResult["NAV_STRING"]?><br>
        </div>
    <?endif;?>

    <div class="items-list">
        <?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
            <div class="item-list">
                <div class="prTitle">
                    <a title="<?=$arElement["NAME"]?>" href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                        <?//=TruncateText($arElement["NAME"], 50)?>
                        <?= htmlspecialcharsEx(TruncateText($arElement["~NAME"], 50)); ?>
                    </a>
                </div>
                <div class="prImg">
                    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                        <?$src = $arElement["PREVIEW_PICTURE"]["SRC"]?>
                        <img src="<?=$src?>" alt="<?=$arElement["NAME"]?>" />
                    </a>
                </div>
                <?foreach($arElement["PRICES"] as $code=>$arPrice):?>
                    <?if($arPrice["CAN_ACCESS"]):?>
                        <div class="prPrice">
                            <?if ($arElement["CATALOG_QUANTITY"] == 0):?>
                                <?if ($arElement["IBLOCK_SECTION_ID"] != 1402) echo" нет в наличии <br />"; ?>
                            <?endif;?>

                            <?if (isset($arElement['DISPLAY_PROPERTIES']['HIDE_PRICE']['DISPLAY_VALUE'])):?>
                                <?=$arElement['DISPLAY_PROPERTIES']['HIDE_PRICE']['DISPLAY_VALUE'];?>
                            <?elseif($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                                <s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
                            <?else:?>
                                <?=$arPrice["PRINT_VALUE"]?>
                            <?endif;?>

                        </div>
                    <?endif;?>
                <?endforeach;?>
            </div>
        <?endforeach;?>
    </div>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <div class="paginator">
            <?=$arResult["NAV_STRING"]?>
        </div>
    <?endif;?>

<?}?>
