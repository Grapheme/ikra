<?
	define('PAGE_TITLE', 'Страница кейса');
	// define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>




<section class="b-title " style="background-image: url(img/bg/case.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h2 class="_mb25">ОСНОВНОЙ КУРС 14/2</h2>
		<i class="_block _mb55"><strong>Electronic Arts, Battlefield Hardline</strong></i>
	</div>

</section>




<section class="b-section _no-padding-bottom">

	<div class="_txt3 _text-red _mb70">
		<b>ОСНОВНОЙ КУРС 14/2, СПБ <br>КОМАНДА 4ONE</b>
	</div>

	<h3 class="_mb15"><strong>Презентация проекта</strong></h3>
	
	<div class="row">
		<div class="col-md-6 _mb40">
			<iframe width="100%" height="415" src="https://www.youtube.com/embed/O75A-4PHpiM" frameborder="0" allowfullscreen></iframe>
		</div>
		<div class="col-md-6 _mb40">
			<article class="_max-text">
				<h3><strong>Клиент</strong></h3>
				<p>Electronic Arts, Battlefield Hardline.</p>
				<br>
				<h3><strong>Задача</strong></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex veniam ab, hic. Ipsam debitis enim ab modi? Porro ipsam magni, velit, vel esse dolores quisquam quos eaque iure necessitatibus quo.</p>
				<br>
				<h3><strong>Решение</strong></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil velit beatae dignissimos. Quibusdam repellendus nostrum velit architecto inventore, ullam nesciunt expedita consequatur, natus, quaerat quod incidunt? Quibusdam fugit laudantium repudiandae.</p>
			</article>
		</div>
	</div>
</section>



<section class="b-section _no-padding-bottom">
	<div class="text-center">
		<h4 class="_text-blue _mb50">Таким кейсом стоит поделиться с друзьями:</h4>
		<a href="#" class="btn btn-blue _mb20" style="margin: 10px">В фейсбуке</a>
		<a href="#" class="btn btn-blue _mb20" style="margin: 10px">Во вконтакте</a>
	</div>
</section>







<section class="b-section _no-padding-bottom">
	<div class="_txt3 _mb50"><b>Другие проекты</b></div>

	<div class="row b-slider _mb20 owl-carousel _small">

		<? for ($i=0; $i < 6; $i++) { ?>
		<div class="col-sm-4 text-left owl-item">
			<a class="_block _mb15" href="">
				<img src="img/content/512.jpg" alt="">
			</a>
			<div class="_txt9 _mb5">Команда, город, год</div>
			<small class="_block">Бренд: название</small>
		</div>
		<? } ?>

	</div>
</section>








<? require_once('templates/footer.php'); ?>