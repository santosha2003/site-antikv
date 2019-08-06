<?
$MESS['STATISTIC_ACTIVITY_EXCEEDING_NAME'] = 'Aktyvumo limito vir�ijimas';
$MESS['STATISTIC_ACTIVITY_EXCEEDING_DESC'] = '#ACTIVITY_TIME_LIMIT# - testinis laiko intervalas
#ACTIVITY_HITS# - hit� kiekis per testin� laiko tarp�
#ACTIVITY_HITS_LIMIT# - maksimalus hit� kiekis per testin� laiko period� (aktyvumo limitas)
#ACTIVITY_EXCEEDING# - hit� kiekio vir�ijimas
#CURRENT_TIME# - blokavimo momentas (serverio laikas)
#DELAY_TIME# - blokavimo trukm�
#USER_AGENT# - UserAgent
#SESSION_ID# - sesijos ID
#SESSION_LINK# - sesijos nuoroda
#SERACHER_ID# - paie�kos sistemos ID
#SEARCHER_NAME# - paie�kos sistemos pavadinimas
#SEARCHER_LINK# - nuoroda � paie�kos sistemos hit� s�ra��
#VISITOR_ID# - lankytojo ID
#VISITOR_LINK# - nuoroda � lankytojo profail�
#STOPLIST_LINK# - nuorod� lankytojo prid�jimui � stop-s�ra��';
$MESS['STATISTIC_DAILY_REPORT_NAME'] = 'Kasdienin� svetain�s statistika';
$MESS['STATISTIC_DAILY_REPORT_DESC'] = '#EMAIL_TO# - svetain�s administratoriaus el.pa�tas
#SERVER_TIME# - laikas serveryje ataskaitos siuntimo metu
#HTML_HEADER# - HTML �ym�s atidarimas + CSS stiliai
#HTML_COMMON# - svetain�s lankomumo lentel� (hitai, sesijos, hostai, lankytojai, �vykiai) (HTML)
#HTML_ADV# - reklamini� kompanij� lentel� (TOP 10) (HTML)
#HTML_EVENTS# - �vyki� tip� lentel� (TOP 10) (HTML)
#HTML_REFERERS# - nurodan�i� svetaini� s�ra�as (TOP 10) (HTML)
#HTML_PHRASES# - paie�kos frazi� lentel� (TOP 10) (HTML)
#HTML_SEARCHERS# - svetain�s indeksacijos lentel� (TOP 10) (HTML)
#HTML_FOOTER# - HTML �ym�s u�darimas';
$MESS['STATISTIC_DAILY_REPORT_SUBJECT'] = '#SERVER_NAME#: Svetain�s statistika (#SERVER_TIME#) ';
$MESS['STATISTIC_DAILY_REPORT_MESSAGE'] = '#HTML_HEADER#
<font class=\"h2\">Svetain�s statistikos santrauka <font color=\"#a52929\">#SITE_NAME#</font><br>
Duomenys u� <font color=\"#0d716f\">#SERVER_TIME#</font></font>
<br><br>
<a class=\"tablebodylink\" href=\"http://#SERVER_NAME#/bitrix/admin/stat_list.php?lang=#LANGUAGE_ID#\">http://#SERVER_NAME#/bitrix/admin/stat_list.php?lang=#LANGUAGE_ID#</a>
<br>
<hr><br>
#HTML_COMMON#
<br>
#HTML_ADV#
<br>
#HTML_REFERERS#

<br>
#HTML_PHRASES#
<br>
#HTML_SEARCHERS#
<br>
#HTML_EVENTS#
<br>
<hr>
<a class=\"tablebodylink\" href=\"http://#SERVER_NAME#/bitrix/admin/stat_list.php?lang=#LANGUAGE_ID#\">http://#SERVER_NAME#/bitrix/admin/stat_list.php?lang=#LANGUAGE_ID#</a>
#HTML_FOOTER#';
$MESS['STATISTIC_ACTIVITY_EXCEEDING_SUBJECT'] = '#SERVER_NAME#: Aktyvumo limito vir�ijimas';
$MESS['STATISTIC_ACTIVITY_EXCEEDING_MESSAGE'] = 'Svetain�je #SERVER_NAME# naudotojas vir�ijo nustatyt� aktyvumo limit�.

Pradedant nuo #CURRENT_TIME# naudotojas blokuojamas #DELAY_TIME# sek.

Aktyvumas  - #ACTIVITY_HITS# hit� per #ACTIVITY_TIME_LIMIT# sek. (limitas - #ACTIVITY_HITS_LIMIT#)
Naudotojas  - #VISITOR_ID#
Sesija      - #SESSION_ID#
Paie�kos sitema   - [#SERACHER_ID#] #SEARCHER_NAME#
UserAgent   - #USER_AGENT#

&gt;===============================================================================================
Prid�ti � stop-s�ra�� pasinaudokyte �ia nuoroda:
http://#SERVER_NAME##STOPLIST_LINK#
Per�i�r�ti naudotojo sesij� pasinaudokyte �ia nuoroda:
http://#SERVER_NAME##SESSION_LINK#
Per�i�r�ti naudotojo profail� pasinaudokyte �ia nuoroda:
http://#SERVER_NAME##VISITOR_LINK#
Per�i�r�ti paie�kos sistemos hit� statistik� pasinaudokyte �ia nuoroda:
http://#SERVER_NAME##SEARCHER_LINK#';
?>