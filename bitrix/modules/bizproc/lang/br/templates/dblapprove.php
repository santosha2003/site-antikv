<?
$MESS["BP_DBLA_NAME"] = "Aprova��o em 2 est�gios";
$MESS["BP_DBLA_DESC"] = "Recomendado quando um documento necessita de uma avalia��o minuciosa antes de ser aprovado. Durante o primeiro est�gio do processo o documento � atestado por algu�m com compet�ncia no assunto. Se o avaliador rejeitar o documento, este ir� retornar para o seu criador para uma revis�o. Se o documento for aprovado, este ser� encaminhado para a aprova��o final por um grupo pr�-selecionado de colaboradores onde se utilizar� o voto da maioria. Se a vota��o final falhar, o documento voltar� para revis�o e o processo de aprova��o do documento recome�ar� novamente desde o in�cio. ";
$MESS["BP_DBLA_T"] = "Processo de Neg�cio Sequencial";
$MESS["BP_DBLA_TASK"] = "Aprovar documento: \"{=Document:NAME}\"";
$MESS["BP_DBLA_TASK_DESC"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".
		
Prossiga abrindo o seguinte link: #BASE_HREF##TASK_URL#

Autor: {=Document:CREATED_BY_PRINTABLE}";
$MESS["BP_DBLA_M"] = "Mensagem de Email";
$MESS["BP_DBLA_APPROVE"] = "Por favor, aprove ou recuse o documento. ";
$MESS["BP_DBLA_APPROVE_TEXT"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".
		
Autor: {=Document:CREATED_BY_PRINTABLE}";
$MESS["BP_DBLA_APPROVE_TITLR"] = "Aprova��o do Documento: Est�gio 1";
$MESS["BP_DBLA_S"] = "Sequ�ncia de A��es";
$MESS["BP_DBLA_MAIL_SUBJ"] = "O documento passou no Est�gio 1. ";
$MESS["BP_DBLA_MAIL_TEXT"] = "O documento \"{=Document:NAME}\" passou no primeiro est�gio de aprova��o.											

O documento foi aprovado.																										

{=ApproveActivity1:Comments}";
$MESS["BP_DBLA_MAIL2_SUBJ"] = "Por favor, responda sobre \"{=Document:NAME}\"";
$MESS["BP_DBLA_MAIL2_TEXT"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".
		
Prossiga abrindo o seguinte link: #BASE_HREF##TASK_URL#

Autor: {=Document:CREATED_BY_PRINTABLE}";
$MESS["BP_DBLA_APPROVE2"] = "Por favor, aprove ou recuse o documento. ";
$MESS["BP_DBLA_APPROVE2_TEXT"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".

Author: {=Document:CREATED_BY_PRINTABLE}		";
$MESS["BP_DBLA_APPROVE2_TITLE"] = "Aprova��o do Documento: Est�gio 2";
$MESS["BP_DBLA_MAIL3_SUBJ"] = "Vota��o para o documento \"{=Document:NAME}\": O documento foi aceito.";
$MESS["BP_DBLA_MAIL3_TEXT"] = "A vota��o para o documento \"{=Document:NAME}\" foi conclu�da .

O documento foi aceito por {=ApproveActivity2:ApprovedPercent}% de votos.

Aprovado: {=ApproveActivity2:ApprovedCount}																										
Recusado: {=ApproveActivity2:NotApprovedCount}

{=ApproveActivity2:Comments}";
$MESS["BP_DBLA_APP"] = "Aprovado";
$MESS["BP_DBLA_APP_S"] = "Status: Aprovado";
$MESS["BP_DBLA_PUB_TITLE"] = "Publicar Documento";
$MESS["BP_DBLA_NAPP"] = "Vota��o para o documento \"{=Document:NAME}\": O documento foi recusado.";
$MESS["BP_DBLA_NAPP_TEXT"] = "A vota��o para o documento \"{=Document:NAME}\" foi conclu�da.
						
O documento foi recusado.

Aprovado: {=ApproveActivity2:ApprovedCount}																										
Recusado: {=ApproveActivity2:NotApprovedCount}

{=ApproveActivity2:Comments}";
$MESS["BP_DBLA_NAPP_DRAFT"] = "Enviado para revis�o";
$MESS["BP_DBLA_NAPP_DRAFT_S"] = "Status: Enviado para revis�o";
$MESS["BP_DBLA_MAIL4_SUBJ"] = "Vota��o para o documento \"{=Document:NAME}\": O documento foi recusado.";
$MESS["BP_DBLA_MAIL4_TEXT"] = "O primeiro est�gio de aprova��o \"{=Document:NAME}\" foi conclu�do.

O documento foi recusado.

{=ApproveActivity1:Comments}";
$MESS["BP_DBLA_PARAM1"] = "Pessoas Votantes do Est�gio 1";
$MESS["BP_DBLA_PARAM2"] = "Pessoas Votantes do Est�gio 2";
?>