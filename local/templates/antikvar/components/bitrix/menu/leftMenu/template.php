<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul class="difMenu">

<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="active"><div><p><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></p></div></li>
	<?else:?>
		<li><div><p><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></p></div></li>
	<?endif?>
	
<?endforeach?>

</ul>
<?endif?>

					