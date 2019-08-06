<?
$MESS["SECURITY_SITE_CHECKER_PhpConfigurationTest_NAME"] = "Verifica��o de configura��es do PHP";
$MESS["SECURITY_SITE_CHECKER_PHP_ENTROPY"] = "Nenhuma fonte de entropia adicional para o ID da sess�o foi definido";
$MESS["SECURITY_SITE_CHECKER_PHP_ENTROPY_RECOMMENDATION"] = "Adicione a seguinte linha para as configura��es de PHP: <br> session.entropy_file =/dev/urandom <br> session.entropy_length = 128";
$MESS["SECURITY_SITE_CHECKER_PHP_INCLUDE"] = "URL wrappers est�o habilitados";
$MESS["SECURITY_SITE_CHECKER_PHP_INCLUDE_DETAIL"] = "Esta op��o � absolutamente n�o recomend�vel.";
$MESS["SECURITY_SITE_CHECKER_PHP_INCLUDE_RECOMMENDATION"] = "Adicionar ou editar a seguinte linha nas configura��es do PHP:<br>allow_url_fopen=Off";
$MESS["SECURITY_SITE_CHECKER_PHP_FOPEN"] = "O acesso de leitura para URL wrappers est� habilitado.";
$MESS["SECURITY_SITE_CHECKER_PHP_FOPEN_DETAIL"] = "Esta op��o n�o � necess�ria, mas pode, eventualmente, ser utilizada por um invasor.";
$MESS["SECURITY_SITE_CHECKER_PHP_FOPEN_RECOMMENDATION"] = "Adicionar ou editar a seguinte linha nas configura��es do PHP:<br>allow_url_fopen=Off";
$MESS["SECURITY_SITE_CHECKER_PHP_ASP"] = "Tags no estilo ASP est�o habilitadas";
$MESS["SECURITY_SITE_CHECKER_PHP_ASP_DETAIL"] = "Apenas alguns desenvolvedores sabem que essa op��o existe. Esta op��o � redundante.";
$MESS["SECURITY_SITE_CHECKER_PHP_ASP_RECOMMENDATION"] = "Adicionar ou editar a seguinte linha nas configura��es do PHP: <br> asp_tags = Off";
$MESS["SECURITY_SITE_CHECKER_LOW_PHP_VERSION_ENTROPY"] = "A vers�o do php est� desatualizada";
$MESS["SECURITY_SITE_CHECKER_LOW_PHP_VERSION_ENTROPY_DETAIL"] = "A vers�o atual do php n�o suporta a instala��o de uma fonte adicional de entropia na cria��o de um ID da sess�o";
$MESS["SECURITY_SITE_CHECKER_LOW_PHP_VERSION_ENTROPY_RECOMMENDATION"] = "Atualize o Php para a vers�o 5.3.3 ou superior, de prefer�ncia para a vers�o est�vel mais recente";
$MESS["SECURITY_SITE_CHECKER_PHP_ENTROPY_DETAIL"] = "A falta de entropia adicional pode ser usada para prever os n�meros aleat�rios e o ID da sess�o.";
$MESS["SECURITY_SITE_CHECKER_PHP_HTTPONLY"] = "Os cookies s�o acess�veis a partir de JavaScript";
$MESS["SECURITY_SITE_CHECKER_PHP_HTTPONLY_DETAIL"] = "Tornar cookies acess�veis a partir do JavaScript aumentar� as chances de ataques XSS bem-sucedidos.";
$MESS["SECURITY_SITE_CHECKER_PHP_HTTPONLY_RECOMMENDATION"] = "Adicionar ou editar a seguinte linha nas configura��es do PHP: <br> session.cookie_httponly = On";
$MESS["SECURITY_SITE_CHECKER_PHP_COOKIEONLY"] = "IDs de sess�es s�o salvos em outros armazenamentos al�m de cookies";
$MESS["SECURITY_SITE_CHECKER_PHP_COOKIEONLY_DETAIL"] = "Salvar um ID de sess�o em outro lugar que os cookies pode levar a hijacking de sess�o.";
$MESS["SECURITY_SITE_CHECKER_PHP_COOKIEONLY_RECOMMENDATION"] = "Adicionar ou editar a seguinte linha nas configura��es do PHP: <br> session.use_only_cookies = On";
$MESS["SECURITY_SITE_CHECKER_PHP_MBSTRING_SUBSTITUTE"] = "Excluir sequencias de caracteres inv�lidos ";
$MESS["SECURITY_SITE_CHECKER_PHP_MBSTRING_SUBSTITUTE_DETAIL"] = "A capacidade de apagar os caracteres inv�lidos podem ser explorados para os chamados ataques de seq��ncia de bytes inv�lidos.";
$MESS["SECURITY_SITE_CHECKER_PHP_MBSTRING_SUBSTITUTE_RECOMMENDATION"] = "Na configura��o do PHP, altere o valor de mbstring.substitute_character para qualquer coisa, mas \"nenhum\".";
?>