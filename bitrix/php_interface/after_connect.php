<?php
$DB->Query("SET NAMES 'utf8'");
//$DB->Query("SET sql_mode='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION'");
$DB->Query('SET collation_connection = "utf8_unicode_ci"');
$DB->Query("SET LOCAL time_zone='Europe/Moscow'");
$DB->Query('SET collation_connection = "utf8_unicode_ci"');
// run mysql_tzinfo_to_sql /usr/share/zoneinfo | mysql mysql    (linux FreeBSD)  ( | mysql -u root -p ) 
//$DB->Query("SET LOCAL time_zone='Europe/Moscow'");
$DB->Query("SET LOCAL time_zone='+03:00'");
//$DB->Query("SET global time_zone = '+3:00';");
//$DB->Query("SET session time_zone = '+3:00';");
//$DB->Query("SET sql_mode = ''");
//$DB->Query("SET GLOBAL sql_mode = ''");
//$DB->Query("SELECT @@GLOBAL.sql_mode global, @@SESSION.sql_mode session");
?>
