<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><h3>По фалеристике и золотым монетам</h3>
<h4>Email &nbsp;: <a href="mailto:antikvar@rusantikvar.ru">antikvar@rusantikvar.ru</a></h4>
 <b>тел. : 8-903-202-21-01</b><br>
<hr>
<div>
	<h3>По серебряным монетам</h3>
	<h4>Email : <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy73055 = '&#110;omism&#97;' + '&#64;';
 addy73055 = addy73055 + '&#114;us&#97;ntikv&#97;r' + '&#46;' + 'r&#117;';
 var addy_text73055 = '&#110;omi&#115;&#109;a' + '&#64;' + 'rus&#97;ntik&#118;&#97;&#114;' + '&#46;' + 'r&#117;';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy73055 + '\'>' );
 document.write( addy_text73055 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script> Этот e-mail адрес защищен от спам-ботов, для его просмотра у Вас должен быть включен Javascript <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script> </h4>
 <br>
	<hr>
	<h3>Мы в социальных сетях</h3>
	<p>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/include/social_links.php"
	)
);?>
	</p>
 <br>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>