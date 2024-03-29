<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заказы");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.order.full",
	".default", 
	array(
		"PAY_FROM_ACCOUNT" => "Y",
		"COUNT_DELIVERY_TAX" => "N",
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
		"ALLOW_AUTO_REGISTER" => "Y",
		"SEND_NEW_USER_NOTIFY" => "Y",
		"PROP_1" => array(
		),
		"PATH_TO_BASKET" => "/ng/personal/cart/",
		"PATH_TO_PERSONAL" => "/ng/personal/order/",
		"PATH_TO_PAYMENT" => "/ng/personal/order/payment/",
		"SET_TITLE" => "Y",
		"DELIVERY2PAY_SYSTEM" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"DELIVERY_NO_AJAX" => "Y",
		"DELIVERY_NO_SESSION" => "N",
		"TEMPLATE_LOCATION" => "popup",
		"DELIVERY_TO_PAYSYSTEM" => "d2p",
		"USE_PREPAYMENT" => "N",
		"ALLOW_NEW_PROFILE" => "Y",
		"SHOW_PAYMENT_SERVICES_NAMES" => "N",
		"SHOW_STORES_IMAGES" => "Y",
		"PATH_TO_AUTH" => "/ng/auth/",
		"DISABLE_BASKET_REDIRECT" => "N",
		"PRODUCT_COLUMNS" => array(
			0 => "PREVIEW_PICTURE",
			1 => "PROPERTY_SPECIALOFFER",
			2 => "PROPERTY_PROP1",
			3 => "PROPERTY_PROP2",
			4 => "PROPERTY_PROP3",
		),
		"PROP_2" => array(
		)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>