<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
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
<<<<<<< HEAD
            <div class="product-imgs">
=======
            <div class="left">
                <div class="name-ptoduct">
                    <h2><?=$arResult["NAME"] ?></h2>
                </div>
                <div class="property">
                    <? if ($arResult["DISPLAY_PROPERTIES"]["YEAR"]): ?><p><b>Год
                        выпуска:</b> <?= $arResult["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["MATERIAL"]): ?><p>
                        <b>Материал:</b> <?= $arResult["DISPLAY_PROPERTIES"]["MATERIAL"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["DIAMETR"]): ?><p>
                        <b>Диаметр:</b> <?= $arResult["DISPLAY_PROPERTIES"]["DIAMETR"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["TIRAGE"]): ?><p><b>Тираж
                        выпуска:</b> <?= $arResult["DISPLAY_PROPERTIES"]["TIRAGE"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["CONDITIO"]): ?><p><b>
                        Состояние:</b> <?= $arResult["DISPLAY_PROPERTIES"]["CONDITIO"]["VALUE"] ?> </p><? endif ?>
                </div>
            </div>
            <div class="right">
                <div class="price">
                    <div class="prPrice"><?= $arResult["PRICES"]["BASE"]["VALUE"] ?>
                        <br/><?= $arResult["PRICES"]["BASE"]["CURRENCY"] == "RUB" ? "руб." : $arResult["PRICES"]["BASE"]["CURRENCY"] ?>
                    </div>
                    <div class="prCart"><a href="<?= $arResult["ADD_URL"] ?>">В корзину</a></div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="bottom">
            <div class="description">
                <p><b>Описание:</b><br/>
                    <?= $arResult["DETAIL_TEXT"] ?>
                </p>
            </div>
        </div>
        <hr/>
    </div>
    <div class="product-imgs">
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
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
                    <? foreach ($arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"] as $pid => $arProperty):?>
                        <?
                            $renderImage2 = CFile::ResizeImageGet($arProperty['ID'], Array("width" => $newWidth2, "height" => $newHeight2), "BX_RESIZE_IMAGE_EXACT");
                        ?>
                        <a href="<?= $arProperty['SRC'] ?>" data-id-photo="<?=$pid?>" class="fancy <?=$pid == 0 ? "active" : ""?>" rel="photos">
                            <img src="<?= $renderImage2['src'] ?>" alt="<?= $arResult["NAME"] ?>" />
                        </a>
                    <? endforeach ?>
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
                        <li rel="<? echo $arResult["DISPLAY_PROPERTIES"]["FOTO"]["FILE_VALUE"]["SRC"]; ?>">
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
<<<<<<< HEAD
            <div class="left">
                <div class="property">
                    <? if ($arResult["DISPLAY_PROPERTIES"]["YEAR"]): ?><p><b>Год
                        выпуска:</b> <?= $arResult["DISPLAY_PROPERTIES"]["YEAR"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["MATERIAL"]): ?><p>
                        <b>Материал:</b> <?= $arResult["DISPLAY_PROPERTIES"]["MATERIAL"]["VALUE"] ?></p> <? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["DIAMETR"]): ?><p>
                        <b>Диаметр:</b> <?= $arResult["DISPLAY_PROPERTIES"]["DIAMETR"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["TIRAGE"]): ?><p><b>Тираж
                        выпуска:</b> <?= $arResult["DISPLAY_PROPERTIES"]["TIRAGE"]["VALUE"] ?> </p><? endif ?>
                    <? if ($arResult["DISPLAY_PROPERTIES"]["CONDITIO"]): ?><p><b>
                        Состояние:</b> <?= $arResult["DISPLAY_PROPERTIES"]["CONDITIO"]["VALUE"] ?> </p><? endif ?>
                </div>
            </div>
            <div class="right">
                <div class="price">
                    <div class="prPrice"><?= $arResult["PRICES"]["BASE"]["VALUE"] ?>
                        <br/><?= $arResult["PRICES"]["BASE"]["CURRENCY"] == "RUB" ? "руб." : $arResult["PRICES"]["BASE"]["CURRENCY"] ?>
                    </div>
                    <?php if($arResult['CATALOG_QUANTITY']): ?>
                        <div class="prCart"><a href="<?= $arResult["ADD_URL"] ?>">В корзину</a></div>
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
                    <?= $arResult["DETAIL_TEXT"] ?>
                </p>
            </div>
        </div>
        <hr/>
    </div>
    <!--Тут был слайдер-->
=======
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
    <div class="product-section">
        <? if (is_array($arResult["SECTION"])): ?>
            <br/><a href="<?= $arResult["SECTION"]["SECTION_PAGE_URL"] ?>"><?= GetMessage("CATALOG_BACK") ?></a>
        <? endif ?>
    </div>
</div>

