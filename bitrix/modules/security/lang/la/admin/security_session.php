<?
$MESS["SEC_SESSION_ADMIN_SAVEDB_TAB"] = "Sesiones en la base de datos";
$MESS["SEC_SESSION_ADMIN_TITLE"] = "Sesión de protección";
$MESS["SEC_SESSION_ADMIN_DB_ON"] = "La base de datos de la sesión está almacenada en el módulo de seguridad de la base de datos.";
$MESS["SEC_SESSION_ADMIN_DB_OFF"] = "Sesión de la base de datos no están almacenados el módulo de la base de datos.";
$MESS["SEC_SESSION_ADMIN_DB_BUTTON_OFF"] = "No almacene la sesión de la base de datos en el módulo de seguridad de la base de datos";
$MESS["SEC_SESSION_ADMIN_DB_BUTTON_ON"] = "Almacenar la sesión de la base de datos en el módulo de seguridad de la base de datos";
$MESS["SEC_SESSION_ADMIN_SESSID_TAB"] = "Cambio del ID";
$MESS["SEC_SESSION_ADMIN_SESSID_TAB_TITLE"] = "Configurar la rotación de ID´S de la sesión";
$MESS["SEC_SESSION_ADMIN_SESSID_ON"] = "El cambio del ID de la sesión está habilitado.";
$MESS["SEC_SESSION_ADMIN_SESSID_OFF"] = "El cambio del ID de la sesión está desactivado.";
$MESS["SEC_SESSION_ADMIN_SESSID_BUTTON_OFF"] = "Cambio del ID desactivado";
$MESS["SEC_SESSION_ADMIN_SESSID_BUTTON_ON"] = "Habilitar cambio del ID ";
$MESS["SEC_SESSION_ADMIN_SESSID_TTL"] = "Tiempo de duración del ID de la sesión, seg.";
$MESS["SEC_SESSION_ADMIN_SAVEDB_TAB_TITLE"] = "Configurar el almacenamiento de la sesión de la data en la base de datos";
$MESS["SEC_SESSION_ADMIN_DB_NOTE"] = "<p>La mayor&iacute;a de los ataques web se producen al intentar robar datos de una sesi&oacute;n. Al habilitar la  <b>Prototecci&oacute;n de sesi&oacute;n </b> hacemos a esta sencible a los ataques.</p>
<p>Adicionalmente al la protecci&oacute;n de sesiones estandard, usted puede configurar opciones en las preferencias de cada grupo de usuarios en la  <b>protecci&oacute;n proactiva de la sesi&oacute;n </b>:
<ul style='font-size:100%'>
<li>Cambiando el ID de la sesi&oacute;n despu&eacute;s de cierto periodo de tiempo;</li>
<li>Almacenando los datos de la sesi&ntilde;n en una  base de  datos del m&oacute;dulo.</li>
</ul>
<p>Almacenando los datos de la sesi&oacute;n en la base de datos del m&oacute;dulo evitamos que los datos sean robados por scripts ejecutados en el servidor virtual, scripts que se aprovechen de una mala confguraci&oacute;n, mala asignaci&oacute;n de permisos en las carpetas personales y otros problemas relacinados con el sistema operativo. Esto tambi&eacute;n reduce la carga del sistema de archivos y el proceso de descarga del servidor de la base de datos.</p>
<p><i>Recomendado para un nivel alto .</i></p>";
$MESS["SEC_SESSION_ADMIN_SESSID_NOTE"] = "<p>Si esta caracter&iacute;stica es habilitada, la ID de la sesi&oacute;n ser&aacute; cambiada despu&eacute;s del periodo de tiempo especificado. Esto le dar&aacute; mayor trabajo al servidor, pero obviamente har&aacute; imposible el secuestro de los datos de la sesi&oacute;n.</p>
<p><i>Recomendado para un nivel alto .</i></p>";
$MESS["SEC_SESSION_ADMIN_DB_WARNING"] = "¡Atención! Alternar el período de sesiones o desactivar este modo hará que los usuarios autorizados a pierdan su actual autorización (lso datos de la sesión serán destruidos).";
$MESS["SEC_SESSION_ADMIN_SESSID_WARNING"] = "La ID de sesión no es compatible con el módulo de Protección Proactia. El identificador retornado con la funicón session_id() debe no tener más de 32 caracteres y debería contener sólo dígitos y caracteres latinos.";
?>