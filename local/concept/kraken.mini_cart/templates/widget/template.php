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
// GetMessage('KRAKEN_MINICART_EMPTY'), GetMessage('KRAKEN_MINICART_NO_EMPTY')
$this->setFrameMode(true);
?>
<div class="open-cart <?if($arResult["COUNT"] > 0):?>no-empty<?else:?>cart-empty<?endif;?> cart-show <?=$arParams["MODE"]?>">
	<div class="before_pulse"></div>
	<div class="after_pulse"></div>

    <span class="count"><?=$arResult["COUNT"]?></span>

    <?if($arParams["DESC_EMPTY"]):?><span class="desc-empty"><?=$arParams["~DESC_EMPTY"]?></span><?endif;?>
    <?if($arParams["DESC_NOEMPTY"]):?><span class="desc-no-empty"><?=$arParams["~DESC_NOEMPTY"]?></span><?endif;?>

    <?if($arResult["COUNT"] <= 0 && $arParams["LINK"]):?><a class="cart_link scroll" href="<?=$arParams["LINK"]?>"></a><?endif;?>

</div>

