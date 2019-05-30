<?
$MESS["VULNSCAN_SIMILAR"] = "Semelhante";
$MESS["VULNSCAN_REQUIRE"] = "Condi��es necess�rias";
$MESS["VULNSCAN_FILE"] = "Arquivo";
$MESS["VULNSCAN_XSS_NAME"] = "Cross-Site Scripting";
$MESS["VULNSCAN_XSS_HELP"] = "Um ataque pode executar c�digo HTML/JS malicioso arbitr�rio no contexto do navegador da v�tima. � recomendado que voc� filtre as vari�veis antes da sa�da para HTML/JS.<br>Leia mais: <a href=\"https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)\">https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)</a>";
$MESS["VULNSCAN_XSS_HELP_SAFE"] = "Usar <b>htmlspecialcharsbx</ b>. Atribui��o de etiquetas sempre entre aspas duplas. For�a o protocolo especificador (http) no href e src atribui valores quando necess�rio.";
$MESS["VULNSCAN_HEADER_NAME"] = "Divis�o de resposta HTTP";
$MESS["VULNSCAN_HEADER_HELP"] = "Um ataque pode usar resposta HTTP�inje��o de cabe�alho para executar o redirecionamento ou inserir o c�digo HTML/JS malicioso.�Recomenda-se filtrar as novas linhas antes da sa�da para o�header de resposta.�Real para PHP anteriores ao 5.4.�Leia mais: <a href=\"http://www.infosecwriters.com/text_resources/pdf/HTTP_Response.pdf\">http://www.infosecwriters.com/text_resources/pdf/HTTP_Response.pdf</a>";
$MESS["VULNSCAN_HEADER_HELP_SAFE"] = "Novas linhas s�o recomendadas a serem filtradas antes de adicionar texto para o cabe�alho.";
$MESS["VULNSCAN_DATABASE_NAME"] = "SQL Injection";
$MESS["VULNSCAN_DATABASE_HELP"] = "Um ataque pode injetar comandos SQL arbitr�rios para a consulta, o que �extremamente perigoso.�� recomendado que voc� filtre os dados do usu�rio antes�de realmente envi�-los para o servidor.�Leia mais: <ahref=\"https://www.owasp.org/index.php/SQL_Injection\">https://www.owasp.org/index.php/SQL_Injection</a>";
$MESS["VULNSCAN_DATABASE_HELP_SAFE"] = "Usar convers�es de tipo expl�citas para dados num�ricos (int, float, etc.) Use mysql_escape_string, \$ DB-> ForSQL () e rotinas semelhantes para dados de seq��ncia. Controle do comprimento de dados.";
$MESS["VULNSCAN_INCLUDE_NAME"] = "Inclus�o de arquivos";
$MESS["VULNSCAN_INCLUDE_HELP"] = "Um ataque pode montar arquivos locais e/ou remotos, ou ler arquivos do site.�� recomendado que voc� canonicalize caminhos em dados do usu�rio antes de us�-los.�Leia mais: <a�href = \"https://rdot.org/forum/showthread.php?t=343\"> https://rdot.org/forum/showthread.php?t=343 </a>";
$MESS["VULNSCAN_INCLUDE_HELP_SAFE"] = "Normalizar os caminhos antes de us�-los.";
$MESS["VULNSCAN_EXEC_NAME"] = "Execu��o de comandos arbitr�rios";
$MESS["VULNSCAN_EXEC_HELP"] = "Um ataque pode injetar e executar c�digo ou comandos arbitr�rios. � extremamente perigoso. Leia mais: <a href=\"https://www.owasp.org/index.php/Code_Injection\">https://www.owasp.org/index.php/Code_Injection</a>";
$MESS["VULNSCAN_EXEC_HELP_SAFE"] = "Verificar se os valores das vari�veis s�o v�lidos e no intervalo permitido.�Por�exemplo, voc� pode querer rejeitar caracteres nacionais e de pontua��o.�A�faixa permitida � definida pelos requisitos do projeto.�Use e escapeshellcmd�e escapeshellarg por seguran�a.";
$MESS["VULNSCAN_CODE_NAME"] = "Execu��o de c�digo arbitr�rio";
$MESS["VULNSCAN_CODE_HELP"] = "Um ataque pode injetar e executar c�digo PHP arbitr�rio.�Leia mais: <a�href=\"http://cwe.mitre.org/data/definitions/78.html\">http://cwe.mitre.org/data/definitions/78.html</a>";
$MESS["VULNSCAN_CODE_HELP_SAFE"] = "Filtrar entrada do usu�rio usando <b>EscapePHPString</b>.";
$MESS["VULNSCAN_POP_NAME"] = "Serializa��o de dados";
$MESS["VULNSCAN_POP_HELP"] = "Desserializa��o de dados do usu�rio pode tornar-se uma vulnerabilidade s�ria. Leia mais: <a href=\"https://rdot.org/forum/showthread.php?t=950\"> https://rdot.org/forum/showthread.php?t=950 </ a>";
$MESS["VULNSCAN_OTHER_NAME"] = "Altera��o potencial de l�gica do sistema";
$MESS["VULNSCAN_OTHER_HELP"] = "Nenhuma descri��o.";
$MESS["VULNSCAN_UNKNOWN"] = "Vulnerabilidade potencial";
$MESS["VULNSCAN_UNKNOWN_HELP"] = "Nenhuma descri��o.";
$MESS["VULNSCAN_HELP_INPUT"] = "Fonte";
$MESS["VULNSCAN_HELP_FUNCTION"] = "Fun��o/M�todo";
$MESS["VULNSCAN_HELP_VULNTYPE"] = "Tipo de vulnerabilidade";
$MESS["VULNSCAN_HELP_SAFE"] = "Esteja Seguro!";
$MESS["VULNSCAN_FIULECHECKED"] = "Arquivos verificados:";
$MESS["VULNSCAN_VULNCOUNTS"] = "Poss�veis problemas encontrados: �";
$MESS["VULNSCAN_DYNAMIC_FUNCTION"] = "Chamada de fun��o din�mica!";
$MESS["VULNSCAN_EXTRACT"] = "Vari�veis previamente inicializados podem ser substitu�das!";
$MESS["VULNSCAN_TOKENIZER_NOT_INSTALLED"] = "PHP tokenizer n�o est� habilitado.�Ative-o para completar o teste.";
?>