<?
$MESS["VOTE_FOR_NAME"] = "Novo voto";
$MESS["VOTE_FOR_DESC"] = "#ID# - ID do resultado da vota��o
#TIME# - Tempo de vota��o
#VOTE_TITLE# - Nome da vota��o
#VOTE_DESCRIPTION# - Descri��o da vota��o
#VOTE_ID# - ID da vota��o
#CHANNEL# - Nome do grupo de vota��o
#CHANNEL_ID# - ID do grupo de vota��o
#VOTER_ID# - ID dos usu�rios votantes
#USER_NAME# - Nome completo do usu�rio
#LOGIN# - login
#USER_ID# - ID de usu�rio
#STAT_GUEST_ID# - ID de visitante no m�dulo de an�lise da web
#SESSION_ID# - ID da sess�o no m�dulo de an�lise da web
#IP# - Endere�o IP 
#VOTE_STATISTIC# -Estat�sticas resumidas deste tipo de vota��o ( - Pergunta- Resposta)
#URL# - URL da vota��o";
$MESS["VOTE_FOR_SUBJECT"] = "#SITE_NAME#: [V] #VOTE_TITLE#";
$MESS["VOTE_FOR_MESSAGE"] = "#USER_NAME# votou na enquete \"#VOTE_TITLE#\":
#VOTE_STATISTIC#

http://#SERVER_NAME##URL#
Mensagem gerada automaticamente.";
$MESS["VOTE_NEW_DESC"] = "#ID# - ID do resultado da vota��o
#TIME# - Tempo de vota��o
#VOTE_TITLE# - Nome da vota��o
#VOTE_DESCRIPTION# - Descri��o da vota��o
#VOTE_ID# - ID da vota��o
#CHANNEL# - Nome do grupo de vota��o
#CHANNEL_ID# - ID do grupo de vota��o
#VOTER_ID# - ID dos usu�rios votantes
#USER_NAME# - Nome completo do usu�rio
#LOGIN# - login
#USER_ID# - ID de usu�rio
#STAT_GUEST_ID# - ID de visitante no m�dulo de an�lise da web
#SESSION_ID# - ID da sess�o no m�dulo de an�lise da web
#IP# - Endere�o IP 
#VOTE_STATISTIC# -Estat�sticas resumidas deste tipo de vota��o ( - Pergunta- Resposta)
#URL# - URL da vota��o

";
$MESS["VOTE_NEW_MESSAGE"] = "Nova vota��o

Votar - [# #VOTE_ID#] #VOTE_TITLE#
Grupo - [#CHANNEL_ID#] #CHANNEL#

-------------------------------------------------- ------------

Convidado - [#VOTER_ID#] (#LOGIN#) #USER_NAME# [#STAT_GUEST_ID#]
Sess�o - #SESSION_ID#
Endereco IP - #IP#
Tempo - #TEMPO
#

Para ver os resultados da vota��o:
http:// #SERVER_NAME# /bitrix/admin/vote_user_results.php?event_id=#ID#&lang=ru


Veja o Resultado do diagrama de Liga��o da vota��o de visitantes:
http:// #SERVER_NAME#/bitrix/admin/vote_results.php?lang=ru&VOTE_ID=#VOTE_ID#

Mensagem gerada automaticamente.
";
$MESS["VOTE_NEW_SUBJECT"] = "#SITE_NAME#: Nova vota��o para \"[#VOTE_ID#] #VOTE_TITLE#\"";
$MESS["VOTE_NEW_NAME"] = "nova vota��o";
?>