<?
$MESS["BPT_SM_NAME"] = "Aprova��o/Voto Simplificados";
$MESS["BPT_SM_DESC"] = "Recomendado quando a decis�o for tomada pela maioria simples de votos. Voc� poder� designar colaboradores votantes e permitir que eles fa�am coment�rios. Quando a vota��o estiver conclu�da todos os colaboradores envolvidos ser�o notificados sobre o resultado final. ";
$MESS["BPT_SM_TITLE1"] = "Processo de Neg�cio Sequencial ";
$MESS["BPT_SM_TASK1_TITLE"] = "Aprovar documento:  \"{=Document:NAME}\"";
$MESS["BPT_SM_TASK1_TEXT"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".

Prossiga abrindo o seguinte link: #BASE_HREF##TASK_URL#

Autor: {=Document:CREATED_BY_PRINTABLE}";
$MESS["BPT_SM_ACT_TITLE"] = "Mensagem de email";
$MESS["BPT_SM_APPROVE_NAME"] = "Por favor, aprove ou recuse o documento. ";
$MESS["BPT_SM_APPROVE_DESC"] = "Voc� tem que aprovar ou recusar o documento \"{=Document:NAME}\".

Autor: {=Document:CREATED_BY_PRINTABLE}";
$MESS["BPT_SM_APPROVE_TITLE"] = "Responder a respeito de um documento";
$MESS["BPT_SM_ACT_NAME"] = "Sequ�ncia de A��es";
$MESS["BPT_SM_MAIL1_SUBJ"] = "Vota��o de \"{=Document:NAME}\": O documento passou. ";
$MESS["BPT_SM_MAIL1_TEXT"] = "A vota��o do documento \"{=Document:NAME}\" foi conclu�da. 

O documento foi aceito por {=ApproveActivity1:ApprovedPercent}% dos votos. 

Aprovado: {=ApproveActivity1:ApprovedCount}
Recusado: {=ApproveActivity1:NotApprovedCount}";
$MESS["BPT_SM_MAIL1_TITLE"] = "O documento foi aprovado";
$MESS["BPT_SM_STATUS"] = "Aprovado";
$MESS["BPT_SM_STATUS2"] = "Status: Aprovado";
$MESS["BPT_SM_PUB"] = "Publicar Documento";
$MESS["BPT_SM_MAIL2_SUBJ"] = "Vota��o de \"{=Document:NAME}\": O documento foi recusado. ";
$MESS["BPT_SM_MAIL2_TEXT"] = "A vota��o do documento \"{=Document:NAME}\" foi conclu�da. 

O documento foi recusado. 

Aprovado: {=ApproveActivity1:ApprovedCount}
Recusado: {=ApproveActivity1:NotApprovedCount}";
$MESS["BPT_SM_MAIL2_TITLE"] = "O documento foi recusado.";
$MESS["BPT_SM_MAIL2_STATUS"] = "Recusado";
$MESS["BPT_SM_MAIL2_STATUS2"] = "Status: Recusado";
$MESS["BPT_SM_PARAM_NAME"] = "Colaboradores Votantes";
$MESS["BPT_SM_PARAM_DESC"] = "Usu�rios participando da vota��o.";
?>