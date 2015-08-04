<?
	define('PAGE_TITLE', 'Контакты');
	define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>


	<section class="b-title _long _invert" style="background-image: url(img/bg/contacts.jpg);">
		
		<div class="b-title__logo _invisible">
			<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
		</div>

		<div class="b-title__text">
			<h1 class="_mb30">Москва</h1>
			<i><strong>Бауманская, 11, с. 8</strong></i>
		</div>

	</section>








	<section class="b-section _no-padding-bottom">
		<div class="h2 _mb65">Икра 
			<form class="nl-form _text-red" data-nl>
			<select>
				<option value="1">Москва</option>
				<option value="2">Спб</option>
				<option value="3">Минск</option>
				<option value="4">Екб</option>
			</select>
			<div class="nl-overlay"></div>
		</div>





		<div class="row b-contacts__ways _mb50">
			<div class="col-md-4">
				<h3 class="_mb40">Бауманская, 11, с. 8, блок 1</h3>
				<p class="_max-text">Ориентир — Музей Советских Игровых
				Автоматов и табличка «Клаустрофобия» на
				больших железных воротах.
				Смело открывайте дверь и проходите мимо
				охранника на территорию и идите до
				последнего здания. Ура, это и есть мы.</p>
			</div>
			<div class="col-md-6 col-md-push-2">
				<div class="_mb40"><br><br><b>На транспорте до нас можно добраться от:</b></div>
				<div class="_mb40">метро Красносельская трамвай 45, 50<br> до остановки ул. Бауманская, 17;</div>
				<div class="_mb40">метро Курская трамвай Б,<br> до остановки ул. Бауманская, 17.</div>
				<div class="_mb40">метро Авиамоторная трамвай 50,<br> до остановки ул. Бауманская, 17;</div>
			</div>
		</div>





		<div class="row">
			<div class="col-md-6 _mb30">
				<div class="_mb30">
					<h3>+7 931 369-48-66 / <strong class="_text-red"><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></strong></h3>
					<small>Менеджер курсов, Оля Зотова</small>
				</div>

				<small class="_block _mb60 _text-blue">С радостью отвечаем с 11:00 до 20:00 <br>в будние дни</small>

				<div class="b-social">
					<a class="_facebook" href="#"><i class="fa fa-facebook"></i></a>
					<a class="_vkontakte" href="#"><i class="fa fa-vk"></i></a>
					<a class="_instagram" href="#"><i class="fa fa-instagram"></i></a>
				</div>
			</div>


			<div class="col-md-4 _mb30">
				<div class="h4 _mb30">С удовольствием ответим на вопросы</div>

				<form role="form" class="_max-form">
					<div class="form-group _mb15">
						<input type="email" class="form-control" id="" placeholder="E-mail для ответа">
					</div>
					<div class="form-group _mb40">
						<input type="text" class="form-control" id="" placeholder="А здесь вопрос">
					</div>
					<button type="submit" class="btn btn-blue btn-wide">Отправить</button>
				</form>

			</div>
		</div>
	</section>














	
	<section class="b-section _bg-cyan _no-padding-bottom">
		<h2>В главных ролях </h2>


		<ul class="row _mb0">
			<li class="col-sm-4 _mb50">
				<a class="_block _mb20" href="">
					<img src="img/content/512.jpg" alt="">
				</a>
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block _mb30">должность</small>
				<h3>+7 931 369-48-66</h3>
				<h3><strong><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></strong></h3>
				
			</li>
			<li class="col-sm-4 _mb50">
				<a class="_block _mb20" href="">
					<img src="img/content/512.jpg" alt="">
				</a>
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block _mb30">должность</small>
				<h3>+7 931 369-48-66</h3>
				<h3><strong><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></strong></h3>
				
			</li>
			<li class="col-sm-4 _mb50">
				<a class="_block _mb20" href="">
					<img src="img/content/512.jpg" alt="">
				</a>
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block _mb30">должность</small>
				<h3>+7 931 369-48-66</h3>
				<h3><strong><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></strong></h3>
				
			</li>
		</ul>

	</section>













	<!-- фрагмент из footer.php -->

	<footer class="b-footer">
		<div class="b-footer__map">
			<div class="b-footer__map-text">
				<div class="b-footer__map-text-valign h4">
					Москва, <br>
					Бауманская улица, 11с8 <br>
					Блок 1
				</div>
			</div>
		</div>
		<div class="b-footer__bottom">
			<img src="img/logo/ikra-igra.png" height="41" width="221" alt="Икра - это игра">
		</div>
	</footer>

	<div class="nl-overlay"></div>

	<?
		antiCache('js/libs/nlform.js');
		antiCache('js/libs/owl.carousel.min.js');
		antiCache('js/script.js');
		antiCache('js/modules/resize.js');
		antiCache('js/modules/equalheight.js');
		antiCache('js/modules/stickyscroll.js');
	?>

</body>
</html>