<?
	define('PAGE_TITLE', 'Список преподавателей');
?>

<? require_once('templates/header.php'); ?>

<section class="b-title _short">
	
	<div class="b-title__logo">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<h2 class="b-title__text">
		Преподаватели
	</h2>

</section>


<section class="b-section _no-padding-bottom">
	<div class="h2">
		Преподаватели
		<form class="nl-form _text-red" data-nl>
			<select name="subject" id="">
				<option value="1" selected>В Москве</option>
				<option value="2">В Питере</option>
				<option value="3">В Минске</option>
			</select>
			<div class="nl-overlay"></div>
		</form>
		<br>
		по
		<form class="nl-form _text-red" data-nl>
			<select name="subject" id="">
				<option value="1" selected>Креативу</option>
				<option value="2">Стратегии</option>
				<option value="3">Продюсированию</option>
			</select>
			<div class="nl-overlay"></div>
		</form>
	</div>


	<ul class="b-teachers__list row">
		<? for ($i=0; $i < 6; $i++) { ?>
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

</section>


<? require_once('templates/footer.php'); ?>