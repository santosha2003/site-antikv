<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) 
	die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

?>
<input style='padding-top:7px;' type='image' name='paypalbutton' value='<?=Loc::getMessage("SALE_HPS_PAYPAL_BUTTON");?>' src='<?=Loc::getMessage("SALE_HPS_PAYPAL_BUTTON_SRC")?>'>