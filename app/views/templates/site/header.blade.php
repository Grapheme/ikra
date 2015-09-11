<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<noscript><b>В вашем браузере выключен javascript!</b> Полная функциональность сайта может быть недоступна.</noscript>

<script>
    var __SITE = {};
</script>


<header class="b-header <? if (defined('HEADER_CLASS')) echo HEADER_CLASS; else echo '_light' ?>">

    <div class="b-header__city">
        <div class="b-header__city-select-wrapper _txt9">

            {{--{{ Session::get('current_city')->id }}--}}

            <form class="nl-form header-city-form" action="{{ URL::route('ajax.change_city') }}" method="POST" data-nl>
                <span data-city-nl>
                    <select class="b-header__city-select js-city-select" name="city_id" id="city_select">
                        @foreach ($dic_city as $city)
                            <?
                            if (!$city->important)
                                continue;
                            ?>
                            <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>Икра {{ $city->name_mini ?: $city->name }}</option>
                        @endforeach
                    </select>
                </span>
            </form>
        </div>
    </div>

    <div class="b-header__nav _txt9">
        <div class="b-header__menu-button _h9" id="menu_open"><span>Меню</span> <i class="fa fa-bars"></i></div>
        @if (0)
            <div class="b-header__breadcrumps _h9">/ <a href="#">Раздел</a> / <a href="#">Подраздел</a> </div>
        @endif
    </div>

</header>




<nav class="b-menu">
    <div id="menu_close" class="b-menu__close"><a class="_txt9" href="#"><i class="fa fa-chevron-left"></i> свернуть</a></div>

    {{ Menu::placement('main_menu') }}

    @if (0)
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
    @endif
    <div class="h4 _mb30">Наши полезные письма (<b class="_text-yellow"><a href="#">пример</a></b>)</div>
    <form action="{{ URL::route('app.form_subscribe') }}" method="POST" role="form" class="_white _max-form row">
        <div class="col-xs-8 form-group _mb20">
            <input type="email" name="email" class="form-control" id="" placeholder="E-mail">
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-wide">ОК</button>
        </div>
    </form>
</nav>





<!-- <div class="row"> -->