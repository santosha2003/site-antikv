<?
$MESS["MCACHE_TITLE"] = "Configura��es de cache";
$MESS["MAIN_OPTION_HTML_CACHE"] = "Gera��o de p�gina HTML";
$MESS["MAIN_TAB_3"] = "Excluir arquivos de cache";
$MESS["MAIN_TAB_2"] = "Cache de HTML";
$MESS["MAIN_TAB_4"] = "Cache do componente";
$MESS["MAIN_OPTION_CLEAR_CACHE"] = "Excluir arquivos de cache";
$MESS["MAIN_OPTION_PUBL"] = "Configura��es de cache do componente";
$MESS["MAIN_OPTION_CLEAR_CACHE_OLD"] = "Apenas desatualizado";
$MESS["MAIN_OPTION_CLEAR_CACHE_ALL"] = "Todos";
$MESS["MAIN_OPTION_CLEAR_CACHE_MENU"] = "Menu";
$MESS["MAIN_OPTION_CLEAR_CACHE_MANAGED"] = "Todo o cache gerenciado";
$MESS["MAIN_OPTION_CLEAR_CACHE_STATIC"] = "Todas as p�ginas em cache HTML";
$MESS["MAIN_OPTION_CLEAR_CACHE_CLEAR"] = "Limpar";
$MESS["MAIN_OPTION_CACHE_ON"] = "Cache dos componentes est�o ativados por padr�o";
$MESS["MAIN_OPTION_CACHE_OFF"] = "Cache dos componentes est�o desativados por padr�o";
$MESS["MAIN_OPTION_CACHE_BUTTON_OFF"] = "Desativar cache";
$MESS["MAIN_OPTION_CACHE_BUTTON_ON"] = "Ativar cache";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING"] = "Aten��o!�Os m�dulos de estat�sticas e/ou de publicidade foram detectados.�Os dados�no cache HTML ser�o monitorados de forma incorreta.";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING_TRANSID"] = "Aten��o! �Par�metro session.use_trans_sid est� ativado.�Cache HTML�n�o funcionar�.";
$MESS["MAIN_OPTION_HTML_CACHE_ON"] = "Cache de HTML est� ligado";
$MESS["MAIN_OPTION_HTML_CACHE_OFF"] = "Cache de HTML est� desligado";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_OFF"] = "Desativar cache HTML";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_ON"] = "Ativar cache HTML";
$MESS["MAIN_OPTION_HTML_CACHE_OPT"] = "Configura��es de cache de HTML";
$MESS["MAIN_OPTION_HTML_CACHE_INC_MASK"] = "M�scara de inclus�o";
$MESS["MAIN_OPTION_HTML_CACHE_EXC_MASK"] = "M�scara de exclus�o";
$MESS["MAIN_OPTION_HTML_CACHE_QUOTA"] = "Cota de disco (MB)";
$MESS["MAIN_OPTION_HTML_CACHE_SUCCESS"] = "O modo de cache HTML foi alterado com sucesso.";
$MESS["MAIN_OPTION_HTML_CACHE_STAT"] = "Estat�sticas";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_HITS"] = "Acessos ao cache";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_MISSES"] = "Erros ao cache";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_QUOTA"] = "Limpezas de cache causadas pela falta de espa�o em disco";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_POSTS"] = "Limpezas de cache causadas por modifica��o de dados";
$MESS["MAIN_OPTION_HTML_CACHE_SAVE"] = "Salvar as configura��es de cache HTML";
$MESS["MAIN_OPTION_HTML_CACHE_RESET"] = "Aplicar configura��es padr�o";
$MESS["cache_admin_note4"] = "<p>Cache de HTML � recomendado para uma se��o do site que raramente sofre altera��es e que s�o mais comumente visitados por usu�rios an�nimos. Os seguintes processos acontecem quando o cahce de HTML est� habilitado: </p>
<ul style=\"font-size:100%\">
<li>O cache de HTML processa somente p�ginas listadas na m�scara de inclus�o e n�o listadas na m�sacara de exclus�o;</li>
<li>Para vistantes n�o autorizados, o sisema verifica se a c�pia da p�gina est� armazenada no cache HTML. Se a p�gina � encontrada no cache, ela � exibida sem m�dulos de sistema inclu�dos. As estat�ticas n�o restrear�o visitantes. Publicidade, Kernel e outros m�dulos tamb�m n�o estar�o inclusos;</li>
<li>As p�ginas ser�o enviadas comprimidas se o m�dulo de compress�o est� instalado nom momento de gera��o do cache;</li>
<li>Se nenhum cache � encontrado para a p�gina, ela � processada normalmente. Ap�s terminar de carregar a p�gina, uma c�pia da p�gina ser� salva no cache de HTML;</li>
</ul>
<p>Limpeza de cache:</p>
<ul style=\"font-size:100%\">
<li>Se salvar dados ocasionar em exceder a cota do disco, o cache ser� completamente despejado;</li>
<li>O despejo completo do cache tamb�m pe realizado se qualquer dado � alterado pelo Painel de Controle.;</li>
<li>Se um dado � postado de p�ginas p�blicas do site (como ao adicionar coment�rios ou votos), ent�o apenas partes relacionadas do cache ser�o despejadas;</li>
</ul>
<p>Por favor observe que quando usu�rios n�o autorizados visitam p�ginas do site sem cache, a sess�o ser� iniciada e o cache de HTML n�o estar� mais ativo.</p>
<p>Observa��es importantes:</p>
<ul style=\"font-size:100%\">
<li>As estat�ticas n�o s�o rastreadas.</li>
<li>O m�dulo de publicidade n�o funcionar� apenas no momento de cria��o do cache de HTML. Observe que isso n�o afeta m�dulos externos de publicidade (Google Ad Sense, etc.);</li>
<li>Os resultados das compara��es de itens n�o ser�o salvas para usu�rios n�oautorizados (uma sess�o deve ser inicializada);</li>
<li>A cota do disco deve ser especificada para evitar ataques DOS no espa�o em disco;</li>
<li>Toda a funcionalidade da se��o do site deve ser verificada depois de habilitar o cache de HTML (por exemplo, coment�rios de blog n�o funcionar�o com modelos de blog antigos, etc.);</li>
</ul>";
$MESS["MAIN_OPTION_CACHE_OK"] = "Arquivos de cache limpo";
$MESS["MAIN_OPTION_CACHE_SUCCESS"] = "Tipo de componentes de cache com sucesso ligado";
$MESS["MAIN_OPTION_CACHE_ERROR"] = "Tipo de cache componentes j� est� definido para este valor";
$MESS["cache_admin_note1"] = "<p>Usar o modo Autocache acelera seu site de forma impressionante!</p>
<p>No modo Autocache, informa��o renderizada por componentes � atualizada de acordo com as configura��es para aqueles componentes.</p>
<p>Para atualizar objeto de cache na p�gina, voc� pode:</p>
<p>1. Abrir a p�gina desejada e atualizar seus objetos clicando em bot�o especial para atualiza��o de dados na barra de ferramentas administrativas.</p>
<img src=\"/bitrix/images/main/page_cache_en.png\" vspace=\"5\"/>
<p>2. Quando no modo Editar Site, voc� clicar no bot�o para limpar o cache de um dado componente. </p>
<img src=\"/bitrix/images/main/comp_cache_en.png\" vspace=\"5\"/>
<p>3. V� para as configura��es do componente e troque os componentes desejados para o modo sem cache.</p>
<img src=\"/bitrix/images/main/spisok_en.png\" vspace=\"5\"/>
<p>Ap�s habilitar o modo para realizar cache, por padr�o todos os componentes com o ajuste de cache <i>\"Autom�tico\"</i> ser� mudado para trabalhar com cache.</p>
<p>Componentes com o ajuste <i>\"Realizar Cache\"</i> e com o tempo de cache maior que 0 (zero), sempre trabalha fazendo cache.</p>
<p>Componentes com o ajuste <i>\"N�o Realizar Cache\"</i> ou com o tempo de cache igual a 0 (zero), sempre trabalha sem a realiza��o de cache.</p>";
$MESS["cache_admin_note2"] = "Depois de eliminar todos os arquivos de cache�todo conte�do exibido ser� atualizado de acordo com novos dados. Novos arquivos de cache ser�o criados gradualmente na requisi��o de p�ginas com �reas de cache.";
$MESS["main_cache_managed_saved"] = "As configura��es de gerenciamento de cache foram salvas.";
$MESS["main_cache_managed"] = "Cache Gerenciado";
$MESS["main_cache_managed_sett"] = "Par�metros de cache gerenciados";
$MESS["main_cache_managed_on"] = "O cache gerenciado est� ativo.";
$MESS["main_cache_managed_off"] = "O cache gerenciado est� desabilitado (n�o recomendado).";
$MESS["main_cache_managed_turn_off"] = "Desativar cache gerenciado (n�o recomendado)";
$MESS["main_cache_managed_const"] = "A constante BX_COMP_MANAGED_CACHE est� definida.�O cache gerenciado�est� sempre ativado.";
$MESS["main_cache_managed_turn_on"] = "Ativar cache gerenciado";
$MESS["main_cache_managed_note"] = " \"As  <b>Depend�ncias de cache</b> s�o atualiza��es tecnol�gicas do cache sempre ocorrem ap�s a altera��o de dados, se esse recurso est� ativo, voc� n�o ter� que atualizar o cache manualmente ao atualizar not�cias ou produtos: os visitantes do site v�o sempre visualizar as informa��es atualizadas.

<br> Obtenha mais informa��es sobre a tecnologiade  depend�ncias de cache no site Bitrix.
<br> <span style=\"\"color:grey\"\">: nem todos os componentes podem suportar esse recurso </span> \".";
$MESS["cache_admin_note5"] = "O cache HTML est� sempre ativo nesta edi��o.";
$MESS["main_cache_wrong_cache_type"] = "Tipo de cache inv�lido.";
$MESS["main_cache_wrong_cache_path"] = "Caminho de arquivo de cache inv�lido.";
$MESS["main_cache_in_progress"] = "Excluindo os arquivos de cache.";
$MESS["main_cache_finished"] = "Os arquivos de cache foram apagados.";
$MESS["main_cache_files_scanned_count"] = "Processado: #value#";
$MESS["main_cache_files_scanned_size"] = "Tamanho dos arquivos processados: #value#";
$MESS["main_cache_files_deleted_count"] = "Exclu�do: #value#";
$MESS["main_cache_files_deleted_size"] = "Tamanho de arquivos apagados: #value#";
$MESS["main_cache_files_delete_errors"] = "Erros de exclus�o: #value#";
$MESS["main_cache_files_last_path"] = "Pasta atual: #value#";
$MESS["main_cache_files_start"] = "Iniciar";
$MESS["main_cache_files_continue"] = "Continuar";
$MESS["main_cache_files_stop"] = "Parar";
?>