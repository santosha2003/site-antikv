<?
$MESS["SUBSCRIBE_CONFIRM_NAME"] = "Prenumeratos patvirtinimas";
$MESS["SUBSCRIBE_CONFIRM_DESC"] = "#ID# - prenumeratos ID
#EMAIL# - prenumeratos el.pa�to adresas
#CONFIRM_CODE# - patvirtinimo kodas
#SUBSCR_SECTION# - skyriuje su prenumeratos redagavimo puslapiu (nurodomas nustatymuose)
#USER_NAME# - prenumeratoriaus vardas (neprivaloma)
#DATE_SUBSCR# - adreso �vedimo/keitimo data
";
$MESS["SUBSCRIBE_CONFIRM_SUBJECT"] = "#SITE_NAME#: Prenumeratos patvirtinimas";
$MESS["SUBSCRIBE_CONFIRM_MESSAGE"] = "Informacinis prane�imas nuo #SITE_NAME#
---------------------------------------

Sveiki,

J�s gavote �� prane�im�, nes prenumeratos pra�ymas buvo pateiktas j�s� adresui naujienoms i� #SERVER_NAME# gauti.

�ia yra detali informacija apie j�s� prenumerat�:

Prenumeratos el.adresas .............. #EMAIL#
El.adreso �vedimo/redagavimo data .... #DATE_SUBSCR#

J�s� patvirtinimo kodas: #CONFIRM_CODE#

Pra�ome spausti pateikt� �iame lai�ke nuorod� j�s� prenumeratai patvirtinti.
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Arba eikite � �� puslap� ir �veskite savo patvirtinimo kod� rankiniu b�du:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#

J�s negausite jokio prane�imo, kol nei�si�site mums savo patvirtinimo.

---------------------------------------------------------------------
Pra�ome i�saugoti �� prane�im�, nes jame yra informacija apie autorizavim�.
Naudojant patvirtinimo kod�, j�s galite pakeisti prenumeratos parametrus arba jos 
atsisakyti.

Redaguoti parametrus:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Atsisakyti prenumeratos:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#&action=unsubscribe
---------------------------------------------------------------------

�is prane�imas sukurtas automati�kai
";
?>