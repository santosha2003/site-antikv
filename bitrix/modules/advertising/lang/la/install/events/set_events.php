<?
$MESS ['ADV_BANNER_STATUS_CHANGE_NAME'] = "Estado del banner fue cambiado";
$MESS ['ADV_BANNER_STATUS_CHANGE_DESC'] = "#EMAIL_TO# - Correo electrónico del receptor(#OWNER_EMAIL#)
#ADMIN_EMAIL# - Correo electrónico de usuarios con roles de \"administradores de banners \" y \"administrador\"
#ADD_EMAIL# - Correo electrónico de los adminsitradores de banners
#STAT_EMAIL# - EMail de los usuarios que tienen permisos para ver las estadísticas del banner
#EDIT_EMAIL# - EMail de los usuarios que tienen permiso para modificar algunos campos del contrato
#OWNER_EMAIL# - EMail de los usuarios que tienen cualquier permiso en el contrato#BCC# - copiar (#ADMIN_EMAIL#)
#ID# -  ID del banner
#CONTRACT_ID# - ID del contrato
#CONTRACT_NAME# - título del contrato
#TYPE_SID# - tipo de ID
#TYPE_NAME# - tipo de título
#STATUS# - stado
#STATUS_COMMENTS# - comentarios para el estado
#NAME# - título del banner
#GROUP_SID# - grupo de banner
#ACTIVE# - actividad de la bandera del banner [Y | N]
#INDICATOR# - está el banner mostrándose en el sitio?
#SITE_ID# - parte del idioma para la exhibición del banner
#WEIGHT# - peso (prioridad)
#MAX_SHOW_COUNT# - número máximo de banners mostrados
#SHOW_COUNT# - número de banners mostrados
#MAX_CLICK_COUNT# - máximo número de clicks en el banner
#CLICK_COUNT# - número de clicks en el banner
#DATE_LAST_SHOW# - fecha de la última exhibición del banner
#DATE_LAST_CLICK# - fecha del último click del banner
#DATE_SHOW_FROM# - fecha de inicio del período que muestra el banner
#DATE_SHOW_TO# - fecha de finalización que se muestra el banner
#IMAGE_LINK# - link de la imagen
#IMAGE_ALT# - tooltip del texto de la imagen
#URL# - URL en la imagen
#URL_TARGET# - donde abrir URL
#CODE# - código del banner
#CODE_TYPE# - tipo de código del banner  (texto | html)
#COMMENTS# - comentarios del banner
#DATE_CREATE# - fecha de creación del banner
#CREATED_BY# - banner
#DATE_MODIFY# - fecha de modificación del banner
#MODIFIED_BY# - quién modicó el banner";
$MESS ['ADV_BANNER_STATUS_CHANGE_SUBJECT'] = "[BID##ID#] #SITE_NAME#: estado del banner  se ha cambiado - [#STATUS#]";
$MESS ['ADV_BANNER_STATUS_CHANGE_MESSAGE'] = "estado del banner # #ID# fue cambiado a [#STATUS#].
==================== Configuraciones del banner====================";
$MESS ['ADV_CONTRACT_INFO_NAME'] = "Ajustes del contrato de publicidad";
$MESS ['ADV_CONTRACT_INFO_DESC'] = "#ID# - ID del contrato
#MESSAGE# - mensaje
#EMAIL_TO# - EMail del receptor del mensaje
#ADMIN_EMAIL# - EMail de los usuarios con roles \"administradores de banners \" y \"administrador\"
#ADD_EMAIL# - EMail de los adminsitradores de banners
#STAT_EMAIL# - EMail de los usuarios que tienen permisos para ver estadísticas del banner #EDIT_EMAIL# - EMail de los usuarios que tienen permisos para modificar algunos campos del contrato #OWNER_EMAIL# - EMail de usuarios que tienen cualquier permis sobre el contrato
#BCC# - copiar
#INDICATOR# - is contract banners shown on the site ?
#ACTIVE# - contract activity flag [Y | N]
#NAME# - contract title
#DESCRIPTION# - contract description
#MAX_SHOW_COUNT# - max number of all contract banners shows
#SHOW_COUNT# - number of all contract banners shows
#MAX_CLICK_COUNT# - max number of all contract banners clicks
#CLICK_COUNT# - number of all contract banners clicks
#BANNERS# - number of contract banners
#DATE_SHOW_FROM# - start date of banner showing period
#DATE_SHOW_TO# - end date of banner showing period
#DATE_CREATE# - contract creation date
#CREATED_BY# - contract creator
#DATE_MODIFY# - contract modification date
#MODIFIED_BY# - who has modified the contract";
$MESS ['ADV_CONTRACT_INFO_SUBJECT'] = "[CID##ID#] #SITE_NAME#: Ajustes del contrato de publicidad ";
$MESS ['ADV_CONTRACT_INFO_MESSAGE'] = "#MESSAGE#
Contrato: [#ID#] #NAME#
#DESCRIPTION#
=================== Configuraciones del contrato==============================

Actividad: #INDICATOR#

Período    - [#DATE_SHOW_FROM# - #DATE_SHOW_TO#]
Mostrar    - #SHOW_COUNT# / #MAX_SHOW_COUNT#
Clicked   - #CLICK_COUNT# / #MAX_CLICK_COUNT#
Act. bandera - [#ACTIVE#]

Banners   - #BANNERS#
=====================================================================

Creado  - #CREATED_BY# [#DATE_CREATE#]
Cambiado  - #MODIFIED_BY# [#DATE_MODIFY#]

para ver los ajustes visitar el link:
http://#SERVER_NAME#/bitrix/admin/adv_contract_edit.php?ID=#ID#&lang=#LANGUAGE_ID#

Mensaje generado automáticamente.";
?>