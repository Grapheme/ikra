<?
	define('PAGE_TITLE', 'Контакты');
	define('HEADER_CLASS', '_black');
?>

<? require_once('templates/header.php'); ?>


<section class="b-title _invert" style="background-image: url(img/bg/contacts.jpg);">
	
	<div class="b-title__logo _invisible">
		<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
	</div>

	<div class="b-title__text">
		<h2>Москва</h2>
		<div class="b-title__text-small">Бауманская, 11, с. 8</div>
	</div>

</section>





<section class="b-section">
		<h2>Икра <a class="b-select _red" href="">Москва <i class="fa fa-caret-down"></i></a></h2>


		<div class="row b-contacts__ways _mb50">
			<div class="col-md-4">
				<h3 class="_mb30">Бауманская, 11, с. 8, блок 1</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo ratione facilis, sunt harum aliquam earum veniam amet rem eos sapiente. Non quibusdam ullam cum numquam perspiciatis est rem aliquam nam!</p>
			</div>
			<div class="col-md-4 col-md-push-3">
				<h3 class="_mb50">На транспорте до нас можно добраться от:</h3>
				<div class="_mb50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus rem in voluptatum beatae aliquam, eum quidem</div>
				<div class="_mb50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus rem in voluptatum beatae aliquam, eum quidem</div>
				<div class="_mb50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus rem in voluptatum beatae aliquam, eum quidem</div>
			</div>
		</div>


		<div class="row b-contacts">
			<div class="col-md-6">
				<div class="_mb30">
					<h3>+7 931 369-48-66 / <a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></h3>
				</div>

				<h4 class="_blue _mb50">С радостью отвечаем с 11:00 до 20:00 в будние дни</h4>

				<img src="img/todo.png" height="40" width="200" alt="">
			</div>


			<div class="col-md-5">
				<h3 class="_mb30">С удовольствием ответим на вопросы</h3>

				<form role="form">
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="E-mail для ответа">
					</div>
					<div class="form-group _mb50">
						<input type="text" class="form-control" id="" placeholder="А здесь вопрос">
					</div>
					<button type="submit" class="btn btn-blue btn-wide">Отправить</button>
				</form>

			</div>
		</div>
	</section>




	
	<section class="b-section _cyan">
		<h2>В главных ролях </h2>


		<ul class="b-teachers__list _mb50 row">
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность</h4>
				<br>
				<h3>+7 931 369-48-66</h3>
				<h3><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></h3>
				
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность</h4>
				<br>
				<h3>+7 931 369-48-66</h3>
				<h3><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></h3>
				
			</li>
			<li class="b-teachers__item col-sm-4">
				<a class="b-teachers__item-link" href="">
					<img src="http://placehold.it/512x512" alt="">
				</a>
				<h3 class="b-teachers__item-name">Имя Фамилия</h3>
				<h4 class="b-teachers__item-job">должность</h4>
				<br>
				<h3>+7 931 369-48-66</h3>
				<h3><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></h3>
				
			</li>
		</ul>

	</section>



	

	<footer class="b-footer">
		<div class="b-footer__map">
			<div class="b-footer__map-text">
				<div class="b-footer__map-text-valign">
					Москва, <br>
					Бауманская улица, 11с8 <br>
					Блок 1
				</div>
			</div>
		</div>
		<div class="b-footer__bottom">
			<img src="img/logo/ikra-igra.png" height="41" width="221" alt="Икра - это игра">
		</div>
	</footer>


</body>
</html>