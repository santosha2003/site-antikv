<?
$MESS['STATISTIC_ACTIVITY_EXCEEDING_NAME'] = 'Aktyvumo limito virðijimas';
$MESS['STATISTIC_ACTIVITY_EXCEEDING_DESC'] = '#ACTIVITY_TIME_LIMIT# - testinis laiko intervalas
#ACTIVITY_HITS# - hitø kiekis per testiná laiko tarpà
#ACTIVITY_HITS_LIMIT# - maksimalus hitø kiekis per testiná laiko periodà (aktyvumo limitas)
#ACTIVITY_EXCEEDING# - hitø kiekio virðijimas
#CURRENT_TIME# - blokavimo momentas (serverio laikas)
#DELAY_TIME# - blokavimo trukmë
#USER_AGENT# - UserAgent
#SESSION_ID# - sesijos ID
#SESSION_LINK# - sesijos nuoroda
#SERACHER_ID# - paieðkos sistemos ID
#SEARCHER_NAME# - paieðkos sistemos pavadinimas
#SEARCHER_LINK# - nuoroda á paieðkos sistemos hitø sàraðà
#VISITOR_ID# - lankytojo ID
#VISITOR_LINK# - nuoroda á lankytojo profailà
#STOPLIST_LINK# - nuorodà lankytojo pridëjimui á stop-sàraðà';
$MESS['STATISTIC_DAILY_REPORT_NAME'] = 'Kasdieninë svetainës statistika';
$MESS['STATISTIC_DAILY_REPORT_DESC'] = '#EMAIL_TO# - svetainës administratoriaus el.paðtas
#SERVER_TIME# - laikas serveryje ataskaitos siuntimo metu
#HTML_HEADER# - HTML þymës atidarimas + CSS stiliai
#HTML_COMMON# - svetainës lankomumo lentelë (hitai, sesijos, hostai, lankytojai, ávykiai) (HTML)
#HTML_ADV# - reklaminiø kompanijø lentelë (TOP 10) (HTML)
#HTML_EVENTS# - ávykiø tipø lentelë (TOP 10) (HTML)
#HTML_REFERERS# - nurodanèiø svetainiø sàraðas (TOP 10) (HTML)
#HTML_PHRASES# - paieðkos fraziø lentelë (TOP 10) (HTML)
#HTML_SEARCHERS# - svetainës indeksacijos lentelë (TOP 10) (HTML)
#HTML_FOOTER# - HTML þymës uþdarimas';
$MESS['STATISTIC_DAILY_REPORT_SUBJECT'] = '#SERVER_NAME#: Svetainës statistika (#SERVER_TIME#) ';
$MESS['STATISTIC_DAILY_REPORT_MESSAGE'] = '#HTML_HEADER#
<font class=\"h2\">Svetainës statistikos santrauka <font color=\"#a52929\">#SITE_NAME#</font><br>
Duomenys uþ <font color=\"#0d716f\">#SERVER_TIME#</font></font>
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
$MESS['STATISTIC_ACTIVITY_EXCEEDING_SUBJECT'] = '#SERVER_NAME#: Aktyvumo limito virðijimas';
$MESS['STATISTIC_ACTIVITY_EXCEEDING_MESSAGE'] = 'Svetainëje #SERVER_NAME# naudotojas virðijo nustatytà aktyvumo limità.

Pradedant nuo #CURRENT_TIME# naudotojas blokuojamas #DELAY_TIME# sek.

Aktyvumas  - #ACTIVITY_HITS# hitø per #ACTIVITY_TIME_LIMIT# sek. (limitas - #ACTIVITY_HITS_LIMIT#)
Naudotojas  - #VISITOR_ID#
Sesija      - #SESSION_ID#
Paieðkos sitema   - [#SERACHER_ID#] #SEARCHER_NAME#
UserAgent   - #USER_AGENT#

&gt;===============================================================================================
Pridëti á stop-sàraðà pasinaudokyte ðia nuoroda:
http://#SERVER_NAME##STOPLIST_LINK#
Perþiûrëti naudotojo sesijà pasinaudokyte ðia nuoroda:
http://#SERVER_NAME##SESSION_LINK#
Perþiûrëti naudotojo profailà pasinaudokyte ðia nuoroda:
http://#SERVER_NAME##VISITOR_LINK#
Perþiûrëti paieðkos sistemos hitø statistikà pasinaudokyte ðia nuoroda:
http://#SERVER_NAME##SEARCHER_LINK#';
?>