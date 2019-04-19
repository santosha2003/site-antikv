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
<div class="open-cart-menu <?if($arResult["COUNT"] > 0):?>no-empty<?else:?>cart-empty<?endif;?>">

	<div class="count"><?=$arResult["COUNT"]?></div>

	<?if($use_cart):?>
			
	    <?if($arResult["COUNT"] > 0):?>
			<a class = "cart-show"></a>
		<?else:?>
			<?if(strlen($arParams["LINK"])>0):?>
				<a class="cart_link scroll" href="<?=$arParams["LINK"]?>"></a>
			<?endif;?>
		<?endif;?>
	<?endif;?>
</div>