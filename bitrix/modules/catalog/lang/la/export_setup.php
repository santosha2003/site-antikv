<?
$MESS ['CES_ERROR_NO_FILE'] = "Archivo a exportar no se ha fijado.";
$MESS ['CES_ERROR_NO_ACTION'] = "No se ha fijado la acción.";
$MESS ['CES_ERROR_FILE_NOT_EXIST'] = "Archivo a exportar no se ha encontrado:";
$MESS ['CES_ERROR_NOT_AGENT'] = "Este perfil no puede ser usado por los agentes porque este esta siendo usado por defecto y las configuraciones del archivo están definidad por el exportador actual.";
$MESS ['CES_ERROR_ADD_PROFILE'] = "Error al agregar perfil.";
$MESS ['CES_ERROR_NOT_CRON'] = "Éste perfil no puede ser usado con cron por que este está siendo usado por defecto y las configuraciones del archivo están definidas por el exportador actual.";
$MESS ['CES_ERROR_ADD2CRON'] = "Error al instalar la configuración del archivo con cron:";
$MESS ['CES_ERROR_UNKNOWN'] = "error desconocido.";
$MESS ['CES_ERROR_NO_PROFILE1'] = "Perfil  #";
$MESS ['CES_ERROR_NO_PROFILE2'] = "no se encontró.";
$MESS ['CES_ERROR_SAVE_PROFILE'] = "Error al guardar el perfil a exportar.";
$MESS ['CES_ERROR_NO_SETUP_FILE'] = "Exportación de configuración del archivo no se encontró.";
$MESS ['TITLE_EXPORT_PAGE'] = "Exportar configuración";
$MESS ['CES_ERRORS'] = "Error al realizar la operación:";
$MESS ['CES_SUCCESS'] = "Operación finalizó exitosamente.";
$MESS ['CES_EXPORT_FILE'] = "Exportar datos del archivo:";
$MESS ['CES_EXPORTER'] = "Exportador";
$MESS ['CES_ACTIONS'] = "Acciones";
$MESS ['CES_PROFILE'] = "Perfil";
$MESS ['CES_IN_MENU'] = "En el menú";
$MESS ['CES_IN_AGENT'] = "En agentes";
$MESS ['CES_IN_CRON'] = "En cron";
$MESS ['CES_USED'] = "Último plazo";
$MESS ['CES_ADD_PROFILE_DESCR'] = "Agregar nuevo perfil a exportar";
$MESS ['CES_ADD_PROFILE'] = "Agregar perfil";
$MESS ['CES_DEFAULT'] = "Predeterminado";
$MESS ['CES_NO'] = "No";
$MESS ['CES_YES'] = "Si";
$MESS ['CES_RUN_INTERVAL'] = "Período entre lanzamientos (horas):";
$MESS ['CES_SET'] = "Instalar";
$MESS ['CES_DELETE'] = "Borrar";
$MESS ['CES_CLOSE'] = "Cerrar";
$MESS ['CES_OR'] = "o";
$MESS ['CES_RUN_TIME'] = "Hora de lanzamiento:";
$MESS ['CES_PHP_PATH'] = "Ruta al php:";
$MESS ['CES_AUTO_CRON'] = "Fijar automáticamente:";
$MESS ['CES_AUTO_CRON_DEL'] = "Borrar automáticamente:";
$MESS ['CES_RUN_EXPORT_DESCR'] = "Iniciar exportación de la base de datos";
$MESS ['CES_RUN_EXPORT'] = "Exportar";
$MESS ['CES_TO_LEFT_MENU_DESCR'] = "Agregar link del menú en el menú de la izquierda";
$MESS ['CES_TO_LEFT_MENU_DESCR_DEL'] = "Borrar link del menú desde el menú de la izquierda";
$MESS ['CES_TO_LEFT_MENU'] = "Agregar al menú";
$MESS ['CES_TO_LEFT_MENU_DEL'] = "Borrar desde el menú";
$MESS ['CES_TO_AGENT_DESCR'] = "Crear agente para lanzamiento automático";
$MESS ['CES_TO_AGENT_DESCR_DEL'] = "Borrar agente para lanzamiento automático";
$MESS ['CES_TO_AGENT'] = "Crear agent";
$MESS ['CES_TO_AGENT_DEL'] = "Borrar agente";
$MESS ['CES_TO_CRON_DESCR'] = "Usar cron para lanzamiento automático";
$MESS ['CES_TO_CRON_DESCR_DEL'] = "Quitat desde el cron";
$MESS ['CES_TO_CRON'] = "Usar cron";
$MESS ['CES_TO_CRON_DEL'] = "Detener cron";
$MESS ['CES_SHOW_VARS_LIST_DESCR'] = "Mostrar lista de variables para este perfil a exportar";
$MESS ['CES_SHOW_VARS_LIST'] = "Lista de variables";
$MESS ['CES_DELETE_PROFILE_DESCR'] = "Borrar este perfil";
$MESS ['CES_DELETE_PROFILE_CONF'] = "Está usted seguro que desea borrar este perfil?";
$MESS ['CES_DELETE_PROFILE'] = "Borrar perfil";
$MESS ['CES_NOTES1'] = "Agentes son las funciones PHP las cuales funcionan períodicamente al otorgar el intervalo. ACada tiempo la página es pedida, el sistema la comprueba automáticamente para agentes que necesitan ser ejecutados y funcionar. Esto no es recomendable para asignar trabajos extensos de exportación para agentes. Usted deberá usar el cron daemon para este fin.";
$MESS ['CES_NOTES2'] = "El cron daemon está sólo disponible en los servidores basados en UNIX.";
$MESS ['CES_NOTES3'] = "El cron daemon trabaja en el modo background y realiza las tareas asignadas en el tiempo especificado. Usted necesita especificar la configuración del archivo para agregar la operación de exportación a la lista de tareas";
$MESS ['CES_NOTES4'] = "en el cron. Este archivo contiene instrucciones para las operaciones de exportación. Después usted tiene que cambiar las tareas del cron establecido, usted tiene que instalar la configuración del archivo de nuevo.";
$MESS ['CES_NOTES5'] = "Para fijar el archivo de configuración usted tiene que conectar su sitio vía el SSH o SSH2 o cualquier otro protocolo similar que su proveedor de soporte para operaciones remotas. En la línea de cmando, ejecutar el comando.";
$MESS ['CES_NOTES6'] = "Para ver la lista de tareas actualmente instaladas, ejecutar el comando";
$MESS ['CES_NOTES7'] = "Para quitar todas las tareas asignadas al cron, ejecutar el comando";
$MESS ['CES_NOTES8'] = "Lista actual de tareas del cron:";
$MESS ['CES_NOTES10'] = "Atención! Esto también podría quitat cualquier tarea que no esté configurada en el archivo.";
$MESS ['CES_NOTES11'] = "Archivo que lanza el script de la exportación para ejecutar tareas con el cron es";
$MESS ['CES_NOTES12'] = "Por favor asegúrese que este archivo contiene las rutas correctas al PHP  y a la raíz del sitio";
?>