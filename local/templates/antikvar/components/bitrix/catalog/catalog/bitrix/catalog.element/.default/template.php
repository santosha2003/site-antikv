<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?
// Original image with watermark
//$origUse = FALSE;
$origUse = TRUE;

if (!empty($GLOBALS['rusantiWatermark'])) {
    $rusantiWatermark = $GLOBALS['rusantiWatermark'];
} else {
    $rusantiWatermark = array();
}

if (!empty($rusantiWatermark['orig'])) {
    $origImgSizes = $rusantiWatermark['orig']['sizes'];
    $origImgMethod = $rusantiWatermark['orig']['method'];
    $origImgWatermark = $rusantiWatermark['orig']['watermark'];
} else {
    $origImgSizes = array();
    $origImgMethod = FALSE;
    $origImgWatermark = FALSE;
}

// Big thumb with watermark
//$bigThumbUse = FALSE;
$bigThumbUse = TRUE;

if (!empty($rusantiWatermark['bigThumb'])) {
    $bigThumbMethod = $rusantiWatermark['bigThumb']['method'];
    $bigThumbSizes = $rusantiWatermark['bigThumb']['sizes'];
    $bigThumbWatermark = $rusantiWatermark['bigThumb']['watermark'];
} else {
    $bigThumbMethod = BX_RESIZE_IMAGE_PROPORTIONAL;
    $bigThumbSizes = array('width' => 390, 'height' => 390);
    $bigThumbWatermark = FALSE;

}
?>

<div class="product-detail">
    <style type="text/css">
        .bigFOTO a{
            display: none;
        }
        .bigFOTO a.active{
            display: block;
        }
    </style>
    <div class="product-info">
        <div class="top">
            <div class="product-imgs">
        <? if (count($arResult["PROPERTIES"]["FOTO"]["VALUE"]) > 0): ?>
            <div class="slaider">
                <? $newWidth2 = 390;
                $newWidth3 = 800;
                $newHeight2 = 390;
                $newHeight3 = 600; ?>
                <? // disable, don't know where is used ?>
                <?/*
                <? if (count($arResult["PROPERTIES"]["FOTO"]["VALUE"]) > 1): ?>
                    <?
                    $spk_bigImageSrc = $arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"]["SRC"]; // +++ spk
                    $renderImage2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                    $renderImage3 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]["0"], Array("width" => $newWidth3, "height" => $newHeight3)); ?>
                <? else: ?>
                    <?
                    $spk_bigImageSrc = $arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]["SRC"]; // +++ spk
                    $renderImage2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                    $renderImage3 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"], Array("width" => $newWidth3, "height" => $newHeight3));
                    ?>
                <? endif ?>
                */?>

                <div class="bigFOTO">
					<?php if(is_array($arResult["PROPERTIES"]["FOTO"]["VALUE"])): ?>
						<? foreach ($arResult["PROPERTIES"]["FOTO"]["VALUE"] as $pid => $arProperty):?>
							<?
								//$renderImage2 = CFile::ResizeImageGet($arProperty['ID'], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");

                                // Big thumb with watermark
								if ($bigThumbUse) {
                                    $renderImage2 = CFile::ResizeImageGet($arProperty, $bigThumbSizes, $bigThumbMethod, false, $bigThumbWatermark);

                                } else {
                                    $renderImage2 = CFile::ResizeImageGet($arProperty, Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                                }


								if ($origUse) {
                                    // Original with watermark
                                    $renderWater2 = CFile::ResizeImageGet($arProperty, $origImgSizes, $origImgMethod, false, $origImgWatermark);
                                    $sImgSrc = $renderWater2['src'];
                                } else {
                                    // Original without watermark
                                    $sImgSrc = $arProperty['SRC'];
                                }
							?>
							<a data-fancybox="gallery" href="<?= $sImgSrc ?>" data-id-photo="<?=$pid?>" target="_blank" class="fancy <?=$pid == 0 ? "active" : ""?>">
								<img src="<?= $renderImage2['src'] ?>" alt="<?= $arResult["NAME"] ?>" />
							</a>
						<? endforeach; ?>
					<?php else: ?>
							<?
								//$renderImage2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]['ID'], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");

                        echo "<pre style='display: none;'>";
                        var_dump($arResult["PROPERTIES"]["FOTO"]);
                        echo "</pre>";
                                // Big thumb with watermark
                                if ($bigThumbUse) {
                                    $renderImage2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["VALUE"], $bigThumbSizes, $bigThumbMethod, false, $bigThumbWatermark);
                                } else {
                                    $renderImage2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["VALUE"], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                                }


                                // Original without watermark
                                //$sImgSrc = $arResult["PROPERTIES"]["FOTO"]["FILE_VALUE"]['SRC'];

                                if ($origUse) {
                                    // Original with watermark
                                    $renderWater2 = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["VALUE"], $origImgSizes, $origImgMethod, false, $origImgWatermark);

                                    $sImgSrc = $renderWater2['src'];
                                } else {
                                    // Original without watermark
                                    $sImgSrc = $arResult["PROPERTIES"]["FOTO"]["VALUE"]['SRC'];
                                }
							?>
							<a data-fancybox="gallery" href="<?= $sImgSrc ?>" data-id-photo="0" target="_blank" class="fancy active">
								<img src="<?= $renderImage2['src'] ?>" alt="<?= $arResult["NAME"] ?>" />
							</a>
 					<?php endif; ?>
                </div>

                <ul id="mycarousel" class="">
                    <? if (count($arResult["PROPERTIES"]["FOTO"]["VALUE"]) > 1): ?>
                        <? foreach ($arResult["PROPERTIES"]["FOTO"]["VALUE"] as $pid => $arProperty): ?>
                            <? $newWidth = 115;
                            $newHeight = 115;
                            $renderImage = CFile::ResizeImageGet($arProperty, Array("width" => $newWidth, "height" => $newHeight));


                            //$sImgSrc = $arProperty["SRC"];


                            if ($origUse) {
                                // Original with watermark
                                $renderOrig = CFile::ResizeImageGet($arProperty, $origImgSizes, $origImgMethod, false, $origImgWatermark);
                                $sImgSrc = $renderOrig['src'];
                            } else {
                                // Original without watermark
                                $sImgSrc = $arProperty["SRC"];
                            }
                            ?>
                            <?/*<li rel="<?= $sImgSrc ?>" data-id-photo-thumb="<?=$pid?>">*/ ?>
                            <li data-id-photo-thumb="<?=$pid?>">
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
                        $renderImage = CFile::ResizeImageGet($arResult["PROPERTIES"]["FOTO"]["VALUE"], Array("width" => $newWidth, "height" => $newHeight));
                        ?>
					<li class="one_photo">
                            <div>
                                <div class="fotosl">
                                    <!--<img src="http://rusantikvar.ru/upload/resize_cache/iblock/a4c/115_115_1/a4cf1496e12c9b59f1d54deece178e40.jpg" />-->
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
            <div class="left">
                <div class="property">
                    <? if ($arResult["PROPERTIES"]["YEAR"]): ?><p><b>Изготовитель, год:</b> <?= $arResult["PROPERTIES"]["YEAR"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["PROPERTIES"]["MATERIAL"]): ?><p>
                        <b>Материал, вес:</b> <?= $arResult["PROPERTIES"]["MATERIAL"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["PROPERTIES"]["DIAMETR"]): ?><p>
                        <b>Размеры:</b> <?= $arResult["PROPERTIES"]["DIAMETR"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["PROPERTIES"]["TIRAGE"]): ?><p><b>Тираж
                        выпуска:</b> <?= $arResult["PROPERTIES"]["TIRAGE"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["PROPERTIES"]["CONDITIO"]): ?><p><b>
                        Сохранность:</b> <?= $arResult["PROPERTIES"]["CONDITIO"]["VALUE"] ?> </p><? endif ?>

                    <? if ($arResult["PROPERTIES"]["RARITY"]): ?><p><b>
                        Редкость:</b> <?= $arResult["PROPERTIES"]["RARITY"]["VALUE"] ?> </p><? endif ?>
                </div>
            </div>
            <div class="right">
                <div class="price">
                    <?
                    $hidePrice = isset($arResult['PROPERTIES']['HIDE_PRICE']['VALUE_XML_ID']) && $arResult['PROPERTIES']['HIDE_PRICE']['VALUE_XML_ID'] === 'by_agreement';
                    $hidePriceText = isset($arResult['PROPERTIES']['HIDE_PRICE']['DISPLAY_VALUE']) ? $arResult['PROPERTIES']['HIDE_PRICE']['DISPLAY_VALUE'] : '';
                    ?>
                    
                    <?if($hidePrice):?>
                        <div class="prPrice prPrice--aggreement">
                            <?=$hidePriceText;?>
                        </div>
                    <?else:?>
                        <div class="prPrice">
                            <?= $arResult["PRICES"]["BASE"]["VALUE"] ?><br/>
                            <?= $arResult["PRICES"]["BASE"]["CURRENCY"] == "RUB" ? "руб." : $arResult["PRICES"]["BASE"]["CURRENCY"] ?>
                        </div>
                    <?endif;?>


                    <?php if($arResult['CATALOG_QUANTITY']): ?>
                        <? // Скрыть кнопку, если выбрано Скрыть цену ?>
                        <?if(!$hidePrice):?>
                            <div class="prCart"><a href="<?= $arResult["ADD_URL"] ?>">Купить</a></div>
                        <?endif;?>
                    <?php else: ?>
                        <div>Нет в наличии</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr/>
        <div class="bottom">
            <div class="description">
                <p><b>Описание:</b><br/>
				   <div class="description-text">
                    <?= $arResult["DETAIL_TEXT"] ?>
					</div>
                </p>
            </div>
        </div>
        <hr/>
    </div>
    <!--Тут был слайдер-->
    <div class="product-section">
        <? if (is_array($arResult["SECTION"])): ?>
            <br/><a href="<?= $arResult["SECTION"]["SECTION_PAGE_URL"] ?>"><?= GetMessage("CATALOG_BACK") ?></a>
        <? endif ?>
    </div>
</div>
