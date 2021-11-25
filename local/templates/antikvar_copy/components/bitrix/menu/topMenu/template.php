<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul>

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="<?=isset($arItem['PARAMS']['class']) ? $arItem['PARAMS']['class'] : ""?> active"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><div class="uzor"></div></li>
	<?else:?>
		<li class="<?=isset($arItem['PARAMS']['class']) ? $arItem['PARAMS']['class'] : ""?>"><a href="<?=$arItem["LINK"]?>"<?=isset($arItem['PARAMS']['target']) ? ' target="' . htmlspecialchars($arItem['PARAMS']['target'], ENT_QUOTES) . '"' : ''?>><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>