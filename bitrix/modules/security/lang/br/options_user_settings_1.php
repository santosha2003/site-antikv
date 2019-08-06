<?
$MESS["SEC_OTP_ACCESS_DENIED"] = "Voc� n�o pode editar os par�metros de senha tempor�rias";
$MESS["SEC_OTP_SWITCH_ON"] = "Habilitar senhas compostas";
$MESS["SEC_OTP_SECRET_KEY"] = "Secret Key (fornecida com o aparelho)";
$MESS["SEC_OTP_INIT"] = "Inicializa��o";
$MESS["SEC_OTP_PASS1"] = "A primeira senha do dispositivo (Clique e anote)";
$MESS["SEC_OTP_PASS2"] = "A segunda senha do dispositivo (clique novamente e anote)";
$MESS["SEC_OTP_NOTE"] = "<h3 style=\"clear:both\"> <br> Password Tempor�rios </h3>
<img src=\"/bitrix/images/security/etoken_pass.png\" align=\"left\" style=\"margin-right:10px;\">
A <a href=\"http://en.wikipedia.org/wiki/One-time_password\"> Senha tempor�ria </a> (<b> OTP </b>) o conceito autoriza o regime de autoriza��o padr�o e refor�a significativamente a seguran�a projeto web. O sistema de senha �nica requer um token de hardware f�sico (dispositivo) (por exemplo, <a eToken PASS </a>) ou software de ST especial. O administrador do site � fortemente recomendado o uso de ST para garantir a melhor seguran�a.
<h3 style=\"clear:both\"> Uso <br> </h3>
<img src=\"/bitrix/images/security/en_pass_form.png\" align=\"left\" style=\"margin-right:10px;\">
Se o sistema OTP for ativado, o usu�rio pode autorizar com um login e uma senha composta que consiste de uma senha padr�o e a senha do dispositivo de uma s� vez (6 d�gitos). A senha tempor�ria (ver <font style=\"color:red\"> 2 </font> na figura) � inserida no campo \"Password\", juntamente com a senha padr�o (veja <font style=\"color:red\">1</font> na figura), sem o espa�o, na forma de autoriza��o. <br>
A autentica��o OTP tem efeito ap�s a chave secreta e <b> consecutivamente gerada uma senha tempor�ria </b> obtida a partir do dispositivo s�o inseridas.
<h3 style=\"clear:both\"> Inicializa��o Jogos </h3>
Ao inicializar ou sincronizar repetidamente o dispositivo, voc� ter� que fornecer as duas <b> senhas geradas consecutivamentes </b> obtidas a partir do dispositivo.
<h3 style=\"clear:both\"> Descri��o </h3>
O sistema de autoriza��o OTP foi desenvolvido pela Iniciativa para Open Authentication (OATH <a href=\"http://www.openauthentication.org/\"> </a>). <br>
A implementa��o baseia-se no algoritmo HMAC e na fun��o hash SHA-1. Para calcular o valor de OTP, o sistema toma os dois par�metros de entrada: a chave secreta (valor inicial para o gerador) e o valor do contador de corrente (os ciclos necess�rios de gera��o). Ap�s a inicializa��o do dispositivo, o valor inicial � armazenado no dispositivo, bem como no local. Os contador do dispositivo incrementa cada vez que uma OTP nova � gerado, o contador do servidor - sobre cada autentica��o OTP sucesso <br>.
Cada lote de dispositivos OTP � fornecido com um arquivo criptografado que cont�m os valores iniciais (chaves secretas) para todos os dispositivos de um lote. Os valores s�o ligados aos n�meros de s�rie dos dispositivos impressos no corpo do dispositivo. <br>
Se o dispositivo e os contadores de geradores do servidor se tornarem dessincronizados, voc� poder� facilmente voltar a sincroniza-los, redefinindo o valor do servidor para o valor armazenado no dispositivo. Este procedimento requer que um administrador de sistema (ou um usu�rio que possua permiss�es suficientes) gere dois valores OTP consequentes e informa-los no formul�rio OTP.
";
?>