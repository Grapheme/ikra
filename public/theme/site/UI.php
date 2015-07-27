<?
	define('PAGE_TITLE', 'UI');
	define('HEADER_CLASS', '_dark');
?>

<? require_once('templates/header.php'); ?>


<section class="b-section">
	<h2>.b-section &mdash; секция страницы</h2>
	<p>Обычный текст.</p>
	<p>У заголовка (h2) автоматически добавляется нижний отступ.</p>
	<p>У абзацев (p) отступов нет.</p>
	<p>А это &mdash; <a href="#">ссылка</a>.</p>
	<br>
	<p>Названия блоков начинаются с .b-</p>
	<p>Названия модификаторов начинаются с ._</p>
	<br>
	<br>
	<p class="_max-text">._max-text <br> Текст, ограниченный по ширине. <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum nesciunt eius iste quisquam minus magnam sint, quas perspiciatis. Doloribus cumque est, veniam ea, ullam commodi in tempore ab odit beatae.</p>
	<br>
	<br>
	<p class="_max-text _margin-auto">._max-text._margin-auto <br> Текст, ограниченный по ширине и центрированный. <br> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint ducimus doloribus dolor officia nesciunt sequi eveniet laborum ipsum, quisquam perferendis obcaecati officiis quidem magnam repellat dicta perspiciatis. Quo, adipisci, aut!</p>
</section>

<section class="b-section">
	<h2>Цвета</h2>
	<div class="_bg-gray"><h3>._bg-gray</h3></div>
	<div class="_bg-blue"><h3>._bg-blue</h3></div>
	<div class="_bg-cyan"><h3>._bg-cyan</h3></div>
	<div class="_bg-yellow"><h3>._bg-yellow</h3></div>
	<div class="_bg-red"><h3>._bg-red</h3></div>
	<div class="_bg-violet"><h3>._bg-violet</h3></div>
	<div class="_bg-purple"><h3>._bg-purple</h3></div>
	<div class="_bg-green"><h3>._bg-green</h3></div>
	<br>
	<div class="_text-gray"><h3>._text-gray  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-blue"><h3>._text-blue  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-cyan"><h3>._text-cyan  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-yellow"><h3>._text-yellow  &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-red"><h3>._text-red  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-violet"><h3>._text-violet  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-purple"><h3>._text-purple  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
	<div class="_text-green"><h3>._text-green  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">a:hover</a></h3></div>
</section>



<section class="b-section">
	Кстати, h1-h5 продублированы классами .h1-.h5
	<h1>h1 &mdash; ппц большой</h1>
	<h2>h2 &mdash; названия страниц и секций</h2>
	<h3>h3 &mdash; имена людей, названия кейсов, заголовки</h3>
	<h4>h4 - подзаголовки</h4>
	<h3><strong>h3 strong &mdash; названия курсов</strong></h3>
	<br>
	<i>i &mdash; мелкий курсив</i>
	<br>
	<i><strong>h3 strong &mdash; крупный курсив</strong></i>
	<br>
	<br>
	<small>small - должность, компания</small>
	<br>
	<br>
	<h5>h5 &mdash; 15 июля — 25 сентября</h5>
	<br>
	<br>
</section>






<div class="b-section">
	<h2 class="_with-subtitle">Отступы</h2>
	<h4>margin-bottom: <i><strong>n</strong></i>px</h4>
	<br>
	<br>

	<div class="row">
		<div class="col-md-3">
			<div class="_mb0">._mb0</div>
			<div class="_mb5">._mb5</div>
			<div class="_mb10">._mb10</div>
			<div class="_mb15">._mb15</div>
			<div class="_mb20">._mb20</div>
			<div class="_mb25">._mb25</div>
			<div class="_mb30">._mb30</div>
			<div class="_mb35">._mb35</div>
			<div class="_mb40">._mb40</div>
			<div class="_mb45">._mb45</div>
			<div class="_mb50">._mb50</div>
		</div>
		<div class="col-md-3">
			<div class="_mb55">._mb55</div>
			<div class="_mb60">._mb60</div>
			<div class="_mb65">._mb65</div>
			<div class="_mb70">._mb70</div>
			<div class="_mb75">._mb75</div>
			<div class="_mb80">._mb80</div>
		</div>
		<div class="col-md-3">
			<div class="_mb85">._mb85</div>
			<div class="_mb90">._mb90</div>
			<div class="_mb95">._mb95</div>
			<div class="_mb100">._mb100</div>
		</div>
	</div>






</div>






<section class="b-section">

	<h2> Кнопки </h2>

	<h3>Белая кнопка</h3>
	<h4>Может являться любым тегом, наследует цвет (._bg-<i>цвет</i> &gt; ._text-<i>цвет</i> &gt; .btn)</h4>
	<br>
	<div class="row _mb50">
		<div class="col-sm-3 _bg-gray" style="padding:30px"><span class="_text-gray"><a href="#" class="btn">a.btn</a></span></div>
		<div class="col-sm-3 _bg-blue" style="padding:30px"><span class="_text-blue"><button class="btn">button.btn</button></span></div>
		<div class="col-sm-3 _bg-cyan" style="padding:30px"><span class="_text-cyan"><input type="submit" class="btn" value="input.btn"></span></div>
		<div class="col-sm-3 _bg-yellow" style="padding:30px"><span class="_text-yellow"><div class="btn">div.btn</div></span></div>
		<div class="col-sm-3 _bg-red" style="padding:30px"><span class="_text-red"><span href="#" class="btn">span.btn</span></span></div>
		<div class="col-sm-3 _bg-violet" style="padding:30px"><span class="_text-violet"><a href="#" class="btn">.btn</a></span></div>
		<div class="col-sm-3 _bg-purple" style="padding:30px"><span class="_text-purple"><a href="#" class="btn">.btn</a></span></div>
		<div class="col-sm-3 _bg-green" style="padding:30px"><span class="_text-green"><a href="#" class="btn">.btn</a></span></div>
	</div>

	<div class="row _mb100">
		<div class="col-md-6">
			
			<div>
				Синяя кнопка<br>
				<a href="#" class="btn btn-blue">.btn.btn-blue</a>
			</div>
			<br>
			<div>
				Кнопка на всю доступную ширину<br>
				<a href="#" class="btn btn-blue btn-wide">.btn.btn-wide</a>
			</div>
		</div>
		<div class="col-md-6">
			Кнопка-текст<br>
			<div>
				<a href="#" class="btn btn-readmore">.btn.btn-readmore</a>
			</div>
			<br>
			Кнопка-текст справа<br>
			<div class="text-right">
				<a href="#" class="btn btn-readmore">читать полностью</a>
			</div>
		</div>
	</div>

</section>





<section class="b-section _bg-gray">

	<div class="h2">
		Наши курсы 
		<form class="nl-form _text-violet" data-nl>
			<select name="subject" id="">
				<option value="1" selected>В Москве</option>
				<option value="2">В Питере</option>
				<option value="3">В Минске</option>
			</select>
			<div class="nl-overlay"></div>
		</form>
		<br>
		по
		<form class="nl-form _text-violet" data-nl>
			<select name="subject" id="">
				<option value="1" selected>Креативу</option>
				<option value="2">Стратегии</option>
				<option value="3">Продюсированию</option>
			</select>
			<div class="nl-overlay"></div>
		</form>
	</div>

</section>





<section class="b-section">
	<h2 class="_with-subtitle">Формы</h2>
	<h3 class="_mb50">form._max-form &mdash; ограничение по ширине</h3>
		<div class="row">
			<div class="col-sm-6">
				<h4>form &mdash; синяя форма</h4>
				<form role="form" class="_max-form">
					<div class="form-group _mb20">
						<input type="text" class="form-control" id="" placeholder="Имя">
					</div>
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="E-mail">
					</div>
					<div class="form-group _mb50">
						<input type="text" class="form-control" id="" placeholder="Телефон">
					</div>
					<button type="submit" class="btn btn-blue btn-wide">Отправить</button>
				</form>
				<br>
			</div>

			<div class="col-sm-6 _bg-red">
				<h4>form._white &mdash; белая форма</h4>
				<form role="form" class="_white _max-form _margin-auto">
					<div class="form-group _mb20">
						<input type="text" class="form-control" id="" placeholder="Имя">
					</div>
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="E-mail">
					</div>
					<div class="form-group _mb50">
						<input type="text" class="form-control" id="" placeholder="Телефон">
					</div>
					<button type="submit" class="btn btn-wide">Отправить</button>
				</form>
				<br>
			</div>
		</div>
</section>






<section class="b-section _bg-blue">
	<div class="_vertical-center">
		<div>
			<h2 class="_cta">
				h2._cta &mdash; <span class="_text-yellow"><a href="#cta_form" data-toggle="collapse">call to action</a></span>
			</h2>
			<br>
			<span class="_text-blue"><a href="#cta_form" data-toggle="collapse" class="btn">Кнопка &mdash; опционально</a></span>
		</div>
	</div>

	<div id="cta_form" class="collapse">
		<br>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<form role="form" class="_white">
					<div class="form-group _mb20">
						<input type="text" class="form-control" id="" placeholder="Имя">
					</div>
					<div class="form-group _mb20">
						<input type="email" class="form-control" id="" placeholder="E-mail">
					</div>
					<div class="form-group _mb50">
						<input type="text" class="form-control" id="" placeholder="Телефон">
					</div>
					<button type="submit" class="btn btn-wide">Отправить</button>
				</form>
			</div>
		</div>
	</div>
</section>



<section class="b-title">
	<div class="b-title__logo">
		<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
	</div>
	<div class="b-title__text">
		<h1>.b-title &mdash; интро-слайд</h1>
	</div>
</section>



<section class="b-title" style="background-image: url(img/bg/stories.jpg);">
	<div class="b-title__logo">
		<img src="img/logo/ikra-top.png" alt="ИКРА IKRA">
	</div>
	<div class="b-title__text">
		<h2 class="_mb30">.b-title &mdash; интро-слайд</h2>
		<div class="_mb30 _max-text _margin-auto">
			<i>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dolore corporis maxime nesciunt, omnis vero, illo veniam consequuntur quam ea vel voluptas est reprehenderit deserunt nihil possimus deleniti assumenda.
			</i>
		</div>
		<div class="_mb30 _text-gray">
			<a href="#" class="btn">Можно с кнопкой</a>
		</div>
	</div>
</section>







<? require_once('templates/footer.php'); ?>