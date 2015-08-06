<?
	define('PAGE_TITLE', 'Страница истории');
	// define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>




<section class="b-title " style="background-image: url(img/bg/stories.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h2 class="_mb25">Герман Кухтенков</h2>
		<i class="_block _mb55"><strong>Управляющий партнер 2nova interactive</strong></i>
		<div class="_txt4 _mb50"><b>выпускник основного курса 15/1</b></div>
	</div>

</section>




<section class="b-section _no-padding-bottom">
	<div class="row ">
		<div class="col-md-4 b-teacher__photo _mb20">
			<div>
				<img src="img/content/man.jpg" alt="">
			</div>
		</div>
		<div class="col-md-4">
			<h3 class="_mb10"><br>Напиши Герману:</h3>
			<div class="b-social">
				<a class="_facebook _mb0" href="#"><i class="fa fa-facebook"></i></a>
				<a class="_vkontakte _mb0" href="#"><i class="fa fa-vk"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h3 class="_mb15">&nbsp;</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum iure soluta id accusamus. Corporis vitae distinctio enim placeat, quos illo velit deserunt rem ipsum? Doloremque perferendis corporis, esse nobis.</p>
		</div>
		<div class="col-md-4 _mb40">
			<h3 class="_mb15">&nbsp;</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, perferendis! Inventore dignissimos odit sequi quia provident ad aspernatur excepturi fugiat nisi et voluptatem, iste adipisci numquam architecto. Adipisci, nam, vitae!</p>
		</div>
		<div class="col-md-4">
			<h3 class="_mb15">Поделиться историей:</h3>
			<a href="#" class="btn btn-blue _mb20" style="margin-right: 40px">В фейсбуке</a>
			<br>
			<a href="#" class="btn btn-blue _mb20">Во вконтакте</a>
		</div>
	</div>
</section>






<section class="b-section">
	<div class="_txt3 _mb50"><b>истории успеха <br>других выпускников икры</b></div>

	<div class="row b-slider _mb20 owl-carousel _small">

		<? for ($i=0; $i < 6; $i++) { ?>
		<div class="col-sm-4 text-left owl-item">
			<a class="_block _mb20" href="">
				<img src="img/content/512.jpg" alt="">
			</a>
			<div class="_txt9">Имя фамилия</div>
		</div>
		<? } ?>

	</div>
</section>





	<section class="b-section _bg-blue">
		<div class="_vertical-center">
			<div>
				<h2 class="_cta">
					Хочу учиться! На какой <span class="_text-yellow"><a href="#">курс</a></span> мне пойти?
				</h2>
			</div>
		</div>
	</section>




<? require_once('templates/footer.php'); ?>