<?
	define('PAGE_TITLE', 'Корпоративным клиентам');
?>

<? require_once('templates/header.php'); ?>



<section class="b-title" style="background-image: url(img/bg/corp.jpg);">
	<div class="b-title__logo">
		<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
	</div>
	<div class="b-title__text">
		<h2 class="_mb30">Газпром</h2>
		<div class="_mb30 _max-text _margin-auto">
			<i>
				<strong>Газпромнефть Санкт-Петербург, 2015</strong>
			</i>
		</div>
	</div>
</section>






<section class="b-section">
	<div class="row">
		
			<div class="col-md-3">
				<h3 class="_text-red _mb30"><strong>Задача</strong></h3>
				<p>
					Разработать целевую программу на
		год для сотрудников блока
		корпоративных коммуникаций.
				</p>
			</div>
			<div class="col-md-3">
				<h3 class="_text-red _mb30"><strong>Аудитория</strong></h3>
				<p>
					Руководители подразделений,
		ключевые сотрудники блока.
		Количество: 60 человек.
				</p>
			</div>
			<div class="col-md-3">
				<h3 class="_text-red _mb30"><strong>Решение</strong></h3>
				<p>
					Сформулировать представление
		о лучших практиках и трендах
		в брендинге, pr и интерактивных
		технологиях и разработать
		долгосрочную методику для развития
		креативного потенциала сотрудников.
				</p>
			</div>
			<div class="col-md-3">
				<h3 class="_text-red _mb30"><strong>Воплощение</strong></h3>
				<p>
					Обучающая программа из 4-х
		образовательных модулей: стратегия
		и брендинг, креатив, производство
		и дизайн.
				</p>
			</div>
	</div>


</section>






<section class="b-section">
	<div class="_txt3 _mb50"><b>Как это было:</b></div>

	<ul class="b-social__photos _block-nowrap">
		<li><a href="#"><img src="img/content/community/1.jpg" alt=""></a></li>
		<li><a href="#"><img src="img/content/community/2.jpg" alt=""></a></li>
		<li><a href="#"><img src="img/content/community/3.jpg" alt=""></a></li>
		<li><a href="#"><img src="img/content/community/4.jpg" alt=""></a></li>
		<li><a href="#"><img src="img/content/community/5.jpg" alt=""></a></li>
	</ul>

</section>



<section class="b-section _no-padding-bottom">
	<div class="h2">
		Преподаватели
	</div>

	<ul class="b-teachers__list row _mb30">
		<? for ($i=0; $i < 3; $i++) { ?>
		<li class="col-sm-4 _mb70">
			<a class="_block _mb20" href="">
				<img src="img/content/512.jpg" alt="">
			</a>
			<h3 class="_mb5">Имя Фамилия</h3>
			<small class="_block _mb10">должность, компания</small>
			<div class="text-right">
				<a class="btn btn-readmore" href="#">Подробнее</a>
			</div>
		</li>
		<? } ?>
	</ul>


	<div class="text-center">
		<h4 class="_text-blue _mb50">Таким кейсом стоит поделиться с друзьями:</h4>
		<a href="#" class="btn btn-blue _mb20" style="margin: 10px">В фейсбуке</a>
		<a href="#" class="btn btn-blue _mb20" style="margin: 10px">Во вконтакте</a>
	</div>

</section>







<section class="b-section">
	<div class="_txt3 _mb50"><b>Другие кейсы</b></div>

	<div class="row b-slider _mb20 owl-carousel _small">

		<? for ($i=0; $i < 6; $i++) { ?>
		<div class="col-sm-4 text-left owl-item">
			<a class="_block _mb20" href="">
				<img src="img/content/512.jpg" alt="">
			</a>
			<div class="_txt9">Название</div>
		</div>
		<? } ?>

	</div>
</section>






<section class="b-section _bg-blue">
	<div class="_vertical-center">
		<div>
			<h2 class="_cta">
				Для организации курсов в вашей компании <br>звоните нам по телефону:
				<span class="_text-yellow"><a href="tel:+79991234567">+ 7 (999) 123-45-67</a></span>
			</h2>
		</div>
	</div>
</section>








<section class="b-section _no-padding-bottom _mb30">
	<div class="_txt3 text-center _mb55">или оставьте заявку через форму:</div>

	<form role="form">

		<div class="row _mb45">
			<div class="col-sm-6">
				<div class="_max-form _margin-auto">
					<div class="form-group _mb20">
						<input type="text" class="form-control" id="" placeholder="Имя">
					</div>
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="E-mail">
					</div>
					<div class="form-group _mb50">
						<input type="text" class="form-control" id="" placeholder="Телефон">
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="_max-form _margin-auto">
					<div class="form-group _mb20">
						<input type="text" class="form-control" id="" placeholder="Компания">
					</div>
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="Интересующая тема">
					</div>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-4 col-md-push-4">
				<button type="submit" class="btn btn-blue btn-wide">Отправить заявку</button>
			</div>
		</div>
	</form>
</section>







<? require_once('templates/footer.php'); ?>