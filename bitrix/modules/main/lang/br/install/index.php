<?
$MESS["MAIN_ADMIN_GROUP_NAME"] = "Administradores";
$MESS["MAIN_ADMIN_GROUP_DESC"] = "Acesso total.";
$MESS["MAIN_EVERYONE_GROUP_NAME"] = "Todos os usu�rios (com usu�rios n�o-autorizados)";
$MESS["MAIN_EVERYONE_GROUP_DESC"] = "Todos os usu�rios (incluindo usu�rios n�o-autorizados).";
$MESS["MAIN_VOTE_RATING_GROUP_NAME"] = "Usu�rios autorizados a votar para a classifica��o";
$MESS["MAIN_VOTE_RATING_GROUP_DESC"] = "A associa��o para este grupo de usu�rios � gerenciada automaticamente.";
$MESS["MAIN_VOTE_AUTHORITY_GROUP_NAME"] = "Usu�rios autorizados a votar por autoridade";
$MESS["MAIN_VOTE_AUTHORITY_GROUP_DESC"] = "A associa��o para este grupo de usu�rios � gerenciada automaticamente.";
$MESS["MAIN_RULE_ADD_GROUP_AUTHORITY_NAME"] = "Inscreva-se no grupo de usu�rios autorizados a votar pela autoridade";
$MESS["MAIN_RULE_ADD_GROUP_RATING_NAME"] = "Inscreva-se no grupo de usu�rios autorizados a votar para a avalia��o";
$MESS["MAIN_RULE_REM_GROUP_AUTHORITY_NAME"] = "Remover do grupo usu�rios n�o autorizados a votar pela autoridade";
$MESS["MAIN_RULE_REM_GROUP_RATING_NAME"] = "Remover do grupo usu�rios n�o autorizados a votar pela classifica��o";
$MESS["MAIN_RATING_NAME"] = "Avalia��o";
$MESS["MAIN_RATING_AUTHORITY_NAME"] = "Autoridade";
$MESS["MAIN_RATING_TEXT_LIKE_Y"] = "Curtir";
$MESS["MAIN_RATING_TEXT_LIKE_N"] = "Ao contr�rio";
$MESS["MAIN_RATING_TEXT_LIKE_D"] = "Curtir";
$MESS["MAIN_DEFAULT_SITE_NAME"] = "Site padr�o";
$MESS["MAIN_DEFAULT_LANGUAGE_NAME"] = "Ingl�s";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_DATE"] = "DD/MM/AAAA";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_DATETIME"] = "DD/MM/AAAA H:MI T";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_NAME"] = "#NAME# #LAST_NAME#";
$MESS["MAIN_DEFAULT_LANGUAGE_FORMAT_CHARSET"] = "iso-8859-1";
$MESS["MAIN_DEFAULT_SITE_FORMAT_DATE"] = "DD/MM/AAAA";
$MESS["MAIN_DEFAULT_SITE_FORMAT_DATETIME"] = "DD/MM/AAAA H:MI T";
$MESS["MAIN_DEFAULT_SITE_FORMAT_NAME"] = "#NAME# #LAST_NAME#";
$MESS["MAIN_DEFAULT_SITE_FORMAT_CHARSET"] = "iso-8859-1";
$MESS["MAIN_MODULE_NAME"] = "M�dulo principal";
$MESS["MAIN_MODULE_DESC"] = "O kernel do produto";
$MESS["MAIN_INSTALL_DB_ERROR"] = "N�o � poss�vel conectar ao banco de dados.�Por favor, verifique os par�metros.";
$MESS["MAIN_NEW_USER_TYPE_NAME"] = "Novo usu�rio foi registrado";
$MESS["MAIN_NEW_USER_TYPE_DESC"] = "

#USER_ID# - ID de usu�rio
#LOGIN# - Login
#EMAIL# - EMail
#NAME# - Nome
#LAST_NAME# - Sobrenome
#USER_IP# - IP do usu�rio
#USER_HOST# - H�spede do usu�rio
";
$MESS["MAIN_USER_INFO_TYPE_NAME"] = "Informa��es da Conta";
$MESS["MAIN_USER_INFO_TYPE_DESC"] = "

#USER_ID# - ID do usu�rio
#STATUS# - Status da conta
#MESSAGE# - Mensagem para o usu�rio
#LOGIN# - Login
#CHECKWORD# - Verificar string para mudan�a de senha
#NAME# - Nome
#LAST_NAME# - Sobrenome
#EMAIL# - E-Mail do usu�rio
";
$MESS["MAIN_NEW_USER_CONFIRM_TYPE_NAME"] = "Confirma��o de cadastro de novo usu�rio";
$MESS["MAIN_NEW_USER_CONFIRM_TYPE_DESC"] = "

#USER_ID# - ID de usu�rio
#LOGIN# - Login
#EMAIL# - E-mail
#NAME# - Nome
#LAST_NAME# - Sobrenome
#USER_IP# - IP do usu�rio
#USER_HOST# - H�spede do usu�rio
#CONFIRM_CODE# - C�digo de confirma��o
";
$MESS["MAIN_USER_INVITE_TYPE_NAME"] = "Convite de um novo usu�rio do site";
$MESS["MAIN_USER_INVITE_TYPE_DESC"] = "#ID# - ID de usu�rio
#LOGIN# - Login
#URL_LOGIN# - Login codificado para uso na URL
#EMAIL# - EMail
#NAME# - Nome
#LAST_NAME# - Sobrenome
#PASSWORD# - Senha do usu�rio
#CHECKWORD# - String de verifica��o de senha
#XML_ID# - ID do usu�rio para conectar a fontes de dados externos

";
$MESS["MAIN_NEW_USER_EVENT_NAME"] = "#SITE_NAME#: Novo usu�rio foi registrado no site";
$MESS["MAIN_NEW_USER_EVENT_DESC"] = "Mensagem informativa de #SITE_NAME#
---------------------------------------

Novo usu�rio foi registrado com sucesso no site #SERVER_NAME#.

Detalhes de usu�rio:
ID de usu�rio: #USER_ID#

Nome: #NAME#
Sobrenome: #LAST_NAME#
E-mail do usu�rio: #EMAIL#

Login: #LOGIN#

Mensagem gerada automaticamente.";
$MESS["MAIN_USER_INFO_EVENT_NAME"] = "#SITE_NAME#:: informa��o de registo";
$MESS["MAIN_USER_INFO_EVENT_DESC"] = "Mensagem informativa de #SITE_NAME#
---------------------------------------

#NAME# #LAST_NAME#,

#MESSAGE#

Sua informa��o de registro:

ID de usu�rio: #USER_ID#
Status da conta: #STATUS#
Login: #LOGIN#

Para mudar sua senha visite o link abaixo:
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=en&USER_CHECKWORD=#CHECKWORD#

Mensagem gerada automaticamente.";
$MESS["MAIN_USER_PASS_REQUEST_EVENT_DESC"] = "Mensagem informativa de #SITE_NAME#
---------------------------------------

#NAME# #LAST_NAME#,

#MESSAGE#

Para mudar sua senha por favor visite o link abaixo:
http://#SERVER_NAME#/auth/index.php?change_password=yes&lang=en&USER_CHECKWORD=#CHECKWORD#

Sua informa��o de registro:

ID de usu�rio: #USER_ID#
Status da conta: #STATUS#
Login: #LOGIN#

Mensagem gerada automaticamente.";
$MESS["MAIN_USER_PASS_CHANGED_EVENT_DESC"] = "Mensagem informativa�SITE_NAME # #";
$MESS["MAIN_NEW_USER_CONFIRM_EVENT_NAME"] = "#SITE_NAME#: confirma��o de inscri��o de novo usu�rio";
$MESS["MAIN_NEW_USER_CONFIRM_EVENT_DESC"] = "Sauda��es de #SITE_NAME#!
------------------------------------------

Ol�,

voc� recebeu esta mensagem pois voc� (ou algu�m) usou seu e-mail para registrar-se em #SERVER_NAME#.

Seu c�digo de confirma��o de registro: #CONFIRM_CODE#

Por favor use o link abaixo para verificar e ativar seu registro:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#&confirm_code=#CONFIRM_CODE#

Alternativamente, abra este link em seu navegador e entre com o c�digo manualmente:
http://#SERVER_NAME#/auth/index.php?confirm_registration=yes&confirm_user_id=#USER_ID#

Aten��o! Sua conta n�o ser� ativada at� que voc� confirme seu registro.

---------------------------------------------------------------------

Mensagem gerada automaticamente.";
$MESS["MAIN_USER_INVITE_EVENT_NAME"] = "#SITE_NAME#: Convite para o site";
$MESS["MAIN_USER_INVITE_EVENT_DESC"] = "Mensagem informativa do site #SITE_NAME#
------------------------------------------
Ol� #NAME# #LAST_NAME#!

O administrador adicionou voc� aos usu�rios registrados do site.

N�s convidamos voc� a visitar nosso site.

Sua informa��o de registro:

ID de usu�rio: #ID#
Login: #LOGIN#

Recomendamos que voc� mude a senha gerada automaticamente.

Para mudar a senha por favor siga o link:
http://#SERVER_NAME#/auth.php?change_password=yes&USER_LOGIN=#URL_LOGIN#&USER_CHECKWORD=#CHECKWORD#";
$MESS["MF_EVENT_NAME"] = "Enviando uma mensagem utilizando um formul�rio de feedback";
$MESS["MF_EVENT_DESCRIPTION"] = "#AUTHOR# - Autor da mensagem
#AUTHOR_EMAIL# - Endere�o de email do autor
#TEXT# - Texto da mensagem
#EMAIL_FROM# - Endere�o de email do remetente
#EMAIL_TO# - Endere�o de email do destinat�rio";
$MESS["MF_EVENT_SUBJECT"] = "#SITE_NAME#: Uma mensagem de formul�rio de feedback";
$MESS["MF_EVENT_MESSAGE"] = "Notifica��o de #SITE_NAME#
------------------------------------------

Uma mensagem lhe foi enviada a partir do formul�rio de feedback.

Enviada por: #AUTHOR#
E-mail do remetente: #AUTHOR_EMAIL#

Texto da mensagem:
#TEXT#

Esta notifica��o foi gerada automaticamente.";
$MESS["MAIN_USER_PASS_REQUEST_TYPE_NAME"] = "Pedido de Altera��o de Senha";
$MESS["MAIN_USER_PASS_CHANGED_TYPE_NAME"] = "Confirma��o de altera��o de senha";
$MESS["MAIN_USER_PASS_REQUEST_EVENT_NAME"] = "#SITE_NAME#: Pedido de Altera��o de Senha";
$MESS["MAIN_USER_PASS_CHANGED_EVENT_NAME"] = "#SITE_NAME#:: Confirma��o de Altera��o de Senha";
$MESS["MAIN_DESKTOP_CREATEDBY_KEY"] = "Criado por";
$MESS["MAIN_DESKTOP_CREATEDBY_VALUE"] = "Bitrix, Inc. �";
$MESS["MAIN_DESKTOP_URL_KEY"] = "URL do site";
$MESS["MAIN_DESKTOP_URL_VALUE"] = "<a href=\"http://www.bitrixsoft.com\">www.bitrixsoft.com</a>";
$MESS["MAIN_DESKTOP_PRODUCTION_KEY"] = "Lan�ado em";
$MESS["MAIN_DESKTOP_PRODUCTION_VALUE"] = "12.12.2011";
$MESS["MAIN_DESKTOP_RESPONSIBLE_KEY"] = "Administrador";
$MESS["MAIN_DESKTOP_RESPONSIBLE_VALUE"] = "John Doe";
$MESS["MAIN_DESKTOP_EMAIL_KEY"] = "E-mail";
$MESS["MAIN_DESKTOP_EMAIL_VALUE"] = "<a href=\"mailto:info@bitrixsoft.com\">info@bitrixsoft.com</a>";
$MESS["MAIN_DESKTOP_INFO_TITLE"] = "Informa��es do site";
$MESS["MAIN_DESKTOP_RSS_TITLE"] = "Bitrix Not�cias";
$MESS["MAIN_RULE_AUTO_AUTHORITY_VOTE_NAME"] = "Autovoto para a autoridade do usu�rio";
$MESS["MAIN_SMILE_DEF_SET_NAME"] = "Conjunto padr�o";
?>