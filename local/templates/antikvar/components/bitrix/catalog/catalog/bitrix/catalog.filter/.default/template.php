<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get">
	<?foreach($arResult["ITEMS"] as $arItem):
		if(array_key_exists("HIDDEN", $arItem)):
			echo $arItem["INPUT"];
		endif;
	endforeach;?>
    <div class="filter-out">
        <div class="filter-title"><?=GetMessage("IBLOCK_FILTER_TITLE")?></div>
        <div class="filter-fields">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?if(!array_key_exists("HIDDEN", $arItem)):?>
                    <div class="filter-field <?=$arItem['TYPE'] == "RANGE" ? "range" : ""?>">
                        <div class="name"><?=$arItem["NAME"]?>:</div>
                        <div class="field"><?=$arItem["INPUT"]?></div>
                    </div>
                <?endif?>
            <?endforeach;?>
        </div>
        <div class="filter-btns">
            <input type="submit" name="set_filter" class="spk-filter-submit" value="<?=GetMessage("IBLOCK_SET_FILTER")?>" />
            <input type="hidden" name="set_filter" value="Y" />&nbsp;&nbsp;
            <input type="submit" name="del_filter" class="spk-filter-submit" value="<?=GetMessage("IBLOCK_DEL_FILTER")?>" />
        </div>
    </div>
</form>
