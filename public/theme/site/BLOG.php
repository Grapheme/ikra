<?
	define('PAGE_TITLE', 'Коммьюнити');
?>

<? require_once('templates/header.php'); ?>

<? $title = 'Сообщество'; require_once('templates/title.php'); ?>


<ul class="b-photo__list _block-nowrap">
	<li><a href="#"><img src="img/content/community/1.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/2.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/3.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/4.jpg" alt=""></a></li>
	<li><a href="#"><img src="img/content/community/5.jpg" alt=""></a></li>
</ul>



<section class="b-section">

	<ul class="b-community__tabs row _mb70">
		<li class="col-sm-4 _current">
			<h3><a href="#">Блог</a></h3>
		</li>
		<li class="col-sm-4">
			<h3><a href="#">События</a></h3>
		</li>
		<li class="col-sm-4">
			<h3><a href="#">Социальные сети</a></h3>
		</li>
	</ul>


	<ul class="b-blog__list row">
		<li class="col-sm-4">
			<img src="img/content/blog/1.jpg" alt="">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo neque, at mollitia rerum libero nostrum provident inventore, corporis aliquam repudiandae sapiente consequatur natus, tempore veniam debitis sed placeat omnis nulla?</p>
			<a href="#" class="btn btn-readmore">Читать полностью</a>
		</li>
		<li class="col-sm-4">
			<img src="img/content/blog/2.jpg" alt="">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium voluptatum laborum quaerat explicabo ad veritatis rem facilis vero incidunt ex. Suscipit voluptatum eligendi unde itaque ullam reprehenderit amet, ipsa aperiam.</p>
			<a href="#" class="btn btn-readmore">Читать полностью</a>
		</li>
		<li class="col-sm-4">
			<img src="img/content/blog/3.jpg" alt="">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur sint odio neque, aspernatur quo iure? Quidem quod deleniti, officiis ab delectus temporibus nesciunt illo, a, voluptatibus illum cumque ex explicabo.</p>
			<a href="#" class="btn btn-readmore">Читать полностью</a>
		</li>
	</ul>

</section>

<? require_once('templates/footer.php'); ?>