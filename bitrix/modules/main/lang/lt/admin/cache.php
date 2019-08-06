<?
$MESS["MCACHE_TITLE"] = "Pod�lio nustatymai";
$MESS["MAIN_OPTION_HTML_CACHE"] = "HTML puslapio karta";
$MESS["MAIN_TAB_3"] = "Pa�alinti pod�lio failus";
$MESS["MAIN_TAB_2"] = "HTML pod�lis";
$MESS["MAIN_TAB_4"] = "Komponent� pad�jimas";
$MESS["MAIN_OPTION_CLEAR_CACHE"] = "Pa�alinti pod�lio failus";
$MESS["MAIN_OPTION_PUBL"] = "Komponent� pod�lio nustatymai";
$MESS["MAIN_OPTION_CLEAR_CACHE_OLD"] = "Tik pasenusius";
$MESS["MAIN_OPTION_CLEAR_CACHE_ALL"] = "Visus";
$MESS["MAIN_OPTION_CLEAR_CACHE_MENU"] = "Meniu";
$MESS["MAIN_OPTION_CLEAR_CACHE_MANAGED"] = "Vis� valdom� pod�l�";
$MESS["MAIN_OPTION_CLEAR_CACHE_STATIC"] = "Visus puslapius HTML pod�lyje";
$MESS["MAIN_OPTION_CLEAR_CACHE_CLEAR"] = "I�valyti";
$MESS["MAIN_OPTION_CACHE_ON"] = "Komponent� pod�lis yra �jungtas pagal nutyl�jim�";
$MESS["MAIN_OPTION_CACHE_OFF"] = "Komponent� pod�lis yra i�jungtas pagal numatym�";
$MESS["MAIN_OPTION_CACHE_BUTTON_OFF"] = "I�jungti pad�jim�";
$MESS["MAIN_OPTION_CACHE_BUTTON_ON"] = "�jungti pad�jim�";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING"] = "D�mesio! Aptikti statistikos ir/ar reklamos moduliai. Duomenys HTML pod�lyje bus sekami neteisingai.";
$MESS["MAIN_OPTION_HTML_CACHE_WARNING_TRANSID"] = "D�mesio! session.use_trans_sid parametras yra �jungtas. HTML pad�jimas neveiks.";
$MESS["MAIN_OPTION_HTML_CACHE_ON"] = "HTML pod�lis yra ijungtas";
$MESS["MAIN_OPTION_HTML_CACHE_OFF"] = "HTML pod�lis yra i�jungtas";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_OFF"] = "I�jungti HTML pod�l�";
$MESS["MAIN_OPTION_HTML_CACHE_BUTTON_ON"] = "�jungti HTML pod�l�";
$MESS["MAIN_OPTION_HTML_CACHE_OPT"] = "HTML pod�lio nustatymai";
$MESS["MAIN_OPTION_HTML_CACHE_INC_MASK"] = "�traukimo kauk�";
$MESS["MAIN_OPTION_HTML_CACHE_EXC_MASK"] = "I�skirimo kauk�";
$MESS["MAIN_OPTION_HTML_CACHE_QUOTA"] = "Disko kvota (MB)";
$MESS["MAIN_OPTION_HTML_CACHE_SUCCESS"] = "HTML pod�lio re�imas buvo s�kmingai pakeistas.";
$MESS["MAIN_OPTION_HTML_CACHE_STAT"] = "Statistika";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_HITS"] = "Pod�lio spustel�jimai";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_MISSES"] = "N�ra talpyklos";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_QUOTA"] = "Laikinosios atminties valym� suk�l� vietos diske tr�kumas";
$MESS["MAIN_OPTION_HTML_CACHE_STAT_POSTS"] = "Laikinosios atminties valym� suk�l� duomen� pakeitimas";
$MESS["MAIN_OPTION_HTML_CACHE_SAVE"] = "I�saugoti HTML laikinosios atminties nustatymus";
$MESS["MAIN_OPTION_HTML_CACHE_RESET"] = "Taikyti numatytuosius nustatymus";
$MESS["cache_admin_note4"] = "<p>HTML pod�liavimas rekomenduojamas svetain�s skyriams, kurie yra kei�iami retai ir da�niausiai lankomi anonimini� vartotoj�. Kai HTML pod�lis �jungta, vyksta �ie procesai: </p>
<ul style=\"font-size:100%\">
<li>HTML talpyklos procesai tik i�vardyti �traukimo kauk�s ir nei�vardyti atskirties kauk�s;</li>
<li>D�l neautorizuot� lankytoj�, sistemos patikrinimas d�l puslapio kopijos saugomas HTML pod�lyje. Jei puslapis yra rastas pod�lyje, jis rodomas be sistemini� moduli�. Statistika nesteb�s lankytoj�. Skelbimai, branduolis ir kiti moduliai taip pat nebus �traukti;</li>
<li>Puslapiai bus siun�iami suspausti, jei Suspaudimo modulis �diegtas � pod�l� jo generavimo metu;</li>
<li>Jei puslapio pod�lio nerasta, ji yra apdorojamas �prastu b�du. Baigus puslapio �k�lim�, puslapio kopija bus i�saugota HTML pod�lyje;</li>
</ul>
<p>Pod�lio valymas:</p>
<ul style=\"font-size:100%\">
<li>Jei duomen� �ra�ymo metu vir�yjama disko kvota, pod�lis visi�kai i�kraunamas;</li>
<li>Pilnas pod�lio i�krovimas taip pat atliekamas, jei kokie nors duomenys pasikeit� per Valdymo skydel�;</li>
<li>Jei duomenys yra patalpinami i� vie��j� svetain�s puslapi�  (pvz. pridedant pastabas ar balsus), tada i�kraaunamos tik dalys, susijusios su pod�liu;</li>
</ul>
<p>Atkreipkite d�mes�, kad kai neautorizuoti naudotojai aplanko nepod�liuojamose svetain�s puslapiuose, sesijos bus prad�ta ir HTML-pod�lis nebebus aktyvus.</p>
<p>Svarbios pastabos:</p>
<ul style=\"font-size:100%\">
<li>Statistika n�ra stebima;</li>
<li>Skelbim� modulis veiks tik HTML pod�lio sulurimo metu. Atkreipkite d�mes�, kad tai neturi �takos i�orini� moduli� skelbimams (Google Ad Sense ir tt);</li>
<li>Lyginam� objekt� rezultatai nebus i�saugoti neautorizuotiems naudotojams (sesija tur�t� b�ti prad�ta);</li>
<li>Disko kvota turi b�ti nustatyta siekiant i�vengti DOS atakas � disk�;</li>
<li>Vis� svetain�s skyri� funkcionalumas turi b�ti patikrintas, �jungus HTML pod�l� (pvz. Blog'o Komentarai neveiks su senais blog� �ablonais ir tt);</li>
</ul>";
$MESS["MAIN_OPTION_CACHE_OK"] = "Laikinosios atminties failai i�valyti";
$MESS["MAIN_OPTION_CACHE_SUCCESS"] = "Komponent� pad�jimo tipas s�kmingai perjungtas";
$MESS["MAIN_OPTION_CACHE_ERROR"] = "Komponent� pad�jimo tipas jau nustatytas pagal �i� reik�m�";
$MESS["cache_admin_note1"] = "<p>Auto pod�lio re�imo naudojimas nuostabiai pagreitina j�s� svetain�!</p>
<p>Auto pod�lio komponent� re�imas atnaujina informacij� pagal t� komponent� parametrus.</p>
<p>Jei norite atnaujinti i�saugotus objektus puslapyje, j�s galite:</p>
<p>1. Atidarykite reikiam� puslap� ir atnaujinkite savo objektus, paspaud� special� duomen� atnaujinimo mygtuk� administracinioje  �ranki� juostoje.</p>
<img src=\"/bitrix/images/main/page_cache_en.png\" vspace=\"5\" />
<p>2. Svetain�s redagavimo re�ime  j�s galite spustel�ti pod�lio i�valymo mygtuk� pasirinktas komponentui. </p>
<img src=\"/bitrix/images/main/comp_cache_en.png\" vspace=\"5\" />
<p>3. Eikite � komponento parametrus ir perjunkite reikalingus komponentus � nei�saugojimo pod�lyje re�im�.</p>
<img src=\"/bitrix/images/main/spisok_en.png\" vspace=\"5\" />
<p>�jungus i�saugojimo pod�lyje re�im� (pagal nutyl�jim�) visi komponentai su pod�lio nustatymu <i>\"Auto\"</i> bus perjungti darbui su pod�liu.</p>
<p>Komponentai su pod�lio nustatymu <i>\"Pod�lis\"</i> ir su nustatytu laiku didesniu nei 0 (nulis) visada veiks pod�lio re�ime.</p>
<p>Komponentai su pod�lio nustatymu <i>\"Nenaudoti pod�lio\"</i> arba su pod�lio laiku lygi� 0 (nulis), visada veiks ne pod�lio r��imu.</p>";
$MESS["cache_admin_note2"] = "Pa�alinus pod�lio failus, visas rodomas turinys bus atnaujintas atsi�velgiant � naujus duomenis.
Nauji pod�lio failai bus sukurti palaipsniui pagal u�klausimus � tuos puslapius (su pod�lio sritimis).";
$MESS["main_cache_managed_saved"] = "Valdomo pod�lio parametrai buvo i�saugoti.";
$MESS["main_cache_managed"] = "Valdomas pod�lis";
$MESS["main_cache_managed_sett"] = "Valdomo pod�lio parametrai";
$MESS["main_cache_managed_on"] = "Valdomas pod�lis yra �jungtas.";
$MESS["main_cache_managed_off"] = "Valdomas pod�lis yra i�jungtas (nerekomenduojama).";
$MESS["main_cache_managed_turn_off"] = "��jungti valdom� pod�l� (nerekomenduojama).";
$MESS["main_cache_managed_const"] = "BX_COMP_MANAGED_CACHE konstanta nustatyta. Valdomas pod�lis pastoviai �jungtas.";
$MESS["main_cache_managed_turn_on"] = "�jungti valdom� pod�l�";
$MESS["main_cache_managed_note"] = "Pod�lio valdymo technologija <b>Cache Dependencies</b> atnaujina pod�l� kas kart� kai vyksta duomen� pakeitimai. Jei �i funkcija �jungta, jums nereik�s atnaujinti pod�lio rankiniu b�du, atnaujinant naujienas ar produktus: svetain�s lankytojai visada matys aktuali� atnaujint� informacij�.

<br><br>Gaukite daugiau informacijos apie pod�lio technologijas Bitrix svetain�je.
<br><br><span style=\"color:grey\">Pastaba: ne visi komponentai gali palaikyti �i� funkcij�.</span>";
$MESS["cache_admin_note5"] = "HTML pod�lis visada �jungtas �ioje laidoje.";
$MESS["main_cache_wrong_cache_type"] = "Neteisingas pod�lio tipas.";
$MESS["main_cache_wrong_cache_path"] = "Neteisingas pod�lio failo kelias.";
$MESS["main_cache_in_progress"] = "�alinami pod�lio failai.";
$MESS["main_cache_finished"] = "Pod�lio failai yra pa�alinti.";
$MESS["main_cache_files_scanned_count"] = "Apdorota:  #value#";
$MESS["main_cache_files_scanned_size"] = "Apdorot� fail� dydis: #value#";
$MESS["main_cache_files_deleted_count"] = "Pa�alinta:  #value#";
$MESS["main_cache_files_deleted_size"] = "Pa�alint� fail� dydis: #value#";
$MESS["main_cache_files_delete_errors"] = "�alinimo klaidos: #value#";
$MESS["main_cache_files_last_path"] = "Dabartinis aplankas: #value#";
$MESS["main_cache_files_start"] = "Prad�ti";
$MESS["main_cache_files_continue"] = "T�sti";
$MESS["main_cache_files_stop"] = "Nutraukti";
?>