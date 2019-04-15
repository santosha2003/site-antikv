<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) 
	LocalRedirect($backurl);

$APPLICATION->SetTitle("Authorization");
?>
<p>You have been successfully authorized.</p>
 
<p>Use Administrative toolbar at the top of your screen to manage site content. Different site sections have their own button set that will help you to easily edit any type of information on the site</p>
 
<p><a href="<?=SITE_DIR?>">Back to the Home page</a></p>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>