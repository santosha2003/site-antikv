<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Feedback form");
?><?$APPLICATION->IncludeComponent("bitrix:main.feedback", ".default", array(
	"USE_CAPTCHA" => "Y",
	"OK_TEXT" => "",
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>