<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
		"CONDITION" => "#^/ng/personal/order/#",
		"RULE" => "",
		"ID" => "bitrix:sale.personal.order",
		"PATH" => "/ng/personal/order/index.php",
	),
	array(
		"CONDITION" => "#^([^/]+?)\\??(.*)#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "bitrix:catalog.section",
		"PATH" => "/i1.php",
	),
	array(
		"CONDITION" => "#^([^/]+?)\\??(.*)#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "bitrix:catalog.section",
		"PATH" => "/index.php",
	),
	array(
		"CONDITION" => "#^/awards_rus/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/awards_rus/index.php",
	),
	array(
		"CONDITION" => "#^/ng/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/ng/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/catalog/index.php",
	),
	array(
		"CONDITION" => "#^/museum/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/museum/index.php",
	),
	array(
		"CONDITION" => "#^/advice/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/advice/index.php",
	),
	array(
		"CONDITION" => "#^/forum/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/forum/index.php",
		"SORT" => "100",
	),
	array(
		"CONDITION" => "#^/news/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/news/index.php",
	),
);

?>