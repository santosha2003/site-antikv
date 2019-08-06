<?
$MESS["SECURITY_SITE_CHECKER_EnvironmentTest_NAME"] = "Aplinkos patikrinimas";
$MESS["SECURITY_SITE_CHECKER_SESSION_DIR"] = "Sesijos fail� saugyklos katalogas yra pasiekiamas visiems sistemos naudotojams";
$MESS["SECURITY_SITE_CHECKER_SESSION_DIR_DETAIL"] = "�is pa�eid�iamumas gali b�ti naudojamas skaityti arba keisti sesijos duomenis, paleid�iant skript� kitame virtualiame serveryje.";
$MESS["SECURITY_SITE_CHECKER_SESSION_DIR_RECOMMENDATION"] = "Konfig�ruoti prieigos teises teisingai, arba pakeisti katalog�. Kitas variantas yra i�saugoti sesijas duomen� baz�je:<a href=\"/bitrix/admin/security_session.php\">Sesijos apsauga</a>.";
$MESS["SECURITY_SITE_CHECKER_SESSION_DIR_ADDITIONAL"] = "Sesijos i�saugojimo katalogas: #DIR#<br>
Leidimas: #PERMS#";
$MESS["SECURITY_SITE_CHECKER_COLLECTIVE_SESSION"] = "Sesijos saugojimo katalogas gali tur�ti �vairi� projekt� sesijas.";
$MESS["SECURITY_SITE_CHECKER_COLLECTIVE_SESSION_DETAIL"] = "Tai gali pad�ti u�puolikui skaityti ir ra�yti sesijos duomenis, naudojant kit� virtuali� serveri� skriptus.";
$MESS["SECURITY_SITE_CHECKER_COLLECTIVE_SESSION_RECOMMENDATION"] = "Keisti katalog� ar saugoti sesijas duomen� baz�je: <a href=\"/bitrix/admin/security_session.php\">Sesijos apsauga</a>.";
$MESS["SECURITY_SITE_CHECKER_COLLECTIVE_SESSION_ADDITIONAL_OWNER"] = "Prie=astis: failo savininkas yra ne dabartinis naudrtotojas<br>
Failas: #FILE#<br>
Failo savininko UID: #FILE_ONWER#<br>
Dabartinio naudotojo UID: #CURRENT_OWNER#<br>";
$MESS["SECURITY_SITE_CHECKER_COLLECTIVE_SESSION_ADDITIONAL_SIGN"] = "Prie�astis: sesijos failas n�ra pasira�ytas dabartiniu savetain�s para�u<br>
Failas: #FILE#<br>
Dabartinis svetain�s para�as: #SIGN#<br>
Failo turinys: <pre>#FILE_CONTENT#</pre>";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP"] = "PHP skriptai yra paleisti �kelt� fail� kataloge.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP_DETAIL"] = "Kartais k�r�jai neskiria pakankamai d�mesio tinkamo failo pavadinimo filtrams. U�puolikas gali i�naudoti �� pa�eid�iamum� ir prad�ti visi�kai kontroliuoti j�s� projekt�.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP_RECOMMENDATION"] = "Konfig�ruoti j�s� web server� teisingai. ";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP_DOUBLE"] = "PHP su dvigubu i�pl�timu (pvz php.lala) yra atliekamas �kelt� fail� kataloge.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP_DOUBLE_DETAIL"] = "Kartais k�r�jai neskiria pakankamai d�mesio tinkamo failo pavadinimo filtrams. U�puolikas gali i�naudoti �� pa�eid�iamum� ir prad�ti visi�kai kontroliuoti j�s� projekt�.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PHP_DOUBLE_RECOMMENDATION"] = "Konfig�ruokite j�s� web server� teisingai. ";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PY"] = "Python skriptai yra paleisti �kelt� fail� kataloge.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PY_DETAIL"] = "Kartais k�r�jai neskiria pakankamai d�mesio tinkamo failo pavadinimo filtrams. U�puolikas gali i�naudoti �� pa�eid�iamum� ir prad�ti visi�kai kontroliuoti j�s� projekt�.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_EXECUTABLE_PY_RECOMMENDATION"] = "Konfig�ruokite j�s� web server� teisingai. ";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_HTACCESS"] = "Apache neturi apdoroti .htaccess failus �kelt� fail� kataloge";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_HTACCESS_DETAIL"] = "Kartais k�r�jai neskiria pakankamai d�mesio tinkamo failo pavadinimo filtrams. U�puolikas gali i�naudoti �� pa�eid�iamum� ir prad�ti visi�kai kontroliuoti j�s� projekt�.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_HTACCESS_RECOMMENDATION"] = "Konfig�ruokite j�s� web server� teisingai. ";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_NEGOTIATION"] = "Apache turinio derybos yra �jungtos fail� �k�limo kataloge.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_NEGOTIATION_DETAIL"] = "Apache turinio derybos nerekomenduojamos, nes jis gali patirti XSS atakas.";
$MESS["SECURITY_SITE_CHECKER_UPLOAD_NEGOTIATION_RECOMMENDATION"] = "Konfig�ruokite j�s� web server� teisingai. ";
$MESS["SECURITY_SITE_CHECKER_PHP_PRIVILEGED_USER"] = "PHP veikia kaip privilegijuotas naudotojas";
$MESS["SECURITY_SITE_CHECKER_PHP_PRIVILEGED_USER_DETAIL"] = "Veikiantis PHP kaip priviligijuotas naudotojas (pvz. root) gali sukompromituoti projekto saugum�";
$MESS["SECURITY_SITE_CHECKER_PHP_PRIVILEGED_USER_RECOMMENDATION"] = "Sukonfig�ruokite savo server�, kad jis veikt� kaip neprivilegijuotas  PHP naudotojas.";
$MESS["SECURITY_SITE_CHECKER_PHP_PRIVILEGED_USER_ADDITIONAL"] = "#UID#/#GID#";
$MESS["SECURITY_SITE_CHECKER_BITRIX_TMP_DIR"] = "Laikini failai yra kaupiami projekto root kataloge";
$MESS["SECURITY_SITE_CHECKER_BITRIX_TMP_DIR_DETAIL"] = "Nerekomenduojama saugoti laikinus failus sukurtus CTempFile pagalba root kataloge.";
$MESS["SECURITY_SITE_CHECKER_BITRIX_TMP_DIR_RECOMMENDATION"] = "Apibr��kite konstant� \"BX_TEMPORARY_FILES_DIRECTORY\" faile \"bitrix/php_interface/dbconn.php\" ir nurodykite reikiam� keli�. <br />
Atlikite �ingsnius: <br />
1. Pasirinkite laikinojo katalogo pavadinim� ir sukurkite j�. Pvz.: \"/home/bitrix/tmp/www\":
<pre>
mkdir -p -m 700 /home/bitrix/tmp/www
</pre>
2. Apibr��kite konstant� , kad sistema �inot� kur jus norite kaupti laikinas bylas:
<pre>
define(\"BX_TEMPORARY_FILES_DIRECTORY\", \"/home/bitrix/tmp/www\");
</pre>";
$MESS["SECURITY_SITE_CHECKER_BITRIX_TMP_DIR_ADDITIONAL"] = "Dabartinis katalogas: #DIR#";
?>