<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="news-list">
    <div class="container">
        <div class="cat-picture-container">
            <img src="<?=CFile::GetPath($arResult["PICTURE"]);?>">
        </div>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <div class="award-item clearfix">
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                <img class="award-thumb" width="110" src="<?php
                if ($arItem["PREVIEW_PICTURE"]["SRC"]) {
                    echo $arItem["PREVIEW_PICTURE"]["SRC"];
                } else {
                    echo 'https://via.placeholder.com/110x100.png?text=Фото+нет';
                } ?>"/>
            </a>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem['NAME']?></a>
        </div>
    <?endforeach;?>
    </div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</div>
