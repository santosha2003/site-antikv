<?
$MESS["VOTE_FOR_NAME"] = "Novo voto";
$MESS["VOTE_FOR_DESC"] = "#ID# - ID do resultado da votaзгo
#TIME# - Tempo de votaзгo
#VOTE_TITLE# - Nome da votaзгo
#VOTE_DESCRIPTION# - Descriзгo da votaзгo
#VOTE_ID# - ID da votaзгo
#CHANNEL# - Nome do grupo de votaзгo
#CHANNEL_ID# - ID do grupo de votaзгo
#VOTER_ID# - ID dos usuбrios votantes
#USER_NAME# - Nome completo do usuбrio
#LOGIN# - login
#USER_ID# - ID de usuбrio
#STAT_GUEST_ID# - ID de visitante no mуdulo de anбlise da web
#SESSION_ID# - ID da sessгo no mуdulo de anбlise da web
#IP# - Endereзo IP 
#VOTE_STATISTIC# -Estatнsticas resumidas deste tipo de votaзгo ( - Pergunta- Resposta)
#URL# - URL da votaзгo";
$MESS["VOTE_FOR_SUBJECT"] = "#SITE_NAME#: [V] #VOTE_TITLE#";
$MESS["VOTE_FOR_MESSAGE"] = "#USER_NAME# votou na enquete \"#VOTE_TITLE#\":
#VOTE_STATISTIC#

http://#SERVER_NAME##URL#
Mensagem gerada automaticamente.";
$MESS["VOTE_NEW_DESC"] = "#ID# - ID do resultado da votaзгo
#TIME# - Tempo de votaзгo
#VOTE_TITLE# - Nome da votaзгo
#VOTE_DESCRIPTION# - Descriзгo da votaзгo
#VOTE_ID# - ID da votaзгo
#CHANNEL# - Nome do grupo de votaзгo
#CHANNEL_ID# - ID do grupo de votaзгo
#VOTER_ID# - ID dos usuбrios votantes
#USER_NAME# - Nome completo do usuбrio
#LOGIN# - login
#USER_ID# - ID de usuбrio
#STAT_GUEST_ID# - ID de visitante no mуdulo de anбlise da web
#SESSION_ID# - ID da sessгo no mуdulo de anбlise da web
#IP# - Endereзo IP 
#VOTE_STATISTIC# -Estatнsticas resumidas deste tipo de votaзгo ( - Pergunta- Resposta)
#URL# - URL da votaзгo

";
$MESS["VOTE_NEW_MESSAGE"] = "Nova votaзгo

Votar - [# #VOTE_ID#] #VOTE_TITLE#
Grupo - [#CHANNEL_ID#] #CHANNEL#

-------------------------------------------------- ------------

Convidado - [#VOTER_ID#] (#LOGIN#) #USER_NAME# [#STAT_GUEST_ID#]
Sessгo - #SESSION_ID#
Endereco IP - #IP#
Tempo - #TEMPO
#

Para ver os resultados da votaзгo:
http:// #SERVER_NAME# /bitrix/admin/vote_user_results.php?event_id=#ID#&lang=ru


Veja o Resultado do diagrama de Ligaзгo da votaзгo de visitantes:
http:// #SERVER_NAME#/bitrix/admin/vote_results.php?lang=ru&VOTE_ID=#VOTE_ID#

Mensagem gerada automaticamente.
";
$MESS["VOTE_NEW_SUBJECT"] = "#SITE_NAME#: Nova votaзгo para \"[#VOTE_ID#] #VOTE_TITLE#\"";
$MESS["VOTE_NEW_NAME"] = "nova votaзгo";
?>