<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

/** @global CIntranetToolbar $INTRANET_TOOLBAR */
	global $APPLICATION;

	$arResult = array();
	$KRAKEN_CART_ = $APPLICATION->get_cookie('_kraken_cart_'.$arParams["CURRENT_SITE"], "");
	$KRAKEN_CART = unserialize($KRAKEN_CART_);

	if(!empty($KRAKEN_CART))
		$arResult["COUNT"] = count($KRAKEN_CART);
	else
		$arResult["COUNT"] = 0;
	
	$this->includeComponentTemplate();
?>
