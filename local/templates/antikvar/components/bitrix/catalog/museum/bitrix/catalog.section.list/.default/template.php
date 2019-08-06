<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="catalog-section-list">
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;
// +++ spk, для монет выводим только разделы верхнего уровня
$SPK_IS_AWARD_SECTION = ($arResult["IBLOCK_ID"] == "13") ? FALSE : TRUE;
//$SPK_IS_AWARD_SECTION = ($arResult["SECTION"]["CODE"] == "ordena-i-medali") ? FALSE : TRUE;
//print_r($arResult["SECTIONS"]);
//$SPK_IS_COINS_SECTION = TRUE;
$SPK_MAX_OUT_DEPTH = $TOP_DEPTH + 1;
// для монет выводим только разделы верхнего уровня, spk +++


foreach($arResult["SECTIONS"] as $arSection):
	// +++ spk, для монет выводим только разделы верхнего уровня
	if($SPK_IS_AWARD_SECTION && $arSection["DEPTH_LEVEL"] > $SPK_MAX_OUT_DEPTH) continue;
	// для всего кроме 13 раздела (РККА) выводим только разделы верхнего уровня, spk +++
	// для музея 

	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_EDIT"));
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], CIBlock::GetArrayByID($arSection["IBLOCK_ID"], "SECTION_DELETE"), array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')));
	if($CURRENT_DEPTH < $arSection["DEPTH_LEVEL"]) {
		echo "\n",str_repeat("\t", $arSection["DEPTH_LEVEL"]-$TOP_DEPTH),"<ul>";
		}
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
$BOLD_L='<span class="catalog-list-gr">';//'<font color="#007000" size="2" face="Arial">';//'</a><a><font color=green>';//'<font color="#00aeef">';;007000
$BOLD_L_E="</span>";//"</font>";//"</font></a>";//"</font>";//\n\t</li></ul>";
	$LINE_ST="<li";//"\n\t<ul><li";
	$REPL_ARR1= array("&lt;", "&gt;");
	$REPL_ARR2= array("<", ">");
	$NAME_HTML=str_replace($REPL_ARR1,$REPL_ARR2,$arSection["NAME"]);
	if ($arSection["ELEMENT_CNT"] > 0) { $LINE_ST="<li"; $BOLD_L='<strong color="navy">'; $BOLD_L_E="</strong>"; }
	?><?=$LINE_ST?> id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="<?=$arSection["SECTION_PAGE_URL"]?>"><?=$BOLD_L?><?=$NAME_HTML?><?if(($arParams["COUNT_ELEMENTS"]) && ($arSection["ELEMENT_CNT"] > 0) ): ?>&nbsp;(<?=$arSection["ELEMENT_CNT"]?>)<?=$BOLD_L_E?><?endif;?></a><?

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