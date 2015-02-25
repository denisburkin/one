<?
$original = ($_SERVER['HTTP_HOST'] == 'turbion.net') ? TRUE : FALSE;
$counter_id = ($original) ? '26426697' :'26492007' ;
?><!DOCTYPE html>
<html lang="ru">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<link rel="stylesheet" href="/public/vendor/fancybox-v2.1.5/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/public/vendor/bootstrap3.0.3/css/bootstrap.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="/style.css" type="text/css"/>

	<link rel="alternate" href="http://turbion.net/ru/"  hreflang="ru" />
	<link rel="alternate" href="http://turbion.net/en/"  hreflang="en" />

	<script src="/jquery-2.1.0.min.js"></script>

	<script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

	<script type="text/javascript" src="/public/vendor/jquery.minitabs.js"></script>
	<script type="text/javascript" src="/public/vendor/idangerous/idangerous.swiper.min.js"></script>
	<script type="text/javascript" src="/public/vendor/fancybox-v2.1.5/jquery.fancybox.js"></script>
	<script type="text/javascript" src="/public/vendor/bootstrap3.0.3/js/bootstrap.min.js"></script>

	<script type="text/javascript">

		function send()
		{
			var id = $(this).data('id');
			if($('#'+id+' input[name=name]').val()!='' && $('#'+id+' input[name=phone]').val()!=''){
				$.post('send_me.php', $('#'+id).serialize(), function(){
					alert('Спасибо! Мы вам перезвоним.');
					yaCounter<?=$counter_id?>.reachGoal('Spasibo_mi_vap_perezvonim');
				});
			}
			else
			{
				alert('Необходимо заполнить все поля!');
			}
		}

		function loaded()
		{
		}

		$(window).load(function ()
		{
			$(document).ready(function()
			{
				$('#carousel').collapse()

				$('.scrolling').on('click', function() {
					var scrollAnchor = $(this).attr('data-scroll'),
						scrollPoint = $('section[data-anchor="' + scrollAnchor + '"]').offset().top - 80;
					$('body,html').animate({
						scrollTop: scrollPoint
					}, 500);
					return false;
				});

				$('.vk').click(function()
				{
					location.href = 'https://vk.com/turbion.studio';
				});

				$('.various').fancybox({
					maxWidth	: 1280,
					maxHeight	: 1024,
					width		: '95%',
					height		: '95%',
					fitToView	: false,
					autoSize	: false,
					closeClick	: true,
					openEffect	: 'none',
					closeEffect	: 'none',
					iframe : {
						scrolling : 'yes', // changes "scrolling" for the iframe only
						preload   : false
					},
					preload   : false
				});

				$('.modal-btn').bind('click', function(){
					$('#myModal').modal('show');
				});

				$('.send').bind('click', send);


				$('#trust .container').children('img').each(function(inc){
					img(inc, $(this));
				});
			});
			/* basic - default settings */

		});

		function img(inc, img){
			setTimeout(function(){
				img.addClass('show');
			}, inc*150);
		}


		$(window).scroll(function() {
			var windscroll = $(this).scrollTop();
			var scroll;
			console.log( windscroll + $(window).height() - 100);

			$('.content section').each(function() {
				if ($(this).position().top <= windscroll + 80) {
					$('#menu a.active').removeClass('active');
					scroll = $(this).data('anchor');
					$('#menu a').each(function(){
						if($(this).data('scroll')==scroll){
							$(this).addClass('active');
						}
					});
				}
			});
		});
		ymaps.ready(init);
		var map = '';
		var placemark = '';
		function init() {
			placemark = new ymaps.Placemark([68.996215, 33.105289], {balloonContent: ""});
			map = new ymaps.Map("map", {
				center: [68.996215, 33.105289],
				zoom: 16,
				type: "yandex#map"
			});
			map.geoObjects.add(placemark);
		}

	</script>
	<link rel="stylesheet" href="/public/vendor/idangerous/idangerous.swiper.css">
	<style>
		.device {
			width: 100%;
			padding: 0px;
			margin: 80px 0px 0px 0px;
			height: 615px;
			position: relative;
			background-color: #000000;
			text-align: center;

		}

		.swiper-container {
			width: 100%;
			height: 660px;
			margin: 0;
			padding: 0;
		}

		.content-slide {
			padding: 0px;
			color: #fff;
		}

		.title {
			font-size: 25px;
			margin-bottom: 10px;
		}

		.pagination {
			z-index: 20;
			width: 330px;
		}

		.swiper-pagination-switch {
			display: inline-block;
			height: 20px;
			width: 20px;

			background: #52536f;
			margin-right: 5px;
			opacity: 0.8;
			border: 2px solid #fff;
			cursor: pointer;

			border-radius: 10px;
		}

		.swiper-visible-switch {
			background: #535470;
			height: 20px;
			width: 20px;
		}

		.swiper-active-switch {
			background: #faa60f;
			height: 20px;
			width: 20px;
		}

		.device .arrow-left {
			background: url(img/arrows.png) no-repeat left top;
			position: absolute;
			left: 10px;
			top: 50%;
			margin-top: -15px;
			width: 17px;
			height: 30px;
		}

		.device .arrow-right {
			background: url(img/arrows.png) no-repeat left bottom;
			position: absolute;
			right: 10px;
			top: 50%;
			margin-top: -15px;
			width: 17px;
			height: 30px;
		}
		.device .s1 {
			background-image: url(/public/img/slider/<?=lang?>/mobile_02.jpg);
		}
		.device .s2 {
			background-image: url(/public/img/slider/<?=lang?>/panorama_02.jpg);
		}
		.device .s3 {
			background-image: url(/public/img/slider/<?=lang?>/device_02.jpg);
		}
		.device .s4 {
			background-image: url(/public/img/slider/<?=lang?>/kopter_02.jpg);
		}
		.device .s5 {
			background-image: url(/public/img/slider/<?=lang?>/brending_02.jpg);
		}
		.device .s6 {
			background-image: url(/public/img/slider/<?=lang?>/kopter_02.jpg);
		}
		.device .s1,.device .s2,.device .s3,.device .s4,.device .s5,.device .s6 {
			background-position: center;
			background-size: cover;
			width: 1240px;
			margin: auto 0;

			padding: 0px;
		}
	</style>
	<title>РАЗРАБОТКА И ПРОДВИЖЕНИЕ САЙТОВ - Turbion</title>

</head>

<body data-twttr-rendered="true">

<div class="container" style="position: relative">

	<form id="dev-form" class="form" style="position: absolute; z-index: 12;top: 265px; right: 0;">
		<p><?=__('order_1');?></p>
		<input form="dev-form" name="name" type="text" placeholder="<?=__('Иван Иванов');?>">
		<input form="dev-form" name="phone" type="text" placeholder="+7 921 111 22 33">
		<input type="hidden" name="sms" value="2"/>
		<div class="button" onclick="yaCounter<?=$counter_id?>.reachGoal('Osrtav_zayvka_form');"><i><a class="send" data-id="dev-form"><?=__('Отправить заявку');?></a></i></div>
		<p class="under"><?=__('*Ваши данные не будут переданы третьим лицам');?></p>
	</form>

</div>

<div class="device">

	<div class="container">
		<div class="pagination"></div>
	</div>
	<a class="arrow-left" href="#"></a>
	<a class="arrow-right" href="#"></a>

	<div class="swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide s1">
				<div class="container"></div>
			</div>
			<div class="swiper-slide s2"></div>
			<div class="swiper-slide s3"></div>
			<div class="swiper-slide s4"></div>
			<div class="swiper-slide s5"></div>
		</div>
	</div>


</div>

<script>
	var mySwiper = new Swiper('.swiper-container',{
		pagination: '.pagination',
		loop:true,
		grabCursor: true,
		paginationClickable: true
	})
	$('.arrow-left').on('click', function(e){
		e.preventDefault()
		mySwiper.swipePrev()
	})
	$('.arrow-right').on('click', function(e){
		e.preventDefault()
		mySwiper.swipeNext()
	})
</script>


<div class="header">

	<div class="cont">
		<div class="logo">
			<a class="scrolling" data-scroll="dev" href="/<?=lang?>/"><img src="/public/img/logo.svg"></a>
		</div>
		<ul id="menu">
			<li><a class="scrolling" data-scroll="works" href="#portfolio"><?=__('портфолио')?></a></li>
			<li><a class="scrolling" data-scroll="about" href="#about"><?=__('о нас')?></a></li>
			<li><a class="scrolling" data-scroll="contacts" href="#contacts"><?=__('Контакты')?></a></li>
		</ul>
		<div class="contact">
			<? if ($_SERVER['HTTP_HOST'] == 'turbion.net') {?><a href="/ru/"><img src="/public/img/RU.jpg"></a><?}?>
			<p class="phone"><span itemprop="telephone"><? if ($_SERVER['HTTP_HOST'] == 'turbion.net') {?><a href="tel:+79052948702">+7 905 294 87 02</a><?}else{?><a href="tel:+79021307941">+7 902 130 79 41</a><?}?></span></p>
			<br clear=both>
			<? if ($_SERVER['HTTP_HOST'] == 'turbion.net') {?><a href="/en/"><img src="/public/img/EN.jpg"></a><?}?>
			<? if ($_SERVER['HTTP_HOST'] == 'turbion.net') {?><p><?=__('Город Мурманск');?></p> <?}else{?><p><?=__('Звонок бесплатный');?></p><?}?>
		</div>
		<div class="feedback">
			<a class="modal-btn" onclick="yaCounter<?=$counter_id?>.reachGoal('ObratZvonok');"><img src="/public/img/phone.png" ><?=__('Обратный звонок');?></a>
		</div>
		<div class="vk">
		</div>
	</div>
</div>

<div class="content">

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="modal-form" class="form">
					<p>Оставьте заявку<br>на расчет стоимости вашего проекта</p>
					<input form="modal-form" name="name" type="text" placeholder="Иван Иванов">
					<input form="modal-form" name="phone" type="text" placeholder="+7 921 111 22 33">
					<input type="hidden" name="sms" value="2"/>
					<div class="button" onclick="yaCounter<?=$counter_id?>.reachGoal('Osrtav_zayvka_ra_ras');"><i><a class="send" data-id="modal-form" >Отправить заявку</a></i></div>
					<p class="under"><?=__('*Ваши данные не будут переданы третьим лицам');?></p>
				</form>
			</div>
		</div>
	</div>

	<section id="trust" data-anchor="trust">
		<h1><?=__('НАМ ДОВЕРЯЮТ');?></h1>
		<h5><?=__('Клиенты и партнеры');?></h5>
		<div class="container">
			<img src="/public/img/partners/1.png">
			<img src="/public/img/partners/2.png">
			<img src="/public/img/partners/3.png">
			<img src="/public/img/partners/4.png">
			<img src="/public/img/partners/5.png">
			<img src="/public/img/partners/6.png">
			<img src="/public/img/partners/7.png">
			<img src="/public/img/partners/8.png">
			<img src="/public/img/partners/9.png">
			<img src="/public/img/partners/10.png">
			<img src="/public/img/partners/11.png">
			<img src="/public/img/partners/12.png">
			<img src="/public/img/partners/13.png">
			<img src="/public/img/partners/14.png">
			<img src="/public/img/partners/15.png">
			<img src="/public/img/partners/16.png">
			<img src="/public/img/partners/17.png">
			<img src="/public/img/partners/18.png">
			<img src="/public/img/partners/19.png">
			<img src="/public/img/partners/20.png">
			<img src="/public/img/partners/21.png">
			<img src="/public/img/partners/22.png">
			<img src="/public/img/partners/23.png">
			<img src="/public/img/partners/24.png">
		</div>
	</section>
	<section id="works" data-anchor="works">

		<a name="#portfolio"></a>

		<div id="tab_title">
			<h1><?=__('ПОРТФОЛИО');?></h1>
			<h5><?=__('Для нас главное - высокое качество и довольный клиент');?></h5>
		</div>

		<a href="#portfolio_site" class="tab"><?=__('Сайты');?></a><a href="#portfolio_logo" class="tab "><?=__('Логотипы');?></a><a href="#portfolio_panoram" class="tab"><?=__('Панорамы');?></a><a href="#portfolio_copter" class="tab"><?=__('Мультикоптеры');?></a><a href="#portfolio_other"  class="tab"><?=__('Приложение');?></a>

		<div class="container" id="portfolio_site">

			<a href="http://nemc.ru" class="various fancybox.iframe" title="<a href='http://nemc.ru' target='_blank'>nemc.ru</a>">
				<div class="work">
					<div class="image" style="background-image: url(/public/img/turbion-lp-8_03.jpg)"></div>
					<p style="color: #1318f9">NEMC</p>
					<p>Сюрвейерские услуги</p>
					<p>2014</p>
				</div>
			</a>

			<a href="http://svecha.me" class="various fancybox.iframe" title="<a href='http://svecha.me' target='_blank'>svecha.me</a>">
				<div class="work">
					<div class="image" style="background-image: url(/public/img/9.jpg)"></div>
					<p style="color: #7fc508">Люмьер</p>
					<p>Резные свечи ручной работы</p>
					<p>2014</p>
				</div>
			</a>

			<a href="http://kristal51.ru/" class="various fancybox.iframe" title="<a href='http://kristal51.ru' target='_blank'>kristal51.ru</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/turbion-lp-8_05.jpg)"></div>
					<p style="color: #1F8FCA;">Кристалл недвижимость</p>
 					<p>Можно узнать все о компании и выбрать квартиру по карману</p>
					<p>2014</p>
				</div></a>


			<a href="http://chavanga.ru" class="various fancybox.iframe" title="<a href='http://chavanga.ru' target='_blank'>chavanga.ru</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/4.jpg)"></div>
					<p style="color: #d2aa50">Chavanga</p>
					<p>Недельная экскурсия по Терскому берегу кольского полуострова</p>
					<p>2012</p>
				</div>
			</a>

			<a href="http://card51.ru" class="various fancybox.iframe" title="<a href='http://card51.ru' target='_blank'>card51.ru</a>">
				<div class="work">
					<div class="image" style="background-image: url(/public/img/5.jpg)"></div>
					<p style="color: #11abdd">CARD51</p>
					<p>Дисконт карты на все случаи жизни</p>
					<p>2014</p>
				</div>
			</a>

			<a href="http://gh-murmansk.ru" class="various fancybox.iframe" title="<a href='http://gh-murmansk.ru' target='_blank'>gh-murmansk.ru</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/3.jpg)"></div>
					<p style="color: #2ca359">Green House</p>
					<p>Лучшие окна из клееного бруса</p>
					<p>2014</p>
				</div></a>

			<a href="http://vologdin1.ru" class="various fancybox.iframe" title="<a href='http://vologdin1.ru' target='_blank'>vologdin1.ru</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/7.jpg)"></div>
					<p style="color: #ef879e">Вологдин</p>
					<p>Депутат совета депутатов</p>
					<p>2014</p>
				</div>
			</a>

			<a href="http://murmansk-transfer.com" class="various fancybox.iframe" title="<a href='http://murmansk-transfer.com' target='_blank'>murmansk-transfer.com</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/8.jpg)"></div>
					<p style="color: #111111">Мурманск трансфер</p>
					<p>Перевозки VIP класса</p>
					<p>2013</p>
				</div></a>

			<a href="http://rb-slavia.ru" class="various fancybox.iframe" title="<a href='http://rb-slavia.ru' target='_blank'>rb-slavia.ru</a>"><div class="work">
					<div class="image" style="background-image: url(/public/img/1.jpg)"></div>
					<p style="color: #e32a4c">Рекламное бюро СЛАВИЯ</p>
					<p>Использовалась технология WebGL</p>
					<p>2014</p>
				</div>
			</a>
			<a class="modal-btn"  onclick="yaCounter<?=$counter_id?>.reachGoal('Zakazat_proect');">Заказать проект...</a>

		</div>

		<div class="container" id="portfolio_logo">


			<a href="/public/img/logo-bg/elf-tour.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_03.jpg)"></div>
					<p style="color: #f57e52">Elf tour</p>
					<p>Турагентство</p>
					<p>1.9.2014</p>
				</div>
			</a>

			<a href="/public/img/logo-bg/murmansk.jpg" class="various "><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_05.jpg)"></div>
					<p style="color: #0208f9">Мурманская официальная группа</p>
					<p>Самая популярная и многочисленная<br/>
						группа в Мурманске - 160 000 участников <br/>
						vk.com/murmanskgroup</p>
					<p>12.9.2013</p>
				</div></a>
			<a href="/public/img/logo-bg/aelita.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_07.jpg)"></div>
					<p style="color: #fda044">Аэлита</p>
					<p>Грузовые перевозки и не только
						</p>
					<p>5.10.2014</p>
				</div></a>
			<a href="/public/img/logo-bg/lumiere.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_12.jpg)"></div>
					<p style="color: #fbb18e">Lumiere</p>
					<p>Резные свечи ручной работы. Можно купить он-лайн svecha.me </p>
					<p>1.05.2014</p>
				</div></a>
			<a href="/public/img/logo-bg/card51.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_13.jpg)"></div>
					<p style="color: #00a5da">CARD51</p>
					<p>Дисконт карты на все случаи жизни</p>
					<p>1.05.2013</p>
				</div></a>
			<a href="/public/img/logo-bg/amster420.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_14.jpg)"></div>
					<p style="color: #7fc508">Amster 420</p>
					<p>Место, где всегда можно кайфануть</p>
					<p>3.10.2014</p>
				</div></a>
			<a href="/public/img/logo-bg/karawella.jpg" class="various " ><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_18.jpg)"></div>
					<p style="color: #ee879d">Каравелла</p>
					<p>Лучшая база отдыха для
						всей семьи.</p>
					<p>1.06.2014</p>
				</div></a>
			<a href="/public/img/logo-bg/roitech.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_19.jpg)"></div>
					<p style="color: #000000">ROITECH</p>
					<p>Север Минералс
					</p>
					<p>1.05.2013</p>
				</div></a>
			<a href="/public/img/logo-bg/bonome.jpg" class="various"><div class="work">
					<div class="image" style="background-image: url(/public/img/logo-sm/logo_20.jpg)"></div>
					<p style="color: #7fc508">Бономи</p>
					<p>Сайт обмена вещами</p>
					<p>1.05.2013</p>
				</div></a>
			<a class="modal-btn"  onclick="yaCounter<?=$counter_id?>.reachGoal('Zakazat_proect');">Заказать Логотип...</a>

		</div>

		<div class="container" id="portfolio_panoram">

		<iframe style="margin: 0 100px 20px 100px; width:80%; height:450px; border: 0px;"   allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"  scrolling="no" src="http://panorama51.ru/iframe-3.html"></iframe>
			<a class="modal-btn"  onclick="yaCounter<?=$counter_id?>.reachGoal('Zakazat_proect');">Заказать Панораму...</a>
		</div>

		<div class="container" id="portfolio_copter">
			<iframe width="853" height="480" src="//www.youtube.com/embed/eHnekVFIfB4" frameborder="0" allowfullscreen></iframe>
			<br/>
			<br/>
			<iframe width="853" height="480" src="//www.youtube.com/embed/7Ok9KWVdhJQ" frameborder="0" allowfullscreen></iframe>
			<br/>
			<br/>
			<iframe width="853" height="480" src="//www.youtube.com/embed/GKDmsTZFjO8" frameborder="0" allowfullscreen></iframe>


			<br/>
			<br/>
			<a class="modal-btn"  onclick="yaCounter<?=$counter_id?>.reachGoal('Zakazat_proect');">Заказать видео съемку...</a>

		</div>

		<div class="container" id="portfolio_other" style="text-align: center">


			<img src="/public/img/mobile.jpg" alt=""/>
			<br/>
			<br/>
			<a class="modal-btn"  onclick="yaCounter<?=$counter_id?>.reachGoal('Zakazat_proect');">Заказать мобильное приложение ...</a>

		</div>
	</section>
	<script>
		$('#works').minitabs('fast', 'fade');
	</script>
	<section id="about" data-anchor="about">

		<a name="#about"></a>
		<img src="/public/img/circle-turbo.png">
		<div class="container">

			<h1><?=__('about_t')?></h1>
			<?=__('about_c')?>
		</div>
		<div class="pano"></div>
	</section>
	<section id="contacts" data-anchor="contacts">
		<div class="container">
			<a name="#contacts"></a>

			<h1><?=__('Контакты')?></h1>

			<div id="map"></div>
			<form id="contacts-form" class="form">
				<p class="que"><?=__('Остались вопросы?')?><br><span class="small"><?=__('Заполните заявку на бесплатную консультацию');?></span>
				</p>
				<input form="contacts-form" name="name" type="text" placeholder="<?=__('Иван Иванов');?>">
				<input form="contacts-form" name="phone" type="text" placeholder="+7 921 111 22 33">
				<input type="hidden" name="sms" value="2"/>

				<div class="button" onclick="yaCounter<?= $counter_id ?>.reachGoal('Ostalis_voprosi');">
					<i><a class="send" data-id="contacts-form"><?=__('Отправить заявку');?></a></i></div>
				<p class="under"><?=__('*Ваши данные не будут переданы третьим лицам');?></p>
			</form>

			<div class="address">
				<?=__('<p>РОССИЯ<br>Мурманск<br>Подстаницкого д.1<br> 2 этаж</p>');?>

				<p><span itemprop="telephone"><? if ($_SERVER['HTTP_HOST'] == 'turbion.net'){ ?><a href="tel:+79052948702">+7 905 294 87 02</a><? } else { ?><a href="tel:+79021307941">+7 902 130 79 41</a><? } ?></span></p>

				<? if ($_SERVER['HTTP_HOST'] == 'turbion.net'){ ?><a href="mailto:info@turbion.net">info@turbion.net</a><? } else { ?><a href="mailto:89021307941@ya.ru">89021307941@ya.ru</a><? } ?>


				<a href="/privacy.html" class="various fancybox.iframe" style="font-size: 16px;"><?=__('Политика конфиденциальности');?></a>

			</div>

		</div>
	</section>
</div>
<div class="footer">
	<img src="/public/img/circle.svg">
</div>

<!-- Yandex.Metrika counter --><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter<?=$counter_id?> = new Ya.Metrika({id:<?=$counter_id?>, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true, trackHash:true}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/26492007" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
<link rel="stylesheet" href="//cdn.callbackhunter.com/widget/tracker.css">
<script type="text/javascript"
	src="//cdn.callbackhunter.com/widget/tracker.js" charset="UTF-8"></script >
<script type="text/javascript">var hunter_code="9416e108e349b0c3c94ae1eba6ed5e22";</script>
</body>
</html>