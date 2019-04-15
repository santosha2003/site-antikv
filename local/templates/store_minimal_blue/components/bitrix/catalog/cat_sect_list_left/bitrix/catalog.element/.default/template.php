<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (is_array($arResult['DETAIL_PICTURE_350']) || count($arResult["MORE_PHOTO"])>0):?>
<script type="text/javascript">
$(function() {
	$('div.catalog-detail-image a').fancybox({
		'transitionIn': 'elastic',
		'transitionOut': 'elastic',
		'speedIn': 600,
		'speedOut': 100,
		'overlayShow': false,
		'cyclic' : true,
		'padding': 20,
		'titlePosition': 'over',
		'onComplete': function() {
			$("#fancybox-title").css({ 'top': '100%', 'bottom': 'auto' });
		} 
	});
});
</script>
<?endif;?>
    
<div class="catalog-detail">
	<table class="catalog-detail" cellspacing="0">
		<tr>

		<?if (is_array($arResult['DETAIL_PICTURE_350']) || count($arResult["MORE_PHOTO"])>0):?>
			<td class="catalog-detail-image">
			<?if (is_array($arResult['DETAIL_PICTURE_350'])):?>
				<div class="catalog-detail-image" id="catalog-detail-main-image">
					<a rel="catalog-detail-images" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>" title="<?=(strlen($arResult["DETAIL_PICTURE"]["DESCRIPTION"]) > 0 ? $arResult["DETAIL_PICTURE"]["DESCRIPTION"] : $arResult["NAME"])?>"><img src="<?=$arResult['DETAIL_PICTURE_350']['SRC']?>" alt="<?=$arResult["NAME"]?>" id="catalog_detail_image" width="<?=$arResult['DETAIL_PICTURE_350']["WIDTH"]?>" height="<?=$arResult['DETAIL_PICTURE_350']["HEIGHT"]?>" /></a>
				</div>
			<?endif;?>
				<div class="catalog-detail-images">
			<?if(count($arResult["MORE_PHOTO"])>0):
				foreach($arResult["MORE_PHOTO"] as $PHOTO):
			?>
				<div class="catalog-detail-image"><a rel="catalog-detail-images" href="<?=$PHOTO["SRC"]?>" title="<?=(strlen($PHOTO["DESCRIPTION"]) > 0 ? $PHOTO["DESCRIPTION"] : $arResult["NAME"])?>"><img border="0" src="<?=$PHOTO["SRC_PREVIEW"]?>" width="<?=$PHOTO["PREVIEW_WIDTH"]?>" height="<?=$PHOTO["PREVIEW_HEIGHT"]?>" alt="<?=$arResult["NAME"]?>" /></a></div>
			<?
				endforeach;
			endif?>

				</div>
			</td>
		<?endif;?>

			<td class="catalog-detail-desc">
			<?if($arResult["PREVIEW_TEXT"]):?>
				<?=$arResult["PREVIEW_TEXT"];?>
				<div class="catalog-detail-line"></div>
			<?endif;?>
				
				<div class="catalog-detail-price">
				<?foreach($arResult["PRICES"] as $code=>$arPrice):
					if($arPrice["CAN_ACCESS"]):
				?>
					<label><?=GetMessage("CATALOG_PRICE")?></label>
					<p>
					<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
						<span class="catalog-detail-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span> <s><?=$arPrice["PRINT_VALUE"]?></s>
					<?else:?>
						<span class="catalog-detail-price"><?=$arPrice["PRINT_VALUE"]?></span>
					<?endif;?>
					</p>
				<?
						break;
					endif;
				endforeach;
				?>
				</div>

				<?if($arResult["CAN_BUY"]):?>
				<div class="catalog-detail-buttons">
					<!--noindex--><a href="<?=$arResult["ADD_URL"]?>" rel="nofollow" onclick="return addToCart(this, 'catalog_detail_image', 'detail', '<?=GetMessage("CATALOG_IN_BASKET")?>');" id="catalog_add2cart_link"><span><?echo GetMessage("CATALOG_ADD_TO_BASKET")?></span></a><!--/noindex-->
				</div>
				<?endif;?>

				<div class="catalog-item-links">
					<?if(!$arResult["CAN_BUY"] && (count($arResult["PRICES"]) > 0)):?>
					<span class="catalog-item-not-available"><!--noindex--><?=GetMessage("CATALOG_NOT_AVAILABLE");?><!--/noindex--></span>
					<?endif;?>

					<?if($arParams["USE_COMPARE"] == "Y"):?>
					<a href="<?=$arResult["COMPARE_URL"]?>" class="catalog-item-compare" onclick="return addToCompare(this, '<?=GetMessage("CATALOG_IN_COMPARE")?>');" rel="nofollow" id="catalog_add2compare_link" rel="nofollow"><?echo GetMessage("CATALOG_COMPARE")?></a>
					<?endif;?>
				</div>
			</td>
		</tr>
	</table>
	
<?
if (is_array($arResult['DISPLAY_PROPERTIES']) && count($arResult['DISPLAY_PROPERTIES']) > 0):
//var_dump($arResult['DISPLAY_PROPERTIES']);
?>
	<div class="catalog-detail-properties">
		<h4><?=GetMessage('CATALOG_PROPERTIES')?></h4>
        <div class="catalog-detail-line"></div>   
		<?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
         if($pid!='firm'){?>
			<div class="catalog-detail-property">
				<span><?=$arProperty["NAME"]?></span> 
				<b>
<?
		if(is_array($arProperty["DISPLAY_VALUE"])): 
			echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
		elseif($pid=="MANUAL"):
?>                  
					<a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a>
<?
		else:
			{$id=$arProperty['VALUE'];
             $link=mysql_connect("localhost:3306","shedevr_ru","S2m5rf3") or die ("login in templ catalog element check! Could not connect:" . mysql_error());   
 mysql_select_db("shedevr_ru");
 $result1=mysql_unbuffered_query("SELECT PREVIEW_PICTURE FROM `b_iblock_element` WHERE  (`ID`='$id') LIMIT 1") or die(mysql_error());
   for ($data9=array(); $row=mysql_fetch_row($result1);$data9[]=$row);
           $idphoto=$data9['0']['0'];
   $result1=mysql_unbuffered_query("SELECT `SUBDIR`, `FILE_NAME` FROM `b_file` WHERE  (`ID`='$idphoto') LIMIT 1") or die(mysql_error());  
   for ($data9=array(); $row=mysql_fetch_row($result1);$data9[]=$row);
   ?><img src='/upload/<?=$data9[0][0]?>/<?=$data9[0][1]?>' alt='<?=$arProperty["DISPLAY_VALUE"]?>' title='<?=$arProperty["DISPLAY_VALUE"]?>' ><?
   
            }
		endif;
?>
				</b>
			</div>
	<?}
    else{
         $id=$arProperty['VALUE'];
             $link=mysql_connect("localhost:3306","shedevr_ru","S2m5rf3") or die ("check login in templ.file! Could not connect:" . mysql_error());   
 mysql_select_db("shedevr_ru");
 $result1=mysql_unbuffered_query("SELECT `PREVIEW_PICTURE`, `NAME` FROM `b_iblock_element` WHERE  (`ID`='$id') LIMIT 1") or die(mysql_error());  
   for ($data9=array(); $row=mysql_fetch_row($result1);$data9[]=$row);
           $idphoto=$data9['0']['0'];
                 $str=$data9['0']['1'];
   $result1=mysql_unbuffered_query("SELECT `SUBDIR`, `FILE_NAME` FROM `b_file` WHERE  (`ID`='$idphoto') LIMIT 1") or die(mysql_error());  
   for ($data9=array(); $row=mysql_fetch_row($result1);$data9[]=$row);
   ?><center><img src='/upload/<?=$data9[0][0]?>/<?=$data9[0][1]?>' alt='<?=$str?>' title='<?=$str?>' ></center><?
    }
    endforeach;?>
	</div>
<?endif;?>

	<?if($arResult["DETAIL_TEXT"]):?>
	<div class="catalog-detail-full-desc">
		<h4><?=GetMessage('CATALOG_FULL_DESC')?></h4>
		<div class="catalog-detail-line"></div>
		<?=$arResult["DETAIL_TEXT"];?>
	</div>
	<?endif;?>

</div>