<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult["ITEMS"])){?>

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
                            <?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                                <s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
                            <?else:?><?=$arPrice["PRINT_VALUE"]?><?endif;?>
                        </div>
                    <?endif;?>
                <?endforeach;?>

				<?php if(false): ?>
                	<div class="podr"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>">Подробнее</a></div>
				<?php endif; ?>

            </div>
        <?endforeach;?>
    </div>

    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <div class="paginator">
            <?=$arResult["NAV_STRING"]?>
        </div>
    <?endif;?>

<?}?>
