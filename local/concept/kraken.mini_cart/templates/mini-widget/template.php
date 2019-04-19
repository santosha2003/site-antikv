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
<?
$use_cart = true;
if($APPLICATION->GetCurDir() == SITE_DIR."cart/" || $arParams["CART_PAGE"]=="Y")
	$use_cart = false;
?>
<div class="open-cart-mob <?if($arResult["COUNT"] > 0):?>no-empty<?else:?>cart-empty<?endif;?> <?=$arParams["MODE"]?>">
	<div class="bg-color"></div>
	<div class="wrap-img-count">
		<table>
			<tr>
				<td><span class="icon"></span></td>
				<td><span class="count"><?=$arResult["COUNT"]?></span></td>
			</tr>
		</table>
    </div>
    <?if($use_cart):?>
	    <?if($arResult["COUNT"] > 0):?>
			<a class = "cart-show hidden-xs"></a>
			<a class="cart_link visible-xs" href="<?=SITE_DIR?>cart/"></a>
		<?else:?>
			<a class="cart_link <?if(strlen($arParams["LINK"])>0):?>scroll<?endif;?>" <?if(strlen($arParams["LINK"])>0):?> href="<?=$arParams["LINK"]?>" <?endif;?>></a>
		<?endif;?>
	<?endif;?>
</div>

