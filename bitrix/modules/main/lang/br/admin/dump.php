<?
$MESS["MAIN_DUMP_FILE_CNT"] = "Arquivos compactados:";
$MESS["MAIN_DUMP_FILE_SIZE"] = "Tamanho dos arquivos:";
$MESS["MAIN_DUMP_FILE_FINISH"] = "Backup finalizado";
$MESS["MAIN_DUMP_FILE_MAX_SIZE"] = "N�o incluir arquivos nos quais o tamanho excede (0 - sem limite): �";
$MESS["MAIN_DUMP_FILE_STEP_SLEEP"] = "intervalo:";
$MESS["MAIN_DUMP_FILE_STEP_sec"] = "seg(s)";
$MESS["MAIN_DUMP_FILE_MAX_SIZE_b"] = "B";
$MESS["MAIN_DUMP_FILE_MAX_SIZE_kb"] = "kB";
$MESS["MAIN_DUMP_FILE_MAX_SIZE_mb"] = "MB";
$MESS["MAIN_DUMP_FILE_MAX_SIZE_gb"] = "GB";
$MESS["MAIN_DUMP_FILE_DUMP_BUTTON"] = "Iniciar Backup";
$MESS["MAIN_DUMP_FILE_STOP_BUTTON"] = "Parar";
$MESS["MAIN_DUMP_FILE_KERNEL"] = "Arquivos de backup do kernel:";
$MESS["MAIN_DUMP_FILE_NAME"] = "Nome do Arquivo";
$MESS["FILE_SIZE"] = "Tamanho do arquivo";
$MESS["MAIN_DUMP_FILE_TIMESTAMP"] = "Modificado";
$MESS["MAIN_DUMP_FILE_PUBLIC"] = "Backup dos arquivos p�blicos:";
$MESS["MAIN_DUMP_BASE_STAT"] = "estat�sticas";
$MESS["MAIN_DUMP_BASE_SINDEX"] = "ndice de pesquisa";
$MESS["MAIN_DUMP_BASE_SIZE"] = "Mb";
$MESS["MAIN_DUMP_PAGE_TITLE"] = "Backup";
$MESS["MAIN_DUMP_LIST_PAGE_TITLE"] = "Back-ups";
$MESS["MAIN_DUMP_AUTO_PAGE_TITLE"] = "Criar Backup Autom�tico";
$MESS["MAIN_DUMP_AUTO_BUTTON"] = "Backup Autom�tico";
$MESS["MAIN_DUMP_SITE_PROC"] = "Compactando...";
$MESS["MAIN_DUMP_ARC_SIZE"] = "Tamanho do arquivo:";
$MESS["MAIN_DUMP_TABLE_FINISH"] = "Tabelas processadas:";
$MESS["MAIN_DUMP_ACTION_DOWNLOAD"] = "Download";
$MESS["MAIN_DUMP_DELETE"] = "Excluir";
$MESS["MAIN_DUMP_ALERT_DELETE"] = "Tem certeza de que deseja excluir este arquivo?";
$MESS["MAIN_DUMP_FILE_PAGES"] = "C�pias de backup";
$MESS["MAIN_RIGHT_CONFIRM_EXECUTE"] = "Aten��o!�Descompactar a c�pia backup no site corrente pode corromper o site. Deseja continuar?";
$MESS["MAIN_DUMP_RESTORE"] = "Descompactar";
$MESS["MAIN_DUMP_MYSQL_ONLY"] = "O recurso de backup suporta apenas bancos MySQL. <br> Por favor, use uma ferramenta externa realizar o backup.";
$MESS["MAIN_DUMP_HEADER_MSG1"] = "Para mover um arquivo de backup do site para um outro servidor, copie o script de restaura��o <a href='#EXPORT#'>restore.php</a> e o arquivo para a raiz de documentos do novo servidor. Ent�o digite em seu navegador: <b>&lt;site name&gt;/restore.php</b>.";
$MESS["MAIN_DUMP_SKIP_SYMLINKS"] = "Ignorar links simb�licos para diret�rios";
$MESS["MAIN_DUMP_MASK"] = "Excluir arquivos e pastas (m�scara):";
$MESS["MAIN_DUMP_MORE"] = "Mais...";
$MESS["MAIN_DUMP_FOOTER_MASK"] = "As seguintes regras se aplicam as m�scaras de exclus�o:
 <p>
 <li>A m�scara pode conter aster�scos &quot;*&quot; que correspondem a qualquer ou nenhum caracter no arquivo ou no nome da pasta;</li>
 <li>se o caminho come�a com uma barra ou uma contrabarra (&quot;/&quot; or &quot;\\&quot;), o caminho � relativo a raiz do site;</li>
 <li>todo caso,a m�scara � aplicada para cada arquivo e cada pasta;</li>
 <p>Exemplos de modelos:</p>
 <li>/content/photo - exclui a pasta/content/photo;</li>
 <li>*.zip - exclui os arquivos ZIP(Aqueles que possuem a extens�o &quot;zip&quot;);</li>
 <li>.access.php - exclui todos os arquivos &quot;.access.php&quot;;</li>
 <li>/files/download/*.zip - exclui os arquivos ZIP em/files/download;</li>
 <li>/files/d*/*.ht* - exclui arquivos com extens�es que come�am com &quot;ht&quot; em diret�rios que come�am com &quot;/files/d&quot;.</li>";
$MESS["MAIN_DUMP_ERROR"] = "Erro";
$MESS["ERR_EMPTY_RESPONSE"] = "O servidor retornou uma resposta vazia.�Entre em contato com sua empresa de hospedagem�para revis�o do registro para a data: #DATA#";
$MESS["DUMP_NO_PERMS"] = "Permiss�o do servidor insuficiente para criar arquivos de backup.";
$MESS["DUMP_NO_PERMS_READ"] = "Erro ao abrir o arquivo de backup para a leitura.";
$MESS["DUMP_DB_CREATE"] = "Cria��o de banco de dados de despejo";
$MESS["DUMP_CUR_PATH"] = "Caminho atual:";
$MESS["INTEGRITY_CHECK"] = "Verifica��o de integridade";
$MESS["CURRENT_POS"] = "Progresso:";
$MESS["STEP_LIMIT"] = "Dura��o da Etapa:";
$MESS["DISABLE_GZIP"] = "Desativar compacta��o (reduz a carga da CPU):";
$MESS["INTEGRITY_CHECK_OPTION"] = "Verificar a integridade do backup quando conclu�do:";
$MESS["MAIN_DUMP_DB_PROC"] = "Compactando o dump do banco de dados";
$MESS["TIME_SPENT"] = "Tempo gasto:";
$MESS["TIME_H"] = "h";
$MESS["TIME_M"] = "m";
$MESS["TIME_S"] = "s";
$MESS["MAIN_DUMP_FOLDER_ERR"] = "A pasta #FOLDER# n�o tem permiss�es de grava��o.";
$MESS["MAIN_DUMP_NO_CLOUDS_MODULE"] = "O m�dulo de armazenamento em nuvem n�o est� instalado.";
$MESS["MAIN_DUMP_INT_CLOUD_ERR"] = "Erro ao inicializar o armazenamento em nuvem.�Por favor, tente novamente mais tarde. \"";
$MESS["MAIN_DUMP_ERR_FILE_SEND"] = "N�o � poss�vel carregar arquivo para armazenamento em nuvem:";
$MESS["MAIN_DUMP_ERR_OPEN_FILE"] = "N�o � poss�vel abrir arquivo para leitura:";
$MESS["MAIN_DUMP_SUCCESS_SENT"] = "Arquivo foi enviado para armazenamento em nuvem com sucesso.";
$MESS["MAIN_DUMP_SUCCESS_SAVED"] = "As modifica��es foram salvas.";
$MESS["MAIN_DUMP_SUCCESS_SAVED_DETAILS"] = "O Backup Autom�tico ser� ativado ap�s a configura��o do cron. ";
$MESS["MAIN_DUMP_AUTO_NOTE"] = "Utilize o painel de controle de hospedagem para adicionar as seguintes tarefas ao cron:  <b>#SCRIPT#</b>. Programa��o recomendada: semanal. ";
$MESS["MAIN_DUMP_CLOUDS_DOWNLOAD"] = "Baixar arquivos de armazenamento em nuvem";
$MESS["MAIN_DUMP_FILES_DOWNLOADED"] = "Arquivos enviados";
$MESS["MAIN_DUMP_FILES_SIZE"] = "Total de uploads";
$MESS["MAIN_DUMP_DOWN_ERR_CNT"] = "Arquivos ignorados";
$MESS["MAIN_DUMP_FILE_SENDING"] = "Enviando arquivo para armazenamento em nuvem";
$MESS["MAIN_DUMP_USE_THIS_LINK"] = "Usar este link ao mover o arquivo para outro servidor usando";
$MESS["MAIN_DUMP_ERR_COPY_FILE"] = "N�o � poss�vel copiar arquivo: �";
$MESS["MAIN_DUMP_ERR_INIT_CLOUD"] = "N�o � poss�vel conectar ao armazenamento em nuvem";
$MESS["MAIN_DUMP_ERR_FILE_RENAME"] = "Erro ao renomear arquivo:";
$MESS["MAIN_DUMP_ERR_NAME"] = "O nome do arquivo pode incluir apenas caracteres latinos, d�gitos, h�fens e pontos.";
$MESS["MAIN_DUMP_FILE_SIZE1"] = "Tamanho do arquivo";
$MESS["MAIN_DUMP_LOCATION"] = "Localiza��o";
$MESS["MAIN_DUMP_PARTS"] = "partes:";
$MESS["MAIN_DUMP_LOCAL"] = "armazenamento local";
$MESS["MAIN_DUMP_GET_LINK"] = "Obter link";
$MESS["MAIN_DUMP_SEND_CLOUD"] = "Enviar para armazenamento em nuvem";
$MESS["MAIN_DUMP_SEND_FILE_CLOUD"] = "Enviar o arquivo para armazenamento em nuvem";
$MESS["MAIN_DUMP_RENAME"] = "Renomear";
$MESS["MAIN_DUMP_ARC_NAME_W_O_EXT"] = "Nome do arquivo sem extens�o";
$MESS["MAIN_DUMP_ARC_NAME"] = "Nome do arquivo";
$MESS["MAIN_DUMP_ARC_LOCATION"] = "Localiza��o do arquivo: �";
$MESS["MAIN_DUMP_LOCAL_DISK"] = "disco local";
$MESS["MAIN_DUMP_EVENT_LOG"] = "Registro de evento";
$MESS["MAIN_DUMP_ENC_PASS_DESC"] = "Senha do arquivo deve incluir pelo menos 6 caracteres.";
$MESS["MAIN_DUMP_EMPTY_PASS"] = "Senha do arquivo n�o foi especificada.";
$MESS["MAIN_DUMP_NOT_INSTALLED"] = "Mcrypt para PHP n�o est� instalado.";
$MESS["MAIN_DUMP_NO_ENC_FUNCTIONS"] = "Criptografia est� indispon�vel.�Entre em contato com o administrador de sistemas.";
$MESS["MAIN_DUMP_ENABLE_ENC"] = "Criptografar arquivo de backup";
$MESS["MAIN_DUMP_ENC_PASS"] = "Senha do arquivo (pelo menos 6 caracteres):";
$MESS["MAIN_DUMP_SAVE_PASS"] = "Por favor, mantenha sua senha em seguran�a.�Voc� n�o ser� capaz de extrair o conte�do de�um arquivo se voc� perder sua senha";
$MESS["MAIN_DUMP_SAVE_PASS_AUTO"] = "A senha que voc� forneceu ser� encriptada e salva localmente. Sua chave de licen�a ser� utilizada como par�metro de criptografia. Pedimos que modifique sua senha ao menos uma vez por m�s. ";
$MESS["MAIN_DUMP_MAX_ARCHIVE_SIZE"] = "Tamanho do volume do arquivo (MB):";
$MESS["DUMP_MAIN_SESISON_ERROR"] = "Sua sess�o expirou.�Por favor, recarregue a p�gina.";
$MESS["DUMP_MAIN_ERROR"] = "Erro!";
$MESS["DUMP_MAIN_REGISTERED"] = "Registrado";
$MESS["DUMP_MAIN_EDITION"] = "Edi��o";
$MESS["DUMP_MAIN_ACTIVE_FROM"] = "Ativo desde";
$MESS["DUMP_MAIN_ACTIVE_TO"] = "Ativo at�";
$MESS["DUMP_MAIN_ERR_GET_INFO"] = "N�o � poss�vel obter informa��es importantes a partir do servidor de atualiza��o.";
$MESS["DUMP_MAIN_BITRIX_CLOUD"] = "Bitrix Nuvens";
$MESS["DUMP_MAIN_BITRIX_CLOUD_DESC"] = "Bitrix Cloud Storage";
$MESS["DUMP_MAIN_ERR_PASS_CONFIRM"] = "As senhas digitadas n�o correspondem.";
$MESS["DUMP_MAIN_PASSWORD_CONFIRM"] = "Repita a senha:";
$MESS["DUMP_MAIN_MAKE_ARC"] = "Backup";
$MESS["MAKE_DUMP_FULL"] = "Criar c�pia completa de seguran�a";
$MESS["DUMP_MAIN_PARAMETERS"] = "Par�metros";
$MESS["DUMP_MAIN_EXPERT_SETTINGS"] = "Configura��es Avan�adas";
$MESS["DUMP_MAIN_ENC_ARC"] = "Criptografar arquivo";
$MESS["DUMP_MAIN_SITE"] = "Website:";
$MESS["DUMP_MAIN_IN_THE_CLOUD"] = "na nuvem:";
$MESS["DUMP_MAIN_IN_THE_BXCLOUD"] = "na nuvem Bitrix";
$MESS["DUMP_MAIN_ENABLE_EXPERT"] = "Ativar configura��es avan�adas de backup";
$MESS["DUMP_MAIN_CHANGE_SETTINGS"] = "Modificar os par�metros avan�ados podem produzir um arquivo incompleto ou danificado impedindo assim recupera��o posterior.�Voc� deve ter uma completa�compreens�o do efeito que cada um dos par�metros ter� no resultado.";
$MESS["DUMP_MAIN_ARC_CONTENTS"] = "Conte�do do backup";
$MESS["DUMP_MAIN_DOWNLOAD_CLOUDS"] = "Fazer download de dados de nuvens e adicion�-lo ao backup:";
$MESS["DUMP_MAIN_ARC_DATABASE"] = "Adicionar banco de dados para backup";
$MESS["DUMP_MAIN_DB_EXCLUDE"] = "Excluir da base de dados:";
$MESS["DUMP_MAIN_ARC_MODE"] = "Modo do arquivo";
$MESS["DUMP_MAIN_MULTISITE"] = "Se o seu sistema tem m�ltiplos�sites com diferentes caminhos para diret�rio raiz do servidor web, tais sites�ter�o o backup realizado e restaurado individualmente.�Este � um caso especial: um�arquivo completo � criado apenas uma vez, para um dos sites; ao fazer backup de outro�sites, voc� ter� que excluir o kernel e o banco de dados usando <b>Configura��es Avan�adas</b>.�Se as c�pias de backup ir�o ent�o serem usadas�para restaurar sites em outro servidor web, voc� ter� que criar os�links simb�licos para as pastas <b>Bitrix</b> e <b>fazer o upload</b>�manualmente.";
$MESS["BCL_BACKUP_USAGE"] = "Espa�o usado: #USAGE# de #QUOTA#.";
$MESS["DUMP_BXCLOUD_NA"] = "Bitrix Cloud Storage est� indispon�vel";
$MESS["DUMP_ERR_NON_ASCII"] = "Caracteres nacionais n�o est�o permitidos na senha para evitar�problemas de restaura��o.";
$MESS["DUMP_MAIN_BXCLOUD_INFO"] = "Bitrix Inc. fornece espa�o em nuvem para tr�s c�pias de backup gratuitos�para uma licen�a ativa.�Voc� vai acessar os backups fornecendo um chave de licen�a v�lida e uma senha.�Voc� n�o ser� capaz de restaurar um site a partir de um�c�pia de backup se voc� perder sua senha.";
$MESS["MAIN_DUMP_BXCLOUD_ENC"] = "A criptografia n�o pode ser desativada para backups salvos no Bitrix Cloud Storage.";
$MESS["MAIN_DUMP_FROM"] = "a partir de";
$MESS["DUMP_ERR_BIG_BACKUP"] = "Tamanho do backup excede sua cota Nuvem Bitrix.�O arquivo foi salvo�na m�quina local.";
$MESS["DUMP_BACK"] = "Voltar";
$MESS["DUMP_RETRY"] = "Tente novamente";
$MESS["MAIN_DUMP_ERR_DELETE"] = "Voc� n�o pode excluir manualmente os arquivos armazenados em Bitrix Cloud.�Os arquivos desatualizados�ser�o substitu�dos por um novo assim que voc� criar e carregar um novo�Backup";
$MESS["ERR_NO_BX_CLOUD"] = "O m�dulo de suporte de servi�o de n�vem n�o est� instalado";
$MESS["ERR_NO_CLOUDS"] = "O m�dulo de armazenamento em nuvem n�o est� instalado.";
$MESS["DUMP_DELETE_ERROR"] = "N�o � poss�vel excluir o arquivo #FILE#";
$MESS["DUMP_MAIN_AUTO_PARAMETERS"] = "Par�metros do Script de Autoexecu��o";
$MESS["DUMP_MAIN_SAVE"] = "Salvar";
$MESS["DUMP_ADDITIONAL"] = "Par�metros Adicionais";
$MESS["DUMP_DELETE"] = "Deletar backups locais";
$MESS["DUMP_NOT_DELETE"] = "nunca";
$MESS["DUMP_CLOUD_DELETE"] = "somente se copiado com sucesso para a nuvem";
$MESS["DUMP_RM_BY_TIME"] = "em #TIME# dias desde a cria��o";
$MESS["DUMP_RM_BY_CNT"] = "somente se houve mais de #CNT# backups";
$MESS["DUMP_RM_BY_SIZE"] = "se o tamanho total exceder #SIZE# GB";
$MESS["MAIN_DUMP_SHED_CLOSEST_TIME"] = "Pr�xima execu��o programada para:";
$MESS["MAIN_DUMP_SHED_CLOSEST_TIME_TODAY"] = "A pr�xima execu��o est� programada para hoje:";
$MESS["MAIN_DUMP_SHED_CLOSEST_TIME_TOMORROW"] = "A pr�xima execu��o est� programada para amanh�:";
$MESS["MAIN_DUMP_SHED"] = "Programa��o";
$MESS["MAIN_DUMP_PERIODITY"] = "Executar:";
$MESS["MAIN_DUMP_PER_1"] = "diariamente";
$MESS["MAIN_DUMP_PER_2"] = "em dias alternados";
$MESS["MAIN_DUMP_PER_3"] = "a cada 3 dias";
$MESS["MAIN_DUMP_PER_5"] = "a cada 5 dias";
$MESS["MAIN_DUMP_PER_7"] = "semanalmente";
$MESS["MAIN_DUMP_PER_14"] = "a cada 15 dias ";
$MESS["MAIN_DUMP_PER_21"] = "a cada 3 semanas";
$MESS["MAIN_DUMP_PER_30"] = "mensalmente";
$MESS["MAIN_DUMP_DELETE_OLD"] = "Arquivos Antigos";
$MESS["MAIN_DUMP_SHED_TIME_SET"] = "Esta op��o est� dispon�vel somente se os agentes do sistema utilizarem o cron. Caso contr�rio, voc� ter� de utilizar o painel de controle dos seus provedores de hospedagem para ter o script<b>/bitrix/modules/main/tools/backup.php</b> executado quando necess�rio. ";
$MESS["MAIN_DUMP_AUTO_LOCK"] = "Backup Autom�tico Iniciado";
$MESS["MAIN_DUMP_AUTO_LOCK_TIME"] = "Tempo decorrido desde o in�cio: #TIME#";
$MESS["AUTO_LOCK_EXISTS_ERR"] = "O Backup autom�tico iniciado em #DATETIME# falhou com um erro desconhecido. Por favor, revise os logs do servidor para encontrar a raz�o do erro. ";
$MESS["AUTO_EXEC_METHOD"] = "Executar:";
$MESS["AUTO_EXEC_FROM_BITRIX"] = "usando servi�o de nuvem Bitrix";
$MESS["AUTO_EXEC_FROM_CRON"] = "como agente usando cron";
$MESS["AUTO_EXEC_FROM_MAN"] = "chamando #SCRIPT# diretamente";
$MESS["AUTO_URL"] = "URL do site";
$MESS["DUMP_AUTO_TAB"] = "Autorun";
$MESS["MAIN_DUMP_AUTO_WARN"] = "Habilitar <a href=\"#LINK#\"> backup autom�tico </ a> para ter a c�pia mais recente dos seus dados para recupera��o.";
$MESS["DUMP_LOCAL_TIME"] = "(Hor�rio do servidor local)";
$MESS["DUMP_CHECK_BITRIXCLOUD"] = "Verifique o status da tarefa atual no <a href=\"#LINK#\"> servi�o de nuvem Bitrix</ a>";
$MESS["DUMP_WARN_NO_BITRIXCLOUD"] = "N�o � poss�vel ativar o backup autom�tico.�Por favor, instale o m�dulo de suporte de servi�os de nuvem ou usar o cron para executar os agentes.";
$MESS["DUMP_SAVED_DISABLED"] = "Backup autom�tico est� desativado. <br> Backups s� podem ser criados executando /bitrix/modules/main/tools/backup.php manualmente.";
$MESS["DUMP_AUTO_INFO_OFF"] = "Backup autom�tico est� desativado";
$MESS["DUMP_AUTO_INFO_ON"] = "Backup autom�tico est� habilitado";
$MESS["DUMP_BTN_AUTO_DISABLE"] = "Desativar o backup autom�tico";
$MESS["DUMP_BTN_AUTO_ENABLE"] = "Habilitar backup autom�tico";
$MESS["DUMP_AUTO_INFO_TEXT"] = "<b>Backup autom�tico</b>

Fa�a com que o recurso de backup autom�tico crie a c�pia mais recente de seus dados para voc� para recupera��o em caso de falha de hardware ou software.

Bitrix Cloud Monitor ir� criar c�pias de seguran�a ao navegar para uma URL especial em seu site na hora marcada.�A URL inclui um ID secreto que permite um visitante a criar a c�pia de seguran�a, mas n�o acess�-lo. Nenhum acesso ao Painel de Conrol do seu site � necess�rio e pode ser bloqueado por IP.

Por padr�o, a c�pia de backup � salva no Bitrix Cloud de forma criptografada em v�rios locais.�Esta � a maneira mais segura de preservar seus dados.

Se os servi�os Bitrix Cloud estiverem inacess�veis, mas os agentes est�o programados usando cron, a c�pia de backup ser� criada localmente.";
$MESS["MAIN_DUMP_SHED_ENABLE"] = "Executar processos de backup utilizando agentes no tempo especificado";
$MESS["MAIN_DUMP_HEADER_MSG"] = "Para mover o arquivo de backup do site para outro servidor, copie o script de <arestore.php href='#EXPORT#'>restaura��o</a> e o arquivo para a raiz do documento do novo servidor. Ent�o, digite no seu navegador: <b>&lt;nome do site&gt;/restore.php</b>.";
$MESS["DUMP_MAIN_CONSOLE_INFO"] = "Para automatizar backups, use o painel de controle de seu provedor de hospedagem para adicionar o trabalho cron: <b>php#PATH#</b>. Backups semanais s�o recomendados.";
?>