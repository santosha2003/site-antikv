<?
$MESS["CLU_AFTER_CONNECT_MSG"] = "Pagrindin� duomen� baz� ir sistemos aplinka turi b�ti sukonfig�ruoti taip, kad nelikt� bylos php_interface/after_connect.php.";
$MESS["CLU_AFTER_CONNECT_WIZREC"] = "Atlikite b�tinus nustatymus. �sitikinkite, kad produktas veikia tinkamai. I�trinkite byl� ir paleiskite vedl� dar kart�.";
$MESS["CLU_CHARSET_MSG"] = "Serverio, duomen� baz�s, ry�io ir kliento koduot�s turi sutapti.";
$MESS["CLU_CHARSET_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;character_set_server (dabartin� reik�m�: #character_set_server#),<br />
&nbsp;character_set_database (dabartin� reik�m�: #character_set_database#),<br />
&nbsp;character_set_connection (dabartin� reik�m�: #character_set_connection#),<br />
&nbsp;character_set_client (dabartin� reik�m�: #character_set_client#).<br />
�sitikinkite, kad produktas veikia tvarkingai, ir v�l paleiskite vedl�.";
$MESS["CLU_COLLATION_MSG"] = "Serveris, duomen� baz�s ir jungtys turi naudoti tas pa�ias r��iavimo taisykles.";
$MESS["CLU_COLLATION_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;collation_server (dabartin� reik�m�: #collation_server#),<br />
&nbsp;collation_database (dabartin� reik�m�: #collation_database#),<br />
&nbsp;collation_connection (dabartin� reik�m�: #collation_connection#).<br />
�sitikinkite, kad produktas veikia tvarkingai, ir v�l paleiskite vedl�.";
$MESS["CLU_SERVER_ID_MSG"] = "Kiekvienas klasterio mazgas turi tur�ti unikal� ID (dabartinis serverio ID: #server-id#).";
$MESS["CLU_LOG_BIN_MSG"] = "Pagrindinio serverio �urnaliavimas turi b�ti �jungtas (dabartin� vert� log-bin: #log-bin#).";
$MESS["CLU_LOG_BIN_NODE_MSG"] = "Naujo serverio �urnaliavimas turi b�ti �jungtas (dabartin� vert� log-bin: #log-bin#).";
$MESS["CLU_LOG_BIN_WIZREC"] = "Prid�kite parametr� log-bin=mysql-bin � my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_SKIP_NETWORKING_MSG"] = "Pirminis serveris turi b�ti pasiekiamas i� tinklo (dabartin� reik�m� skip-networking: #skip-networking#).";
$MESS["CLU_SKIP_NETWORKING_NODE_MSG"] = "Tinklas turi b�ti prieinamas naujam sukurtam serveriui (dabartin� reik�m� skip-networking: #skip-networking#).";
$MESS["CLU_SKIP_NETWORKING_WIZREC"] = "Byloje my.cnf i�trinkite arba u�komentuokite parametr� skip-networking. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_FLUSH_ON_COMMIT_MSG"] = "Naudojant InnoDB, replikacijos patikimumui, nustatykite parametr� innodb_flush_log_at_trx_commit = 1 (dabartin� reik�m�: #innodb_flush_log_at_trx_commit#).";
$MESS["CLU_SYNC_BINLOG_MSG"] = "Naudojant InnoDB, replikacijos patikimumui, nustatykite parametr� sync_binlog = 1 (dabartin� reik�m�: #sync_binlog#).";
$MESS["CLU_SYNC_BINLOGDODB_MSG"] = "Gali b�ti nustatyta replikacija tik vienos duomen� baz�s.";
$MESS["CLU_SYNC_BINLOGDODB_WIZREC"] = "Prid�kite parametr� binlog-do-db=#database# � my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_MASTER_CHARSET_MSG"] = "Kodavimas ir r��iavimo taisykl�s pirminio serverio ir naujo ry�io turi b�ti analogi�ki.";
$MESS["CLU_MASTER_CHARSET_WIZREC"] = "Nustatykite MySQL parametrus:<br />
&nbsp;character_set_server (dabartin� reik�m�: #character_set_server#),<br />
&nbsp;collation_server (dabartin� reik�m�: #collation_server#).<br />
�sitikinkite, kad produktas veikia tvarkingai, ir v�l paleiskite vedl�.";
$MESS["CLU_SERVER_ID_WIZREC1"] = "Nenurodytas parametras server-id";
$MESS["CLU_SERVER_ID_WIZREC2"] = "Duomen� baz� su tokiu server-id modulyje jau yra.";
$MESS["CLU_SERVER_ID_WIZREC"] = "Prid�kite ir nustatykite parametr� server-id byloje my.cnf. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_SQL_MSG"] = "Naudotojas privalo tur�ti teises kurti ir trinti lenteles, taip pat �terpti, pasirinkti, redaguoti ir trinti duomenys.";
$MESS["CLU_SQL_WIZREC"] = "Nepakanka teisi�. Sekan�ios SQL u�klausos nebuvo �vykdytos: #sql_erorrs_list#";
$MESS["CLU_RUNNING_SLAVE"] = "�ioje duomen� baz�je jau prad�tas replikacijos procesas. Prijungimas ne�manomas.";
$MESS["CLU_SAME_DATABASE"] = "�i duomen� baz� yra tokia pati kaip pirmin�. Prijungimas ne�manomas.";
$MESS["CLU_MASTER_CONNECT_ERROR"] = "Pirmin�s duomen� baz�s ry�io klaida.";
$MESS["CLU_NOT_MASTER"] = "Nurodyta duomen� baz� n�ra pirmin�.";
$MESS["CLU_MAX_ALLOWED_PACKET_MSG"] = "Slave duomen� baz�s parametro \"max_allowed_packet\" vert� neturi b�ti ma�esn� nei pirmin�s duomen� baz�s.";
$MESS["CLU_MAX_ALLOWED_PACKET_WIZREC"] = "Nustatykite \"max_allowed_packet\" parametr� byloje my.cnf ir perkraukite MySQL.";
$MESS["CLU_SLAVE_VERSION_MSG"] = "Slave duomen� baz�s MySQL versija (#slave-version#) turi ne �emesn� nei #required-version# versija.";
$MESS["CLU_VERSION_MSG"] = "Slave duomen� baz�s MySQL versija (#slave-version#) turi ne �emesn� nei pirmin�s duomen� baz�s versija (#master-version#).";
$MESS["CLU_SLAVE_RELAY_LOG_MSG"] = "Nenurodytas \"relay-log\" parametras. Replikacija bus nutraukta jei serverio pavadinimas pasikeis.";
$MESS["CLU_RELAY_LOG_WIZREC"] = "my.cnf byloje nustatykite \"relay-log\" parametro vert� (pvz mysqld-relay-bin) ir perkraukite MySQL.";
$MESS["CLU_VERSION_WIZREC"] = "Atnaujinkite savo MySQL ir paleiskite vedl� dar kart�.";
$MESS["CLU_MASTER_STATUS_MSG"] = "Nepakanka prieigos teisi� patikrinti replikacijos status�.";
$MESS["CLU_MASTER_STATUS_WIZREC"] = "Atlikite u�klaus�:  #sql#.";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_ERR_MSG"] = "Serveryje su ID lygiu #node_id# nuodyta neteisinga parametro auto_increment_increment vert�. Jis turi b�ti lygus #value# (dabartin� vert�: auto_increment_increment: #current#).";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_NODE_ERR_MSG"] = "Naujame serveryje nuodyta neteisinga parametro auto_increment_increment vert�. Jis turi b�ti lygus #value# (dabartin� vert�: auto_increment_increment: #current#).";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_WIZREC"] = "Nustatykite parametro auto_increment_increment byloje my.cnf vert� � #value#. Tada perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_AUTO_INCREMENT_INCREMENT_OK_MSG"] = "Klasterio serveriuose parametro auto_increment_increment vert� turi b�ti lygi #value#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_ERR_MSG"] = "Serveryje ID# #node_id# nustatyta netinkama parametro auto_increment_offset vert�. Ji neturi b�ti lygi #current#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_NODE_ERR_MSG"] = "Naujame serveryje nustatyta netinkama parametro auto_increment_offset vert�. Ji neturi b�ti lygi #current#.";
$MESS["CLU_AUTO_INCREMENT_OFFSET_WIZREC"] = "Byloje my.cnf nustatykite parametro auto_increment_offset kitoki� vert� nei kituose serveriuose. Perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_AUTO_INCREMENT_OFFSET_OK_MSG"] = "Klasterio serveri� auto_increment_offset vert�s netur�t� sukelti konflikt�.";
$MESS["CLU_RELAY_LOG_ERR_MSG"] = "Serveryje, kurio ID lygus #node_id# ne�jungtas �urnalo skaitymas (dabartin� vert� relay-log: #relay-log#).";
$MESS["CLU_RELAY_LOG_OK_MSG"] = "Klasterio serveriuose turi b�ti �jungtas �urnalo skaitymas (parametras relay-log).";
$MESS["CLU_LOG_SLAVE_UPDATES_MSG"] = "Serveryje ID #node_id# ne�jungtas u�klaus� �urnaliavimas at�jusi� i� pirmin�s (master) duomen� baz�s. To gali prireikti jei prie jo bus prijungtos slave duomen� baz�s. Dabartin� reik�m� log-slave-updates: #log-slave-updates#.";
$MESS["CLU_LOG_SLAVE_UPDATES_WIZREC"] = "Nustatykite \"log-slave-updates\" parametro vert� � #value# byloje my.cnf. Perkraukite MySQL ir spauskite \"Next\".";
$MESS["CLU_LOG_SLAVE_UPDATES_OK_MSG"] = "Pagrindiniuose klasterio serveriuose turi b�ti �jungtas u�klaus� registravimas (�urnaliavimas) at�jusi� i� kit� pagrindini� duomen� bazi�.";
?>