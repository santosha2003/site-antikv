<?
$MESS["SUBSCRIBE_CONFIRM_NAME"] = "Konfiguracja subskrypcji";
$MESS["SUBSCRIBE_CONFIRM_DESC"] = "#ID# - ID subskrypcji
#EMAIL# - email subskrypcji
#CONFIRM_CODE# - kod potwierdzenia
#SUBSCR_SECTION# - sekcja z subskrypcji edycji strony (okre¶la siê w ustawieniach)
#USER_NAME# - nazwa abonenta (opcjonalnie)
#DATE_SUBSCR# - data dodania/zmiana adresu";
$MESS["SUBSCRIBE_CONFIRM_SUBJECT"] = "#SITE_NAME#: Potwierdzenie subskrypcji";
$MESS["SUBSCRIBE_CONFIRM_MESSAGE"] = "Komunikat informacyjny z #SITE_NAME#
---------------------------------------

Witaj,

Otrzyma³e¶/a¶ tê wiadomo¶æ, poniewa¿ zosta³ z³o¿ony abonament na adres do wiadomo¶ci z #SERVER_NAME#.

Oto szczegó³owe informacje na temat abonamentu:

Email subskrypcji .............. #EMAIL#
Data dodania emaila/edycji .... #DATE_SUBSCR#

Kod potwierdzaj±cy: #CONFIRM_CODE#

Proszê klikn±æ na link w celu potwierdzenia subskrypcji.
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Lub przejd¼ na tê stronê i wprowad¼ kod potwierdzenia rêcznie:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#

Nie bêdziesz otrzymywaæ ¿adnych wiadomo¶ci, do czasu wys³ania nam swojego potwierdzenia.

---------------------------------------------------------------------
Zapisz tê wiadomo¶æ, poniewa¿ zawiera ona informacje o autoryzacji.
Przy u¿yciu kodu potwierdzenia, mo¿esz zmieniæ parametry subskrypcji lub siê z niej wypisaæ.

Edytuj parametery:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Zakoñcz subskrypcjê:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#&action=unsubscribe
---------------------------------------------------------------------

Jest to automatycznie wygenerowana wiadomo¶æ.
";
?>