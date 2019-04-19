<?php
$connection = \Bitrix\Main\Application::getConnection();
$connection->queryExecute("SET NAMES 'utf8'");
$connection->queryExecute('SET collation_connection = "utf8_unicode_ci"');
//$connection->queryExecute("SET global time_zone = '+3:00';");
//$connection->queryExecute("SET session time_zone = '+3:00';");
//$connection->queryExecute("SET sql_mode = ''");
//$connection->queryExecute("SET GLOBAL sql_mode = ''");
//$connection->queryExecute("SELECT @@GLOBAL.sql_mode global, @@SESSION.sql_mode session");
$connection->queryExecute('SET LOCAL time_zone="+3:00"');   //"Europe/Moscow"');
?>