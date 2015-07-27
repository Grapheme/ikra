<?
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	date_default_timezone_set('Europe/Moscow');

	define('SITE_TITLE', 'Икра');

	define('SAVE_HTML', false);
	if (isset($_GET['html']) || SAVE_HTML) ob_start();
?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?=PAGE_TITLE;?> | <?=SITE_TITLE;?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=yes">

	<script src="js/libs/jquery-1.10.2.min.js"></script>
	<script src="js/libs/underscore-1.7.0.min.js"></script>
	<link href="css/default/reset.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,300italic,400,&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link href="fonts/stylesheet.css" rel="stylesheet">
	<link href="fonts/fontawesome/font-awesome.min.css" rel="stylesheet">


	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<?
		require_once("anticache.php");

		antiCache('css/default/nlform.css');
		antiCache('css/default/owl.carousel.css');
		antiCache('css/common.css');

	?>
</head>
<body>
	<noscript><b>В вашем браузере выключен javascript!</b> Полная функциональность сайта может быть недоступна.</noscript>


	<header class="b-header <? if (defined('HEADER_CLASS')) echo HEADER_CLASS; else echo '_light' ?>">
		
		<div class="b-header__city">
			<div class="b-header__city-select-wrapper _txt9">
				<span id="city_button">Икра Москва <i class="fa fa-caret-down"></i></span>
				<ul id="city_list" class="b-header__city-select">
					<li><a href="#">Икра Москва</a></li>
					<li><a href="#">Икра Спб</a></li>
					<li><a href="#">Икра Минск</a></li>
					<li><a href="#">Икра Екб</a></li>
				</ul>
				<!-- <form action="" method="get">
					<select class="b-header__city-select" name="city_select" id="city_select">
						<option value="10">Икра Москва</option>
						<option value="11">Икра Спб</option>
						<option value="12">Икра Минск</option>
						<option value="14614">Икра Екб</option>
					</select>
					<i class="fa fa-caret-down"></i>
				</form> -->
			</div>
		</div>

		<div class="b-header__nav _txt9">
			<div class="b-header__menu-button _h9" id="menu_open"><span>Меню</span> <i class="fa fa-bars"></i></div>
			<div class="b-header__breadcrumps _h9">/ <a href="#">Раздел</a> / <a href="#">Подраздел</a> </div>
		</div>

	</header>




	<nav class="b-menu">
		<div id="menu_close" class="b-menu__close"><a class="_txt9" href="#"><i class="fa fa-chevron-left"></i> свернуть</a></div>
		<ul class="b-menu__list">
			<li class="h3 _mb35"><a href="#">главная</a></li>
			<li class="h3 _mb35"><a href="#">об икре</a></li>
			<li class="h3 _mb35"><a href="#">курсы</a></li>
			<li class="h3 _mb35"><a href="#">преподаватели</a></li>
			<li class="h3 _mb35"><a href="#">сообщество</a></li>
			<li class="h3 _mb35"><a href="#">корпоративным клиентам</a></li>
			<li class="h3 _mb35"><a href="#">успешные выпускники</a></li>
			<li class="h3"><a href="#">контакты</a></li>
		</ul>
		<div class="h4 _mb30">Наши полезные письма (<b class="_text-yellow"><a href="#">пример</a></b>)</div>
		<form role="form" class="_white _max-form row">
			<div class="col-xs-8 form-group _mb20">
				<input type="email" class="form-control" id="" placeholder="E-mail">
			</div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-wide">ОК</button>
			</div>
		</form>
	</nav>





	<!-- <div class="row"> -->