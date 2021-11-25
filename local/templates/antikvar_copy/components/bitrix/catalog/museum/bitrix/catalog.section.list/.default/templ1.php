<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section-list">
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;
// +++ spk, для монет выводим только разделы верхнего уровня
$SPK_IS_COINS_SECTION = ($arResult["SECTION"]["CODE"] == "coins") ? TRUE : FALSE;
//print_r($arResult["SECTION"]);
$SPK_IS_COINS_SECTION = TRUE;
$SPK_MAX_OUT_DEPTH = $TOP_DEPTH + 1;
// для монет выводим только разделы верхнего уровня, spk +++


foreach($arResult["SECTIONS"] as $arSection):
	// +++ spk, для монет выводим только разделы верхнего уровня
	if($SPK_IS_COINS_SECTION && $arSection["DEPTH_LEVEL"] > $SPK_MAX_OUT_DEPTH) continue;
	// для монет выводим только разделы верхнего уровня, spk +++
	
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"])
		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
	elseif($CURRENT_DEPTH == $arSection["DEPTH_LEVEL"])
		echo "</li>";
	else
	{
		while($CURRENT_DEPTH > $arSection["DEPTH_LEVEL"])
		{
			echo "</li>";
			echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
			$CURRENT_DEPTH--;
		}
		echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</li>";
	}

	echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH);
	?><li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?if ($arSection["ELEMENT_CNT"] === 0) echo "<strong>"; endif;?><?=$arSection["NAME"]?><?if($arParams["COUNT_ELEMENTS"]):?>&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)<?endif;?><?if ($arSection["ELEMENT_CNT"] === 0) echo "</strong>"; endif;?></a><?
	print_r($arResult);
	$CURRENT_DEPTH = $arSection["DEPTH_LEVEL"];
endforeach;

while($CURRENT_DEPTH > $TOP_DEPTH)
{
	echo "</li>";
	echo "\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH),"</ul>","\n",str_repeat("\t", $CURRENT_DEPTH-$TOP_DEPTH-1);
	$CURRENT_DEPTH--;
}
?>
</div>
