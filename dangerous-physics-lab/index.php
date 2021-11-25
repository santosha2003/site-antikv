<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><div>
	 Ремонт блока питания..
</div>
<div>
 <br>
</div>
<div>
 <b>Предупреждаю 21+ и не забывать средства защиты. Щиток из оргстекла 30 мм наушники для стрельбы огнетушитель. Аптечка.</b>
</div>
<div>
	 найдено к сети ( В раздел Электроника)<br>
</div>
<div>
 <br>
 <a href="https://firs-away.livejournal.com/profile" target="_self"><img src="https://l-stat.livejournal.net/img/userinfo_v8.svg?v=17080?v=500"></a><a href="https://firs-away.livejournal.com/" target="_self"><b>firs_away</b></a> <br>
 <a href="https://www.livejournal.com/subscribers/add?instant_relation=1&user=firs_away&instant_relation_source=before_post" target="_self">
	Подписаться </a> <br>
	<ul>
		<li> <input type="checkbox"></li>
	</ul>
	<article>
	<dl>
		<dt> <img src="https://l-userpic.livejournal.com/81680682/17150158" title="Firs: pic#81680682" width="100" height="100" align="absmiddle"> </dt>
		<dd> Пишет Firs (<a href="https://firs-away.livejournal.com/profile" target="_self"><img src="https://l-stat.livejournal.net/img/userinfo_v8.svg?v=17080?v=500"></a><a href="https://firs-away.livejournal.com/" target="_self"><b>firs_away</b></a>) <br>
 <time><a href="https://firs-away.livejournal.com/2016/" target="_self">2016</a>-<a href="https://firs-away.livejournal.com/2016/12/" target="_self">12</a>-<a href="https://firs-away.livejournal.com/2016/12/20/" target="_self">20</a> 04:17:00</time> <br>
 </dd>
	</dl>
 <br>
	<ul>
		<li><a href="https://www.livejournal.com/go.bml?journal=firs_away&itemid=7496&dir=prev" title="Назад" target="_self">Назад</a></li>
		<li>
		Поделиться </li>
		<li><a href="https://www.livejournal.com/tools/content_flag.bml?user=firs_away&itemid=7496" title="Пожаловаться" target="_self">Пожаловаться</a></li>
		<li><a href="https://www.livejournal.com/go.bml?journal=firs_away&itemid=7496&dir=next" title="Вперёд" target="_self">Вперёд</a></li>
	</ul>
 <br>
 <section> Категории:
	<ul>
		<li> <a href="https://www.livejournal.com/category/obschestvo?utm_source=post" target="_self">Общество</a> </li>
		<li> <a href="https://www.livejournal.com/category/tehnika?utm_source=post" target="_self">Техника</a> </li>
	</ul>
 </section>
	<h1> Ремонт ATX блока питания AeroCool VP-450 </h1>
 <article> Небольшая заметка про ремонт блока питания AeroCool VP-450.<br>
 <br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/36238/36238_600.jpg" title=""><br>
 <br>
	 Блок питания почти классический. Кому интересно обзор можно почитать тут: <a href="http://www.3dnews.ru/927229/" target="_blank">http://www.3dnews.ru/927229/</a><br>
 <br>
	 Первое, что сразу бросается в глаза - взорванная дежурка.<br>
 <a href="http://ic.pics.livejournal.com/firs_away/17150158/36477/36477_original.jpg" target="_blank"><img src="https://ic.pics.livejournal.com/firs_away/17150158/36477/36477_600.jpg" title=""></a><br>
 <br>
	 Выпаиваем.<br>
 <a href="http://ic.pics.livejournal.com/firs_away/17150158/36778/36778_original.jpg" target="_blank"><img src="https://ic.pics.livejournal.com/firs_away/17150158/36778/36778_600.jpg" title=""></a><br>
	 Опознать затруднительно. Маркировки, как видно не осталось :( Сам блок плохо гуглится, вернее гуглится, но без маркировки дежурки.<br>
 <br>
	 Пытаюсь отрисовать по схеме:<br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/36870/36870_600.jpg" title=""><br>
 <br>
	 На сайте <a href="http://remont-aud.net/ic_power/" target="_blank">http://remont-aud.net/ic_power/</a> нашёл, что под нужную распиновку неплохо подходит <b>STR-A6059</b> или <b>STR-A6069</b>.<br>
 <br>
	 В итоге, нагуглил очень похожий блок питания, какой-то <strong><a href="https://vozforums.com/showthread.php?t=4189034" target="_blank">Xigmatek</a> </strong>(судя по картинкам<strong>,</strong> один в один с моим AeroCool).<br>
	 И там была вот такая картинка:<br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/37217/37217_600.jpg" title=""><br>
	 Из чего стало понятно, что дежурка всё таки <b>STR-A6069</b><br>
 <br>
	 На всякий случай, ещё разок сверил то, что я зарисовал, с мануалом на <a href="http://www.semicon.sanken-ele.co.jp/sk_content/str-a606xh_ds_en.pdf" target="_blank">STR-A6069</a>.<br>
 <br>
	 Поменял микросхему. Начал прозванивать обвязку вокруг. Пока искал, заодно нашёл потёкший конденсатор выпрямителя.<br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/37801/37801_600.jpg" title=""><br>
 <br>
	 Заменил его сразу.<br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/37563/37563_600.jpg" title=""><br>
 <br>
	 Обвязка на удивление оказалась целой, только поменял оптопару, на всякий случай.<br>
	 Заодно проверил резистор R9, в цепи контроля 380В PFC (идёт с 8 ноги ШИМ-а cm6805bg), говорят иногда его "обрывает", из-за чего следом выходит из строя электролит.<br>
 <img src="https://ic.pics.livejournal.com/firs_away/17150158/38036/38036_600.jpg" title=""><br>
	 Резистор оказался целый.<br>
 <br>
	 Сделал пробный запуск блока. Дежурка появилась, всё завелось.<br>
 <br>
	 Кратенько по блоку:<br>
	 [<b>Нажмите, чтобы прочитать</b>]<br>
 <br>
 </article><br>
 <br>
 <br>
 <br>
 <br>
 <strong> Метки: </strong> <a href="https://firs-away.livejournal.com/tag/a6069h" target="_self">a6069h</a>, <a href="https://firs-away.livejournal.com/tag/aerocool" target="_self">aerocool</a>, <a href="https://firs-away.livejournal.com/tag/aerocool%20vp-450" target="_self">aerocool vp-450</a>, <a href="https://firs-away.livejournal.com/tag/cm6805bg" target="_self">cm6805bg</a>, <a href="https://firs-away.livejournal.com/tag/st9s313a" target="_self">st9s313a</a>, <a href="https://firs-away.livejournal.com/tag/str-a6069" target="_self">str-a6069</a>, <a href="https://firs-away.livejournal.com/tag/stra6069" target="_self">stra6069</a>, <a href="https://firs-away.livejournal.com/tag/vp-450" target="_self">vp-450</a>, <a href="https://firs-away.livejournal.com/tag/%D0%A8%D0%98%D0%9C" target="_self">ШИМ</a>, <a href="https://firs-away.livejournal.com/tag/%D0%B4%D0%B5%D0%B6%D1%83%D1%80%D0%BA%D0%B0" target="_self">дежурка</a>, <a href="https://firs-away.livejournal.com/tag/%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%20ATX" target="_self">ремонт ATX</a>, <a href="https://firs-away.livejournal.com/tag/%D1%80%D0%B5%D0%BC%D0%BE%D0%BD%D1%82%20%D0%B1%D0%BB%D0%BE%D0%BA%D0%B0%20%D0%BF%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F" target="_self">ремонт блока питания</a> <br>
 <a href="https://firs-away.livejournal.com/7496.html#" target="_self"> </a> <a href="https://firs-away.livejournal.com/7496.html#">5</a> <br>
 <a href="https://www.livejournal.com/subscribers/add?instant_relation=1&user=firs_away&instant_relation_source=after_post" target="_self"> Подписаться </a> <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
	<h3>Новости партнеров</h3>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2689586&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fnasedkin.livejournal.com%2F2487386.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2689586%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/DC/A6/F3/250x120_1de50a8a-52b4-498b-bd85-38d1026fc112"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2689586&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fnasedkin.livejournal.com%2F2487386.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2689586%26rnet%3Dself_promo_lj" target="_blank">
	<h2>Топ-40 самых ярких фраз Путина на прямой линии</h2>
 </a><br>
 <br>
 <br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2683873&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fdenis-balin.livejournal.com%2F3808948.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2683873%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/BF/D2/30/250x120_a524866f-9843-45c2-91fe-bb04ac886a5d"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2683873&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fdenis-balin.livejournal.com%2F3808948.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2683873%26rnet%3Dself_promo_lj" target="_blank">
	<h2>Откуда пошли антипрививочники, почему в России их так много</h2>
 </a><br>
 <br>
 <br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2680793&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fnasedkin.livejournal.com%2F2484319.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2680793%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/87/7C/96/250x120_7c564360-1e98-4e12-a583-f61cda657455"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2680793&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fnasedkin.livejournal.com%2F2484319.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2680793%26rnet%3Dself_promo_lj" target="_blank">
	<h2>Фантастические фотографии настоящего СССР, которые вы не видели</h2>
 </a><br>
 <br>
 <br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2706725&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fygashae-zvezdu.livejournal.com%2F330835.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2706725%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/B0/DC/55/250x120_136_2706434_468.png"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2706725&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fygashae-zvezdu.livejournal.com%2F330835.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2706725%26rnet%3Dself_promo_lj" target="_blank">
	<h2>«‎Спрятал бриллианты в гробу матери»‎: сплетня, переломившая карьеру</h2>
 </a><br>
 <br>
 <br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2706726&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fpaisiypchelnik.livejournal.com%2F396185.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2706726%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/C4/0E/34/250x120_14c71ac7-65ef-4532-9c52-15300d402591"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2706726&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fpaisiypchelnik.livejournal.com%2F396185.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2706726%26rnet%3Dself_promo_lj" target="_blank">
	<h2>«Пищеблок»: леденящая история о пионерах-вампирах</h2>
 </a><br>
 <br>
 <br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2739854&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fp-syutkin.livejournal.com%2F731904.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2739854%26rnet%3Dself_promo_lj" target="_blank"><img src="https://static.rnet.plus/D6/69/E0/250x120_7f872787-6bc6-4ee9-b532-f0e15872188c"></a><br>
 <a href="https://api.rnet.plus//Service/TeaserClicked?block_id=27&teaser_id=2739854&user_id=232a024c-b840-39e6-30f7-ec8aa2cb9475&u=true&count_jump=true&orig_url=https%3A%2F%2Fp-syutkin.livejournal.com%2F731904.html%3Futm_source%3Dlivejournal%26utm_medium%3Drnet%26utm_campaign%3Dself_promo%26utm_content%3Dlivejournal%26utm_term%3Drt%3A2739854%26rnet%3Dself_promo_lj" target="_blank">
	<h2>Какое мясо лучше всего подходит для тушения</h2>
 </a><br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
	<h3> </h3>
	<li>
	<h4> <a href="https://firs-away.livejournal.com/8830.html?utm_source=3userpost" target="_blank">Ремонт блока питания Chieftec APS-600C 600W</a> </h4>
	<p>
		 Несложный ремонт блока питания Chieftec APS-600C 600W Фото внутренностей (уже успел выпаять электролит 390uF*400v): Из того что сразу…
	</p>
 </li>
	<li>
	<h4> <a href="https://firs-away.livejournal.com/8416.html?utm_source=3userpost" target="_blank">Ремонт блока питания Thermaltake Toughpower 1000W</a> </h4>
	<p>
		 Блок питания представляет собой два блока по 500W в одном корпусе. В каждой половинке: Основной ШИМ - CM6800G Полевики SPW20N60C3 (TO-247)…
	</p>
 </li>
	<li>
	<h4> <a href="https://firs-away.livejournal.com/10300.html?utm_source=3userpost" target="_blank">Как НЕ надо менять аккумуляторы на JBL Charge 3</a> </h4>
	<p>
		 Как в JBL Charge 3 поставить аккумуляторы форм фактора 18650? Правильно - никак! Но, если очень постараться... Самый простой вариант, это купить…
	</p>
 </li>
 <br>
 <br>
 <br>
	<ul>
		<li> <a href="https://firs-away.livejournal.com/7496.html?mode=reply#add_comment" target="_self">Добавить комментарий</a> </li>
		<li> 0 комментариев </li>
	</ul>
 <br>
 <br>
 <br>
	<ul>
		<li> <a href="https://firs-away.livejournal.com/profile" target="_self"><img src="https://l-stat.livejournal.net/img/userinfo_v8.svg?v=17080?v=500"></a><a href="https://firs-away.livejournal.com/" target="_self"><b>firs_away</b></a> <a href="https://firs-away.livejournal.com/7288.html" target="_self" title="Управление телевизорами LG по RS232">
		Управление телевизорами LG по RS232</a> </li>
		<li> <a href="https://firs-away.livejournal.com/profile" target="_self"><img src="https://l-stat.livejournal.net/img/userinfo_v8.svg?v=17080?v=500"></a><a href="https://firs-away.livejournal.com/" target="_self"><b>firs_away</b></a> <a href="https://firs-away.livejournal.com/7797.html" target="_self" title="Вторая жизнь монитора Crossover 2720MDP-P Gold (27&quot; IPS 2560x1440)">
		Вторая жизнь монитора Crossover 2720MDP-P Gold (27" IPS 2560x1440)</a> </li>
	</ul>
 <br>
	 схема<br>
 <br>
 <a href="https://forum.cxem.net/index.php?/topic/154376-%D0%BF%D1%80%D0%BE%D0%B1%D0%BB%D0%B5%D0%BC%D0%B0-%D1%81-%D0%B1%D0%BB%D0%BE%D0%BA%D0%BE%D0%BC-%D0%BF%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F-%D0%B0%D1%82%D1%85-950%D0%B2%D1%82/&do=findComment&comment=2220564">Опубликовано: <time title="07.09.2015 11:32 ">7 сентября 2015</time></a> <br>
	<p>
		 В принципе, можно по справочным данным разобраться ...
	</p>
	<p>
 <a href="https://www.google.ru/search?q=%D0%BF%D1%80%D0%B5%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C+%D0%BB%D0%BE%D0%B3%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B3%D0%BE+%D1%83%D1%80%D0%BE%D0%B2%D0%BD%D1%8F+%D1%81%D0%B8%D0%B3%D0%BD%D0%B0%D0%BB%D0%B0+%D1%82%D1%82%D0%BB+%D0%BA%D0%BC%D0%BE%D0%BF&newwindow=1&biw=1155&bih=858&source=lnms&tbm=isch&sa=X&ved=0CAYQ_AUoAWoVChMI97yH1r3kxwIVxPNyCh2k4gcW#newwindow=1&tbm=isch&q=cm6805bg+datasheet&imgrc=_" target="_blank">https://www.google.ru/search?q=%D0%BF%D1%80%D0%B5%D0%BE%D0%B1%D1%80%D0%B0%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8C+%D0%BB%D0%BE%D0%B3%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B3%D0%BE+%D1%83%D1%80%D0%BE%D0%B2%D0%BD%D1%8F+%D1%81%D0%B8%D0%B3%D0%BD%D0%B0%D0%BB%D0%B0+%D1%82%D1%82%D0%BB+%D0%BA%D0%BC%D0%BE%D0%BF&amp;newwindow=1&amp;biw=1155&amp;bih=858&amp;source=lnms&amp;tbm=isch&amp;sa=X&amp;ved=0CAYQ_AUoAWoVChMI97yH1r3kxwIVxPNyCh2k4gcW#newwindow=1&amp;tbm=isch&amp;q=cm6805bg+datasheet&amp;imgrc=_</a>
	</p>
	<p>
 <a href="https://forum.cxem.net/uploads/monthly_09_2015/post-6444-0-02860800-1441614700.png"><img alt="post-6444-0-02860800-1441614700_thumb.png" src="https://forum.cxem.net/uploads/monthly_09_2015/post-6444-0-02860800-1441614700_thumb.png" data-fileid="%7B___base_url___%7D/applications/core/interface/file/attachment.php?id=367791" data-src="https://forum.cxem.net/uploads/monthly_09_2015/post-6444-0-02860800-1441614700_thumb.png" id="ips_uid_1330_3" data-loaded="true"></a>
	</p>
	<p>
 <a href="http://monitor.espec.ws/section5/printview232026p20.html" target="_blank">http://monitor.espec.ws/section5/printview232026p20.html</a>
	</p>
 <br>
	<ul>
		<li> <img src="https://forum.cxem.net/uploads/reactions/react_up.png" alt="Одобряю">
		1 </li>
	</ul>
 <br>
	<h1>FSP QDion QD500 вопрос по ШИМ cm6805bg (Решено)</h1>
	 28 Июн 2016 - 01:24 <a href="http://www.rom.by/user/vugluskr" title="Информация о пользователе.">vugluskr</a> 362 &gt;&gt; 0.02<br>
	<ul>
		<li><a href="http://www.rom.by/forum/Remont_Blokov_Pitanija_i_UPS">Ремонт Блоков Питания</a></li>
		<li><a href="http://www.rom.by/Remont_BP/FSP">FSP</a></li>
		<li><a href="http://www.rom.by/Remont_BP/QD500">QD500</a></li>
		<li><a href="http://www.rom.by/Remont_BP/QDion">QDion</a></li>
	</ul>
 <br>
 <br>
	<p>
		 Блок питания QDion QD500 (with APFC) - производитель FSP group<br>
		 Дежурка - FSBH0270A<br>
		 Осн.ШИМ - cm6805bg<br>
		 Супервизор - ps113<br>
		 Транзисторы: APFC 13N50 - 1шт, основной преобразователь KHB9D0N50F - 2шт<br>
		 Входной конденсатор 330㎌x400V<br>
		 Стандартная компоновка блока с APFC.
	</p>
	<p>
		 В обрыве входной конденсатор 330㎌х400V, сгорел ключ APFC и предохранитель.<br>
		 Как правило, я такие блоки ремонтирую так - после замены неисправных деталей, не впаивая ключ(и) APFC включаю через лампу, блок запускается без APFC и выдает все напряжения (за исключением PG), тогда уже пробую запускать с APFC через фен или утюг.<br>
		 В данном случае без ключа APFC дежурка есть, блок не стартует, КЗ по ногам ШИМ нет, но на всякий случай подкинул новую. При PS-on на землю - импульсы на PFCout (10 нога ШИМ) есть, красивые 100 KHz, а вот на PWMout (9) тишина.<br>
		 КЗ по PWMout нет, транзисторы мелкие smd и силовые ключи - целые. На оптронах все напряжения при PS-on изменяются как положено, на ШИМ приходят. <br>
		 Вопрос собственно такой, есть ли особенности у cm6805bg (тут есть режим green mode, связан с блокировкой ШИМ) по сравнению с cm6800g, которая прекрасно включалась без APFC. Как запустить ШИМ?<br>
		 Что должно быть на ногах 2,4,7,6 ? С даташитом не разобрался, трудности перевода.<br>
 <a href="http://www.champion-micro.com/datasheet/Analog%20Device/CM6805.pdf" target="_blank">champion-micro.com/datasheet/Analog%20Device/CM6805.pdf</a>
	</p>
 <a href="http://www.rom.by/forum/Servernyy_HP-R650FF3_HP-Q6100XC_PG" title="К предыдущей теме">‹ Серверный HP-R650FF3 + HP-Q6100XC (PG)</a> <a href="http://www.rom.by/forum/Chieftec_APS-450S_APC_bolshoy_holostoy_tok_ili" title="К следующей теме">Chieftec APS-450S, APC большой холостой ток или... ›</a> <br>
 <span style="width: 200px; height: 90px;"><span title="Advertisement" style="height: 90px; width: 200px;"><br>
 </span></span> <br>
 <br>
 <br>
	<ul>
		<li>262 просмотра</li>
	</ul>
 <br>
 <br>
 <br>
 <a href="http://www.rom.by/user/vugluskr" title="Информация о пользователе."><img alt="Аватар пользователя vugluskr" src="http://www.rom.by/files/pictures/picture-67805.jpg" title="Аватар пользователя vugluskr"></a><br>
	 6 Июл 2016 - 00:19 <a href="http://www.rom.by/user/vugluskr" title="Информация о пользователе.">vugluskr</a> <a title="Ссылка на этот комментарий" href="http://www.rom.by/comment/430788">&gt;&gt;</a> 362 &gt;&gt; 0.02<br>
 <br>
	<p>
		 Впаял транзистор APFC и включил для проверки через утюг (через лампу 100W даже попыток старта нет, лампа ярко горит).<br>
		 Все напряжения в норме, нагрузку держит. При включении напрямую с нагрузкой по всем каналам также все ок.<br>
		 Видимо ШИМ cm6805 блокируется при работе без APFC, т.е. когда на сетевом кондере меньше 380в. Будем знать) <br>
		 Ввело в заблуждение то, что импульсы 100 КГц на APFC шли нормальные. Старая ШИМ тоже видимо была рабочей, оставил про запас.<br>
		 Тему отметил решенной.
	</p>
 <br>
 <br>
 <br>
	 * Santosha&nbsp;&nbsp; очень частая поломке обрыв резистора 300 - 1200к в цепи 220 310в&nbsp; <a href="https://santosha.pro">https://santosha.pro</a><br>
 <br>
 <br>
 <br>
 <br>
	</article>
	<ul>
		<li>
		<h3> <a href="https://samsebeskazal.livejournal.com/" target="_self"><b>samsebeskazal</b></a> </h3>
		<p>
 <a target="_blank" href="https://samsebeskazal.livejournal.com/466881.html?media&utm_source=ljtimes">Оклахома. Жизнь в настоящей американской глубинке</a>
		</p>
 </li>
	</ul>
	<p>
 <a href="https://firs-away.livejournal.com/7496.html#" target="_self">Мы что-то пропустили?</a>
	</p>
	&nbsp; <br>
</div>
<div>
	не удалять проверка <br>
 <br>
 <br>
 <img src="https://xc3.services.livejournal.com/ljcounter/?d=srv:kr-ws25,r:0,j:17150158,p:17150158,uri:%22%2F7496.html%22,ref:%22https:%2F%2Fyandex.ru%2F%22,vig:0,v:1,extra:AQWwzgEFsM4AAB1I"> <img src="https://awaps.yandex.ru/0/9999/001001.gif?0-0-31758-0-&timestamp=31758&awcode=6&subsection=0" width="1" height="1" border="0"> <br>
 <br>
 <br>
 <br>
 <br>
</div>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>