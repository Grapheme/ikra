<?
	define('PAGE_TITLE', 'Коммьюнити');
?>

<? require_once('templates/header.php'); ?>

<section class="b-title _short">
	
	<div class="b-title__logo">
		<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
	</div>

	<h2 class="b-title__text">
		Сообщество
	</h2>

</section>


<ul class="b-social__photos _block-nowrap">
	<li><a href="#"><img src="img/content/community/1.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/2.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/3.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/4.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/5.jpg" alt=""></a></li>
</ul>



<section class="b-section _no-padding-bottom">

	<ul class="row _mb40 text-center">
		<li class="col-sm-4 _mb30">
			<h3><a href="#">Блог</a></h3>
		</li>
		<li class="col-sm-4 _mb30 _text-red">
			<h3><a href="#">События</a></h3>
		</li>
		<li class="col-sm-4 _mb30">
			<h3><a href="#">Социальные сети</a></h3>
		</li>
	</ul>


	<ul class="row">
		<? for ($i=0; $i < 6; $i++) { ?>
		<li class="col-sm-4 _mb80" data-equalheight>
			<a class="_block _mb30" href="#"><img class="_full-width" src="img/content/events/1.jpg" alt=""></a>
			<p class="_mb30">Illo neque, at mollitia rerum libero nostrum provident inventore, corporis aliquam repudiandae sapiente consequatur natus, tempore veniam debitis sed placeat omnis nulla?</p>
			<div class="text-right">
				<a href="#" class="btn btn-blue">Записаться</a>
			</div>
		</li>
		<? } ?>
	</ul>


	<div class="text-right h3">
		<a href="#"><b class="_text-red">1</b></a>
		<a href="#">2</a>
		<a href="#">3</a>
		<a href="#">…</a>
		<a href="#">99</a>
	</div>

</section>

<? require_once('templates/footer.php'); ?>