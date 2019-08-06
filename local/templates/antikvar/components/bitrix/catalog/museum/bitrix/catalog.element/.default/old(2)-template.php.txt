<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="tovar">		
<?if ($arResult["PRICES"]["BASE"]["VALUE"]):?>
									<div class="prodItem"><div class="inbg">
										<div class="prPrice"><?=$arResult["PRICES"]["BASE"]["VALUE"]?> <br />руб.</div>
										<div class="prCart"><a href="<?=$arResult["ADD_URL"]?>">В корзину</a></div>
									</div></div>
<?endif?>				
<h2><?=$arResult["NAME"]?></h2>

<?if ($arResult["DISPLAY_PROPERTIES"]["YEAR"]):?><p><b>Год выпуска:</b> <?=$arResult["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"]?></p> <?endif?>
<?if ($arResult["DISPLAY_PROPERTIES"]["MATERIAL"]):?><p><b>Материал:</b> <?=$arResult["DISPLAY_PROPERTIES"]["MATERIAL"]["VALUE"]?></p> <?endif?>
<?if ($arResult["DISPLAY_PROPERTIES"]["DIAMETR"]):?><p><b>Диаметр:</b> <?=$arResult["DISPLAY_PROPERTIES"]["DIAMETR"]["VALUE"]?> </p><?endif?>
<?if ($arResult["DISPLAY_PROPERTIES"]["TIRAGE"]):?><p><b>Тираж:</b> <?=$arResult["DISPLAY_PROPERTIES"]["TIRAGE"]["VALUE"]?> </p><?endif?>
<?if ($arResult["DETAIL_TEXT"]):?>
<p><b>Описание:</b><br />
<?=$arResult["DETAIL_TEXT"]?>
</p>
<?endif?>
<div class="clear"></div>

<?if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"])>0):?>	
<div class="slaider">
					<?    $newWidth2=390; $newWidth3=800;
	                            		$newHeight2=390; $newHeight3=600;?>
 						<?if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"])>1):?>
	                                                <?
$renderImage2 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth2, "height" => $newHeight2));  
$renderImage3 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth3, "height" => $newHeight3));?>
						<?else:?>
							  <?
$renderImage2 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth2, "height" => $newHeight2));
$renderImage3 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth3, "height" => $newHeight3));
?>
						<?endif?>   

  <div class="bigFOTO"><table><tr><td><a href="<?=$renderImage2['src']?>" class="fancy"><?echo CFile::ShowImage($renderImage2['src'], $newWidth2, $newHeight2, "border=0", "", true);?></a></td></tr></table></div>

  <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
 						<?if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"])>1):?>
								<?foreach($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"] as $pid=>$arProperty):?>
									<?$newWidth=115;
	                            		$newHeight=115;
	                            		$renderImage = CFile::ResizeImageGet($arProperty, Array("width" => $newWidth, "height" => $newHeight));
	                            	?>
									<li rel="<?=$arProperty["SRC"]?>"><div class="fotosl"><table><tr><td><?echo CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true);?></td></tr></table></div><span<?if ($pid==0):?> class="active"<?endif?>></span></li>
								<?endforeach?>
							<?else:?>
									<?  $newWidth=115;
	                            		$newHeight=115;
	                            		$renderImage = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth, "height" => $newHeight));
	                            	?>
									<li rel="<?echo $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["SRC"];?>"><div class="fotosl"><table><tr><td><?echo CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true);?></td></tr></table></div><span class="active"></span></li>
							<?endif?>        
    
  </ul>
  
</div>
<?endif?>

	<?if(is_array($arResult["SECTION"])):?>
		<br /><a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=GetMessage("CATALOG_BACK")?></a>
	<?endif?>

</div>

