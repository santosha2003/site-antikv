<?
$MESS["VIRUS_DETECTED_NAME"] = "V�rus detectado";
$MESS["VIRUS_DETECTED_DESC"] = "#EMAIL# - endere�o do administrador do site de e-mail (a partir das configura��es do m�dulo do kernel)";
$MESS["VIRUS_DETECTED_SUBJECT"] = "#SITE_NAME#: V�rus detectado";
$MESS["VIRUS_DETECTED_MESSAGE"] = "Mensagem informativa de #SITE_NAME# 

------------------------------------------ 

Voc� recebeu esta mensagem como um resultado da detec��o de c�digo potencialmente perigoso pelo sistema de prote��o pr�-ativa de #SERVER_NAME#. 

1. O c�digo potencialmente perigoso foi cortado do html. 
2. Verifique o log de eventos e certifique-se de que o c�digo � realmente prejudicial, e n�o � simplesmente um contador ou quadro. 
(Link:http://#SERVER_NAME#/bitrix/admin/event_log.php?lang=en&set_filter=Y&find_type=audit_type_id&find_audit_type[]=SECURITY_VIRUS) 
3. Se o c�digo n�o � prejudicial, adicion�-lo � lista das \"exce��es\" na p�gina de configura��es de antiv�rus. 
(Link: http://#SERVER_NAME#/bitrix/admin/security_antivirus.php?lang=en&tabControl_active_tab=exceptions )) 
4. Se o c�digo for um v�rus, ent�o siga os seguintes passos: 

a) Altere a senha de login para o administrador e outros usu�rios respons�veis para o site. 
b) Alterae a senha de login para ssh e ftp. 
c) Testar e remover v�rus de computadores de administradores que possuem acesso ao site atrav�s de SSH ou FTP. 
d) Desligue o salvamento de senha em programas que permitem o acesso ao site atrav�s de SSH ou FTP. 
e) Excluir o c�digo nocivo dos arquivos infectados. Por exemplo, re-instalar os arquivos infectados usando o backup mais recente. 

--------------------------------------------------------------------- 
Esta mensagem foi gerada automaticamente....";
?>