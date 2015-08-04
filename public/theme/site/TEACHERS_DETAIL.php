<?
	define('PAGE_TITLE', 'Страница преподавателя');
	define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>




<section class="b-title _invert" style="background-image: url(img/bg/teacher.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h1 class="_mb30">Василий Лебедев</h1>
		<i><strong>Ребята, давайте жить дружно!</strong></i>
	</div>

</section>




<section class="b-section _no-padding-bottom">
	<div class="row _mb60">
		<div class="col-md-4 b-teacher__photo _mb20">
			<div>
				<img src="img/content/teachers/1.jpg" alt="">
			</div>
		</div>
		<div class="col-md-4">
			<h3 class="_mb5">Ректор</h3>
			<small class="_block">Школа интерактивных коммуникаций</small>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3 class="_mb10">background</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum iure soluta id accusamus. Corporis vitae distinctio enim placeat, quos illo velit deserunt rem ipsum? Doloremque perferendis corporis, esse nobis.</p>
		</div>
		<div class="col-md-4 _mb40">
			<h3 class="_mb10"> &nbsp; <!-- да, этот блок нужен --></h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, perferendis! Inventore dignissimos odit sequi quia provident ad aspernatur excepturi fugiat nisi et voluptatem, iste adipisci numquam architecto. Adipisci, nam, vitae!</p>
		</div>
		<div class="col-md-4">
			<h3 class="_mb10">Напиши Васе:</h3>
			<div class="b-social">
				<a class="_facebook" href="#"><i class="fa fa-facebook"></i></a>
				<a class="_vkontakte" href="#"><i class="fa fa-vk"></i></a>
			</div>
		</div>
	</div>
</section>



<section class="b-section">
		<h2>Преподаёт тут</h2>

		<div class="b-courses">
			<ul class="row">
				<li data-equalheight="" class="text-center _mb30 col-sm-6 col-md-4" style="height: 180px;">
					<a class="b-courses__link _bg-red" href="#">
						<span class="h3"><strong>Основной курс</strong></span>
						<span class="b-courses__descr"><i>Описание курса</i></span>
						<time class="h5">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li data-equalheight="" class="text-center _mb30 col-sm-6 col-md-4" style="height: 180px;">
					<a class="b-courses__link _bg-violet" href="#">
						<span class="h3"><strong>Левел-ап</strong></span>
						<span class="b-courses__descr"><i>Описание курса <br>на две строки</i></span>
						<time class="h5">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li data-equalheight="" class="text-center _mb30 col-sm-6 col-md-4" style="height: 180px;">
					<a class="b-courses__link _bg-blue" href="#">
						<span class="h3"><strong>Выездной кампус</strong></span>
						<span class="b-courses__descr"><i>Описание курса</i></span>
						<time class="h5">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li data-equalheight="" class="text-center _mb30 col-sm-6 col-md-4" style="height: 180px;">
					<a class="b-courses__link _bg-violet" href="#">
						<span class="h3"><strong>Название курса</strong></span>
						<span class="b-courses__descr"><i>Описание курса</i></span>
						<time class="h5">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
			</ul>
		</div>

	</section>





<section class="b-section _no-padding-bottom _bg-violet">
		<h2>Ещё преподаватели креатива</h2>

		<ul class="row">
			<? for ($i=0; $i < 3; $i++) { ?>
			<li class="col-sm-4 _mb70">
				<a class="_block _mb20" href="">
					<img src="img/content/512.jpg" alt="">
				</a>
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block _mb10">должность, компания</small>
			</li>
			<? } ?>
		</ul>

	</section>




<? require_once('templates/footer.php'); ?>