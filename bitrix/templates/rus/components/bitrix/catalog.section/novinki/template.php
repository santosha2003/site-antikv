<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
 
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?$kol=0;?>
<table class="prodList">
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>

	<?if ($arElement["DISPLAY_PROPERTIES"]["INDEX"]["DISPLAY_VALUE"]=="да"):?>	
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
<?$kol++;?>		
		
		<?if($kol == 1):?>
		<tr>
		<?endif;?>

		<td valign="top" width="<?=round(100/$arParams["LINE_ELEMENT_COUNT"])?>%" id="<?=$this->GetEditAreaId($arElement['ID']);?>">

		<div class="prodItem"><div class="inbg">
			<div class="prTitle"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></div>
			<div class="prImg"><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" /></a></div>
			<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
				<?if($arPrice["CAN_ACCESS"]):?>
				<div class="prPrice">
				<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
				<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
				<?else:?><?=$arPrice["PRINT_VALUE"]?><?endif;?>
				</div>
				<?endif;?>
			<?endforeach;?>										
			<a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="podr">Подробнее</a>
		</div></div>
<?/*?>	
			 <a href="<?echo $arElement["BUY_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_BUY")?></a>&nbsp;<a href="<?echo $arElement["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD")?></a>
<?*/?>
    		</td>

		<?
		if($kol==3):?>
			</tr><?$kol=0;?>
		<?endif?>

	<?endif?>

	<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

	<?if($cell%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
		<?while(($cell++)%$arParams["LINE_ELEMENT_COUNT"] != 0):?>
			<td>&nbsp;</td>
		<?endwhile;?>
		</tr>
	<?endif?>

</table>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
 