<?
/**
 * TITLE: Главная страница
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
#$cities = Dic::valuesBySlug('city', function($query){}, ['fields'], true, true, true);
#Helper::tad($cities);

#$directions = Dic::valuesBySlug('direction', function($query){}, ['fields'], true, true, true);
#Helper::tad($directions);

/*
$courses = Dic::valuesBySlug('course', function($query) use ($current_city) {
    $query->filter_by_field('city_id', '=', (int)$current_city->id);
    $query->take(6);
}, ['fields', 'textfields'], true, true, true);
#Helper::tad($courses);
#*/
$courses = new Collection();
foreach ($dic_course as $course) {
    if ($course->city_id && $course->city_id == $current_city->id) {
        $courses[$course->id] = $course;
        if (count($courses) >= 6)
            break;
    }
}
#Helper::tad($courses);
#Helper::dd(json_encode($courses, JSON_UNESCAPED_UNICODE));

#$course_types = Dic::valuesBySlug('type', function($query){}, ['fields'], true, true, true);
#Helper::tad($course_types);

$teachers = Dic::valuesBySlug('teachers', function($query) use ($current_city) {
    #$query->filter_by_field('city_id', '=', (int)$current_city->id);
    $query->filter_by_field('mainpage', '=', 1);
    $query->take(3);
}, ['fields', 'textfields'], true, true, true);
$teachers = DicLib::loadImages($teachers, ['avatar']);
#Helper::tad($teachers);

/*
$stories = Dic::valuesBySlug('stories', function($query) use ($current_city) {
    $query->filter_by_field('city_id', '=', (int)$current_city->id);
    $query->filter_by_field('mainpage', '=', 1);
    $query->take(2);
}, ['fields', 'textfields'], true, true, true);
$stories = DicLib::loadImages($stories, ['avatar']);
#Helper::tad($stories);
#*/
#Helper::tad($dic_stories);
$stories = new Collection();
foreach ($dic_stories as $story) {
    if ($story->city_id && $story->city_id == $current_city->id) {
        $stories[$story->id] = $story;
        if (count($stories) >= 2)
            break;
    }
}
#Helper::tad($stories);

/*
$story_courses = [];
if (isset($stories) && is_object($stories) && $stories->count()) {
    $temp_ids = [];
    foreach ($stories as $story) {
        if ($story->course_id) {
            $temp_ids[] = $story->course_id;
        }
    }
    if (count($temp_ids)) {
        $story_courses = Dic::valuesBySlugAndIds('course', $temp_ids, [], true, true, true);
    }
}
#Helper::tad($story_courses);
*/

#$clients = Dic::valuesBySlug('clients', null, ['fields'], true, true, true);
#$clients = DicLib::loadImages($clients, ['logo']);
#Helper::tad($clients);
?>


@section('style')
@stop


@section('content')


    <section class="b-title _long _violet">

        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <div class="h2 _mb40">Икра &mdash; школа интерактивных коммуникаций</div>
            <div class="_mb40 _max-text _margin-auto">
                <i>
                    Мы готовим востребованных специалистов. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores dolore corporis maxime nesciunt, omnis vero, illo veniam consequuntur quam ea vel voluptas est reprehenderit deserunt nihil possimus deleniti assumenda.
                </i>
            </div>
            @if (isset($dic_professions) && is_object($dic_professions) && $dic_professions->count())
                @foreach ($dic_professions as $profession)
                    <div class="h2">{{ $profession->name }}</div>
                @endforeach
            @endif
        </div>

    </section>




    <section class="b-section">
        <div class="h2">Наши курсы <br> в
            <form action="{{ URL::route('ajax.get_courses') }}" method="POST" class="nl-form _text-violet" data-nl>
                <select name="city" id="">
                    @foreach ($dic_city as $city)
                        <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>{{ $city->dp }}</option>
                    @endforeach
                </select>
                <span class="_text-gray">по</span>
                <select name="direction" id="">
                    <option value="0" data-color="#ff0000">всем направлениям</option>
                    @foreach ($dic_direction as $direction)
                        <option value="{{ $direction->id }}" data-color="{{ $direction->color }}">{{ $direction->dp }}</option>
                    @endforeach
                </select>
                <div class="nl-overlay"></div>
            </form>
        </div>

        <div class="b-courses">
            @if (isset($courses) && is_object($courses) && $courses->count())
                <ul class="row">
                    <?php
                    $i = 0;
                    ?>
                    @foreach ($courses as $course)
                        <?php
                        if (++$i > 5)
                            break;
                        ?>
                        <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                            <a href="{{ URL::route('app.course', $course->id) }}" class="b-courses__link _bg-red">
                                <span class="h3"><strong>{{ isset($dic_type[$course->type_id]) ? $dic_type[$course->type_id]->name : '' }}</strong></span>
                                <span class="b-courses__descr"><i>{{ $course->for_who }}</i></span>
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
                    @if ($courses->count() > 5 || true)
                        <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                            <a href="{{ URL::route('app.courses') }}" class="b-courses__link _all">
                                <span><span class="h3">Посмотреть все курсы</span></span>
                            </a>
                        </li>
                    @endif
                </ul>
            @endif
            @if (0)
                <ul class="row">
                <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                    <a href="#" class="b-courses__link _bg-red">
                        <span class="h3"><strong>Основной курс</strong></span>
                        <span class="b-courses__descr"><i>Описание курса</i></span>
                        <time class="h5">15 июля &mdash; 25 сентября</time>
                    </a>
                </li>
                <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                    <a href="#" class="b-courses__link _bg-violet">
                        <span class="h3"><strong>Левел-ап</strong></span>
                        <span class="b-courses__descr"><i>Описание курса <br>на две строки</i></span>
                        <time class="h5">15 июля &mdash; 25 сентября</time>
                    </a>
                </li>
                <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                    <a href="#" class="b-courses__link _bg-blue">
                        <span class="h3"><strong>Выездной кампус</strong></span>
                        <span class="b-courses__descr"><i>Описание курса</i></span>
                        <time class="h5">15 июля &mdash; 25 сентября</time>
                    </a>
                </li>
                <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                    <a href="#" class="b-courses__link _bg-violet">
                        <span class="h3"><strong>Название курса</strong></span>
                        <span class="b-courses__descr"><i>Описание курса</i></span>
                        <time class="h5">15 июля &mdash; 25 сентября</time>
                    </a>
                </li>
                <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                    <a href="#" class="b-courses__link _all">
                        <span><span class="h3">Посмотреть все курсы</span></span>
                    </a>
                </li>
            </ul>
            @endif
        </div>

    </section>




    <section class="b-section _bg-red">
        <div class="h2">Преподаватели</div>

        @if (isset($teachers) && is_object($teachers) && $teachers->count())
            <ul class="_mb50 row">
                @foreach ($teachers as $teacher)
                    <li class="col-sm-6 col-md-4 _mb30">
                        <a href="{{ URL::route('app.teacher', $teacher->id) }}" class="_block _mb20">
                            @if (isset($teacher->avatar) && is_object($teacher->avatar))
                                <img src="{{ $teacher->avatar->full() }}" alt="{{ $teacher->name }}">
                            @endif
                        </a>
                        <div class="_mb5 h3">{{ $teacher->name }}</div>
                        <div class="small">
                            <?php
                            $temp = [];
                            if ($teacher->position)
                                $temp[] = $teacher->position;
                            if ($teacher->company)
                                $temp[] = $teacher->company;
                            ?>
                            {{ implode(', ', $temp) }}
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif

        <div class="row">
            <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8">
                <span class="_text-red"><a href="{{ URL::route('app.teachers') }}" class="btn btn-white btn-wide">Все преподаватели</a></span>
            </div>
        </div>
    </section>



    @if (isset($stories) && is_object($stories) && $stories->count())
        <section class="b-section _no-padding-bottom">
            <div class="h2">140 символов<br>от выпускников</div>

            <ul class="_mb50 row">
                @foreach ($stories as $story)
                    <li class="col-sm-6 _mb30">
                        <a class="_block _mb20" href="{{ URL::route('app.story_direct', ['spb', '111']) }}">
                            @if (isset($story->avatar) && is_object($story->avatar))
                                <img src="{{ $story->avatar->full() }}" alt="{{ $story->name }}">
                            @endif
                        </a>
                        <div class="h3 _mb5">{{ $story->name }}</div>
                        <div class="small _mb20">
                            <?php
                            $temp = [];
                            if ($story->position)
                                $temp[] = $story->position;
                            if ($story->company)
                                $temp[] = $story->company;
                            ?>
                            {{ implode(', ', $temp) }}
                        </div>
                        <div class="_mb20">
                            {{ $story->short }}
                        </div>
                        @if ($story->course_id || $story->course_text)
                            <div class="h4">
                                @if ($story->gender == 'm')
                                    Учился:
                                @else
                                    Училась:
                                @endif
                                <b class="_text-yellow">
                                    @if ($story->course_id && isset($dic_course[$story->course_id]) && is_object($dic_course[$story->course_id]))
                                        <a href="{{ URL::route('app.course', $story->course_id) }}">
                                            {{ $dic_course[$story->course_id]->name }}
                                        </a>
                                    @else
                                        {{ $story->course_text }}
                                    @endif
                                </b>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

            <div class="row">
                <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8 text-right">
                    <a href="{{ URL::route('app.stories') }}" class="btn btn-blue">Ещё про выпускников</a>
                </div>
            </div>
        </section>
    @endif




    @if (isset($dic_clients) && is_object($dic_clients) && $dic_clients->count())
        <section class="b-section">
            <div class="h2 _with-subtitle">Наши клиенты</div>
            <div class="h4 _mb85 _max-text">Мы не придумываем задачи нашим студентам &mdash; они работают по реальным брифам известных брендов</div>

            <div class="b-slider _mb20 owl-carousel">
                @foreach ($dic_clients as $client)
                    <?php
                    if (!is_object($client->logo))
                        continue;
                    ?>
                    <div class="owl-item">
                        <a href="{{ $client->url }}" class="" target="_blank">
                            <img src="{{ $client->logo->thumb() }}" alt="{{ $client->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif








    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Хочу учиться! На какой <span class="_text-yellow"><a href="{{ URL::route('app.courses') }}">курс</a></span> мне пойти?
                    {{--Хочу учиться! На какой <span class="_text-yellow"><a href="#cta_form" data-toggle="collapse">курс</a></span> мне пойти?--}}
                </h2>
            </div>
        </div>

        @if (0)
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
        @endif
    </section>




    @if (0)
        <section class="b-section _cta-action _blue collapse" id="cta_form">
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
                        <button type="submit" class="btn btn-white btn-wide">Отправить</button>
                    </form>
                </div>
            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop