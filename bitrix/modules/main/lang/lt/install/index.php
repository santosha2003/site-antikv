<?
$MESS["MAIN_ADMIN_GROUP_NAME"] = "Adminisratoriai";
$MESS["MAIN_ADMIN_GROUP_DESC"] = "Pilna prieiga";
$MESS["MAIN_EVERYONE_GROUP_NAME"] = "Visi naudotojai (su neautorizuotais naudotojais)";
$MESS["MAIN_EVERYONE_GROUP_DESC"] = "Visi naudotojai (iskaitant neautorizuotus naudotojus)";
$MESS["MAIN_VOTE_RATING_GROUP_NAME"] = "Naudotojai, kuriems leista balsuoti u� reiting�";
$MESS["MAIN_VOTE_RATING_GROUP_DESC"] = "Naryst� �ioje naudotoj� grup�je valdoma automati�kai.";
$MESS["MAIN_VOTE_AUTHORITY_GROUP_NAME"] = "Naudotojai, kuriems leid�iama balsuoti u� kompetencij�";
$MESS["MAIN_VOTE_AUTHORITY_GROUP_DESC"] = "Naryst� �ioje naudotoj� grup�je valdoma automati�kai.";
$MESS["MAIN_RULE_ADD_GROUP_AUTHORITY_NAME"] = "U�siregistruoti naudotoj�, kuriems leid�iama balsuoti u� kompetencij�, grup�je";
$MESS["MAIN_RULE_ADD_GROUP_RATING_NAME"] = "U�siregistruoti naudotoj�, kuriems leid�iama balsuoti u� reiting�, grup�je";
$MESS["MAIN_RULE_REM_GROUP_AUTHORITY_NAME"] = "Pa�alinti i� naudotoj�, kuriems u�drausta balsuoti u� kompetencij�, grup�s ";
$MESS["MAIN_RULE_REM_GROUP_RATING_NAME"] = "Pa�alinti i� naudotoj�, kuriems u�drausta balsuoti u� reiting�, grup�s ";
$MESS["MAIN_RATING_NAME"] = "Reitingas";
$MESS["MAIN_RATING_AUTHORITY_NAME"] = "Kompetencija";
$MESS["MAIN_RATING_TEXT_LIKE_Y"] = "Patinka";
$MESS["MAIN_RATING_TEXT_LIKE_N"] = "Nepatinka";
$MESS["MAIN_RATING_TEXT_LIKE_D"] = "Patinka";
$MESS["MAIN_DEFAULT_SITE_NAME"] = "Numatytojo svetain�";
$MESS["MAIN_DEFAULT_LANGUAGE_NAME"] = "Angli�kai";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_DATE"] = "MM/DD/YYYY";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_DATETIME"] = "MM/DD/YYYY H:MI:SS T";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_NAME"] = "#NAME# #LAST_NAME#";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_CHARSET"] = "iso-8859-1";
$MESS["MAIN_DEFAULT_SITE_FORMAT_DATE"] = "MM/DD/YYYY";
$MESS["MAIN_DEFAULT_SITE_FORMAT_DATETIME"] = "MM/DD/YYYY H:MI:SS T";
$MESS["MAIN_DEFAULT_SITE_FORMAT_NAME"] = "#NAME# #LAST_NAME#";
$MESS["MAIN_DEFAULT_SITE_FORMAT_CHARSET"] = "iso-8859-1";
$MESS["MAIN_MODULE_NAME"] = "Pagrindinis modulis";
$MESS["MAIN_MODULE_DESC"] = "Produkto branduolys";
$MESS["MAIN_INSTALL_DB_ERROR"] = "Nepavyko prisijungti prie duomen� baz�s. Pra�ome patikrinti parametrus.";
$MESS["MAIN_NEW_USER_TYPE_NAME"] = "Buvo registruotas naujas naudotojas";
$MESS["MAIN_NEW_USER_TYPE_DESC"] = "
#USER_ID# - Naudotojo ID
#LOGIN# - Prisijungimo vardas
#EMAIL# - El.pa�tas
#NAME# - Vardas
#LAST_NAME# - Pavard�
#USER_IP# - Naudotojo IP
#USER_HOST# - Naudotojos serveris";
$MESS["MAIN_USER_INFO_TYPE_NAME"] = "Paskyros informacija";
$MESS["MAIN_USER_INFO_TYPE_DESC"] = "
#USER_ID# - Naudotojo ID
#STATUS# -Paskyros statusas
#MESSAGE# - Prane�imas naudotojui
#LOGIN# - Prisijungimo vardas
#CHECKWORD# - Kontrolin� eilut� slapta�od�io pakeitimui
#NAME# - Vardas
#LAST_NAME# - Pavard�
#EMAIL# - Naudotojo el.pa�tas";
$MESS["MAIN_NEW_USER_CONFIRM_TYPE_NAME"] = "Naujo naudotojo registracijos informacija";
$MESS["MAIN_NEW_USER_CONFIRM_TYPE_DESC"] = "
#USER_ID# - Naudotojo ID
#LOGIN# - Prisijungimo vardas
#EMAIL# - El.pa�tas
#NAME# - Vardas
#LAST_NAME# - Pavard�
#USER_IP# - Naudotojo IP
#USER_HOST# - Naudotojo serveris
#CONFIRM_CODE# - Patvirtinimo kodas
";
$MESS["MAIN_USER_INVITE_TYPE_NAME"] = "Naujo naudotojo pakvietimas";
$MESS["MAIN_USER_INVITE_TYPE_DESC"] = "#ID# - Naudotojo ID
#LOGIN# -Prisijungimo vardas
#URL_LOGIN# - Koduotas prisijungimo vardas naudoti URL
#EMAIL# - El.pa�tas
#NAME# - Vardas
#LAST_NAME# - Pavard�
#PASSWORD# - Naudotojo slapta�odis
#CHECKWORD# - Slapta�od�io patikrinimo eilut�
#XML_ID# - Naudotojo ID susieti su i�oriniais duomen� �altiniais
";
$MESS["MAIN_NEW_USER_EVENT_NAME"] = "#SITE_NAME#: Naujas naudotojas buvo �registruotas svetain�je";
$MESS["MAIN_NEW_USER_EVENT_DESC"] = "Informacinis prane�imas i� #SITE_NAME#
---------------------------------------

Naujas naudotojas buvo s�kmingai �registruotas svetain�je  #SERVER_NAME#.

Naudotojo informacija:
Naudotojo ID: #USER_ID#

Vardas: #NAME#
Pavard�: #LAST_NAME#
Naudotojo el.pa�tas: #EMAIL#

Prisijungimo vardas: #LOGIN#

Prane�imas sugeneruotas automati�kai.";
$MESS["MAIN_USER_INFO_EVENT_NAME"] = "#SITE_NAME#: Registracijos informacija";
$MESS["MAIN_USER_INFO_EVENT_DESC"] = "Informacinis prane�imas i� #SITE_NAME#
---------------------------------------

#NAME# #LAST_NAME#,

#MESSAGE#

J�s� registracijos informacija:

Naudotojo ID: #USER_ID#
Paskyros statusas: #STATUS#
Prisijungimo vardas: #LOGIN#

To change your password please visit the link below:
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=en&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#LOGIN#

Prane�imas sugeneruotas automati�kai.";
$MESS["MAIN_USER_PASS_REQUEST_EVENT_DESC"] = "Informacinis prane�imas nuo #SITE_NAME#
---------------------------------------

#NAME# #LAST_NAME#,

#MESSAGE#

Nor�dami pakeisti slapta�od�, pra�ome sekti nuorod�::
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=en&USER_CHECKWORD=#CHECKWORD#&USER_LOGIN=#URL_LOGIN#

J�s� registracijos informacija:

Naudotojo ID: #USER_ID#
Paskyros statusas: #STATUS#
Prisijungimo vardas: #LOGIN#

Automati�kai sugeneruotas prane�imas.";
$MESS["MAIN_USER_PASS_CHANGED_EVENT_DESC"] = "Informacinis prane�imas nuo #SITE_NAME#
---------------------------------------

#NAME# #LAST_NAME#,

#MESSAGE#

J�s� registracijos informacija:

Naudotojo ID: #USER_ID#
Paskyros statusas: #STATUS#
Prisijungimo vardas: #LOGIN#

Automati�kai sugeneruotas prane�imas.";
$MESS["MAIN_NEW_USER_CONFIRM_EVENT_NAME"] = "#SITE_NAME#: Naujo naudotojo registracijos patvirtinimas";
$MESS["MAIN_NEW_USER_CONFIRM_EVENT_DESC"] = "Sveikinimai nuo #SITE_NAME#!
------------------------------------------

Sveiki,

J�s gavote �� lai�k�, nes j�s (arba kas nors kitas), naudojosi j�s� el.pa�tu ir u�siregistravo #SERVER_NAME#.

J�s� registracijos patvirtinimo kodas: #CONFIRM_CODE#

Pra�ome naudoti nuorod� �emiau, nor�dami patikrinti ir aktyvuoti savo registracij�:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#&confirm_code=#CONFIRM_CODE#

Arba atidarykite �i� nuorod� savo nar�ykl�je ir �veskite kod� rankiniu b�du:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#

D�mesio! J�s� paskyra nebus aktyvuota, kol nepatvirtinsite registracij�.

---------------------------------------------------------------------

Automati�kai sugeneruotas prane�imas.";
$MESS["MAIN_USER_INVITE_EVENT_NAME"] = "#SITE_NAME#: Pakvietimas � svetain�";
$MESS["MAIN_USER_INVITE_EVENT_DESC"] = "
Informacinis prane�imas nuo #SITE_NAME#
------------------------------------------
Sveiki #NAME# #LAST_NAME#!

Administratorius prid�jo jus prie registruot� svetain�s naudotoj�.

Kvie�iame apsilankyti m�s� svetain�je.

J�s� registracijos informacija:

Naudotojo ID: #ID#
Prisijungimo vardas: #LOGIN#

Mes rekomenduojame jums pakeisti automati�kai sugeneruot� slapta�od�.

Nor�dami pakeisti slapta�od�, pra�ome sekti nuorod�:
http://#SERVER_NAME#/auth.php?change_password=yes&USER_LOGIN=#URL_LOGIN#&USER_CHECKWORD=#CHECKWORD#";
$MESS["MF_EVENT_NAME"] = "Siun�iamas prane�imas naudojant gr��tamojo ry�io form�";
$MESS["MF_EVENT_DESCRIPTION"] = "#AUTHOR# - Prane�imo autorius
#AUTHOR_EMAIL# - Autoriaus el.pa�tas
#TEXT# - Prane�imo tekstas
#EMAIL_FROM# - Siunt�jo el.pa�to adresas
#EMAIL_TO# - Gav�jo el.pa�to adresas";
$MESS["MF_EVENT_SUBJECT"] = "#SITE_NAME#: Atsiliepimo formos prane�imas";
$MESS["MF_EVENT_MESSAGE"] = "Prane�imas nuo #SITE_NAME#
------------------------------------------

Prane�imas buvo i�si�stas i� gr��tamojo ry�io formos.

I�siunt�: #AUTHOR#
Siunt�jo el.pa�tas: #AUTHOR_EMAIL#

Prane�imo tekstas:
#TEXT#

�is prane�imas buvo sukurtas automati�kai.";
$MESS["MAIN_USER_PASS_REQUEST_TYPE_NAME"] = "Slapta�od�io pakeitimo pra�ymas ";
$MESS["MAIN_USER_PASS_CHANGED_TYPE_NAME"] = "Slapta�od�io pakeitimo patvirtinimas";
$MESS["MAIN_USER_PASS_REQUEST_EVENT_NAME"] = "#SITE_NAME#: Slapta�od�io pakeitimo pra�ymas ";
$MESS["MAIN_USER_PASS_CHANGED_EVENT_NAME"] = "#SITE_NAME#: Slapta�od�io pakeitimo patvirtinimas";
$MESS["MAIN_DESKTOP_CREATEDBY_KEY"] = "Sukurta";
$MESS["MAIN_DESKTOP_CREATEDBY_VALUE"] = "Bitrix, Inc. ";
$MESS["MAIN_DESKTOP_URL_KEY"] = "Svetain�s URL";
$MESS["MAIN_DESKTOP_URL_VALUE"] = "<a href=\"http://www.bitrixsoft.com\">www.bitrixsoft.com</a>";
$MESS["MAIN_DESKTOP_PRODUCTION_KEY"] = "I�leistas";
$MESS["MAIN_DESKTOP_PRODUCTION_VALUE"] = "12.12.2011";
$MESS["MAIN_DESKTOP_RESPONSIBLE_KEY"] = "Administratorius";
$MESS["MAIN_DESKTOP_RESPONSIBLE_VALUE"] = "John Doe";
$MESS["MAIN_DESKTOP_EMAIL_KEY"] = "El. pa�tas";
$MESS["MAIN_DESKTOP_EMAIL_VALUE"] = "<a href=\"mailto:info@bitrixsoft.com\">info@bitrixsoft.com</a>";
$MESS["MAIN_DESKTOP_INFO_TITLE"] = "Svetain�s informacija";
$MESS["MAIN_DESKTOP_RSS_TITLE"] = "Bitrix naujienos";
$MESS["MAIN_RULE_AUTO_AUTHORITY_VOTE_NAME"] = "Automatinis balsavimas u� naudotojo kompetencij�";
$MESS["MAIN_SMILE_DEF_SET_NAME"] = "Numatytieji nustatymai";
?>