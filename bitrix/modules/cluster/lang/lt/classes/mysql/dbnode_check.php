<?
$MESS["CLU_AFTER_CONNECT_MSG"] = "Pagrindinë duomenø bazë ir sistemos aplinka turi bûti sukonfigûruoti taip, kad neliktø bylos php_interface/after_connect.php.";
$MESS["CLU_AFTER_CONNECT_WIZREC"] = "Atlikite bûtinus nustatymus. Ásitikinkite, kad produktas veikia tinkamai. Iðtrinkite bylà ir paleiskite vedlá dar kartà.";
$MESS["CLU_CHARSET_MSG"] = "Serverio, duomenø bazës, ryðio ir kliento koduotës turi sutapti.";
$MESS["CLU_CHARSET_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;character_set_server (dabartinë reikðmë: #character_set_server#),<br />
&nbsp;character_set_database (dabartinë reikðmë: #character_set_database#),<br />
&nbsp;character_set_connection (dabartinë reikðmë: #character_set_connection#),<br />
&nbsp;character_set_client (dabartinë reikðmë: #character_set_client#).<br />
Ásitikinkite, kad produktas veikia tvarkingai, ir vël paleiskite vedlá.";
$MESS["CLU_COLLATION_MSG"] = "Serveris, duomenø bazës ir jungtys turi naudoti tas paèias rûðiavimo taisykles.";
$MESS["CLU_COLLATION_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;collation_server (dabartinë reikðmë: #collation_server#),<br />
&nbsp;collation_database (dabartinë reikðmë: #collation_database#),<br />
&nbsp;collation_connection (dabartinë reikðmë: #collation_connection#).<br />
Ásitikinkite, kad produktas veikia tvarkingai, ir vël paleiskite vedlá.";
$MESS["CLU_SERVER_ID_MSG"] = "Kiekvienas klasterio mazgas turi turëti unikalø ID (dabartinis serverio ID: #server-id#).";
$MESS["CLU_LOG_BIN_MSG"] = "Pagrindinio serverio þurnaliavimas turi bûti ájungtas (dabartinë vertë log-bin: #log-bin#).";
$MESS["CLU_LOG_BIN_NODE_MSG"] = "Naujo serverio þurnaliavimas turi bûti ájungtas (dabartinë vertë log-bin: #log-bin#).";
$MESS["CLU_LOG_BIN_WIZREC"] = "Pridëkite parametrà log-bin=mysql-bin á my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_SKIP_NETWORKING_MSG"] = "Pirminis serveris turi bûti pasiekiamas ið tinklo (dabartinë reikðmë skip-networking: #skip-networking#).";
$MESS["CLU_SKIP_NETWORKING_NODE_MSG"] = "Tinklas turi bûti prieinamas naujam sukurtam serveriui (dabartinë reikðmë skip-networking: #skip-networking#).";
$MESS["CLU_SKIP_NETWORKING_WIZREC"] = "Byloje my.cnf iðtrinkite arba uþkomentuokite parametrà skip-networking. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_FLUSH_ON_COMMIT_MSG"] = "Naudojant InnoDB, replikacijos patikimumui, nustatykite parametrà innodb_flush_log_at_trx_commit = 1 (dabartinë reikðmë: #innodb_flush_log_at_trx_commit#).";
$MESS["CLU_SYNC_BINLOG_MSG"] = "Naudojant InnoDB, replikacijos patikimumui, nustatykite parametrà sync_binlog = 1 (dabartinë reikðmë: #sync_binlog#).";
$MESS["CLU_SYNC_BINLOGDODB_MSG"] = "Gali bûti nustatyta replikacija tik vienos duomenø bazës.";
$MESS["CLU_SYNC_BINLOGDODB_WIZREC"] = "Pridëkite parametrà binlog-do-db=#database# á my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_MASTER_CHARSET_MSG"] = "Kodavimas ir rûðiavimo taisyklës pirminio serverio ir naujo ryðio turi bûti analogiðki.";
$MESS["CLU_MASTER_CHARSET_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;character_set_server (dabartinë reikðmë: #character_set_server#),<br />
&nbsp;collation_server (dabartinë reikðmë: #collation_server#).<br />
Ásitikinkite, kad produktas veikia tvarkingai, ir vël paleiskite vedlá.";
$MESS["CLU_SERVER_ID_WIZREC1"] = "Nenurodytas parametras server-id";
$MESS["CLU_SERVER_ID_WIZREC2"] = "Duomenø bazë su tokiu server-id modulyje jau yra.";
$MESS["CLU_SERVER_ID_WIZREC"] = "Pridëkite ir nustatykite parametrà server-id byloje my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_SQL_MSG"] = "Naudotojas privalo turëti teises kurti ir trinti lenteles, taip pat áterpti, pasirinkti, redaguoti ir trinti duomenys.";
$MESS["CLU_SQL_WIZREC"] = "Nepakanka teisiø. Sekanèios SQL uþklausos nebuvo ávykdytos: #sql_erorrs_list#";
$MESS["CLU_RUNNING_SLAVE"] = "Ðioje duomenø bazëje jau pradëtas replikacijos procesas. Prijungimas neámanomas.";
$MESS["CLU_SAME_DATABASE"] = "Ði duomenø bazë yra tokia pati kaip pirminë. Prijungimas neámanomas.";
$MESS["CLU_MASTER_CONNECT_ERROR"] = "Pirminës duomenø bazës ryðio klaida.";
$MESS["CLU_NOT_MASTER"] = "Nurodyta duomenø bazë nëra pirminë.";
$MESS["CLU_MAX_ALLOWED_PACKET_MSG"] = "Slave duomenø bazës parametro \"max_allowed_packet\" vertë neturi bûti maþesnë nei pirminës duomenø bazës.";
$MESS["CLU_MAX_ALLOWED_PACKET_WIZREC"] = "Nustatykite \"max_allowed_packet\" parametrà byloje my.cnf ir perkraukite MySQL.";
$MESS["CLU_SLAVE_VERSION_MSG"] = "Slave duomenø bazës MySQL versija (#slave-version#) turi ne þemesnë nei #required-version# versija.";
$MESS["CLU_VERSION_MSG"] = "Slave duomenø bazës MySQL versija (#slave-version#) turi ne þemesnë nei pirminës duomenø bazës versija (#master-version#).";
$MESS["CLU_SLAVE_RELAY_LOG_MSG"] = "Nenurodytas \"relay-log\" parametras. Replikacija bus nutraukta jei serverio pavadinimas pasikeis.";
$MESS["CLU_RELAY_LOG_WIZREC"] = "my.cnf byloje nustatykite \"relay-log\" parametro vertæ (pvz mysqld-relay-bin) ir perkraukite MySQL.";
$MESS["CLU_VERSION_WIZREC"] = "Atnaujinkite savo MySQL ir paleiskite vedlá dar kartà.";
$MESS["CLU_MASTER_STATUS_MSG"] = "Nepakanka prieigos teisiø patikrinti replikacijos statusà.";
$MESS["CLU_MASTER_STATUS_WIZREC"] = "Atlikite uþklausà:  #sql#.";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_ERR_MSG"] = "Serveryje su ID lygiu #node_id# nuodyta neteisinga parametro auto_increment_increment vertë. Jis turi bûti lygus #value# (dabartinë vertë: auto_increment_increment: #current#).";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_NODE_ERR_MSG"] = "Naujame serveryje nuodyta neteisinga parametro auto_increment_increment vertë. Jis turi bûti lygus #value# (dabartinë vertë: auto_increment_increment: #current#).";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_WIZREC"] = "Nustatykite parametro auto_increment_increment byloje my.cnf vertæ á #value#. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_OK_MSG"] = "Klasterio serveriuose parametro auto_increment_increment vertë turi bûti lygi #value#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_ERR_MSG"] = "Serveryje ID# #node_id# nustatyta netinkama parametro auto_increment_offset vertë. Ji neturi bûti lygi #current#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_NODE_ERR_MSG"] = "Naujame serveryje nustatyta netinkama parametro auto_increment_offset vertë. Ji neturi bûti lygi #current#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_WIZREC"] = "Byloje my.cnf nustatykite parametro auto_increment_offset kitokià vertæ nei kituose serveriuose. Perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_AUTO_INCREMENT_OFFSET_OK_MSG"] = "Klasterio serveriø auto_increment_offset vertës neturëtø sukelti konfliktø.";
$MESS["CLU_RELAY_LOG_ERR_MSG"] = "Serveryje, kurio ID lygus #node_id# neájungtas þurnalo skaitymas (dabartinë vertë relay-log: #relay-log#).";
$MESS["CLU_RELAY_LOG_OK_MSG"] = "Klasterio serveriuose turi bûti ájungtas þurnalo skaitymas (parametras relay-log).";
$MESS["CLU_LOG_SLAVE_UPDATES_MSG"] = "Serveryje ID #node_id# neájungtas uþklausø þurnaliavimas atëjusiø ið pirminës (master) duomenø bazës. To gali prireikti jei prie jo bus prijungtos slave duomenø bazës. Dabartinë reikðmë log-slave-updates: #log-slave-updates#.";
$MESS["CLU_LOG_SLAVE_UPDATES_WIZREC"] = "Nustatykite \"log-slave-updates\" parametro vertæ á #value# byloje my.cnf. Perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_LOG_SLAVE_UPDATES_OK_MSG"] = "Pagrindiniuose klasterio serveriuose turi bûti ájungtas uþklausø registravimas (þurnaliavimas) atëjusiø ið kitø pagrindiniø duomenø baziø.";
?>