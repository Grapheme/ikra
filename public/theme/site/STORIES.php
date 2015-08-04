<?
	define('PAGE_TITLE', 'Истории успеха');
?>

<? require_once('templates/header.php'); ?>





	<section class="b-title" style="background-image: url(img/bg/stories.jpg);">
		
		<div class="b-title__logo _invisible">
			<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
		</div>

		<div class="b-title__text">
			<h2>Истории успеха</h2>
			<i class="_text-yellow"><strong>Икра &mdash; это семья!</strong></i>
		</div>

	</section>






	<section class="b-section">
		
		<div class="row _mb80">
			<div class="col-md-4 _mb30">
				<img class="_mb20" src="img/content/man.jpg" alt="">
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block">Компания, должность</small>
			</div>
		
			<div class="col-md-6">
				<h3 class="_mb50">Герман:</h3>
				<blockquote class="_mb80 _text-red"><i><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quis unde reprehenderit adipisci optio, culpa ut deleniti impedit facere quidem, rerum! Accusamus quia, ipsam, doloribus suscipit voluptates in assumenda numquam.</strong></i></blockquote>
				<p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem incidunt accusamus nisi id fugit hic, natus aut repudiandae pariatur odio vitae error dolore, praesentium nihil? Neque consequuntur tempore, ullam alias?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque iste quia laboriosam natus adipisci ratione accusamus, assumenda, minus sed saepe culpa. Accusantium distinctio, eum libero ad ut nostrum consequuntur. Natus.</p>
				<div class="text-right">
					<a href="" class="btn btn-readmore">Узнать все подробности</a>
				</div>
			</div>
		</div>


		<div class="row _mb80">
			<div class="col-md-4 _mb30">
				<img class="_mb20" src="img/content/man.jpg" alt="">
				<h3 class="_mb5">Имя Фамилия</h3>
				<small class="_block">Компания, должность</small>
			</div>
		
			<div class="col-md-6">
				<h3 class="_mb50">Герман:</h3>
				<blockquote class="_mb80 _text-red"><i><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla quis unde reprehenderit adipisci optio, culpa ut deleniti impedit facere quidem, rerum! Accusamus quia, ipsam, doloribus suscipit voluptates in assumenda numquam.</strong></i></blockquote>
				<p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem incidunt accusamus nisi id fugit hic, natus aut repudiandae pariatur odio vitae error dolore, praesentium nihil? Neque consequuntur tempore, ullam alias?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque iste quia laboriosam natus adipisci ratione accusamus, assumenda, minus sed saepe culpa. Accusantium distinctio, eum libero ad ut nostrum consequuntur. Natus.</p>
				<div class="text-right">
					<a href="" class="btn btn-readmore">Узнать все подробности</a>
				</div>
			</div>
		</div>


		<div class="text-center">
			<a href="#" class="btn btn-blue">Больше историй</a>
		</div>


	</section>





<section class="b-section _bg-blue">
	<div class="_vertical-center">
		<div>
			<h2 class="_cta">
				Мало этих историй? Пройди <span class="_text-yellow"><a href="#">Икру</a></span> и напиши свою!
			</h2>
			<br><br>
			<span class="_text-blue"><a href="#" class="btn">Записаться на курс</a></span>
		</div>
	</div>

</section>





<section class="b-section _no-padding-bottom">
	<div class="h2">Ближайшие курсы <br> в
		<form class="nl-form _text-red" data-nl>
			<select name="city" id="">
				<option value="1">Москве</option>
				<option value="3">Санкт-Петербурге</option>
				<option value="2">Минске</option>
				<option value="4">Екатеринбурге</option>
			</select>
			<div class="nl-overlay"></div>
		</form>
	</div>

	<div class="b-courses">
		<ul class="row">
			<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
				<a href="#" class="b-courses__link _bg-red">
					<span class="h3"><strong>Основной курс</strong></span>
					<span class="b-courses__descr"><i>Описание курса</i></span>
					<time class="h5">15 июля &mdash; 25 сентября</time>
				</a>
			</li>
			<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
				<a href="#" class="b-courses__link _bg-violet">
					<span class="h3"><strong>Левел-ап</strong></span>
					<span class="b-courses__descr"><i>Описание курса <br>на две строки</i></span>
					<time class="h5">15 июля &mdash; 25 сентября</time>
				</a>
			</li>
			<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
				<a href="#" class="b-courses__link _bg-blue">
					<span class="h3"><strong>Выездной кампус</strong></span>
					<span class="b-courses__descr"><i>Описание курса</i></span>
					<time class="h5">15 июля &mdash; 25 сентября</time>
				</a>
			</li>
			<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
				<a href="#" class="b-courses__link _bg-violet">
					<span class="h3"><strong>Название курса</strong></span>
					<span class="b-courses__descr"><i>Описание курса</i></span>
					<time class="h5">15 июля &mdash; 25 сентября</time>
				</a>
			</li>
			<li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
				<a href="#" class="b-courses__link _all">
					<span><span class="h3">Посмотреть все курсы</span></span>
				</a>
			</li>
		</ul>
	</div>

</section>




<? require_once('templates/footer.php'); ?>