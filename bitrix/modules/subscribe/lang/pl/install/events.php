<?
$MESS["SUBSCRIBE_CONFIRM_NAME"] = "Konfiguracja subskrypcji";
$MESS["SUBSCRIBE_CONFIRM_DESC"] = "#ID# - ID subskrypcji
#EMAIL# - email subskrypcji
#CONFIRM_CODE# - kod potwierdzenia
#SUBSCR_SECTION# - sekcja z subskrypcji edycji strony (okre�la si� w ustawieniach)
#USER_NAME# - nazwa abonenta (opcjonalnie)
#DATE_SUBSCR# - data dodania/zmiana adresu";
$MESS["SUBSCRIBE_CONFIRM_SUBJECT"] = "#SITE_NAME#: Potwierdzenie subskrypcji";
$MESS["SUBSCRIBE_CONFIRM_MESSAGE"] = "Komunikat informacyjny z #SITE_NAME#
---------------------------------------

Witaj,

Otrzyma�e�/a� t� wiadomo��, poniewa� zosta� z�o�ony abonament na adres do wiadomo�ci z #SERVER_NAME#.

Oto szczeg�owe informacje na temat abonamentu:

Email subskrypcji .............. #EMAIL#
Data dodania emaila/edycji .... #DATE_SUBSCR#

Kod potwierdzaj�cy: #CONFIRM_CODE#

Prosz� klikn�� na link w celu potwierdzenia subskrypcji.
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Lub przejd� na t� stron� i wprowad� kod potwierdzenia r�cznie:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#

Nie b�dziesz otrzymywa� �adnych wiadomo�ci, do czasu wys�ania nam swojego potwierdzenia.

---------------------------------------------------------------------
Zapisz t� wiadomo��, poniewa� zawiera ona informacje o autoryzacji.
Przy u�yciu kodu potwierdzenia, mo�esz zmieni� parametry subskrypcji lub si� z niej wypisa�.

Edytuj parametery:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#

Zako�cz subskrypcj�:
http://#SERVER_NAME##SUBSCR_SECTION#subscr_edit.php?ID=#ID#&CONFIRM_CODE=#CONFIRM_CODE#&action=unsubscribe
---------------------------------------------------------------------

Jest to automatycznie wygenerowana wiadomo��.
";
?>