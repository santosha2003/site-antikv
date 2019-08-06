<?
$MESS["SEC_OTP_SECRET_KEY"] = "Slaptas raktas (tiekiamas su �renginiu)";
$MESS["SEC_OTP_INIT"] = "Inicializacija";
$MESS["SEC_OTP_PASS1"] = "Pirmasis �renginio slapta�od� (paspauskite ir u�ra�ykite)";
$MESS["SEC_OTP_PASS2"] = "Antrasis �renginio slapta�od� (paspauskite ir u�ra�ykite)";
$MESS["SEC_OTP_TYPE"] = "Slapta�od�io generavimo algoritmas";
$MESS["SEC_OTP_STATUS"] = "Dabartinis statusas";
$MESS["SEC_OTP_STATUS_ON"] = "�jungtas";
$MESS["SEC_OTP_NEW_ACCESS_DENIED"] = "Prieiga prie dviej� etap� autentifikavimo kontrol�s buvo atmesta.";
$MESS["SEC_OTP_NEW_SWITCH_ON"] = "�jungti dviej� etap� autentifikacij�";
$MESS["SEC_OTP_DESCRIPTION_INTRO_TITLE"] = "Vienkartinis slapta�odis";
$MESS["SEC_OTP_DESCRIPTION_INTRO_SITE"] = "�iandien naudotojas panaudoja prisijungimo vard� ir slapta�od�, nor�damas prisijungti prie j�s� svetain�s. Ta�iau yra b�dai, kaip piktybinis naudotojas gali patekti � j�s� kompiuter� ir pavogti �iuos duomenis, pavyzd�iui, jei naudotojas i�saugo savo slapta�od�. <br>
<b> Dviej� �ingsni� autentifikavimas </b> yra rekomenduojama galimyb� apsisaugoti nuo �silau��li� programin�s �rangos. Kiekvien� kart�, kai naudotojas prisijungia prie sistemos, jis tur�s i�laikyti dviej� lygi� patikrinim�. Pirma, �vesti naudotojo vard� ir slapta�od�. Po to �vesti vienkartin� saugos kod�, i�si�sti � jo mobil�j� prietais�. Esm� yra ta, kad u�puolikas negali pavogti duomen�, nes jis ne�ino saugumo kodo.";
$MESS["SEC_OTP_DESCRIPTION_INTRO_INTRANET"] = "Nuo �iol J�s� Bitrix24 yra apsaugotas duomen� �ifravimo technologija, prisijungimo vardu ir slapta�od�iu kiekvienam darbuotojui.
<br>
<b>Dviej� �ingsni� autentifikavimas </b> yra rekomenduojama galimyb� apsisaugoti j�s� Bitrix24 nuo �silau��li� programin�s �rangos. Kiekvien� kart�, kai naudotojas prisijungia prie sistemos, jis tur�s i�laikyti dviej� lygi� patikrinim�. Pirma, �vesti naudotojo vard� ir slapta�od�. Po to �vesti vienkartin� saugos kod�, i�si�sti � jo mobil�j� prietais�. Esm� yra ta, kad u�puolikas negali pavogti duomen�, nes jis ne�ino saugumo kodo.";
$MESS["SEC_OTP_DESCRIPTION_USING_TITLE"] = "Naudojamas vienkartinis slapta�odis";
$MESS["SEC_OTP_DESCRIPTION_USING_STEP_0"] = "�ingsnis 1";
$MESS["SEC_OTP_DESCRIPTION_USING_STEP_1"] = "�ingsnis 2";
$MESS["SEC_OTP_DESCRIPTION_USING"] = "Kai �jungtas dviej� etap� autentifikavimas, naudotojas tur�s i�laikyti dviej� lygi� patikrinim�. <br>
Pirma, �vesti savo elektroninio pa�to adres� ir slapta�od�, kaip �prasta. <br>
Po to �vesti vienkartin� apsaugos kod�, i�si�sta � jo mobil�j� prietais� ar gaut� special�j� rakt�.";
$MESS["SEC_OTP_DESCRIPTION_ACTIVATION_TITLE"] = "Aktivavimas ";
$MESS["SEC_OTP_DESCRIPTION_ACTIVATION"] = "Vienkartinis kodas dviej� pakop� autentifikavimui gali b�ti gautas naudojant special� �tais� (raktas), arba nemokam� mobili�j� aplikacij� (Bitrix OTP) kiekvienas naaudotojas turi �diegti savo mobiliajame prietaise. <br>
Nor�damas �jungti rakt�, administratorius tur�s atidaryti naudotojo profil� ir �vesti du sugeneruotus slapta�od�ius. <br>
Nor�damas gauti vienkartin� kod� � mobil�j� prietais�, naudotojas gali atsisi�sti ir paleisti aplikacij� ir nuskaityti QR kod� nustatym� puslapyje savo naudotojo profilyje arba �vesti paskyros duomenis rankiniu b�du.";
$MESS["SEC_OTP_DESCRIPTION_ABOUT_TITLE"] = "Apra�ymas";
$MESS["SEC_OTP_DESCRIPTION_ABOUT"] = "Vienkartinis slapta�odis (OTP) buvo sukurtas kaip dalis OATH iniciatyva. <br>
OTP remiasi hmac ir SHA-1 / SHA-256 / SHA-512. �iuo metu, du algoritmai yra palaikomi generuoti kodus:
<ul> <li> pagal skaitikl� (hmac Vienkartinis slapta�odis, HOTP), kaip apra�yta <a href=\"https://tools.ietf.org/html/rfc4226\" target=\"_blank\"> RFC4226 </> </li>
<li> pagal laik� (laiko pagrindu vienkartinis slapta�od�, TOTP), kaip apra�yta <a href=\"https://tools.ietf.org/html/rfc6238\" target=\"_blank\"> RFC6238 </a> </li> </ul>
Apskai�iuoti OTP rert� algoritmas paima du �vesties parametrus: slaptas raktas (pradin� reik�m�) ir dabartin� skaitiklio vert� (reikaling� cikl� generavimo skai�i� arba esam� laik�, priklausomai nuo algoritmo). Pradin� reik�m� yra i�saugoma prietaise ir svetain�je, kai tik prietaisas buvo inicijuotas. Jei naudojant HOTP, prietaiso skaitiklis did�ja per kiekvien� OTP generavim�, o serverio skaitiklis kei�iasi per kiekvien� s�kming� OTP autentifikavim�. Jei naudojate TOTP, skaitiklis n�ra i�saugomas prietaise, ir serveris stebi galimus laiko poky�ius prietaise per kiekvien� s�kming� OTP autentifikavim�. <br>
Kiekvienas i� OTP prietais� partijoje turi �ifruot� fail�, kuriame yra pradin�s reik�m�s (slapti raktai) kiekvienam partijos �renginiui, failas priri�tas prie prietaiso serijos numerio, kur� galima rasti ant prietaiso. <br>
Jei prietaiso ir serverio generatoriaus skaitikliai tampa nesinchronizuoti, j�s galite lengvai sinchronizuot juos i� naujo pagal serverio reik�mes � reik�mes, saugomus �renginyje. �i proced�ra reikalauja, kad sistemos administratorius (ar naudotojas, kuris turi pakankamai teisi�) generuot� dvi i� eil�s OTP reik�mes ir �vest� juos svetain�je.<br>
J�s galite rasti mobili�j� aplikacij� AppStore ir GooglePlay.";
$MESS["SEC_OTP_CONNECT_MOBILE_TITLE"] = "Pajungti mobil� prietais�";
$MESS["SEC_OTP_CONNECT_MOBILE_STEP_1"] = "Atsisi�sti Bitrix OTP mobiliojo aplikacij� j�s� telefonui <a href=\"https://itunes.apple.com/en/app/bitrix24-otp/id929604673?l=en\" target=\"_new\">AppStore</a> on <a href=\"https://play.google.com/store/apps/details?id=com.bitrixsoft.otp\" target=\"_new\">GooglePlay</a>";
$MESS["SEC_OTP_CONNECT_MOBILE_STEP_2"] = "Paleisti aplikacij� ir paspausti <b>Konfig�ruoti</b>";
$MESS["SEC_OTP_CONNECT_MOBILE_STEP_3"] = "Pasirinkite, kaip j�s norite �vesti duomenis: naudojant QR kod� rankiniu b�du";
$MESS["SEC_OTP_CONNECT_MOBILE_SCAN_QR"] = "Prid�kite j�s� mobili�j� prietais� prie monitoriaus ir palaukite, kol aplikacija nuskaitys kod�.";
$MESS["SEC_OTP_CONNECT_MOBILE_MANUAL_INPUT"] = "Nor�dami �vesti duomenis rankiniu b�du, nurodykite svetain�s adres�, savo el.pa�t� arba naudotojo vard�, slapt� kod� paveiksl�lyje ir pasirinkite pagrindin� tip�.";
$MESS["SEC_OTP_CONNECT_MOBILE_MANUAL_INPUT_HOTP"] = " ";
$MESS["SEC_OTP_CONNECT_MOBILE_MANUAL_INPUT_TOTP"] = "pagal laik�";
$MESS["SEC_OTP_CONNECT_MOBILE_INPUT_DESCRIPTION"] = "Kai kodas bus s�kmingai nuskaitytas ar �ra�ytas rankiniu b�du, j�s� mobilusis telefonas parodys kod�, kur� tur�site �vesti �emiau.";
$MESS["SEC_OTP_CONNECT_MOBILE_ENTER_CODE"] = "�vesti kod�";
$MESS["SEC_OTP_CONNECT_MOBILE_INPUT_NEXT_DESCRIPTION"] = "OTP algoritmas reikalauja dviej� kodus autentifikavimui. Pra�ome generuoti kit� kod� ir �vesti j� �emiau.";
$MESS["SEC_OTP_CONNECT_MOBILE_ENTER_NEXT_CODE"] = "�vesti kit� kod�";
$MESS["SEC_OTP_CONNECT_DONE"] = "Pasireng�s";
$MESS["SEC_OTP_CONNECT_DEVICE_TITLE"] = "Prijunkite rakt�";
$MESS["SEC_OTP_CONNECTED"] = "Prisijung�s ";
$MESS["SEC_OTP_ENABLE"] = "�jungti";
$MESS["SEC_OTP_DISABLE"] = "I�jungti ";
$MESS["SEC_OTP_SYNC_NOW"] = "Sinchronizuoti";
$MESS["SEC_OTP_MOBILE_INPUT_METHODS_SEPARATOR"] = "arba";
$MESS["SEC_OTP_MOBILE_SCAN_QR"] = "Skenuoti QR kod�";
$MESS["SEC_OTP_MOBILE_MANUAL_INPUT"] = "�vesti kod� rankiniu b�du";
$MESS["SEC_OTP_CONNECT_DEVICE"] = "Prijunkite rakt�";
$MESS["SEC_OTP_CONNECT_MOBILE"] = "Prijungti mobil� prietais�";
$MESS["SEC_OTP_CONNECT_NEW_DEVICE"] = "Prijunkite nauj� rakt�";
$MESS["SEC_OTP_CONNECT_NEW_MOBILE"] = "Prijungti nauj� mobil� prietais�";
$MESS["SEC_OTP_ERROR_TITLE"] = "Nepavyko i�saugoti, nes �vyko klaida. ";
$MESS["SEC_OTP_UNKNOWN_ERROR"] = "Netik�ta klaida. Pra�ome pabandyti v�liau.";
$MESS["SEC_OTP_RECOVERY_CODES_BUTTON"] = "Atstatymo kodai";
$MESS["SEC_OTP_RECOVERY_CODES_TITLE"] = "Atstatymo kodai";
$MESS["SEC_OTP_RECOVERY_CODES_DESCRIPTION"] = "Nukopijuokite atk�rimo kodus, kuri� jums gali prireikti, jei j�s neteksite savo mobiliojo prietaiso ar negal�site gauti kod� per aplikacij� d�l bet kurios kitos prie�asties.";
$MESS["SEC_OTP_RECOVERY_CODES_WARNING"] = "Laikykite jas patogiai, tarkim, j�s� pinigin�je ar rankin�je. Kiekvienas i� kod� gali b�ti naudojamas tik vien� kart�.";
$MESS["SEC_OTP_RECOVERY_CODES_PRINT"] = "Spausdinti";
$MESS["SEC_OTP_RECOVERY_CODES_SAVE_FILE"] = "I�saugoti � tekstin� fail�";
$MESS["SEC_OTP_RECOVERY_CODES_REGENERATE_DESCRIPTION"] = "Sutrumpinti pagal atk�rimo kodus?<br/>
Kurti naujus.  <br/><br/>
Nauj� atk�rimo kod� k�rimas paneigia <br/> anks�iau gautus kodus.";
$MESS["SEC_OTP_RECOVERY_CODES_REGENERATE"] = "Generuoti nauj� kod�";
$MESS["SEC_OTP_RECOVERY_CODES_NOTE"] = "Kodas gali b�ti naudojamas tik vien� kart�. Patarimas: pa�alinti panaudotus kodus i� s�ra�o.";
$MESS["SEC_OTP_WARNING_RECOVERY_CODES"] = "Dviej� etap� autentifikavimas yra �jungtas, ta�iau j�s negalite sukurti atk�rimo kod�. Jums gali juos prireikti, jei j�s netekote savo mobiliojo prietaiso ar negalite gauti kodo per aplikacij� d�l bet kurios kitos prie�asties.";
$MESS["SEC_OTP_NO_DAYS"] = "visada";
$MESS["SEC_OTP_DEACTIVATE_UNTIL"] = "I�jungta iki #DATE#";
$MESS["SEC_OTP_MANDATORY_EXPIRED"] = "Laikas, per kur� naudotojas turi nustatyti dviej� etap� autentifikavim�, jau pasibaig�s.";
$MESS["SEC_OTP_MANDATORY_ALMOST_EXPIRED"] = "Laikas, per kur� naudotojas turi nustatyti dviej� etap� autentifikavim�, pasibaigs #DATE#.";
$MESS["SEC_OTP_MANDATORY_DISABLED"] = "Privalomas dviej� etap� autentifikavimas i�jungtas.";
$MESS["SEC_OTP_MANDATORY_ENABLE_DEFAULT"] = "Reikalauja dviej� etap� autentifikavimo aktyvavimo";
$MESS["SEC_OTP_MANDATORY_ENABLE"] = "Reikalauja dviej� etap� autentifikavimo aktyvavimo per";
$MESS["SEC_OTP_MANDATORY_DEFFER"] = "I�pl�timas";
?>