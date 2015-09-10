<?
/**
 * TITLE: Истории успеха
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

$current_city = $city;

$stories = $dic_stories;
foreach ($stories as $s => $story) {
    if ($story->city_id != $current_city->id)
        usnet($stories[$s]);
}
$courses_dates = [];
#Helper::ta($dic_course);
#Helper::tad($current_city);
foreach ($dic_course as $course) {
    if ($course->city_id != $current_city->id || $course->date_start < date('Y-m-d'))
        continue;
    $courses_dates[$course->id] = $course->date_start;
    if (count($courses_dates) > 5)
        break;
}
asort($courses_dates);
#Helper::tad($courses_dates);
?>


@section('style')
@stop


@section('content')


    {{ $page->block('header') }}


    @if (isset($stories) && is_object($stories) && $stories->count())

        <section class="b-section stories-holder">

            @foreach ($stories as $s => $story)
                <?
                #Helper::ta($story);
                $city = isset($dic_city[$story->city_id]) ? $dic_city[$story->city_id] : null;
                #Helper::ta($city);
                if (!$city || $current_city->id != $city->id)
                    continue;
                ?>
                <div class="row _mb80 {{ ($s+1) > 5 ? '_hided' : '' }}">
                    <div class="col-md-4 _mb30">
                        @if (isset($story->avatar) && is_object($story->avatar))
                            <img src="{{ $story->avatar->full() }}" class="_mb20" alt="{{ $story->name }}">
                        @endif
                        <h3 class="_mb5">{{ $story->name }}</h3>
                        <small class="_block">
                            <?php
                            $temp = [];
                            if ($story->position)
                                $temp[] = $story->position;
                            if ($story->company)
                                $temp[] = $story->company;
                            ?>
                            {{ implode(', ', $temp) }}
                        </small>
                    </div>

                    <div class="col-md-6">
                        <h3 class="_mb50">{{ $story->name }}:</h3>
                        <blockquote class="_mb80 _text-red"><i><strong>{{ $story->quote }}</strong></i></blockquote>
                        <p class="_mb20">{{ nl2br($story->short) }}</p>
                        <div class="text-right">
                            <a href="{{ URL::route('page.story', [$city->slug, $story->id]) }}" class="btn btn-readmore">Узнать все подробности</a>
                        </div>
                    </div>
                </div>

            @endforeach

            <div class="text-center">
                <a href="#" id="more_stories" class="btn btn-blue">Больше историй</a>
            </div>
        </section>

    @endif



    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Мало этих историй? Пройди <span class="_text-yellow"><a href="{{ URL::route('page.courses', [$current_city->slug]) }}">Икру</a></span> и напиши свою!
                </h2>
                <br><br>
                <span class="_text-blue"><a href="{{ URL::route('page.courses', [$current_city->slug]) }}" class="btn">Записаться на курс</a></span>
            </div>
        </div>
    </section>




    <section class="b-section _no-padding-bottom">
        <div class="h2">Ближайшие курсы <br> в
            <form class="nl-form _text-red" data-nl>
                <select name="city" id="">
                    @foreach ($dic_city as $city)
                        <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>{{ $city->dp }}</option>
                    @endforeach
                </select>
                <div class="nl-overlay"></div>
            </form>
        </div>

        {{--@if (isset($courses) && is_object($courses) && $courses->count())--}}
        @if (count($courses_dates))
            <div class="b-courses">
                <ul class="row">
                    <?php
                    $i = 0;
                    ?>
                    {{--@foreach ($courses as $course)--}}
                    @foreach ($courses_dates as $course_id => $course_date_start)
                        <?php
                        $course = $dic_course[$course_id];
                        $city = isset($dic_city[$course->city_id]) ? $dic_city[$course->city_id] : null;
                        if (++$i > 5 || !$city)
                            break;

                        $color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                        #Helper::tad($course);
                        ?>
                        <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                            <a href="{{ URL::route('page.course', [$city->slug, $course->id]) }}" class="b-courses__link" style="background-color: {{ $color }}">
                                <span class="h3"><strong>{{ $course->name }}</strong></span>
                                <span class="b-courses__descr"><i>{{ $course->short }}</i></span>
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

                    <li class="text-center _mb30 col-sm-6 col-md-4" data-equalheight>
                        <a href="{{ URL::route('page.courses', [$current_city->slug]) }}" class="b-courses__link _all">
                            <span><span class="h3">Посмотреть все курсы</span></span>
                        </a>
                    </li>
                </ul>
            </div>
        @endif

    </section>

    <script>
        __SITE.courses = {{ json_encode($dic_course, JSON_UNESCAPED_UNICODE) }};
    </script>

@stop


@section('scripts')
@stop
