<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/bitrix/services/ymarket/#",
		"RULE" => "",
		"ID" => "",
		"PATH" => "/bitrix/services/ymarket/index.php",
	),
	array(
<<<<<<< HEAD
		"CONDITION" => "#^([^/]+?)\\??(.*)#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "bitrix:catalog.section",
		"PATH" => "/index.php",
=======
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
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	),
	array(
		"CONDITION" => "#^([^/]+?)\\??(.*)#",
		"RULE" => "SECTION_CODE=\$1&\$2",
		"ID" => "bitrix:catalog.section",
<<<<<<< HEAD
		"PATH" => "/i1.php",
=======
		"PATH" => "/index.php",
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
	),
	array(
		"CONDITION" => "#^/awards_rus/#",
		"RULE" => "",
		"ID" => "bitrix:news",
		"PATH" => "/awards_rus/index.php",
	),
	array(
<<<<<<< HEAD
=======
		"CONDITION" => "#^/ng/catalog/#",
		"RULE" => "",
		"ID" => "bitrix:catalog",
		"PATH" => "/ng/catalog/index.php",
	),
	array(
>>>>>>> 4bb3e4deb359749a96a02a5e4d7c22ab1399e137
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