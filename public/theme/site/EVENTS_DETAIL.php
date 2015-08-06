<?
	define('PAGE_TITLE', 'Страница события');
	// define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>




<section class="b-title " style="background-image: url(img/bg/event.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h2 class="_mb25">ДИЗАЙН-КАМПУС В ЛЕСУ</h2>
		<i class="_block _mb55"><strong>Кампус с Мишей Шишкиным и Родионом Арсеньевым <br>в Ленинградской области</strong></i>
	</div>

</section>




<section class="b-section">
	
	<div class="row">
		<div class="col-md-4">
			<h3 class="_mb15">Что такое дизайн-кампус?</h3>
			<p>
				На 5 дней студенты вместе с кураторами,
Михаилом Шишкиным и Родионом Арсеньевым,
уедут на базу отдыха, чтобы сфокусироваться
на обучении.
Перед студентами стоит серьезная задача: за 5 дней
сделать дизайн-проект с чистого листа
			</p>
			<a href="#" class="btn btn-readmore">подробнее</a>
		</div>
		<div class="col-md-4 _mb40">
			<h3 class="_mb15">&nbsp;</h3>
			<article>
				<p>Чтобы справиться с задачей в вашем распоряжении будут:</p>
				<ul class="_check-list">
					<li>кураторы — 2 шт</li>
					<li>лекции — 22 часа</li>
					<li>коттедж — 2 шт</li>
					<li>свежий воздух, лес и озеро — неограниченно</li>
				</ul>
			</article>
		</div>
		<div class="col-md-4">
			<h3 class="_mb15">Поделиться новостью:</h3>
			<a href="#" class="btn btn-blue _mb20" style="margin-right: 40px">В фейсбуке</a>
			<br>
			<a href="#" class="btn btn-blue _mb20">Во вконтакте</a>
		</div>
	</div>
</section>





<section class="b-section _bg-red">

	<div class="row">
		<div class="col-md-6">
			<h2>Дизайн-кампус <br> в лесу</h2>
			<div class="h2">25 000 руб.</div><br>
			<div class="_txt4 _mb10">25 июня - 29 июня</div><br>
			<div class="_txt4 _mb20">
				<a href="#discount" class="collapsed" data-toggle="collapse">
					Подробности и скидки <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
				</a>
			</div>
			<div class="collapse" id="discount">
				Студенты и выпускники основного курса <br>
				получают скидку 30% на интенсивы и Level-Up’ы. <br>
				Выпускники профессий получают скидку 15% <br>
				на следующий курс, выпускники интенсивов — 5%.
			</div>
		</div>
		<div class="col-md-4">
			<div class="_mb70"></div>
			<form role="form" class="_white">
				<div class="form-group _mb20">
					<input type="text" placeholder="Имя" id="" class="form-control">
				</div>
				<div class="form-group _mb20">
					<input type="email" placeholder="E-mail" id="" class="form-control">
				</div>
				<div class="form-group _mb50">
					<input type="text" placeholder="Телефон" id="" class="form-control">
				</div>
				<button class="btn btn-white btn-wide" type="submit">Записаться</button>
			</form>
		</div>
	</div>

</section>








<section class="b-section _no-padding-bottom">
	<div class="_txt3 _mb50"><b>Другие события</b></div>

	<div class="row b-slider _mb20 owl-carousel _small">

		<? for ($i=0; $i < 6; $i++) { ?>
		<div class="col-sm-4 text-left owl-item">
			<a class="_block _mb20" href="">
				<img src="img/content/512.jpg" alt="">
			</a>
			<div class="_txt9">&nbsp;</div>
		</div>
		<? } ?>

	</div>
</section>








<? require_once('templates/footer.php'); ?>