<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
<?if(!empty($arResult["ITEMS"])){?>
    <div class="list-advice">
        <div class="title"">
			Награды Российской империи
        </div>
        <div class="list-advice-slider">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <div>
                    <div class="advice-item">
                        <a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
<?}?>
