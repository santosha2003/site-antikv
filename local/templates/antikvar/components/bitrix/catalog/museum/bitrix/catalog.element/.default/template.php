<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="tovar">		
<?if ($arResult["PRICES"]["BASE"]["VALUE"]):?>
									<div class="prodItem"><div class="inbg">
										<div class="prPrice"><?=$arResult["PRICES"]["BASE"]["VALUE"]?> <br />руб.</div>
										<div class="prCart"><a href="<?=$arResult["ADD_URL"]?>">В корзину</a></div>
									</div></div>
<?endif?>

    <div class="product-detail collections-slider">
        <div class="product-imgs">
            <? if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"]) > 0): ?>
                <div class="slaider">
                    <? $newWidth2 = 390;
                    $newWidth3 = 800;
                    $newHeight2 = 390;
                    $newHeight3 = 600; ?>
                    <? if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"]) > 1): ?>
                        <?
                        $spk_bigImageSrc = $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"]["SRC"]; // +++ spk
                        $renderImage2 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                        $renderImage3 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth3, "height" => $newHeight3)); ?>
                    <? else: ?>
                        <?
                        $spk_bigImageSrc = $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["SRC"]; // +++ spk
                        $renderImage2 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                        $renderImage3 = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth3, "height" => $newHeight3));
                        ?>
                    <? endif ?>
                    <div class="bigFOTO">
                        <? if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"]) > 1): ?>
                        <? foreach ($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"] as $pid => $arProperty):?>
                            <?
                            $renderImage2 = CFile::ResizeImageGet($arProperty['ID'], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                            ?>
                            <a href="<?= $arProperty['SRC'] ?>" data-id-photo="<?=$pid?>" class="fancy <?=$pid == 0 ? "active" : ""?>" rel="photos">
                                <img src="<?= $renderImage2['src'] ?>" alt="<?= $arResult["NAME"] ?>" />
                            </a>
                        <? endforeach ?>
                        <?php else: ?>
                            <a href="<?= $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]['SRC'] ?>" data-id-photo="0" class="fancy active" rel="photos">
                                <img src="<?= $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]['SRC'] ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                    <ul id="mycarousel" class="">
                        <? if (count($arResult["DISPLAY_PROPERTIES"]["FOTO"]["VALUE"]) > 1): ?>
                            <? foreach ($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"] as $pid => $arProperty): ?>
                                <? $newWidth = 115;
                                $newHeight = 115;
                                $renderImage = CFile::ResizeImageGet($arProperty, Array("width" => $newWidth, "height" => $newHeight));
                                ?>
                                <li rel="<?= $arProperty["SRC"] ?>" data-id-photo-thumb="<?=$pid?>">
                                    <div <? if ($pid == 0): ?> class="active"<? endif ?>>
                                        <div class="fotosl">
                                            <!--<img src="http://rusantikvar.ru/upload/resize_cache/iblock/a4c/115_115_1/a4cf1496e12c9b59f1d54deece178e40.jpg" />-->
                                            <? echo CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true); ?>
                                        </div>
                                        <span<? if ($pid == 0): ?> class="active"<? endif ?>></span>
                                    </div>
                                </li>
                            <? endforeach ?>
                        <? else: ?>
                            <? $newWidth = 115;
                            $newHeight = 115;
                            $renderImage = CFile::ResizeImageGet($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth, "height" => $newHeight));
                            ?>
                            <li rel="<? echo $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["SRC"]; ?>" data-id-photo-thumb="0">
                                <div>
                                    <div class="fotosl">

                                        <? echo CFile::ShowImage($renderImage['src'], $newWidth, $newHeight, "border=0", "", true); ?>
                                    </div>
                                    <span class="active"></span>
                                </div>
                            </li>
                        <? endif ?>
                    </ul>
                </div>
            <? endif ?>
        </div>
    </div>


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

<!--Тут был слайдер-->

	<?if(is_array($arResult["SECTION"])):?>
		<br /><a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>"><?=GetMessage("CATALOG_BACK")?></a>
	<?endif?>

</div>

