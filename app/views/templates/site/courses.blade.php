<?
/**
 * TITLE: Курсы
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$route = Route::current();

$city_slug = $route->getParameter('city_slug');
#Helper::tad($city_slug);

$city = null;
foreach ($dic_city as $temp) {
    if ($temp->slug == $city_slug) {
        $city = $temp;
        break;
    }
}
#Helper::tad($city);
if (!is_object($city)) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}


#Helper::tad($dic_course);
$main_course = null;
$professions = new Collection();
$intensives = new Collection();
$modules = new Collection();
foreach ($dic_course as $course) {

    if ($course->city_id != $city->id)
        continue;

    if (!$main_course && $course->type_id == Config::get('site.types.main')) {
        $main_course = $course;
    } else if ($course->type_id == Config::get('site.types.profession')) {
        $professions[] = $course;
    } else if ($course->type_id == Config::get('site.types.intensive')) {
        $intensives[] = $course;
    } else if ($course->type_id == Config::get('site.types.module')) {
        $modules[] = $course;
    }
}
/*
Helper::ta($main_course);
Helper::ta($professions);
Helper::ta($intensives);
Helper::tad($modules);
#*/
?>


@section('style')
@stop


@section('content')


    <section class="b-title" style="background-image: url({{ Config::get('site.theme_path') }}/img/bg/courses.jpg);">
        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>
        <div class="b-title__text">
            <h2>
                Я хочу от Икры
                <form class="nl-form _text-red" data-nl>
                    <select name="direction" id="">
                        <option value="0" data-color="#ff0000">всё и сразу</option>
                        @foreach ($dic_direction as $direction)
                            <option value="{{ $direction->id }}" data-color="{{ $direction->color }}">{{ $direction->rp }}</option>
                        @endforeach
                    </select>
                    <div class="nl-overlay"></div>
                </form>
                <h3 class="_text-white"><a href="#">Посмотреть все программы</a></h3>
            </h2>
        </div>
    </section>




    <section class="b-section _bg-cyan text-center">
        <h1 class="_mb30">Season pass</h1>
        <div class="_mb60">
            <i>Программа обучения, которая подстраивается под твои потребности</i>
        </div>
        <a href="{{ Config::get('app.settings.content.season_pass_link') ?: '#' }}" target="_blank" class="btn btn-white">Подробнее</a>
    </section>




    @if ($main_course !== null)
        <section class="b-section _no-padding-bottom _mb30">
            <div class="b-section _bg-red b-courses__big text-center">
                <h2>1. {{ $main_course->name }}</h2>
                <h3 class="_mb50">{{ $main_course->short }}</h3>
                <a href="{{ URL::route('page.course', [$city->slug, $main_course->id]) }}" class="btn btn-white">Подробнее</a>
            </div>
        </section>
    @endif




    @if (isset($professions) && is_object($professions) && $professions->count())

        <section class="b-section text-center _no-padding-bottom">
            <h2 class="_with-subtitle">2. Профессии</h2>
            <p class="_max-text _margin-auto _mb50">4 месяца полного погружения в область</p>

            <div class="b-courses _time-at-bottom">
                <ul class="row">
                    @foreach ($professions as $course)
                        <?
                        $color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                        ?>
                        <li class="text-center _mb30 col-md-6" data-equalheight>
                            <a href="{{ URL::route('page.course', [$city->slug, $course->id]) }}" class="b-courses__link" style="background-color: {{ $color }}">
                                <div class="_txt3"><br><b>{{ $course->name }}</b></div>
                                <time class="h5">
                                    @if ($course->date_start)
                                        {{ Helper::rdate('j M', $course->date_start) }}
                                    @endif
                                    @if ($course->date_start < $course->date_stop)
                                        &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                                    @endif
                                </time>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

    @endif




    @if (isset($modules) && is_object($modules) && $modules->count())

        <section class="b-section text-center _no-padding-bottom">
            <h2 class="_with-subtitle">3. Модули</h2>
            <p class="_max-text _margin-auto _mb50">Убойное оттачивание навыков за 2-3 недели</p>


            <div class="b-courses _modules _time-at-bottom">
                <ul class="row">
                    @foreach ($modules as $c => $course)
                        <?
                        $color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                        ?>
                        <li class="text-center _mb30 col-md-6{{ ($c+1) > 6 ? '_hided' : '' }}" data-equalheight>
                            <a href="{{ URL::route('page.course', [$city->slug, $course->id]) }}" class="b-courses__link" style="background-color: {{ $color }}">
                                <div class="_txt3"><h3><strong>{{ $course->name }}</strong></h3></div>
                                <time class="h5">
                                    @if ($course->date_start)
                                        {{ Helper::rdate('j M', $course->date_start) }}
                                    @endif
                                    @if ($course->date_start < $course->date_stop)
                                        &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                                    @endif
                                </time>
                            </a>
                        </li>
                    @endforeach

                    @if ($modules->count() > 5)
                        <li class="text-center _mb30 col-md-6" data-equalheight>
                            <a href="#" class="b-courses__link _all">
                                <span><span class="h3">Посмотреть все модули</span></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </section>

    @endif




    @if (isset($intensives) && is_object($intensives) && $intensives->count())

        <section class="b-section">
            <h2 class="_with-subtitle">Интенсивы</h2>

            <p class="_mb50 _max-text">Два дня &mdash; много практики, вдохновения, бодрящих спискеров и интересных трендов</p>

            <div class="b-courses _time-at-bottom">
                <ul class="row">

                    @foreach ($intensives as $c => $course)
                        <?
                        $color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                        ?>
                        <li class="text-center _mb30 col-md-6{{ ($c+1) > 5 ? '_hided' : '' }}" data-equalheight>
                            <a href="{{ URL::route('page.course', [$city->slug, $course->id]) }}" class="b-courses__link" style="background-color: {{ $color }}">
                                <div class="_txt3"><h3><strong>{{ $course->name }}</strong></h3></div>
                                <time class="h5">
                                    @if ($course->date_start)
                                        {{ Helper::rdate('j M', $course->date_start) }}
                                    @endif
                                    @if ($course->date_start < $course->date_stop)
                                        &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                                    @endif
                                </time>
                            </a>
                        </li>
                    @endforeach

                    @if ($intensives->count() > 5)
                        <li class="text-center _mb30 col-md-6" data-equalheight>
                            <a href="#" class="b-courses__link _all">
                                <span><span class="h3">Посмотреть все интенсивы</span></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </section>

    @endif





    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Я готов! Хочу <span class="_text-yellow"><a href="#cta_form" data-toggle="collapse">записаться</a></span> на курс
                </h2>
            </div>
        </div>

        <div id="cta_form" class="collapse">
            <form role="form" class="row _white">
                <div class="col-md-5 _mb60 col-md-offset-1">
                    <div class="form-group _mb20">
                        <input type="text" class="form-control" id="" placeholder="Имя">
                    </div>
                    <div class="form-group _mb20">
                        <input type="email" class="form-control" id="" placeholder="E-mail">
                    </div>
                    <div class="form-group _mb20">
                        <input type="text" class="form-control" id="" placeholder="Телефон">
                    </div>
                </div>
                <div class="col-md-5 _mb60">
                    <div class="form-group _mb20">

                        <select name="direction" id="">
                            <option data-color="#ff0000">Хочу обучиться</option>
                            @foreach ($dic_direction as $direction)
                                <option value="{{ $direction->id }}" data-color="{{ $direction->color }}">{{ $direction->dp }}</option>
                            @endforeach
                        </select>

                        {{--<input type="text" class="form-control" id="" placeholder="Хочу обучиться">--}}
                    </div>
                    <div class="form-group _mb20">
                        <input type="text" class="form-control" id="" placeholder="Или предложить тему">
                    </div>
                </div>
                <div class="col-xs-12 _text-blue text-center">
                    <button type="submit" class="btn">Отправить</button>
                </div>
            </form>
        </div>
    </section>

@stop


@section('scripts')
@stop