<?
$MESS["VIRUS_DETECTED_NAME"] = "Aptiktas virusas";
$MESS["VIRUS_DETECTED_DESC"] = "#EMAIL# - Svetain�s administratoriaus e-pa�to adresas (i� branduolio modulio nustatym�)";
$MESS["VIRUS_DETECTED_SUBJECT"] = "#SITE_NAME#: Aptiktas virusas";
$MESS["VIRUS_DETECTED_MESSAGE"] = "Informacinis prane�imas i� #SITE_NAME# 

------------------------------------------

J�s gavote �� prane�im� kaip potencialiai pavojingo kodo aptikimo rezultat� i� proaktyvios #SERVER_NAME#  apsaugos sistemos.

1.  Potencialiai pavojingas kodas buvo i�kirptas i� html. 
2.  Patikrinkite �vyki� �urnal� ir �sitikinkite, kad kodas yra i� ties� �alingas, ir tai ne vien skaitiklis arba strukt�ra.
	(nuoroda: http://#SERVER_NAME#/bitrix/admin/event_log.php?lang=en&set_filter=Y&find_type=audit_type_id&find_audit_type[]=SECURITY_VIRUS )
3.  Jei kodas yra nekenksmingas, �traukite j� � \"I�imt�i�\" s�ra�� antivirusos nustatym� puslapyje. 
	(nuoroda: http://#SERVER_NAME#/bitrix/admin/security_antivirus.php?lang=en&tabControl_active_tab=exceptions )
4.  Jei kodas yra virusas, tada atlikite �iuos �ingsnius:

	a) Pakeiskite administratoriaus ir kit� atsaking� vartotoj� prisijungimo slapta�od� svetain�je.
	b) Pakeiskite prisijungimo slapta�od� ssh ir ftp.
	c) I�tirkite ir pa�alinkite virusus i� administratori�, kurie turi prieig� prie svetain�s per ssh ar ftp, kompiuteri�.
	d) I�junkite slapta�od�i� saugojimo programas, kurios suteikia prieig� prie svetain�s per ssh ar ftp. 
	e) Pa�alinkite kenksming� kod� i� u�kr�st� fail�. Pavyzd�iui, i� naujo �diekite u�kr�stus failus naudojant naujausi� atsargin� kopij�.

---------------------------------------------------------------------
�is prane�imas buvo sugeneruotas automati�kai.";
?>