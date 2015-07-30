<?
	define('PAGE_TITLE', 'Страница преподавателя');
?>

<? require_once('templates/header.php'); ?>

<? require_once('templates/title_teacher.php'); ?>

<section class="b-section">
	<div class="row _mb60">
		<div class="col-sm-4 b-teacher__photo">
			<img src="img/content/vas.jpg" height="380" width="380" alt="">
		</div>
		<div class="col-sm-4">
			<h3>Ректор</h3>
			<h4>Школа интерактивных коммуникаций</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4">
			<h3 class="_mb20">background</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum iure soluta id accusamus. Corporis vitae distinctio enim placeat, quos illo velit deserunt rem ipsum? Doloremque perferendis corporis, esse nobis.</p>
		</div>
		<div class="col-sm-4">
			<h3 class="_mb20">&nbsp;</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, perferendis! Inventore dignissimos odit sequi quia provident ad aspernatur excepturi fugiat nisi et voluptatem, iste adipisci numquam architecto. Adipisci, nam, vitae!</p>
		</div>
		<div class="col-sm-4">
			<h3 class="_mb20">Напиши Васе:</h3>
			<img src="img/todo.png" height="40" width="200" alt="">
		</div>
	</div>
</section>



<section class="b-section">
		<h2>Преподаёт тут</h2>

		<div class="b-courses">
			<ul class="b-courses__list row">
				<li class="b-courses__item _red col-sm-4">
					<a href="" class="b-courses__item-link">
						<span class="b-courses__item-title h3">Название курса</span>
						<span class="b-courses__item-descr"><i>Описание курса</i></span>
						<time class="b-courses__item-date">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li class="b-courses__item _violet col-sm-4">
					<a href="" class="b-courses__item-link">
						<span class="b-courses__item-title h3">Название курса</span>
						<span class="b-courses__item-descr"><i>Описание курса <br>на две строки</i></span>
						<time class="b-courses__item-date">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li class="b-courses__item _blue col-sm-4">
					<a href="" class="b-courses__item-link">
						<span class="b-courses__item-title h3">Название курса</span>
						<span class="b-courses__item-descr"><i>Описание курса</i></span>
						<time class="b-courses__item-date">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<li class="b-courses__item _violet col-sm-4">
					<a href="" class="b-courses__item-link">
						<span class="b-courses__item-title h3">Название курса</span>
						<span class="b-courses__item-descr"><i>Описание курса</i></span>
						<time class="b-courses__item-date">15 июля &mdash; 25 сентября</time>
					</a>
				</li>
				<!-- <li class="b-courses__item _yellow col-sm-4">
					<a href="" class="b-courses__item-link">
						<span class="b-courses__item-title h3">Название курса</span>
						<span class="b-courses__item-descr"><i>Описание курса</i></span>
						<time class="b-courses__item-date">15 июля &mdash; 25 сентября</time>
					</a>
				</li> -->
				<li class="b-courses__item col-sm-4">
					<a href="" class="b-courses__item-link _all">
						<span>Посмотреть все курсы</span>
					</a>
				</li>
			</ul>
		</div>

	</section>





<section class="b-section _violet">
		<h2>Ещё преподаватели креатива</h2>

		<ul class="b-teachers__list _mb50 row">
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность, компания</h4>
			</li>
		</ul>

	</section>




<? require_once('templates/footer.php'); ?>