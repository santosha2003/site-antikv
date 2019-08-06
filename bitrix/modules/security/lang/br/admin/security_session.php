<?
$MESS["SEC_SESSION_ADMIN_SAVEDB_TAB"] = "Sess�es em banco de dados";
$MESS["SEC_SESSION_ADMIN_SAVEDB_TAB_TITLE"] = "Configurar o armazenamento de dados da sess�o no banco de dados";
$MESS["SEC_SESSION_ADMIN_TITLE"] = "Prote��o da sess�o";
$MESS["SEC_SESSION_ADMIN_DB_ON"] = "Os dados da sess�o s�o armazenados no banco de dados do m�dulo de seguran�a.";
$MESS["SEC_SESSION_ADMIN_DB_OFF"] = "Os dados da sess�o n�o s�o armazenados no banco de dados do m�dulo de seguran�a.";
$MESS["SEC_SESSION_ADMIN_DB_BUTTON_OFF"] = "N�o armazenar dados da sess�o no banco de dados do M�dulo de Seguran�a";
$MESS["SEC_SESSION_ADMIN_DB_BUTTON_ON"] = "Armazenar dados da sess�o no banco de dados do M�dulo de Seguran�a";
$MESS["SEC_SESSION_ADMIN_DB_NOTE"] = "<p>A maioria dos ataques de roubos de dados de us�rio autorizado. 
Permitindo o <b>prote��o da sess�o </b> torna o session hijacking in�til. </p>
<p> Al�m das op��es de sess�o padr�o de prote��o que voc� pode definir nas prefer�ncias de grupos de usu�rios, a prote��o proativa da sess�o <b> </b>:
<ul style='font-size:100%'>
<li> muda o ID da sess�o periodicamente, e a freq��ncia pode ser definida; </li>
<li> armazena os dados de sess�o na tabela do m�dulo. </li>
</ul>
<p> Armazenar os dados da sess�o no banco de dados do m�dulo de dados ,impede o roubo de dados por scripts rodando em outros servidores virtuais, o que elimina os erros de configura��o de hospedagem virtual, configura��es defeituosas de permiss�o de acesso � pasta tempor�ria e outros problemas relacionados com o sistema operacional. Ele tamb�m reduz o estresse do sistema de arquivos, transferindo as opera��es para o servidor de banco de dados. </p>
<p> <i> Recomendado para n�vel alto. </i> </p> ";
$MESS["SEC_SESSION_ADMIN_SESSID_TAB"] = "Mudan�a de ID";
$MESS["SEC_SESSION_ADMIN_SESSID_TAB_TITLE"] = "Configurar a troca peri�dica de ID da sess�o";
$MESS["SEC_SESSION_ADMIN_SESSID_ON"] = "A troca do ID da sess�o n�o est� habilitada.";
$MESS["SEC_SESSION_ADMIN_SESSID_OFF"] = "A troca do ID da sess�o n�o est� desabilitada.";
$MESS["SEC_SESSION_ADMIN_SESSID_BUTTON_OFF"] = "Desativar a mudan�a de ID";
$MESS["SEC_SESSION_ADMIN_SESSID_BUTTON_ON"] = "N�o a permitir a mudan�a do ID";
$MESS["SEC_SESSION_ADMIN_SESSID_TTL"] = "A dura��o do ID da sess�o,sec.";
$MESS["SEC_SESSION_ADMIN_SESSID_NOTE"] = "<p> Se este recurso estiver ativo, o ID da sess�o vai mudar ap�s o per�odo de tempo especificado. Isso aumenta a carga do servidor, mas, obviamente, faz o roubo de ID sem uso instant�neo absolutamente sem sentido. </p>
<p> <i> Recomendado para n�vel alto. </i> </p> ";
$MESS["SEC_SESSION_ADMIN_DB_WARNING"] = "Aten��o! Alternar/desligar o modo de sess�o ir� causar aos usu�rios autorizados a perda de autoriza��o (os dados da sess�o ser�o destru�dos).";
$MESS["SEC_SESSION_ADMIN_SESSID_WARNING"] = "ID da sess�o n�o � compat�vel com o m�dulo de prote��o pr�-ativo. O identificador retornou que a fun��o session_id () n�o deve ter mais de 32 caracteres e deve conter apenas letras latinas ou n�meros.";
?>