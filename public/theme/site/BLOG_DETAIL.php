<?
	define('PAGE_TITLE', 'Страница записи блога');
	// define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>




<section class="b-title " style="background-image: url(img/bg/blog.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h2 class="_mb25">ИКРА В ПЕТЕРБУРГЕ ИЩЕТ СТАЖЕРА</h2>
		<i class="_block _mb55"><strong>на Основной курс</strong></i>
	</div>

</section>




<section class="b-section _no-padding-bottom">
	
	<div class="row">
		<div class="col-md-4">
			<h3 class="_mb15">Налетай</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nostrum iure soluta id accusamus. Corporis vitae distinctio enim placeat, quos illo velit deserunt rem ipsum? Doloremque perferendis corporis, esse nobis.</p>
		</div>
		<div class="col-md-4 _mb40">
			<h3 class="_mb15">&nbsp;</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, perferendis! Inventore dignissimos odit sequi quia provident ad aspernatur excepturi fugiat nisi et voluptatem, iste adipisci numquam architecto. Adipisci, nam, vitae!</p>
		</div>
		<div class="col-md-4">
			<h3 class="_mb15">Поделиться новостью:</h3>
			<a href="#" class="btn btn-blue _mb20" style="margin-right: 40px">В фейсбуке</a>
			<br>
			<a href="#" class="btn btn-blue _mb20">Во вконтакте</a>
		</div>
	</div>
</section>






<section class="b-section _no-padding-bottom">
	<div class="_txt3 _mb50"><b>Другие новости</b></div>

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