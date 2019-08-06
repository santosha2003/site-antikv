<?
$MESS["CLU_SLAVE_LIST_TITLE"] = "Bancos de Dados Escravos";
$MESS["CLU_SLAVE_LIST_ID"] = "ID";
$MESS["CLU_SLAVE_LIST_FLAG"] = "Status";
$MESS["CLU_SLAVE_NOCONNECTION"] = "desconectado";
$MESS["CLU_SLAVE_UPTIME"] = "tempo de atividade";
$MESS["CLU_SLAVE_LIST_BEHIND"] = "Lat�ncia (seg)";
$MESS["CLU_SLAVE_LIST_STATUS"] = "Status";
$MESS["CLU_SLAVE_LIST_NAME"] = "Nome";
$MESS["CLU_SLAVE_LIST_DB_HOST"] = "Servidor";
$MESS["CLU_SLAVE_LIST_DB_NAME"] = "Banco de Dados";
$MESS["CLU_SLAVE_LIST_DB_LOGIN"] = "Usu�rio";
$MESS["CLU_SLAVE_LIST_WEIGHT"] = "Carga (%)";
$MESS["CLU_SLAVE_LIST_DESCRIPTION"] = "Descri��o";
$MESS["CLU_SLAVE_LIST_ADD"] = "Adicionar Banco de Dados Escravo";
$MESS["CLU_SLAVE_LIST_ADD_TITLE"] = "Rodar wizard do novo banco de dados escravo";
$MESS["CLU_SLAVE_LIST_EDIT"] = "Editar";
$MESS["CLU_SLAVE_LIST_START_USING_DB"] = "Utilizar Banco de Dados";
$MESS["CLU_SLAVE_LIST_SKIP_SQL_ERROR"] = "Ignorar Erro";
$MESS["CLU_SLAVE_LIST_SKIP_SQL_ERROR_ALT"] = "Ignorar erro simples de SQL e continuar replica��o";
$MESS["CLU_SLAVE_LIST_DELETE"] = "Deletar";
$MESS["CLU_SLAVE_LIST_DELETE_CONF"] = "Deletar conex�o?";
$MESS["CLU_SLAVE_LIST_PAUSE"] = "Pausar";
$MESS["CLU_SLAVE_LIST_RESUME"] = "Continuar";
$MESS["CLU_SLAVE_LIST_REFRESH"] = "Atualizar";
$MESS["CLU_SLAVE_LIST_STOP"] = "N�o utilizar mais este Banco de Dados";
$MESS["CLU_SLAVE_BACKUP"] = "Backup";
$MESS["CLU_MAIN_LOAD"] = "Carga m�nima";
$MESS["CLU_SLAVE_LIST_NOTE"] = "<p>A replica��o do Banco de Dados � a cria��o e manuten��o de m�ltiplas c�pias do mesmo banco de dados, o que prov� duas principais caracter�sticas:</p>
<p>
1) distribuir a carga entre um banco de dados mestre e outros bancos de dados escravos (um ou mais);<br>
2) utilizar os escravos como standby r�pido.<br>
</p>
<p>Importante!<br>
- Utilize somente servidores solit�rios com as conectividades mais r�pidas poss�vel para as replica��es.<br>
- O processo de replica��o inicia-se pela c�pia do conte�do do banco de dados. Neste per�odo de tempo, a se��o p�blica do website n�o estar� dispon�vel, mas o Painel de Controle ainda estar� acess�vel. Quaisquer modifica��es que ocorram nos dados durante a replica��o poder�o afetar (negativamente) os resultados da opera��o no website.<br>
</p>
<p>Diretrizes de Replica��o<br>
Passo 1: Inicie o wizard clicando em \"Adicionar Banco de Dados Escravo\". O wizard ir� verificar as configura��es do servidor e sugerir� que voc� adicione um banco de dados escravo.<br>
Passo 2: Encontre o banco de dados requerido na lista e selecione o comando \"Utilizar este banco de dados\" no menu de a��es.<br>
Passo 3: Siga as instru��es do wizard.<br>
</p>
";
$MESS["CLU_SLAVE_LIST_MASTER_ADD"] = "Adicionar banco de dados mestre/escravo";
$MESS["CLU_SLAVE_LIST_MASTER_ADD_TITLE"] = "Roda o wizard do novo banco de dados mestre/escravo";
?>