<?php
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$dir = '../new_header';
$filenames = array_diff(scandir($dir), array('..', '.', '.section.php'));

echo json_encode($filenames);
