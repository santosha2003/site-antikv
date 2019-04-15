<?
$MESS ['VOTE_NEW_NAME'] = "Ново гласуване";
$MESS ['VOTE_NEW_DESC'] = "#ID# - ID на резултата от гласуването
#TIME# - час на гласуването
#VOTE_TITLE# - заглавие на анкетата
#VOTE_DESCRIPTION# - описание на анкетата
#VOTE_ID# - ID на анкетата
#CHANNEL# - име на групата анкета
#CHANNEL_ID# - ID на групата анкета
#VOTER_ID# - ID на гласувалия посетител
#USER_NAME# - трите имена на потребителя
#LOGIN# - потребителско име
#USER_ID# - ID на потребителя
#STAT_GUEST_ID# - ID на посетителя на модула на статистиката
#SESSION_ID# - ID на сесията на модула на статистиката
#IP# - IP адрес
";
$MESS ['VOTE_NEW_SUBJECT'] = "#SITE_NAME#: Ново гласуване по анкетата \"[#VOTE_ID#] #VOTE_TITLE#\"";
$MESS ['VOTE_NEW_MESSAGE'] = "Ново гласуване по анкетата

Анкета       - [#VOTE_ID#] #VOTE_TITLE#
Група      - [#CHANNEL_ID#] #CHANNEL#

--------------------------------------------------------------

Посетител  - [#VOTER_ID#] (#LOGIN#) #USER_NAME# [#STAT_GUEST_ID#]
Сесия      - #SESSION_ID#
IP адрес    - #IP#
Час       - #TIME#

За преглед на гласуването използвайте линка:
http://#SERVER_NAME#/bitrix/admin/vote_user_results.php?EVENT_ID=#ID#&lang=ru


За преглед на диаграмата за резултата от анкетата използвайте линка:
http://#SERVER_NAME#/bitrix/admin/vote_results.php?lang=ru&VOTE_ID=#VOTE_ID#

Писмото е генерирано автоматично.
";
?>