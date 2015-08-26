	<!-- </div> -->

	<section class="b-section _no-padding-bottom">
		<div class="h2 _mb35">Икра 
			<form class="nl-form _text-red" data-nl>
			<select>
				<option value="1">Москва</option>
				<option value="2">Спб</option>
				<option value="3">Минск</option>
				<option value="4">Екб</option>
			</select>
			<div class="nl-overlay"></div>
		</div>

		<div class="row">
			<div class="col-md-6 _mb30">
				<div class="_mb30">
					<h3>+7 931 369-48-66 / <strong class="_text-red"><a href="mailto:info@ikraikra.ru">info@ikraikra.ru</a></strong></h3>
					<small>Менеджер курсов, Оля Зотова</small>
				</div>
				<div class="_mb35">
					<h3>+7 931 369-48-66 / <strong class="_text-red"><a href="mailto:ss@ikraikra.ru">ss@ikraikra.ru</a></strong></h3>
					<small>Руководитель проекта, Соня Смыслова</small>
				</div>

				<small class="_block _mb60 _text-blue">С радостью отвечаем с 11:00 до 20:00 <br>в будние дни</small>

				<div class="b-social">
					<a class="_facebook" href="#"><i class="fa fa-facebook"></i></a>
					<a class="_vkontakte" href="#"><i class="fa fa-vk"></i></a>
					<a class="_instagram" href="#"><i class="fa fa-instagram"></i></a>
				</div>
			</div>


			<div class="col-md-4 _mb30">
				<div class="h4 _mb30">С удовольствием ответим на вопросы</div>

				<form role="form" class="_max-form">
					<div class="form-group _mb15">
						<input type="email" class="form-control" id="" placeholder="E-mail для ответа">
					</div>
					<div class="form-group _mb40">
						<input type="text" class="form-control" id="" placeholder="А здесь вопрос">
					</div>
					<button type="submit" class="btn btn-blue btn-wide">Отправить</button>
				</form>

			</div>
		</div>
	</section>

	<footer class="b-footer">
		<div class="b-footer__map">
			<div class="b-footer__map-text">
				<div class="b-footer__map-text-valign h4">
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

	<div class="nl-overlay"></div>

	<?
		antiCache('js/libs/nlform.js');
		antiCache('js/libs/owl.carousel.min.js');
		antiCache('js/libs/jquery.mb.YTPlayer.min.js');
		antiCache('js/libs/typed.js');
		antiCache('js/script.js');
		antiCache('js/modules/resize.js');
		antiCache('js/modules/equalheight.js');
		antiCache('js/modules/stickyscroll.js');
	?>

</body>
</html>

<?
	if (isset($_GET['html']) || SAVE_HTML)
	{
		$html = ob_get_contents();
		ob_end_clean();
		$filename = str_replace('.php', '.html', basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

		header('Content-Type: text/html; charset=utf-8');
		if (file_put_contents($filename, $html)) echo '<h1>'.$filename.' сохранён.</h1>';
		else echo '<h1 style="color:red">Не удалось сохранить '.$filename.'</h1>';
	}
?>