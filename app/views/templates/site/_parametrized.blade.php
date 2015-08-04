<?
/**
 * TITLE: Шаблон для проверки параметризированных страниц
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
<?php
#extends(Helper::layout())
Helper::ta($page);

$route = Route::current();

$lang = $route->getParameter('lang');
$city = $route->getParameter('city');
Helper::ta('{lang} => ' . $lang);
Helper::ta('{city} => ' . $city);

Helper::ta('URL::route("page_hello", ["spb"]) => ' . URL::route("page_hello", ["spb"]));

var_dump($route);

die;