<?
	define('PAGE_TITLE', 'Список преподавателей');
?>

<? require_once('templates/header.php'); ?>

<? $title = 'Преподаватели'; require_once('templates/title.php'); ?>



	<section class="b-section">
		<h2>Преподаватели <br> в <a class="b-select _violet" href="">Москве <i class="fa fa-caret-down"></i></a>
			<!-- <select name="" id="">
				<option value="1">Москве</option>
				<option value="3">Санкт-Петербурге</option>
				<option value="2">Минске</option>
				<option value="4">Екатеринбурге</option>
			</select> -->
			по <a class="b-select _violet" href="">креативу <i class="fa fa-caret-down"></i></a>
		</h2>


		<ul class="b-teachers__list _mb50 row">
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
				<a href="" class="btn btn-readmore">Подробнее</a>
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
				<a href="" class="btn btn-readmore">Подробнее</a>
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
				<a href="" class="btn btn-readmore">Подробнее</a>
			</li>
		</ul>

		<div class="row">
			<div class="col-sm-4 col-sm-offset-8">
				<a href="" class="btn btn-white btn-wide">Все преподаватели</a>
			</div>
		</div>
	</section>


<? require_once('templates/footer.php'); ?>